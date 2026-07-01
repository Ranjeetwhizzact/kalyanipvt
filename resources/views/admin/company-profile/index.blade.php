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

            <!-- Header -->
            <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">
                    Welcome, {{ auth()->user()->name ?? 'Admin' }}!
                </h2>
                <p class="text-gray-600 mt-2">
                    Manage your Company Profile Sections here.
                </p>
            </div>

            <!-- Table Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Company Profile Management</h3>

                    <a href="{{ route('admin.company-profile.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add Section
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">

                        <!-- Table Head -->
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Section Key</th>
                                <th class="py-3 px-4 border-b">Title</th>
                                <th class="py-3 px-4 border-b">Content</th>
                                <th class="py-3 px-4 border-b">Points</th>
                                <th class="py-3 px-4 border-b">Image</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @forelse ($sections as $section)
                                <tr class="border-b hover:bg-gray-50 text-sm">

                                    <!-- ID -->
                                    <td class="py-2 px-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <!-- Section Key -->
                                    <td class="py-2 px-4 font-medium">
                                        {{ $section->section_key }}
                                    </td>

                                    <!-- Title -->
                                    <td class="py-2 px-4">
                                        {{ $section->title }}
                                    </td>

                                    <!-- Content (short preview) -->
                                    <td class="py-2 px-4">
                                        {{ \Illuminate\Support\Str::limit($section->content, 50) }}
                                    </td>

                                    <!-- Points Count -->
                                    <td class="py-2 px-4">
                                        <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs">
                                            {{ $section->items->count() }} Points
                                        </span>
                                    </td>

                                    <!-- Image -->
                                    <td class="py-2 px-4">
                                        @if ($section->image)
                                            <img src="{{ asset($section->image) }}"
                                                class="h-10 w-10 rounded object-cover">
                                        @else
                                            <span class="text-gray-400 text-xs">No Image</span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-2 px-4 relative">

                                        <div class="relative dropdown inline-block text-left">

                                            <!-- Button -->
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                Settings
                                            </button>

                                            <!-- Dropdown -->
                                            <div
                                                class="absolute right-0 z-10 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown-content">

                                                <div class="py-1">

                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.company-profile.edit', $section->id) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Edit
                                                    </a>

                                                    <!-- Delete -->
                                                    <form action="{{ route('admin.company-profile.delete', $section->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this section?');">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
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
                                    <td colspan="7" class="py-4 text-center text-gray-500">
                                        No sections found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $sections->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>
</body>


</html>
