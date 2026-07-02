<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Links</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    @include('admin.common.sidenav')
    @include('admin.common.toster')

    <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

        <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">Footer Links Management</h2>
            <p class="text-gray-600 mt-2">Manage footer navigation links, their order and column placement.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Footer Links List</h3>
                <a href="{{ route('admin.footer-links.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Add Footer Link
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                            <th class="py-3 px-4 border-b">#</th>
                            <th class="py-3 px-4 border-b">Title</th>
                            <th class="py-3 px-4 border-b">URL</th>
                            <th class="py-3 px-4 border-b">Column</th>
                            <th class="py-3 px-4 border-b">Order</th>
                            <th class="py-3 px-4 border-b">Status</th>
                            <th class="py-3 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($links as $link)
                            <tr class="border-b hover:bg-gray-50 text-sm">
                                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 font-medium">{{ $link->title }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ $link->url }}" target="_blank" class="text-blue-500 underline">
                                        {{ Str::limit($link->url, 40) }}
                                    </a>
                                </td>
                                <td class="py-2 px-4">Column {{ $link->column_group }}</td>
                                <td class="py-2 px-4">{{ $link->sort_order }}</td>
                                <td class="py-2 px-4">
                                    <span class="px-2 py-1 rounded text-xs
                                        {{ $link->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                        {{ $link->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="py-2 px-4 relative overflow-visible">
                                    <div class="relative inline-block text-left">
                                        <button type="button" onclick="toggleDropdown(this)"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            Setting
                                        </button>
                                        <div class="hidden absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 dropdown-menu">
                                            <div class="py-1">
                                                <a href="{{ route('admin.footer-links.edit', encrypt($link->id)) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.footer-links.destroy', encrypt($link->id)) }}"
                                                    method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 text-center text-gray-500">No footer links found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleDropdown(button) {
        const menu = button.parentElement.querySelector('.dropdown-menu');
        document.querySelectorAll('.dropdown-menu').forEach(d => { if (d !== menu) d.classList.add('hidden'); });
        menu.classList.toggle('hidden');
    }
    window.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            document.querySelectorAll('.dropdown-menu').forEach(d => d.classList.add('hidden'));
        }
    });
</script>
</body>
</html>
