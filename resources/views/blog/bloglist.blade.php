@extends('layouts.app')

@section('title', 'Blogs Details - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    <div class="bg-white border-b border-gray-100 py-12 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                {{ $blogPageSetting->title }} <span class="text-orange-500">{{ $blogPageSetting->title_highlight }}</span>
            </h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                {{ $blogPageSetting->subtitle }}
            </p>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
        {{-- <div class="flex flex-wrap justify-center gap-3 mb-10">
      <button class="bg-skill-blue text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg">All Posts</button>
      <button class="bg-white text-gray-600 hover:text-skill-blue px-6 py-2 rounded-full text-sm font-semibold shadow-sm transition border border-gray-100">Web Development</button>
      <button class="bg-white text-gray-600 hover:text-skill-blue px-6 py-2 rounded-full text-sm font-semibold shadow-sm transition border border-gray-100">Data Science</button>
      <button class="bg-white text-gray-600 hover:text-skill-blue px-6 py-2 rounded-full text-sm font-semibold shadow-sm transition border border-gray-100">Career Tips</button>
    </div> --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            @foreach ($blogs as $post)
                <article
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">

                    <div class="relative overflow-hidden">
                        <img class="h-56 w-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="{{ $post->featured_image ?? 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=800' }}"
                            alt="{{ $post->title }}">

                        @if ($loop->first)
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-orange-500 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-md">
                                    New
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="p-6">

                        {{-- Category --}}
                        <div class="flex items-center text-xs font-semibold text-skill-blue mb-3 uppercase tracking-wider">
                            {{ $post->category->name ?? 'General' }}
                        </div>

                        {{-- Title --}}
                        <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-skill-blue transition-colors">
                            <a href="{{ route('blogdetail', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        {{-- Summary / Content --}}
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-6">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}
                            {{-- {{ \Illuminate\Support\Str::limit($post->summary ?? strip_tags($post->content), 120) }} --}}
                        </p>

                        {{-- Author & Reading Time --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">

                            <div class="flex items-center gap-2">

                                {{-- Author Avatar --}}
                                <div
                                    class="w-8 h-8 rounded-full bg-skill-blue flex items-center justify-center text-white text-[10px] font-bold">
                                    {{ strtoupper(substr($post->author->name ?? 'A', 0, 2)) }}
                                </div>

                                {{-- Logo Icon --}}
                                <div
                                    class="w-8 h-8 rounded-full bg-white flex items-center justify-center overflow-hidden border border-gray-200">
                                    <img src="{{ asset('fabicon.png') }}" alt="Logo" class="w-4 h-4 object-contain">
                                </div>

                                {{-- Author Name --}}
                                <span class="text-xs font-medium text-gray-700">
                                    {{ $post->author->name ?? 'Kalyani Team' }}
                                </span>

                            </div>

                            {{-- Reading Time --}}
                            <span class="text-[11px] text-gray-400 font-medium italic">
                                {{ $post->reading_time }} min read
                            </span>

                        </div>

                    </div>
                </article>
            @endforeach

        </div>

        {{-- Pagination --}}
        {{-- <div class="mt-16 flex justify-center pb-20">
            {{ $posts->links() }}
        </div> --}}
    </main>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
