<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Menu</title>
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
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.company-profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Section Key -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Section Key
                            </label>

                            <input type="text" name="section_key" value="{{ old('section_key') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="e.g. mission, vision">

                            @error('section_key')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Title
                            </label>

                            <input type="text" name="title" value="{{ old('title') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter title">

                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Content
                            </label>

                            <textarea name="content" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter description">{{ old('content') }}</textarea>

                            @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Section Type
                            </label>

                            <select name="type"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                                <option value="">Select Type</option>
                                <option value="hero">Hero Section</option>
                                <option value="default">Text Section</option>
                                <option value="list">List (With Points)</option>
                                <option value="image_text">Image + Text</option>

                            </select>

                            @error('type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Image -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Desktop Image (Optional)
                            </label>

                            <input type="file" name="image"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tablet Image (Optional)
                            </label>

                            <input type="file" name="image_md"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                            @error('image_md')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Mobile Image (Optional)
                            </label>

                            <input type="file" name="image_sm"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                            @error('image_sm')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Content Image (Optional)
                            </label>

                            <input type="file" name="content_image"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                            @error('content_image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Points Section -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Points (Optional)</h3>

                        <div id="items-wrapper" class="space-y-3">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 item-row">
                                <input type="text" name="titles[]" class="px-4 py-2 border rounded-lg"
                                    placeholder="Point Title">

                                <input type="text" name="descriptions[]" class="px-4 py-2 border rounded-lg"
                                    placeholder="Description">
                            </div>

                        </div>

                        <!-- Add Button -->
                        <button type="button" onclick="addItem()"
                            class="mt-3 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                            + Add More Points
                        </button>
                    </div>

                    <!-- Submit -->
                    <div class="mt-6 text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Save Section
                        </button>
                    </div>

                </form>

            </div>

        </div>

        <!-- JS for dynamic fields -->
        <script>
            function addItem() {
                let html = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 item-row">
                <input type="text" name="titles[]" class="px-4 py-2 border rounded-lg" placeholder="Point Title">
                <input type="text" name="descriptions[]" class="px-4 py-2 border rounded-lg" placeholder="Description">
            </div>
            `;

                document.getElementById('items-wrapper').insertAdjacentHTML('beforeend', html);
            }
        </script>

    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript"></script>
</body>

</html>
