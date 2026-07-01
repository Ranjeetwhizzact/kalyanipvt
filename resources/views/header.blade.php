<div class="bg-black">
    <div class="h-[50px] w-full text-white m-auto px-[50px] hidden md:flex items-center justify-between">

        <div class="flex items-center gap-4 mt-0 text-lg 2xl:text-2xl">
            <a href="https://www.facebook.com/profile.php?id=61562414214286" class="inline-block leading-none"
                target="_blank"><i class="ri-facebook-circle-fill text-white"></i></a>
            <a href="https://www.instagram.com/kalyani_industries_limited/?hl=en" class="inline-block leading-none"
                target="_blank"><i class="ri-instagram-fill"></i></a>
            <a href="https://www.linkedin.com/company/kalyani-industries-limited/" class="inline-block leading-none"
                target="_blank"><i class="ri-linkedin-fill"></i></a>
            <a href="https://www.youtube.com/@Kalyani_Industries_Limited" class="inline-block leading-none"
                target="_blank"><i class="ri-youtube-fill"></i></a>
        </div>

        <div class="flex items-center gap-6">
            @if (isset($contactDetails) && $contactDetails->isNotEmpty() && $contactDetails->first()->mail)
                <a href="mailto:{{ $contactDetails->first()->mail }}"
                    class="text-white text-sm font-medium flex items-center leading-none">
                    <i class="ri-mail-line pr-2"></i><span>{{ $contactDetails->first()->mail }}</span>
                </a>
            @endif

            @forelse($contactDetails as $contact)
                @if (!empty($contact->whatsapp_number))
                    <a href="https://wa.me/{{ $contact->whatsapp_number }}"
                        class="text-white text-sm font-medium flex items-center leading-none">
                        <i class="ri-whatsapp-line pr-2"></i>
                        <span>+91 {{ $contact->whatsapp_number }}</span>
                    </a>
                @endif
            @empty
                {{-- No contact details found --}}
            @endforelse

        </div>

    </div>
</div>
