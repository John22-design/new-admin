@extends('layouts/contentNavbarLayout')

@section('title', 'User Management')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('css/datatable-custom.css') }}">
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/masonry/masonry.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-toast .swal2-title {
            margin: 0 !important;
        }
    </style>
@endsection

@section('content')
    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded-3 bg-label-primary">
                                <i class="bx bx-user fs-3 text-primary"></i>
                            </span>
                        </div>
                        <span class="badge bg-label-primary rounded-pill px-2 py-1">Total</span>
                    </div>
                    <p class="text-muted mb-1 small text-uppercase fw-medium">Total Users</p>
                    <h3 class="card-title mb-0 fw-bold text-dark" id="statTotalUsers">{{ number_format($totalUsers) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded-3 bg-label-success">
                                <i class="bx bx-user-plus fs-3 text-success"></i>
                            </span>
                        </div>
                        <span class="badge bg-label-success rounded-pill px-2 py-1">{{ now()->format('F') }}</span>
                    </div>
                    <p class="text-muted mb-1 small text-uppercase fw-medium">New This Month</p>
                    <h3 class="card-title mb-0 fw-bold text-dark">{{ number_format($thisMonthUsers) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded-3 bg-label-info">
                                <i class="bx bx-shield-quarter fs-3 text-info"></i>
                            </span>
                        </div>
                        <span class="badge bg-label-info rounded-pill px-2 py-1">Active</span>
                    </div>
                    <p class="text-muted mb-1 small text-uppercase fw-medium">Admin Accounts</p>
                    <h3 class="card-title mb-0 fw-bold text-dark">{{ number_format($totalUsers) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Card -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">Users List</h5>
                        <p class="text-muted small mb-0">Manage system administrators and user accounts</p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" id="addUserBtn">
                        <i class="bx bx-plus me-1"></i> Add User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Users DataTable -->
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table id="usersTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>User</th>
                        <th>Email Address</th>
                        <th>Created At</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit User -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="userForm">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id">
                    <input type="hidden" id="form_method" name="_method" value="">

                    <div class="modal-body">
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                            <div class="invalid-feedback" id="name_error"></div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="john@example.com" required>
                            <div class="invalid-feedback" id="email_error"></div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger" id="password_required_indicator">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                            <div class="invalid-feedback" id="password_error"></div>
                            <small class="text-muted d-block" id="password_help_text">Must be at least 8 characters</small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger" id="password_confirm_required_indicator">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••">
                            <div class="invalid-feedback" id="password_confirmation_error"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveUserBtn">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        const toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: popup => {
                const container = popup.parentElement;
                if (container) {
                    container.style.zIndex = '2005';
                }
            }
        });

        // Initialize DataTable
        var usersTable = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                ${row.avatar || ''}
                                <div>
                                    <span class="fw-semibold text-dark d-block">${data}</span>
                                </div>
                            </div>
                        `;
                    }
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function(data) {
                        return `<span class="text-dark"><i class="bx bx-envelope me-1 text-muted"></i> ${data}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        if (!data) return '-';
                        const date = new Date(data);
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        return `${months[date.getMonth()]} ${String(date.getDate()).padStart(2, '0')}, ${date.getFullYear()}`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            pagingType: "numbers"
        });

        // Add User Button click -> reset modal state for new user
        $('#addUserBtn').on('click', function() {
            resetForm();
        });

        // Function to edit user
        window.editUser = function(id) {
            $.ajax({
                url: `/users/${id}/edit`,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        const user = response.data;

                        $('#user_id').val(user.id);
                        $('#form_method').val('PUT');
                        $('#name').val(user.name);
                        $('#email').val(user.email);
                        $('#password').val('');
                        $('#password_confirmation').val('');

                        // Configure password fields as optional for edit mode
                        $('#password_required_indicator').hide();
                        $('#password_confirm_required_indicator').hide();
                        $('#password_help_text').text('Leave blank to keep existing password (min 8 characters if changing)');
                        $('#password').removeAttr('required');
                        $('#password_confirmation').removeAttr('required');

                        // Update modal labels
                        $('#userModalLabel').text('Edit User');
                        $('#saveUserBtn').text('Update User');

                        clearErrors();
                        $('#userModal').modal('show');
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Unable to load user details.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        };

        // Function to delete user
        window.deleteUser = function(id) {
            Swal.fire({
                title: 'Delete User?',
                text: "Are you sure you want to delete this user? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff3e1d',
                cancelButtonColor: '#8592a3',
                confirmButtonText: 'Yes, delete!',
                didOpen: popup => {
                    const container = popup.parentElement;
                    if (container) {
                        container.style.zIndex = '2005';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/users/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                toast.fire({
                                    icon: 'success',
                                    title: 'User deleted successfully'
                                });
                                usersTable.ajax.reload();
                            } else {
                                Swal.fire({
                                    title: 'Cannot Delete!',
                                    text: response.message || 'Action not allowed.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr) {
                            let msg = xhr.responseJSON?.message || 'Something went wrong while deleting the user.';
                            Swal.fire({
                                title: 'Error!',
                                text: msg,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        };

        // Reset modal on close
        $('#userModal').on('hidden.bs.modal', function() {
            resetForm();
        });

        // Handle form submission
        $('#userForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let submitBtn = $('#saveUserBtn');
            let originalText = submitBtn.text();
            let userId = $('#user_id').val();
            let method = $('#form_method').val();

            let url = (userId && method === 'PUT') ? `/users/${userId}` : "{{ route('users.store') }}";
            let ajaxMethod = 'POST';

            if (userId && method === 'PUT') {
                formData.append('_method', 'PUT');
            }

            submitBtn.prop('disabled', true).text('Saving...');
            clearErrors();

            $.ajax({
                url: url,
                type: ajaxMethod,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        toast.fire({
                            icon: 'success',
                            title: userId && method === 'PUT' ? 'User Updated Successfully' : 'User Created Successfully'
                        });

                        $('#userModal').modal('hide');
                        usersTable.ajax.reload();
                        resetForm();
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let message = xhr.responseJSON?.message || 'An error occurred.';

                    if (xhr.status === 422) {
                        displayErrors(errors);
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });

        // Reset form function
        function resetForm() {
            $('#userForm')[0].reset();
            $('#user_id').val('');
            $('#form_method').val('');
            $('#userModalLabel').text('Add User');
            $('#saveUserBtn').text('Save User');
            $('#password_required_indicator').show();
            $('#password_confirm_required_indicator').show();
            $('#password_help_text').text('Must be at least 8 characters');
            $('#password').attr('required', 'required');
            $('#password_confirmation').attr('required', 'required');
            clearErrors();
        }

        // Clear error highlights
        function clearErrors() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');
        }

        // Display validation error messages
        function displayErrors(errors) {
            Object.keys(errors).forEach(function(key) {
                let input = $(`#${key}`);
                let errorDiv = $(`#${key}_error`);
                input.addClass('is-invalid');
                errorDiv.text(errors[key][0]);
            });
        }
    </script>
@endsection
