<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" referrerpolicy="no-referrer" />
    
    <title class="product-name">@yield('title','Home')</title>
    <link rel="icon" type="image/png" href="{{ asset('fabicon.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Remove this line if using Vite with Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    
    @yield('styles')
    
    <style>
        /* Loading spinner */
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Ensure body takes full height */
        html, body {
            height: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class=" min-h-screen">
        <!-- Sidebar -->
        @include('admin.common.sidenav')
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64"> <!-- Added ml-64 for sidebar width -->
            <!-- Page Content -->
            <main class=" p-6">
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Global Scripts -->
    <script>
        // CSRF token for AJAX
        window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Simple toast notification
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg text-white font-medium ${
                type === 'success' ? 'bg-green-500' : 
                type === 'error' ? 'bg-red-500' : 
                type === 'warning' ? 'bg-yellow-500' : 
                'bg-blue-500'
            }`;
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="ri-${type === 'success' ? 'check' : type === 'error' ? 'close' : 'information'}-circle-line mr-2"></i>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
        
        // Confirm dialog
        function confirmAction(message, callback) {
            if (confirm(message)) {
                if (typeof callback === 'function') {
                    callback();
                }
            }
        }
        
        // Loading overlay
        function showLoading() {
            const loader = document.createElement('div');
            loader.id = 'global-loader';
            loader.className = 'fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50';
            loader.innerHTML = `
                <div class="bg-white p-6 rounded-lg shadow-xl">
                    <div class="spinner mx-auto mb-3"></div>
                    <p class="text-gray-700">Loading...</p>
                </div>
            `;
            document.body.appendChild(loader);
        }
        
        function hideLoading() {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.remove();
            }
        }
        
        // AJAX helper
        function ajaxRequest(url, method = 'GET', data = null) {
            return fetch(url, {
                method: method,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: data ? JSON.stringify(data) : null
            })
            .then(response => response.json());
        }
    </script>
    
    @yield('scripts')
</body>
</html>