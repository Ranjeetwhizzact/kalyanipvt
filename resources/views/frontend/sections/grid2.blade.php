<section class="w-full my-16">
    @php
        $imageLayout = $section->layouts->firstWhere('image', '!=', null);
        $contentLayout = $section->layouts->firstWhere('image', null);

        // Define order based on layout settings
        $imageOrder = $section->image_layout == 'left' ? 'lg:order-1' : 'lg:order-2';
        $contentOrder = $section->image_layout == 'left' ? 'lg:order-2' : 'lg:order-1';
    @endphp

    {{-- items-stretch is the key to making columns equal height --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 items-stretch">

        {{-- IMAGE COLUMN --}}
        @if ($imageLayout)
            <div class="{{ $imageOrder }}" style="max-height: {{ $imageLayout->image_height_desktop ?? 70 }}vh;">
                <img src="{{ asset('storage/' . $imageLayout->image) }}" class="w-full h-full object-cover rounded-md">
            </div>
        @endif

        {{-- CONTENT COLUMN --}}
        @if ($contentLayout)
            <div class="{{ $contentOrder }} flex flex-col justify-start px-4 lg:px-6">

                @if ($contentLayout->heading)
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter"
                        style="color: {{ $contentLayout->heading_color ?? '#000000' }};">
                        {{ $contentLayout->heading }}
                    </h2>
                @endif

                @if ($contentLayout->subheading)
                    <h2 class="text-xl md:text-[20px] md:leading-[30px] font-inter mt-2"
                        style="color: {{ $contentLayout->subheading_color ?? '#000000' }};">
                        {{ $contentLayout->subheading }}
                    </h2>
                @endif

                @if ($contentLayout->paragraph)
                    <p class="text-base text-gray-600 font-inter my-7"
                        style="color: {{ $contentLayout->text_colors ?? '#000000' }};">
                        {{ $contentLayout->paragraph }}
                    </p>
                @endif

                {{-- BOX POINTS --}}
                @if ($contentLayout->point_type == 'box')
                    <div class="grid lg:grid-cols-2 gap-5 mb-6">
                        @foreach ($contentLayout->points as $point)
                            <div class="rounded-lg bg-orange-100 px-5 py-8">
                                @if ($point->heading)
                                    <h5 class="text-xl font-medium mb-3">{{ $point->heading }}</h5>
                                @endif
                                <p class="text-base font-medium text-[#A09586]">{{ $point->text }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- NORMAL POINTS --}}
                @if ($contentLayout->point_type == 'normal')
                    <ul class="space-y-4 mb-6">
                        @foreach ($contentLayout->points as $point)
                            <li class="flex gap-5">
                                <img src="{{ asset('list-icon.png') }}" class="object-contain w-6 h-6 mt-1">
                                <p class="text-base font-inter font-medium">{{ $point->text }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{-- COLOR POINTS --}}
                @if ($contentLayout->point_type == 'color_point')
                    <div class="space-y-6 mb-6">
                        @foreach ($contentLayout->points as $point)
                            <p class="text-base text-gray-700 leading-relaxed">
                                @if ($point->heading)
                                    <span class="font-semibold text-[#0F8FA6]">{{ $point->heading }}</span>
                                @endif
                                {{ $point->text }}
                            </p>
                        @endforeach
                    </div>
                @endif

            </div>
        @endif

    </div>
</section>
