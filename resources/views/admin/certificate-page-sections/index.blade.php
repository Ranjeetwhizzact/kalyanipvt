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
            <!-- Welcome Section -->
            <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">Welcome, {{ auth()->user()->name ?? 'Guest' }}!</h2>
                <p class="text-gray-600 mt-2">Track and manage your product activities here.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Certificate Page Settings</h3>

                    <button onclick="document.getElementById('certificateModal').classList.remove('hidden')"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Edit Settings
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="border rounded-lg p-4 bg-orange-50">
                        <p class="text-sm text-gray-500">Home Title</p>
                        <h4 class="text-xl font-semibold">
                            {{ $certificateSection->home_title ?? 'QUALITY CERTIFICATION' }}
                        </h4>
                    </div>

                    <div class="border rounded-lg p-4 bg-blue-50">
                        <p class="text-sm text-gray-500">Home Banner</p>

                        @if (!empty($certificateSection->home_banner))
                            <img src="{{ asset($certificateSection->home_banner) }}" class="h-24 rounded border">
                        @else
                            <p class="text-gray-400">No banner uploaded</p>
                        @endif
                    </div>

                </div>
            </div>
            <div id="certificateModal"
                class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">

                <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold">
                            Certificate Page Settings
                        </h3>

                        <button onclick="document.getElementById('certificateModal').classList.add('hidden')"
                            class="text-gray-500 text-2xl">
                            &times;
                        </button>
                    </div>

                    <form action="{{ route('certificate.section.update', encrypt($certificateSection->id)) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-2">
                                Home Title
                            </label>

                            <input type="text" name="home_title"
                                value="{{ old('home_title', $certificateSection->home_title) }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-2">
                                Home Banner
                            </label>

                            <input type="file" name="home_banner" class="w-full border rounded-lg px-3 py-2">

                            @if (!empty($certificateSection->home_banner))
                                <img src="{{ asset($certificateSection->home_banner) }}"
                                    class="h-24 mt-3 rounded border">
                            @endif
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button"
                                onclick="document.getElementById('certificateModal').classList.add('hidden')"
                                class="bg-gray-500 text-white px-4 py-2 rounded">
                                Cancel
                            </button>

                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                                Save
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Certificate Management</h3>
                    <a href="{{ route('admin.certificate.page-sections.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add Certificate
                    </a>
                </div>

                <div class="overflow-x-auto overflow-y-visible relative">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Title</th>
                                <th class="py-3 px-4 border-b">Home Image</th>
                                <th class="py-3 px-4 border-b">Page Image</th>
                                <th class="py-3 px-4 border-b">Sequnece No</th>
                                <th class="py-3 px-4 border-b">Image Position</th>
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($sections as $section)
                                <tr class="border-b hover:bg-gray-50 text-sm">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 font-medium">
                                        {{ $section->title }}
                                    </td>

                                    <td class="py-2 px-4">
                                        @if ($section->home_image)
                                            <img src="{{ asset($section->home_image) }}"
                                                class="h-10 w-10 rounded object-cover">
                                        @endif
                                    </td>

                                    <td class="py-2 px-4">
                                        @if ($section->page_image)
                                            <img src="{{ asset($section->page_image) }}"
                                                class="h-10 w-10 rounded object-cover">
                                        @endif
                                    </td>

                                    <td class="py-2 px-4">
                                        {{ $section->order }}
                                    </td>

                                    <td class="py-2 px-4 capitalize">
                                        {{ $section->image_position }}
                                    </td>

                                    <td class="py-2 px-4 capitalize">
                                        <span
                                            class="px-2 py-1 rounded text-xs
                                            {{ $section->is_active ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }}">
                                            {{ $section->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <td class="py-2 px-4 relative overflow-visible">
                                        <div class="relative dropdown inline-block text-left">
                                            <!-- Button -->
                                            <button type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                Setting
                                            </button>

                                            <!-- Dropdown Content -->
                                            <div class="absolute right-0 z-10 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown-content"
                                                role="menu" aria-orientation="vertical" tabindex="-1">

                                                <div class="py-1" role="none">

                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.certificate.page-sections.edit', encrypt($section->id)) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                        role="menuitem">
                                                        Edit
                                                    </a>

                                                    <!-- Delete -->
                                                    <div class="block px-4 py-2 cursor-pointer text-sm text-gray-700 hover:bg-gray-100"
                                                        role="menuitem">

                                                        <form
                                                            action="{{ route('admin.certificate.page-sections.destroy', encrypt($section->id)) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this page section?');"
                                                            class="inline-block w-full h-full">
                                                            @csrf
                                                            <input type="submit"
                                                                class="cursor-pointer w-full text-start"
                                                                value="Delete">
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="9" class="py-4 text-center text-gray-500">
                                        No page sections found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $sections->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>


</html>
