@extends('layouts.app')

@section('title', $newsdetail->title . ' - Kalyani Industries Limited')

@section('styles')
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
                            {!! nl2br(e($newsdetail->description)) !!}
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-gray-900 font-bold uppercase text-xs tracking-widest">Share this story:</span>
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="p-2 bg-blue-50 text-blue-500 rounded-full hover:bg-blue-500 hover:text-white transition"><img
                                        src="{{ asset('icon_img/facebook.png') }}" alt="Facebook"
                                        class="w-10 h-auto object-contain rounded-full hover:scale-110 transition-transform duration-200"></a>
                                <a href="#"
                                    class="p-2 bg-sky-50 text-black rounded-full hover:bg-black hover:text-white transition"><img
                                        src="{{ asset('icon_img/twitter.png') }}" alt="Twitter"
                                        class="w-10 h-auto object-contain rounded-full hover:scale-110 transition-transform duration-200"></a>
                                <a href="#"
                                    class="p-2 bg-green-50 text-green-500 rounded-full hover:bg-green-500 hover:text-white transition"><img
                                        src="{{ asset('icon_img/whatapp.png') }}" alt="WhatsApp"
                                        class="w-10 h-auto object-contain rounded-full hover:scale-110 transition-transform duration-200"></a>
                            </div>
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

                        <div class="mt-10 p-6 bg-gradient-to-br from-orange-600 to-red-600 rounded-2xl ">
                            <p class="text-xs font-bold text-white uppercase tracking-widest opacity-80">Got questions?</p>
                            <h4 class="text-lg font-bold text-white mt-1 mb-4">Contact our experts today.</h4>
                            <a href="/contact"
                                class="inline-block bg-white text-orange-600 text-xs font-bold py-2 px-6 rounded-lg shadow-xl hover:scale-105 transition-transform">Get
                                in Touch</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('footer')
@endsection
