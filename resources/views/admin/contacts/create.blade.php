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
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <form action="{{ route('admin.contacts.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Telephone Number</label>
            <input type="text" name="contact_number" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" 
                   >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Whatsapp Number</label>
            <input type="text" name="whatsapp_number" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="mail" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" 
                   >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" 
                    class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="pending">Pending</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow transition duration-150 cursor-pointer">
                Save
            </button>
        </div>
    </form>
</div> 
        </div>
    </div>
</body>

</html>
