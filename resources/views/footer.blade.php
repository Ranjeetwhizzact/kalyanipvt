<footer class="custom-footer pt-16 pb-0 px-8 md:px-16 2xl:px-30 text-white">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-1 mb-8 relative">

        {{-- Column 1 Links --}}
        <div class="flex flex-col space-y-1 text-sm">
            @foreach ($footerLinks->get(1, collect()) as $link)
                <a href="{{ $link->url }}" class="hover:text-red-500">{{ $link->title }}</a>
            @endforeach
        </div>

        {{-- Column 2 Links --}}
        <div class="flex flex-col space-y-1 text-sm">
            @foreach ($footerLinks->get(2, collect()) as $link)
                <a href="{{ $link->url }}" class="hover:text-red-500">{{ $link->title }}</a>
            @endforeach
        </div>

        {{-- Call us on --}}
        <div class="text-sm">
            <h6 class="text-white font-bold mb-1">Call us on</h6>
            <div class="flex flex-wrap">
                @foreach ($contactDetails as $contact)
                    <p>{{ $contact->contact_number }}</p>
                    @unless ($loop->last)
                        &nbsp;/&nbsp;
                    @endunless
                @endforeach
            </div>
        </div>

        {{-- Email us at --}}
        <div class="text-md relative">
            <h6 class="text-white mb-0 font-bold">Email us at:</h6>
            @foreach ($contactDetails as $contact)
                <p>
                    <a href="mailto:{{ $contact->mail }}" class="text-xs">{{ $contact->mail }}</a>
                </p>
            @endforeach
        </div>

        {{-- Reach us at --}}
        <div class="text-sm relative">
            <h6 class="text-white mb-0 font-bold">Reach us at:</h6>
            @foreach ($contactDetails as $contact)
                @if (!empty($contact->address))
                    <p class="text-xs">{{ $contact->address }}</p>
                @endif
            @endforeach
        </div>

    </div>

    {{-- Bottom bar --}}
    <div class="bg-[#D16B00] text-white pb-4 pt-2 px-8 md:px-16 2xl:px-32">
        <div class="border-t border-white/30 mb-4"></div>

        <div class="flex flex-col md:flex-row justify-between items-center text-xs md:text-sm">
            <p>{{ $footerSetting?->copyright_text }}</p>
            <div class="flex gap-6 mt-3 md:mt-0">
                <a href="{{ route('page.show', 'privacy-policy') }}" class="underline underline-offset-2">Privacy
                    Policy</a>
                <a href="{{ route('page.show', 'terms-and-condition') }}" class="underline underline-offset-2">Terms of
                    Use</a>
            </div>
        </div>
    </div>
</footer>
