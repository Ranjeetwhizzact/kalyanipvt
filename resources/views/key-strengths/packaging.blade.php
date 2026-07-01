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
        <img src="{{ asset('banner/packageing.png') }}" alt="" srcset=""
            class="absolute z-10 w-full top-0 left-0 h-full object-cover">
        <div
            class="w-full h-full absolute top-0 left-0 z-20
        [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)10%,rgba(255,255,255,0.8)28%,rgba(255,255,255,0.7)40%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
         md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
        </div>
        <div class="w-full lg:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end lg:items-center">
            <div class="w-full md:w-[550px] ">
                <h5 class=" text-2xl md:text-3xl xl:text-5xl text-orange-500  font-poppins px-2 mb-10">Innovating
                    Agriculture Through Research and Development <h5>
            </div>
        </div>
    </div>
</section>
<section class="w-full my-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-7 px-2">

        <h2 class="w-full text-3xl md:text-[40px] md:leading-[50px] lg:w-[580px] m-auto font-poppins "> Transforming
            Ideas into Solutions: Our R&D Process Explained</h2>
        <p class="w-full text-base lg:w-[700px] m-auto font-inter  text-gray-600 mt-3">Our comprehensive training
            programs equip retailers with the knowledge they need to support farmers effectively. We also provide
            innovative digital tools, including app-based advisory services, to enhance farm management. Together, these
            resources empower farmers to make informed decisions and optimize their yields.

        </p>
    </div>
    <div class="lg:w-9/12 m-auto grid md:grid-cols-2 lg:grid-cols-3 gap-5 my-7">
        <div class="">
            <div class="w-96 p-3 m-auto">

                <img src="{{ asset('icon/affortable.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                <h5 class="font-inter text-base font-medium text-center">From Concept to Field: The R&D Journey</h5>
                <p class="text-xs font-inter text-gray-600 text-center ">Our approach combines creativity with
                    scientific rigor to develop novel formulations.</p>
            </div>

        </div>
        <div class="">
            <div class="w-96 p-3 m-auto">

                <img src="{{ asset('icon/compliance.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                <h5 class="font-inter text-base font-medium text-center">Rapid Response to Agricultural Challenges</h5>
                <p class="text-xs font-inter text-gray-600 text-center ">We prioritize quick adaptations to ensure our
                    products meet evolving needs.</p>
            </div>

        </div>
        <div class="">
            <div class="w-80 p-3 m-auto">

                <img src="{{ asset('icon/truck.png') }}" class="h-12 m-auto mb-7" alt="" srcset="">
                <h5 class="font-inter text-base font-medium text-center">Innovative Solutions for Pest Resistance</h5>
                <p class="text-xs font-inter text-gray-600 text-center ">Our patented technologies lead the way in
                    sustainable pest management.</p>
            </div>
        </div>
    </div>
</section>
<section class="w-full my-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

        <div class="flex items-center justify-center order-2 lg:order-1">
            <div class="lg:w-[501px] px-4 lg:px-0">
                <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Decades of Expertise in Agricultural
                    Research and Development</h2>
                <p class="text-base text-gray-600 font-inter my-7">Our extensive R&D experience ensures we stay ahead of
                    agricultural challenges. We conduct trials in real-field conditions to validate our innovative
                    solutions.</p>
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
        <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2"><img src="{{ asset('banner/manufacturone.png') }}" alt=""
                srcset="" class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>
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
        <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/farming.png') }}" alt="" srcset=""
                class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>

        <div class="flex items-center justify-center">
            <div class="lg:w-[501px] px-4 lg:px-0">
                <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Innovative Packaging for a Sustainable
                    Future</h2>
                <p class="text-base text-gray-600 font-inter my-7">Our packaging solutions are designed with safety and
                    sustainability in mind. Featuring tamper-proof, weather-resistant materials, and child-safe locks,
                    we ensure your products are protected while being eco-friendly.</p>

            </div>
        </div>
    </div>
</section>

<!-- WhatsApp Icon -->
<div id="myWhatsappButton" class="z-30"></div>

@include('footer')

@endsection
@section('scripts')

@endsection