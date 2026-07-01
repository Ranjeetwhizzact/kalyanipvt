<section class="w-full my-16">

    <div class="px-4 lg:px-10 xl:px-16 2xl:px-32">

        @foreach ($layout->points as $point)

            <p class="text-base md:text-xl pb-4 text-gray-600 font-inter">

                @if ($point->heading)
                    <span class="font-bold pr-2 text-cyan-600">
                        {{ $point->heading }}
                    </span>
                @endif

                {{ $point->text }}

            </p>

        @endforeach

    </div>

</section>
