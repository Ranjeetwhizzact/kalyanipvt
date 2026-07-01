<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Post Management</title>

    <!-- Load Tailwind FIRST -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Then Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Your existing CSS (remove if not needed) -->
    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/Content/Site.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/Content/Site.css') }}" rel="stylesheet" type="text/css" />
    <style>
        /* Sidebar transitions - KEEP THESE */
        input:checked~div.sidebar {
            width: 50px;
        }

        input:checked~div>div>div img {
            display: none;
        }

        input:checked~div.sidebar~div.main-content {
            margin-left: 50px;
        }

        .sidebar {
            transition: width 0.3s ease;
        }

        .main-content {
            transition: margin-left 0.3s ease;
        }

        @media (max-width: 640px) {
            .sidebar span {
                display: none;
            }
        }

        /* Image preview container - KEEP THESE */
        .image-preview-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .image-preview-container:hover .overlay {
            opacity: 1;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 0.5rem;
        }

        .preview-image-large {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 2px solid #e5e7eb;
        }

        /* REMOVE ALL @apply DIRECTIVES - they don't work in regular CSS */
        /* Instead use regular CSS classes */
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        <!-- Main Content -->
        <div class="main-content flex-1 overflow-y-auto p-6 ml-64 transition-all duration-300">
            <div class="max-w-7xl mx-auto">
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            @if (isset($blog->id))
                                <i class="ri-edit-box-line text-blue-500 mr-2 align-middle"></i>
                                <span class="align-middle">Edit Blog Post</span>
                            @else
                                <i class="ri-file-copy-line text-green-500 mr-2 align-middle"></i>
                                <span class="align-middle">Create New Blog Post</span>
                            @endif
                        </h1>
                        <p class="text-gray-500 text-sm mt-1">
                            @if (isset($blog->id))
                                Update your blog post content and settings
                            @else
                                Share your thoughts with the world
                            @endif
                        </p>
                    </div>
                    <a href="{{ url('viewbloglist') }}"
                        class="mt-3 sm:mt-0 inline-flex items-center px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors">
                        <i class="ri-arrow-left-line mr-2"></i> Back to List
                    </a>
                </div>

                <!-- Success Message -->
                @if (session('status') == 'success')
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 flex items-start shadow-sm"
                        role="alert">
                        <i class="ri-checkbox-circle-line text-green-500 text-xl mr-3 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="font-bold block">Success!</strong>
                            <span>{{ session('msg') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 shadow-sm">
                        <div class="flex items-start mb-2">
                            <i class="ri-error-warning-line text-red-500 text-xl mr-3 flex-shrink-0 mt-0.5"></i>
                            <strong class="font-bold">Please fix the following errors:</strong>
                        </div>
                        <ul class="list-disc list-inside text-sm ml-8 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Main Form -->
                <form action="{{ route('admin.blog-posts.update', $blog->id ?? null) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ isset($blog->id) ? $blog->id : '' }}">

                    <!-- Grid Layout - 2 columns on large screens -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left Column - Main Content (2/3 width) -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Featured Image Card -->
                            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        <i class="ri-image-line mr-2 text-blue-500"></i>
                                        Featured Image
                                    </h3>
                                </div>
                                <div class="p-6">
                                    <div
                                        class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-6">
                                        <!-- Image Preview -->
                                        <div class="image-preview-container flex-shrink-0">
                                            <img src="{{ asset($blog->featured_image ?? 'https://placehold.co/600x400?text=Blog+Image') }}"
                                                alt="Blog Image" class="preview-image-large" id="selectedImage"
                                                onerror="this.src='https://placehold.co/600x400?text=Blog+Image'">
                                            <div class="overlay" onclick="document.getElementById('fileInput').click()">
                                                <i class="ri-upload-line text-2xl"></i>
                                            </div>
                                        </div>

                                        <!-- Upload Controls -->
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-600 mb-2">Recommended size: 1200 x 800 pixels
                                            </p>
                                            <div class="flex items-center space-x-3">
                                                <label for="fileInput"
                                                    class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 cursor-pointer transition-colors inline-flex items-center">
                                                    <i class="ri-upload-cloud-line mr-2"></i>
                                                    Choose Image
                                                </label>
                                                <span class="text-sm text-gray-500" id="selectedFileName">No file
                                                    chosen</span>
                                            </div>
                                            <input type="file" name="featured_image" id="fileInput" class="hidden"
                                                accept="image/*" {{ !isset($blog->id) ? 'required' : '' }}>
                                            <p class="text-xs text-gray-400 mt-2">Supported formats: JPG, PNG, GIF (Max
                                                2MB)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog Content Card -->
                            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        <i class="ri-article-line mr-2 text-blue-500"></i>
                                        Blog Content
                                    </h3>
                                </div>
                                <div class="p-6 space-y-4">
                                    <!-- Title -->
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                            Title <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="title" name="title"
                                            value="{{ old('title', isset($blog->title) ? $blog->title : '') }}"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter an attention-grabbing title" required />
                                        @error('title')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Slug -->
                                    <div>
                                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug
                                            (URL)</label>
                                        <div class="flex">
                                            <input type="text" id="slug" name="slug"
                                                value="{{ old('slug', isset($blog->slug) ? $blog->slug : '') }}"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="auto-generated-from-title">
                                            <button type="button" id="generateSlug"
                                                class="px-4 py-2 bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg hover:bg-gray-200 transition-colors">
                                                <i class="ri-refresh-line"></i>
                                            </button>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Leave empty to auto-generate from title
                                        </p>
                                        @error('slug')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Excerpt -->
                                    <div>
                                        <label for="excerpt"
                                            class="block text-sm font-medium text-gray-700 mb-2">Excerpt (Short
                                            Summary)</label>
                                        <textarea id="excerpt" name="summary" rows="3"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Write a brief summary of your blog post">{{ old('excerpt', isset($blog->summary) ? $blog->summary : '') }}</textarea>
                                        <p class="text-xs text-gray-500 mt-1">Recommended: 150-160 characters for SEO
                                        </p>
                                        @error('excerpt')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Content -->
                                    <div>
                                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                            Content <span class="text-red-500">*</span>
                                        </label>
                                        <textarea id="content" name="content" rows="15"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Write your blog post content here...">{{ old('content', isset($blog->content) ? $blog->content : '') }}</textarea>
                                        @error('content')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Sidebar (1/3 width) -->
                        <div class="space-y-6">
                            <!-- Publish Settings Card -->
                            {{-- <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                  <h3 class="text-lg font-semibold text-gray-800">
                    <i class="ri-settings-line mr-2 text-blue-500"></i>
                    Publish Settings
                  </h3>
                </div>
                <div class="p-6 space-y-4">
                  <!-- Status -->
                  <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="status"
                            name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                      <option value="" disabled {{ !isset($blog->status) ? 'selected' : '' }}>Select status</option>
                      <option value="draft" {{ (old('status', isset($blog->status) ? $blog->status : '') == 'draft') ? 'selected' : '' }}>Draft</option>
                      <option value="published" {{ (old('status', isset($blog->status) ? $blog->status : '') == 'published') ? 'selected' : '' }}>Published</option>
                      <option value="archived" {{ (old('status', isset($blog->status) ? $blog->status : '') == 'archived') ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')
                      <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                  <!-- Publish Date -->

                </div>
              </div> --}}

                            <!-- Category & Author Card -->
                            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        <i class="ri-price-tag-3-line mr-2 text-blue-500"></i>
                                        Category & Author
                                    </h3>
                                </div>
                                <div class="p-6 space-y-4">
                                    <!-- Category -->
                                    <div>
                                        <label for="category_id"
                                            class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                        <select id="category_id" name="category_id"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">Select Category</option>
                                            @foreach ($categories ?? [] as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', isset($blog->category_id) ? $blog->category_id : '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Author -->
                                    <div>
                                        <label for="author_id"
                                            class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                                        <select id="author_id" name="author_id"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">Select Author</option>
                                            @foreach ($authors ?? [] as $author)
                                                <option value="{{ $author->id }}"
                                                    {{ old('author_id', isset($blog->author_id) ? $blog->author_id : '') == $author->id ? 'selected' : '' }}>
                                                    {{ $author->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('author_id')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="is_active"
                                            class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                        <select id="is_active" name="is_active"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                            <option value="active"
                                                {{ old('is_active', $blog->is_active ?? '') == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="inactive"
                                                {{ old('is_active', $blog->is_active ?? '') == 'inactive' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                        </select>

                                        @error('is_active')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Reading Time -->
                                    <div>
                                        <label for="reading_time"
                                            class="block text-sm font-medium text-gray-700 mb-2">Reading Time
                                            (minutes)</label>
                                        <input type="number" id="reading_time" name="reading_time"
                                            value="{{ old('reading_time', isset($blog->reading_time) ? $blog->reading_time : '') }}"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Auto-calculated">
                                        @error('reading_time')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tags Card -->


                            <!-- SEO Settings Card -->
                            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        <i class="ri-search-line mr-2 text-blue-500"></i>
                                        SEO Settings
                                    </h3>
                                </div>
                                <div class="p-6 space-y-4">
                                    <!-- Meta Title -->
                                    <div>
                                        <label for="meta_title"
                                            class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                        <input type="text" id="meta_title" name="meta_title"
                                            value="{{ old('meta_title', isset($blog->meta_title) ? $blog->meta_title : '') }}"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="SEO title" maxlength="60">
                                        <p class="text-xs text-gray-500 mt-1">Recommended: 50-60 characters</p>
                                        @error('meta_title')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Meta Description -->
                                    <div>
                                        <label for="meta_description"
                                            class="block text-sm font-medium text-gray-700 mb-2">Meta
                                            Description</label>
                                        <textarea id="meta_description" name="meta_description" rows="2"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Brief description for search engines" maxlength="160">{{ old('meta_description', isset($blog->meta_description) ? $blog->meta_description : '') }}</textarea>
                                        <p class="text-xs text-gray-500 mt-1">Recommended: 150-160 characters</p>
                                        @error('meta_description')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Meta Keywords -->
                                    <div>
                                        <label for="meta_keywords"
                                            class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                                        <input type="text" id="meta_keywords" name="meta_keywords"
                                            value="{{ old('meta_keywords', isset($blog->meta_keywords) ? $blog->meta_keywords : '') }}"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter keywords separated by commas">
                                        @error('meta_keywords')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="flex flex-col space-y-3">
                                <button type="submit"
                                    class="w-full px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors inline-flex items-center justify-center">
                                    <i class="ri-save-line mr-2"></i>
                                    {{ isset($blog->id) ? 'Update Blog Post' : 'Publish Blog Post' }}
                                </button>

                                {{-- @if (!isset($blog->id))
                  <button type="submit" name="save_draft" value="1" class="w-full px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors inline-flex items-center justify-center">
                    <i class="ri-draft-line mr-2"></i>
                    Save as Draft
                  </button>
                @endif --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Ckeditor
            if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
                $("#excerpt").cleditor();
                $("#content").cleditor();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Auto-generate slug
            $('#title').on('input', function() {
                if (!$('#slug').val()) {
                    let slug = $(this).val()
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/--+/g, '-')
                        .trim();
                    $('#slug').val(slug);
                }
            });

            $('#generateSlug').on('click', function() {
                let title = $('#title').val();
                let slug = title
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/--+/g, '-')
                    .trim();
                $('#slug').val(slug);
            });
        });

        // Image preview
        function previewImage(inputId, imgId, fileNameId) {
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);
            const fileNameDisplay = document.getElementById(fileNameId);

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    if (!file.type.startsWith('image/')) {
                        alert('Please select a valid image file');
                        input.value = '';
                        return;
                    }
                    if (file.size > 2 * 1024 * 1024) {
                        alert('File size must be less than 2MB');
                        input.value = '';
                        return;
                    }
                    fileNameDisplay.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        previewImage('fileInput', 'selectedImage', 'selectedFileName');
    </script>
</body>

</html>
