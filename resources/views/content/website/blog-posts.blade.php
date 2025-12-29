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
            min-height: 400px;
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
                        <th>Published At</th>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blogPostModalLabel">Add Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="blogPostForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_post_id" name="blog_post_id">
                    <input type="hidden" id="form_method" name="_method" value="">

                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="content-tab" data-bs-toggle="tab"
                                    data-bs-target="#content" type="button" role="tab">
                                    <i class="bx bx-file"></i> Content
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings"
                                    type="button" role="tab">
                                    <i class="bx bx-cog"></i> Settings
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                    type="button" role="tab">
                                    <i class="bx bx-search-alt"></i> SEO
                                </button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content">
                            <!-- Content Tab -->
                            <div class="tab-pane fade show active" id="content" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title">
                                        <div class="invalid-feedback" id="title_error"></div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Auto-generated from title if left blank">
                                        <div class="invalid-feedback" id="slug_error"></div>
                                        <small class="text-muted">URL-friendly identifier (e.g., my-blog-post)</small>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="excerpt" class="form-label">Excerpt</label>
                                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3"
                                            placeholder="Short summary for blog listing pages"></textarea>
                                        <div class="invalid-feedback" id="excerpt_error"></div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="blog_content" class="form-label">Content</label>
                                        <textarea class="form-control" id="blog_content" name="content" rows="15"></textarea>
                                        <div class="invalid-feedback" id="content_error"></div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="featured_image" class="form-label">Featured Image</label>
                                        <input type="file" class="form-control" id="featured_image"
                                            name="featured_image" accept="image/*">
                                        <div class="invalid-feedback" id="featured_image_error"></div>
                                        <small class="text-muted">Allowed: jpeg, png, jpg, gif, webp. Max: 5MB</small>
                                        <div id="current_image" class="mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Settings Tab -->
                            <div class="tab-pane fade" id="settings" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="form-label">Category</label>
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
                                    <div class="col-md-6 mb-3">
                                        <label for="read_time" class="form-label">Read Time (minutes)</label>
                                        <input type="number" class="form-control" id="read_time" name="read_time"
                                            min="1" value="5">
                                        <div class="invalid-feedback" id="read_time_error"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                            <option value="archived">Archived</option>
                                        </select>
                                        <div class="invalid-feedback" id="status_error"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="published_at" class="form-label">Publish Date</label>
                                        <input type="datetime-local" class="form-control" id="published_at"
                                            name="published_at">
                                        <div class="invalid-feedback" id="published_at_error"></div>
                                        <small class="text-muted">Leave blank for immediate publish</small>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_featured"
                                                name="is_featured" value="1">
                                            <label class="form-check-label" for="is_featured">
                                                Featured Post (shows at top of blog page)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SEO Tab -->
                            <div class="tab-pane fade" id="seo" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            placeholder="SEO title (defaults to post title)">
                                        <div class="invalid-feedback" id="meta_title_error"></div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3"
                                            placeholder="SEO description for search engines"></textarea>
                                        <div class="invalid-feedback" id="meta_description_error"></div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords"
                                            name="meta_keywords" placeholder="keyword1, keyword2, keyword3">
                                        <div class="invalid-feedback" id="meta_keywords_error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-2" id="saveBlogPostBtn">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                    data: 'published_at',
                    name: 'published_at',
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

        // Add Blog Post button
        $('#addBlogPostBtn').click(function() {
            resetForm();
            $('#blogPostModalLabel').text('Add Blog Post');
            $('#form_method').val('');
            // Ensure Content tab is active
            setTimeout(function() {
                $('#content-tab').tab('show');
            }, 100);
        });

        // Form submission
        $('#blogPostForm').submit(function(e) {
            e.preventDefault();

            // Basic validation
            if (!$('#title').val()) {
                // Switch to content tab and focus on title
                $('#content-tab').tab('show');
                setTimeout(function() {
                    $('#title').addClass('is-invalid');
                    $('#title_error').text('Title is required');
                    $('#title').focus();
                }, 100);
                toast.fire({
                    icon: 'error',
                    title: 'Please enter a valid title'
                });
                return false;
            }

            // Get CKEditor content
            if (editor) {
                $('#blog_content').val(editor.getData());
            }

            let formData = new FormData(this);
            let blogPostId = $('#blog_post_id').val();
            let url = blogPostId ? "{{ url('blog-posts') }}/" + blogPostId : "{{ route('blog-posts.store') }}";
            let method = blogPostId ? 'POST' : 'POST';

            if (blogPostId) {
                formData.append('_method', 'PUT');
            }

            // Clear previous errors
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
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
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                        });
                        // Show the first tab with error
                        if (errors.title || errors.slug || errors.excerpt || errors.content || errors
                            .featured_image) {
                            $('#content-tab').tab('show');
                        } else if (errors.category || errors.read_time || errors.status || errors
                            .published_at || errors.is_featured) {
                            $('#settings-tab').tab('show');
                        } else if (errors.meta_title || errors.meta_description || errors
                            .meta_keywords) {
                            $('#seo-tab').tab('show');
                        }
                        toast.fire({
                            icon: 'error',
                            title: 'Please fix the errors'
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
                        $('#slug').val(data.slug);
                        $('#excerpt').val(data.excerpt);

                        // Set CKEditor content
                        if (editor) {
                            editor.setData(data.content || '');
                        }

                        $('#category').val(data.category);
                        $('#read_time').val(data.read_time);
                        $('#status').val(data.status);
                        $('#is_featured').prop('checked', data.is_featured);
                        $('#meta_title').val(data.meta_title);
                        $('#meta_description').val(data.meta_description);
                        $('#meta_keywords').val(data.meta_keywords);

                        if (data.published_at) {
                            let date = new Date(data.published_at);
                            $('#published_at').val(date.toISOString().slice(0, 16));
                        }

                        if (data.featured_image) {
                            $('#current_image').html(
                                `<img src="/storage/${data.featured_image}" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 200px;">`
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
            $('.form-control').removeClass('is-invalid');
            $('.form-select').removeClass('is-invalid');
            $('.invalid-feedback').text('');
            if (editor) {
                editor.setData('');
            }
            // Always reset to first tab
            setTimeout(function() {
                $('#content-tab').tab('show');
            }, 50);
        }

        // Auto-generate slug from title
        $('#title').on('blur', function() {
            if (!$('#slug').val() && $(this).val()) {
                let slug = $(this).val()
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                $('#slug').val(slug);
            }
        });

        // Clear validation on input
        $('#title, #status').on('input change', function() {
            $(this).removeClass('is-invalid');
            $('#' + $(this).attr('id') + '_error').text('');
        });
    </script>
@endsection
