<section class="w-full">

    @foreach ($section->layouts as $layout)
        <div class="w-full h-96 lg:h-[518px] relative overflow-hidden">

            <img src="{{ asset('storage/' . $layout->image) }}"
                class="absolute z-10 w-full top-0 left-0 h-full object-cover">


            <div
                class="w-full h-full absolute top-0 left-0 z-20
[background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)10%,rgba(255,255,255,0.8)28%,rgba(255,255,255,0.7)40%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
            </div>


            <div class="w-full lg:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end lg:items-center">

                <div class="w-full md:w-[550px]">

                    <!-- Main Heading -->
                    <h5 class="text-2xl md:text-3xl xl:text-5xl text-orange-500 font-poppins px-2 mb-4">
                        {{ $layout->heading }}
                    </h5>

                    <!-- Subheading -->
                    <h6 class="text-lg md:text-xl xl:text-2xl text-gray-800 font-semibold px-2 mb-3">
                        {{ $layout->subheading }}
                    </h6>

                    <!-- Paragraph -->
                    <p class="text-sm md:text-base text-gray-600 px-2 leading-relaxed">
                        {{ $layout->paragraph }}
                    </p>

                </div>

            </div>

        </div>
    @endforeach

</section>
