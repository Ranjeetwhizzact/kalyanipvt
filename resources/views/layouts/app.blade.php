<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        referrerpolicy="no-referrer" />
    <title class="product-name">@yield('title','Home')</title>
    <link rel="icon" type="image/png" href="{{ asset('fabicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Sawarabi+Mincho&display=swap"
        rel="stylesheet">
    <style>
        p {
            font-family: "Inter", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "DM Sans";
        }

        .accordion-content {
            transition: max-height 0.3s ease-out;
            max-height: 0;
            overflow: hidden;
        }

        .accordion-content.open {
            max-height: 500px;
        }

        #preloader {
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        footer.custom-footer {
            background-image: url('{{ asset("footerbanner.webp") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    @yield('styles')
</head>

<body class="max-w-[1920px] m-auto block">
    <div id="preloader" class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50">
        <div class="w-12 h-12 border-4 border-orange-500 border-t-transparent rounded-full animate-spin mb-4"></div>
        <p class="text-gray-700 text-lg font-semibold">Loading...</p>
    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Moved chat widget script to after DOM is ready and with proper error handling -->
    
    <script>
        // DOM Ready function
        $(document).ready(function () {
            // Hide preloader
            $('#preloader').fadeOut();
            
            // Initialize scrolling functionality with error handling
            initializeAutoScroll();
            
            // Initialize chat widget (uncomment when needed)
            // initializeChatWidget();
        });

        function initializeAutoScroll() {
            let $scrollContainer = $(".scroll-container");
            
            // Check if scroll container exists
            if (!$scrollContainer.length) {
                console.warn('Scroll container not found');
                return;
            }
            
            let scrollSpeed = 50;
            let scrollInterval;
            let isPaused = false;

            function startScrolling() {
                // Clear any existing interval first
                if (scrollInterval) {
                    clearInterval(scrollInterval);
                }
                
                // Check if element has content
                if ($scrollContainer[0].scrollHeight <= 0) {
                    console.warn('Scroll container has no content');
                    return;
                }

                scrollInterval = setInterval(function () {
                    if (!isPaused && $scrollContainer.length) {
                        try {
                            let maxScroll = $scrollContainer[0].scrollHeight - $scrollContainer.height();
                            let currentScroll = $scrollContainer.scrollTop();
                            
                            if (currentScroll >= maxScroll) {
                                $scrollContainer.scrollTop(0);
                            } else {
                                $scrollContainer.scrollTop(currentScroll + 1);
                            }
                        } catch (error) {
                            console.error('Scroll error:', error);
                            clearInterval(scrollInterval);
                        }
                    }
                }, scrollSpeed);
            }

            startScrolling();

            // Pause scrolling on hover
            $scrollContainer.hover(
                function () {
                    isPaused = true;
                },
                function () {
                    isPaused = false;
                }
            );
            
            // Clean up on page unload
            $(window).on('beforeunload', function() {
                if (scrollInterval) {
                    clearInterval(scrollInterval);
                }
            });
        }

        function initializeChatWidget() {
            // Only initialize if the widget script is loaded
            if (typeof initChatWidget === 'function') {
                var helloConfig = {
                    widgetToken: "d1c73",
                    hide_launcher: false,
                    show_close_button: true,
                    launch_widget: false,
                    show_send_button: true,
                };
                initChatWidget(helloConfig, 500);
            }
        }
    </script>

    <!-- Load external scripts after DOM is ready -->
    <script>
        // Load chat widget after a delay to ensure DOM is ready
        setTimeout(function() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://control.msg91.com/app/assets/widget/chat-widget.js';
            script.onload = function() {
                if (typeof initChatWidget === 'function') {
                    initializeChatWidget();
                }
            };
            document.head.appendChild(script);
        }, 1000);
    </script>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/api.js') }}"></script>
    
    <!-- Only include live-server script in development -->
    @if(env('APP_ENV') === 'local')
    <script>
        // Live Server WebSocket connection
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                
                // Correct WebSocket URL - use current page's URL
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var path = window.location.pathname.split('/').pop() || '';
                var address = protocol + window.location.host + '/ws';
                
                try {
                    var socket = new WebSocket(address);
                    socket.onmessage = function (msg) {
                        if (msg.data == 'reload') window.location.reload();
                        else if (msg.data == 'refreshcss') refreshCSS();
                    };
                    
                    if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                        console.log('Live reload enabled.');
                        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                    }
                } catch (error) {
                    console.log('Live reload not available:', error.message);
                }
            })();
        }
    </script>
    @endif
    
    @yield('scripts')
</body>

</html>