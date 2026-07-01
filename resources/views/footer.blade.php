<footer class="custom-footer pt-16 pb-0 px-8 md:px-16 2xl:px-30  text-white">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-1 mb-8 relative">

        <div class="flex flex-col space-y-1 text-sm">
            <a href="#" class="hover:text-red-500">Home</a>
            <a href="#" class="hover:text-red-500">Business Area</a>
            <a href="#" class="hover:text-red-500">Key Strength</a>
        </div>

        <div class="flex flex-col space-y-1 text-sm">
            <a href="#" class="hover:text-red-500">Agrochemicals</a>
            <a href="#" class="hover:text-red-500">Public health Pesticides</a>
            <a href="#" class="hover:text-red-500">Export Zone</a>
        </div>

        <div class="text-sm">
            <h6 class="text-white font-bold mb-1 ">Call us on</h6>

            {{-- <p>022-61278127 / 62215489</p>
            <p>62361265 / 67421923</p> --}}
           <div class="flex flex-wrap ">
               @foreach($contactDetails as $contact)
                <p>{{ $contact->contact_number }}</p>&nbsp;/&nbsp;
            @endforeach
            </div>
        </div>

        <div class="text-md relative">
            <h6 class="text-white mb-0 font-bold">Email us at:</h6>
                @foreach($contactDetails as $contact)
                <p>

                    <a href="mailto:{{ $contact->mail }}" class="text-xs">{{ $contact->mail }}</a>
                </p>
            @endforeach

        </div>
        <div class="text-sm relative">
            <h6 class="text-white mb-0 font-bold">Reach us at:</h6>
            <p class="text-xs">
                B/12<sup>th</sup> Floor, Kailas Business Park<br>
                Powai Road, Vikhroli (W), Mumbai-400 079
            </p>
        </div>
    </div>



    <div class="bg-[#D16B00] text-white pb-4 pt-2 px-8 md:px-16 2xl:px-32">
        <div class="border-t border-white/30 mb-4"></div>

        <div class="flex flex-col md:flex-row justify-between items-center text-xs md:text-sm">
            <p>© 2007-2024 All Rights Reserved with Kalyani Industries Limited.</p>
            <div class="flex gap-6 mt-3 md:mt-0">
                <a href="#" class="underline underline-offset-2">Privacy Policy</a>
                <a href="#" class="underline underline-offset-2">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>
