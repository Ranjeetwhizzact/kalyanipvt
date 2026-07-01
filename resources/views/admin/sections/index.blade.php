@extends('admin.layouts.app')

@section('title', 'Create Section')

@section('content')
<div class="container mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Section Management</h1>
            <p class="text-sm text-gray-600">Manage your website sections and layouts</p>
        </div>
        <a href="{{ route('sections.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Create New Section
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Sr No.</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Page Name</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Grid Layout</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Order/Type</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                      @if ($sections)
                          @php
                          if(isset($_GET['page'])){
                          $x = ($_GET['page']-1)*15;
                          }else{
                          $x = 0;
                          }
                             @endphp
                @foreach($sections as $index => $section)
                      @php
                          $x = $x+1;
                          @endphp
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{-- {{ $sections->firstItem() + $index }} --}}
                        {{ $x }}
                   
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-medium text-gray-900">{{ $section->page_name }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                            Grid: {{ $section->grid_layout }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                         {{ $section->section_type }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('sections.edit', $section->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded-md transition">Edit</a>
                            
                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded-md transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                @endif
            </tbody>
        </table>

        {{-- <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $sections->links() }}
        </div> --}}
    </div>
</div>
@endsection

@section('scripts')

@endsection