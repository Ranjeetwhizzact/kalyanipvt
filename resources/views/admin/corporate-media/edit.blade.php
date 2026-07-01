<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Certificate</title>
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

                <!-- Header -->

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-xl font-semibold">
                        Edit Corporate Media
                    </h2>

                    <a href="{{ route('admin.corporate-media.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Back
                    </a>

                </div>


                <!-- Success Message -->

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif


                <!-- Form -->

                <form action="{{ route('admin.corporate-media.update', encrypt($media->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Title
                            </label>
                            <input type="text" name="title" value="{{ old('title', $media->title) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Media Type -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Media Type
                            </label>
                            <select name="type" id="mediaType"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                onchange="toggleMediaFields()">
                                <option value="video" {{ $media->type == 'video' ? 'selected' : '' }}>
                                    Video
                                </option>
                                <option value="brochure" {{ $media->type == 'brochure' ? 'selected' : '' }}>
                                    Brochure
                                </option>
                            </select>
                        </div>
                        <!-- Video URL -->
                        <div id="videoField" class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Video
                            </label>
                            <input type="file" name="video_url" accept="video/mp4,video/mov,video/avi,video/webm"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">
                                Supported formats: MP4, MOV, AVI, WEBM (Max 50MB)
                            </p>
                            @if ($media->video_url)
                                <div class="mt-3">
                                    <p class="text-sm text-gray-600 mb-1">
                                        Current Video
                                    </p>
                                    <video width="250" controls class="rounded shadow">
                                        <source src="{{ asset('storage/' . $media->video_url) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>
                        <!-- Brochure Upload -->

                        <div id="fileField" class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Brochure (PDF)
                            </label>

                            <input type="file" name="file" class="w-full px-4 py-2 border rounded-lg">


                            <!-- Existing File -->

                            @if ($media->file_path)
                                <div class="mt-2">

                                    <a href="{{ asset('storage/' . $media->file_path) }}" target="_blank"
                                        class="text-blue-600 underline">

                                        View Current Brochure

                                    </a>

                                </div>
                            @endif

                        </div>



                        <!-- Description -->

                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>

                            <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('description', $media->description) }}</textarea>

                        </div>



                        <!-- Status -->

                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>

                            <select name="status"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                                <option value="1" {{ $media->status ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ !$media->status ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>



                    <!-- Submit Button -->

                    <div class="mt-6 text-right">

                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">

                            Update Media

                        </button>

                    </div>

                </form>

            </div>

        </div>



        <script>
            function toggleMediaFields() {

                let type = document.getElementById('mediaType').value;

                let videoField = document.getElementById('videoField');
                let fileField = document.getElementById('fileField');

                videoField.style.display = 'none';
                fileField.style.display = 'none';

                if (type === 'video') {
                    videoField.style.display = 'block';
                }

                if (type === 'brochure') {
                    fileField.style.display = 'block';
                }

            }


            window.onload = toggleMediaFields;
        </script>
    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript"></script>
</body>

</html>
