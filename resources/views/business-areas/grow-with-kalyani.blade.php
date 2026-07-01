@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    <section class="w-full">
        <div class="w-full h-96 lg:h-[518px] relative overflow-hidden">
            <img src="{{ asset('banner/growth-with-kalyani.png') }}" alt="" srcset=""
                class="absolute z-10 w-full top-0 left-0 h-full object-cover">
            <div
                class="w-full h-full absolute top-0 left-0 z-20
        [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)10%,rgba(255,255,255,0.8)28%,rgba(255,255,255,0.7)40%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
         md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
            </div>
            <div class="w-full lg:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end lg:items-center">
                <div class="w-full md:w-[550px] ">
                    <h5 class=" text-2xl md:text-3xl xl:text-5xl text-orange-500  font-poppins px-2 mb-10">Building Success
                        Together with Kalyani</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="flex items-center justify-center order-2 lg:order-1">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Unlock Your Potential with Exclusive
                        Benefits and Support from Kalyani</h2>

                    <p class="text-base text-gray-600 font-inter my-7">Partnering with Kalyani grants you exclusive
                        territorial rights, empowering you to dominate your market. Our comprehensive marketing support and
                        training ensure you have the tools needed for success.</p>
                </div>
            </div>
            <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2"><img src="{{ asset('banner/growone.png') }}" alt=""
                    srcset="" class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md">
            </div>
        </div>
    </section>
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/growone.png') }}" alt="" srcset=""
                    class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>
            <div class="flex items-center justify-center">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Unlock Your Potential with Exclusive
                        Benefits and Support from Kalyani</h2>

                    <p class="text-base text-gray-600 font-inter my-7">Partnering with Kalyani grants you exclusive
                        territorial rights, empowering you to dominate your market. Our comprehensive marketing support and
                        training ensure you have the tools needed for success.</p>
                </div>
            </div>

        </div>
    </section>


    <section class="w-full bg-cover bg-no-repeat h-[490px] mt-16"
        style="background-image: url('/public/banner/internation.png');">
        <div class="w-10/12 m-auto flex flex-wrap justify-between">
            <div>
                <h5 class="text-3xl lg:text-[40px] md:leading-[45px] font-poppins md:w-[500px] mb-3">Unlock Your Business
                    Potential</h5>
                <p class="text-gray-600 mb-5 md:w-[500px]">Explore products crafted for farmers, addressing unique
                    challenges with science-backed solutions for success.</p>
                <div class="mt-5"><a href="{{ route('contact') }}"
                        class="bg-orange-500 px-4 py-2 lg:px-6 lg:py-3 rounded-full text-white text-inter font-medium text-lg">Join
                        Now</a></div>
            </div>
        </div>
    </section>


    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
