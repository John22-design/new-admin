<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(User::query())
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                    $initials = strtoupper(substr($row->name, 0, 2));
                    $colors = ['primary', 'success', 'danger', 'warning', 'info', 'dark'];
                    $color = $colors[$row->id % count($colors)];
                    return '<div class="avatar avatar-sm me-2">
                        <span class="avatar-initial rounded-circle bg-label-' . $color . '">' . e($initials) . '</span>
                    </div>';
                })
                ->addColumn('action', function ($row) {
                    $currentUserId = Auth::id();
                    $isSelf = ($currentUserId === $row->id);

                    $deleteOption = $isSelf
                        ? '<li><span class="dropdown-item text-muted disabled"><i class="bx bx-trash me-1"></i> Cannot delete self</span></li>'
                        : '<li><a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteUser(' . $row->id . ')"><i class="bx bx-trash me-1"></i> Delete</a></li>';

                    return '
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="editUser(' . $row->id . ')">
                                        <i class="bx bx-edit me-1"></i> Edit
                                    </a>
                                </li>
                                ' . $deleteOption . '
                            </ul>
                        </div>
                    ';
                })
                ->rawColumns(['avatar', 'action'])
                ->make(true);
        }

        $totalUsers = User::count();
        $thisMonthUsers = User::where('created_at', '>=', now()->startOfMonth())->count();

        return view('content.users.index', compact('totalUsers', 'thisMonthUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully!',
                'data' => $user
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at ? $user->created_at->format('M d, Y') : null,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
            ];

            if (!empty($validated['password'])) {
                $userData['password'] = Hash::make($validated['password']);
            }

            $user->update($userData);

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully!',
                'data' => $user
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (Auth::id() === (int) $id) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot delete your own logged-in account.'
                ], 403);
            }

            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting the user.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
