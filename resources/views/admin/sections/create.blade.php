@extends('admin.layouts.app')

@section('title', 'Create Section')

@section('content')
<div class="container mx-auto px-4 py-10" x-data="sectionForm()">
    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Configure Section</h1>
            <p class="text-gray-500 mt-2">Define your page layout, content, and media assets.</p>
        </div>

        <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-8">
            @csrf

            <div class="lg:w-2/3 space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Component Type</label>
                            <div class="flex p-1 bg-gray-100 rounded-lg">
                                <template x-for="type in ['header', 'section', 'footer']">
                                    <button type="button" 
                                        @click="sectionType = type"
                                        :class="sectionType === type ? 'bg-white shadow-sm text-blue-600' : 'text-gray-500 hover:text-gray-700'"
                                        class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-all duration-200 capitalize"
                                        x-text="type">
                                    </button>
                                </template>
                                <input type="hidden" name="section_type" :value="sectionType">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Page Name</label>
                            <input type="text" name="page_name" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm h-10 px-2" placeholder="e.g. Home">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Heading</label>
                            <input type="text" name="heading" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm h-10 px-2" placeholder="Section Title">
                        </div>

                        <template x-if="sectionType === 'section'">
                            <div class="col-span-2 grid grid-cols-2 gap-6 pt-4 border-t border-gray-50">
                                  <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">order</label>
                            <input type="number" name="order" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm h-10 px-2" placeholder="Section Title">
                        </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Grid Layout</label>
                                    <select name="grid_layout" class="w-full rounded-lg border-gray-600 shadow-sm h-10">
                                        <option value="1">1 Column</option>
                                        <option value="2">2 Columns</option>
                                        <option value="3">3 Columns</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Image Position</label>
                                    <select name="image_position" class="w-full rounded-lg border-gray-600 shadow-sm h-10 px-2">
                                        <option value="left">Left Side</option>
                                        <option value="right">Right Side</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Point Type</label>
                                    <select name="point_type" class="w-full rounded-lg border-gray-600 shadow-sm h-10 px-2">
                                        <option value="normal">Standard List</option>
                                        <option value="box point">Icon Boxes</option>
                                    </select>
                                </div>
                            </div>
                        </template>
                        <template x-if="sectionType === 'footer' || sectionType === 'section'">

                            <div class="col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Paragraph Description</label>
                                <textarea name="paragraph" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm"></textarea>
                            </div>
                        </template>

                        <template x-if="sectionType === 'footer'">
                            <div class="col-span-2 pt-4 border-t border-gray-50">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Footer Link (URL)</label>
                                <input type="url" name="link" class="w-full rounded-lg border-gray-300 shadow-sm h-10 px-2" placeholder="https://example.com">
                            </div>
                        </template>
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-300 hover:bg-green-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-95">
                    Save Configuration
                </button>
            </div>

            <div class="lg:w-1/3">
                <div class="sticky top-10 space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Media Asset</h3>
                        
                        <div class="relative group border-2 border-dashed border-gray-300 rounded-xl p-4 hover:border-blue-400 transition-colors">
                            <input type="file" name="image_url" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="previewImage">
                            
                            <div x-show="!imageUrl" class="text-center py-10">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Click to upload or drag & drop</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG up to 10MB</p>
                            </div>

                            <div x-show="imageUrl" class="relative">
                                <img :src="imageUrl" class="rounded-lg w-full h-64 object-cover shadow-md">
                                <button type="button" @click="imageUrl = null" class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path></svg>
                            <p class="text-xs text-blue-800 leading-relaxed">
                                <strong>Pro-tip:</strong> Use high-resolution images for the Header section to improve visual impact.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function sectionForm() {
        return {
            sectionType: 'header',
            imageUrl: null,
            previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    this.imageUrl = URL.createObjectURL(file);
                }
            }
        }
    }
</script>
@endsection