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
                <p class="text-gray-600 mt-2">Track and manage your product activities here.</p>
            </div>

            <!-- Table Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Ads Model Management</h3>
                    <a href="{{ route('admin.adsmodels.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add Ads Model</a>
                </div>

                <!-- Responsive Table -->
                <div >
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                {{-- <th class="py-3 px-4 border-b">Name</th> --}}
                                <th class="py-3 px-4 border-b table-cell">Image</th>
                                {{-- <th class="py-3 px-4 border-b table-cell">Short Description</th> --}}
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Actions</th>
                            </tr>

                        </thead>
                        <tbody>
                            @if ($adsmodels->count() > 0)
                                @php
                                    $x = ($adsmodels->currentPage() - 1) * $adsmodels->perPage();
                                @endphp
                                @foreach ($adsmodels as $item)
                                    @php $x++; @endphp
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-2 text-sm px-4">{{ $x }}</td>
                                        {{-- <td class="py-2 px-3">{{ $item->name }}</td> --}}
                                        <td class="py-2 px-3 table-cell">
                                            <img src="{{asset($item->banner)}}" class="h-10 w-10 rounded-full object-cover" alt="Product Image">
                                        </td>
                                       
                                        {{-- <td class="py-2 px-3 table-cell">{{ $item->discription }}</td> --}}
                                        <td class="py-2 px-3">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td class="py-2 px-3 flex space-x-2 relative">
                                            <!-- Dropdown Container -->
                                         

                                                <!-- Dropdown Content -->
                                                                                            <form action="{{ route('admin.adsmodels.destroy', encrypt($item->id)) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this banner?');">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="block w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
        Delete
    </button>
</form>
                                          
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="py-4 text-center text-gray-500">No categories found.</td>
                                </tr>
                            @endif
                        </tbody>

                     </table>
                     <div class="mt-4">
                        {{ $adsmodels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
