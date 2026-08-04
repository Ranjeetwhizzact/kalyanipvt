<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    @include('admin.common.sidenav')
    @include('admin.common.toster')

    <div class="main-content flex-1 p-6 ml-64 transition-all duration-300">

        <div class="bg-white p-6 mb-4 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">Site Settings</h2>
            <p class="text-gray-600 mt-2">Manage website logo, copyright text, Privacy Policy, and Terms of Use links.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
            <form action="{{ route('admin.footer-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Website Logo</label>
                    @if (!empty($setting->logo))
                        <div class="mb-2">
                            <img src="{{ asset($setting->logo) }}" alt="Current Logo" class="h-16 object-contain border rounded p-1 bg-gray-50">
                        </div>
                    @endif
                    <input type="file" name="logo" class="w-full px-4 py-2 border rounded-lg @error('logo') border-red-500 @enderror">
                    @error('logo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Copyright Text</label>
                    <input type="text" name="copyright_text" value="{{ old('copyright_text', $setting->copyright_text) }}"
                        class="w-full px-4 py-2 border rounded-lg @error('copyright_text') border-red-500 @enderror"
                        placeholder="© 2024 All Rights Reserved with Company Name.">
                    @error('copyright_text')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Privacy Policy URL</label>
                    <input type="text" name="privacy_policy_url" value="{{ old('privacy_policy_url', $setting->privacy_policy_url) }}"
                        class="w-full px-4 py-2 border rounded-lg"
                        placeholder="/privacy-policy or https://...">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Terms of Use URL</label>
                    <input type="text" name="terms_of_use_url" value="{{ old('terms_of_use_url', $setting->terms_of_use_url) }}"
                        class="w-full px-4 py-2 border rounded-lg"
                        placeholder="/terms-of-use or https://...">
                </div>

                <div class="border-t pt-6 mb-4">
                    <h3 class="text-base font-semibold text-red-600 mb-4">YouTube Section (Corporate Overview Page)</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Label Text</label>
                        <input type="text" name="youtube_label" value="{{ old('youtube_label', $setting->youtube_label) }}"
                            class="w-full px-4 py-2 border rounded-lg"
                            placeholder="For more Video visit our YouTube Channel">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">YouTube Channel URL</label>
                        <input type="text" name="youtube_url" value="{{ old('youtube_url', $setting->youtube_url) }}"
                            class="w-full px-4 py-2 border rounded-lg"
                            placeholder="https://www.youtube.com/@YourChannel">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Channel Display Name</label>
                        <input type="text" name="youtube_channel_name" value="{{ old('youtube_channel_name', $setting->youtube_channel_name) }}"
                            class="w-full px-4 py-2 border rounded-lg"
                            placeholder="@kalyani Pvt Ltd">
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Save Settings
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
