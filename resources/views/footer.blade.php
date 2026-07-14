<footer class="custom-footer pt-16 pb-0 px-8 md:px-16 2xl:px-30 text-white">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-1 mb-8 relative">

        {{-- Column 1 Links --}}
        <div class="flex flex-col space-y-1 text-sm md:text-md 2xl:text-lg">
            @foreach ($footerLinks->get(1, collect()) as $link)
                <a href="{{ $link->url }}" class="hover:text-red-500">{{ $link->title }}</a>
            @endforeach
        </div>

        {{-- Column 2 Links --}}
        <div class="flex flex-col space-y-1 text-sm md:text-md 2xl:text-lg">
            @foreach ($footerLinks->get(2, collect()) as $link)
                <a href="{{ $link->url }}" class="hover:text-red-500">{{ $link->title }}</a>
            @endforeach
        </div>

        {{-- Call us on --}}
        <div class="text-sm md:text-md 2xl:text-lg">
            <h6 class="text-white font-bold mb-1">Call us on</h6>
            <div class="flex flex-wrap gap-x-2 gap-y-1">
                @php
                    $numbers = $contactDetails->pluck('contact_number')
                        ->map(fn($val) => is_null($val) ? '' : trim($val, " /"))
                        ->filter(fn($val) => $val !== '')
                        ->values()
                        ->all();
                @endphp
                @foreach($numbers as $index => $number)
                    <span>
                        {{ $number }}@if($index < count($numbers) - 1)<span class="text-white/60">&nbsp;/</span>@endif
                    </span>
                @endforeach
            </div>
        </div>

        {{-- Email us at --}}
        <div class="text-md relative">
            <h6 class="text-white mb-0 font-bold">Email us at:</h6>
            @foreach($contactDetails as $contact)
                @if(!empty($contact->mail))
                    <p>
                        <a href="mailto:{{ $contact->mail }}" class="md:text-md 2xl:text-lg hover:text-red-500">{{ $contact->mail }}</a>
                    </p>
                @endif
            @endforeach
        </div>

        {{-- Reach us at --}}
        <div class="text-sm md:text-md 2xl:text-lg relative">
            <h6 class="text-white mb-0 font-bold">Reach us at:</h6>
            @foreach($contactDetails as $contact)
                @if(!empty($contact->address))
                    <p class="md:text-md 2xl:text-lg">{{ $contact->address }}</p>
                @endif
            @endforeach
        </div>

    </div>

    {{-- Bottom bar --}}
    <div class="bg-[#D16B00] text-white pb-4 pt-2 px-8 md:px-16 2xl:px-32">
        <div class="border-t border-white/30 mb-4"></div>

        <div class="flex flex-col md:flex-row justify-between items-center text-xs md:text-sm md:text-md 2xl:text-lg">
            <p>{{ $footerSetting?->copyright_text }}</p>
            <div class="flex gap-6 mt-3 md:mt-0">
                @if($footerSetting?->privacy_policy_url)
                    <a href="{{ $footerSetting->privacy_policy_url }}" class="underline underline-offset-2">Privacy Policy</a>
                @endif
                @if($footerSetting?->terms_of_use_url)
                    <a href="{{ $footerSetting->terms_of_use_url }}" class="underline underline-offset-2">Terms of Use</a>
                @endif
            </div>
        </div>
    </div>
</footer>
