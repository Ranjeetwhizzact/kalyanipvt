```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($banner) ? 'Edit Model Ads' : 'Add Model Ads' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/admin/Content/Site.css') }}"
        rel="stylesheet" type="text/css" />

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

                <h2 class="text-2xl font-semibold mb-6">
                    {{ isset($banner) ? 'Edit Model Ads' : 'Add Model Ads' }}
                </h2>

                <form
                    action="{{ isset($banner) ? route('admin.adsmodels.update', $banner->id) : route('admin.adsmodels.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    @if(isset($banner))
                        @method('PUT')
                    @endif

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Model Image
                        </label>

                        <input type="file"
                            name="banner"
                            id="banner_image"
                            accept="image/*"
                            class="w-full px-4 py-2 border rounded-lg @error('banner_image') border-red-500 @enderror">

                        @error('banner_image')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Image Preview -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Image Preview
                        </label>

                        <img
                            id="imagePreview"
                            src="{{ isset($banner) && $banner->banner_image ? asset('uploads/banner/' . $banner->banner_image) : '' }}"
                            alt="Preview"
                            class="{{ isset($banner) && $banner->banner_image ? '' : 'hidden' }} w-64 h-64 object-cover border rounded-lg shadow">
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Status
                        </label>

                        <select name="status"
                            class="w-full px-4 py-2 border rounded-lg">

                            <option value="1"
                                {{ (isset($banner) && $banner->status == 1) ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ (isset($banner) && $banner->status == 0) ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">

                            {{ isset($banner) ? 'Update Banner' : 'Save Banner' }}

                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}"
        type="text/javascript"></script>

    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}"
        type="text/javascript"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const imageInput = document.getElementById('banner_image');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function(e) {

                const file = e.target.files[0];

                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.classList.remove('hidden');
                };

                reader.readAsDataURL(file);

            });

        });
    </script>

</body>

</html>
```
