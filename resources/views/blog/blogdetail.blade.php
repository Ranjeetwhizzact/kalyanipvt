@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <main class="max-w-7xl mx-auto px-4 py-12 lg:flex lg:gap-16">

        <div class="lg:w-2/3">
            <div class="max-w-4xl mx-auto px-4">

                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-sm font-semibold text-skill-blue mb-6">
                    <a href="{{ url('/') }}" class="hover:underline">Home</a>
                    <span>/</span>
                    <a href="{{ route('bloglist') }}" class="hover:underline">
                        {{ $post->category->name ?? 'Resources' }}
                    </a>
                    <span>/</span>
                    <span class="text-slate-400">{{ $post->title }}</span>
                </nav>

                {{-- Title --}}
                <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-8">
                    {{ $post->title }}
                </h1>

                {{-- Meta Info --}}
                <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                    <span>{{ $post->reading_time }} min read</span>
                    <span>•</span>
                    <span>{{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }}</span>
                </div>

            </div>

            {{-- Featured Image --}}
            <div class="relative rounded-3xl overflow-hidden shadow-2xl mb-12">
                <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}"
                    class="w-full h-[450px] object-cover">

                @if ($post->views_count > 50)
                    <div
                        class="absolute top-6 right-6 bg-skill-orange text-white px-4 py-1 rounded-full text-sm font-bold shadow-lg">
                        Trending
                    </div>
                @endif
            </div>

            {{-- Article Content --}}
            <article class="prose prose-lg max-w-none text-slate-600 leading-relaxed px-4">

                {{-- Styled Summary --}}
                @if ($post->summary)
                    <div class="not-prose mb-8">
                        <p class="text-xl font-medium text-slate-900 leading-relaxed border-l-4 border-orange-500 pl-4">
                            {!! strip_tags($post->summary) !!}
                        </p>
                    </div>
                @endif

                {{-- Content --}}
                {!! collect(explode("\n", $post->content))->filter()->map(fn($line) => "<p>$line</p>")->implode('') !!}

            </article>
            {{-- Tags + Share Section --}}
            <div
                class="mt-16 pt-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6 px-4">

                {{-- Meta Keywords as Tags --}}
                <div class="flex gap-2 flex-wrap">
                    @foreach (explode(',', $post->meta_keywords) as $keyword)
                        <span class="bg-slate-100 px-4 py-2 rounded-lg text-sm font-medium">
                            #{{ trim($keyword) }}
                        </span>
                    @endforeach
                </div>

                {{-- Share --}}
                <div class="flex items-center gap-4">
                    <span class="text-sm font-bold text-slate-400">SHARE:</span>

                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"
                        class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center hover:bg-skill-blue hover:text-white transition">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                </div>
            </div>
        </div>

        <aside class="lg:w-1/3 mt-16 lg:mt-0">
            <div class="sticky top-10 space-y-10">

                <div class="bg-orange-900 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                    <div class="relative z-10">
                        <h3 class="text-2xl font-extrabold mb-4 italic">Kalyani Plus</h3>
                        <p class="text-blue-100 mb-6 text-sm">Get unlimited access to 100+ premium tech courses and industry
                            certifications.</p>
                        <button
                            class="w-full bg-orange-500 py-3 hover:border-orange-500 hover:text-orange-500 rounded-xl font-bold uppercase tracking-wider hover:bg-white hover:text-skill-orange transition">
                            Enroll Now
                        </button>
                    </div>
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <h3 class="text-lg font-bold text-slate-900 mb-6 border-b pb-4">
                        Recent Stories
                    </h3>

                    <div class="space-y-6">
                        @foreach ($otherBlogs as $blog)
                            <a href="{{ route('blogdetail', $blog->slug) }}" class="flex gap-4 group">

                                <img src="{{ asset($blog->featured_image) }}"
                                    class="w-16 h-16 rounded-xl object-cover shrink-0">

                                <div>
                                    <h4 class="text-sm font-bold group-hover:text-orange-700 transition">
                                        {{ $blog->title }}
                                    </h4>

                                    <span class="text-[10px] font-bold text-slate-400">
                                        {{ $blog->created_at->format('M d, Y') }}
                                    </span>
                                </div>

                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Weekly Briefing</h3>
                    <p class="text-sm text-slate-500 mb-6">The best of Kalyani articles sent to your inbox.</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Address"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-skill-blue outline-none transition">
                        <button
                            class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-skill-blue transition">Join
                            Newsletter</button>
                    </form>
                </div>

            </div>
        </aside>

    </main>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
