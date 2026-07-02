@extends('layouts.app')

@section('title', 'Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    <section class="w-full">

        @foreach ($sections as $section)
            {{-- ================= HERO (Company Profile) ================= --}}
            @if ($section->type == 'hero')
                <div class="grid lg:grid-cols-2 gap-10">

                    <div class="w-full h-[]">
                        @if ($section->image)
                            <img src="{{ asset($section->image) }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div>
                        <div class="px-2">

                            <h2 class="text-3xl xl:text-5xl text-orange-500 pt-7">
                                {{ $section->section_key }}
                            </h2>

                            <p class="text-lg my-5">
                                {{ $section->title }}
                            </p>

                            @foreach (explode("\n", $section->content) as $para)
                                @if (trim($para))
                                    <p class="text-gray-600 my-3">{{ $para }}</p>
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>

                {{-- ================= NORMAL CONTENT AREA ================= --}}
            @else
                <div class="lg:w-11/12 m-auto my-10 px-2 flex flex-col gap-7">

                    {{-- DEFAULT TEXT --}}
                    @if ($section->type == 'default')
                        <div>
                            @if ($section->title)
                                <h1 class="text-orange-500 text-xl font-semibold pb-2">
                                    {{ $section->title }}
                                </h1>
                            @endif

                            <p class="text-gray-600">
                                {{ $section->content }}
                            </p>
                        </div>
                    @endif


                    {{-- LIST TYPE --}}
                    @if ($section->type == 'list')
                        <div>
                            <h1 class="text-orange-500 text-xl font-semibold pb-2">
                                {{ $section->title }}
                            </h1>

                            @if ($section->section_content)
                                <p class="text-gray-600 pb-2">
                                    {{ $section->content }}
                                </p>
                            @endif

                            @foreach ($section->items as $item)
                                <p class="text-gray-600 pb-2">
                                    <span class="text-cyan-600 font-bold">
                                        {{ $item->title }}
                                    </span>
                                    {{ $item->description }}
                                </p>
                            @endforeach
                        </div>
                    @endif

                </div>
            @endif

        @endforeach

    </section>

    {{-- ================= IMAGE TEXT (AWARDS SECTION) ================= --}}
    @foreach ($sections as $section)
        @if ($section->type == 'image_text')
            <section class="w-full">
                <div class="grid lg:grid-cols-2 gap-10 bg-gray-200  lg:h-[600px]">

                    <div class="p-6 md:p-7">

                        <h5 class="text-2xl md:text-3xl uppercase text-orange-500">
                            {{ $section->title }}
                        </h5>

                        @if ($section->image)
                            <img src="{{ asset($section->image) }}" class="my-10 h-40">
                        @endif

                        @foreach (explode("\n", $section->content) as $para)
                            @if (trim($para))
                                <p class="text-gray-500 text-md pb-2">{{ $para }}</p>
                            @endif
                        @endforeach

                    </div>

                    <div class="w-full h-[600px] hidden 2xl:block">
                        @if ($section->image)
                            <img src="{{ asset($section->image) }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div class="w-full h-[600px] hidden md:block 2xl:hidden">
                        @if ($section->image_md)
                            <img src="{{ asset($section->image_md) }}" class="w-full h-full object-content">
                        @endif
                    </div>

                    <div class="w-full h-[500px] block  md:hidden">
                        @if ($section->image_sm)
                            <img src="{{ asset($section->image_sm) }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                </div>
            </section>
        @endif
    @endforeach

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
