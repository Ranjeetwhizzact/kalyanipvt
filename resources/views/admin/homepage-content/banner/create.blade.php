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

                    <!-- Banner Image -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Banner Image</label>
                        <input type="file" name="banner_image"
                            class="w-full px-4 py-2 border rounded-lg @error('banner_image') border-red-500 @enderror">

                        @error('banner_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
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
            ```

        </div>

    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript"></script>
</body>

</html>
