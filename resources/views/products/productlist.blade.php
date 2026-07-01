@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    {{-- <header> --}}
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>
    {{-- </header> --}}
    <section class="w-full hidden lg:block">
        <div
            class="flex items-center max-xl:overflow-x-auto scroll-smooth max-xl:overflow-hidden bg-gray-100 whitespace-nowrap">
            <a class="max-xl:p-2 bg-black  px-6 py-12 cursor-pointer flex-shrink-0" href="{{ route('home') }}">
                <i class="ri-arrow-left-line text-white text-7xl max-sm:text-4xl" aria-hidden="true"></i>
                <span class="sr-only">Scroll left</span>
            </a>

            <a href="{{ route('products') }}"
                class="p-6 md:px-6 md:py-[52.3px]  cursor-pointer group flex-shrink-0 transform duration-300 block hover:bg-orange-500">

                <img class="m-auto w-10 h-10 object-contain lg:w-14 duration-300 group-hover:invert group-hover:brightness-0"
                    src="{{ asset('Vector.png') }}" alt="Main Product" loading="lazy">
                <div class="w-20 lg:w-28 whitespace-normal block">
                    <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                        Main Product
                    </h3>
                </div>

            </a>
            <div class="flex allcatlinks"><a href="{{ route('product.agro.chemicals') }}"
                    class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center hover:bg-orange-500">
                    <div>
                        <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain group-hover:invert group-hover:brightness-0"
                            src="{{ asset('categoryicon/1743166977agroicon.png') }}" alt="Main Product" loading="lazy">
                        <div class="w-20 lg:w-28 whitespace-normal block">
                            <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                                AgroChemicals
                            </h3>
                        </div>
                    </div>
                </a><a href="{{ route('product.public.health.pesticides') }}"
                    class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center hover:bg-orange-500">
                    <div>
                        <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain group-hover:invert group-hover:brightness-0"
                            src="{{ asset('categoryicon/1743230429public_health.png') }}" alt="Main Product" loading="lazy">
                        <div class="w-20 lg:w-28 whitespace-normal block">
                            <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                                Public Health Pesticides
                            </h3>
                        </div>
                    </div>
                </a><a href="{{ route('product.export.zone') }}"
                    class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center bg-orange-500 text-white">
                    <div>
                        <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain invert brightness-0"
                            src="{{ asset('categoryicon/1750848005images__1_-removebg-preview.png') }}" alt="Main Product"
                            loading="lazy">
                        <div class="w-20 lg:w-28 whitespace-normal block">
                            <h3 class="font-medium text-xs sm:text-sm md:text-base text-center text-white">
                                Export Zone
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- <div class="group flex">
                    <div class=" p-10 max-xl:p-2 bg-orange-500 text-white cursor-pointer flex-shrink-0">
                        <img class="m-auto max-xl:w-10 max-xl:h-[40px]" src="./assets/product category/top-info/Vector-2.png" alt="Product by Ingredient" loading="lazy">
                        <h3 class="font-medium max-sm:text-xs text-center">Product by Ingredient</h3>
                    </div>
                    <div class="hidden group-hover:block p-10 max-xl:p-2 bg-orange-500 text-white cursor-pointer flex-shrink-0">
                        <img class="m-auto max-xl:w-10 max-xl:h-[40px]" src="./assets/product category/top-info/Vector-2.png" alt="Product by Ingredient" loading="lazy">
                        <h3 class="font-medium max-sm:text-xs text-center">Product by Ingredient</h3>
                    </div>
                </div> -->
        </div>
    </section>
    <section class="w-full max-sm:pt-2 allproductcategory">
        <div class="flex max-sm:flex-wrap justify-center bg-gray-200">
            <div class="w-[50%] max-sm:w-full mt-20 p-5 flex justify-center">
                <div class="lg:w-[400px] xl:w-[500px]">
                    <h1 class="text-3xl max-sm:text-2xl font-bold mb-5">Export Zone</h1>
                    <p class="mb-3 max-sm:text-xs text-zinc-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias!
                        Dolores cumque facere et! dDdDDX</p>
                    <a class="font-bold text-blue-500 hover:underline" href="#">Learn More</a>
                </div>
            </div>
            <div class="w-[50%] h-[409px] max-sm:w-full">
                <img class="h-full w-full object-cover"
                    src="{{ asset('category/17508477231742816844products_by_ingerdrent.png') }}" alt="Export Zone">
            </div>
        </div>
    </section>

    <section class=" w-full  my-10">
        <div class="p-search flex items-center flex-wrap justify-between m-auto max-w-7xl">
            <form action="" class="flex my-1 py-2 px-3 bg-gray-100 rounded-md border border-gray-200">
                <i class="ri-search-2-line text-gray-400  pt-1"></i>
                <input id="productSearch"
                    class="border-none bg-transparent outline-none p-[2px_10px] w-full font-inter lg:w-96" type="search"
                    placeholder="Search Products">
            </form>
            <div class="p-sort flex bg-gray-100 px-2 py-1  rounded-md max-sm:w-30 ">
                <i class="ri-sort-desc text-lg py-1"></i>

                <form action="">
                    <select id="sortSelect" name="cars"
                        class="p-[5px_2px] my-1 outline-none max-sm:text-[13px] bg-transparent">
                        <option>Sort By</option>
                        <option value="asc">Ascending Order </option>
                        <option value="desc">Descending Order</option>

                    </select>
                </form>
            </div>
        </div>

    </section>
    <section class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3 max-w-7xl m-auto my-10 " id="productList">
        <a href="/view/product.html?catid=22&amp;productid=24"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">LAMBDA CYHALOTHRIN 9.7% CS</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                style="">
                <img src="{{ asset('product/1750076795Aesther.png') }}" alt="AESTHER+" class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">AESTHER+</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=32"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Deltamethrin 2.5% EC</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                style="">
                <img src="{{ asset('product/1750846909ARMOSS.png') }}" alt="ARMOSS"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">ARMOSS</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=21"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Bifenthrin 2.5% EC</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div
                class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                <img src="{{ asset('product/1750076915Bithrin 25.png') }}" alt="Bithrin 25"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">Bithrin 25</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=29"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Deltamethrin 2.5% WP</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                style="">
                <img src="{{ asset('product/1750076607DELPHIER.png') }}" alt="DELPHIER"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">DELPHIER</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=26"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">BROMADIALONE 0.25% CB</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div
                class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                <img src="{{ asset('product/1750076708KALRAT CB.png') }}" alt="KALRAT CB"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">KALRAT CB</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=27"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Bromadialone 0.005% RB</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div
                class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                <img src="{{ asset('product/1750076680KALRAT RB.png') }}" alt="Kalrat RB"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">Kalrat RB</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=25"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Lambda-cyhalothrin 10 % WP</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                style="">
                <img src="{{ asset('product/1750076742Lamier 100.png') }}" alt="Lamier 100"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">Lamier 100</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=23"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">DELTAMETHRIN 2% w/w EW</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                style="">
                <img src="{{ asset('product/1750076842MATHIER.png') }}" alt="MATHIER"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">MATHIER</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=20"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Imidacloprid 30.5% SC</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                style="">
                <img src="{{ asset('product/17510212851.png') }}" alt="OZIER" class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">OZIER</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=22"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Fipronil 2.92% EC</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div
                class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                <img src="{{ asset('product/1750076883Pexter.png') }}" alt="Pexter"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">Pexter</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=30"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Malathion 50% EC</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div
                class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                <img src="{{ asset('product/1750076567Riddle.png') }}" alt="RIDDLE"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">RIDDLE</h6>
            </div>
        </a>

        <a href="/view/product.html?catid=22&amp;productid=28"
            class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
            <h5 class="group-hover:font-semibold duration-300">Zinc Phosphide 80% Wv</h5>
            <div
                class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
            <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md left-1/2 -translate-x-1/2 top-full mt-2"
                style="">
                <img src="{{ asset('product/1750076647ZINPHOS.png') }}" alt="Zinphos"
                    class="w-48 h-44 p-2 object-cover">
                <h6 class="text-sm font-inter font-medium text-center">Zinphos</h6>
            </div>
        </a>
    </section>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
