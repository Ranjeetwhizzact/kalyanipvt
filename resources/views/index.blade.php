@extends('layouts.app')

@section('title', 'Home - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    {{-- <header> --}}
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>
    {{-- </header> --}}

    {{-- Dynamic Banner --}}
    @if ($banner)

        <section class="w-full m-auto xl:mt-[74px]">

            <div class="xl:w-[999px] m-auto">
                <h2 class="text-[23px] md:text-[35px] xl:text-[50px] text-center lg:leading-[60px] font-normal font-poppins">
                    {{ $banner->title }}
                </h2>
            </div>

            <div class="relative w-full h-[450px] lg:h-[800px]">

                @if ($banner->banner_image)
                    <img src="{{ asset($banner->banner_image) }}" alt="{{ $banner->title }}"
                        class="w-full absolute z-10 h-full object-cover">
                @endif

                <div class="absolute z-20 w-full">
                    <div class="m-auto my-3">

                        @if ($banner->subtitle)
                            <p class="text-lg font-medium text-center m-auto text-[#71717A]">
                                {{ $banner->subtitle }}
                            </p>
                        @endif

                        @if ($banner->link)
                            <div class="m-auto flex justify-center mt-3">
                                <a href="{{ $banner->link }}"
                                    class="w-36 inline-block rounded-full px-5 py-3 bg-black text-white text-center text-base">
                                    Learn More
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Banner ends here --}}

    {{-- SIDE NAV SOCIAL LINKS --}}
    @if ($socialLinks->count())
        <div class="sticky top-10 h-0 w-full flex justify-end z-40">

            <ul class="w-14 h-fit flex flex-col p-2 bg-gray-50 rounded-lg gap-2 shadow-md">

                @foreach ($socialLinks as $social)
                    <li>
                        <a href="{{ $social->url }}" target="_blank" title="{{ $social->name }}"
                            class="flex items-center justify-center w-10 h-10 hover:scale-110 transition-transform duration-200">

                            @if (!empty($social->homepage_icon_class))
                                <i class="{{ $social->homepage_icon_class }} text-2xl text-gray-700"></i>
                            @elseif(!empty($social->homepage_icon))
                                <img src="{{ asset($social->homepage_icon) }}" alt="{{ $social->name }}"
                                    class="w-10 h-auto object-contain rounded-md">
                            @endif

                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    @endif
    {{-- SIDE NAV SOCIAL LINKS END HERE --}}

    {{-- Dynamic Section Content --}}
    <section class="w-full  m-auto">
        <div class="lg:w-[785px] m-auto my-3">
            <h2
                class="capitalize text-[20px] md:text-[30px] lg:text-[36px] 2xl:text-[39px] font-medium text-center dm_sans">
                {{ $HomepageText?->title }}</h2>
            <p class="text-sm mt-4 text-center px-10">{{ $HomepageText?->subtitle }}</p>
        </div>
        <div class="flex flex-wrap gap-5  p-8 z-20 m-auto md:w-[755px]  xl:w-[1250px] categorycard">
        </div>
    </section>

    <section class="container   mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <!-- Key Strength Section -->
            <div class="col-span-3 lg:col-span-1 flex flex-wrap">
                @if ($keyStrength)
                    <div class="md:h-[342px] lg:h-[440px] overflow-hidden relative">
                        <h3 class="text-md sm:text-2xl lg:text-4xl font-normal flex">
                            <img src="{{ asset('list-icon.png') }}" alt="" class="object-contain mr-2 w-7 mt-2">
                            Our Key Strength
                        </h3>
                        <p class="text-zinc-500 text-base mt-3">
                            {{ $keyStrength->paragraph }}
                        </p>
                    </div>

                    <a href="{{ route('page.show', $manufacturingPage->slug) }}" class="font-semibold text-blue-600">
                        Read More...
                    </a>
                    @if (!empty($keyStrengthImage?->image))
                        <div class="w-full aspect-square rounded-lg overflow-hidden my-6 mb-0">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $keyStrengthImage->image) }}" alt="Key Strength Image">
                        </div>
                    @endif
                @endif
            </div>

            <!-- Main Content Section -->
            <div class=" col-span-3 lg:col-span-2">
                @if ($companyProfile)

                    <div class="h-[330px] overflow-hidden">

                        <h3 class="text-3xl md:text-4xl font-normal">
                            <img src="{{ asset('list-icon.png') }}" class="mr-2 w-7 inline object-contain">

                            {{-- TITLE --}}
                            {{ \Illuminate\Support\Str::limit($companyProfile->title, 120) }}
                        </h3>

                        <div class="text-zinc-500 mb-5 mt-5 text-base">

                            {{-- SPLIT PARAGRAPHS --}}
                            @foreach (explode("\n", $companyProfile->content) as $index => $para)
                                @if (trim($para))
                                    <p class="{{ $index == 0 ? 'mb-4' : '' }}">
                                        {{ $para }}
                                    </p>
                                @endif

                                @if ($index == 2)
                                    {{-- 3 paragraphs show --}}
                                    @break
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <a href="/info/company-profile.html" class="font-semibold">Read More...</a>
                @endif

                <!-- Images Section -->
                {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8 mt-2">
                    <div class="overflow-hidden rounded-xl col-span-1 lg:col-span-2">
                        <img class="h-full w-full object-cover" src="{{ asset('article2.png') }}" alt="Article Image 1" />
                    </div>
                    <div class="overflow-hidden rounded-xl">
                        <img class="h-full w-full object-cover" src="{{ asset('article3.png') }}" alt="Article Image 2" />
                    </div>
                </div> --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8 mt-2">

                    @if ($businessImage)
                        <div class="overflow-hidden rounded-xl col-span-1 lg:col-span-2">
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $businessImage->image) }}"
                                alt="{{ $business->heading ?? 'International Business' }}">
                        </div>
                    @endif

                    @php
                        $secondImage = $internationalBusiness?->sections
                            ->flatMap(fn($section) => $section->layouts)
                            ->whereNotNull('image')
                            ->skip(1)
                            ->first();
                    @endphp

                    @if ($secondImage)
                        <div class="overflow-hidden rounded-xl">
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $secondImage->image) }}"
                                alt="International Business">
                        </div>
                    @endif

                </div>

                <!-- International Business Section -->
                @if ($internationalBusiness)
                    <h3 class="text-3xl md:text-4xl font-normal mb-4 flex">
                        <img src="{{ asset('list-icon.png') }}" alt=""
                            class="mr-2 w-6 h-6 self-center mt-1 object-contain">

                        International Business
                    </h3>

                    <p class="text-base text-zinc-500 h-28 overflow-hidden">
                        {{ $business?->paragraph }}
                    </p>

                    <a href="{{ route('page.show', $internationalBusiness->slug) }}" class="font-semibold text-blue-600">
                        Read More...
                    </a>
                @endif
            </div>
        </div>

    </section>
    {{-- Dynamic Section Content Ends Here --}}

    {{-- Dynamic Certificates --}}
    <section class="w-full  m-auto my-10">
        <div class="w-full h-[900px] md:h-[680px] xl:h-[441px] relative">
            <img src="{{ asset($certificateSection->home_banner) }}" alt="" srcset=""
                class="absolute z-10 w-full h-full ">
            <img src="{{ asset($certificateSection->home_banner) }}" alt="" srcset=""
                class="z-20 absolute w-full h-full opacity-95">
            <div class="z-30 absolute w-full h-full ">
                <h1
                    class="uppercase text-center font-bold text-[35px] text-transparent bg-gradient-to-b from-[#BE8303] via-[#F6E692] to-[#C28A0D] bg-clip-text my-6">
                    {{ $certificateSection->home_title }}
                </h1>

                @if ($pagesection->count() <= 6)

                    <!-- GRID VERSION -->
                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-6">
                        @foreach ($pagesection as $section)
                            <div class="flex flex-col items-center">
                                <div class="w-[170px] h-[170px] flex items-center justify-center">
                                    <img src="{{ asset($section->home_image) }}"
                                        class="max-w-full max-h-full object-contain transition-transform duration-300 hover:scale-105">
                                </div>

                                <p class="font-semibold text-[14px] md:text-[17px] text-center text-white mt-3">
                                    {{ $section->title }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- SWIPER VERSION -->
                    <div class="swiper certificateSwiper w-full py-6">
                        <div class="swiper-wrapper">

                            @foreach ($pagesection as $section)
                                <div class="swiper-slide flex flex-col items-center">
                                    <div class="w-[180px] h-[180px] flex items-center justify-center">
                                        <img src="{{ asset($section->home_image) }}"
                                            class="max-w-full max-h-full object-contain transition-transform duration-300 hover:scale-105">
                                    </div>

                                    <p class="font-semibold text-[14px] md:text-[17px] text-center text-white mt-3">
                                        {{ $section->title }}
                                    </p>
                                </div>
                            @endforeach

                        </div>
                    </div>

                @endif
            </div>
        </div>
    </section>
    {{-- Dynamic Certificates Ends Here --}}

    {{-- Dynamic News & Videos --}}
    <section class="w-full  m-auto">
        <div class="grid grid-cols-2 gap-3 px-7 lg:px-0">
            {{-- News --}}
            <div class="divide-y xl:ps-[100px] col-span-2 lg:col-span-1">
                <div class="flex justify-between">
                    <h1 class="text-[39px] font-medium pb-4 dm_sans">Latest News</h1>
                    <a href="{{ url('/news/latestnews.html') }}" class="px-4 text-blue">View All</a>
                </div>

                <div class="">

                    <div class="h-[450px] overflow-y-scroll scroll-container newscontent">

                        @forelse ($news as $item)
                            <div class="my-5 flex items-start space-x-4 border-b gap-4 pb-4">

                                {{-- IMAGE --}}
                                <a href="{{ route('news.show', $item->slug) }}"
                                    class="w-[100px] inline-block h-16 flex-shrink-0">

                                    <img src="{{ asset($item->image) }}" alt="News Image"
                                        class="w-full h-full object-cover rounded-lg shadow-md">
                                </a>

                                {{-- CONTENT --}}
                                <div class="flex flex-col justify-between w-full">

                                    {{-- DATE --}}
                                    <p class="text-xs text-gray-500 font-medium">
                                        {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                    </p>

                                    {{-- TITLE --}}
                                    <a href="{{ route('news.show', $item->slug) }}"
                                        class="h-11 overflow-hidden line-clamp-2">

                                        <h3 class="text-base font-semibold text-gray-800 leading-tight">
                                            {{ \Illuminate\Support\Str::limit($item->title, 100) }}
                                        </h3>

                                    </a>

                                </div>

                            </div>

                        @empty

                            <div class="text-center py-10 text-gray-500">
                                No news available
                            </div>
                        @endforelse

                    </div>

                </div>
            </div>
            {{-- Nes Ends here --}}
            {{-- Videos --}}
            <div class="relative col-span-2 lg:col-span-1 h-[601px] w-full">
                <div class="swiper w-full h-[500px] mySwiper mySwiper2">
                    <div class="swiper-wrapper">

                        @forelse($videos as $video)
                            @php
                                $youtubeId = null;
                                $isYoutube = false;
                                if ($video->video_type === 'embed') {
                                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|win/|user/[^/]+/|embed/)|youtu\.be/|youtube\.com/shorts/)([^"&?/\s]{11})%i', $video->video_path, $match);
                                    $youtubeId = $match[1] ?? null;
                                    $isYoutube = !empty($youtubeId);
                                }
                                $videoSrc = (str_starts_with($video->video_path ?? '', 'http://') || str_starts_with($video->video_path ?? '', 'https://'))
                                    ? $video->video_path
                                    : asset($video->video_path ?? '');
                                $thumbnailUrl = $video->thumbnail_path
                                    ? asset($video->thumbnail_path)
                                    : ($youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg" : null);
                            @endphp
                            <div class="swiper-slide w-[320px] rounded-lg relative overflow-hidden bg-black">

                                <!-- Thumbnail / Cover Image -->
                                @if($thumbnailUrl)
                                    <img src="{{ $thumbnailUrl }}" alt="{{ $video->description }}"
                                         class="absolute z-10 w-full h-full object-cover rounded-lg">
                                @elseif($video->video_type === 'file' && $video->video_path)
                                    <video class="absolute z-10 rounded-lg w-full h-full object-cover" preload="metadata">
                                        <source src="{{ $videoSrc }}" type="video/mp4">
                                    </video>
                                @else
                                    <div class="absolute z-10 w-full h-full bg-gray-800 flex items-center justify-center">
                                        <i class="ri-youtube-fill text-red-500 text-6xl"></i>
                                    </div>
                                @endif

                                <!-- Dark Overlay -->
                                <div class="absolute z-20 inset-0 bg-black/40 rounded-lg"></div>

                                <!-- Play Button — YouTube opens in new tab, file opens modal -->
                                <div class="absolute z-30 inset-0 flex justify-center items-center">
                                    @if($isYoutube)
                                        <a href="{{ $video->video_path }}" target="_blank" rel="noopener"
                                           class="w-[61px] h-[61px] border-2 rounded-full border-white bg-white/20 backdrop-blur-md shadow-lg flex items-center justify-center transition-transform hover:scale-110 hover:bg-red-600/70">
                                            <i class="ri-play-large-fill text-3xl text-white"></i>
                                        </a>
                                    @else
                                        <button onclick="openVideoModal('{{ $video->video_type ?? 'file' }}', '{{ $videoSrc }}')"
                                            class="w-[61px] h-[61px] border-2 rounded-full border-white bg-white/20 backdrop-blur-md shadow-lg flex items-center justify-center transition-transform hover:scale-110">
                                            <i class="ri-play-large-fill text-3xl text-white"></i>
                                        </button>
                                    @endif
                                </div>

                                <!-- YouTube badge -->
                                @if($isYoutube)
                                    <div class="absolute z-30 top-3 right-3">
                                        <span class="bg-red-600 text-white text-xs px-2 py-0.5 rounded-full flex items-center gap-1">
                                            <i class="ri-youtube-fill"></i> YouTube
                                        </span>
                                    </div>
                                @endif

                                <!-- Description -->
                                <div class="absolute z-40 w-full bottom-0 px-4 pb-3 pt-6 bg-gradient-to-t from-black/80 to-transparent">
                                    <p class="text-white text-sm line-clamp-2">
                                        {{ \Illuminate\Support\Str::limit($video->description, 100) }}
                                    </p>
                                </div>

                            </div>
                        @empty
                            <div class="swiper-slide flex items-center justify-center">
                                <p class="text-gray-400">No videos available</p>
                            </div>
                        @endforelse

                    </div>

                    <div class="swiper-pagination z-5 -bottom-10"></div>
                </div>
            </div>
            {{-- Videos Ends here --}}
        </div>
    </section>
    {{-- Dynamic News & Videos Ends Here --}}

    <section class="w-full  m-auto my-7 px-2 lg:px-4 hidden">
        <h5 class="text-xl sm:text-2xl md:text-3xl  lg:text-[40px] lg:leading-[52px] font-dmSans  max-w-[782px]">
            Comprehensive Solutions for Every Crop: From Cereals to Fruits and Vegetables</h5>
        <div class="w-full my-7 lg:my-10 bg-white">

            <div class="relative">
                <div class="swiper mySwiper blogcontainer">
                    <div class="swiper-wrapper h-[500px] blogcontent">

                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>

    </section>

    {{-- Dynamic Testimonals --}}
    <section class="w-full  m-auto my-7">
        @if ($setting)
            <h5 class="text-base font-semibold text-[#ED7D0B] text-center">{{ $setting->count ?? '3940+' }}</h5>
            <h4 class="text-[40px] font-medium text-center mb-7">{{ $setting->heading ?? "Don't just take our words" }}
            </h4>
        @endif
        <div class="relative">
            <div id="demotestimonial" class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                <div class="swiper-wrapper h-[350px] listtestimonial">

                    @forelse($testimonials as $item)
                        <div class="swiper-slide w-[400px] h-[300px]">

                            <div class="w-96 h-[300px] bg-zinc-100 rounded-xl p-5 m-auto">

                                {{-- TOP (IMAGE + NAME) --}}
                                <div class="flex space-x-3">

                                    <div class="w-[53px] h-[53px] rounded-full overflow-hidden">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                            class="w-full h-full object-cover rounded-full">
                                    </div>

                                    <div>
                                        <p class="text-base font-semibold">
                                            {{ $item->name }}
                                        </p>
                                        <p class="text-md font-semibold text-[#64748B]">
                                            {{ $item->occupation }}
                                        </p>
                                    </div>

                                </div>

                                {{-- MESSAGE --}}
                                <p class="font-semibold text-lg mt-[30px] h-28 overflow-hidden text-ellipsis line-clamp-4">
                                    {{ \Illuminate\Support\Str::limit($item->message, 200) }}
                                </p>

                                {{-- DATE --}}
                                <p class="font-medium text-[#64748B] mt-[35px]">
                                    {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                </p>

                            </div>

                        </div>

                    @empty

                        <div class="swiper-slide flex items-center justify-center">
                            <p>No testimonials available</p>
                        </div>
                    @endforelse

                </div>
                <div
                    class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                        aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet"
                        tabindex="0" role="button" aria-label="Go to slide 2"></span><span
                        class="swiper-pagination-bullet" tabindex="0" role="button"
                        aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0"
                        role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet"
                        tabindex="0" role="button" aria-label="Go to slide 5"></span>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span
                    class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span
                    class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span
                    class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span
                    class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span
                    class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>

        </div>
    </section>
    {{-- Dynamic Testimonals Ends Here --}}

    <!-- Responsive Flexbox for Stats -->
    @if ($statSection && $statSection->count())
        <section>
            <div class="max-w-[768px] mx-auto p-6">
                <!-- Optional Section Heading -->
                @if ($achievementSetting)
                    <div class="text-center px-5 mb-10">
                        <h6 class="text-3xl md:text-[39px] mb-6">
                            {{ $achievementSetting->section_heading ?? 'Our Achievements' }}
                        </h6>
                        <p class="text-[#667085] text-xl">
                            {{ $achievementSetting->section_description ?? 'Trusted by customers worldwide.' }}
                        </p>
                    </div>
                @endif
                <!-- Stats Items -->
                <div
                    class="flex flex-col md:flex-row justify-evenly items-center my-8 space-y-8 md:space-y-0 md:space-x-8">
                    @foreach ($statSection as $stat)
                        <div class="text-center">
                            <h6 class="text-[#ED7D0B] text-5xl md:text-6xl font-bold">
                                {{ $stat->value }}
                            </h6>
                            <span class="text-black text-base">
                                {{ $stat->title }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- Responsive FlexBox End Here --}}

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>
    @if ($activeModel)
        <div id="welcomeModal"
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50 modal-transition hidden">
            <div
                class="bg-white rounded-2xl shadow-2xl w-11/12 sm:w-3/4 lg:w-1/2 max-h-[90vh] overflow-y-auto relative mx-4">
                <!-- Close button X (top right) -->
                <button
                    class="close-modal-btn absolute z-50 top-4 right-4 text-black hover:text-gray-800 transition-colors"
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Content -->
                <img src="{{ asset($activeModel->banner) }}" alt="Welcome" class="mx-auto mb-4 w-full h-auto">

            </div>
        </div>
    @endif

    <!-- Video Player Modal -->
    <div id="videoPlayerModal" class="fixed inset-0 z-[110] flex items-center justify-center bg-black/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
        <div class="relative bg-black rounded-2xl border border-white/10 shadow-2xl w-11/12 max-w-4xl aspect-video overflow-hidden">
            <!-- Close Button -->
            <button onclick="closeVideoModal()" class="absolute top-4 right-4 z-50 bg-black/60 hover:bg-black text-white hover:text-red-500 p-2 rounded-full transition-colors border border-white/15" aria-label="Close modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Video Player (File Source) -->
            <video id="modalVideoPlayer" class="w-full h-full hidden" controls autoplay>
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Video Player (Embed Source) -->
            <iframe id="modalEmbedPlayer" class="w-full h-full hidden" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; webshare" allowfullscreen></iframe>
        </div>
    </div>

    @include('footer')

@endsection
@section('scripts')
    <script>
        function getYoutubeEmbedUrl(url) {
            let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            let match = url.match(regExp);
            if (match && match[2].length === 11) {
                return "https://www.youtube.com/embed/" + match[2] + "?autoplay=1&rel=0";
            }
            if (url.includes('/shorts/')) {
                let parts = url.split('/shorts/');
                if (parts[1]) {
                    let id = parts[1].split(/[?#&]/)[0];
                    return "https://www.youtube.com/embed/" + id + "?autoplay=1&rel=0";
                }
            }
            return url;
        }

        function getVimeoEmbedUrl(url) {
            let regExp = /vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/;
            let match = url.match(regExp);
            if (match) {
                return "https://player.vimeo.com/video/" + match[1] + "?autoplay=1";
            }
            return url;
        }

        function openVideoModal(type, src) {
            const modal = document.getElementById('videoPlayerModal');
            const videoPlayer = document.getElementById('modalVideoPlayer');
            const embedPlayer = document.getElementById('modalEmbedPlayer');

            // Hide both players initially
            videoPlayer.classList.add('hidden');
            embedPlayer.classList.add('hidden');
            videoPlayer.pause();
            videoPlayer.src = "";
            embedPlayer.src = "";

            if (type === 'file') {
                videoPlayer.src = src;
                videoPlayer.classList.remove('hidden');
                videoPlayer.load();
                videoPlayer.play().catch(err => console.log("Autoplay blocked or failed:", err));
            } else {
                let embedUrl = src;
                if (src.includes('youtube.com') || src.includes('youtu.be')) {
                    embedUrl = getYoutubeEmbedUrl(src);
                } else if (src.includes('vimeo.com')) {
                    embedUrl = getVimeoEmbedUrl(src);
                }
                embedPlayer.src = embedUrl;
                embedPlayer.classList.remove('hidden');
            }

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoPlayerModal');
            const videoPlayer = document.getElementById('modalVideoPlayer');
            const embedPlayer = document.getElementById('modalEmbedPlayer');

            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                videoPlayer.pause();
                videoPlayer.src = "";
                embedPlayer.src = "";
            }, 300);
        }

        // Close on clicking outside the player container
        document.getElementById('videoPlayerModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeVideoModal();
            }
        });

        // Close on pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('videoPlayerModal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeVideoModal();
                }
            }
        });
    </script>
    <script>
        @if ($pagesection->count() > 6)
            new Swiper(".certificateSwiper", {
                slidesPerView: 5,
                spaceBetween: 30,
                loop: true,
                speed: 2500,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                grabCursor: true
            });
        @endif
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchCategories();
        });

        function fetchCategories() {
            fetch("http://127.0.0.1:8000/api/categories")
                .then(response => response.json())
                .then(data => {
                    let categorycard = document.querySelector(".categorycard");
                    let dropdowns = document.querySelectorAll(".categorylist");
                    let homecategory = document.querySelector(".homecategory");
                    let catlinktabs = document.querySelectorAll('.allcatlinks');
                    let sidebar = document.querySelector(".subcategory-sidebar");

                    // Clear existing content
                    dropdowns.forEach(dropdown => (dropdown.innerHTML = ""));
                    if (categorycard) categorycard.innerHTML = "";
                    if (homecategory) homecategory.innerHTML = "";
                    if (sidebar) sidebar.innerHTML = "";

                    // Get category & subcategory ID from URL
                    let urlParams = new URLSearchParams(window.location.search);
                    let currentCategoryId = urlParams.get('catid') || urlParams.get(
                        'id'); // Support both ?catid= and ?id=
                    let currentSubcategoryId = urlParams.get('subcatid') || urlParams.get(
                        'subid'); // Support both ?subcatid= and ?subid=

                    let catlinksHTML = ""; // Stores category links
                    let subcategorySidebarHTML = ""; // Stores only the relevant subcategories for left sidebar

                    data.forEach(category => {
                        let categoryURL = `/${category.slug}.html`;
                        let isActiveCategory = currentCategoryId == category.category_id;

                        // Dropdown menu categories
                        let dropdownItem = `<li>
                        <a href="/${category.slug}.html" class="block px-4 py-2 hover:bg-orange-50 text-sm ${isActiveCategory ? 'bg-orange-500 text-white' : ''}">
                            ${category.category_name}
                        </a>
                        </li>`;

                        dropdowns.forEach(dropdown => (dropdown.innerHTML += dropdownItem));

                        // Subcategories for left sidebar (only if user is inside this category)
                        if (isActiveCategory && category.subcategories.length > 0) {
                            let selectedSubcategory = category.subcategories.find(sub => sub.subcategory_id ==
                                currentSubcategoryId);

                            if (selectedSubcategory) {
                                let subcategoryURL = `/${selectedSubcategory.slug}/${category.slug}`;
                                let isActiveSubcategory = currentSubcategoryId == selectedSubcategory
                                    .subcategory_id;

                                subcategorySidebarHTML += `<a href="${subcategoryURL}"
                                class="p-5 sm:p-6 md:p-6 cursor-pointer flex-shrink-0 group transform duration-300 block ${
                                    isActiveSubcategory ? 'bg-orange-500 text-white' : 'hover:bg-orange-500'
                                }">
                                <img class="m-auto w-10 h-10 object-contain  lg:w-14 duration-300 ${
                                    isActiveSubcategory ? 'invert brightness-0' : 'group-hover:invert group-hover:brightness-0'
                                }"
                                    src="http://127.0.0.1:8000${selectedSubcategory.subcat_icon}"
                                    alt="${selectedSubcategory.subcategory_name}"
                                    loading="lazy">
                                <div class="w-20  lg:w-28 whitespace-normal block">
                                    <h3 class="font-medium text-xs sm:text-sm md:text-base text-center ${
                                        isActiveSubcategory ? 'text-white' : 'group-hover:text-white'
                                    }">
                                    ${selectedSubcategory.subcategory_name}
                                    </h3>
                                </div>
                            </a>`;
                            }
                        }

                        // Category List with Hover Effects
                        catlinksHTML += `<a href="${categoryURL}"
                        class="cursor-pointer flex-shrink-0 group transform duration-300 w-32 h-32 sm:w-36 sm:h-36 md:w-40 md:h-40 flex justify-center items-center ${
                            isActiveCategory ? 'bg-orange-500 text-white' : 'hover:bg-orange-500'
                        }">
                        <div>
                            <img class="m-auto w-10 h-10   lg:w-14  duration-300 object-contain ${
                                isActiveCategory ? 'invert brightness-0' : 'group-hover:invert group-hover:brightness-0'
                            }"
                                src="http://127.0.0.1:8000${category.category_icon}"
                                alt="Main Product"
                                loading="lazy">
                            <div class="w-20  lg:w-28 whitespace-normal block">
                                <h3 class="font-medium text-xs sm:text-sm md:text-base text-center ${
                                    isActiveCategory ? 'text-white' : 'group-hover:text-white'
                                }">
                                    ${category.category_name}
                                </h3>
                            </div>
                        </div>
                        </a>`;

                        // Show only the selected subcategory in category links if user is on subcategory page
                        if (isActiveCategory && currentSubcategoryId) {
                            let selectedSubcategory = category.subcategories.find(sub => sub.subcategory_id ==
                                currentSubcategoryId);

                            if (selectedSubcategory) {
                                let subcategoryURL =
                                    `/${selectedSubcategory.slug}/${category.slug}`;
                                let isActiveSubcategory = currentSubcategoryId == selectedSubcategory
                                    .subcategory_id;

                                catlinksHTML += `<a href="${subcategoryURL}"
                                    class="p-5 sm:p-6 md:p-6 cursor-pointer flex-shrink-0 group transform duration-300 block ${
                                        isActiveSubcategory ? 'bg-orange-500 text-white' : 'hover:bg-orange-500'
                                    }">
                                    <img class="m-auto w-10 h-10   lg:w-14 duration-300 object-contain ${
                                        isActiveSubcategory ? 'invert brightness-0' : 'group-hover:invert  group-hover:brightness-0'
                                    }"
                                        src="http://127.0.0.1:8000${selectedSubcategory.subcat_icon}"
                                        alt="${selectedSubcategory.subcategory_name}"
                                        loading="lazy">
                                    <div class="w-20  lg:w-28 whitespace-normal block">
                                        <h3 class="font-medium text-xs sm:text-sm md:text-base text-center ${
                                            isActiveSubcategory ? 'text-white' : 'group-hover:text-white'
                                        }">
                                        ${selectedSubcategory.subcategory_name}
                                        </h3>
                                    </div>
                                    </a>`;
                            }
                        }


                        // Category Card
                        if (categorycard) {
                            let col = `<article class="bg-[#FBF6EE] p-6 rounded-xl max-w-full relative w-[320px] lg:w-[380px] h-[400px] lg:h-[390px]">
                        <div class="h-48 lg-[300px] w-full rounded-xl mb-2 overflow-hidden">
                            <a href="${categoryURL}">
                                <img class="h-[300px] w-full object-cover" src="http://127.0.0.1:8000${category.category_image}" alt="${category.category_name}" />
                            </a>
                        </div>
                        <h3 class="text-2xl font-normal capitalize mb-2">${category.category_name}</h3>
                        <div class="h-10 overflow-hidden">
                            <p class="text-zinc-500 font-normal text-sm mb-5">
                                ${category.category_short_description}
                            </p>
                        </div>
                        <div class="relative group mt-5">
                            <button class="flex text-[#ED7D0B] justify-between items-center py-[14px] px-4 cursor-pointer bg-orange-100 rounded-lg w-[275px] lg:w-[335px]">
                                <span class="font-medium text-[14px]">Select Option</span>
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul class="absolute hidden group-hover:block bg-white text-black mt-0 rounded-lg shadow-lg w-full z-50">
                                ${category.subcategories.map(sub =>
                                    `<li>
                                                                        <a href="/${category.slug}/${sub.slug}"
                                                                        class="block px-4 py-2 hover:bg-orange-50 ${currentSubcategoryId == sub.subcategory_id ? 'bg-orange-500 text-white' : ''}">
                                                                        ${sub.subcategory_name}
                                                                        </a>
                                                                    </li>`).join("")}
                                    </ul>
                                </div>
                            </article>`;

                            categorycard.innerHTML += col;
                        }
                    });

                    if (catlinktabs.length) catlinktabs.forEach(tab => (tab.innerHTML = catlinksHTML));
                    if (sidebar) sidebar.innerHTML = subcategorySidebarHTML;
                })
                .catch(error => console.error("Error fetching categories:", error));
        }
        // Fetch category by ID when the document is ready
        $(document).ready(function() {
            let categoryId = getCategoryIdFromUrl();
            let searchQuery = "";
            let sortOrder = "asc"; // Default sorting order
            if (!categoryId) {
                $("#category-container").html("<p class='text-red-500'>Category ID not found in URL!</p>");
                return;
            }
            // Fetch initial category details
            fetchCategoryDetails(categoryId, searchQuery, sortOrder);
            // **Search Event Listener**
            $("#searchInput").on("input", function() {
                searchQuery = $(this).val().trim(); // Get search input value
                fetchCategoryDetails(categoryId, searchQuery, sortOrder);
            });

            // **Sort Order Change Event**
            $("#sortOrder").on("change", function() {
                sortOrder = $(this).val(); // Get selected sorting order
                fetchCategoryDetails(categoryId, searchQuery, sortOrder);
            });
        });

        // **Fetch Category Details with Search & Sort**
        function fetchCategoryDetails(categoryId, searchQuery = "", sortOrder = "asc") {
            $.ajax({
                url: `http://127.0.0.1:8000/api/category/${categoryId}`,
                type: "GET",
                data: {
                    search: searchQuery,
                    sort: sortOrder
                }, // Pass search & sort params
                dataType: "json",
                success: function(data) {
                    console.log("Fetched Data:", data);

                    if (!data || $.isEmptyObject(data)) {
                        $("#category-container").html("<p class='text-red-500'>No data found!</p>");
                        return;
                    }

                    // **Category Data**
                    let categoryHTML = `
                <div class="flex max-sm:flex-wrap justify-center bg-gray-200">
                    <div class="w-[50%] max-sm:w-full mt-5 md:mt-20 p-5 flex justify-center">
                        <div class="lg:w-[400px] xl:w-[500px]">
                            <h1 class="text-3xl max-sm:text-2xl font-bold mb-5">${data.category_name}</h1>
                            <p class="mb-3 max-sm:text-xs">${data.discription}</p>
                            <a class="font-bold text-blue-500 hover:underline" href="/category/${data.category_id}">Learn More</a>
                        </div>
                    </div>
                    <div class="w-[50%] max-xl:h-[350px] max-sm:w-full">
                        <img class="h-full w-full object-cover" src="http://127.0.0.1:8000${data.category_image}" alt="${data.category_name}">
                    </div>
                </div>
            `;
                    let linkicon = `<a href="/view/category.html?id=${data.category_id}" class="p-10 max-xl:p-2 cursor-pointer flex-shrink-0 group transform duration-300 block bg-orange-500">
                    <img class="m-auto max-xl:w-10 max-xl:h-[40px] duration-300 invert brightness-0"
                         src="http://127.0.0.1:8000${data.category_icon}"
                         alt="Main Product"
                         loading="lazy" id="caticon">
                    <h3 class="font-medium text-center max-sm:text-xs duration-300 text-white">
                    ${data.category_name}
                    </h3>
                </a>`;
                    $(".categorydiscription").html(categoryHTML);
                    $("#categorylink").html(linkicon);
                    // **Subcategories**
                    let subcategoriesHTML = "";
                    if (data.subcategories && data.subcategories.length > 0) {
                        data.subcategories.forEach(subcat => {
                            subcategoriesHTML += `
                        <div class="product-data max-w-96 p-4 bg-gray-100 rounded-md shadow">
                            <div class="relative w-full h-[200px] bg-cover bg-center mb-3 rounded-2xl"
                                 style="background-image: url('http://127.0.0.1:8000${subcat.subcat_img}');">
                                <div class="absolute top-0 right-0 p-4 bg-white/50 rounded-full">
                                    <a href="/subcategory/${subcat.subcat_id}">

                                    </a>
                                </div>
                            </div>
                            <h2 class="text-2xl font-medium px-2 pb-2 h-16">${subcat.subcat_name}</h2>
                            <p class="px-2 pb-4 h-[134px] overflow-hidden">${subcat.subcat_short_discription}</p>
                            <a href="/view/product-list.html?id=${data.category_id}&subid=${subcat.subcat_id}" class="flex items-center justify-between p-2 bg-orange-500 text-white rounded-lg">
                                <h3 class="pl-2 font-medium">${subcat.product_count}+ Products</h3>
                            </a>
                        </div>
                    `;
                        });
                    } else {
                        subcategoriesHTML = "<p class='text-gray-500'>No subcategories found.</p>";
                    }

                    $(".subcategory-list").html(subcategoriesHTML);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", xhr, status, error);
                    $("#category-container").html(`
                <p class='text-red-500'>Failed to load data. Please try again later.</p>
            `);
                }
            });
        }

        // **Extract Category ID from URL**
        $(document).ready(function() {
            let subcatId = getCategoryIdFromUrl();
            let searchsubcat = "";
            let sortOrderSubcat = "asc";

            fetchsubcategoryDetails(subcatId, searchsubcat, sortOrderSubcat);
            $("#seacrhSubcat").on('input', function() {
                searchsubcat = $(this).val().trim();
                fetchsubcategoryDetails(subcatId, searchsubcat, sortOrderSubcat);
            });
            $("#sortOrderSubcat").on('change', function() {
                sortOrderSubcat = $(this).val();
                fetchsubcategoryDetails(subcatId, searchsubcat, sortOrderSubcat);
            });

        });

        function fetchsubcategoryDetails(searchsubcat = "", sortOrderSubcat = "asc") {
            // Get the subcategory ID from the URL dynamically
            let urlParams = new URLSearchParams(window.location.search);
            let subcatId = urlParams.get("subid"); // Extract `subid` from URL

            if (!subcatId) {
                console.error("Subcategory ID (subid) not found in URL");
                $("#subcate-con").html("<p class='text-red-500'>Subcategory not found.</p>");
                return;
            }

            $.ajax({
                url: `http://127.0.0.1:8000/api/subcatgory/${subcatId}`,
                type: "GET",
                data: {
                    search: searchsubcat,
                    sort: sortOrderSubcat
                }, // Pass search & sort params
                dataType: "json",
                success: function(data) {
                    console.log("Fetched Data:", data);

                    if (!data || $.isEmptyObject(data)) {
                        $("#subcate-con").html("<p class='text-red-500'>No data found!</p>");
                        return;
                    }

                    // **Category & Subcategory Links**
                    let subcategoryURL =
                        `/${selectedSubcategory.slug}/${category.slug}`;
                    let categoryURL = `/${category.slug}.html`;
                    let subcatlink = `
                <a href="${subcategoryURL}" class="p-10 max-xl:p-2 cursor-pointer flex-shrink-0 group transform duration-300 block bg-orange-500">
                    <img class="m-auto max-xl:w-10 max-xl:h-[40px] duration-300 invert brightness-0"
                        src="http://127.0.0.1:8000${data.subcat_icon}"
                        alt="${data.subcat_name}"
                        loading="lazy">
                    <h3 class="font-medium text-center max-sm:text-xs duration-300 text-white">
                        ${data.subcat_name}
                    </h3>
                </a>`;

                    let catlink = `
                <a href="${categoryURL}" class="p-10 max-xl:p-2 cursor-pointer flex-shrink-0 group transform duration-300 block bg-orange-500">
                    <img class="m-auto max-xl:w-10 max-xl:h-[40px] duration-300 invert brightness-0"
                        src="http://127.0.0.1:8000${data.category_icon}"
                        alt="${data.category_name}"
                        loading="lazy">
                    <h3 class="font-medium text-center max-sm:text-xs duration-300 text-white">
                        ${data.category_name}
                    </h3>
                </a>`;

                    // Update HTML elements
                    $("#catlink").html(catlink);
                    $("#subcatelink").html(subcatlink);

                    // **Subcategory Details**
                    let subcateHTML = `
                <div class="flex max-sm:flex-wrap justify-center bg-gray-200">
                    <div class="w-[50%] max-sm:w-full mt-20 p-5 flex justify-center">
                        <div class="lg:w-[400px] xl:w-[500px]">
                            <h1 class="text-3xl max-sm:text-2xl font-bold mb-5">${data.subcat_name}</h1>
                            <p class="mb-3 max-sm:text-xs">${data.subcat_discription}</p>
                            <a class="font-bold text-blue-500 hover:underline" href="${subcategoryURL}">Learn More</a>
                        </div>
                    </div>
                    <div class="w-[50%] max-xl:h-[350px] max-sm:w-full">
                        <img class="h-full w-full object-cover" src="http://127.0.0.1:8000${data.subcat_img}" alt="${data.subcat_name}">
                    </div>
                </div>`;

                    $(".subcate-con").html(subcateHTML);

                    // **Product List**
                    let productHTML = "";
                    if (data.products && data.products.length > 0) {
                        data.products.forEach(product => {
                            productHTML += `
                        <a href="/${data.category_slug}/${data.subcategory_slug}/${product.slug}"
                            class="ps-4 rounded-xl bg-gray-200 w-[295px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-2xl justify-between duration-300 items-center relative">
                            <h5 class="group-hover:font-semibold duration-300">${product.product_name}</h5>
                            <div class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                                <i class="ri-arrow-right-up-line"></i>
                            </div>
                            <div class="w-48 h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                                <img src="http://127.0.0.1:8000${product.product_image}"
                                    alt="${product.product_name}"
                                    class="w-48 h-44 p-2 object-cover">
                                <h6 class="text-sm font-inter font-medium text-center">${product.product_name}</h6>
                            </div>
                        </a>`;
                        });
                    } else {
                        productHTML = "<p class='text-gray-500'>No products found in this subcategory.</p>";
                    }

                    $(".product-list").html(productHTML);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", xhr, status, error);
                    $("#subcate-con").html(`
                <p class='text-red-500'>Failed to load data. Please try again later.</p>
            `);
                }
            });
        }

        // Call function when page loads
        $(document).ready(function() {
            fetchsubcategoryDetails();
        });


        $(document).ready(function() {
            let productid = getCategoryIdFromUrl();
            // alert(productid); // Alert to help debug the id value
            fetchproductDetails(productid);
        });

        function fetchproductDetails() {
            // ✅ Extract `productid` from URL
            let urlParams = new URLSearchParams(window.location.search);
            let productid = urlParams.get("productid");
            let categoryId = urlParams.get("catid");
            let subcategoryId = urlParams.get("subcatid");

            if (!productid) {
                console.error("Product ID not found in URL");
                $("#product-container").html("<p class='text-red-500'>Product not found.</p>");
                return;
            }

            // ✅ Fetch product data
            $.ajax({
                url: `http://127.0.0.1:8000/api/product/${productid}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log("API Response:", data); // Debugging

                    let product = data.product || data; // Handle API variations

                    // ✅ Populate product details safely
                    $("#product-id").html(`Product ID: ${product?.id || "N/A"}`);
                    $(".product-name").html(product?.title || "No Title Available");
                    $(".product-description").html(product?.composition || "No description available");
                    $(".subcatid").html(product?.subcategory_id || "N/A");
                    $(".model_of_action").html(product?.model_of_action || "N/A");
                    $(".subcategoryName").html(data?.subcategory_name || "N/A");

                    // ✅ Set product image with default fallback
                    let productImage = product?.image ? `http://127.0.0.1:8000${product.image}` :
                        "/assets/no-image.png";
                    $(".product-image").attr("src", productImage);

                    // ✅ Category & Subcategory Links
                    let catproduct = `
                <a href="/view/category.html?id=${product.category_id}" class="p-10 max-xl:p-2 cursor-pointer block bg-orange-500 flex-shrink-0">
                    <img class="m-auto max-xl:w-10 max-xl:h-[40px] duration-300 invert brightness-0"
                         src="http://127.0.0.1:8000${data.categoryIcon?.startsWith('/') ? data.categoryIcon : '/' + data.categoryIcon}"
                         alt="${data.category_name}" loading="lazy">
                    <h3 class="font-medium max-sm:text-xs text-center text-white">${data.category_name}</h3>
                </a>`;

                    let subcatproduct = `
                <a href="/view/product-list.html?id=${product.subcategory_id}" class="p-10 max-xl:p-2 cursor-pointer block bg-orange-500 flex-shrink-0">
                    <img class="m-auto max-xl:w-10 max-xl:h-[40px] duration-300 invert brightness-0"
                         src="http://127.0.0.1:8000${data.subcategoryIcon?.startsWith('/') ? data.subcategoryIcon : '/' + data.subcategoryIcon}"
                         alt="${data.subcategory_name}" loading="lazy">
                    <h3 class="font-medium max-sm:text-xs text-center text-white">${data.subcategory_name}</h3>
                </a>`;

                    $('#catproduct').html(catproduct);
                    $('#subcatproduct').html(subcatproduct);
                    $(".product-features").html(product?.features || "No features available");
                    $(".useage").html(product?.usage || "No usage information available");

                    // ✅ Handle Packing Sizes safely
                    let packingSizes = [];
                    try {
                        packingSizes = Array.isArray(product.packing) ? product.packing : JSON.parse(product
                            .packing || "[]");
                    } catch (error) {
                        console.error("Error parsing packing sizes:", error);
                    }

                    let packingHtml = packingSizes.map(size =>
                        `<li class="px-3 py-1 rounded-md bg-orange-200 text-orange-500 text-sm font-inter font-medium">${size}</li>`
                    ).join("");
                    $(".package").html(packingHtml);

                    // ✅ Display Product Usage Table (if available)
                    if (data.product_usage?.length > 0) {
                        try {
                            let jsonData = JSON.parse(data.product_usage[0]?.attribute_value || "{}");

                            function generateTable(data) {
                                let table = `<table class="w-full border-collapse border border-gray-300 font-inter text-base font-medium">
                                        <thead>
                                            <tr class="bg-orange-400 text-white rounded-t-md">`;
                                Object.keys(data).forEach(key => {
                                    table += `<th class="border border-gray-300 px-4 py-2">${key}</th>`;
                                });
                                table += `</tr></thead><tbody>`;

                                let maxLength = Math.max(...Object.values(data).map(arr => arr.length));

                                for (let i = 0; i < maxLength; i++) {
                                    table += `<tr class="bg-white hover:bg-gray-100">`;
                                    Object.values(data).forEach(arr => {
                                        table +=
                                            `<td class="border border-gray-300 px-4 py-3">${arr[i] || '-'}</td>`;
                                    });
                                    table += `</tr>`;
                                }

                                table += `</tbody></table>`;
                                return table;
                            }
                            $("#table-container").html(generateTable(jsonData));
                        } catch (error) {
                            console.error("Error parsing product usage data:", error);
                        }
                    }

                    // ✅ Display Related Products
                    if (Array.isArray(data.related_products) && data.related_products.length > 0) {
                        let relatedHtml = '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">';
                        data.related_products.forEach(related => {
                            relatedHtml += `
                        <a href="/view/product.html?productid=${related.id}"
                           class="ps-4 rounded-xl bg-gray-200 w-[295px] h-[65px] flex font-inter font-normal group hover:bg-orange-200 text-2xl justify-between duration-300 items-center relative">
                            <h5 class="group-hover:font-semibold duration-300">${related.name}</h5>
                            <div class="hidden h-[64px] w-[64px] rounded-r-xl bg-orange-500 group-hover:flex items-center justify-center text-white duration-300">
                                <i class="ri-arrow-right-up-line"></i>
                            </div>
                            <div class="w-48 h-[200px] absolute z-50 carddiv hidden group-hover:block bg-white rounded-md shadow-md -right-52 -top-7">
                                <img src="http://127.0.0.1:8000${related.img}" alt="${related.name}" class="w-48 h-44 p-2 object-cover">
                                <h6 class="text-sm font-inter font-medium text-center">${related.name}</h6>
                            </div>
                        </a>`;
                        });
                        relatedHtml += '</div>';
                        $("#related-products-container").html(relatedHtml);
                    } else {
                        $("#related-products-container").html(
                            "<p class='text-gray-500'>No related products found.</p>");
                    }

                    // ✅ Display Product Usage (if available)
                    if (data.product_usage?.length > 0) {
                        let usageHtml = data.product_usage.map(usage =>
                            `<div class="usage-item">Usage: ${usage.attribute_value}</div>`
                        ).join("");
                        $("#product-usage").html(usageHtml);
                    } else {
                        $("#product-usage").html(
                            "<p class='text-gray-500'>No usage information available.</p>");
                    }

                },

                error: function(xhr, status, error) {
                    console.error("Error fetching product details:", error);
                    $("#product-container").html(
                        "<p class='text-red-500'>Failed to load product details. Please try again later.</p>"
                    );
                }
            });
        }


        // ✅ Run Function on Page Load
        $(document).ready(function() {
            fetchproductDetails();
        });


        function getproductIdFromUrl() {
            console.log("Current URL:", window.location.href);
            console.log("Search Params:", window.location.search);


            if (!window.location.search) {
                console.error("No query string found in the URL.");
                return null;
            }

            const params = new URLSearchParams(window.location.search);
            const id = params.get('id');
            console.log("Extracted ID:", id);
            return id;
        }

        function getCategoryIdFromUrl() {
            const params = new URLSearchParams(window.location.search);
            return params.get('id');
        }

        function goBack() {
            window.history.back();
        }
    </script>
    <!-- Modal Popup JavaScript -->
    <script>
        (function() {
            const modal = document.getElementById('welcomeModal');
            const closeButtons = document.querySelectorAll('.close-modal-btn');
            let isModalOpen = false;

            function openModal() {
                if (!modal) return;
                modal.classList.remove('hidden');
                document.body.classList.add('modal-open');
                isModalOpen = true;
            }

            function closeModal() {
                if (!modal) return;
                modal.classList.add('hidden');
                document.body.classList.remove('modal-open');
                isModalOpen = false;
            }

            // Close modal when clicking on backdrop (but not on modal content)
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
            }

            // Close modal when Escape key is pressed
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isModalOpen) {
                    closeModal();
                }
            });

            // Add click event to all close buttons (both X and button)
            closeButtons.forEach(btn => {
                btn.addEventListener('click', closeModal);
            });

            // Show modal when page is fully loaded (ensure DOM and assets ready)
            window.addEventListener('load', function() {
                // Small delay to avoid interference with any other initial scripts
                setTimeout(openModal, 300);
            });
        })();
    </script>
@endsection
