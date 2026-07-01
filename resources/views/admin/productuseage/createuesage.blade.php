<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tailwind Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <style>   
    input:checked ~ div.sidebar { width: 50px; }
    input:checked ~ div > div > div img { display: none; }
    input:checked ~ div.sidebar ~ div.main-content { margin-left: 50px; }
    .sidebar, .main-content { transition: all 0.3s ease; }
    @media (max-width: 640px) { .sidebar span { display: none; } }
    @media (min-width: 640px) { .sidebar span { display: inline; } }
  </style>
</head>

<body class="bg-gray-100">
<div class="flex h-screen">
  @include('admin.common.sidenav')

  <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-5">
      @if (session('status') == 'success')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('msg') }}</span>
        </div>
      @endif

      <h2 class="text-2xl font-semibold mb-6">Add New Attributes</h2>

      <form action="{{ url('useagesave') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <input type="hidden" name="id" value="{{ $productatt->id ?? '' }}">
        <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">

        <button type="button" id="add-attribute" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded">Add Attribute</button>

        <div id="attribute-container">
          @if(!empty($productattributes))
          @foreach($productattributes as $index => $values)
  <div class="attribute-group border-b pb-4 mb-4 flex gap-4">
    <div class="w-1/2">
      <label class="block text-sm font-medium text-gray-700 mb-2">Product Attribute Name</label>
      <select name="attribute_name[]" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="" disabled>Select Attribute</option>
        @foreach ($attribute as $item)
          <option value="{{ $item->attribute_name }}" {{ $item->attribute_name == $index ? 'selected' : '' }}>
            {{ $item->attribute_name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="w-1/2">
      <label class="block text-sm font-medium text-gray-700 mb-2">Attribute Values</label>
      <div class="attribute-values space-y-2" data-index="{{ $loop->index }}">
        @foreach ($values as $value)
          <div class="flex items-center space-x-2">
            <input type="text" name="attribute_value[{{ $loop->parent->index }}][]" value="{{ $value }}" class="w-full px-4 py-2 border rounded-lg" required>
            <button type="button" class="add-value px-2 py-1 bg-green-500 text-white rounded">+</button>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endforeach

          @else
            <!-- Default group -->
            <div class="attribute-group border-b pb-4 mb-4 flex gap-4">
              <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Product Attribute Name</label>
                <select name="attribute_name[]" class="w-full px-4 py-2 border rounded-lg" required>
                  <option value="" disabled selected>Select Attribute</option>
                  @foreach ($attribute as $item)
                    <option value="{{ $item->attribute_name }}">{{ $item->attribute_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Attribute Values</label>
                <div class="attribute-values space-y-2" data-index="0">
                  <div class="flex items-center space-x-2">
                    <input type="text" name="attribute_value[0][]" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter value" required>
                    <button type="button" class="add-value px-2 py-1 bg-green-500 text-white rounded">+</button>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>

        <div class="flex justify-end">
          <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    let attributeIndex = $('#attribute-container .attribute-group').length;

    $("#add-attribute").click(function () {
      let newAttribute = `
  <div class="attribute-group border-b pb-4 mb-4 flex gap-4">
    <div class="w-1/2">
      <label class="block text-sm font-medium text-gray-700 mb-2">Product Attribute Name</label>
      <select name="attribute_name[]" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="" disabled selected>Select Attribute</option>
        @foreach ($attribute as $item)
          <option value="{{ $item->attribute_name }}">{{ $item->attribute_name }}</option>
        @endforeach
      </select>
    </div>
    <div class="w-1/2">
      <label class="block text-sm font-medium text-gray-700 mb-2">Attribute Values</label>
      <div class="attribute-values space-y-2" data-index="${attributeIndex}">
        <div class="flex items-center space-x-2">
          <input type="text" name="attribute_value[${attributeIndex}][]" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter value" required>
          <button type="button" class="add-value px-2 py-1 bg-green-500 text-white rounded">+</button>
        </div>
      </div>
    </div>
  </div>
`;

      $("#attribute-container").append(newAttribute);
      attributeIndex++;
    });

    // Add attribute value field
    $("#attribute-container").on("click", ".add-value", function () {
      let index = $(this).closest(".attribute-values").data("index");
      let newValueField = `
        <div class="flex items-center space-x-2">
          <input type="text" name="attribute_value[${index}][]" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter value" required>
          <button type="button" class="remove-value px-2 py-1 bg-red-500 text-white rounded">-</button>
        </div>
      `;
      $(this).closest(".attribute-values").append(newValueField);
    });

    // Remove attribute value field
    $("#attribute-container").on("click", ".remove-value", function () {
      $(this).closest("div").remove();
    });
  });
</script>
</body>
</html>
