<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f3f0e7] px-10 py-3">

    <div class="flex flex-1 justify-center gap-8">
        <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-[#f0bc42]" href="/">UNT</a>

        <div class="flex gap-2">
            @if(\Illuminate\Support\Facades\Auth::user())
            <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0bc42] text-[#1b170d] text-sm font-bold leading-normal tracking-[0.015em]"
            >
                <span class="truncate"><a href="{{route('home')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></span>
            </button>
            @else
                <button
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0bc42] text-[#1b170d] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                    <span class="truncate"><a href="{{route('register')}}">Тіркелу</a></span>
                </button>
            @endif
                @if(\Illuminate\Support\Facades\Auth::user())
                    <button
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f3f0e7] text-[#1b170d] text-sm font-bold leading-normal tracking-[0.015em]"
                    >
                        <span class="truncate">Шығу</span>
                    </button>
                @else
            <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f3f0e7] text-[#1b170d] text-sm font-bold leading-normal tracking-[0.015em]"
            >
                <span class="truncate">Кіру</span>
            </button>
                @endif
        </div>
    </div>
</header>
