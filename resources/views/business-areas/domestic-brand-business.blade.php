@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    {{-- Header Section / Banner / Full width --}}
    <section class="w-full">
        <div class="w-full h-96 lg:h-[518px] relative overflow-hidden">
            <img src="{{ asset('banner/domestic-brand.png') }}" alt="" srcset=""
                class="absolute z-10 w-full top-0 left-0 h-full object-cover">
            <div
                class="w-full h-full absolute top-0 left-0 z-20
        [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)10%,rgba(255,255,255,0.8)28%,rgba(255,255,255,0.7)40%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
         md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
            </div>
            <div class="w-full lg:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end lg:items-center">
                <div class="w-full md:w-[550px] ">
                    <h5 class=" text-2xl md:text-3xl xl:text-5xl text-orange-500  font-poppins px-2 mb-10">Empowering Local
                        Farmers with Trusted Solutions</h5>

                </div>
            </div>
        </div>

    </section>

    {{-- Use this when grid_2 --}}
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/brandimg1.png') }}" alt="" srcset=""
                    class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-md lg:rounded-s-none"></div>
            <div class="flex items-center justify-center">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Empowering Farmers with Quality
                        Agricultural Solutions</h2>

                    <p class="text-base text-gray-600 font-inter my-7">At Kalyani, we are dedicated to supporting local
                        farmers by providing high-quality insecticides and crop-care products tailored to their specific
                        needs. Our commitment extends beyond products, as we partner with local retailers and offer
                        educational programs to ensure farmers thrive.</p>
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div class="rounded-lg bg-orange-100 px-5 py-10">
                            <h5 class="text-xl font-medium mb-3">Farmer Support</h5>
                            <p class="text-base font-medium text-[#A09586]">Affordable pricing and expert guidance ensure
                                farmers thrive in their endeavors.</p>
                        </div>
                        <div class="rounded-lg bg-orange-100 px-5 py-10">
                            <h5 class="text-xl font-medium mb-3">Farmer Support</h5>
                            <p class="text-base font-medium text-[#A09586]">Affordable pricing and expert guidance ensure
                                farmers thrive in their endeavors.</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Use this when grid_2 --}}
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="flex items-center justify-center">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Committed to Supporting Local Farmers'
                        Needs</h2>
                    <!-- <h5 class="text-xl font-medium font-inter my-5">Driving Growth in Hydrated Lime Production,Expanding Market Presence!</h5> -->
                    <p class="text-base text-gray-600 font-inter my-7">At Kalyani, we prioritize the needs of local farmers
                        by providing a comprehensive range of high-quality insecticides, fungicides, and crop-care products.
                        Our solutions are specifically designed to enhance agricultural productivity and sustainability in
                        regional farming.</p>
                    <ul>
                        <li class="flex gap-5"><img src="{{ asset('list-icon.png') }}" alt="" srcset=""
                                class="object-contain mr-2 w-6 h-6 mt-2">
                            <p class="text-base font-inter font-medium">Tailored solutions for diverse crops and farming
                                practices.</p>
                        </li>
                        <li class="flex gap-5"><img src="{{ asset('list-icon.png') }}" alt="" srcset=""
                                class="object-contain mr-2 w-6 h-6 mt-2">
                            <p class="text-base font-inter font-medium">Affordable pricing with dedicated farmer support
                                services.</p>
                        </li>
                        <li class="flex gap-5"><img src="{{ asset('list-icon.png') }}" alt="" srcset=""
                                class="object-contain mr-2 w-6 h-6 mt-2">
                            <p class="text-base font-inter font-medium">Compliant with national agricultural standards for
                                quality assurance.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/brandimg2png.png') }}" alt=""
                    srcset="" class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md">
            </div>
        </div>
    </section>

    {{-- use this when grid_3 --}}
    <section class="w-full">
        <h2 class="w-full text-3xl  md:text-[40px] md:leading-[50px] lg:w-[580px] m-auto font-poppins text-center">
            Comprehensive Solutions for Every Crop</h2>
        <p class="w-full text-base lg:w-[700px] m-auto font-inter text-center text-gray-600 mt-3">Our extensive product
            range caters to various crops, including cereals, fruits, and vegetables. We prioritize affordability and
            provide dedicated support to empower farmers.</p>
        <div class="lg:w-9/12 m-auto grid md:grid-cols-2 lg:grid-cols-3 gap-5 my-7">
            <div class="">
                <div class="w-80 p-3 m-auto">

                    <img src="{{ asset('icon/affordable.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                    <h5 class="font-inter text-base font-medium text-center">Affordable Pricing and Support for Farmers</h5>
                    <p class="text-xs font-inter text-gray-600 text-center ">We offer competitive pricing and a helpline for
                        agronomy tips.</p>
                </div>

            </div>
            <div class="">
                <div class="w-80 p-3 m-auto">

                    <img src="{{ asset('icon/compliance.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                    <h5 class="font-inter text-base font-medium text-center">Compliance with National Agricultural Standards
                    </h5>
                    <p class="text-xs font-inter text-gray-600 text-center ">Our products meet all necessary agricultural
                        regulations.</p>
                </div>

            </div>
            <div class="">
                <div class="w-80 p-3 m-auto">

                    <img src="{{ asset('icon/truck.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                    <h5 class="font-inter text-base font-medium text-center">Discover Our Commitment to Local Farmers</h5>
                    <p class="text-xs font-inter text-gray-600 text-center ">Join us in supporting sustainable farming
                        practices.</p>
                </div>

            </div>
        </div>
    </section>


    <section class="w-full bg-cover bg-no-repeat h-[490px] mt-10"
        style="background-image: url('{{ asset('banner/domestic-brand-footer.png') }}');">
        <div class="w-10/12 m-auto flex flex-wrap justify-between">
            <div>
                <h5 class="text-3xl lg:text-[40px] md:leading-[45px] font-poppins md:w-[400px] mb-3">Your Partner in Crop
                    Protection</h5>
                <p class="text-gray-600 mb-5">Join us for tailored agricultural solutions today!</p>
            </div>
            <div><a href="{{ route('contact') }}"
                    class="bg-orange-500 px-4 py-2 lg:px-6 lg:py-3 rounded-full text-white text-inter font-medium text-lg">Join
                    Now</a></div>
        </div>
    </section>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
