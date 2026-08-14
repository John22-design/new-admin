@extends('layouts/contentNavbarLayout')

@section('title', 'Website | Blog Posts')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('css/datatable-custom.css') }}">
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/masonry/masonry.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <style>
        .swal2-toast .swal2-title {
            margin: 0 !important;
        }

        .ck-editor__editable {
            min-height: 180px;
            max-height: 300px;
        }

        #blogPostModal .modal-body {
            max-height: 68vh;
            overflow-y: auto;
        }

        /* Custom subtle scrollbar for modal body */
        #blogPostModal .modal-body::-webkit-scrollbar {
            width: 6px;
        }
        #blogPostModal .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        #blogPostModal .modal-body::-webkit-scrollbar-thumb {
            background: #c7c7c7;
            border-radius: 4px;
        }
        #blogPostModal .modal-body::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
@endsection

@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Blog Posts Management</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogPostModal"
                        id="addBlogPostBtn">
                        <i class="bx bx-plus"></i> Add Blog Post
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <div class="card">
        <div class="card-body table-responsive">
            <table id="blogPostsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create/Edit -->
    <div class="modal fade" id="blogPostModal" tabindex="-1" aria-labelledby="blogPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <form id="blogPostForm" class="modal-content" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="blog_post_id" name="blog_post_id">
                <input type="hidden" id="form_method" name="_method" value="">

                <div class="modal-header border-bottom py-2 px-3">
                    <h5 class="modal-title fw-bold" id="blogPostModalLabel">Add Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-3 p-lg-4">
                    <div class="row g-3">
                        <!-- Left Column: Main Writing Content -->
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter blog post title...">
                                <div class="invalid-feedback" id="title_error"></div>
                            </div>

                            <div class="mb-3">
                                <label for="blog_content" class="form-label fw-semibold">Content</label>
                                <textarea class="form-control" id="blog_content" name="content"></textarea>
                                <div class="invalid-feedback" id="content_error"></div>
                            </div>

                            <div class="mb-0">
                                <label for="excerpt" class="form-label fw-semibold">Excerpt / Summary</label>
                                <textarea class="form-control" id="excerpt" name="excerpt" rows="5"
                                    placeholder="Short summary displayed on blog listing cards..."></textarea>
                                <div class="invalid-feedback" id="excerpt_error"></div>
                            </div>
                        </div>

                        <!-- Right Column: Settings & Media Sidebar -->
                        <div class="col-lg-4">
                            <!-- Publishing Settings Card -->
                            <div class="card border shadow-none mb-3">
                                <div class="card-header bg-light py-2 px-3">
                                    <h6 class="mb-0 fw-semibold text-primary"><i class="bx bx-cog me-1"></i> Post Settings</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div class="mb-3">
                                        <label for="status" class="form-label mb-1 fw-semibold">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="published" selected>Published</option>
                                            <option value="draft">Draft</option>
                                            <option value="archived">Archived</option>
                                        </select>
                                        <div class="invalid-feedback" id="status_error"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="category" class="form-label mb-1 fw-semibold">Category</label>
                                        <select class="form-select" id="category" name="category">
                                            <option value="">Select Category</option>
                                            <option value="Strategy">Strategy</option>
                                            <option value="Stewardship">Stewardship</option>
                                            <option value="Bid Writing">Bid Writing</option>
                                            <option value="Communications">Communications</option>
                                            <option value="Income Diversity">Income Diversity</option>
                                        </select>
                                        <div class="invalid-feedback" id="category_error"></div>
                                    </div>

                                    <div class="form-check form-switch pt-1">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                                        <label class="form-check-label fw-semibold" for="is_featured">
                                            Featured Post
                                        </label>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">Display at top of blog</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Image Card -->
                            <div class="card border shadow-none">
                                <div class="card-header bg-light py-2 px-3">
                                    <h6 class="mb-0 fw-semibold text-primary"><i class="bx bx-image me-1"></i> Featured Image</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div id="image_preview_wrapper" class="mb-2 d-none text-center">
                                        <img id="image_preview" src="" alt="Selected Preview" class="img-fluid rounded border shadow-sm" style="max-height: 120px; width: 100%; object-fit: cover;">
                                    </div>
                                    <div id="current_image" class="mb-2 text-center"></div>

                                    <input type="file" class="form-control form-control-sm" id="featured_image" name="featured_image" accept="image/*">
                                    <div class="invalid-feedback" id="featured_image_error"></div>
                                    <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">JPEG, PNG, WEBP (Max: 5MB)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
                    <span class="text-muted small">
                        <i class="bx bx-check-shield text-success me-1"></i> Changes save instantly to database
                    </span>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">
                            <i class="bx bx-x me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm" id="saveBlogPostBtn">
                            <i class="bx bx-check me-1"></i> Save Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        const toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: popup => {
                const container = popup.parentElement;
                if (container) {
                    container.style.zIndex = '2005';
                }
            }
        });

        // Initialize CKEditor
        let editor;
        ClassicEditor
            .create(document.querySelector('#blog_content'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', '|',
                        'bulletedList', 'numberedList', '|',
                        'blockQuote', 'insertTable', '|',
                        'undo', 'redo'
                    ]
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        }
                    ]
                }
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        // Initialize DataTable
        var blogPostsTable = $('#blogPostsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('website-blog-posts') }}",
            columns: [{
                    data: 'featured_image_preview',
                    name: 'featured_image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'status_badge',
                    name: 'status'
                },
                {
                    data: 'featured_badge',
                    name: 'is_featured'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        return data ? new Date(data).toLocaleDateString() : '-';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Live image preview
        $('#featured_image').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                    $('#image_preview_wrapper').removeClass('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                $('#image_preview_wrapper').addClass('d-none');
            }
        });

        // Add Blog Post button
        $('#addBlogPostBtn').click(function() {
            resetForm();
            $('#blogPostModalLabel').text('Add Blog Post');
            $('#form_method').val('');
        });

        // Form submission
        $('#blogPostForm').submit(function(e) {
            e.preventDefault();

            // Basic validation
            if (!$('#title').val().trim()) {
                $('#title').addClass('is-invalid');
                $('#title_error').text('Title is required');
                $('#title').focus();
                toast.fire({
                    icon: 'error',
                    title: 'Please enter a title'
                });
                return false;
            }

            // Get CKEditor content
            if (editor) {
                $('#blog_content').val(editor.getData());
            }

            let formData = new FormData(this);
            formData.set('is_featured', $('#is_featured').is(':checked') ? '1' : '0');

            let blogPostId = $('#blog_post_id').val();
            let url = blogPostId ? "{{ url('blog-posts') }}/" + blogPostId : "{{ route('blog-posts.store') }}";
            let method = blogPostId ? 'POST' : 'POST';

            if (blogPostId) {
                formData.append('_method', 'PUT');
            }

            // Clear previous errors
            $('.form-control, .form-select').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            $('#saveBlogPostBtn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Saving...');

            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#saveBlogPostBtn').prop('disabled', false).html('<i class="bx bx-check me-1"></i> Save Post');
                    if (response.success) {
                        $('#blogPostModal').modal('hide');
                        blogPostsTable.ajax.reload();
                        toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                        resetForm();
                    }
                },
                error: function(xhr) {
                    $('#saveBlogPostBtn').prop('disabled', false).html('<i class="bx bx-check me-1"></i> Save Post');
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                        });

                        toast.fire({
                            icon: 'error',
                            title: 'Please fix the highlighted errors'
                        });
                    } else {
                        toast.fire({
                            icon: 'error',
                            title: xhr.responseJSON?.message || 'Something went wrong'
                        });
                    }
                }
            });
        });

        // Edit function
        window.editBlogPost = function(id) {
            resetForm();
            $('#blogPostModalLabel').text('Edit Blog Post');

            $.ajax({
                url: "{{ url('blog-posts') }}/" + id + "/edit",
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        let data = response.data;
                        $('#blog_post_id').val(data.id);
                        $('#title').val(data.title);
                        $('#excerpt').val(data.excerpt);

                        // Set CKEditor content
                        if (editor) {
                            editor.setData(data.content || '');
                        }

                        $('#category').val(data.category);
                        $('#status').val(data.status);
                        $('#is_featured').prop('checked', Boolean(data.is_featured == 1 || data.is_featured === true));

                        if (data.featured_image) {
                            $('#current_image').html(
                                `<img src="/storage/${data.featured_image}" alt="Current Image" class="img-thumbnail mt-2" style="max-height: 120px; width: 100%; object-fit: cover;">`
                            );
                        }

                        $('#blogPostModal').modal('show');
                    }
                },
                error: function(xhr) {
                    toast.fire({
                        icon: 'error',
                        title: 'Failed to load blog post'
                    });
                }
            });
        }

        // Delete function
        window.deleteBlogPost = function(id) {
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
                        url: "{{ url('blog-posts') }}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                blogPostsTable.ajax.reload();
                                toast.fire({
                                    icon: 'success',
                                    title: response.message
                                });
                            }
                        },
                        error: function(xhr) {
                            toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON?.message || 'Failed to delete'
                            });
                        }
                    });
                }
            });
        }

        // Reset form
        function resetForm() {
            $('#blogPostForm')[0].reset();
            $('#blog_post_id').val('');
            $('#current_image').html('');
            $('#image_preview_wrapper').addClass('d-none');
            $('#image_preview').attr('src', '');
            $('#status').val('published');
            $('#is_featured').prop('checked', false);
            $('.form-control, .form-select').removeClass('is-invalid');
            $('.invalid-feedback').text('');
            if (editor) {
                editor.setData('');
            }
        }

        // Clear validation on input
        $('#title, #status').on('input change', function() {
            $(this).removeClass('is-invalid');
            $('#' + $(this).attr('id') + '_error').text('');
        });
    </script>
@endsection
