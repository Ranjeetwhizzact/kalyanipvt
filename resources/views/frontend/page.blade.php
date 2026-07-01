@extends('layouts.app')

@section('title', 'Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    @include('header')
    @include('nav')

    @foreach ($page->sections->sortBy('sort_order') as $section)
        {{-- Hero Section --}}
        @if ($section->section_name === 'Hero Section')
            @include('frontend.sections.hero', ['section' => $section])

            {{-- Footer Section --}}
        @elseif ($section->section_name === 'Footer Section')
            @include('frontend.sections.footer', ['section' => $section])

            {{-- Grid 2 Text Split --}}
        @elseif ($section->layout_type === 'grid_2' && $section->layouts->firstWhere('image', '!=', null) == null)
            @include('frontend.sections.grid2-text-split', ['section' => $section])

            {{-- Grid 2 --}}
        @elseif ($section->layout_type === 'grid_2')
            @include('frontend.sections.grid2', ['section' => $section])

            {{-- Grid 3 --}}
        @elseif ($section->layout_type === 'grid_3')
            @include('frontend.sections.grid3', ['section' => $section])

            {{-- Default Text Section --}}
        @elseif (
            $section->section_heading ||
                $section->section_subheading ||
                $section->section_paragraph ||
                $section->layouts->whereNotNull('paragraph')->isNotEmpty())
            @include('frontend.sections.section-text', ['section' => $section])
        @endif

        {{-- Color Point Sections --}}
        @foreach ($section->layouts as $layout)
            @if ($layout->point_type === 'color_point')
                @include('frontend.sections.color-point', ['layout' => $layout])
            @endif
        @endforeach
    @endforeach

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
