<section class="w-full">

    @if ($section->section_heading)
        <h2 class="w-full text-3xl md:text-[40px] md:leading-[50px] lg:w-[580px] m-auto font-poppins text-center">
            {{ $section->section_heading }}
        </h2>
    @endif

    @if ($section->section_subheading)
        <p class="w-full text-base lg:w-[700px] m-auto font-inter text-center text-gray-600 mt-3">
            {{ $section->section_subheading }}
        </p>
    @endif


    <div class="lg:w-9/12 m-auto grid md:grid-cols-2 lg:grid-cols-3 gap-5 my-7">

        @foreach ($section->layouts as $layout)
            <div>
                <div class="w-80 p-3 m-auto text-center">

                    @if ($layout->image)
                        <img src="{{ asset('storage/' . $layout->image) }}" class="h-12 m-auto mb-7">
                    @endif

                    @if ($layout->heading)
                        <h5 class="font-inter text-lg font-medium mb-2" style="color: {{ $layout->heading_color ?? '#000000' }};">
                            {{ $layout->heading }}
                        </h5>
                    @endif

                    @if ($layout->subheading)
                        <p class="text-sm font-inter text-gray-600" style="color: {{ $layout->subheading_color ?? '#000000' }};">
                            {{ $layout->subheading }}
                        </p>
                    @endif

                </div>
            </div>
        @endforeach

    </div>

</section>
