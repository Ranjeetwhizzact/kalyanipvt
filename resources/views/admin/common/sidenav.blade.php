<input type="checkbox" id="sidebar-toggle" class="hidden">
<div class="sidebar fixed inset-y-0 left-0 bg-gray-800 text-gray-100 w-64 transition-all duration-300">
    <div class="bg-gray-800 pt-5 px-2 flex justify-between items-center">
        <div class="flex items-center">
            <!-- Toggle button for collapsing the sidebar -->
            <label for="sidebar-toggle" class="text-2xl cursor-pointer ml-1 mr-4">
                <i class="ri-menu-line"></i>
            </label>
            <!-- Logo (Image) -->
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <img src="{{ asset('logo-nav.png') }}" alt="Dashboard Logo" class="h-15 w-32 hidden sm:block">
            </a>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="mt-6 h-[calc(100vh-100px)] overflow-y-auto pr-2">
        <ul class="space-y-0">
            <li>
                <!-- Hidden checkbox -->
                <input type="checkbox" id="HomepageToggle" class="hidden peer">

                <!-- Label (acts like button) -->
                <label for="HomepageToggle"
                    class="cursor-pointer flex items-center px-3  py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-dashboard-line text-xl"></i>
                    <span class="ml-5 flex-1">
                        Hompage Content</span>
                    <i class="ri-arrow-down-s-line text-xl"></i>
                </label>

                <!-- Dropdown menu -->
                <ul class="ml-8 mt-1 space-y-1 hidden peer-checked:block">
                    <li>
                        <a href="{{ route('admin.banner.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Homepage Banner
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.social.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Social Media Links
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.stats.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Homepage Stats
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.adsmodels.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                           Ads Model
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contacts.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                           Contacts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.footer-links.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Footer Links
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.footer-settings.edit') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Footer Settings
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a href="{{ route('admin.navbar.index') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-dashboard-line text-xl"></i>
                    <!--<i class="ri-menu-search-fill text-xl"></i>-->
                    <span class="ml-5 ">Navbar</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('admin.blog.index') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-dashboard-line text-xl"></i>
                    <!--<i class="ri-menu-search-fill text-xl"></i>-->
                    <span class="ml-5 ">Blog</span>
                </a>
            </li>
            <li>
                <a href="{{ route('view.category') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-dashboard-line text-xl"></i>
                    <!--<i class="ri-menu-search-fill text-xl"></i>-->
                    <span class="ml-5 ">Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('view.subcategory') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-organization-chart text-xl"></i>
                    <span class="ml-5 ">Subcategory</span>
                </a>
            </li>

            <li>
                <a href="{{ route('all.products') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-shopping-basket-line text-xl"></i>
                    <span class="ml-5 ">Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('view.news') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-earth-fill text-xl"></i>
                    <span class="ml-5 ">News</span>
                </a>
            </li>
            <li>
                <a href="{{ route('view.testimonial') }}"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-chat-2-line text-xl"></i>
                    <span class="ml-5 ">Testimonal</span>
                </a>
            </li>
            <li>
                <input type="checkbox" id="certificateToggle" class="hidden peer">

                <label for="certificateToggle"
                    class="cursor-pointer flex items-center px-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-award-line text-xl"></i>
                    <span class="ml-5 flex-1">Certificates</span>
                    <i class="ri-arrow-down-s-line text-xl"></i>
                </label>

                <ul class="ml-8 mt-1 space-y-1 hidden peer-checked:block">
                    <li>
                        <a href="{{ route('admin.certificate.page-sections.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Certificates
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <input type="checkbox" id="VideoToggle" class="hidden peer">

                <label for="VideoToggle"
                    class="cursor-pointer flex items-center px-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-video-line text-xl"></i>
                    <span class="ml-5 flex-1">Videos</span>
                    <i class="ri-arrow-down-s-line text-xl"></i>
                </label>

                <ul class="ml-8 mt-1 space-y-1 hidden peer-checked:block">
                    <li>
                        <a href="{{ route('admin.videos.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Videos
                        </a>
                    </li>
                </ul>
            </li>
            <li>

                <!-- Hidden checkbox -->
                <input type="checkbox" id="cmsToggle" class="hidden peer">

                <!-- Label -->
                <label for="cmsToggle"
                    class="cursor-pointer flex items-center px-3 py-2 hover:bg-gray-700 transition-colors">

                    <i class="ri-pages-line text-xl"></i>

                    <span class="ml-5 flex-1">
                        CMS Management
                    </span>

                    <i class="ri-arrow-down-s-line text-xl"></i>

                </label>

                <!-- Dropdown -->
                <ul class="ml-8 mt-1 space-y-1 hidden peer-checked:block">
                    <li>
                        <a href="{{ route('admin.pages.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Pages
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.menus.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Menus
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.menu-items.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Menu Items
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.corporate-media.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Corporate Media
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.company-profile.index') }}"
                            class="block pl-3 py-2 hover:bg-gray-700 transition-colors">
                            Company Profile
                        </a>
                    </li>
                </ul>

            </li>
            {{-- <li>
                <a href="#" class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-bar-chart-box-line text-xl"></i>
                    <span class="ml-5">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#" class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-settings-3-line text-xl"></i>
                    <span class="ml-5">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    <i class="ri-chat-smile-ai-line text-xl"></i>
                    <span class="ml-5">Profile</span>
                </a>
            </li> --}}
            <li>
                <form action="{{ route('logout') }}" method="POST"
                    class="cursor-pointer flex items-center pl-3 py-2 hover:bg-gray-700 transition-colors">
                    @csrf
                    @method('DELETE')
                    <button class="flex whitespace-nowrap" type="submit">
                        <i class="ri-logout-box-line inline-block text-xl me-5"></i><span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
<div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50"></div>
