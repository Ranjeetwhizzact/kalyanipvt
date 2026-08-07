<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    @include('admin.common.sidenav')
    @include('admin.common.toster')

    <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

        <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">Blog Page Settings</h2>
            <p class="text-gray-600 mt-2">Manage the heading and description shown at the top of the Blog list page.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
            <form action="{{ route('admin.blog-page-settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Heading (first part)</label>
                    <input type="text" name="title" value="{{ old('title', $setting->title) }}"
                        class="w-full px-4 py-2 border rounded-lg @error('title') border-red-500 @enderror"
                        placeholder="Our">
                    <p class="text-xs text-gray-500 mt-1">The plain-coloured part of the heading, e.g. "Our".</p>
                    @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Heading (highlighted part)</label>
                    <input type="text" name="title_highlight" value="{{ old('title_highlight', $setting->title_highlight) }}"
                        class="w-full px-4 py-2 border rounded-lg @error('title_highlight') border-red-500 @enderror"
                        placeholder="Latest Insights">
                    <p class="text-xs text-gray-500 mt-1">The orange-highlighted part of the heading, e.g. "Latest Insights".</p>
                    @error('title_highlight')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Description / Subtitle</label>
                    <textarea name="subtitle" rows="4"
                        class="w-full px-4 py-2 border rounded-lg @error('subtitle') border-red-500 @enderror"
                        placeholder="Stay updated with the latest trends...">{{ old('subtitle', $setting->subtitle) }}</textarea>
                    @error('subtitle')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
                    Save Blog Page Settings
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
