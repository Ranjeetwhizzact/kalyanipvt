<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Home Page Content</title>
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

        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

                <h2 class="text-2xl font-semibold mb-6">Edit Homepage Stat</h2>

                <form action="{{ route('admin.stats.update', encrypt($stat->id)) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title', $stat->title) }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Value</label>
                        <input type="text" name="value" value="{{ old('value', $stat->value) }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="is_active" class="w-full px-4 py-2 border rounded-lg">
                            <option value="1" {{ $stat->is_active ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ !$stat->is_active ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Update Stat
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
