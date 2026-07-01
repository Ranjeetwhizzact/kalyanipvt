@extends('layouts.app')

@section('title', $product->title . ' - Kalyani Industries Limited')
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
            <a class="max-xl:p-2 bg-black px-6 py-12 cursor-pointer flex-shrink-0" href="{{ route('home') }}">
                <i class="ri-arrow-left-line text-white text-7xl max-sm:text-4xl" aria-hidden="true"></i>
                <span class="sr-only">Scroll left</span>
            </a>
            <a href="{{ route('products') }}"
                class="p-5 sm:p-6 md:px-6 md:py-[52.3px] cursor-pointer group flex-shrink-0 transform duration-300 block hover:bg-orange-500">
                <img class="m-auto w-10 h-10 object-contain lg:w-14 duration-300 group-hover:invert group-hover:brightness-0"
                    src="{{ asset('Vector.png') }}" alt="Main Product" loading="lazy">
                <div class="w-20 lg:w-28 whitespace-normal block">
                    <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                        Main Product
                    </h3>
                </div>
            </a>
            @php
                $currentCategorySlug = request()->segment(1);
                $currentSubcategorySlug = request()->segment(2);
            @endphp
            <div class="flex allcatlinks">
                @foreach ($categories as $category)
                    @php
                        $isActive = request()->segment(1) === $category->slug;
                        // $activeSubSlug = request()->segment(2);
                    @endphp
                    <a href="{{ route('category.show', $category->slug) }}"
                        class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center {{ $isActive ? 'bg-orange-500' : 'hover:bg-orange-500' }}">
                        <div>
                            <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain
                                {{ $isActive ? 'invert brightness-0' : 'group-hover:invert group-hover:brightness-0' }}"
                                src="{{ asset($category->icon) }}" alt="{{ $category->name }}" loading="lazy">
                            <div class="w-20 lg:w-28 whitespace-normal block">
                                <h3
                                    class="font-medium text-xs sm:text-sm md:text-base text-center
                                    {{ $isActive ? 'text-white' : 'group-hover:text-white' }}">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                    </a>
                    @if ($isActive && $currentSubcategorySlug)
                        @php
                            $activeSub = $category->subcategories->where('slug', $currentSubcategorySlug)->first();
                        @endphp

                        @if ($activeSub)
                            {{-- Arrow --}}
                            <div class="flex items-center justify-center px-6 bg-orange-500">
                                <i class="ri-arrow-right-line text-3xl text-white"></i>
                            </div>

                            {{-- Only ACTIVE Subcategory --}}
                            <a href="{{ url($category->slug . '/' . $activeSub->slug) }}"
                                class="w-[170px] h-[170px] flex flex-col items-center justify-center bg-orange-500">

                                <img class="w-12 h-12 mb-3 object-contain invert brightness-0"
                                    src="{{ asset($activeSub->icon ?? $category->icon) }}" alt="{{ $activeSub->name }}">

                                <h3 class="text-center text-sm font-medium text-white">
                                    {{ $activeSub->name }}
                                </h3>
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="productDetails w-full text-ld pt-20">

        <div class="productInfoSection flex max-sm:flex-wrap items-start justify-between">

            {{-- Product Image --}}
            <div class="productImage w-1/2 max-sm:w-full flex justify-center items-start m-[0px_20px] relative">
                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}"
                    class="w-full pb-5 object-contain max-w-[520px]" />
            </div>

            {{-- Product Info --}}
            <div class="productInfo w-1/2 max-sm:w-full m-[0px_20px]" id="naberdivheight">
                <div class="titledec max-w-[540px]">
                    <h1 class="text-[50px] font-medium pb-2 product-name text-orange-500">
                        {{ $product->title }}
                    </h1>
                    <p class="font-inter">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="mt-4 flex flex-wrap items-center gap-4 mb-5">
                    <!-- Call Button -->
                    <a href="tel:+919167239899"
                        class="inline-flex items-center gap-2 bg-orange-500 text-white px-6 py-3 rounded-full hover:bg-orange-600 transition">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                            <path
                                d="M6.62 10.79a15.466 15.466 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1v3.5a1 1 0 01-1 1C10.07 21 3 13.93 3 5a1 1 0 011-1H7.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.24 1.01l-2.21 2.2z" />
                        </svg>
                        Call Me
                    </a>

                    <!-- Brochure Button -->
                    @if ($product->brochure)
                        <a href="{{ asset($product->brochure) }}" download
                            class="inline-flex items-center px-6 py-3 rounded-full bg-orange-50 text-orange-500 hover:bg-orange-100 transition">
                            Download Brochure
                        </a>
                    @endif
                </div>
                {{-- Specification --}}
                <div class="space-y-4">
                    <details class="group border border-gray-300 rounded-md p-6">
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <p>Specification</p>
                            <p><i class="ri-arrow-down-s-line"></i></p>
                        </summary>

                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-inter font-medium text-gray-500">Name</p>
                                <p class="font-medium text-base font-inter">{{ $product->title }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-inter font-medium text-gray-500">Composition</p>
                                <p class="font-medium text-base font-inter product-name">{{ $product->composition }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-inter font-medium text-gray-500">Model of Action</p>
                                <p class="font-medium text-base font-inter product-name">{{ $product->model_of_action }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-inter font-medium text-gray-500">Category</p>
                                <p class="font-medium text-base font-inter product-name">
                                    {{ $product->subcategory->category->name ?? 'N/A' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-inter font-medium text-gray-500">Subcategory</p>
                                <p class="font-medium text-base font-inter product-name">
                                    {{ $product->subcategory->name ?? 'N/A' }}
                                </p>
                            </div>

                            <div class="col-span-2">
                                <p class="text-sm font-inter font-medium text-gray-500">Package</p>

                                @php
                                    $packages = json_decode($product->packing, true);
                                @endphp

                                <ul class="flex flex-wrap gap-3 mt-2">
                                    @foreach ($packages as $pack)
                                        <li class="px-4 py-2 bg-orange-100 rounded-full text-orange-500">
                                            {{ $pack }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </details>

                    {{-- Features --}}
                    @if ($product->features)
                        <details class="group border border-gray-300 rounded-md p-6">
                            <summary class="flex justify-between items-center cursor-pointer list-none">
                                <p>Features</p>
                                <p><i class="ri-arrow-down-s-line"></i></p>
                            </summary>

                            <div class="mt-4">
                                {!! $product->features !!}
                            </div>
                        </details>
                    @endif
                </div>
            </div>
        </div>

        {{-- Usage --}}
        @if ($product->useage_type == 0 && $product->productUses->count())
            <div class="TableInfo mx-auto py-10 px-4">
                <h2 class="text-xl font-bold mb-6">Usage</h2>
                @foreach ($product->productUses as $use)
                    @php
                        $data = json_decode($use->attribute_value, true);
                        $headers = array_keys($data);
                        $rowCount = count(reset($data));
                    @endphp
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 text-sm text-left">
                            {{-- TABLE HEADERS --}}
                            <thead class="bg-orange-500">
                                <tr>
                                    @foreach ($headers as $header)
                                        <th class="border px-4 py-2 font-semibold text-white">
                                            {{ $header }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            {{-- TABLE BODY --}}
                            <tbody>
                                @for ($i = 0; $i < $rowCount; $i++)
                                    <tr class="hover:bg-gray-50 even:bg-gray-100">
                                        @foreach ($headers as $header)
                                            <td class="border px-4 py-2">
                                                {{ $data[$header][$i] ?? '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @elseif ($product->useage_type == 1 && $product->useage)
            {{-- HTML TYPE USAGE --}}
            <div class="TableInfo mx-auto py-10 px-4">
                <h2 class="text-xl font-bold mb-6">Usage</h2>
                <div class="prose max-w-none">
                    {!! $product->useage !!}
                </div>
            </div>
        @endif

    </section>

    <section class="ProductList pt-5 my-5 px-2 lg:px-5">

        <p class="pl-3 text-[20px] max-sm:text-[12px] font-semibold">
            More Products
        </p>

        @if ($relatedProducts->count())

            <section class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3 max-w-7xl m-auto my-10">

                @foreach ($relatedProducts as $related)
                    <a href="{{ route('product.show', [
                        'category' => $related->subcategory->category->slug,
                        'subcategory' => $related->subcategory->slug,
                        'product' => $related->slug,
                    ]) }}"
                        class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">

                        <h5 class="group-hover:font-semibold duration-300">
                            {{ $related->composition }}
                        </h5>

                        <div
                            class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                            <i class="ri-arrow-right-up-line"></i>
                        </div>

                        <div
                            class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">

                            <img src="{{ url($related->image) }}" alt="{{ $related->title }}"
                                class="w-48 h-44 p-2 object-cover">

                            <h6 class="text-sm font-inter font-medium text-center">
                                {{ $related->title }}
                            </h6>
                        </div>

                    </a>
                @endforeach

            </section>
        @else
            <p class="text-gray-500 mt-4 text-center">
                No more products available.
            </p>
        @endif

    </section>
    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection

@section('scripts')
    {{-- <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let subcategoryCards = document.querySelectorAll('.product-data');

            subcategoryCards.forEach(card => {
                let title = card.querySelector('h2').textContent.toLowerCase();
                let description = card.querySelector('p').textContent.toLowerCase();

                if (title.includes(searchValue) || description.includes(searchValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        document.getElementById('sortOrder').addEventListener('change', function() {
            let sortValue = this.value;
            let container = document.querySelector('.subcategory-list');
            let cards = Array.from(document.querySelectorAll('.product-data'));

            if (sortValue === 'asc' || sortValue === 'desc') {
                cards.sort((a, b) => {
                    let titleA = a.querySelector('h2').textContent.toLowerCase();
                    let titleB = b.querySelector('h2').textContent.toLowerCase();

                    if (sortValue === 'asc') {
                        return titleA.localeCompare(titleB);
                    } else {
                        return titleB.localeCompare(titleA);
                    }
                });

                // Reorder DOM elements
                cards.forEach(card => container.appendChild(card));
            }
        });

        $(document).ready(function() {
            $(".relative").hover(function() {
                let card = $(this).find(".carddiv"); // Get only the hovered card
                let windowWidth = $(window).width(); // Get window width
                let cardOffset = card.offset(); // Get the card position
                let cardWidth = card.outerWidth();
                let windowRightEdge = $(window).width();

                if (cardOffset.left + cardWidth > windowRightEdge) {
                    // If card overflows, move it below & center
                    card.removeClass("-right-52 -top-7").addClass(
                    "left-1/2 -translate-x-1/2 top-full mt-2");
                } else {
                    // If no overflow, keep default position
                    card.removeClass("left-1/2 -translate-x-1/2 top-full mt-2").addClass(
                    "-right-52 -top-7");
                }
            });
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const nabar = document.getElementById("naberdivheight");
            const image = document.getElementById("sticky");
            const container = document.getElementById("sticky-container");
            const headerHeight = 80; // Adjust as needed

            function matchHeight() {
                if (window.innerWidth > 600 && nabar && container) {
                    const navbarHeight = nabar.offsetHeight;
                    if (navbarHeight > 500) {
                        container.style.height = `${navbarHeight}px`;
                    } else {
                        container.style.height = "800px";
                    }
                } else {
                    container.style.height = "500px"; // Reset for smaller screens
                    image.style.transform = "none"; // Reset image position
                }
            }

            function updateScroll() {
                if (window.innerWidth <= 800) return;

                const containerTop =
                    container.getBoundingClientRect().top + window.scrollY;
                const scrollY = window.scrollY;
                const containerHeight = container.offsetHeight;
                const imageHeight = image.offsetHeight;

                const maxTranslate = containerHeight - imageHeight;
                let translateY = scrollY - containerTop + headerHeight;

                // Clamp the value
                translateY = Math.max(0, Math.min(translateY, maxTranslate));
                image.style.transform = `translateY(${translateY}px)`;
            }

            matchHeight();
            updateScroll();

            window.addEventListener("scroll", () => {
                matchHeight();
                updateScroll();
            });

            window.addEventListener("resize", () => {
                matchHeight();
                updateScroll();
            });
        });
    </script>
@endsection
