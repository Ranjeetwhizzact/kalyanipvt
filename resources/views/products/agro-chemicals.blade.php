@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
<header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
        </header>
<section class="w-full hidden lg:block">
    <div
        class="flex items-center max-xl:overflow-x-auto scroll-smooth max-xl:overflow-hidden bg-gray-100 whitespace-nowrap">
        <a class="max-xl:p-2 bg-black  px-6 py-12 cursor-pointer flex-shrink-0" href="{{route('home')}}">
            <i class="ri-arrow-left-line text-white text-7xl max-sm:text-4xl" aria-hidden="true"></i>
            <span class="sr-only">Scroll left</span>
        </a>
        <a href="{{route('products')}}"
            class="p-5 sm:p-6 md:px-6 md:py-[52.3px] cursor-pointer group flex-shrink-0 transform duration-300 block hover:bg-orange-500">

            <img class="m-auto w-10 h-10 object-contain lg:w-14 duration-300 group-hover:invert group-hover:brightness-0"
                src="{{ asset('Vector.png') }}" alt="Main Product" loading="lazy">

            <div class="w-20 lg:w-28 whitespace-normal block">
                <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                    Main Product
                </h3>
            </div>
        </a>
        <div class="flex allcatlinks">
            <a href="{{route('product.agro.chemicals')}}"
                class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center bg-orange-500 text-white">
                <div>
                    <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain invert brightness-0"
                        src="{{asset('categoryicon/1743166977agroicon.png')}}" alt="Main Product" loading="lazy">
                    <div class="w-20 lg:w-28 whitespace-normal block">
                        <h3 class="font-medium text-xs sm:text-sm md:text-base text-center text-white">
                            AgroChemicals
                        </h3>
                    </div>
                </div>
            </a>
            <a href="{{route('product.public.health.pesticides')}}"
                class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center hover:bg-orange-500">
                <div>
                    <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain group-hover:invert group-hover:brightness-0"
                        src="{{asset('categoryicon/1743230429public_health.png')}}" alt="Main Product" loading="lazy">
                    <div class="w-20 lg:w-28 whitespace-normal block">
                        <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                            Public Health Pesticides
                        </h3>
                    </div>
                </div>
            </a>
            <a href="{{route('product.export.zone')}}"
                class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center hover:bg-orange-500">
                <div>
                    <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain group-hover:invert group-hover:brightness-0"
                        src="{{asset('categoryicon/1750848005images__1_-removebg-preview.png')}}" alt="Main Product"
                        loading="lazy">
                    <div class="w-20 lg:w-28 whitespace-normal block">
                        <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
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

<section class="w-full max-sm:pt-2 categorydiscription">
    <div class="flex max-sm:flex-wrap justify-center bg-gray-200">
        <div class="w-[50%] max-sm:w-full mt-5 md:mt-20 p-5 flex justify-center">
            <div class="lg:w-[400px] xl:w-[500px]">
                <h1 class="text-3xl max-sm:text-2xl font-bold mb-5">AgroChemicals</h1>
                <p class="mb-3 max-sm:text-xs text-zinc-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias!
                    Dolores cumque facere et!</p>
                <a class="font-bold text-blue-500 hover:underline" href="/category/20">Learn More</a>
            </div>
        </div>
        <div class="w-[50%] h-[409px] max-sm:w-full">
            <img class="h-full w-full object-cover"
                src="{{ asset('category/1742816632AgroChemicals.png') }}"
                alt="AgroChemicals">
        </div>
    </div>
</section>

<section class="product-list w-full pt-10">
    <div class="p-search flex items-center flex-wrap justify-between m-auto max-w-7xl">
        <form action="" class="flex my-1 py-2 px-3 bg-gray-100 rounded-md border border-gray-200">
            <i class="ri-search-2-line text-gray-400  pt-1"></i>
            <input id="searchInput"
                class="border-none bg-transparent outline-none p-[2px_10px] w-full font-inter lg:w-96" type="search"
                placeholder="Search Products">
        </form>
        <div class="p-sort flex bg-gray-100 px-2 py-1  rounded-md max-sm:w-30 ">
            <i class="ri-sort-desc text-lg py-1"></i>

            <form action="">
                <select id="sortOrder" name="cars"
                    class="p-[5px_2px] my-1 mt-2 sm:mt-0 outline-none max-sm:text-[13px] bg-transparent">
                    <option>Sort By</option>
                    <option value="asc">Ascending Order </option>
                    <option value="desc">Descending Order</option>

                </select>
            </form>
        </div>
    </div>
    <div
        class="productInfo grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-10 m-auto max-w-7xl subcategory-list">
        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744616705grass.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/16">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Adjuvant</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=16"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744616757public_health.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/17">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Biostimulant</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=17"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744617086growone.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/14">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Fungicide</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=14"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744616345public_health.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/12">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Insecticides</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=12"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744617135grass.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/15">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Plant Growth Regulator</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=15"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744616810products_by_ingerdrent.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/18">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Plant Suppliment</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=18"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744617931growone.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/20">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Seed Treatment</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=20"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>

        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{asset('subcategory/1744616504growone.png')}}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="/subcategory/13">

                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">Weedicide</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid
                voluptatem alias! Dolores cumque facere et!</p>
            <a href="/view/product-list.html?id=20&amp;subid=13"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium"><i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i> 0+ Products
                </h3>
            </a>
        </div>
    </div>
</section>

<!-- WhatsApp Icon -->
<div id="myWhatsappButton" class="z-30"></div>

@include('footer')

@endsection
@section('scripts')

@endsection
