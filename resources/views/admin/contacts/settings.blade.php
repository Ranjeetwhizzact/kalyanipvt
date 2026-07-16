<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <title>Contact Page Settings</title>
    <style>
        input:checked ~ div.sidebar {
            width: 50px; 
        }

        input:checked ~ div.sidebar ~ div.main-content {
            margin-left: 50px; 
        }

        input:checked ~ div > div > div img {display: none;}
        .sidebar {
            transition: width 0.3s ease;
        }

        .main-content {
            transition: margin-left 0.3s ease;
        }
        .dropdown-content {
            display: none;
        }

        .dropdown:hover .dropdown-content,
        .dropdown:focus-within .dropdown-content {
            display: block;
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

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('admin.common.sidenav')
        @include('admin.common.toster')

        <!-- Main Content -->
        <div class="main-content flex-1 p-6 ml-64 overflow-y-auto transition-all duration-300">
            <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="ri-settings-3-line mr-3 text-green-600"></i>
                        Contact Page Settings
                    </h2>
                    <a href="{{ route('admin.contacts.index') }}" class="text-sm text-blue-600 hover:underline flex items-center">
                        <i class="ri-arrow-left-line mr-1"></i> Back to Contacts
                    </a>
                </div>

                <!-- Errors list -->
                @if($errors->any())
                    <div class="mb-5 p-4 bg-red-50 border-l-4 border-red-500 rounded-md shadow-sm">
                        <div class="text-red-700 font-semibold mb-1">Please fix the following errors:</div>
                        <ul class="list-disc pl-5 text-sm text-red-600">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success Alert -->
                @if(session('success'))
                    <div class="mb-5 p-4 bg-green-50 border-l-4 border-green-500 rounded-md shadow-sm flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="ri-checkbox-circle-line text-green-500 text-xl mr-3"></i>
                            <span class="text-green-700 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Form Card -->
                <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden p-6">
                    <form action="{{ route('admin.contact-settings.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Main Title Section -->
                        <div class="border-b border-gray-100 pb-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Main Heading & Description</h3>
                            <p class="text-sm text-gray-500">The main title and introductory paragraph shown at the top of the Contact page.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Contact Page Heading</label>
                                <input type="text" name="heading" value="{{ old('heading', $settings->heading) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Introductory Description</label>
                                <textarea name="description" rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">{{ old('description', $settings->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Call Us Section -->
                        <div class="border-b border-gray-100 pb-4 pt-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Call Us Section Details</h3>
                            <p class="text-sm text-gray-500">The section title and dynamic list of contact phone/WhatsApp numbers.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Call Us Section Heading</label>
                                <input type="text" name="call_us_heading" value="{{ old('call_us_heading', $settings->call_us_heading) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Call Us Section Description</label>
                                <textarea name="call_us_description" rows="2"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">{{ old('call_us_description', $settings->call_us_description) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone / WhatsApp Numbers</label>
                                <div id="phone-numbers-container" class="space-y-2">
                                    @php
                                        $phones = old('phone_numbers', $settings->phone_numbers ?? []);
                                        if (empty($phones)) {
                                            $phones = [''];
                                        }
                                    @endphp
                                    @foreach($phones as $index => $phone)
                                        <div class="flex items-center gap-2 phone-number-item animate-fade-in">
                                            <input type="text" name="phone_numbers[]" value="{{ $phone }}" placeholder="e.g. +91 98765 43210 or 022 62361265"
                                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">
                                            <button type="button" onclick="removePhoneNumber(this)" class="px-3 py-2 bg-red-100 text-red-600 hover:bg-red-200 rounded-md transition duration-150">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" onclick="addPhoneNumber()" class="mt-2 inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-100 transition duration-150">
                                    <i class="ri-add-line mr-1"></i> Add Phone Number
                                </button>
                            </div>
                        </div>

                        <!-- Mail Us Section -->
                        <div class="border-b border-gray-100 pb-4 pt-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Mail Us Section Details</h3>
                            <p class="text-sm text-gray-500">The section title and dynamic list of contact email addresses.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mail Us Section Heading</label>
                                <input type="text" name="mail_us_heading" value="{{ old('mail_us_heading', $settings->mail_us_heading) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mail Us Section Description</label>
                                <textarea name="mail_us_description" rows="2"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">{{ old('mail_us_description', $settings->mail_us_description) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email Addresses</label>
                                <div id="emails-container" class="space-y-2">
                                    @php
                                        $emails = old('emails', $settings->emails ?? []);
                                        if (empty($emails)) {
                                            $emails = [''];
                                        }
                                    @endphp
                                    @foreach($emails as $index => $email)
                                        <div class="flex items-center gap-2 email-item animate-fade-in">
                                            <input type="email" name="emails[]" value="{{ $email }}" placeholder="e.g. info@kalyanilimited.com"
                                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">
                                            <button type="button" onclick="removeEmail(this)" class="px-3 py-2 bg-red-100 text-red-600 hover:bg-red-200 rounded-md transition duration-150">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" onclick="addEmail()" class="mt-2 inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-100 transition duration-150">
                                    <i class="ri-add-line mr-1"></i> Add Email Address
                                </button>
                            </div>
                        </div>

                        <!-- Address & Map Details Section -->
                        <div class="border-b border-gray-100 pb-4 pt-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Address & Map Details</h3>
                            <p class="text-sm text-gray-500">The physical address and Google Maps location link.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Physical Address</label>
                                <textarea name="address" rows="3" placeholder="e.g. 12th Floor, B wing, Kailash Business Park..."
                                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">{{ old('address', $settings->address) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Google Maps Link (URL)</label>
                                <input type="url" name="map_link" value="{{ old('map_link', $settings->map_link) }}" placeholder="e.g. https://maps.app.goo.gl/..."
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150">
                            </div>
                        </div>

                        <div class="flex justify-end pt-4 border-t border-gray-100">
                            <button type="submit"
                                    class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow transition duration-150 cursor-pointer">
                                Update Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle adding/removing dynamic items -->
    <script>
        function addPhoneNumber() {
            const container = document.getElementById('phone-numbers-container');
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2 phone-number-item';
            div.innerHTML = `
                <input type="text" name="phone_numbers[]" placeholder="e.g. +91 98765 43210 or 022 62361265"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150 animate-fade-in">
                <button type="button" onclick="removePhoneNumber(this)" class="px-3 py-2 bg-red-100 text-red-600 hover:bg-red-200 rounded-md transition duration-150">
                    <i class="ri-delete-bin-line"></i>
                </button>
            `;
            container.appendChild(div);
        }

        function removePhoneNumber(button) {
            const items = document.querySelectorAll('.phone-number-item');
            if (items.length > 1) {
                button.parentElement.remove();
            } else {
                alert('You must keep at least one phone number.');
            }
        }

        function addEmail() {
            const container = document.getElementById('emails-container');
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2 email-item';
            div.innerHTML = `
                <input type="email" name="emails[]" placeholder="e.g. info@kalyanilimited.com"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-150 animate-fade-in">
                <button type="button" onclick="removeEmail(this)" class="px-3 py-2 bg-red-100 text-red-600 hover:bg-red-200 rounded-md transition duration-150">
                    <i class="ri-delete-bin-line"></i>
                </button>
            `;
            container.appendChild(div);
        }

        function removeEmail(button) {
            const items = document.querySelectorAll('.email-item');
            if (items.length > 1) {
                button.parentElement.remove();
            } else {
                alert('You must keep at least one email address.');
            }
        }
    </script>
</body>

</html>
