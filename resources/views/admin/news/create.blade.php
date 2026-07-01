<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tailwind Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <link href="{{asset('backend/admin/Content/cleditor/jquery.cleditor.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('backend/admin/Content/Site.css')}}" rel="stylesheet" type="text/css" />
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
      <!-- Welcome Section -->
      <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">
        @if (session('status') == 'success')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('msg') }}</span>
        </div>
        @endif
        <h2 class="text-2xl font-semibold mb-6">Add News</h2>
        <form action="{{url('storenews')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Row for Input Fields: Name, Category, Image -->
          <div class="grid grid-cols-2 gap-4 mb-4">
            <input type="hidden" name="id" value="{{isset($news->id)?$news->id:''}}">
            <!-- Name Input -->

            @if(isset($news->id))
            <div class="col-span-2">
              <label for="fileInput" class="block text-sm font-medium text-gray-700 mb-2">Upload photo</label>
              <label for="fileInput">
                <img src="{{ $news->image ?? asset('backend/assests/img/article2.png') }}" alt="Selected Image"
                  class="h-20 object-cover" id="selectedImage">
              </label>
              <div id="imageContainer">
                <input type="file" name="image" id="fileInput" class="hidden" accept="image/*">
              </div>
            </div>
            @else
            <div class="col-span-2">
              <label for="fileInput" class="block text-sm font-medium text-gray-700 mb-2">Upload photo</label>
              <label for="fileInput">
                <img src="{{ asset('backend/assests/img/article2.png') }}" alt="Default Image" class="h-20 object-cover"
                  id="selectedImage">
              </label>
              <div id="imageContainer">
                <input type="file" name="image" id="fileInput" class="hidden" accept="image/*" required>
              </div>
            </div>
            @endif


            <div class="mb-4 col-span-2 md:col-span-1">
              <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
              <select id="status" name="is_active" value="{{isset($news->is_active)?$news->is_active:''}}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                required>
                <option value="" disabled selected>Select product status</option>
                <option {{ isset($news->is_active) && $news->is_active == "active" ? 'selected' : '' }}>Active</option>
                <option {{ isset($news->is_active) && $news->is_active == "inactive" ? 'selected' : '' }}>Inactive
                </option>
              </select>
            </div>
            <div class="col-span-2 md:col-span-1">
              <label for="occupation" class="block text-sm font-medium text-gray-700 mb-2">date</label>
              <input type="date" id="title" name="date" value="{{isset($news->date)?$news->date:''}}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter occupation" required />
            </div>
              <div class="col-span-2 md:col-span-1">
              <label for="section_type" class="block text-sm font-medium text-gray-700 mb-2">Section Type</label>
              <input type="section_type" id="section_type" name="section_type" value="{{isset($news->section_type)?$news->section_type:''}}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter occupation" required />
            </div>
            <div class="col-span-2 md:col-span-1">
              <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
              <textarea id="title" name="title" value=""
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter product name" rows="7" required> {{isset($news->title)?$news->title:''}}</textarea>
            </div>
           

            <div class="col-span-2 md:col-span-1">
              <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Discription</label>
              <textarea id="title" name="description" value=""
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter product name" rows="7"
                required> {{isset($news->description)?$news->description:''}}</textarea>
            </div>

            <!-- Category Input -->

            <!-- Image Input -->

            <!-- Status Input (Full Row) -->

            <!-- Actions: Submit Button -->
            <div class="flex col-span-2 justify-end">
              <button type="submit" class="bg-blue-500 text-white px-6
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
  <script src="{{asset('backend/admin/Scripts/jquery-1.6.3.js')}}" type="text/javascript"></script>
  <script src="{{asset('backend/admin/Scripts/jquery.cleditor.js')}}" type="text/javascript"></script>
  <script type="text/javascript">

  </script>
</body>
<script>
  function previewImage(inputId, imgId) {
    document.getElementById(inputId).addEventListener('change', function (event) {
      const file = event.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
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

</html>