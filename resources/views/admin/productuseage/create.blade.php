<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tailwind Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <link href="{{url('/admin/Content/cleditor/jquery.cleditor.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('/admin/Content/Site.css')}}" rel="stylesheet" type="text/css" />
  <style>   
    input:checked ~ div.sidebar {
        width: 50px; 
    }
    input:checked ~ div > div > div img {display: none;}
    input:checked ~ div.sidebar ~ div.main-content {
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
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('msg') }}</span>
    </div>
@endif
    <h2 class="text-2xl font-semibold mb-6">Add New Header</h2>
    <form action="{{url('saveattribute')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <!-- Row for Input Fields: Name, Category, Image -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <input type="hidden" name="id" value="{{isset($productatt->id)?$productatt->id:''}}">
        <!-- Name Input -->
     
        
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
          <input
            type="text"
            id="title"
            name="attribute_name"
            value="{{isset($productatt->name)?$productatt->name:''}}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter product name"
            required
          />
        </div>

        <!-- Category Input -->

  
        <!-- Image Input -->
       
    
      <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Product Status</label>
        <select
          id="status"
          name="is_active"
          value="{{isset($product->is_active)?$product->is_active:''}}"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          required
        >
          <option value="" disabled selected>Select product status</option>
          <option {{ isset($product->is_active) && $product->is_active == "active" ? 'selected' : '' }}>Active</option>
          <option {{ isset($product->is_active) && $product->is_active == "inactive" ? 'selected' : '' }}>Inactive</option>
        </select>
      </div>

    
    
    

      <!-- Status Input (Full Row) -->
     
  
      <!-- Actions: Submit Button -->
      <div class="flex justify-end">
        <button
          type="submit"
          class="bg-blue-500 text-white px-6
           py-2 rounded-lg 
            hover:bg-blue-600
            focus:outline-none focus:ring-2 
            focus:ring-blue-500 
            focus:ring-opacity-50">
          Submit
        </button>
      </div>
    </form>

    
  </div>
  

  
</div>

    
  </div>
  <script src="{{url('/admin/Scripts/jquery-1.6.3.js')}}" type="text/javascript"></script>
  <script src="{{url('/admin/Scripts/jquery.cleditor.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
$(document).ready(function() {
    // Function to handle adding new input fields
    $('#add-attribute').click(function() {
        // Clone the first attribute row and reset the input value
        const newInputGroup = $('#attribute-container .attribute-row').first().clone();
        newInputGroup.find('input').val('');  // Clear the input value
        newInputGroup.find('.subtract-attribute').removeClass('hidden');  // Show the subtract button
        $('#attribute-container').append(newInputGroup);
    });

    // Use delegated event handler to handle the remove action for all dynamically added buttons
    $('#attribute-container').on('click', '.subtract-attribute', function() {
        // Only remove if there is more than one attribute row left
        if ($('#attribute-container .attribute-row').length > 1) {
            $(this).closest('.attribute-row').remove();
        }
    });
});
  </script>
</body>
</html>
