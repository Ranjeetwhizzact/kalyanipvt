<section class="w-full mt-0 mb-10">
    @php
        $imageLayout = $section->layouts->firstWhere('image', '!=', null);
        $headingLayout = $section->layouts->firstWhere('heading', '!=', null);
        $paragraphLayout = $section->layouts->firstWhere('paragraph', '!=', null);
    @endphp

    @if (!$imageLayout)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 px-2">

            {{-- LEFT HEADING --}}
            @if ($headingLayout)
                <h2 class="w-full text-3xl md:text-[40px] md:leading-[50px] lg:w-[580px] m-auto font-poppins">
                    {{ $headingLayout->heading }}
                </h2>
            @endif


            {{-- RIGHT PARAGRAPH --}}
            @if ($paragraphLayout)
                <div class="w-full text-base lg:w-[700px] m-auto font-inter text-gray-600 mt-3 rich-text-content">
                    {!! $paragraphLayout->paragraph !!}
                </div>
            @endif

        </div>

    @endif

</section>
