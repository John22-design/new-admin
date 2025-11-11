@extends('layouts/contentNavbarLayout')

@section('title', 'Website | Testimonials')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('css/datatable-custom.css') }}">
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/masonry/masonry.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Testimonials Management</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimonialModal"
                        id="addTestimonialBtn">
                        <i class="bx bx-plus"></i> Add Testimonial
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <div class="card">
        <div class="card-body table-responsive">
            <table id="testimonialsTable" class="table table-bordered table-responsive</table>ius-3">
                <thead>
                    <tr>
                        <th>Profile Image</th>
                        <th>Customer Name</th>
                        <th>Profession</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit -->
    <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="testimonialForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="testimonial_id" name="testimonial_id">
                    <input type="hidden" id="form_method" name="_method" value="">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customer_name" class="form-label">Customer Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                <div class="invalid-feedback" id="customer_name_error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="profession" class="form-label">Profession <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="profession" name="profession" required>
                                <div class="invalid-feedback" id="profession_error"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                            <div class="invalid-feedback" id="comment_error"></div>
                        </div>
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image"
                                accept="image/*">
                            <div class="invalid-feedback" id="profile_image_error"></div>
                            <small class="text-muted">Allowed formats: jpeg, png, jpg, gif. Max size: 2MB</small>
                            <div id="current_image" class="mt-2"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-2" id="saveTestimonialBtn">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        // Initialize DataTable and store the instance
        var testimonialsTable = $('#testimonialsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('website-testimonials') }}",
            columns: [{
                    data: 'profile_image',
                    name: 'profile_image',
                    render: function(data, type, row) {
                        if (data) {
                            return `<img src="/storage/${data}" alt="Profile Image" class="rounded-circle" width="50" height="50">`;
                        } else {
                            return '<span class="badge bg-secondary">No Image</span>';
                        }
                    }
                },
                {
                    data: 'customer_name',
                    name: 'customer_name'
                },
                {
                    data: 'profession',
                    name: 'profession'
                },
                {
                    data: 'comment',
                    name: 'comment',
                    render: function(data, type, row) {
                        if (data && data.length > 50) {
                            return data.substring(0, 50) + '...';
                        }
                        return data;
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        const date = new Date(data);
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        const month = months[date.getMonth()];
                        const day = String(date.getDate()).padStart(2, '0');
                        const year = date.getFullYear();
                        return `${month}/${day}/${year}`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            pagingType: "numbers"
        });

        // Debug: Check if DataTable was initialized
        console.log('DataTable initialized:', testimonialsTable);

        // Function to edit testimonial
        window.editTestimonial = function(id) {
            $.ajax({
                url: `/testimonials/${id}/edit`,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        const testimonial = response.data;

                        // Fill form with data
                        $('#testimonial_id').val(testimonial.id);
                        $('#form_method').val('PUT');
                        $('#customer_name').val(testimonial.customer_name);
                        $('#profession').val(testimonial.profession);
                        $('#comment').val(testimonial.comment);

                        // Show current image if exists
                        if (testimonial.profile_image) {
                            $('#current_image').html(
                                `<div class="mt-2">
                                    <p class="mb-1">Current Image:</p>
                                    <img src="/storage/${testimonial.profile_image}" alt="Current Image" class="rounded" width="100" height="100">
                                </div>`
                            );
                        } else {
                            $('#current_image').html('');
                        }

                        // Update modal title and button
                        $('#testimonialModalLabel').text('Edit Testimonial');
                        $('#saveTestimonialBtn').text('Update Testimonial');

                        // Show modal
                        $('#testimonialModal').modal('show');
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Unable to load testimonial data.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        };

        // Function to delete testimonial
        window.deleteTestimonial = function(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/testimonials/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                testimonialsTable.ajax.reload();
                            }
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong while deleting.',
                                'error'
                            );
                        }
                    });
                }
            });
        };

        // Reset modal when it's closed
        $('#testimonialModal').on('hidden.bs.modal', function() {
            resetForm();
        });

        // Handle form submission
        $('#testimonialForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let submitBtn = $('#saveTestimonialBtn');
            let originalText = submitBtn.text();
            let testimonialId = $('#testimonial_id').val();
            let method = $('#form_method').val();

            // Determine URL and method
            let url, ajaxMethod;
            if (testimonialId && method === 'PUT') {
                url = `/testimonials/${testimonialId}`;
                ajaxMethod = 'POST';
                formData.append('_method', 'PUT');
            } else {
                url = "{{ route('testimonials.store') }}";
                ajaxMethod = 'POST';
            }

            // Show loading state
            submitBtn.prop('disabled', true).text('Saving...');

            // Clear previous errors
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
                        // Show success message
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Close modal and refresh table
                        $('#testimonialModal').modal('hide');

                        // Debug: Check if testimonialsTable exists
                        console.log('Reloading table, testimonialsTable:', testimonialsTable);

                        if (testimonialsTable && typeof testimonialsTable.ajax !== 'undefined') {
                            testimonialsTable.ajax.reload();
                        } else {
                            console.error('DataTable instance not found, trying alternative method');
                            // Fallback method
                            $('#testimonialsTable').DataTable().ajax.reload();
                        }

                        resetForm();
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let message = xhr.responseJSON?.message || 'An error occurred';

                    if (xhr.status === 422) {
                        // Show validation errors
                        displayErrors(errors);
                    } else {
                        // Show general error
                        Swal.fire({
                            title: 'Error!',
                            text: message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                complete: function() {
                    // Reset button state
                    submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });

        // Function to reset form
        function resetForm() {
            $('#testimonialForm')[0].reset();
            $('#testimonial_id').val('');
            $('#form_method').val('');
            $('#testimonialModalLabel').text('Add Testimonial');
            $('#saveTestimonialBtn').text('Save Testimonial');
            $('#current_image').html('');
            clearErrors();
        }

        // Function to clear validation errors
        function clearErrors() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');
        }

        // Function to display validation errors
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
