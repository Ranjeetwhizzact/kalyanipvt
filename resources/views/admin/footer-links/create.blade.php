<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Footer Link</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    @include('admin.common.sidenav')
    @include('admin.common.toster')

    <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto mt-10">
            <h2 class="text-2xl font-semibold mb-6">Add Footer Link</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif

            <form action="{{ route('admin.footer-links.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Link Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full px-4 py-2 border rounded-lg @error('title') border-red-500 @enderror"
                        placeholder="e.g. Home">
                    @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">URL</label>
                    <input type="text" name="url" value="{{ old('url') }}"
                        class="w-full px-4 py-2 border rounded-lg @error('url') border-red-500 @enderror"
                        placeholder="e.g. /about or https://example.com">
                    @error('url')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Column Group</label>
                    <select name="column_group" class="w-full px-4 py-2 border rounded-lg @error('column_group') border-red-500 @enderror">
                        <option value="">-- Select Column --</option>
                        <option value="1" {{ old('column_group') == '1' ? 'selected' : '' }}>Column 1 (Left)</option>
                        <option value="2" {{ old('column_group') == '2' ? 'selected' : '' }}>Column 2 (Right)</option>
                    </select>
                    @error('column_group')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                        class="w-full px-4 py-2 border rounded-lg" placeholder="0">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Status</label>
                    <select name="is_active" class="w-full px-4 py-2 border rounded-lg">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                        Save Link
                    </button>
                    <a href="{{ route('admin.footer-links.index') }}"
                        class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
