@php
    $layout = $section->layouts->first();
@endphp

<section class="w-full my-12">

    @if ($section->section_heading)
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-poppins"
                style="
                    color: {{ $layout->text_colors ?? '#000000' }};
                    text-align: {{ $layout->text_alignment ?? 'left' }};
                ">
                {{ $section->section_heading }}
            </h2>
        </div>
    @endif

    @if ($section->section_subheading)
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <p class="mt-3 text-base font-inter leading-7"
                style="
                    color: {{ $layout->text_colors ?? '#6B7280' }};
                    text-align: {{ $layout->text_alignment ?? 'left' }};
                ">
                {{ $section->section_subheading }}
            </p>
        </div>
    @endif

    @if ($section->section_paragraph || $layout?->paragraph)
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <div class="mt-3 max-w-5xl text-[18px] leading-9 font-medium rich-text-content"
                style="
                    color: {{ $layout->text_colors ?? '#4B5563' }};
                    text-align: {{ $layout->text_alignment ?? 'left' }};
                ">
                {!! $section->section_paragraph ?? $layout->paragraph !!}
            </div>
        </div>
    @endif

</section>
