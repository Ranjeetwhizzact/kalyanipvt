<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Home Page Content</title>
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
    </style>

</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

                <h2 class="text-2xl font-semibold mb-6">Add Banner</h2>

                <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Banner Type -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Banner Type</label>
                        <select id="banner_type" name="banner_type" class="w-full px-4 py-2 border rounded-lg">
                            <option value="slider" {{ old('banner_type') == 'slider' ? 'selected' : '' }}>Slider Image Banner</option>
                            <option value="text_only" {{ old('banner_type') == 'text_only' ? 'selected' : '' }}>Text-Only Section Title (No Image)</option>
                        </select>
                    </div>

                    <!-- Banner Image -->
                    <div id="image_field_container" class="mb-4">
                        <label class="block text-sm font-medium mb-2">Banner Image</label>
                        <input type="file" id="banner_image_input" name="banner_image"
                            class="w-full px-4 py-2 border rounded-lg @error('banner_image') border-red-500 @enderror">

                        @error('banner_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Text-Only Notice -->
                    <div id="text_only_notice" class="mb-4 hidden">
                        <div class="p-3 bg-blue-50 border border-blue-200 rounded-lg text-sm text-blue-700 flex items-start gap-2">
                            <i class="ri-information-line text-lg mt-0.5"></i>
                            <div>
                                <strong class="font-semibold">Text-Only Section Title:</strong>
                                This entry manages the products section title and description text. No image is required or displayed on the frontend.
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full px-4 py-2 border rounded-lg @error('title') border-red-500 @enderror">

                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subtitle -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle') }}"
                            class="w-full px-4 py-2 border rounded-lg @error('subtitle') border-red-500 @enderror">

                        @error('subtitle')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Link</label>
                        <input type="text" name="link" value="{{ old('link') }}"
                            class="w-full px-4 py-2 border rounded-lg @error('link') border-red-500 @enderror">

                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Display Order -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Display Order</label>
                        <input type="number" name="display_order" value="{{ old('display_order', 1) }}"
                            class="w-full px-4 py-2 border rounded-lg @error('display_order') border-red-500 @enderror">

                        @error('display_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="is_active" class="w-full px-4 py-2 border rounded-lg">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Save Banner
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const bannerTypeSelect = document.getElementById('banner_type');
            const imageFieldContainer = document.getElementById('image_field_container');
            const bannerImageInput = document.getElementById('banner_image_input');
            const textOnlyNotice = document.getElementById('text_only_notice');

            if (!bannerTypeSelect || !imageFieldContainer) {
                return;
            }

            function toggleFields() {
                if (bannerTypeSelect.value === 'text_only') {
                    imageFieldContainer.style.display = 'none';
                    if (bannerImageInput) {
                        bannerImageInput.value = '';
                    }
                    if (textOnlyNotice) {
                        textOnlyNotice.style.display = 'block';
                        textOnlyNotice.classList.remove('hidden');
                    }
                } else {
                    imageFieldContainer.style.display = 'block';
                    if (textOnlyNotice) {
                        textOnlyNotice.style.display = 'none';
                    }
                }
            }

            bannerTypeSelect.addEventListener('change', toggleFields);
            toggleFields();
        });
    </script>
</body>

</html>
