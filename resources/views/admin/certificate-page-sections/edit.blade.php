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
        .ck-editor__editable_inline {
            min-height: 150px;
            color: #000;
        }
    </style>

</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
            <!-- Welcome Section -->
            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">
                @if (session('status') == 'success')
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('msg') }}</span>
                    </div>
                @endif
                {{-- <h2 class="text-2xl font-semibold mb-6">Add New Page Section</h2> --}}
                <form action="{{ route('admin.certificate.page-sections.update', encrypt($section->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        {{-- Section Type --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Type</label>
                            <select name="section_type" id="section_type"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                                <option value="hero" {{ $section->section_type == 'hero' ? 'selected' : '' }}>Hero
                                </option>
                                <option value="section" {{ $section->section_type == 'section' ? 'selected' : '' }}>
                                    Section</option>
                            </select>
                        </div>

                        {{-- TITLE (COMMON FOR BOTH) --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" name="title" value="{{ old('title', $section->title) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        {{-- ================= HERO FIELDS ================= --}}
                        <div id="hero_fields" class="md:col-span-2 space-y-4">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Page Image</label>

                                @if ($section->page_image)
                                    <img src="{{ asset($section->page_image) }}" class="h-20 mb-2 object-cover rounded">
                                @endif

                                <input type="file" name="page_image" class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Paragraph</label>
                                <textarea name="paragraph" rows="5" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 cleditor-editor">{{ old('paragraph', $section->paragraph) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="is_active"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="1" {{ $section->is_active == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ $section->is_active == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- ================= SECTION FIELDS ================= --}}
                        <div id="section_fields" class="md:col-span-2 space-y-4">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subheading</label>
                                <input type="text" name="subheading"
                                    value="{{ old('subheading', $section->subheading) }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Home Image</label>

                                @if ($section->home_image)
                                    <img src="{{ asset($section->home_image) }}"
                                        class="h-20 mb-2 object-cover rounded">
                                @endif

                                <input type="file" name="home_image" class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Page Image</label>

                                @if ($section->page_image)
                                    <img src="{{ asset($section->page_image) }}"
                                        class="h-20 mb-2 object-cover rounded">
                                @endif

                                <input type="file" name="page_image" class="w-full border p-2 rounded">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                                <input type="number" name="order" value="{{ old('order', $section->order) }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Position</label>
                                <select name="image_position"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="left" {{ $section->image_position == 'left' ? 'selected' : '' }}>
                                        Left</option>
                                    <option value="right" {{ $section->image_position == 'right' ? 'selected' : '' }}>
                                        Right</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Paragraph</label>
                                <textarea name="paragraph" rows="5" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 cleditor-editor">{{ old('paragraph', $section->paragraph) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Points</label>

                                <div id="points-wrapper">
                                    @php
                                        $oldPoints = old('point', $section->point ?? []);
                                    @endphp
                                    @if (!empty($oldPoints))
                                        @foreach ($oldPoints as $index => $point)
                                            <div class="flex mb-2 point-item">
                                                <input type="text" name="point[]" value="{{ $point }}"
                                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                                    placeholder="Enter point">

                                                @if ($index == 0)
                                                    <button type="button"
                                                        class="ml-2 px-3 py-2 bg-green-500 text-white rounded add-point">
                                                        +
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="ml-2 px-3 py-2 bg-red-500 text-white rounded remove-point">
                                                        -
                                                    </button>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="flex mb-2 point-item">
                                            <input type="text" name="point[]"
                                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                                placeholder="Enter point">

                                            <button type="button"
                                                class="ml-2 px-3 py-2 bg-green-500 text-white rounded add-point">
                                                +
                                            </button>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="is_active"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="1" {{ $section->is_active == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ $section->is_active == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            if (typeof $.fn.cleditor !== "undefined") {
                $('.cleditor-editor').cleditor({
                    width: '100%',
                    height: 250
                });
            }
        });
    </script>
</body>
<script>
    function previewImage(inputId, imgId) {
        document.getElementById(inputId).addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(imgId);
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file.');
            }
        });
    }

    // Apply to both file inputs
    previewImage('fileInput', 'selectedImage');
    previewImage('fileInputicon', 'selectedImageicon');
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const sectionType = document.getElementById('section_type');
        const heroFields = document.getElementById('hero_fields');
        const sectionFields = document.getElementById('section_fields');
        const form = document.querySelector('form');

        function disableInputs(container, disable) {
            const inputs = container.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.disabled = disable;
            });
        }

        function initializeVisibleEditors() {
            if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
                $('.cleditor-editor').each(function() {
                    var editor = $(this).data("cleditor");
                    if ($(this).is(':visible')) {
                        if (!editor) {
                            $(this).cleditor({
                                width: '100%',
                                height: '250px'
                            });
                        } else {
                            editor.refresh();
                        }
                    }
                });
            }
        }

        function toggleFields() {
            if (sectionType.value === 'hero') {
                heroFields.style.display = 'block';
                sectionFields.style.display = 'none';
                disableInputs(heroFields, false);
                disableInputs(sectionFields, true);
            } else {
                heroFields.style.display = 'none';
                sectionFields.style.display = 'block';
                disableInputs(heroFields, true);
                disableInputs(sectionFields, false);
            }

            // Small timeout to allow element display block render before checking visibility
            setTimeout(initializeVisibleEditors, 50);
        }

        if (form) {
            form.addEventListener('submit', function() {
                if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
                    $('.cleditor-editor').each(function() {
                        var editor = $(this).data("cleditor");
                        if (editor) {
                            editor.updateTextArea();
                        }
                    });
                }
            });
        }

        sectionType.addEventListener('change', toggleFields);
        toggleFields(); // Run on page load
    });
</script>
<script>
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-point')) {
            let wrapper = document.getElementById('points-wrapper');

            let div = document.createElement('div');
            div.classList.add('flex', 'mb-2', 'point-item');

            div.innerHTML = `
            <input type="text" name="point[]"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                placeholder="Enter point">
            <button type="button"
                class="ml-2 px-3 py-2 bg-red-500 text-white rounded remove-point">
                -
            </button>
        `;

            wrapper.appendChild(div);
        }

        if (e.target.classList.contains('remove-point')) {
            e.target.closest('.point-item').remove();
        }
    });
</script>

</html>
