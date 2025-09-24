@include('partials.header')
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin=""/>
<link
    rel="stylesheet"
    as="style"
    onload="this.rel='stylesheet'"
    href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Work+Sans%3Awght%40400%3B500%3B700%3B900"
/>

<title>UNT</title>
<link rel="icon" type="image/x-icon" href="data:image/x-icon;base64,"/>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<body>
<div class="flex h-auto min-h-screen w-full flex-col bg-[#fcfbf8] group/design-root overflow-x-hidden"
     style='font-family: "Work Sans", "Noto Sans", sans-serif;'>
    <div class="layout-container flex h-full grow flex-col">
        <div class="px-40 flex flex-1 justify-center py-5">
            <div class="flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-5">
                <h2 class="text-[#1b180d] tracking-light text-[28px] font-bold leading-tight px-4">UNT жүйесіне
                    қосылыңыз</h2>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <h5 class="text-[#1b180d] tracking-light text-[14px] font-italic leading-light px-2">Біздің
                        платформаға тіркеліп өз біліміңізді шыңдаңыз. Апта сайынғы жаңа сұрақтармен танысып, өз
                        біліміңізді сынаңыз</h5>
                </div>

                <form method="POST" action="{{route('register.user')}}">
                    @csrf
                    <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#1b180d] text-base font-medium leading-normal pb-2">Атыңыз</p>
                            <input
                                name="name" required
                                placeholder="Өз атыңызды жазыңыз"
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#1b180d] focus:outline-0 focus:ring-0 border-none bg-[#f3f0e7] focus:border-none h-14 placeholder:text-[#9a864c] p-4 text-base font-normal leading-normal"
                                value=""
                            />
                            @error('name')
                            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>

                    <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#1b180d] text-base font-medium leading-normal pb-2">Почта</p>
                            <input
                                name="email" required
                                placeholder="Өз почтаңызды жазыңыз"
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#1b180d] focus:outline-0 focus:ring-0 border-none bg-[#f3f0e7] focus:border-none h-14 placeholder:text-[#9a864c] p-4 text-base font-normal leading-normal"
                                value=""
                            />
                            @error('email')
                            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>


                    <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#1b180d] text-base font-medium leading-normal pb-2">Пароль</p>
                            <input
                                name="password" required
                                placeholder="Өз паролыңызды жазыңыз және ешкімге айтпаңыз"
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#1b180d] focus:outline-0 focus:ring-0 border-none bg-[#f3f0e7] focus:border-none h-14 placeholder:text-[#9a864c] p-4 text-base font-normal leading-normal"
                                value=""
                            />
                            @error('password')
                            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>
                    <div class="flex px-4 py-3">
                        <button
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#eebd2b] text-[#1b180d] text-sm font-bold leading-normal tracking-[0.015em]"
                            type="submit"
                        >
                            <span class="truncate">Тіркелу</span>
                        </button>
                    </div>
                </form>


                <p class="text-[#9a864c] text-sm font-normal leading-normal pb-3 pt-1 px-4 text-center underline">
                    Тіркелдіңіз бе? Кіру</p>
            </div>
        </div>
    </div>
</div>
</body>

@include('partials.footer')
