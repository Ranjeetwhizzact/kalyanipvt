<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Dashboard</title>
    <style>
        input:checked~div.sidebar {
            width: 50px;
        }

        input:checked~div.sidebar~div.main-content {
            margin-left: 50px;
        }

        input:checked~div>div>div img {
            display: none;
        }

        .sidebar {
            transition: width 0.3s ease;
        }

        .main-content {
            transition: margin-left 0.3s ease;
        }

        .dropdown-content {
            display: none;
        }

        /* Show dropdown when the parent div is focused */
        .dropdown:hover .dropdown-content,
        .dropdown:focus-within .dropdown-content {
            display: block;
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

        {{-- Sidebar --}}
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        {{-- Main Content --}}
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
            <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">Page Management</h2>
                <p class="text-gray-600 mt-2">Manage website pages.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md"> <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Pages List</h3> <a href="{{ route('admin.pages.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"> Add Page </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Title</th>
                                <th class="py-3 px-4 border-b">Slug</th>
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $page)
                                <tr class="border-b hover:bg-gray-50 text-sm">
                                    <td class="py-2 px-4"> {{ $loop->iteration }} </td>
                                    <td class="py-2 px-4"> {{ $page->title }} </td>
                                    <td class="py-2 px-4 text-gray-600"> /{{ $page->slug }} </td>
                                    <td class="py-2 px-4"> <span
                                            class="px-2 py-1 rounded text-xs {{ $page->status ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                            {{ $page->status ? 'Active' : 'Inactive' }} </span> </td> <!-- Actions -->
                                    <td class="py-2 px-4 relative">
                                        <div class="relative dropdown inline-block text-left">
                                            <button type="button"
                                                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                Setting
                                            </button>

                                            <div
                                                class="absolute right-0 z-10 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown-content">
                                                <div class="py-1">

                                                    <!-- Page Sections -->
                                                    <a href="{{ route('admin.page-sections.create', encrypt($page->id)) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Page Sections
                                                    </a>

                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.pages.edit', encrypt($page->id)) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Edit
                                                    </a>

                                                    <!-- Delete -->
                                                    <div
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <form
                                                            action="{{ route('admin.pages.destroy', encrypt($page->id)) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this page?');">
                                                            @csrf
                                                            <input type="submit"
                                                                class="cursor-pointer w-full text-left" value="Delete">
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                            </tr> @empty <tr>
                                    <td colspan="5" class="py-4 text-center text-gray-500"> No pages found. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table> <!-- Pagination -->
                    <div class="mt-4"> {{ $pages->links() }} </div>
                </div>
            </div>
        </div>
</body>

</html>
