@extends('layouts.app')

@section('title', 'Contact Us - Kalyani Industries Limited')
@section('styles')
@endsection
@section('content')
    <header class="sticky top-0 bg-white z-50">
        @include('header')
        @include('nav')
    </header>

    <section class=" w-full  md:w-11/12 2xl:w-10/12 block m-auto py-2 ">
        <div class="grid lg:grid-cols-2 gap-10 px-2">
            <div>
                <div>

                    <h2 class="font-poppins text-2xl md:text-3xl lg:text-5xl ">
                        Get In Touch
                    </h2>
                    <p class="text-gray-600 text-base mt-4">Lorem ipsum is placeholder text commonly used in the graphic,
                        print, and publishing industries for previewing layouts and visual mockups.</p>
                </div>
                <div class="my-8">
                    <h3 class="text-xl font-inter capitalize font-medium">call us</h3>
                    <div class="lg:w-[500px] my-2">

                        <p class=" text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ex
                            repudiandae iure, accusantium beatae minus?</p>
                    </div>
                    <ul class="mx-0 flex flex-wrap gap-2 font-inter my-4">
                        @foreach ($contactDetails as $contact)
                            {{-- Contact Number --}}
                            @if (!empty($contact->contact_number))
                                @php
                                    $number = preg_replace('/\D/', '', $contact->contact_number);
                                    $prefix = strlen($number) == 10 ? '+91' : '022';
                                @endphp

                                <li>
                                    <a href="tel:{{ $prefix }}{{ $number }}"
                                        class="px-3 py-1 text-xs md:text-base lg:text-xs 2xl:text-base rounded-md bg-orange-200">
                                        {{ $prefix }} {{ $number }}
                                    </a>
                                </li>
                            @endif

                            {{-- WhatsApp Number --}}
                            @if (!empty($contact->whatsapp_number))
                                @php
                                    $whatsapp = preg_replace('/\D/', '', $contact->whatsapp_number);
                                    $waPrefix = strlen($whatsapp) == 10 ? '+91' : '022';
                                @endphp

                                <li>
                                    <a href="https://wa.me/{{ $whatsapp }}"
                                        class="px-3 py-1 text-xs md:text-base lg:text-xs 2xl:text-base rounded-md bg-orange-200">
                                        {{ $waPrefix }} {{ $whatsapp }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        {{-- <li><a href=""
                                class="px-3 py-1 text-xs md:text-base lg:text-xs  2xl:text-base rounded-md bg-orange-200">+91
                                7098689589</a></li>
                        <li><a href=""
                                class="px-3 py-1 text-xs md:text-base lg:text-xs  2xl:text-base rounded-md bg-orange-200">+91
                                7098689589</a></li>
                        <li><a href=""
                                class="px-3 py-1 text-xs md:text-base lg:text-xs  2xl:text-base rounded-md bg-orange-200">+91
                                7098689589</a></li> --}}
                    </ul>
                </div>
                <div class="grid sm:grid-cols-2 gap-10 px-2">
                    <div class="">
                        <h5 class="font-medium capitalize font-inter text-xl ">Mail Us</h5>
                        <p class="text-gray-600 text-base my-3">Lorem ipsum is placeholder text commonly used in the
                            graphic,</p>
                        {{-- <a href=""
                            class="px-3 py-1 text-xs md:text-base lg:text-xs  2xl:text-base rounded-md bg-orange-200 inline-block">info@kalyan.com</a> --}}
                        @forelse($contactDetails as $contact)
                            @if (!empty($contact->mail))
                                <a href="mailto:{{ $contact->mail }}"
                                    class="px-3 py-1 text-xs md:text-base lg:text-xs 2xl:text-base rounded-md bg-orange-200 inline-flex items-center my-1">
                                    <i class="ri-mail-line pr-2"></i>
                                    <span>{{ $contact->mail }}</span>
                                </a>
                            @endif
                        @empty
                            {{-- No email found --}}
                        @endforelse

                    </div>
                    <div class="">
                        <h5 class="font-medium capitalize font-inter text-xl mb-2">Address</h5>
                        <p class="text-gray-600 text-base my-3">12th Floor, B wing, Kailash Business Park, Ghatkopar
                            Powai link road, Vikhroli(W),
                            Mumbai 400079</p>
                        <a href=""
                            class="px-3 py-1 text-xs md:text-base lg:text-xs  2xl:text-base rounded-md bg-orange-200 inline-block">View
                            Map</a>

                    </div>
                </div>
            </div>
            <div>

                <form method="POST" action="{{ url('/contact') }}" class="p-3" id="contactform">
                    @csrf

                    {{-- Success Message --}}
                    @if (session('success'))
                        <h4 class="text-green-600 mb-3">{{ session('success') }}</h4>
                    @endif

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="mb-3 text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-7 space-y-1">

                        <!-- First + Last Name -->
                        <div class="col-span-2 grid md:grid-cols-2 gap-5 md:gap-7">
                            <div>
                                <label class="text-md mb-2 inline-block">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}"
                                    class="border-2 border-gray-300 mt-1 outline-none rounded-lg px-4 py-3 w-full"
                                    placeholder="First Name" required>
                            </div>

                            <div>
                                <label class="text-md mb-2 inline-block">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                    class="border-2 border-gray-300 mt-1 outline-none rounded-lg px-4 py-3 w-full"
                                    placeholder="Last Name" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-span-2">
                            <label class="text-md mb-2 inline-block">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="border-2 border-gray-300 mt-1 outline-none rounded-lg px-4 py-3 w-full"
                                placeholder="Email id" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-span-2">
                            <label class="text-md mb-2 inline-block">Phone Number</label>
                            <div class="flex border-2 border-gray-300 px-2 rounded-lg">
                                <select name="country" class="px-2 outline-none" required>
                                    <option value="india" {{ old('country') == 'india' ? 'selected' : '' }}>IND</option>
                                    <option value="pakistan" {{ old('country') == 'pakistan' ? 'selected' : '' }}>PAK
                                    </option>
                                    <option value="australia" {{ old('country') == 'australia' ? 'selected' : '' }}>AUS
                                    </option>
                                </select>

                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="outline-none px-4 py-3 w-full" placeholder="+91 9876543210" required>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="col-span-2">
                            <label class="text-md mb-2 inline-block">Message</label>
                            <textarea name="message" rows="6" class="w-full rounded-lg p-4 border-2 border-gray-300 outline-none" required>{{ old('message') }}</textarea>
                        </div>

                        <!-- Checkbox -->
                        <div class="col-span-2 flex items-center gap-2">
                            <input type="checkbox" name="agree" id="agree" required>
                            <label for="agree">
                                You agree to our
                                <a href="#" class="underline">privacy policy</a>.
                            </label>
                        </div>

                        <!-- Submit -->
                        <div class="col-span-2">
                            <button type="submit"
                                class="w-full bg-orange-500 hover:bg-orange-600 rounded-lg py-3 text-white">
                                Send Message
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- WhatsApp Icon -->
    <div id="myWhatsappButton" class="z-30"></div>

    @include('footer')

@endsection
@section('scripts')

@endsection
