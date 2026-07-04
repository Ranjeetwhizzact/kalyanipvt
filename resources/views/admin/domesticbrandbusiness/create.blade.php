@extends('admin.layouts.app')

@section('title', 'Create Section')

@section('styles')
<link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="main-content flex-1 p-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Create New Section</h1>
                <p class="text-gray-600 text-sm">Configure the layout and content for your landing page.</p>
            </div>
            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Editor</span>
        </div>

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden">
            <form id="sectionForm" action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Section Category</label>
                    <select id="section_type" name="section_type" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all px-4 h-11 bg-gray-50 border">
                        <option value="">-- Choose a layout type --</option>
                        <option value="hero">Hero Header (Top of Page)</option>
                        <option value="section">Content Section</option>
                        <option value="footer">Footer Information</option>
                    </select>
                </div>

                <div id="hero_fields" class="hidden space-y-5 animate-fadeIn">
                    <div class="grid grid-cols-1 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Hero Title</label>
                            <input type="text" name="heading" maxlength="50"
                                class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none border"
                                placeholder="Main catchy headline">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Hero Background Image <span class="text-red-500">*</span></label>
                            <div class="relative group border-2 border-gray-300 border-dashed rounded-xl p-4 transition-colors hover:border-blue-400 bg-gray-50">
                                <input type="file" name="image_url" id="hero_image_input" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                
                                <div id="hero_placeholder" class="text-center py-4">
                                    <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <p class="mt-2 text-sm text-gray-500">Click to upload or drag and drop</p>
                                </div>

                                <div id="hero_preview_container" class="hidden relative rounded-lg overflow-hidden border">
                                    <img id="hero_preview" src="#" alt="Preview" class="w-full max-h-64 object-cover">
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <p class="text-white text-sm font-medium">Change Image</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="section_fields" class="hidden space-y-5 animate-fadeIn">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Section Heading</label>
                        <input type="text" name="heading" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 border">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 border"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Side Image</label>
                        <div class="flex items-center space-x-4">
                            <label class="shrink-0">
                                <span class="sr-only">Choose image</span>
                                <input type="file" name="image" id="section_image_input" accept="image/*"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            </label>
                            <img id="section_preview" src="#" alt="Preview" class="hidden h-16 w-16 object-cover rounded-lg border border-gray-200">
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                    <button type="button" onclick="resetForm()" class="px-6 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-green-400 text-white px-8 h-10 rounded-lg font-semibold shadow-sm hover:bg-green-600 focus:ring-4 focus:ring-green-200 transition-all transform active:scale-95">
                        Save Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.4s ease-out forwards; }
</style>
@endsection

@section('scripts')
<script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        if (typeof $ !== "undefined" && typeof $.fn.cleditor !== "undefined") {
            $("#description").cleditor();
        }
    });

    const sectionType = document.getElementById('section_type');
    const heroFields = document.getElementById('hero_fields');
    const sectionFields = document.getElementById('section_fields');
    const heroImgInput = document.getElementById('hero_image_input');
    const sectionImgInput = document.getElementById('section_image_input');

    // 1. Toggle visibility
    sectionType.addEventListener('change', function () {
        heroFields.classList.add('hidden');
        sectionFields.classList.add('hidden');
        
        // Mark Hero Image as required only if Hero is selected
        heroImgInput.required = (this.value === 'hero');

        if (this.value === 'hero') heroFields.classList.remove('hidden');
        if (this.value === 'section') sectionFields.classList.remove('hidden');
    });

    // 2. Image Preview Logic
    function handlePreview(input, previewId, containerId = null, placeholderId = null) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                
                if (containerId) document.getElementById(containerId).classList.remove('hidden');
                if (placeholderId) document.getElementById(placeholderId).classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    heroImgInput.addEventListener('change', function() {
        handlePreview(this, 'hero_preview', 'hero_preview_container', 'hero_placeholder');
    });

    sectionImgInput.addEventListener('change', function() {
        handlePreview(this, 'section_preview');
    });

    // 3. Reset Function
    function resetForm() {
        if (confirm('Are you sure you want to clear the form?')) {
            const form = document.getElementById('sectionForm');
            form.reset();
            
            // Hide all dynamic fields and previews
            heroFields.classList.add('hidden');
            sectionFields.classList.add('hidden');
            document.getElementById('hero_preview_container').classList.add('hidden');
            document.getElementById('hero_placeholder').classList.remove('hidden');
            document.getElementById('section_preview').classList.add('hidden');
        }
    }
</script>
@endsection