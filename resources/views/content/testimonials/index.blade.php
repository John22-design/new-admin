@extends('layouts/contentNavbarLayout')

@section('title', 'Website | Testimonials')

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
        <div class="card-header">
            <h5 class="card-title">All Testimonials</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="testimonialsTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveTestimonialBtn">Save Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        // Initialize DataTable
        $('#testimonialsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('website-testimonials') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
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
                        return new Date(data).toLocaleDateString();
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

            // Show loading state
            submitBtn.prop('disabled', true).text('Saving...');

            // Clear previous errors
            clearErrors();

            $.ajax({
                url: "{{ route('testimonials.store') }}",
                type: 'POST',
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
                        $('#testimonialsTable').DataTable().ajax.reload();
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
