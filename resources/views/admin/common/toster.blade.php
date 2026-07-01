{{-- this is the thing --}}
<div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50"></div>

<!-- JavaScript for Toast Notifications -->
<script>
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toast-container');

        // Create the toast element
        const toast = document.createElement('div');
        toast.className = `flex items-center justify-between max-w-xs w-full p-4 rounded-lg shadow-lg text-white transition-opacity duration-500 opacity-100 ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;

        toast.innerHTML = `
            <span>${message}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 text-white text-lg font-bold focus:outline-none">&times;</button>
        `;

        // Append toast to the container
        toastContainer.appendChild(toast);

        // Auto-remove the toast after 3 seconds
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    }

    // Display Laravel session messages if they exist
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif

        @if(session('error'))
            showToast("{{ session('error') }}", 'error');
        @endif
    });
</script>