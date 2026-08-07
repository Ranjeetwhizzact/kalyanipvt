@extends('layouts.app')

@section('title', $newsdetail->title . ' - Kalyani Industries Limited')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Custom scrollbar for sidebar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ed8936;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    <main class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class=" grid  grid-cols-5 gap-8">

                <div class="col-span-5 lg:col-span-3 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[400px] w-full">
                        <img src="{{ url($newsdetail->image) }}" class="w-full h-full object-cover"
                            alt="{{ $newsdetail->title }}">
                        <div class="absolute top-6 left-6">
                            <span
                                class="bg-orange-600 text-white text-xs font-bold uppercase px-4 py-2 rounded-full shadow-lg">
                                {{ $newsdetail->section_type }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8 lg:p-12">
                        <div class="flex items-center text-gray-400 text-sm mb-6">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $newsdetail->created_at->format('M d, Y') }}
                            <span class="mx-3">•</span>
                            <span class="text-orange-600 font-semibold">Published by Admin</span>
                        </div>

                        <h1 class="text-3xl lg:text-4xl font-black text-gray-900 leading-tight mb-8">
                            {{ $newsdetail->title }}
                        </h1>

                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed space-y-6">
                            {!! $newsdetail->description !!}
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-gray-900 font-bold uppercase text-xs tracking-widest">Share this story:</span>
                            <!-- Copy Link -->
                            <button onclick="copyToClipboard('{{ request()->fullUrl() }}', this)"
                                title="Copy Link"
                                class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 transition duration-300">
                                <i class="fa-solid fa-link text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-span-5 lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 sticky top-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-8 flex items-center">
                            <span class="w-8 h-1 bg-orange-600 mr-3 rounded-full"></span>
                            Recent Updates
                        </h3>

                        <div class="space-y-8 max-h-[800px] overflow-y-auto pr-2 custom-scrollbar">
                            @foreach ($news as $item)
                                <a href="{{ route('news.show', $item->slug) }}" class="group flex gap-4 items-start">
                                    <div class="w-24 h-20 flex-shrink-0 overflow-hidden rounded-xl shadow-md">
                                        <img src="{{ url($item->image) }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                            alt="{{ $item->title }}">
                                    </div>
                                    <div class="flex-grow">
                                        <p class="text-[10px] font-bold text-orange-600 uppercase tracking-widest mb-1">
                                            {{ $item->created_at->format('M d') }}</p>
                                        <h4
                                            class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-orange-600 transition-colors">
                                            {{ $item->title }}
                                        </h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('footer')
@endsection

@section('scripts')
<script>
    // Copy Link function
    function copyToClipboard(text, element) {
        navigator.clipboard.writeText(text).then(function() {
            const originalHtml = element.innerHTML;
            element.innerHTML = '<i class="fa-solid fa-check text-green-500 text-lg"></i>';
            element.classList.add('border-green-500');
            setTimeout(() => {
                element.innerHTML = originalHtml;
                element.classList.remove('border-green-500');
            }, 2000);
        }).catch(function(err) {
            console.error('Could not copy link: ', err);
        });
    }
</script>
@endsection
