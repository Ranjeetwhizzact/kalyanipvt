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
            <img src="{{ asset('banner/contract-manufacture.png') }}" alt="" srcset=""
                class="absolute z-10 w-full top-0 left-0 h-full object-cover">
            <div
                class="w-full h-full absolute top-0 left-0 z-20
        [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)10%,rgba(255,255,255,0.8)28%,rgba(255,255,255,0.7)40%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
         md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
            </div>
            <div class="w-full lg:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end lg:items-center">
                <div class="w-full md:w-[550px] ">
                    <h5 class=" text-2xl md:text-3xl xl:text-5xl text-orange-500  font-poppins px-2 mb-10">Your Vision, Our
                        Manufacturing Excellence</h5>

                </div>

            </div>
        </div>
    </section>
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="flex items-center justify-center order-2 lg:order-1">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Tailored Solutions for Your
                        Agrochemical Needs</h2>

                    <p class="text-base text-gray-600 font-inter my-7">At Kalyani, we specialize in custom formulations that
                        meet your unique requirements. Our flexible approach ensures that you receive the perfect blend of
                        quality and innovation.</p>
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div class="rounded-lg  px-5 py-10">
                            <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                            <h5 class="text-lg font-medium mb-3">Rapid Delivery</h5>
                            <p class="text-sm ">Experience timely shipments that keep your operations running smoothly and
                                efficiently.</p>
                        </div>
                        <div class="rounded-lg  px-5 py-10">
                            <img src="{{ asset('icon/rings.png') }}" alt="" srcset="" class="mb-5 w-5">
                            <h5 class="text-lg font-medium  mb-3">Global Collaboration</h5>
                            <p class="text-sm ">Partnering with NGOs to enhance agricultural practices and support
                                sustainable farming initiatives.</p>
                        </div>
                    </div>
                    <!-- <div class="grid lg:grid-cols-2 gap-5">
                  <div class="rounded-lg bg-orange-100 px-5 py-10">
                      <h5 class="text-xl font-medium mb-3">Farmer Support</h5>
                      <p class="text-base font-medium text-[#A09586]">Affordable pricing and expert guidance ensure farmers thrive in their endeavors.</p>
                  </div>
                  <div class="rounded-lg bg-orange-100 px-5 py-10">
                      <h5 class="text-xl font-medium mb-3">Farmer Support</h5>
                      <p class="text-base font-medium text-[#A09586]">Affordable pricing and expert guidance ensure farmers thrive in their endeavors.</p>
                  </div>
                 </div> -->
                </div>
            </div>
            <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2"><img src="{{ asset('banner/manufacturone.png') }}"
                    alt="" srcset=""
                    class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>
        </div>
    </section>
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('banner/manufacterstwo.png') }}" alt=""
                    srcset="" class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md">
            </div>
            <div class="flex items-center justify-center">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <p class="font-inter text-lg font-medium mb-16">Quality</p>
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Commitment to Global Quality Standards
                    </h2>

                    <p class="text-base text-gray-600 font-inter my-7">At Kalyani, we prioritize compliance with
                        international quality standards, including ISO and GMP certifications. This commitment ensures that
                        our agrochemical products meet the highest benchmarks for safety and efficacy.</p>

                    <!-- <div class="grid lg:grid-cols-2 gap-5">
                    <div class="rounded-lg bg-orange-100 px-5 py-10">
                        <h5 class="text-xl font-medium mb-3">Farmer Support</h5>
                        <p class="text-base font-medium text-[#A09586]">Affordable pricing and expert guidance ensure farmers thrive in their endeavors.</p>
                    </div>
                    <div class="rounded-lg bg-orange-100 px-5 py-10">
                        <h5 class="text-xl font-medium mb-3">Farmer Support</h5>
                        <p class="text-base font-medium text-[#A09586]">Affordable pricing and expert guidance ensure farmers thrive in their endeavors.</p>
                    </div>

                   </div> -->
                </div>
            </div>

        </div>
    </section>
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
            <div class="flex items-center justify-center order-2 lg:order-1">
                <div class="lg:w-[501px] px-4 lg:px-0">
                    <h2 class="text-3xl md:text-[40px] md:leading-[50px] font-inter">Comprehensive Solutions from Start to
                        Finish</h2>

                    <p class="text-base text-gray-600 font-inter my-7">We provide complete assistance from initial
                        prototyping to final delivery. Our dedicated team ensures a seamless process tailored to your needs.
                    </p>
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div class="rounded-lg  px-5 py-10">
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
            <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2"><img src="{{ asset('banner/manfactuerthree.png') }}"
                    alt="" srcset=""
                    class="max-h-[80vh] w-full object-cover rounded-md lg:rounded-e-none lg:rounded-s-md"></div>
        </div>
    </section>

    <section class="w-full bg-cover bg-no-repeat h-[490px] mt-16"
        style="background-image: url('{{ asset('banner/internation.png') }}');">
        <div class="w-10/12 m-auto flex flex-wrap justify-between">
            <div>
                <h5 class="text-3xl lg:text-[40px] md:leading-[45px] font-poppins md:w-[500px] mb-3">Unlock Your Business
                    Potential</h5>
                <p class="text-gray-600 mb-5 md:w-[500px]">Partner with us for exclusive benefits and elevate your business
                    to new heights.</p>
                <div class="mt-5"><a href="{{ route('contact') }}"
                        class="bg-orange-500 px-4 py-2 lg:px-6 lg:py-3 rounded-full text-white text-inter font-medium text-lg">Know
                        More</a></div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
