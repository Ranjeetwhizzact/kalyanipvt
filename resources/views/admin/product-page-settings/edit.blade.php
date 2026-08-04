<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    @include('admin.common.sidenav')
    @include('admin.common.toster')

    <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

        <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">Product Page Settings</h2>
            <p class="text-gray-600 mt-2">Manage the title, description, and header image of the Products page.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
            <form action="{{ route('admin.product-page-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Page Title</label>
                    <textarea id="title" name="title" rows="3"
                        class="w-full px-4 py-2 border rounded-lg @error('title') border-red-500 @enderror"
                        placeholder="Products We Offer for your Agriculture Solution" required>{{ old('title', $setting->title) }}</textarea>
                    @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Page Description / Subtitle</label>
                    <textarea id="subtitle" name="subtitle" rows="6"
                        class="w-full px-4 py-2 border rounded-lg @error('subtitle') border-red-500 @enderror"
                        placeholder="Enter description here..." required>{{ old('subtitle', $setting->subtitle) }}</textarea>
                    @error('subtitle')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Header Image</label>
                    
                    @if ($setting->image)
                        <div class="mb-3">
                            <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                            <img src="{{ asset($setting->image) }}" class="h-40 w-auto object-cover rounded-lg shadow-md border" alt="Header Image">
                        </div>
                    @endif

                    <input type="file" name="image" 
                        class="w-full px-4 py-2 border rounded-lg @error('image') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Recommended: high resolution landscape image (JPEG, PNG, GIF, max 2MB).</p>
                    @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-6 flex items-center">
                    <input type="hidden" name="show_home_button" value="0">
                    <input type="checkbox" name="show_home_button" id="show_home_button" value="1" 
                        {{ old('show_home_button', $setting->show_home_button) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="show_home_button" class="ml-2 block text-sm font-medium text-gray-900">Show "Home" Navigator Button on Products page</label>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
                    Save Product Page Settings
                </button>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
            $("#title").cleditor({
                width: "100%",
                height: "120px"
            });
            $("#subtitle").cleditor({
                width: "100%",
                height: "250px"
            });
        }
    });
</script>
</body>
</html>
