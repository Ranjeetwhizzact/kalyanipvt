<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind Dashboard</title>
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
                <h2 class="text-2xl font-semibold mb-6">Create New Product</h2>
                <form action="{{ url('saveproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Row for Input Fields: Name, Category, Image -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="hidden" name="id" value="{{ isset($product->id) ? $product->id : '' }}">

                        <!-- Category Input -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select id="category-select" name="category_id"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="" disabled {{ !isset($product->category_id) ? 'selected' : '' }}>
                                    Select product category</option>
                                @if ($category)
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($product->category_id) && $product->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <!-- Subcategory Input -->
                        <div class="mb-4">
                            <label for="subcategory-select"
                                class="block text-sm font-medium text-gray-700 mb-2">Subcategory</label>
                            <select id="subcategory-select" name="subcategory_id"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled>Select Subcategory</option>
                                <!-- Subcategories will be populated here via JavaScript -->
                            </select>
                        </div>

                        <!-- Product Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product
                                Name</label>
                            <input type="text" id="title" name="title"
                                value="{{ isset($product->title) ? $product->title : '' }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter product name" required />
                        </div>

                        <!-- Image Input -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product
                                Image</label>
                            <input type="file" id="image" name="image"
                                class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                accept="image/*" />
                            @if (isset($product->image) && $product->image)
                                <img src="{{ asset($product->image) }}" alt="Product Image" class="mt-2  rounded"
                                    height='100' />
                            @endif
                        </div>
                        {{--  --}}
                        <div>
                            <label for="brochure" class="block text-sm font-medium text-gray-700 mb-2">Brochure</label>
                            <input type="file" id="brochure" name="brochure"
                                class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                accept=".pdf" />
                            @if (isset($product->brochure) && $product->brochure)
                                <a href="{{ asset($product->brochure) }}" target="_blank" alt="Product Brochure"
                                    class="mt-2 text-blue-500 hover:underline">View Current Brochure</a>
                            @endif
                        </div>
                        <!-- Composition Input -->
                        <div>
                            <label for="composition"
                                class="block text-sm font-medium text-gray-700 mb-2">Composition</label>
                            <input type="text" id="composition" name="composition"
                                value="{{ isset($product->composition) ? $product->composition : '' }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter composition" required />
                        </div>

                        <!-- Mode of Action Input -->
                        <div>
                            <label for="model_of_action" class="block text-sm font-medium text-gray-700 mb-2">Mode of
                                Action</label>
                            <input type="text" id="model_of_action" name="model_of_action"
                                value="{{ isset($product->model_of_action) ? $product->model_of_action : '' }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter mode of action" required />
                        </div>

                        <!-- Product Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Product
                                Status</label>
                            <select id="status" name="is_active"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="" disabled {{ !isset($product->is_active) ? 'selected' : '' }}>
                                    Select product status</option>
                                <option value="active"
                                    {{ isset($product->is_active) && $product->is_active == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($product->is_active) && $product->is_active == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <!-- Usage Type -->
                        <div class="mb-4">
                            <label for="usage_type" class="block text-sm font-medium text-gray-700 mb-2">Usage
                                Type</label>
                            <select id="usage_type" name="useage_type"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required onchange="toggleUsageField()">
                                <option value="" disabled {{ !isset($product->useage_type) ? 'selected' : '' }}>
                                    Select Usage Type</option>
                                <option value="0"
                                    {{ isset($product->useage_type) && $product->useage_type == '0' ? 'selected' : '' }}>
                                    Table</option>
                                <option value="1"
                                    {{ isset($product->useage_type) && $product->useage_type == '1' ? 'selected' : '' }}>
                                    Description</option>
                            </select>
                        </div>

                        <!-- Packing -->
                        <div>
                            <label for="packing" class="block text-sm font-medium text-gray-700 mb-2">Packing</label>
                            <textarea id="packing" name="packing" rows="7"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Enter packing details here...">{{ isset($packingString) ? $packingString : '' }}</textarea>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea id="description" name="description" rows="7"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Enter description here...">{{ isset($product->description) ? $product->description : '' }}</textarea>
                        </div>
                    </div>

                    <!-- Features Editor -->
                    <div>
                        <label for="featuresEditor"
                            class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                        <textarea id="featuresEditor"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            name="features" required>{{ isset($product->features) ? $product->features : '' }}</textarea>
                    </div>

                    <!-- Usage Editor (shown only if usage_type == 1) -->
                    <div id="usageFieldContainer"
                        class="mb-4 {{ isset($product->useage_type) && $product->useage_type == '1' ? '' : 'hidden' }}">
                        <label for="usageEditor" class="block text-sm font-medium text-gray-700 mb-2">Usage</label>
                        <textarea id="usageEditor"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            name="useage" required>{{ isset($product->useage) ? $product->useage : '' }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
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
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize cleditor
            if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
                $("#featuresEditor").cleditor();
                $("#usageEditor").cleditor();
            }

            const categorySelect = document.getElementById("category-select");
            const subcategorySelect = document.getElementById("subcategory-select");
            const oldSubcategoryId = "{{ isset($product->subcategory_id) ? $product->subcategory_id : '' }}";

            function loadSubcategories(categoryId, selectedSubcat = '') {
                subcategorySelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

                fetch(`{{ route('get.subcategories') }}?category_id=${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        subcategorySelect.innerHTML = '';

                        // ✅ If no subcategories (e.g. Export Zone)
                        if (!data || data.length === 0) {
                            const option = document.createElement("option");
                            option.value = "0"; // or "default" or categoryId if needed
                            option.textContent = "No Subcategory";
                            option.selected = true;

                            subcategorySelect.appendChild(option);
                            return;
                        }

                        // ✅ Normal flow
                        const defaultOption = document.createElement("option");
                        defaultOption.value = "";
                        defaultOption.textContent = "Select Subcategory";
                        defaultOption.disabled = true;
                        subcategorySelect.appendChild(defaultOption);

                        data.forEach(subcat => {
                            const option = document.createElement("option");
                            option.value = subcat.id;
                            option.textContent = subcat.name;

                            if (subcat.id == selectedSubcat) {
                                option.selected = true;
                            }

                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        alert("Failed to load subcategories");
                        console.error(error);
                    });
            }

            if (categorySelect) {
                categorySelect.addEventListener("change", function() {
                    loadSubcategories(categorySelect.value);
                });

                // On page load, if category is selected (edit mode), load subcategories and preselect old one
                if (categorySelect.value) {
                    loadSubcategories(categorySelect.value, oldSubcategoryId);
                }
            }

            toggleUsageField();
        });

        function toggleUsageField() {
            const usageTypeSelect = document.getElementById("usage_type");
            const usageFieldContainer = document.getElementById("usageFieldContainer");

            if (usageTypeSelect.value === "1") {
                usageFieldContainer.classList.remove("hidden");
            } else {
                usageFieldContainer.classList.add("hidden");
            }
        }
    </script>
</body>

</html>
