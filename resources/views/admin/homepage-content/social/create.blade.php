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

        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

                <h2 class="text-2xl font-semibold mb-6">Add Social Media Link</h2>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.social.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <!-- Platform Name -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Platform Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                            placeholder="Example: Facebook">

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profile URL -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Profile URL</label>
                        <input type="url" name="url" value="{{ old('url') }}"
                            class="w-full px-4 py-2 border rounded-lg @error('url') border-red-500 @enderror"
                            placeholder="https://facebook.com/yourpage">

                        @error('url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Upload Icon Image</label>
                        <input type="file" name="icon" id="icon" class="w-full border p-2 rounded"
                            accept="image/*">

                        <!-- Preview -->
                        <div
                            class="w-32 h-32 border mt-3 rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                            <img id="icon_preview" class="hidden max-h-full max-w-full object-contain">
                        </div>
                    </div>

                    <!-- Display Order -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Display Order</label>
                        <input type="number" name="display_order" value="{{ old('display_order') }}"
                            class="w-full px-4 py-2 border rounded-lg" placeholder="1">
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="is_active" class="w-full px-4 py-2 border rounded-lg">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Save Social Link
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript"></script>
</body>

<!-- Image Preview Script -->
<script>
    document.getElementById('icon').addEventListener('change', function(event) {
        const preview = document.getElementById('icon_preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });
</script>

</html>
