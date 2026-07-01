@extends('admin.layouts.app')

@section('title', 'Create Menu Item')

@section('styles')
<style>
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .image-preview {
        border: 2px dashed #cbd5e0;
        border-radius: 0.5rem;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: #f9fafb;
    }
    .image-preview img {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
    }
    .type-option:hover {
        transform: scale(1.02);
    }
</style>
@endsection

@section('content')
<div class="main-content flex-1 p-6  transition-all duration-300">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Create Menu Item</h1>
            <p class="text-gray-600 mt-2">Add a new navigation menu item</p>
        </div>
        <a href="{{ route('admin.navbar.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-300">
            <i class="ri-arrow-left-line mr-2"></i>Back to List
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <i class="ri-checkbox-circle-line mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <i class="ri-close-circle-line mr-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Container -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 card-hover">
        <form id="menuForm" method="POST" action="{{ route('admin.navbar.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Menu Type Selection -->
            <div class="form-section">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">1. Select Menu Type</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Link Type -->
                    <div class="type-option">
                        <input type="radio" name="type" value="link" id="type_link" 
                               class="hidden peer" {{ old('type', 'link') == 'link' ? 'checked' : '' }}>
                        <label for="type_link" class="block cursor-pointer">
                            <div class="p-5 border-2 border-gray-200 rounded-xl hover:border-blue-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all duration-200">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-600 rounded-full mb-3">
                                        <i class="ri-link text-xl"></i>
                                    </div>
                                    <h3 class="font-semibold text-gray-800 mb-1">Link Menu</h3>
                                    <p class="text-sm text-gray-600">Text link with URL</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Dropdown Type -->
                    <div class="type-option">
                        <input type="radio" name="type" value="dropdown" id="type_dropdown"
                               class="hidden peer" {{ old('type') == 'dropdown' ? 'checked' : '' }}>
                        <label for="type_dropdown" class="block cursor-pointer">
                            <div class="p-5 border-2 border-gray-200 rounded-xl hover:border-purple-300 peer-checked:border-purple-500 peer-checked:bg-purple-50 transition-all duration-200">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-12 h-12 bg-purple-100 text-purple-600 rounded-full mb-3">
                                        <i class="ri-menu-fold text-xl"></i>
                                    </div>
                                    <h3 class="font-semibold text-gray-800 mb-1">Dropdown Menu</h3>
                                    <p class="text-sm text-gray-600">Parent with sub-items</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Image Type -->
                    <div class="type-option">
                        <input type="radio" name="type" value="image" id="type_image"
                               class="hidden peer" {{ old('type') == 'image' ? 'checked' : '' }}>
                        <label for="type_image" class="block cursor-pointer">
                            <div class="p-5 border-2 border-gray-200 rounded-xl hover:border-green-300 peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-200">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-full mb-3">
                                        <i class="ri-image-line text-xl"></i>
                                    </div>
                                    <h3 class="font-semibold text-gray-800 mb-1">Image Menu</h3>
                                    <p class="text-sm text-gray-600">Image with clickable URL</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                
                @error('type')
                    <p class="text-red-500 text-sm mt-2">
                        <i class="ri-error-warning-line mr-1"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Basic Information -->
            <div id="basicInfoSection" class="form-section">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">2. Basic Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                               maxlength="150" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('title') border-red-500 @enderror" 
                               placeholder="Enter menu title"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">
                                <i class="ri-error-warning-line mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- URL Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                           Link URL / Slug (e.g., if Name is About Us then type about-us)<span class="text-red-500 url-required">*</span>
                        </label>
                        <input type="text" name="url" value="{{ old('url') }}" 
                               maxlength="255" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('url') border-red-500 @enderror" 
                               placeholder="">
                        @error('url')
                            <p class="text-red-500 text-sm mt-1">
                                <i class="ri-error-warning-line mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Parent ID Field (Only for dropdown type) -->
                <div id="parentIdSection" class="mt-6" style="display: none;">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Parent Menu</label>
                    <select name="parent_id" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('parent_id') border-red-500 @enderror">
                        <option value="">No Parent (Top Level)</option>
                        @foreach($parentMenus as $parent)
                            <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                {{ $parent->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <p class="text-red-500 text-sm mt-1">
                            <i class="ri-error-warning-line mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Image Upload Field (Only for image type) -->
                <div id="imageSection" class="mt-6" style="display: none;">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Image <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Image Preview -->
                        <div>
                            <div class="image-preview">
                                <div id="imagePreviewPlaceholder" class="text-center p-6">
                                    <i class="ri-image-line text-4xl text-gray-400 mb-3"></i>
                                    <p class="text-gray-500 font-medium">No image selected</p>
                                    <p class="text-sm text-gray-400 mt-1">Preview will appear here</p>
                                </div>
                                <img id="imagePreview" class="hidden w-full h-auto" alt="Image preview">
                            </div>
                        </div>

                        <!-- Upload Controls -->
                        <div class="space-y-4">
                            <!-- File Upload -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Image</label>
                                <div class="flex items-center space-x-3 border-gray-500">
                                    <input type="file" id="imageInput" name="image" accept="image/*" class="hidden bg-amber-500 border-2 border-gray-500">
                                    <button type="button" id="uploadBtn" class="bg-gray-400 hover:bg-blue-600 text-gray-500 font-medium py-3 px-5 rounded-lg transition duration-300 flex items-center">
                                        <i class="ri-upload-cloud-line mr-2"></i>Choose Image
                                    </button>
                                    <span id="fileName" class="text-sm text-gray-500">No file chosen</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">
                                    Supported formats: JPG, PNG, GIF, SVG, WebP. Max size: 2MB
                                </p>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">
                                        <i class="ri-error-warning-line mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- OR Divider -->
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500">OR</span>
                                </div>
                            </div>

                            <!-- Direct Image Path -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Direct Image URL</label>
                                <input type="text" name="image_path" value="{{ old('image_path') }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('image_path') border-red-500 @enderror" 
                                       placeholder="https://example.com/images/menu.jpg">
                                @error('image_path')
                                    <p class="text-red-500 text-sm mt-1">
                                        <i class="ri-error-warning-line mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="form-section">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">3. Settings</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Order Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order Number</label>
                        <div class="relative">
                            <input type="number" name="order_no" value="{{ old('order_no', 0) }}" 
                                   min="0" step="1"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('order_no') border-red-500 @enderror">
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex space-x-1">
                                <button type="button" id="decreaseOrder" class="p-1 text-gray-500 hover:text-gray-700">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <button type="button" id="increaseOrder" class="p-1 text-gray-500 hover:text-gray-700">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        @error('order_no')
                            <p class="text-red-500 text-sm mt-1">
                                <i class="ri-error-warning-line mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Status -->
                  <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
    <div class="flex space-x-3">

        <!-- ACTIVE -->
        <div class="flex-1">
            <input type="radio" name="status" value="active" id="status_active"
                class="hidden peer/active"
                {{ old('status', 'active') == 'active' ? 'checked' : '' }}>

            <label for="status_active"
                class="flex items-center justify-center p-3 border border-gray-300 rounded-lg cursor-pointer
                hover:bg-green-50 transition duration-300
                peer-checked/active:border-orange-400
                peer-checked/active:bg-green-100
                peer-checked/active:text-green-600">
                <i class="ri-checkbox-circle-line mr-2"></i> Active
            </label>
        </div>

        <!-- INACTIVE -->
        <div class="flex-1">
            <input type="radio" name="status" value="inactive" id="status_inactive"
                class="hidden peer/inactive"
                {{ old('status') == 'inactive' ? 'checked' : '' }}>

            <label for="status_inactive"
                class="flex items-center justify-center p-3 border border-gray-300 rounded-lg cursor-pointer
                hover:bg-red-50 transition duration-300
                peer-checked/inactive:border-red-400
                peer-checked/inactive:bg-red-100
                peer-checked/inactive:text-red-600">
                <i class="ri-close-circle-line mr-2"></i> Inactive
            </label>
        </div>

    </div>

    @error('status')
        <p class="text-red-500 text-sm mt-1">
            <i class="ri-error-warning-line mr-1"></i>
            {{ $message }}
        </p>
    @enderror
</div>

                </div>

                <!-- Static Fields: Alignment and Location -->
                {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Alignment -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alignment</label>
                        <select name="alignment" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('alignment') border-red-500 @enderror">
                            <option value="left" {{ old('alignment', 'left') == 'left' ? 'selected' : '' }}>Left</option>
                            <option value="center" {{ old('alignment') == 'center' ? 'selected' : '' }}>Center</option>
                            <option value="right" {{ old('alignment') == 'right' ? 'selected' : '' }}>Right</option>
                        </select>
                        @error('alignment')
                            <p class="text-red-500 text-sm mt-1">
                                <i class="ri-error-warning-line mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <select name="location" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('location') border-red-500 @enderror">
                            <option value="navbar" {{ old('location', 'navbar') == 'navbar' ? 'selected' : '' }}>Navbar</option>
                            <option value="sidebar" {{ old('location') == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                        </select>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">
                                <i class="ri-error-warning-line mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div> --}}
            </div>

            <!-- Form Actions -->
            <div class="pt-6 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <a href="{{ route('admin.navbar.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition duration-300">
                        Cancel
                    </a>
                    <div class="flex space-x-4">
                        <button type="reset" id="resetBtn" class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition duration-300">
                            <i class="ri-refresh-line mr-2"></i>Reset
                        </button>
                        <button type="submit" class="px-8 py-3 bg-green-400 hover:bg-green-600 text-white font-medium rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                            <i class="ri-save-line mr-2"></i>Save Menu Item
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Get initial type
    let currentType = $('input[name="type"]:checked').val() || 'link';
    
    // Initialize form
    updateFormForType(currentType);
    
    // Handle type change
    $('input[name="type"]').change(function() {
        currentType = $(this).val();
        updateFormForType(currentType);
    });
    
    // File upload handling
    $('#uploadBtn').click(function() {
        $('#imageInput').click();
    });
    
    $('#imageInput').change(function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file
            if (!validateImageFile(file)) {
                return;
            }
            
            // Update file name
            $('#fileName').text(file.name).addClass('text-blue-600 font-medium');
            
            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).removeClass('hidden');
                $('#imagePreviewPlaceholder').addClass('hidden');
            };
            reader.readAsDataURL(file);
            
            // Clear direct URL input
            $('input[name="image_path"]').val('');
        }
    });
    
    // Order number buttons
    $('#decreaseOrder').click(function() {
        const $input = $('input[name="order_no"]');
        let current = parseInt($input.val()) || 0;
        if (current > 0) {
            $input.val(current - 1);
        }
    });
    
    $('#increaseOrder').click(function() {
        const $input = $('input[name="order_no"]');
        let current = parseInt($input.val()) || 0;
        $input.val(current + 1);
    });
    
    // Reset button
    $('#resetBtn').click(function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to reset the form? All changes will be lost.')) {
            $('#menuForm')[0].reset();
            currentType = 'link';
            $('input[name="type"][value="link"]').prop('checked', true);
            updateFormForType('link');
            
            // Reset image preview
            $('#imagePreview').attr('src', '').addClass('hidden');
            $('#imagePreviewPlaceholder').removeClass('hidden');
            $('#fileName').text('No file chosen').removeClass('text-blue-600 font-medium');
        }
    });
    
    // Form submission validation
    // $('#menuForm').submit(function(e) {
    //     if (!validateForm()) {
    //         e.preventDefault();
    //         showToast('Please fill in all required fields correctly.', 'error');
    //     }
    // });
    
    // Functions
    function updateFormForType(type) {
        console.log('Updating form for type:', type);
        
        // Hide all conditional sections first
        $('#parentIdSection').hide();
        $('#imageSection').hide();
        
        // Update URL field requirement
        const $urlRequired = $('.url-required');
        const $urlInput = $('input[name="url"]');
        
        switch(type) {
            case 'link':
                $urlRequired.show();
                $urlInput.prop('required', true);
                $urlInput.attr('placeholder', 'https://example.com/page');
                break;
                
            case 'dropdown':
                $urlRequired.hide();
                $urlInput.prop('required', false);
                $urlInput.attr('placeholder', 'Optional: Enter URL for dropdown parent');
                $('#parentIdSection').show();
                break;
                
            case 'image':
                $urlRequired.show();
                $urlInput.prop('required', true);
                $urlInput.attr('placeholder', 'https://example.com/page (where image links to)');
                $('#imageSection').show();
                break;
        }
    }
    
    function validateImageFile(file) {
        // File size validation (2MB)
        if (file.size > 2 * 1024 * 1024) {
            showToast('File size must be less than 2MB.', 'error');
            $('#imageInput').val('');
            $('#fileName').text('No file chosen');
            return false;
        }
        
        // File type validation
        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            showToast('Please upload a valid image file (JPG, PNG, GIF, SVG, WebP).', 'error');
            $('#imageInput').val('');
            $('#fileName').text('No file chosen');
            return false;
        }
        
        return true;
    }
    
    // function validateForm() {
    //     let isValid = true;
        
    //     switch(currentType) {
    //         case 'link':
    //             const title = $('input[name="title"]').val().trim();
    //             const url = $('input[name="url"]').val().trim();
    //             isValid = title !== '' && url !== '' && isValidUrl(url);
    //             break;
                
    //         case 'dropdown':
    //             const dropdownTitle = $('input[name="title"]').val().trim();
    //             isValid = dropdownTitle !== '';
    //             break;
                
    //         case 'image':
    //             const hasImageFile = $('#imageInput')[0].files.length > 0;
    //             const imagePath = $('input[name="image_path"]').val().trim();
    //             const hasImagePath = imagePath !== '';
    //             const imageUrl = $('input[name="url"]').val().trim();
    //             const hasValidUrl = imageUrl !== '' && isValidUrl(imageUrl);
                
    //             isValid = (hasImageFile || hasImagePath) && hasValidUrl;
    //             break;
    //     }
        
    //     return isValid;
    // }
    
    // function isValidUrl(string) {
    //     try {
    //         new URL(string);
    //         return true;
    //     } catch (_) {
    //         return false;
    //     }
    // }
    
    function showToast(message, type = 'info') {
        // Remove existing toasts
        $('.custom-toast').remove();
        
        // Create toast
        const toast = $(`
            <div class="custom-toast fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform transition-all duration-300 opacity-0 translate-y-[-20px] ${
                type === 'success' ? 'bg-green-500' : 
                type === 'error' ? 'bg-red-500' : 
                type === 'warning' ? 'bg-yellow-500' : 
                'bg-blue-500'
            }">
                <div class="flex items-center">
                    <i class="${type === 'success' ? 'ri-check-circle-line' :
                              type === 'error' ? 'ri-close-circle-line' :
                              type === 'warning' ? 'ri-alert-line' :
                              'ri-information-line'} mr-2"></i>
                    ${message}
                </div>
            </div>
        `);
        
        $('body').append(toast);
        
        // Animate in
        setTimeout(() => {
            toast.css({
                'opacity': '1',
                'transform': 'translateY(0)'
            });
        }, 10);
        
        // Remove after 4 seconds
        setTimeout(() => {
            toast.css({
                'opacity': '0',
                'transform': 'translateY(-20px)'
            });
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4000);
    }
});
</script>
@endsection