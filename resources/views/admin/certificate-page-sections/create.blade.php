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
                <form action="{{ route('admin.certificate.page-sections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Section Type</label>
                        <select id="section_type" name="section_type"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Select Type</option>
                            <option value="hero">Hero</option>
                            <option value="section">Section</option>
                        </select>
                    </div>

                    <!-- ================= HERO FORM ================= -->
                    <div id="hero_form" class="hidden space-y-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" name="title"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Page Image</label>
                            <input type="file" name="page_image" class="w-full border p-2 rounded">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Paragraph</label>
                            <textarea name="paragraph" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 cleditor-editor"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="is_active"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- ================= SECTION FORM ================= -->
                    <div id="section_form" class="hidden space-y-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input type="text" name="title"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subheading</label>
                                <input type="text" name="subheading"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Home Image</label>

                                <input type="file" name="home_image" id="home_image"
                                    class="w-full border p-2 rounded mb-3" accept="image/*">
                                <!-- Preview Box -->
                                <div
                                    class="w-40 h-40 border rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                                    <img id="home_image_preview" class="hidden max-h-full max-w-full object-contain">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Page Image</label>

                                <input type="file" name="page_image" id="page_image"
                                    class="w-full border p-2 rounded mb-3" accept="image/*">

                                <!-- Preview Box -->
                                <div
                                    class="w-40 h-40 border rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                                    <img id="page_image_preview" class="hidden max-h-full max-w-full object-contain">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                                <input type="number" name="order"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Position</label>
                                <select name="image_position"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Paragraph</label>
                                <textarea name="paragraph" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 cleditor-editor"></textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Points</label>
                                <div id="points-wrapper">
                                    <div class="flex mb-2 point-item">
                                        <input type="text" name="point[]"
                                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                            placeholder="Enter point">
                                        <button type="button"
                                            class="ml-2 px-3 py-2 bg-green-500 text-white rounded add-point">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="is_active"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 text-right hidden" id="submit_button">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Submit
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

        const typeSelect = document.getElementById('section_type');
        const heroForm = document.getElementById('hero_form');
        const sectionForm = document.getElementById('section_form');
        const submitButton = document.getElementById('submit_button');

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

        // Initially disable both
        disableInputs(heroForm, true);
        disableInputs(sectionForm, true);

        typeSelect.addEventListener('change', function() {

            heroForm.classList.add('hidden');
            sectionForm.classList.add('hidden');
            submitButton.classList.add('hidden');

            disableInputs(heroForm, true);
            disableInputs(sectionForm, true);

            if (this.value === 'hero') {
                heroForm.classList.remove('hidden');
                submitButton.classList.remove('hidden');
                disableInputs(heroForm, false);
            }

            if (this.value === 'section') {
                sectionForm.classList.remove('hidden');
                submitButton.classList.remove('hidden');
                disableInputs(sectionForm, false);
            }

            // Small timeout to allow element to render block display before checking visibility
            setTimeout(initializeVisibleEditors, 50);
        });

        // Initialize on load just in case
        initializeVisibleEditors();

        const form = document.querySelector('form');
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

    // Image Preview Function
    function previewImage(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('home_image').addEventListener('change', function() {
        previewImage(this, 'home_image_preview');
    });

    document.getElementById('page_image').addEventListener('change', function() {
        previewImage(this, 'page_image_preview');
    });
</script>

</html>
