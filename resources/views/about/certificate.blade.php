@extends('layouts.app')

@section('title', 'Certificate and Membership - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
<header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
        </header>
    @if ($heroSection)
        <section class="w-full">
            <div class="w-full h-80 md:h-[518px] relative overflow-hidden">
                {{-- Background Image --}}
                @if ($heroSection->page_image)
                    <img src="{{ asset($heroSection->page_image) }}"
                        class="absolute z-10 w-full top-0 left-0 h-full object-cover">
                @endif
                {{-- Gradient Overlay --}}
                <div
                    class="w-full h-full absolute top-0 left-0 z-20
                    [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,0.9)10%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.05)60%,rgba(255,255,255,0)80%)]
                    md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,0.9)15%,rgba(255,255,255,0.7)30%,rgba(255,255,255,0.4)45%,rgba(255,255,255,0.1)60%,rgba(255,255,255,0)80%)]">
                </div>
                {{-- Content --}}
                <div
                    class="md:w-1/2 h-full absolute top-0 left-0 z-30 flex justify-center items-end md:items-center px-4 pb-10">
                    <div class="w-96">
                        {{-- Title --}}
                        <h5 class="text-2xl md:text-3xl xl:text-5xl text-orange-500 font-poppins mb-3">
                            {{ $heroSection->title }}
                        </h5>
                        {{-- Paragraph --}}
                        @if ($heroSection->paragraph)
                            <p class="text-sm lg:text-base font-inter hidden md:block">
                                {{ $heroSection->paragraph }}
                            </p>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="w-full my-8">
        @foreach ($pageSections as $section)

            <div class="grid grid-cols-1 lg:grid-cols-2 my-8">
                {{-- ================= IMAGE LEFT ================= --}}
                @if ($section->image_position == 'left')
                    {{-- Image --}}
                    <div class="px-2 sm:px-3 lg:px-0 flex">
                        <div class="h-full w-full bg-cover bg-center flex flex-col justify-center items-center py-6"
                            style="background-image: url('{{ asset('certificate_bg.jpg') }}');">
                            @if ($section->home_image)
                                <img src="{{ asset($section->home_image) }}"
                                    class="xl:h-80 xl:w-80 h-72 w-72 rounded-md lg:rounded-none lg:rounded-s-md">
                            @endif
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="flex justify-center">
                        <div class="px-4 lg:pr-20">
                            <h2 class="text-[30px] md:text-[40px] font-inter text-orange-500">
                                {{ $section->title }}
                            </h2>
                            @if ($section->subheading)
                                <h5 class="text-xl text-cyan-600 font-medium font-inter my-5">
                                    {{ $section->subheading }}
                                </h5>
                            @endif
                            {{-- Paragraph --}}
                            @if ($section->paragraph)
                                <p class="text-base text-gray-600 font-inter mb-4 whitespace-pre-line">
                                    {{ $section->paragraph }}
                                </p>
                            @endif
                            {{-- Points (Bullet List) --}}
                            @if (!empty($section->point) && is_array($section->point))
                                <ul class="text-base text-gray-600 font-inter space-y-2 mt-4">
                                    @foreach ($section->point as $item)
                                        @if (trim($item) != '')
                                            <li class="flex gap-2">
                                                <img src="{{ asset('list-icon.png') }}" class="w-5 h-5 mt-1 object-contain">
                                                <span>{{ trim($item) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    {{-- ================= IMAGE RIGHT ================= --}}
                @else
                    {{-- Content --}}
                    <div class="flex justify-center order-2 lg:order-1">
                        <div class="px-4 lg:pl-20">
                            <h2 class="text-[30px] md:text-[40px] font-inter text-orange-500">
                                {{ $section->title }}
                            </h2>
                            @if ($section->subheading)
                                <h5 class="text-xl text-cyan-600 font-medium font-inter my-5">
                                    {{ $section->subheading }}
                                </h5>
                            @endif
                            {{-- Paragraph --}}
                            @if ($section->paragraph)
                                <p class="text-base text-gray-600 font-inter mb-4 whitespace-pre-line">
                                    {{ $section->paragraph }}
                                </p>
                            @endif
                            {{-- Points --}}
                            @if (!empty($section->point) && is_array($section->point))
                                <ul class="text-base text-gray-600 font-inter space-y-2 mt-4">
                                    @foreach ($section->point as $item)
                                        @if (trim($item) != '')
                                            <li class="flex gap-2">
                                                <img src="{{ asset('list-icon.png') }}"
                                                    class="w-5 h-5 mt-1 object-contain">
                                                <span>{{ trim($item) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    {{-- Image --}}
                    <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2 flex">
                        <div class="h-full w-full bg-cover bg-center flex flex-col justify-center items-center py-6"
                            style="background-image: url('{{ asset('certificate_bg.jpg') }}');">
                            @if ($section->home_image)
                                <img src="{{ asset($section->home_image) }}"
                                    class="xl:h-80 xl:w-80 h-72 w-72 rounded-md lg:rounded-none lg:rounded-s-md">
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </section>
    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>
    @include('footer')

@endsection
@section('scripts')

@endsection
