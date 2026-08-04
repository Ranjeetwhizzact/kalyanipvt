<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page Section</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />

    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        input:checked~div.sidebar {
            width: 50px
        }

        input:checked~div.sidebar~div.main-content {
            margin-left: 50px
        }

        .sidebar {
            transition: width .3s ease
        }

        .main-content {
            transition: margin-left .3s ease
        }

        .rich-text-content ul {
            list-style-type: disc !important;
            margin-left: 1.5rem !important;
            margin-bottom: 1rem !important;
        }
        .rich-text-content ol {
            list-style-type: decimal !important;
            margin-left: 1.5rem !important;
            margin-bottom: 1rem !important;
        }
        .rich-text-content strong, .rich-text-content b {
            font-weight: bold !important;
        }
        .rich-text-content p {
            margin-bottom: 0.75rem !important;
        }
        .rich-text-content a {
            color: #3b82f6 !important;
            text-decoration: underline !important;
        }
    </style>

</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        @include('admin.common.sidenav')

        @include('admin.common.toster')


        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64">

            <div class="bg-white p-6 rounded-lg shadow-md max-w-6xl mx-auto">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-xl font-semibold">
                        Page Builder : {{ $page->title }}
                    </h2>

                    <!-- Back Button -->
                    <a href="{{ route('admin.pages.index') }}"
                        class="flex items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back to Pages
                    </a>

                </div>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif


                <!-- ================= SECTION CREATOR ================= -->

                <div class="bg-gray-50 p-5 rounded mb-8 border">

                    <h3 class="font-semibold mb-4 text-lg">Add New Section</h3>
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                            <ul class="list-disc ml-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.page-sections.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="page_id" value="{{ $page->id }}">

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Section Name</label>
                                <input type="text" name="section_name" placeholder="Section Name (Example: Banner)"
                                    class="border p-2 rounded" required>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Section Heading</label>
                                <input type="text" name="section_heading" placeholder="Section Heading"
                                    class="border p-2 rounded">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Section Sub Heading</label>
                                <input type="text" name="section_subheading" placeholder="Section Subheading"
                                    class="border p-2 rounded">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Order Number</label>
                                <input type="number" name="sort_order" value="0" placeholder="Sort Order"
                                    class="border p-2 rounded" required>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Layout Type</label>
                                <select name="layout_type" class="border p-2 rounded" required>

                                    <option value="full-width">Full Width</option>
                                    <option value="grid_2">Grid 2 Columns</option>
                                    <option value="grid_3">Grid 3 Columns</option>

                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Image Position</label>
                                <select name="image_layout" class="border p-2 rounded" required>
                                    <option value="top">Image Top</option>
                                    <option value="left">Image Left</option>
                                    <option value="right">Image Right</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-sm font-medium mb-1">Section Paragraph</label>
                                <textarea name="section_paragraph" placeholder="Section description" class="border p-2 rounded col-span-2 cleditor-editor"></textarea>
                            </div>
                        </div>

                        <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded">
                            Add Section
                        </button>

                    </form>

                </div>

                <!-- ================= EXISTING SECTIONS ================= -->

                <h3 class="font-semibold mb-4 text-lg">Sections</h3>

                @foreach ($page->sections as $section)
                    <div class="border rounded mb-6 shadow-sm">

                        <!-- SECTION HEADER -->

                        <div class="bg-gray-100 p-4 flex justify-between items-center">

                            <div class="flex items-center gap-4">

                                <h4 class="font-semibold text-gray-800">
                                    {{ $section->section_name }}
                                </h4>

                                <!-- EDIT BUTTON -->

                                <button onclick="toggleEdit('edit_section_{{ $section->id }}')"
                                    class="text-blue-600 hover:text-blue-800 text-lg">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>


                                <!-- DELETE -->

                                <form action="{{ route('admin.sections.delete', $section->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this section?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 text-lg">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>


                            <button onclick="toggleSection({{ $section->id }})" class="text-blue-600 text-sm">
                                Manage Layouts
                            </button>

                        </div>



                        <!-- SECTION EDIT FORM -->

                        <div id="edit_section_{{ $section->id }}" class="hidden p-4 border-b bg-gray-50">
                            <form action="{{ route('admin.sections.update', $section->id) }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-2 gap-4">
                                    {{-- SECTION NAME --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Section Name</label>
                                        <input type="text" name="section_name" value="{{ $section->section_name }}"
                                            class="border p-2 rounded">
                                    </div>


                                    {{-- SECTION HEADING --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Section Heading</label>
                                        <input type="text" name="section_heading"
                                            value="{{ $section->section_heading }}" class="border p-2 rounded">
                                    </div>


                                    {{-- SECTION SUBHEADING --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Sub Heading</label>
                                        <input type="text" name="section_subheading"
                                            value="{{ $section->section_subheading }}" class="border p-2 rounded">
                                    </div>


                                    {{-- SECTION PARAGRAPH --}}
                                    <div class="flex flex-col col-span-2">
                                        <label class="text-sm font-medium mb-1">Paragraph</label>
                                        <textarea name="section_paragraph" class="border p-2 rounded cleditor-editor" rows="3">{{ $section->section_paragraph }}</textarea>
                                    </div>


                                    {{-- LAYOUT TYPE --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Layout Type</label>

                                        <select name="layout_type" class="border p-2 rounded">

                                            <option value="">Select Layout</option>

                                            <option value="full-width"
                                                {{ $section->layout_type == 'full-width' ? 'selected' : '' }}>
                                                Full Width
                                            </option>

                                            <option value="grid_2"
                                                {{ $section->layout_type == 'grid_2' ? 'selected' : '' }}>
                                                Grid 2
                                            </option>

                                            <option value="grid_3"
                                                {{ $section->layout_type == 'grid_3' ? 'selected' : '' }}>
                                                Grid 3
                                            </option>

                                        </select>
                                    </div>


                                    {{-- IMAGE LAYOUT --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Image Layout</label>

                                        <select name="image_layout" class="border p-2 rounded">

                                            <option value="">Select Layout</option>

                                            <option value="top"
                                                {{ $section->image_layout == 'top' ? 'selected' : '' }}>
                                                Top
                                            </option>

                                            <option value="left"
                                                {{ $section->image_layout == 'left' ? 'selected' : '' }}>
                                                Left
                                            </option>

                                            <option value="right"
                                                {{ $section->image_layout == 'right' ? 'selected' : '' }}>
                                                Right
                                            </option>

                                        </select>
                                    </div>


                                    {{-- SORT ORDER --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Order</label>

                                        <input type="number" name="sort_order" value="{{ $section->sort_order }}"
                                            class="border p-2 rounded">
                                    </div>


                                    {{-- STATUS --}}
                                    <div class="flex flex-col">
                                        <label class="text-sm font-medium mb-1">Status</label>

                                        <select name="status" class="border p-2 rounded">

                                            <option value="1" {{ $section->status == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0" {{ $section->status == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>

                                        </select>
                                    </div>

                                </div>


                                <div class="flex gap-3 mt-4">

                                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                                        Update
                                    </button>

                                    <button type="button" onclick="toggleEdit('edit_section_{{ $section->id }}')"
                                        class="bg-gray-400 text-white px-4 py-2 rounded">
                                        Cancel
                                    </button>

                                </div>

                            </form>

                        </div>

                        <!-- SECTION CONTENT -->
                        <div id="section_{{ $section->id }}" class="hidden p-5">
                            <!-- ADD LAYOUT -->
                            <div class="border p-4 rounded mb-4 bg-gray-50">
                                <h5 class="font-semibold mb-3">Add Layout</h5>
                                <form action="{{ route('admin.page-layouts.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="page_section_id" value="{{ $section->id }}">

                                    <div class="grid grid-cols-2 gap-4">

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Layout Heading</label>
                                            <input type="text" name="heading" class="border p-2 rounded">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Heading Color</label>
                                            <input type="color" name="heading_color" value="#000000"
                                                class="w-20 h-10 border rounded cursor-pointer">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Subheading</label>
                                            <input type="text" name="subheading" class="border p-2 rounded">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Subheading Color</label>
                                            <input type="color" name="subheading_color" value="#000000"
                                                class="w-20 h-10 border rounded cursor-pointer">
                                        </div>

                                        <div class="flex flex-col col-span-2">
                                            <label class="text-sm font-medium mb-1">Paragraph</label>
                                            <textarea name="paragraph" class="border p-2 rounded cleditor-editor"></textarea>
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Point Type</label>
                                            <select name="point_type" class="border p-2 rounded">
                                                <option value="">None</option>
                                                <option value="normal">Text</option>
                                                <option value="box">Box</option>
                                                <option value="color_point">Color Point</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Order</label>
                                            <input type="number" name="order" value="0"
                                                class="border p-2 rounded">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Link Text</label>
                                            <input type="text" name="link_text" class="border p-2 rounded">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Link URL</label>
                                            <input type="text" name="link_url" class="border p-2 rounded">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Text Color</label>
                                            <input type="color" name="text_colors"
                                                value="{{ old('text_colors', $layout->text_colors ?? '#000000') }}"
                                                class="w-20 h-10 border rounded cursor-pointer">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium mb-1">Text Alignment</label>
                                            <select name="text_alignment" class="border p-2 rounded">
                                                <option value="left">Left</option>
                                                <option value="center">Center</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col col-span-2">
                                            <label class="text-sm font-medium mb-1">Layout Image</label>
                                            <input type="file" name="image" class="border p-2 rounded">
                                        </div>

                                        @if (in_array($section->layout_type, ['grid_2', 'grid_3']))
                                            <div class="flex flex-col">
                                                <label class="text-sm font-medium mb-1">Desktop Height (vh)</label>

                                                <select name="image_height_desktop" class="border p-2 rounded">
                                                    @for ($i = 10; $i <= 100; $i += 5)
                                                        <option value="{{ $i }}"
                                                            {{ old('image_height_desktop', $layout->image_height_desktop ?? 60) == $i ? 'selected' : '' }}>
                                                            {{ $i }}vh
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        @endif
                                    </div>

                                    <button class="bg-green-600 text-white px-4 py-2 mt-4 rounded">
                                        Add Layout
                                    </button>

                                </form>
                            </div>
                            <!-- EXISTING LAYOUTS -->
                            @foreach ($section->layouts as $layout)
                                <div class="border p-4 rounded mb-4 bg-white">
                                    <!-- LAYOUT HEADER -->
                                    <div class="flex justify-between items-center">
                                        <h5 class="font-semibold">
                                            {{ $layout->heading }}
                                        </h5>
                                        <div class="flex gap-3 items-center">
                                            <!-- EDIT LAYOUT -->
                                            <button onclick="toggleEdit('edit_layout_{{ $layout->id }}')"
                                                class="text-blue-600 hover:text-blue-800">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <!-- DELETE LAYOUT -->
                                            <form action="{{ route('admin.layouts.delete', $layout->id) }}"
                                                method="POST" onsubmit="return confirm('Delete this layout?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-800">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- ================= EDIT LAYOUT FORM ================= -->
                                    <div id="edit_layout_{{ $layout->id }}"
                                        class="hidden mt-4 border p-4 rounded bg-gray-50">
                                        <form action="{{ route('admin.layouts.update', $layout->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid grid-cols-2 gap-4">
                                                {{-- HEADING --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Layout Heading</label>
                                                    <input type="text" name="heading"
                                                        value="{{ $layout->heading }}" class="border p-2 rounded">
                                                </div>

                                                {{-- HEADING COLOR --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Heading Color</label>
                                                    <input type="color" name="heading_color"
                                                        value="{{ !empty($layout->heading_color) ? $layout->heading_color : '#000000' }}"
                                                        class="w-20 h-10 border rounded cursor-pointer">
                                                    <small class="text-gray-500 mt-1">
                                                        Current: {{ $layout->heading_color ?? '#000000' }}
                                                    </small>
                                                </div>

                                                {{-- SUBHEADING --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Layout Subheading</label>
                                                    <input type="text" name="subheading"
                                                        value="{{ $layout->subheading }}" class="border p-2 rounded">
                                                </div>

                                                {{-- SUBHEADING COLOR --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Subheading Color</label>
                                                    <input type="color" name="subheading_color"
                                                        value="{{ !empty($layout->subheading_color) ? $layout->subheading_color : '#000000' }}"
                                                        class="w-20 h-10 border rounded cursor-pointer">
                                                    <small class="text-gray-500 mt-1">
                                                        Current: {{ $layout->subheading_color ?? '#000000' }}
                                                    </small>
                                                </div>

                                                {{-- PARAGRAPH --}}
                                                <div class="flex flex-col col-span-2">
                                                    <label class="text-sm font-medium mb-1">Layout Paragraph</label>
                                                    <textarea name="paragraph" class="border p-2 rounded w-full cleditor-editor" rows="5">{{ old('paragraph', $layout->paragraph) }}</textarea>
                                                </div>

                                                {{-- IMAGE --}}
                                                <div class="flex flex-col col-span-2">
                                                    <label class="text-sm font-medium mb-1">Layout Image</label>

                                                    <input type="file" name="image" class="border p-2 rounded">

                                                    @if ($layout->image)
                                                        <img src="{{ asset('storage/' . $layout->image) }}"
                                                            class="w-24 mt-2 rounded">
                                                    @endif
                                                </div>

                                                @if (in_array($section->layout_type, ['grid_2', 'grid_3']))
                                                    <div class="flex flex-col">
                                                        <label class="text-sm font-medium mb-1">Desktop Height
                                                            (vh)
                                                        </label>

                                                        <select name="image_height_desktop"
                                                            class="border p-2 rounded">
                                                            @for ($i = 10; $i <= 100; $i += 5)
                                                                <option value="{{ $i }}"
                                                                    {{ old('image_height_desktop', $layout->image_height_desktop ?? 60) == $i ? 'selected' : '' }}>
                                                                    {{ $i }}vh
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                @endif
                                                {{-- POINT TYPE --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Point Type</label>

                                                    <select name="point_type" class="border p-2 rounded">

                                                        <option value="">None</option>

                                                        <option value="normal"
                                                            {{ $layout->point_type == 'normal' ? 'selected' : '' }}>
                                                            Normal Points
                                                        </option>

                                                        <option value="box"
                                                            {{ $layout->point_type == 'box' ? 'selected' : '' }}>
                                                            Box Points
                                                        </option>

                                                        <option value="color_point"
                                                            {{ $layout->point_type == 'color_point' ? 'selected' : '' }}>
                                                            Color Points
                                                        </option>

                                                    </select>
                                                </div>

                                                {{-- ORDER --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Layout Order</label>

                                                    <input type="number" name="order"
                                                        value="{{ $layout->order }}" class="border p-2 rounded">
                                                </div>

                                                {{-- LINK TEXT --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Link Text</label>

                                                    <input type="text" name="link_text"
                                                        value="{{ $layout->link_text }}" class="border p-2 rounded">
                                                </div>

                                                {{-- LINK URL --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Link URL</label>

                                                    <input type="text" name="link_url"
                                                        value="{{ $layout->link_url }}" class="border p-2 rounded">
                                                </div>

                                                {{-- TEXT COLOR --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Text Color</label>

                                                    <input type="color" name="text_colors"
                                                        value="{{ !empty($layout->text_colors) ? $layout->text_colors : '#000000' }}"
                                                        class="w-20 h-10 border rounded cursor-pointer">

                                                    <small class="text-gray-500 mt-1">
                                                        Current: {{ $layout->text_colors ?? '#000000' }}
                                                    </small>
                                                </div>
                                                {{-- TEXT ALIGNMENT --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Text Alignment</label>
                                                    <select name="text_alignment" class="border p-2 rounded">
                                                        <option value="left"
                                                            {{ $layout->text_alignment == 'left' ? 'selected' : '' }}>
                                                            Left
                                                        </option>
                                                        <option value="center"
                                                            {{ $layout->text_alignment == 'center' ? 'selected' : '' }}>
                                                            Center
                                                        </option>
                                                        <option value="right"
                                                            {{ $layout->text_alignment == 'right' ? 'selected' : '' }}>
                                                            Right
                                                        </option>
                                                    </select>
                                                </div>
                                                {{-- STATUS --}}
                                                <div class="flex flex-col">
                                                    <label class="text-sm font-medium mb-1">Status</label>

                                                    <select name="status" class="border p-2 rounded">

                                                        <option value="1"
                                                            {{ $layout->status == 1 ? 'selected' : '' }}>
                                                            Active
                                                        </option>

                                                        <option value="0"
                                                            {{ $layout->status == 0 ? 'selected' : '' }}>
                                                            Inactive
                                                        </option>

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="flex gap-3 mt-4">

                                                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                                                    Update
                                                </button>

                                                <button type="button"
                                                    onclick="toggleEdit('edit_layout_{{ $layout->id }}')"
                                                    class="bg-gray-400 text-white px-4 py-2 rounded">
                                                    Cancel
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                    <!-- ================= LAYOUT DISPLAY ================= -->

                                    @if ($layout->image)
                                        <img src="{{ asset('storage/' . $layout->image) }}"
                                            class="w-40 mt-3 mb-3 rounded shadow">
                                    @endif

                                    <div class="text-gray-600 rich-text-content">
                                        {!! $layout->paragraph !!}
                                    </div>


                                    <!-- ================= POINTS ================= -->

                                    @if (!empty($layout->point_type))
                                        <hr class="my-3">

                                        <!-- ADD POINT FORM -->

                                        <form action="{{ route('admin.points.store') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="layout_id" value="{{ $layout->id }}">

                                            <div id="points-wrapper-{{ $layout->id }}">

                                                <div class="grid grid-cols-2 gap-4 mb-3 point-row">

                                                    <div class="flex flex-col">
                                                        <label class="text-sm font-medium mb-1">Point Heading</label>
                                                        <input type="text" name="heading[]"
                                                            class="border p-2 rounded">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="text-sm font-medium mb-1">Point Text</label>
                                                        <input type="text" name="text[]"
                                                            class="border p-2 rounded">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="flex gap-3 mt-3">

                                                <button type="button" onclick="addPointRow({{ $layout->id }})"
                                                    class="bg-gray-600 text-white px-3 py-1 rounded">
                                                    + Add More
                                                </button>

                                                <button class="bg-purple-600 text-white px-3 py-1 rounded">
                                                    Save Points
                                                </button>

                                            </div>

                                        </form>


                                        <!-- EXISTING POINTS -->

                                        @if ($layout->points->count())
                                            <ul class="mt-3 ml-4 list-disc">

                                                @foreach ($layout->points as $point)
                                                    <li class="flex justify-between items-center">

                                                        <span>
                                                            <strong>{{ $point->heading }}</strong> -
                                                            {{ $point->text }}
                                                        </span>

                                                        <div class="flex gap-3">

                                                            <!-- EDIT POINT -->

                                                            <button
                                                                onclick="toggleEdit('edit_point_{{ $point->id }}')"
                                                                class="text-blue-600">

                                                                <i class="fa-solid fa-pen-to-square"></i>

                                                            </button>


                                                            <!-- DELETE POINT -->

                                                            <form
                                                                action="{{ route('admin.points.delete', $point->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="text-red-600">

                                                                    <i class="fa-solid fa-trash"></i>

                                                                </button>

                                                            </form>

                                                        </div>

                                                    </li>


                                                    <!-- POINT EDIT FORM -->

                                                    <div id="edit_point_{{ $point->id }}"
                                                        class="hidden ml-6 mt-3 mb-3 border p-3 rounded bg-gray-50">

                                                        <form action="{{ route('admin.points.update', $point->id) }}"
                                                            method="POST">

                                                            @csrf

                                                            <div class="grid grid-cols-2 gap-2">

                                                                <input type="text" name="heading"
                                                                    value="{{ $point->heading }}"
                                                                    class="border p-2 rounded">

                                                                <input type="text" name="text"
                                                                    value="{{ $point->text }}"
                                                                    class="border p-2 rounded">

                                                            </div>

                                                            <div class="flex gap-2 mt-2">

                                                                <button
                                                                    class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                                                    Update
                                                                </button>

                                                                <button type="button"
                                                                    onclick="toggleEdit('edit_point_{{ $point->id }}')"
                                                                    class="bg-gray-400 text-white px-3 py-1 rounded text-sm">
                                                                    Cancel
                                                                </button>

                                                            </div>

                                                        </form>

                                                    </div>
                                                @endforeach

                                            </ul>
                                        @endif
                                    @endif

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <script>
            function toggleEdit(id) {
                let el = document.getElementById(id);
                if (!el) return;
                el.classList.toggle('hidden');
                initializeEditorsIn(el);
            }

            function toggleSection(id) {
                let el = document.getElementById('section_' + id);
                if (!el) return;
                el.classList.toggle('hidden');
                initializeEditorsIn(el);
            }

            function initializeEditorsIn(container) {
                if (!container.classList.contains('hidden')) {
                    $(container).find('.cleditor-editor').each(function() {
                        var editor = $(this).data("cleditor");
                        if (!editor) {
                            $(this).cleditor({
                                width: '100%',
                                height: '250px'
                            });
                        } else {
                            editor.refresh();
                        }
                    });
                }
            }
        </script>

        <script>
            function addPointRow(layoutId) {

                let wrapper = document.getElementById('points-wrapper-' + layoutId);

                let html = `
                <div class="grid grid-cols-2 gap-4 mb-3 point-row">

                    <div class="flex flex-col">
                        <input type="text" name="heading[]" placeholder="Point Heading"
                            class="border p-2 rounded">
                    </div>

                    <div class="flex flex-col">
                        <input type="text" name="text[]" placeholder="Point Text"
                            class="border p-2 rounded">
                    </div>

                </div>
                `;

                wrapper.insertAdjacentHTML('beforeend', html);

            }
        </script>
    </div>

    </div>

    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            if (typeof $.fn.cleditor !== "undefined") {
                $('.cleditor-editor').each(function() {
                    if ($(this).is(':visible')) {
                        $(this).cleditor({
                            width: '100%',
                            height: '250px'
                        });
                    }
                });
            }
        });
    </script>
</body>

</html>
