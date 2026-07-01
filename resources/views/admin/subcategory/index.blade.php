<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Dashboard</title>
    <style>
        
        input:checked ~ div.sidebar {
            width: 50px; 
        }

        input:checked ~ div.sidebar ~ div.main-content {
            margin-left: 50px; 
        }

        input:checked ~ div > div > div img {display: none;}
        .sidebar {
            transition: width 0.3s ease;
        }

        .main-content {
            transition: margin-left 0.3s ease;
        }
        .dropdown-content {
            display: none;
        }

        /* Show dropdown when the parent div is focused */
        .dropdown:hover .dropdown-content,
        .dropdown:focus-within .dropdown-content {
            display: block;
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
        <!-- Sidebar -->
      @include('admin.common.sidenav')
      @include('admin.common.toster')
        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
            <!-- Welcome Section -->
            <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold">Welcome, {{ auth()->user()->name ?? 'Guest' }}!</h2>
                <p class="text-gray-600 mt-2">Track and manage your subcategory activities here.</p>
            </div>

            <!-- Table Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Subcategory Management</h3>
                    <a href="{{url('/addsubcategory')}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Create New subcategory</a>
                </div>

                <!-- Responsive Table -->
                <div class="overflow-x-auto h-screen">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Name</th>
                                <th class="py-3 px-4 border-b table-cell">Image</th>
                                <th class="py-3 px-4 border-b table-cell">Description</th>
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if ($subcategory)
                          @php
                          if(isset($_GET['page'])){
                          $x = ($_GET['page']-1)*15;
                          }else{
                          $x = 0;
                          }
                          @endphp
                          @foreach ($subcategory as $item)
                          @php
                          $x = $x+1;
                          @endphp
                            <!-- Sample Row 1 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4"> {{$x}}</td>
                                <td class="py-3 px-4">{{$item->name}}</td>
                                <td class="py-3 px-4 table-cell">
                                    <img src="{{asset($item->img)}}" class="h-10 w-10 rounded-full object-cover" alt="subcategory Image">
                                </td>
                                <td class="py-3 px-4 table-cell">
                                    <p class=" line-clamp-3 h-18 overflow-hidden text-ellipsis">
                                    {{$item->short_discription}}
                                    <p>
                                </td>

                                <td class="py-3 px-4">{{$item->is_active}}</td>
                                <td class="py-3 px-4 flex space-x-2">
                                    {{-- <a href="{{url('editsubcategory/'.encrypt($item->id))}}" class="bg-green-500 text-white px-3 py-1 text-sm rounded-lg hover:bg-green-600">Edit</a>
                                    <form action="{{ url('deletesubcategory/'.encrypt($item->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subcategory?');" class="inline-block">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-500 text-white px-3 py-1 text-sm rounded-lg hover:bg-red-600">
                                          Delete
                                      </button>
                                  </form> --}}
                                  <div class="relative inline-block text-left dropdown">
                                    <div>
                                        <button type="button" class="inline-flex justify-between w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" aria-haspopup="true" aria-expanded="true">
                                         Setting
                                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
            
                                    <div class="absolute right-0 z-10  w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown-content" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" tabindex="-1">
                                        <div class="py-1" role="none">
                                           
                                         
                                            <a href="{{url('editsubcategory/'.encrypt($item->id))}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit</a>
                                            <div class="block px-4 py-2 cursor-pointer text-sm text-gray-700 hover:bg-gray-100" role="menuitem">  
                                                <form action="{{ url('deletesubcat/'.encrypt($item->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subcategory?');" class="inline-block  w-full h-full">
                                                @csrf
                                                @method('DELETE')
                                                 <input type="submit" class="cursor-pointer w-full text-start" value="Delete">
                                                </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
