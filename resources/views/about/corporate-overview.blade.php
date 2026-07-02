@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')

@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    <section class="relative w-full min-h-[600px] lg:min-h-[800px] flex items-center justify-center overflow-hidden py-20">

        <div class="relative z-20 flex flex-col items-center w-full">

            <div class="relative w-[95%] md:w-[70%] lg:w-1/2 aspect-video">

                <!-- Top Left Decoration -->
                <img src="{{ asset('right.png') }}" class="absolute -top-6 -left-6 w-20 h-20 md:w-32 md:h-32 z-10"
                    alt="decoration">

                <!-- Video -->
                <video class="w-full h-full rounded-lg shadow-2xl bg-black" controls autoplay muted>
                    <source src="{{ asset('storage/' . $videos->video_url) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Bottom Right Decoration -->
                <img src="{{ asset('right.png') }}"
                    class="absolute -bottom-6 -right-6 w-20 h-20 md:w-32 md:h-32 z-10 rotate-[180deg] scale-x-[-1]"
                    alt="decoration">

            </div>

            <div class="mt-10 flex flex-col items-center">
                <p class="text-xs font-medium text-gray-600 mb-2 font-inter">
                    {{ $footer->youtube_label }}
                </p>

                <a href="{{ $footer->youtube_url }}" class="flex gap-4 items-center group" target="_blank"
                    rel="noopener noreferrer">

                    <i class="ri-youtube-fill text-red-600 text-5xl transition-transform group-hover:scale-110"></i>

                    <div
                        class="border rounded-full px-6 py-2 flex items-center gap-4 bg-white shadow-sm hover:shadow-md transition-all">
                        <span class="font-inter font-medium text-sm">
                            {{ $footer->youtube_channel_name }}
                        </span>
                        <i class="ri-arrow-right-up-line text-red-500"></i>
                    </div>
                </a>
            </div>
        </div>

        <div class="absolute inset-0 z-10">
            <img src="{{ asset('video/video_backgroundimg.png') }}" alt="Background"
                class="w-full h-full object-cover opacity-40">
        </div>
    </section>

    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')
@endsection
