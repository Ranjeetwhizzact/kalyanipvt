<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Certificate</title>
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

            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

                @if (session('status') == 'success')
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('msg') }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.videos.update', $video->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Video Upload -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Replace Video (Optional)
                            </label>

                            <input type="file" name="video_path" id="video_path" accept="video/*"
                                class="w-full border p-2 rounded mb-3">

                            <!-- Existing Video Preview -->
                            <div
                                class="w-full border rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                                @if ($video->video_path)
                                    <video id="video_preview" class="w-full max-h-96" controls>
                                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <video id="video_preview" class="hidden w-full max-h-96" controls>
                                    </video>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>

                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter video description">{{ old('description', $video->description) }}</textarea>
                        </div>

                        <!--- Sequence No -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Sequence No
                            </label>

                            <input type="number" name="sequence_no"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter sequence number"
                                value="{{ old('sequence_no', $video->sequence_no) }}" min="1">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>

                            <select name="is_active"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="1" {{ $video->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$video->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
                $("#description").cleditor();
            }
        });
    </script>
</body>
<script>
    document.getElementById('video_path').addEventListener('change', function() {

        const file = this.files[0];
        const preview = document.getElementById('video_preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }
    });
</script>

</html>
