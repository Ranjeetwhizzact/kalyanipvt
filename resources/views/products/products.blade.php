@extends('layouts.app')

@section('title', 'Products - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
<header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
        </header>
    <section class="w-full max-sm:pt-2 ">
        <div class="flex md:flex-wrap lg:flex-nowrap items-start jusfity-center bg-gray-200">
            <div class="lg:w-1/2 md:p-7 lg:ps-24 lg:pt-12   max-sm:pt-5 max-sm:pl-2">
                <div class="max-w-[521px]">
                    <div class="HomeNavigator inline-block">

                        <a class="flex p-[5px_10px] bg-white rounded-2xl mb-[10px]" href="{{ route('home') }}">
                            <i class="ri-home-4-line font-medium"></i>&nbsp;
                            <h3 class="font-medium pl-2 pr-2">Home</h3>
                        </a>
                    </div>
                    <h1 class="text-3xl max-sm:text-2xl font-bold mb-5">Products We Offer for your<br>
                        Agriculture Solution</h1>
                    <p class="mb-3 max-sm:text-xs text-zinc-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid non
                        nisi voluptate
                        ipsam architecto necessitatibus qui natus suscipit mollitia harum?Lorem, ipsum dolor sit amet
                        consectetur adipisicing elit. Aspernatur earum rerum fugit officiis quisquam ipsam magni facilis
                        aliquam corporis? Rerum.</p>
                    {{-- <a class="font-bold max-sm:text-1xs" href="">Learn More</a> --}}
                </div>

            </div>
            <div class="w-full lg:w-1/2   h-full">
                <img class="h-full w-full bg-cover object-cover" src="{{ asset('HomeImage.png') }}" alt="">
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
        <div
            class="productInfo flex flex-wrap items-center space-y-3 justify-evenly mt-10 max-w-[1280px] m-auto homecategory my-7">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cat as $item)
                    <article
                        class="group bg-white flex flex-col h-full rounded-3xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)]">
                        <div class="relative overflow-hidden rounded-xl aspect-[16/10] z-10">
                            <img src="{{ url($item->img) }}" alt=""
                                class="w-full h-[300px]  object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                            {{-- <span class="absolute top-4 left-4 bg-orange-500 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest px-3 mx-2 py-1.5 rounded-full shadow-lg">
                        {{-- {{ $item->section_type ?? 'News' }} --}}
                            {{-- </span>  --}}

                            {{-- @if ($item->created_at->gt(now()->subDays(3))) --}}
                            {{-- <span class="absolute top-4 right-4 bg-gradient-to-r from-orange-500 to-red-600 text-white text-[10px] font-black uppercase px-3 py-1.5 rounded-lg shadow-xl animate-pulse">New</span> --}}
                            {{-- @endif --}}

                            {{-- <div class="absolute bottom-4 left-4 right-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                        <div class="bg-orange-600  border  px-4 py-2 rounded-xl shadow-2xl text-white text-xs font-bold">
                            {{ $item->created_at->format('M d, Y') }}
                        </div>
                    </div> --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>

                        <div class="flex flex-col flex-grow p-4 border-x border-b border-gray-100 rounded-b-3xl">
                            <h3 class="text-3xl p-[5px_5px] max-sm:text-2xl max-xl:text-[25px]">{{ $item->name }}</h3>
                            <p class="p-[5px_5px] max-xl:text-[14px] h-20 overflow-hidden line-clamp-3">
                                {{ $item->short_discription }}</p>
                            <div class="mt-4 pt-5 flex items-center justify-between border-t border-gray-50 w-full">
                                {{-- <a href="{{ url('subcategory/' . $item->slug) }}" class="block w-full"> --}}
                                <div class="block w-full">
                                    @if ($item->subcategories_count > 0)
                                        <div class="grid grid-cols-2 gap-2 w-full">
                                            <a href="{{ route('category.show', $item->slug) }}" class="block w-full">
                                                <div
                                                    class="btn2 flex items-center w-full p-[15px_20px] rounded-r-lg  bg-orange-500">

                                                    <img src="{{ url('/icon/iconnvector.png') }}" alt=""
                                                        class="w-4">
                                                    <h3
                                                        class="pl-[10px] font-medium text-white whitespace-nowrap capitalize">
                                                        {{ $item->subcategories_count }} subcategories</h3>
                                                </div>
                                            </a>
                                            <a href="{{ route('category.show', $item->slug) }}" class="block w-full">
                                                <div
                                                    class="btn2 flex items-center w-full p-[15px_20px] rounded-e-lg  bg-orange-500">

                                                    <img src="{{ url('/icon/iconextra.png') }}" alt=""
                                                        class="w-4">
                                                    <h3
                                                        class="pl-[10px] font-medium text-white whitespace-nowrap capitalize">
                                                        {{ $item->products_count }} products</h3>
                                                </div>
                                            </a>
                                        </div>
                                    @else
                                        <a href="{{ route('category.show', $item->slug) }}" class="block w-full">
                                            <div
                                                class="btn2 flex items-center w-full p-[15px_20px] rounded-lg  bg-orange-500">

                                                <img src="{{ url('/icon/iconextra.png') }}" alt="" class="w-4">
                                                <h3 class="pl-[10px] font-medium text-white whitespace-nowrap capitalize">
                                                    {{ $item->products_count }} products</h3>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                {{-- </a> --}}

                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
            {{-- <div class="product-data  p-[0px_10px] w-1/3 max-sm:w-full pb-[10px]">
                    <div
                        class="ImageBg bg-[url('./assets/Home/homeProduct/3rdImage.png')] w-full h-[100px] bg-cover bg-no-repeat bg-center mb-3 rounded-[20px] relative">
                        <div class="redirection absolute top-0 right-0 max-xl:p-[10px] p-[20px] bg-white/25 rounded-3xl">
                            <a href=""><img class="" src="{{ url('subcategory/1744616705grass.png') }}" alt=""></a>
                        </div>
                    </div>
                    <h2 class="text-3xl p-[5px_5px] max-sm:text-2xl max-xl:text-[25px]">product by Ingredient</h2>
                    <p class="p-[5px_5px] max-xl:text-[14px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus magni
                        adipisci itaque enim in asperiores expedita odit officia. Molestias accusamus numquam amet
                        molestiae deleniti voluptatum?</p>
                    <div class="productbtnwrap flex items-center justify-between p-[15px_5px]">
                        <div class="btn2 flex items-center w-full p-[15px_20px] rounded-[10px_10px_10px_10px] bg-orange-500">
                            <img src="./assets/Home/homeProduct/productIcon.png" alt="">
                            <h3 class="pl-[10px] font-medium text-white whitespace-nowrap">300+ Products</h3>
                        </div>
                    </div>
                </div>
                <div class="product-data  p-[0px_10px] w-1/3 max-sm:w-full pb-[10px]">
                    <div
                        class="ImageBg bg-[url('./assets/Home/homeProduct/3rdImage.png')] w-full h-[200px] bg-cover bg-no-repeat bg-center mb-3 rounded-[20px] relative">
                        <div class="redirection absolute top-0 right-0 max-xl:p-[10px] p-[20px] bg-white/25 rounded-3xl">
                            <a href=""><img class="" src="./assets/Home/homeProduct/redirection.png" alt=""></a>
                        </div>
                    </div>
                    <h2 class="text-3xl p-[5px_5px] max-sm:text-2xl max-xl:text-[25px]">product by Ingredient</h2>
                    <p class="p-[5px_5px] max-xl:text-[14px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus magni
                        adipisci itaque enim in asperiores expedita odit officia. Molestias accusamus numquam amet
                        molestiae deleniti voluptatum?</p>
                    <div class="productbtnwrap flex items-center justify-between p-[15px_5px]">
                        <div class="btn2 flex items-center w-full p-[15px_20px] rounded-[10px_10px_10px_10px] bg-orange-500">
                            <img src="./assets/Home/homeProduct/productIcon.png" alt="">
                            <h3 class="pl-[10px] font-medium text-white whitespace-nowrap">300+ Products</h3>
                        </div>
                    </div>
                </div>  --}}
        </div>
    </section>
    {{-- <form action="{{ route('products.generate.slugs') }}" method="POST">
    @csrf
    <button
        type="submit"
        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-black rounded-lg font-semibold"
    >
        Generate Slugs
    </button>
</form> --}}
    <section style="background-image: url('{{ asset('map-base.png') }}')"
        class="w-full mt-[20px] p-[3rem_2rem] md:p-[5rem_3rem] lg:p-[6rem_5rem] bg-cover bg-no-repeat bg-center">
        <p class="text-4xl font-medium tracking-[1px] w-full lg:w-[60%] xl:w-[55%] max-sm:text-2xl font-dmSans">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
        </p>

        <div class="flex max-sm:flex-wrap items-center mt-10 gap-10">

            <!-- DISTRIBUTER -->
            <div>
                <p class="uppercase text-xs tracking-wider">Distributor</p>
                <h1 class="text-7xl font-extrabold text-sawarabimincho text-orange-500">
                    20+
                </h1>
            </div>

            <div>
                <p class="uppercase text-xs tracking-wider">Served Country</p>
                <h1 class="text-7xl font-extrabold text-sawarabimincho text-outline">
                    34k+
                </h1>
            </div>

            <div>
                <p class="uppercase text-xs tracking-wider">Product Category</p>
                <h1 class="text-7xl font-extrabold text-sawarabimincho text-outline">
                    10k+
                </h1>
            </div>

        </div>
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
