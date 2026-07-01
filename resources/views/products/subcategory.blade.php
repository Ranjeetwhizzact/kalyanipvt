@extends('layouts.app')

@section('title', $subcategory->name . ' - Kalyani Industries Limited')
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
            <div class="flex allcatlinks">
                <a href="#"
                    class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center bg-orange-500 text-white">
                    <div>
                        <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain invert brightness-0"
                            src="{{ asset('categoryicon/1743166977agroicon.png') }}" alt="AgroChemicals" loading="lazy">
                        <div class="w-20 lg:w-28 whitespace-normal block">
                            <h3 class="font-medium text-xs sm:text-sm md:text-base text-center text-white">
                                AgroChemicals
                            </h3>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center hover:bg-orange-500">
                    <div>
                        <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain group-hover:invert group-hover:brightness-0"
                            src="{{ asset('categoryicon/1743230429public_health.png') }}" alt="Public Health Pesticides"
                            loading="lazy">
                        <div class="w-20 lg:w-28 whitespace-normal block">
                            <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                                Public Health Pesticides
                            </h3>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-[170px] sm:w-36 sm:h-36 md:w-[170px] md:h-[170px] flex justify-center items-center hover:bg-orange-500">
                    <div>
                        <img class="m-auto w-10 h-10 lg:w-14 duration-300 object-contain group-hover:invert group-hover:brightness-0"
                            src="{{ asset('categoryicon/1750848005images__1_-removebg-preview.png') }}" alt="Export Zone"
                            loading="lazy">
                        <div class="w-20 lg:w-28 whitespace-normal block">
                            <h3 class="font-medium text-xs sm:text-sm md:text-base text-center group-hover:text-white">
                                Export Zone
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="w-full max-sm:pt-2 categorydiscription">
        <div class="flex max-sm:flex-wrap justify-center bg-gray-200">
            <div class="w-[50%] max-sm:w-full mt-5 md:mt-20 p-5 flex justify-center">
                <div class="lg:w-[400px] xl:w-[500px]">
                    <h1 class="text-3xl max-sm:text-2xl font-bold mb-5">{{ $subcategory->name }}</h1>
                    <p class="mb-3 max-sm:text-xs text-zinc-600">
                        {{ $subcategory->discription ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!' }}
                    </p>
                    {{-- <a class="font-bold text-blue-500 hover:underline" href="/category/{{ $subcategory->id }}">Learn
                        More</a> --}}
                </div>
            </div>
            <div class="w-[50%] h-[409px] max-sm:w-full">
                <img class="h-full w-full object-cover"
                    src="{{ asset($subcategory->img ?? 'category/1742816632AgroChemicals.png') }}"
                    alt="{{ $subcategory->name }}">
            </div>
        </div>
    </section>

    <section class="product-list w-full pt-10">
        <div class="p-search flex items-center justify-between m-auto max-w-7xl">
            <form onsubmit="return false;"
                class="relative w-full max-w-md my-1 py-2 px-3 bg-gray-100 rounded-md border border-gray-200">

                <input id="InputSearch" class="w-full bg-transparent outline-none px-2" type="search"
                    placeholder="Search Products">
                <!-- Dropdown -->
                <div id="ResultsBox"
                    class="absolute left-0 top-full w-full bg-white border rounded-md shadow-lg hidden z-[9999] max-h-80 overflow-y-auto">
                </div>

            </form>
        </div>

        {{-- <div class="productInfo grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-10 m-auto max-w-7xl subcategory-list"> --}}
        {{-- @forelse($subcategories as $subcategory)
        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                style="background-image: url('{{ asset($subcategory->img ?? 'subcategory/default.jpg') }}');">
                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                    <a href="{{ url($category->slug.'/'.$subcategory->slug) }}">
                        <span class="sr-only">View Subcategory</span>
                    </a>
                </div>
            </div>
            <h2 class="text-2xl font-medium px-2 pb-2 h-16">{{ $subcategory->name }}</h2>
            <p class="px-2 pb-4 h-[134px] overflow-hidden text-zinc-500">
                {{ $subcategory->short_discription }}
            </p>
            <a href="{{ url($category->slug.'/'.$subcategory->slug) }}"
                class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                <h3 class="pl-2 font-medium">
                    <i class="ri-price-tag-3-fill text-orange-300 text-[27px]"></i>
                    {{ $subcategory->products_count ?? 0 }}+ Products
                </h3>
            </a>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10">
            <div class="bg-gray-100 p-10 rounded-lg">
                <h3 class="text-2xl font-medium text-gray-600 mb-3">No Subcategories Found</h3>
                <p class="text-gray-500">There are no subcategories available for {{ $category->name }} at the moment.</p>
            </div>
        </div>
        @endforelse --}}


        {{-- </div> --}}
        <section class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-3 max-w-7xl m-auto my-10 " id="productList">
            @foreach ($products as $product)
                <a href="{{ route('product.show', [
                    'category' => $category->slug,
                    'subcategory' => $subcategory->slug,
                    'product' => $product->slug,
                ]) }}
                        "
                    class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
                    <h5 class="group-hover:font-semibold duration-300">{{ $product->composition }}</h5>
                    <div
                        class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                        <i class="ri-arrow-right-up-line"></i>
                    </div>
                    <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
                        style="">
                        <img src="{{ url($product->image) }}" alt="{{ $product->title }}"
                            class="w-48 h-44 p-2 object-cover">
                        <h6 class="text-sm font-inter font-medium text-center">{{ $product->title }}</h6>
                    </div>
                </a>
            @endforeach
            {{--
    <a href="/view/product.html?catid=22&amp;productid=32"
        class="ps-4 rounded-xl bg-gray-200 w-[300px] md:w-[400px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-lg md:text-[22px] justify-between duration-300 items-center relative m-auto">
        <h5 class="group-hover:font-semibold duration-300">Deltamethrin 2.5% EC</h5>
        <div
            class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
            <i class="ri-arrow-right-up-line"></i>
        </div>
        <div class="w-44 m-auto h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7"
            style="">
            <img src="{{asset('product/1750846909ARMOSS.png')}}" alt="ARMOSS"
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
            <img src="{{asset('product/1750076915Bithrin 25.png')}}" alt="Bithrin 25"
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
            <img src="{{asset('product/1750076607DELPHIER.png')}}" alt="DELPHIER"
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
            <img src="{{asset('product/1750076708KALRAT CB.png')}}" alt="KALRAT CB"
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
            <img src="{{asset('product/1750076680KALRAT RB.png')}}" alt="Kalrat RB"
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
            <img src="{{asset('product/1750076742Lamier 100.png')}}" alt="Lamier 100"
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
            <img src="{{asset('product/1750076842MATHIER.png')}}" alt="MATHIER"
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
            <img src="{{asset('product/17510212851.png')}}" alt="OZIER"
                class="w-48 h-44 p-2 object-cover">
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
            <img src="{{asset('product/1750076883Pexter.png')}}" alt="Pexter"
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
            <img src="{{asset('product/1750076567Riddle.png')}}" alt="RIDDLE"
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
            <img src="{{asset('product/1750076647ZINPHOS.png')}}" alt="Zinphos"
                class="w-48 h-44 p-2 object-cover">
            <h6 class="text-sm font-inter font-medium text-center">Zinphos</h6>
        </div>
    </a> --}}
        </section>
    </section>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            console.log("✅ Search JS Loaded");

            const input = document.getElementById('InputSearch');
            const resultsBox = document.getElementById('ResultsBox');

            if (!input || !resultsBox) {
                console.error("❌ Elements not found");
                return;
            }

            let debounceTimer;

            input.addEventListener('input', function() {

                let query = this.value.trim();
                console.log("Typing:", query);

                clearTimeout(debounceTimer);

                if (query.length < 2) {
                    resultsBox.classList.add('hidden');
                    return;
                }

                debounceTimer = setTimeout(() => {

                    fetch(`/product-lookup?q=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {

                            console.log("API:", data);

                            resultsBox.innerHTML = '';

                            if (data.length === 0) {
                                resultsBox.innerHTML = `
                            <div class="p-3 text-gray-500">No products found</div>
                        `;
                                resultsBox.classList.remove('hidden');
                                return;
                            }

                            data.forEach(product => {

                                // safety check
                                if (!product.subcategory || !product.subcategory
                                    .category) return;

                                let url =
                                    `/${product.subcategory.category.slug}/${product.subcategory.slug}/${product.slug}`;

                                let item = `
                            <a href="${url}"
                               class="block px-4 py-2 hover:bg-gray-100 border-b">

                                <div class="font-medium text-sm">
                                    ${product.title}
                                </div>

                                <div class="text-xs text-gray-500">
                                    ${product.composition ?? ''}
                                </div>

                            </a>
                        `;

                                resultsBox.innerHTML += item;
                            });

                            resultsBox.classList.remove('hidden');
                        })
                        .catch(error => {
                            console.error("❌ Fetch Error:", error);
                        });

                }, 300); // debounce

            });

            document.addEventListener('click', function(e) {
                if (!input.contains(e.target) && !resultsBox.contains(e.target)) {
                    resultsBox.classList.add('hidden');
                }
            });

        });
    </script>
@endsection
