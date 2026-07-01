@extends('layouts.app')

@section('title', 'News & Updates - Kalyani Industries Limited')

@section('styles')
    <style>
        /* Styling for the numbered pagination buttons */
        .custom-pagination nav span[aria-current="page"] span {
            background-color: #ea580c !important;
            /* Orange-600 */
            border-color: #ea580c !important;
            color: white !important;
        }

        .custom-pagination nav a:hover {
            background-color: #fff7ed !important;
            /* Orange-50 */
            color: #ea580c !important;
            border-color: #fdba74 !important;
            /* Orange-300 */
        }

        .custom-pagination nav a,
        .custom-pagination nav span {
            border-radius: 8px !important;
            margin: 0 2px;
            transition: all 0.2s;
        }
    </style>
@endsection

@section('content')
<header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
        </header>

    <section class="w-full md:w-11/12 2xl:w-10/12 block m-auto py-2">
        <div class="max-w-7xl mx-auto my-16 px-4">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 border-b border-gray-100 pb-8">
                <div>
                    <h2 class="text-4xl font-black text-gray-900 tracking-tight">Latest Updates</h2>
                    <p class="text-gray-500 mt-2 text-lg">Stay informed with the latest industry insights.</p>
                </div>
                <a href="#" class="text-orange-600 font-bold flex items-center hover:text-orange-700 transition">
                    View Archive
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 py-10">
                @foreach ($news as $item)
                    <article
                        class="group bg-white flex flex-col h-full rounded-3xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)]">
                        <div class="relative overflow-hidden rounded-t-3xl aspect-[16/10] z-10">
                            <img src="{{ url($item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-[300px]  object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                            <span
                                class="absolute top-4 left-4 bg-orange-500 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest px-3 mx-2 py-1.5 rounded-full shadow-lg">
                                {{ $item->section_type ?? 'News' }}
                            </span>

                            @if ($item->created_at->gt(now()->subDays(3)))
                                <span
                                    class="absolute top-4 right-4 bg-gradient-to-r from-orange-500 to-red-600 text-white text-[10px] font-black uppercase px-3 py-1.5 rounded-lg shadow-xl animate-pulse">New</span>
                            @endif

                            <div
                                class="absolute bottom-4 left-4 right-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                                <div
                                    class="bg-orange-600  border  px-4 py-2 rounded-xl shadow-2xl text-white text-xs font-bold">
                                    {{ $item->created_at->format('M d, Y') }}
                                </div>
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>

                        <div class="flex flex-col flex-grow p-6 border-x border-b border-gray-100 rounded-b-3xl">
                            <h3
                                class="text-xl font-bold text-gray-900 mb-4 leading-tight  transition-colors line-clamp-2 capitalize">
                                {{ $item->title }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">{{ $item->description }}</p>
                            <div class="mt-4 pt-5 flex items-center justify-between border-t border-gray-50">
                                <a href="{{ route('news.show', $item->slug) }}"
                                    class="relative inline-flex items-center text-xs font-black uppercase tracking-widest text-orange-600 group/link">
                                    <span>Read Full Story</span>
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover/link:translate-x-2"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-16 border-t border-gray-100 pt-10 flex justify-center custom-pagination">
                {{ $news->links('pagination::tailwind') }}
            </div>
        </div>
    </section>

    @include('footer')
@endsection
