<div class="bg-black">
    <div class="h-[50px] w-full text-white m-auto px-[50px] hidden md:flex items-center justify-between">

        <div class="flex items-center gap-4 mt-0 text-lg 2xl:text-2xl">
            @foreach ($socialLinks as $social)
                <a href="{{ $social->url }}" class="inline-block leading-none" target="_blank">
                    @if (!empty($social->icon_class))
                        <i class="{{ $social->icon_class }} text-white"></i>
                    @elseif(!empty($social->icon))
                        <img src="{{ asset($social->icon) }}" class="w-5 h-5 object-contain inline-block">
                    @endif
                </a>
            @endforeach
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
