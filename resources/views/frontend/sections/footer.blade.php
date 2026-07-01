@php
    $layout = $section->layouts->first();
@endphp

@if ($layout)
    <section class="w-full bg-cover bg-no-repeat h-[490px] mt-10"
        style="background-image: url('{{ asset('storage/' . $layout->image) }}');">

        <div class="w-10/12 m-auto flex flex-wrap justify-between pt-24">

            <div>
                <h5 class="text-3xl lg:text-[40px] md:leading-[45px] font-poppins md:w-[400px] mb-3">
                    {{ $layout->heading }}
                </h5>

                <p class="text-gray-600 mb-5">
                    {{ $layout->subheading }}
                </p>

                <p class="text-gray-600 mb-5">
                    {{ $layout->paragraph }}
                </p>
            </div>

            @if (!empty($layout->link_text) || !empty($layout->link_url))
                <div>
                    <a href="{{ $layout->link_url }}"
                        class="bg-orange-500 px-4 py-2 lg:px-6 lg:py-3 rounded-full text-white font-medium text-lg">

                        {{ $layout->link_text }}

                    </a>
                </div>
            @endif

        </div>

    </section>
@endif
