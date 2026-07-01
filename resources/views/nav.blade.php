<nav class=" sticky top-0 z-100 bg-white w-full m-auto py-3 px-4 md:py-5 md:px-8">

    <div class="flex justify-between items-center">
        <a class="w-[110px] md:w-[140px] 2xl:w-[180px] flex items-center" href="{{ route('home') }}">
            <img class="w-full h-auto object-contain" src="{{ asset('logo-nav.png') }}" alt="logo">
        </a>
        @php
            $businessMenu = $headerMenu->firstWhere('name', 'Business Area');
            $keyStrengthMenu = $headerMenu->firstWhere('name', 'Key Strength');
            $aboutMenu = $headerMenu->firstWhere('name', 'About Kalyani');
        @endphp


        <!-- DESKTOP MENU -->
        <ul class="hidden xl:flex items-center gap-8">

            <!-- HOME -->
            <li>
                <a href="{{ route('home') }}"
                    class="text-zinc-600 font-medium text-sm 2xl:text-base hover:text-orange-500">
                    Home
                </a>
            </li>


            <!-- ABOUT -->
            <li class="relative group">
                <a href="#" class="flex items-center gap-1 text-zinc-600 font-medium hover:text-orange-500">
                    About Kalyani
                    <i class="ri-arrow-down-s-line"></i>
                </a>

                <ul class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg w-60 z-50">

                    <li>
                        <a href="{{ route('company') }}" class="block px-4 py-2 hover:bg-orange-50">
                            Company Profile
                        </a>
                    </li>
                    @if ($aboutMenu)
                        @foreach ($aboutMenu->items as $item)
                            <li>
                                <a href="{{ route('page.show', $item->page->slug) }}" target="{{ $item->target }}"
                                    class="block px-4 py-2 hover:bg-orange-50">

                                    {{ $item->title }}

                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li>
                        <a href="{{ route('certificate') }}" class="block px-4 py-2 hover:bg-orange-50">
                            Certificate and Membership
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('corporateoverview') }}" class="block px-4 py-2 hover:bg-orange-50">
                            Corporate Video
                        </a>
                    </li>
                </ul>
            </li>


            <!-- PRODUCTS -->
            <li class="relative group/cat">
                <button class="flex items-center gap-1 text-zinc-600 font-medium hover:text-orange-500">
                    <a href="{{ route('products') }}">
                        Our Products
                    </a>
                    <span class="ms-[2px]">
                        <i class="ri-arrow-down-s-line"></i>
                    </span>
                </button>
                <ul
                    class="absolute left-0 w-60 bg-white shadow-lg rounded opacity-0 invisible
                        group-hover/cat:opacity-100 group-hover/cat:visible transition duration-200 z-50">

                    @foreach ($categories as $category)
                        <div class="relative group/subcat">

                            {{-- CATEGORY LINK --}}
                            <a href="{{ route('category.show', $category->slug) }}"
                                class="block px-4 py-2 hover:bg-gray-100">
                                {{ $category->name }}
                            </a>

                            {{-- SUBCATEGORIES --}}
                            @if ($category->subcategories->count())
                                <div
                                    class="absolute top-0 left-full w-60 bg-white shadow-lg rounded
                                    opacity-0 invisible group-hover/subcat:opacity-100
                                    group-hover/subcat:visible transition duration-200 z-20">

                                    @foreach ($category->subcategories as $subcategory)
                                        <a href="{{ route('subcategory.show', [$category->slug, $subcategory->slug]) }}"
                                            class="block px-4 py-2 hover:bg-gray-100">
                                            {{ $subcategory->name }}
                                        </a>
                                    @endforeach

                                </div>
                            @endif

                        </div>
                    @endforeach

                </ul>
            </li>


            <!-- BUSINESS AREA -->
            <li class="relative group">
                <a href="#" class="flex items-center gap-1 text-zinc-600 font-medium hover:text-orange-500">
                    Business Area
                    <i class="ri-arrow-down-s-line"></i>
                </a>

                <ul class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg w-60 z-50">

                    @if ($businessMenu)
                        @foreach ($businessMenu->items as $item)
                            <li>
                                <a href="{{ route('page.show', $item->page->slug) }}" target="{{ $item->target }}"
                                    class="block px-4 py-2 hover:bg-orange-50">

                                    {{ $item->title }}

                                </a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </li>


            <!-- KEY STRENGTH -->
            <li class="relative group">
                <a href="#" class="flex items-center gap-1 text-zinc-600 font-medium hover:text-orange-500">
                    Key Strength
                    <i class="ri-arrow-down-s-line"></i>
                </a>

                <ul class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg w-60 z-50">

                    @if ($keyStrengthMenu)
                        @foreach ($keyStrengthMenu->items as $item)
                            <li>
                                <a href="{{ route('page.show', $item->page->slug) }}" target="{{ $item->target }}"
                                    class="block px-4 py-2 hover:bg-orange-50">

                                    {{ $item->title }}

                                </a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </li>


            <!-- BLOG -->
            <li>
                <a href="{{ route('bloglist') }}" class="text-zinc-600 font-medium hover:text-orange-500">

                    Blog

                </a>
            </li>


            <!-- CONTACT -->
            <li>
                <a href="{{ route('contact') }}" class="text-zinc-600 font-medium hover:text-orange-500">

                    Contact Us

                </a>
            </li>

        </ul>

        <div class="relative hidden xl:flex items-center gap-3">
            <!-- Search Toggle Button -->
            <a href="javascript:void(0);" id="searchToggle"
                class="relative z-30 w-[36px] h-[36px] 2xl:w-[50px] 2xl:h-[50px]
               bg-[#FEECD4] rounded-full flex items-center justify-center">
                <i class="ri-search-2-line text-xl text-[#ED7D0B]"></i>
            </a>
            <!-- Search Input -->
            <input type="text" id="searchInput" placeholder="Search products..."
                class="absolute left-[-260px] xl:left-[-249px] top-0
                w-0 opacity-0 transition-all duration-300
                h-[43px] 2xl:h-[50px]
                px-5
                rounded-full border outline-none bg-white
                z-20 shadow-md">

            <!-- Results Dropdown -->
            <div id="searchResults"
                class="absolute left-[-260px] 2xl:left-[-250px] mt-[120px]
                    w-[300px]
                    bg-white shadow-lg rounded hidden z-40">
            </div>

            <!-- Brochure Button -->
            @if ($corporateBrochure)
                <a class="rounded-full px-[22px] py-[10px] 2xl:px-[25px] 2xl:py-[13.9px] font-medium md:text-sm 2xl:text-base text-white bg-[rgba(237,125,11,1)]"
                    href="{{ asset('storage/' . $corporateBrochure->file_path) }}" target="_blank">
                    Corporate Brochure
                </a>
            @endif
        </div>

        <div id="mobileSearchBox" class="fixed inset-0 bg-white z-[999] hidden p-4">

            <div class="flex items-center gap-3 border-b pb-3">

                <input type="text" id="mobileSearchInput" placeholder="Search products..."
                    class="flex-1 border rounded-full px-4 py-2 outline-none">

                <button id="mobileSearchClose">
                    <i class="ri-close-line text-2xl"></i>
                </button>

            </div>

            <div id="mobileSearchResults" class="mt-4 bg-white shadow rounded max-h-[60vh] overflow-y-auto">
            </div>

        </div>

        <!-- MOBILE MENU -->
        <div class="flex xl:hidden items-center gap-2 p-4 bg-white shadow-sm text-black">
            <!-- SEARCH BUTTON -->
            <button id="mobileSearchBtn"
                class="w-[36px] h-[36px] bg-[#FEECD4] rounded-full flex items-center justify-center">
                <i class="ri-search-2-line text-lg text-[#ED7D0B]"></i>
            </button>

            <!-- MENU BUTTON -->
            <button id="openNav" class="text-3xl flex items-center">
                <i class="ri-menu-line"></i>
            </button>
        </div>
        <div id="sideNav"
            class="fixed top-0 left-0 h-full w-0 bg-white text-black transition-all duration-300 overflow-x-hidden z-50">

            <!-- HEADER -->
            <div class="flex justify-between p-4 items-center bg-white">
                <img src="{{ asset('logo-nav.png') }}" class="h-12">
                <button id="closeNav" class="text-3xl">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <ul class="mt-6">

                <!-- HOME -->
                <li>
                    <a href="{{ route('home') }}" class="block px-5 py-3 text-lg">
                        Home
                    </a>
                </li>


                <!-- ABOUT KALYANI -->
                <li class="border-b">

                    <details>

                        <summary class="flex justify-between items-center px-5 py-3 cursor-pointer bg-gray-100">
                            About Kalyani
                            <i class="ri-arrow-down-s-line"></i>
                        </summary>

                        <div class="bg-gray-50">

                            <a href="{{ route('company') }}" class="block px-6 py-2 hover:bg-orange-50">
                                Company Profile
                            </a>

                            @if ($aboutMenu)
                                @foreach ($aboutMenu->items as $item)
                                    <a href="{{ route('page.show', $item->page->slug) }}"
                                        target="{{ $item->target }}" class="block px-6 py-2 hover:bg-orange-50">

                                        {{ $item->title }}

                                    </a>
                                @endforeach
                            @endif

                            <a href="{{ route('certificate') }}" class="block px-6 py-2 hover:bg-orange-50">
                                Certificate and Membership
                            </a>

                            <a href="{{ route('corporateoverview') }}" class="block px-6 py-2 hover:bg-orange-50">
                                Corporate Video
                            </a>

                        </div>

                    </details>

                </li>



                <!-- OUR PRODUCTS -->
                <li class="border-b">

                    <details>

                        <summary class="flex justify-between items-center px-5 py-3 cursor-pointer bg-gray-100">
                            Our Products
                            <i class="ri-arrow-down-s-line"></i>
                        </summary>

                        <div>

                            @foreach ($categories as $category)
                                <details class="border-t">

                                    <summary class="flex justify-between px-6 py-2 cursor-pointer bg-gray-50">

                                        <a href="{{ route('category.show', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>

                                        @if ($category->subcategories->count())
                                            <i class="ri-arrow-down-s-line"></i>
                                        @endif

                                    </summary>

                                    @if ($category->subcategories->count())
                                        <div class="bg-white">

                                            @foreach ($category->subcategories as $subcategory)
                                                <a href="{{ route('subcategory.show', [$category->slug, $subcategory->slug]) }}"
                                                    class="block px-10 py-2 text-sm hover:bg-orange-50">

                                                    {{ $subcategory->name }}

                                                </a>
                                            @endforeach

                                        </div>
                                    @endif

                                </details>
                            @endforeach

                        </div>

                    </details>

                </li>



                <!-- BUSINESS AREA -->
                <li class="border-b">

                    <details>

                        <summary class="flex justify-between items-center px-5 py-3 cursor-pointer bg-gray-100">
                            Business Area
                            <i class="ri-arrow-down-s-line"></i>
                        </summary>

                        <div>

                            @if ($businessMenu)

                                @foreach ($businessMenu->items as $item)
                                    <a href="{{ route('page.show', $item->page->slug) }}"
                                        target="{{ $item->target }}" class="block px-6 py-2 hover:bg-orange-50">

                                        {{ $item->title }}

                                    </a>
                                @endforeach

                            @endif

                        </div>

                    </details>

                </li>



                <!-- KEY STRENGTH -->
                <li class="border-b">

                    <details>

                        <summary class="flex justify-between items-center px-5 py-3 cursor-pointer bg-gray-100">
                            Key Strength
                            <i class="ri-arrow-down-s-line"></i>
                        </summary>

                        <div>

                            @if ($keyStrengthMenu)

                                @foreach ($keyStrengthMenu->items as $item)
                                    <a href="{{ route('page.show', $item->page->slug) }}"
                                        target="{{ $item->target }}" class="block px-6 py-2 hover:bg-orange-50">

                                        {{ $item->title }}

                                    </a>
                                @endforeach

                            @endif

                        </div>

                    </details>

                </li>



                <!-- BLOG -->
                <li>
                    <a href="{{ route('bloglist') }}" class="block px-5 py-3 text-lg">
                        Blog
                    </a>
                </li>


                <!-- CONTACT -->
                <li>
                    <a href="{{ route('contact') }}" class="block px-5 py-3 text-lg">
                        Contact Us
                    </a>
                </li>

                @if ($corporateBrochure)
                    <li>
                        <a href="{{ asset('storage/' . $corporateBrochure->file_path) }}" target="_blank"
                            class="block mx-5 my-3 text-center bg-[#ED7D0B] text-white py-2 rounded-full">
                            Corporate Brochure
                        </a>
                    </li>
                @endif

            </ul>

        </div>
        <div id="overlay"
            class="fixed inset-0 bg-black opacity-0 transition-opacity duration-300 ease-in-out z-40 hidden">
        </div>

    </div>
</nav>
<script>
    const toggleBtn = document.getElementById('searchToggle');
    const searchInput = document.getElementById('searchInput');
    const resultsBox = document.getElementById('searchResults');

    // Toggle Search Input
    toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();

        if (searchInput.classList.contains('w-0')) {
            searchInput.classList.remove('w-0', 'opacity-0');
            searchInput.classList.add('w-[300px]', 'opacity-100');
            searchInput.focus();
        } else {
            searchInput.classList.add('w-0', 'opacity-0');
            searchInput.classList.remove('w-[300px]', 'opacity-100');
            resultsBox.classList.add('hidden');
        }
    });

    // Live Search
    searchInput.addEventListener('keyup', function() {

        let query = this.value;

        if (query.length < 2) {
            resultsBox.innerHTML = '';
            resultsBox.classList.add('hidden');
            return;
        }

        fetch(`/search?search=${query}`)
            .then(res => res.json())
            .then(data => {

                if (data.length === 0) {
                    resultsBox.innerHTML = '<p class="p-3 text-gray-500">No results found</p>';
                    resultsBox.classList.remove('hidden');
                    return;
                }

                let html = '';

                data.forEach(product => {
                    html += `
                        <a href="/${product.subcategory.category.slug}/${product.subcategory.slug}/${product.slug}"
                           class="flex items-center p-3 hover:bg-gray-100 border-b">

                            <img src="${product.image}"
                                 class="w-10 h-10 object-cover rounded mr-3">

                            <div>
                                <p class="font-medium">${product.title}</p>
                                <p class="text-sm text-gray-500">${product.composition}</p>
                            </div>
                        </a>
                    `;
                });

                resultsBox.innerHTML = html;
                resultsBox.classList.remove('hidden');
            });
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !toggleBtn.contains(e.target)) {
            resultsBox.classList.add('hidden');
        }
    });
</script>
<script>
    const mobileBtn = document.getElementById("mobileSearchBtn");
    const mobileBox = document.getElementById("mobileSearchBox");
    const mobileClose = document.getElementById("mobileSearchClose");
    const mobileInput = document.getElementById("mobileSearchInput");
    const mobileResults = document.getElementById("mobileSearchResults");

    mobileBtn.addEventListener("click", () => {
        mobileBox.classList.remove("hidden");
    });

    mobileClose.addEventListener("click", () => {
        mobileBox.classList.add("hidden");
    });


    mobileInput.addEventListener("keyup", function() {

        let query = this.value;

        if (query.length < 2) {
            mobileResults.innerHTML = '';
            return;
        }

        fetch(`/search?search=${query}`)
            .then(res => res.json())
            .then(data => {

                let html = '';

                data.forEach(product => {

                    html += `
                <a href="/${product.subcategory.category.slug}/${product.subcategory.slug}/${product.slug}"
                   class="flex items-center p-3 border-b">

                    <img src="${product.image}"
                    class="w-10 h-10 object-cover rounded mr-3">

                    <div>
                        <p class="font-medium">${product.title}</p>
                        <p class="text-sm text-gray-500">${product.composition}</p>
                    </div>

                </a>
                `;

                });

                mobileResults.innerHTML = html;

            });

    });
</script>