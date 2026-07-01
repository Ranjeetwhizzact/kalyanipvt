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
                <h2 class="text-2xl font-bold">Social Media Management</h2>
                <p class="text-gray-600 mt-2">Manage your social media links here.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Social Media List</h3>

                    <a href="{{ route('admin.social.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add Social Link
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Icon</th>
                                <th class="py-3 px-4 border-b">Name</th>
                                <th class="py-3 px-4 border-b">URL</th>
                                <th class="py-3 px-4 border-b">Order</th>
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($socials as $social)
                                <tr class="border-b hover:bg-gray-50 text-sm">

                                    <!-- ID -->
                                    <td class="py-2 px-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <!-- Icon -->
                                    <td class="py-2 px-4">
                                        @if ($social->icon)
                                            <img src="{{ asset($social->icon) }}"
                                                class="h-10 w-10 rounded object-cover">
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <!-- Name -->
                                    <td class="py-2 px-4 font-medium">
                                        {{ $social->name }}
                                    </td>

                                    <!-- URL -->
                                    <td class="py-2 px-4">
                                        <a href="{{ $social->url }}" target="_blank" class="text-blue-500 underline">
                                            Visit
                                        </a>
                                    </td>

                                    <!-- Display Order -->
                                    <td class="py-2 px-4">
                                        {{ $social->display_order }}
                                    </td>

                                    <!-- Status -->
                                    <td class="py-2 px-4">
                                        <span
                                            class="px-2 py-1 rounded text-xs
                                    {{ $social->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                            {{ $social->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-2 px-4 relative overflow-visible">
                                        <div class="relative inline-block text-left">

                                            <!-- Dropdown Button -->
                                            <button type="button" onclick="toggleDropdown(this)"
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                Setting
                                            </button>

                                            <!-- Dropdown Menu -->
                                            <div
                                                class="hidden absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 dropdown-menu">

                                                <div class="py-1">

                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.social.edit', encrypt($social->id)) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Edit
                                                    </a>

                                                    <!-- Delete -->
                                                    <form
                                                        action="{{ route('admin.social.delete', encrypt($social->id)) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
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
                                    <td colspan="7" class="py-4 text-center text-gray-500">
                                        No social media links found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $socials->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function toggleDropdown(button) {
        const menu = button.parentElement.querySelector('.dropdown-menu');

        // Close other dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(drop => {
            if (drop !== menu) drop.classList.add('hidden');
        });

        menu.classList.toggle('hidden');
    }

    // Close when clicking outside
    window.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            document.querySelectorAll('.dropdown-menu')
                .forEach(drop => drop.classList.add('hidden'));
        }
    });
</script>

</html>
