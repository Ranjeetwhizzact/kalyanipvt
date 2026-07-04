<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Category Management - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/Content/Site.css') }}" rel="stylesheet" type="text/css" />
    <style>
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

        @media (min-width: 640px) {
            .sidebar span {
                display: inline;
            }
        }

        /* Custom styles for image preview */
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

        .preview-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 2px solid #e5e7eb;
        }

        .preview-image-large {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 2px solid #e5e7eb;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
            <!-- Welcome Section -->
            <div class="bg-white p-6 rounded-lg shadow-md max-w-6xl mx-auto mt-6">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">
                            @if (isset($category->id))
                                <i class="ri-edit-line mr-2 text-blue-500"></i>Edit Category
                            @else
                                <i class="ri-add-line mr-2 text-green-500"></i>Add New Category
                            @endif
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            @if (isset($category->id))
                                Update the category details below
                            @else
                                Fill in the details to create a new category
                            @endif
                        </p>
                    </div>
                    <a href="{{ url('category-list') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors flex items-center gap-2">
                        <i class="ri-arrow-left-line"></i>
                        Back to List
                    </a>
                </div>

                <!-- Success Message -->
                @if (session('status') == 'success')
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded relative mb-6 flex items-center"
                        role="alert">
                        <i class="ri-checkbox-circle-line text-green-500 text-xl mr-3"></i>
                        <div>
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('msg') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded relative mb-6">
                        <div class="flex items-center mb-2">
                            <i class="ri-error-warning-line text-red-500 text-xl mr-3"></i>
                            <strong class="font-bold">Please fix the following errors:</strong>
                        </div>
                        <ul class="list-disc list-inside text-sm ml-6">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ isset($category->id) ? url('updatecategory/' . $category->id) : url('storecategory') }}"
                    method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if (isset($category->id))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="id" value="{{ isset($category->id) ? $category->id : '' }}">

                    <!-- Image Upload Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Main Image Upload -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                <i class="ri-image-line mr-1"></i>Category Image
                            </label>
                            <div class="flex items-center space-x-4">
                                <div class="image-preview-container">
                                    <img src="{{ isset($category->img) && $category->img ? asset('storage/' . $category->img) : asset('backend/assests/img/default-category.png') }}"
                                        alt="Category Image" class="preview-image-large" id="selectedImage"
                                        onerror="this.src='{{ asset('backend/assests/img/default-category.png') }}'">
                                    <div class="overlay" onclick="document.getElementById('fileInput').click()">
                                        <i class="ri-upload-line text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 mb-2">Recommended size: 200x200px</p>
                                    <label for="fileInput"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 cursor-pointer inline-block">
                                        <i class="ri-upload-line mr-1"></i> Choose Image
                                    </label>
                                    <input type="file" name="img" id="fileInput" class="hidden" accept="image/*"
                                        {{ !isset($category->id) ? 'required' : '' }}>
                                    <p class="text-xs text-gray-400 mt-2" id="selectedFileName"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Icon Image Upload -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                <i class="ri-image-line mr-1"></i>Category Icon
                            </label>
                            <div class="flex items-center space-x-4">
                                <div class="image-preview-container">
                                    <img src="{{ isset($category->icon) && $category->icon ? asset('storage/' . $category->icon) : asset('backend/assests/img/default-icon.png') }}"
                                        alt="Category Icon" class="preview-image-large" id="selectedImageicon"
                                        onerror="this.src='{{ asset('backend/assests/img/default-icon.png') }}'">
                                    <div class="overlay" onclick="document.getElementById('fileInputicon').click()">
                                        <i class="ri-upload-line text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 mb-2">Recommended size: 64x64px</p>
                                    <label for="fileInputicon"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 cursor-pointer inline-block">
                                        <i class="ri-upload-line mr-1"></i> Choose Icon
                                    </label>
                                    <input type="file" name="icon" id="fileInputicon" class="hidden"
                                        accept="image/*" {{ !isset($category->id) ? 'required' : '' }}>
                                    <p class="text-xs text-gray-400 mt-2" id="selectedIconFileName"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Category Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="ri-price-tag-3-line mr-1"></i>Category Name <span
                                    class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', isset($category->name) ? $category->name : '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Enter category name" required />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="ri-checkbox-circle-line mr-1"></i>Status <span class="text-red-500">*</span>
                            </label>
                            <select id="status" name="is_active"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="" disabled {{ !isset($category->is_active) ? 'selected' : '' }}>
                                    Select category status</option>
                                <option value="active"
                                    {{ old('is_active', isset($category->is_active) ? $category->is_active : '') == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ old('is_active', isset($category->is_active) ? $category->is_active : '') == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            @error('is_active')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="md:col-span-2">
                            <label for="short_discription" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="ri-file-text-line mr-1"></i>Short Description <span
                                    class="text-red-500">*</span>
                            </label>
                            <textarea id="short_discription" name="short_discription" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter a brief description of the category" required>{{ old('short_discription', isset($category->short_discription) ? $category->short_discription : '') }}</textarea>
                            @error('short_discription')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Full Description -->
                        <div class="md:col-span-2">
                            <label for="discription" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="ri-file-copy-line mr-1"></i>Full Description <span
                                    class="text-red-500">*</span>
                            </label>
                            <textarea id="discription" name="discription" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter detailed description of the category" required>{{ old('discription', isset($category->discription) ? $category->discription : '') }}</textarea>
                            @error('discription')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-4 border-t">
                        <button type="reset"
                            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                            <i class="ri-refresh-line mr-1"></i>Reset
                        </button>
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors flex items-center">
                            <i class="ri-save-line mr-1"></i>
                            {{ isset($category->id) ? 'Update Category' : 'Save Category' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>

    <script>
        function previewImage(inputId, imgId, fileNameId) {
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);
            const fileNameDisplay = document.getElementById(fileNameId);

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    // Check file type
                    if (!file.type.startsWith('image/')) {
                        alert('Please select a valid image file (JPEG, PNG, GIF, etc.)');
                        input.value = '';
                        if (fileNameDisplay) fileNameDisplay.textContent = '';
                        return;
                    }

                    // Check file size (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('File size must be less than 2MB');
                        input.value = '';
                        if (fileNameDisplay) fileNameDisplay.textContent = '';
                        return;
                    }

                    // Display file name
                    if (fileNameDisplay) {
                        fileNameDisplay.textContent = 'Selected: ' + file.name;
                    }

                    // Preview image
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    if (fileNameDisplay) fileNameDisplay.textContent = '';
                }
            });
        }

        // Initialize preview for both file inputs
        previewImage('fileInput', 'selectedImage', 'selectedFileName');
        previewImage('fileInputicon', 'selectedImageicon', 'selectedIconFileName');

        // Form reset functionality
        document.querySelector('button[type="reset"]').addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            form.reset();

            // Reset images to original
            @if (isset($category->id))
                document.getElementById('selectedImage').src =
                    "{{ isset($category->img) && $category->img ? asset('storage/' . $category->img) : asset('backend/assests/img/default-category.png') }}";
                document.getElementById('selectedImageicon').src =
                    "{{ isset($category->icon) && $category->icon ? asset('storage/' . $category->icon) : asset('backend/assests/img/default-icon.png') }}";
            @else
                document.getElementById('selectedImage').src =
                    "{{ asset('backend/assests/img/default-category.png') }}";
                document.getElementById('selectedImageicon').src =
                    "{{ asset('backend/assests/img/default-icon.png') }}";
            @endif

            document.getElementById('selectedFileName').textContent = '';
            document.getElementById('selectedIconFileName').textContent = '';
        });

        // Initialize Cleditor if needed
        $(document).ready(function() {
            if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
                $("#discription").cleditor();
                $("#short_discription").cleditor();
            }
        });
    </script>
</body>

</html>
