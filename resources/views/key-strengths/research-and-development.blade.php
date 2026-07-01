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
        <img src="{{ asset('icon/researchdevelopment.png') }}" alt="" srcset=""
            class="absolute z-10 w-full top-0 left-0 h-full object-cover">
        <div
            class="w-full h-full absolute top-0 left-0 z-20
        [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)10%,rgba(255,255,255,0.8)28%,rgba(255,255,255,0.7)40%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
         md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
        </div>
        <div class="w-full lg:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end lg:items-center">
            <div class="w-full md:w-[550px] ">
                <h5 class=" text-2xl md:text-3xl xl:text-5xl text-orange-500  font-poppins px-2 mb-10">Leading
                    Innovation for Sustainable Agriculture Solutions</h5>

            </div>
        </div>
    </div>
</section>

<section class="w-full my-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

        <div class="flex items-center justify-center">
            <div class="lg:w-[501px] px-4 lg:px-0">
                <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Leading the Way in Agricultural
                    Research and Development Innovations</h2>
                <p class="text-base text-gray-600 font-inter my-7">Our in-house R&D labs are at the forefront of
                    agricultural innovation. We collaborate with top agricultural universities to develop sustainable
                    chemistry solutions.</p>
                <div class="grid lg:grid-cols-2 gap-5">
                    <div class="rounded-lg   py-10">
                        <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                        <h5 class="text-lg font-medium mb-3">Prototyping Services</h5>
                        <p class="text-sm ">Experience timely shipments that keep your operations running smoothly and
                            efficiently.</p>
                    </div>
                    <div class="rounded-lg  px-5 py-10">
                        <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                        <h5 class="text-lg font-medium  mb-3">Delivery Assurance</h5>
                        <p class="text-sm ">Partnering with NGOs to enhance agricultural practices and support
                            sustainable farming initiatives.</p>
                    </div>


                </div>
            </div>
        </div>
        <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/manfactuerthree.png') }}" alt="" srcset=""
                class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>


    </div>
</section>

<section class="w-full">
    <h2 class="w-full text-3xl md:text-[40px] md:leading-[50px] lg:w-[580px] m-auto font-poppins text-center">Commitment
        to Safety and Quality Standards</h2>
    <p class="w-full text-base lg:w-[700px] m-auto font-inter text-center text-gray-600 mt-3">We prioritize stringent
        safety protocols to protect both our workers and products. Our commitment to safety ensures a secure environment
        and high-quality outcomes.</p>
    <div class="lg:w-9/12 m-auto grid md:grid-cols-2 lg:grid-cols-3 gap-5 my-7">
        <div class="">
            <div class="w-72 p-3 m-auto">

                <img src="{{ asset('icon/affortable.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                <h5 class="font-inter text-base font-medium text-center">Ensuring Worker Safety at Every Step</h5>
                <p class="text-xs font-inter text-gray-600 text-center ">Our safety measures exceed industry standards.
                </p>
            </div>

        </div>
        <div class="">
            <div class="w-72 p-3 m-auto">

                <img src="{{ asset('icon/compliance.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                <h5 class="font-inter text-base font-medium text-center">Quality Control for Unmatched Product Safety
                </h5>
                <p class="text-xs font-inter text-gray-600 text-center ">Rigorous testing guarantees the safety of our
                    products.</p>
            </div>

        </div>
        <div class="">
            <div class="w-72 p-3 m-auto">

                <img src="{{ asset('icon/truck.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                <h5 class="font-inter text-base font-medium text-center">A Culture of Safety and Accountability</h5>
                <p class="text-xs font-inter text-gray-600 text-center ">We foster a culture where safety is paramount.
                </p>
            </div>

        </div>
    </div>
</section>
<section class="w-full my-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
        <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/grass.png') }}" alt="" srcset=""
                class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>

        <div class="flex items-center justify-center">
            <div class="lg:w-[501px] px-4 lg:px-0">
                <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Innovative Solutions for Sustainable
                    Agriculture: Patents and Research Advancements</h2>
                <p class="text-base text-gray-600 font-inter my-7">Our commitment to research has led to groundbreaking
                    patents and novel formulations. We focus on developing pest-resistant solutions that meet the
                    challenges of modern agriculture.</p>
                <div class="grid lg:grid-cols-2 gap-5">
                    <div class="rounded-lg   py-10">
                        <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                        <h5 class="text-lg font-medium mb-3">Patented Innovations</h5>
                        <p class="text-sm ">Explore our patented technologies designed to enhance crop resilience and
                            sustainability.</p>
                    </div>
                    <div class="rounded-lg  px-5 py-10">
                        <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                        <h5 class="text-lg font-medium  mb-3">Research Focus</h5>
                        <p class="text-sm ">Our research emphasizes pest resistance to protect crops and ensure food
                            security.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-full my-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

        <div class="flex items-center justify-center order-2 lg:order-1">
            <div class="lg:w-[501px] px-4 lg:px-0">
                <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Innovative Solutions for Sustainable
                    Agriculture: Patents and Research Advancements</h2>
                <p class="text-base text-gray-600 font-inter my-7">Our commitment to research has led to groundbreaking
                    patents and novel formulations. We focus on developing pest-resistant solutions that meet the
                    challenges of modern agriculture.</p>
                <div class="grid lg:grid-cols-2 gap-5">
                    <div class="rounded-lg   py-10">
                        <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                        <h5 class="text-lg font-medium mb-3">Patented Innovations</h5>
                        <p class="text-sm ">Explore our patented technologies designed to enhance crop resilience and
                            sustainability.</p>
                    </div>
                    <div class="rounded-lg  px-5 py-10">
                        <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                        <h5 class="text-lg font-medium  mb-3">Research Focus</h5>
                        <p class="text-sm ">Our research emphasizes pest resistance to protect crops and ensure food
                            security.</p>
                    </div>


                </div>
            </div>
        </div>
        <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2"><img src="{{ asset('banner/grass.png') }}" alt="" srcset=""
                class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>
    </div>
</section>
<section class="w-full relative h-96">
    <div class="swiper w-full h-full mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide text-center text-lg bg-white flex justify-center items-center"><img
                    src="{{ asset('banner/manufacturone.png') }}" class="w-full h-full block object-cover" alt=""></div>
            <div class="swiper-slide text-center text-lg bg-white flex justify-center items-center"><img
                    src="{{ asset('banner/manufacturone.png') }}" class="w-full h-full block object-cover" alt=""></div>
            <div class="swiper-slide text-center text-lg bg-white flex justify-center items-center"><img
                    src="{{ asset('banner/manufacturone.png') }}" class="w-full h-full block object-cover" alt=""></div>
            <div class="swiper-slide text-center text-lg bg-white flex justify-center items-center"><img
                    src="{{ asset('banner/manufacturone.png') }}" class="w-full h-full block object-cover" alt=""></div>
            <div class="swiper-slide text-center text-lg bg-white flex justify-center items-center"><img
                    src="{{ asset('banner/manufacturone.png') }}" class="w-full h-full block object-cover" alt=""></div>
            <div class="swiper-slide text-center text-lg bg-white flex justify-center items-center"><img
                    src="{{ asset('banner/manufacturone.png') }}" class="w-full h-full block object-cover" alt=""></div>

        </div>

    </div>
</section>

<!-- WhatsApp Icon -->
<div id="myWhatsappButton" class="z-30"></div>

@include('footer')

@endsection
@section('scripts')

@endsection