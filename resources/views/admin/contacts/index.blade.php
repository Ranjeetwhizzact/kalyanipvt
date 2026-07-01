<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Dashboard - Contacts</title>
    <style>
        /* Sidebar transition and hover effects */
        .sidebar {
            transition: width 0.3s ease;
        }
        .main-content {
            transition: margin-left 0.3s ease;
        }
        .dropdown-content {
            display: none;
        }
        .dropdown:hover .dropdown-content,
        .dropdown:focus-within .dropdown-content {
            display: block;
        }
        
        /* Custom scrollbar for tables */
        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Component -->
        @include('admin.common.sidenav')

        <!-- Toast Notifications Component -->
        @include('admin.common.toster')

        <!-- Main Content Area -->
          <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">
            <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <!-- Header with title and add button -->
                <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="ri-contacts-book-2-line mr-3 text-blue-600"></i>
                        Contacts Management
                    </h2>
                    <a href="{{ route('admin.contacts.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="ri-add-line mr-1 text-lg"></i>
                        Add New Contact
                    </a>
                </div>

                <!-- Success Message Alert -->
                @if(session('success'))
                    <div class="mb-5 p-4 bg-green-50 border-l-4 border-green-500 rounded-md shadow-sm flex items-center justify-between animate-pulse">
                        <div class="flex items-center">
                            <i class="ri-checkbox-circle-line text-green-500 text-xl mr-3"></i>
                            <span class="text-green-700 font-medium">{{ session('success') }}</span>
                        </div>
                        <button type="button" class="text-green-500 hover:text-green-700" onclick="this.parentElement.style.display='none'">
                            <i class="ri-close-line text-xl"></i>
                        </button>
                    </div>
                @endif

                <!-- Contacts Table Card -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Telephone Number</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">WhatsApp</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email Address</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse($contacts as $contact)
                                    @php
                                        // Calculate correct serial number for paginated results
                                        $serialNumber = ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration;
                                    @endphp
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out group">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $serialNumber }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            <div class="flex items-center">
                                                <i class="ri-phone-line text-gray-400 mr-2"></i>
                                                {{ $contact->contact_number }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            @if($contact->whatsapp_number)
                                                <div class="flex items-center">
                                                    <i class="ri-whatsapp-line text-green-500 mr-2"></i>
                                                    {{ $contact->whatsapp_number }}
                                                </div>
                                            @else
                                                <span class="text-gray-400 italic">Not provided</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            <div class="flex items-center">
                                                <i class="ri-mail-line text-gray-400 mr-2"></i>
                                                <a href="mailto:{{ $contact->mail }}" class="text-blue-600 hover:underline">
                                                    {{ $contact->mail }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium shadow-sm
                                                @if($contact->status === 'active') bg-green-100 text-green-800 border border-green-200
                                                @elseif($contact->status === 'inactive') bg-gray-100 text-gray-800 border border-gray-200
                                                @else bg-yellow-100 text-yellow-800 border border-yellow-200 @endif">
                                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 
                                                    @if($contact->status === 'active') bg-green-500
                                                    @elseif($contact->status === 'inactive') bg-gray-500
                                                    @else bg-yellow-500 @endif"></span>
                                                {{ ucfirst($contact->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('admin.contacts.edit', $contact->id) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold rounded-lg transition duration-150 shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                                                    <i class="ri-edit-box-line mr-1"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                      method="POST"
                                                      class="inline-block"
                                                      onsubmit="return confirm('Are you sure you want to delete this contact? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold rounded-lg transition duration-150 shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                        <i class="ri-delete-bin-line mr-1"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <i class="ri-inbox-line text-5xl text-gray-300 mb-3"></i>
                                                <p class="text-gray-500 font-medium">No contacts found</p>
                                                <p class="text-gray-400 text-sm mt-1">Get started by adding your first contact.</p>
                                                <a href="{{ route('admin.contacts.create') }}" class="mt-3 inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg text-sm hover:bg-blue-200 transition">
                                                    <i class="ri-add-line mr-1"></i> Add Contact
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination Links -->
                    @if($contacts->hasPages())
                        <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
                            {{ $contacts->links() }}
                        </div>
                    @endif
                </div>
                
                <!-- Optional: Display summary info -->
                @if($contacts->total() > 0)
                    <div class="mt-4 text-sm text-gray-500 flex justify-between items-center">
                        <span>Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Optional JavaScript for auto-dismissing alerts -->
    <script>
        // Auto-hide success message after 4 seconds
        setTimeout(function() {
            const alert = document.querySelector('.animate-pulse');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert && alert.parentElement) alert.remove();
                }, 500);
            }
        }, 4000);
    </script>
</body>
</html>