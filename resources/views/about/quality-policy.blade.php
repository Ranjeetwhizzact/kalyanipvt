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
        <div class="w-full h-80 md:h-[518px] relative overflow-hidden">
            <img src="{{ asset('about_banner.png') }}" alt="" srcset=""
                class="absolute z-10 w-full top-0 left-0 h-full object-cover">
            <div
                class="w-full h-full absolute top-0 left-0 z-20
          [background-image:linear-gradient(360deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)30%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]
           md:[background-image:linear-gradient(90deg,rgba(255,255,255,1)0%,rgba(255,255,255,9)5%,rgba(255,255,255,0.8)15%,rgba(255,255,255,0.7)25%,rgba(255,255,255,0.6)30%,rgba(255,255,255,0.4)40%,rgba(255,255,255,0.1)50%,rgba(255,255,255,0.05)55%,rgba(255,255,255,0)45%)]">
            </div>
            <div
                class=" md:w-1/2 h-full absolute top-0 left-0 z-20 flex justify-center items-end md:items-center px-4 pb-10">
                <div class="w-96 ">
                    <h5 class=" text-2xl md:text-3xl xl:text-5xl text-orange-500  font-poppins mb-3">Quality Policy</h5>
                    <p class="text-sm lg:text-base font-inter hidden md:block">Kalyani Industries Limited’s Commitment to
                        provide high quality, safe and effective solution for Pest free world</p>
                </div>

            </div>

        </div>

    </section>
    <section class="w-full my-16">
        <div class="px-4 lg:px-0 xl:px-16 2xl:px-32">
            <p class="text-base md:text-xl pb-4 text-cyan-600 font-inter font-bold">Kalyani, a research based company
                dedicated to work as trusted partner to the Agriculture community and also in eliminate vector borne disease
                by supply of quality products. Our commitment to quality is embedded in every aspect of our business, from
                product development to delivery. </p>
            <p class="text-base md:text-xl pb-4 text-cyan-600 font-inter font-bold">Our policy is to:</p>
        </div>
    </section>
    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex justify-center order-2 lg:order-1">
                <div class=" px-4 lg:px-10">
                    <h2 class="text-[30px]  md:text-[40px] font-inter text-orange-500">Deliver High Quality Product:</h2>
                    <p class="text-base text-gray-600 font-inter my-5">Company persistently works towards developing high
                        quality products to ensure a pest-free household. It puts in constant efforts and invests
                        sufficiently in Research and Development to develop products as per international quality standard
                        which gives best performance not only in increasing crop yield but also in control of household
                        pests. Company aims to develop high quality, safe and cost-effective product with consistent
                        production to deliver on time. At Kalyani industries our utmost priority is the quality of our
                        products. We strive to create products of the best quality which are effective and efficient.</p>
                </div>
            </div>
            <div class="px-2 sm:px-3 lg:px-0 order-1 lg:order-2">
                <img src="{{ asset('manufactur.png') }}" alt="" srcset=""
                    class="w-full h-80 lg:h-96 xl:h-80 rounded-md lg:rounded-e-none lg:rounded-s-md">
            </div>
        </div>
    </section>

    <section class="w-full my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="px-2 sm:px-3 lg:px-0"><img src="{{ asset('icon/ourmanfacture.png') }}" alt="" srcset=""
                    class="w-full h-80 lg:h-96 xl:h-80 object-cover rounded-md lg:rounded-none lg:rounded-e-md "></div>
            <div class="flex justify-center">
                <div class=" px-4 lg:px-10">
                    <h2 class="text-[30px]  md:text-[40px] font-inter text-orange-500">Customer Satisfaction: </h2>

                    <p class="text-base text-gray-600 font-inter my-5">Our prime motto is customer satisfaction by
                        delivering right products at right time as per customer expectation. We believe in long term
                        relationship based on trust and mutual success. Company constantly work hard in development of
                        Agrochemicals and Household insecticides so our farmer get high quality and effective products on
                        right time which benefited by high crop yield with minimum losses due to pest attack. On other hand
                        our residential and non residential customers live peacefully without problem of houshold pest by
                        use of our internationally approved products. This will reduce the chance of increase of vector
                        borne disease.</p>
                </div>
            </div>

        </div>
    </section>

    <section class="w-full my-16">
        <div class="px-4 lg:px-10 xl:px-16 2xl:px-32">
            <p class="text-base md:text-xl pb-4 text-gray-600 font-inter">
                <span class="font-bold pr-2 text-cyan-600">Ensure Regulatory Compliance and Safety:</span>We operate with an
                unwavering commitment to complying with all applicable national and international laws, regulations, and
                industry standards, including those set by the Central Insecticides Board & Registration Committee (CIBRC).
                The safety of our employees, customers, and the environment is our highest priority, and we ensure our
                products are safe to use and handle as per guidelines.
            </p>
            <p class="text-base md:text-xl pb-4 text-gray-600 font-inter">
                <span class="font-bold pr-2 text-cyan-600">Foster a Culture of Continual Improvement: </span>We are
                dedicated to the continuous improvement of our processes, products, and Quality Management System. Through
                regular reviews, advanced research, and investment in technology, we ensure that we remain at the forefront
                of the agrochemicals industry.
            </p>
            <p class="text-base md:text-xl pb-4 text-gray-600 font-inter">
                <span class="font-bold pr-2 text-cyan-600">Empower and Train Our Employees: </span>We believe that quality
                is the responsibility of every employee. We provide the necessary training and a safe working environment to
                empower our team to contribute to our quality objectives and uphold our commitment to excellence.
            </p>
            <p class="text-base md:text-xl pb-4 text-gray-600 font-inter">
                <span class="font-bold pr-2 text-cyan-600">Promote Environmental Responsibility: </span> As manufacturers of
                agrochemicals, we are conscious of our environmental impact. We are committed to adopting sustainable
                practices, minimizing waste, and ensuring that our products and manufacturing processes are environmentally
                sound.
            </p>
        </div>
    </section>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
