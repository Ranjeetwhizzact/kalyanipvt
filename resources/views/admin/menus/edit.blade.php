<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Menus</title>
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
            <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto mt-10">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.menus.update', encrypt($menu->id)) }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Menu Name -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Menu Name
                            </label>

                            <input type="text" name="name" value="{{ old('name', $menu->name) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter menu name">

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Menu Location -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Menu Location
                            </label>

                            <select name="location"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                                <option value="header" {{ $menu->location == 'header' ? 'selected' : '' }}>
                                    Header
                                </option>

                                <option value="footer" {{ $menu->location == 'footer' ? 'selected' : '' }}>
                                    Footer
                                </option>

                            </select>

                            @error('location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Update Menu
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

</html>
