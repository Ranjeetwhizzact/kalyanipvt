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
                <h2 class="text-2xl font-bold">Homepage Stats</h2>
                <p class="text-gray-600 mt-2">Manage homepage statistics here.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">
                        Achievement Section Settings
                    </h3>
                    <button onclick="document.getElementById('achievementModal').classList.remove('hidden')"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Edit Settings
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div class="border rounded-lg p-4 bg-blue-50">
                        <h4 class="text-2xl font-semibold">
                            {{ $achievementSetting->section_heading ?? 'Our Achievements' }}
                        </h4>
                        <p class="mt-3 text-gray-600">
                            {{ $achievementSetting->section_description ?? 'Trusted by customers worldwide.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div id="achievementModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg w-full max-w-lg">
                    <h3 class="text-xl font-semibold mb-4">
                        Achievement Settings
                    </h3>
                    <form action="{{ route('admin.stats.updateSettings', encrypt($achievementSetting->id ?? 1)) }}"
                        method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2">
                                Heading
                            </label>

                            <input type="text" name="section_heading"
                                value="{{ $achievementSetting->section_heading ?? 'Our Achievements' }}"
                                class="w-full border rounded-lg p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2">
                                Description
                            </label>
                            <textarea name="section_description" rows="3" class="w-full border rounded-lg p-2">{{ $achievementSetting->section_description ?? 'Trusted by customers worldwide.' }}</textarea>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button"
                                onclick="document.getElementById('achievementModal').classList.add('hidden')"
                                class="bg-gray-500 text-white px-4 py-2 rounded">
                                Cancel
                            </button>

                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Stats List</h3>

                    <a href="{{ route('admin.stats.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add Stat
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Title</th>
                                <th class="py-3 px-4 border-b">Value</th>
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($stats as $stat)
                                <tr class="border-b hover:bg-gray-50 text-sm">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>

                                    <td class="py-2 px-4 font-medium">
                                        {{ $stat->title }}
                                    </td>

                                    <td class="py-2 px-4 font-semibold">
                                        {{ $stat->value }}
                                    </td>

                                    <td class="py-2 px-4">
                                        <span
                                            class="px-2 py-1 rounded text-xs
                                    {{ $stat->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                            {{ $stat->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <!-- Dropdown Actions -->
                                    <td class="py-2 px-4 relative overflow-visible">
                                        <div class="relative inline-block text-left">
                                            <button type="button" onclick="toggleDropdown(this)"
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                Setting
                                            </button>

                                            <div
                                                class="hidden absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 dropdown-menu">

                                                <div class="py-1">

                                                    <a href="{{ route('admin.stats.edit', encrypt($stat->id)) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Edit
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.stats.delete', encrypt($stat->id)) }}"
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
                                    <td colspan="6" class="py-4 text-center text-gray-500">
                                        No stats found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $stats->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleDropdown(button) {
                const menu = button.parentElement.querySelector('.dropdown-menu');

                document.querySelectorAll('.dropdown-menu').forEach(drop => {
                    if (drop !== menu) drop.classList.add('hidden');
                });

                menu.classList.toggle('hidden');
            }

            window.addEventListener('click', function(e) {
                if (!e.target.closest('.relative')) {
                    document.querySelectorAll('.dropdown-menu')
                        .forEach(drop => drop.classList.add('hidden'));
                }
            });
        </script>
    </div>
</body>


</html>
