<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Home Page Content</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ asset('backend/admin/Content/cleditor/jquery.cleditor.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/admin/Content/Site.css') }}" rel="stylesheet" type="text/css" />
    <style>
        input:checked~div.sidebar {
            width: 50px;
        }

        input:checked~div>div>div img {
            display: none;
        }

        input:checked~div.sidebar~div.main-content {
            margin-left: 50px;
        }

        .sidebar {
            transition: width 0.3s ease;
        }

        .main-content {
            transition: margin-left 0.3s ease;
        }

        @media (max-width: 640px) {
            .sidebar span {
                display: none;
            }
        }

        @media (min-width: 640px) {
            .sidebar span {
                display: inline;
            }
        }
    </style>

</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

            <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

                <h2 class="text-2xl font-semibold mb-6">Edit Social Media Link</h2>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.social.update', encrypt($social->id)) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    <!-- Platform Name -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Platform Name</label>
                        <input type="text" name="name" value="{{ old('name', $social->name) }}"
                            class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror">

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profile URL -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Profile URL</label>
                        <input type="url" name="url" value="{{ old('url', $social->url) }}"
                            class="w-full px-4 py-2 border rounded-lg @error('url') border-red-500 @enderror">

                        @error('url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Header Icon Section -->
                    @php $hasUploadedIcon = !empty($social->icon) && empty($social->icon_class); @endphp
                    <div class="mb-6 border rounded-lg p-4 bg-gray-50">
                        <label class="block text-sm font-semibold mb-3 text-blue-700">Header Icon <span
                                class="text-gray-400 font-normal text-xs">(shown in top black bar)</span></label>

                        <!-- Tab toggle -->
                        <div class="flex border rounded-lg overflow-hidden mb-4 w-fit">
                            <button type="button" id="tab-remix" onclick="switchTab('remix')"
                                class="px-4 py-2 text-sm font-medium {{ $hasUploadedIcon ? 'bg-white text-gray-700' : 'bg-blue-500 text-white' }} transition">
                                Remix Icon
                            </button>
                            <button type="button" id="tab-upload" onclick="switchTab('upload')"
                                class="px-4 py-2 text-sm font-medium {{ $hasUploadedIcon ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} transition">
                                Upload Custom Icon
                            </button>
                        </div>

                        <!-- Remix Icon Panel -->
                        <div id="panel-remix" class="{{ $hasUploadedIcon ? 'hidden' : '' }}">
                            <select name="icon_class" id="icon_class_select" class="w-full px-4 py-2 border rounded-lg">
                                <option value="">-- Select Icon --</option>
                                <option value="ri-facebook-circle-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-facebook-circle-fill' ? 'selected' : '' }}>
                                    Facebook</option>
                                <option value="ri-instagram-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-instagram-fill' ? 'selected' : '' }}>
                                    Instagram</option>
                                <option value="ri-linkedin-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-linkedin-fill' ? 'selected' : '' }}>
                                    LinkedIn</option>
                                <option value="ri-youtube-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-youtube-fill' ? 'selected' : '' }}>
                                    YouTube</option>
                                <option value="ri-twitter-x-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-twitter-x-fill' ? 'selected' : '' }}>
                                    Twitter / X</option>
                                <option value="ri-whatsapp-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-whatsapp-fill' ? 'selected' : '' }}>
                                    WhatsApp</option>
                                <option value="ri-telegram-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-telegram-fill' ? 'selected' : '' }}>
                                    Telegram</option>
                                <option value="ri-pinterest-fill"
                                    {{ old('icon_class', $social->icon_class) == 'ri-pinterest-fill' ? 'selected' : '' }}>
                                    Pinterest</option>
                                <option value="ri-mail-line"
                                    {{ old('icon_class', $social->icon_class) == 'ri-mail-line' ? 'selected' : '' }}>
                                    Mail</option>
                            </select>
                            <div class="mt-3 flex items-center gap-3">
                                <span class="text-sm text-gray-500">Preview:</span>
                                <i id="icon_preview_class"
                                    class="{{ old('icon_class', $social->icon_class) }} text-2xl text-gray-700"></i>
                            </div>
                        </div>

                        <!-- Upload Custom Icon Panel -->
                        <div id="panel-upload" class="{{ $hasUploadedIcon ? '' : 'hidden' }}">
                            @if ($social->icon)
                                <div class="mb-3 flex items-center gap-3">
                                    <span class="text-sm text-gray-500">Current:</span>
                                    <img src="{{ asset($social->icon) }}"
                                        class="w-10 h-10 object-contain rounded border">
                                </div>
                            @endif
                            <input type="file" name="icon" id="icon" class="w-full border p-2 rounded"
                                accept="image/*">
                            <div
                                class="w-20 h-20 border mt-3 rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                                <img id="icon_img_preview" class="hidden max-h-full max-w-full object-contain">
                            </div>
                            <p class="text-xs text-gray-400 mt-1">If you upload a custom icon, the Remix Icon selection
                                will be ignored.</p>
                        </div>
                    </div>

                    <!-- Homepage Icon Section -->
                    @php $hasUploadedHpIcon = !empty($social->homepage_icon) && empty($social->homepage_icon_class); @endphp
                    <div class="mb-6 border rounded-lg p-4 bg-orange-50">
                        <label class="block text-sm font-semibold mb-3 text-orange-700">Homepage Icon <span
                                class="text-gray-400 font-normal text-xs">(shown in sticky side panel on
                                homepage)</span></label>

                        <!-- Tab toggle -->
                        <div class="flex border rounded-lg overflow-hidden mb-4 w-fit">
                            <button type="button" id="hp-tab-remix" onclick="switchHpTab('remix')"
                                class="px-4 py-2 text-sm font-medium {{ $hasUploadedHpIcon ? 'bg-white text-gray-700' : 'bg-orange-500 text-white' }} transition">
                                Remix Icon
                            </button>
                            <button type="button" id="hp-tab-upload" onclick="switchHpTab('upload')"
                                class="px-4 py-2 text-sm font-medium {{ $hasUploadedHpIcon ? 'bg-orange-500 text-white' : 'bg-white text-gray-700' }} transition">
                                Upload Custom Icon
                            </button>
                        </div>

                        <!-- Remix Icon Panel -->
                        <div id="hp-panel-remix" class="{{ $hasUploadedHpIcon ? 'hidden' : '' }}">
                            <select name="homepage_icon_class" id="hp_icon_class_select"
                                class="w-full px-4 py-2 border rounded-lg">
                                <option value="">-- Select Icon --</option>
                                <option value="ri-facebook-circle-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-facebook-circle-fill' ? 'selected' : '' }}>
                                    Facebook</option>
                                <option value="ri-instagram-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-instagram-fill' ? 'selected' : '' }}>
                                    Instagram</option>
                                <option value="ri-linkedin-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-linkedin-fill' ? 'selected' : '' }}>
                                    LinkedIn</option>
                                <option value="ri-youtube-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-youtube-fill' ? 'selected' : '' }}>
                                    YouTube</option>
                                <option value="ri-twitter-x-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-twitter-x-fill' ? 'selected' : '' }}>
                                    Twitter / X</option>
                                <option value="ri-whatsapp-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-whatsapp-fill' ? 'selected' : '' }}>
                                    WhatsApp</option>
                                <option value="ri-telegram-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-telegram-fill' ? 'selected' : '' }}>
                                    Telegram</option>
                                <option value="ri-pinterest-fill"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-pinterest-fill' ? 'selected' : '' }}>
                                    Pinterest</option>
                                <option value="ri-mail-line"
                                    {{ old('homepage_icon_class', $social->homepage_icon_class) == 'ri-mail-line' ? 'selected' : '' }}>
                                    Mail</option>
                            </select>
                            <div class="mt-3 flex items-center gap-3">
                                <span class="text-sm text-gray-500">Preview:</span>
                                <i id="hp_icon_preview_class"
                                    class="{{ old('homepage_icon_class', $social->homepage_icon_class) }} text-2xl text-gray-700"></i>
                            </div>
                        </div>

                        <!-- Upload Custom Icon Panel -->
                        <div id="hp-panel-upload" class="{{ $hasUploadedHpIcon ? '' : 'hidden' }}">
                            @if ($social->homepage_icon)
                                <div class="mb-3 flex items-center gap-3">
                                    <span class="text-sm text-gray-500">Current:</span>
                                    <img src="{{ asset($social->homepage_icon) }}"
                                        class="w-10 h-10 object-contain rounded border">
                                </div>
                            @endif
                            <input type="file" name="homepage_icon" id="homepage_icon"
                                class="w-full border p-2 rounded" accept="image/*">
                            <div
                                class="w-20 h-20 border mt-3 rounded bg-gray-100 flex items-center justify-center overflow-hidden">
                                <img id="hp_icon_img_preview" class="hidden max-h-full max-w-full object-contain">
                            </div>
                            <p class="text-xs text-gray-400 mt-1">If you upload a custom icon, the Remix Icon selection
                                will be ignored.</p>
                        </div>
                    </div>

                    <!-- Display Order -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Display Order</label>
                        <input type="number" name="display_order"
                            value="{{ old('display_order', $social->display_order) }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="is_active" class="w-full px-4 py-2 border rounded-lg">
                            <option value="1" {{ old('is_active', $social->is_active) == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('is_active', $social->is_active) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Update Social Link
                        </button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <script src="{{ asset('backend/admin/Scripts/jquery-1.6.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/admin/Scripts/jquery.cleditor.js') }}" type="text/javascript"></script>
    <script>
        // --- Header icon tabs ---
        function switchTab(tab) {
            const isRemix = tab === 'remix';
            document.getElementById('panel-remix').classList.toggle('hidden', !isRemix);
            document.getElementById('panel-upload').classList.toggle('hidden', isRemix);
            document.getElementById('tab-remix').className = 'px-4 py-2 text-sm font-medium transition ' + (isRemix ?
                'bg-blue-500 text-white' : 'bg-white text-gray-700');
            document.getElementById('tab-upload').className = 'px-4 py-2 text-sm font-medium transition ' + (!isRemix ?
                'bg-blue-500 text-white' : 'bg-white text-gray-700');
            if (isRemix) {
                document.getElementById('icon').value = '';
            } else {
                document.getElementById('icon_class_select').value = '';
                document.getElementById('icon_preview_class').className = 'text-2xl text-gray-700';
            }
        }
        document.getElementById('icon_class_select').addEventListener('change', function() {
            document.getElementById('icon_preview_class').className = this.value + ' text-2xl text-gray-700';
        });
        document.getElementById('icon').addEventListener('change', function(e) {
            const preview = document.getElementById('icon_img_preview');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });

        // --- Homepage icon tabs ---
        function switchHpTab(tab) {
            const isRemix = tab === 'remix';
            document.getElementById('hp-panel-remix').classList.toggle('hidden', !isRemix);
            document.getElementById('hp-panel-upload').classList.toggle('hidden', isRemix);
            document.getElementById('hp-tab-remix').className = 'px-4 py-2 text-sm font-medium transition ' + (isRemix ?
                'bg-orange-500 text-white' : 'bg-white text-gray-700');
            document.getElementById('hp-tab-upload').className = 'px-4 py-2 text-sm font-medium transition ' + (!isRemix ?
                'bg-orange-500 text-white' : 'bg-white text-gray-700');
            if (isRemix) {
                document.getElementById('homepage_icon').value = '';
            } else {
                document.getElementById('hp_icon_class_select').value = '';
                document.getElementById('hp_icon_preview_class').className = 'text-2xl text-gray-700';
            }
        }
        document.getElementById('hp_icon_class_select').addEventListener('change', function() {
            document.getElementById('hp_icon_preview_class').className = this.value + ' text-2xl text-gray-700';
        });
        document.getElementById('homepage_icon').addEventListener('change', function(e) {
            const preview = document.getElementById('hp_icon_img_preview');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });
    </script>
</body>
<!-- Image Preview Script -->
<script>
    document.getElementById('icon').addEventListener('change', function(event) {
        const preview = document.getElementById('icon_preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });
</script>

</html>
