<html>
<head>
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
</head>
<body>
<div class="relative flex h-auto min-h-screen w-full flex-col bg-[#fcfbf8] group/design-root overflow-x-hidden"
     style='font-family: "Work Sans", "Noto Sans", sans-serif;'>
    <div class="layout-container flex h-full grow flex-col">
        @include('partials.header')

        <div class="px-40 flex flex-1 justify-center py-5">
            <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                <div class="@container">
                    <div class="@[480px]:p-4">
                        <div
                            class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-lg items-center justify-center p-4"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url('https://lh3.googleusercontent.com/aida-public/AB6AXuBdSkCjm8FDbhUutjWs4W25ZV-CB0TqSht5IxT6ToPgmJDjSYZxJ6AITqrQHJabsLhITg7OXA0V8q3cO7IIihK-43nOAvr5Ku57CdK33zqyfX7POUBlo3xcya31V4UYlM1TWC8rI0yh-vNph1H4SaosOOXP51Vz6Bg4BE9BWI2g_AYk_MAaBKurTFo_C5vtlpNgItmZ_MzMIDHaYHiQpp7Xzny-RWX3t0AN_A4e2GbAeTz3qmF1mcZO3t82JQ5fZvuYPOvQT3cO1gij');">
                            <div class="flex flex-col gap-2 text-center">
                                <h1
                                    class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]"
                                >
                                    UNT– оқушыларға арналған онлайн тестілеу платформасы
                                </h1>
                                <h2 class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                                    Мұнда сіз әртүрлі пәндер бойынша білім деңгейіңізді тексеріп, өз нәтижелеріңізді
                                    бақылай аласыз.
                                </h2>
                            </div>
                            <div class="flex-wrap gap-3 flex justify-center">
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#f0bc42] text-[#1b170d] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                                >
                                    <span class="truncate">Get Started</span>
                                </button>
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#f3f0e7] text-[#1b170d] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                                >
                                    <span class="truncate">Explore Tests</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col gap-10 px-4 py-10 @container">
                    <h1 class="text-[#1b170d] tracking-light text-[32px] font-bold">Біз туралы</h1>
                    <h5>UNT – бұл тек қана онлайн тестілеу емес, бұл – білімді жаңа деңгейге көтеруге арналған
                        инновациялық орта. Біздің платформа оқушыларға өз білімін бағалауға, әлсіз тұстарын анықтауға
                        және үздіксіз дамуға көмектеседі.
                        <p>Біз әр оқушының жеке қабілетін ескеріп, оған сәйкес оқу жолын ұсынамыз. TestMaster арқылы сіз
                            тек тест тапсырып қана қоймайсыз, сонымен қатар нақты кері байланыс алып, өз
                            жетістіктеріңізді қадағалап отырасыз.</p>
                        <p>📚 Платформада барлық негізгі пәндер қамтылған – қазақ тілі мен әдебиетінен бастап,
                            математика, физика, химия, биология және шет тілдеріне дейін.</p>
                        <p>📊 Нәтижелерді талдау жүйесі арқылы оқушы қай тақырыпта мықты, қай тақырыпта көбірек
                            дайындалуы қажет екенін анық көре алады.</p>
                        <p>🏆 Жетістікті марапаттау жүйесі мотивацияны арттырып, оқуды қызықты етеді.</p>

                        <p>Біздің миссиямыз – әрбір оқушыға сапалы білім алуға жағдай жасау және оларды академиялық
                            мақсаттарына жетелеу.</p>
                        UNT – сенің дамуың мен жетістігің үшін жасалған заманауи білім беру шешімі!
                    </h5>
                </div>

                <div class="flex flex-col gap-10 px-4 py-10 @container">
                    <div class="flex flex-col gap-4">
                        <h1
                            class="text-[#1b170d] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]"
                        >
                            Неліктен UNT?
                        </h1>
                        <p class="text-[#1b170d] text-base font-normal leading-normal max-w-[720px]">
                            UNT - білімді шыңдаудың ең тиімді жолы!
                            Онлайн тестілеудің заманауи тәсілдері арқылы біз оқушыларға өз мақсаттарына жетуге
                            көмектесеміз.
                        </p>
                    </div>
                    <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-0">
                        <div class="flex flex-1 gap-3 rounded-lg border border-[#e7e0cf] bg-[#fcfbf8] p-4 flex-col">
                            <div class="text-[#1b170d]" data-icon="PresentationChart" data-size="24px"
                                 data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                                     viewBox="0 0 256 256">
                                    <path
                                        d="M216,40H136V24a8,8,0,0,0-16,0V40H40A16,16,0,0,0,24,56V176a16,16,0,0,0,16,16H79.36L57.75,219a8,8,0,0,0,12.5,10l29.59-37h56.32l29.59,37a8,8,0,1,0,12.5-10l-21.61-27H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,136H40V56H216V176ZM104,120v24a8,8,0,0,1-16,0V120a8,8,0,0,1,16,0Zm32-16v40a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm32-16v56a8,8,0,0,1-16,0V88a8,8,0,0,1,16,0Z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-[#1b170d] text-base font-bold leading-tight">Жан-жақты бағалау</h2>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">
                                    Әртүрлі пәндер мен деңгейлерді қамтитын кең тест кітапханасына қол жеткізіп, толық
                                    дайындық жасаңыз.
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-1 gap-3 rounded-lg border border-[#e7e0cf] bg-[#fcfbf8] p-4 flex-col">
                            <div class="text-[#1b170d]" data-icon="UsersThree" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                                     viewBox="0 0 256 256">
                                    <path
                                        d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-[#1b170d] text-base font-bold leading-tight">Қатемен жұмыс</h2>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">
                                    Тестілеу аяқталғаннан кейін сіз сұрақтардың дұрыс жауаптарын және оның қай
                                    тақырыптан екенін көре аласыз.
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-1 gap-3 rounded-lg border border-[#e7e0cf] bg-[#fcfbf8] p-4 flex-col">
                            <div class="text-[#1b170d]" data-icon="ShieldCheck" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                                     viewBox="0 0 256 256">
                                    <path
                                        d="M208,40H48A16,16,0,0,0,32,56v58.78c0,89.61,75.82,119.34,91,124.39a15.53,15.53,0,0,0,10,0c15.2-5.05,91-34.78,91-124.39V56A16,16,0,0,0,208,40Zm0,74.79c0,78.42-66.35,104.62-80,109.18-13.53-4.51-80-30.69-80-109.18V56H208ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.68l50.34-50.34a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-[#1b170d] text-base font-bold leading-tight">Қауіпсіздік және
                                    сенімділік</h2>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">
                                    Біздің платформа деректердің қауіпсіздігін және тесттердің адалдығын бірінші орынға
                                    қояды, сенімді тестілеу тәжірибесін қамтамасыз етеді.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-10 px-4 py-10 @container">
                    <div class="flex flex-col gap-4">
                        <h1
                            class="text-[#1b170d] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]"
                        >
                            Біздің тәсіл
                        </h1>
                        <p class="text-[#1b170d] text-base font-normal leading-normal max-w-[720px]">
                            UNT - тек тест қана емес, жан-жақты білім алу жүйесі. Біз оқуды бағалау, кері байланыс және
                            үздіксіз даму арқылы қолдаймыз.
                        </p>
                    </div>
                    <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3">
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCl9JQRHLwU3DOoBuLJopxN4dksWAihm-LBhUPe21dNMVt5v2dcf3fYhI45Hti2wdamUs8koVwRmPhGZcOlAECp55cJid3-qhbep7Jktys6wqTcHhFZLPnTX248CWnFUHwv3x_wORYTAQMUXL1upCHtcxXLng07GF5RLduuslJnbJA8WVcTM_r6vqxna2YTHEqpf0c8H1-K0dZKVpg8Zd_1yBXN5IsWtCVBHFx_GrmQZNZgKaNUrHB9_tikuL3cWsdfieibzrQAoykf");'
                            ></div>
                            <div>
                                <p class="text-[#1b170d] text-base font-medium leading-normal">Жеке оқу жолы</p>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">
                                    Өзіңнің нәтижелеріңе және мақсаттарыңа сай тест ұсыныстары. Дайындығыңды дұрыс
                                    бағытта жүргізуге көмектеседі.
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB6R0_olueL3gw7DQrQNHwDUQEPcotOMBNmW4qtAu1DUm6iaGJpVPjm96V45cs-LG8IBM-ejdSwWQ_nEA1hZCTk0FRpDUy2MBcDq4rAkC1fZLwdDvbVwalV_GFVMV17z5UizMDKON1i1SCVzIjpJbdQu34utreJNo3vV7PR0D8IgG5aVzlaFQxhsd5GAd-lIABaXKyTXoeiQw_FVntx2cNsKlI1tsLpXfK3LTgcJQyxXYw7Yzh0kvDlsBQ44IVqdXApHTk3VVpX-m0J");'
                            ></div>
                            <div>
                                <p class="text-[#1b170d] text-base font-medium leading-normal">Нақты кері байланыс</p>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">
                                    Толық талдау мен жеке ұсыныстар. Қатемен жұмыс
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div
                                class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDTygVci15sAjwk5ehlOrRNUcBBIBXHsl5e2glbPrnjCjiyW0hJMGgMObzdFmMbzR5uBYny2vqeT2DCgv5YacKZgEM_ELI-7fPpmjVC7aeh1aEDU71ws4xCDGR9KZfX1ETG7vsW3ax0IHPE4PpUCHxjbx8uf91j0UJaMHpamkha-OKtdJdj5aHkz3quOcG7HoOHImwgqOpOAdKU8CjOa3OEP9v66oI3x4SBnxfkD3o9vbZC0rtpQWkNVa51rEWITYYA6zL6A15EVHhJ");'
                            ></div>
                            <div>
                                <p class="text-[#1b170d] text-base font-medium leading-normal">Жетістікті бірге атап
                                    өтейік</p>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">
                                    Прогрессіңді бақыла, жетістігіңді бағала.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 p-4">
                    <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f3f0e7]">
                        <p class="text-[#1b170d] text-base font-medium leading-normal">Жалпы сұрақтар саны</p>
                        <p class="text-[#1b170d] tracking-light text-2xl font-bold leading-tight">20,000+</p>
                    </div>
                    <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-lg p-6 bg-[#f3f0e7]">
                        <p class="text-[#1b170d] text-base font-medium leading-normal">Күнделікті пайдаланушылар</p>
                        <p class="text-[#1b170d] tracking-light text-2xl font-bold leading-tight">2,500+</p>
                    </div>
                </div>

                <h2 class="text-[#1b170d] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Біздің платформадағы кері байланыс</h2>

                <div class="flex flex-col gap-8 overflow-x-hidden bg-[#fcfbf8] p-4">
                    <div class="flex flex-col gap-3 bg-[#fcfbf8]">
                        <div class="flex items-center gap-3">
                            <div class="flex-1">
                                <p class="text-[#1b170d] text-base font-medium leading-normal">Айдана</p>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">2025-03-15</p>
                            </div>
                        </div>
                        <p class="text-[#1b170d] text-base font-normal leading-normal">
                            "UNT ҰБТ-ға дайындалуымда үлкен көмек болды. Әр тесттен кейінгі кері байланыс маған қай тақырыпқа көбірек көңіл бөлу керегін көрсетіп отырды. Нәтижесінде өзіме сенімді бола түстім."
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 bg-[#fcfbf8]">
                        <div class="flex items-center gap-3">
                            <div class="flex-1">
                                <p class="text-[#1b170d] text-base font-medium leading-normal">Нұржан</p>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">2025-01-22</p>
                            </div>
                        </div>
                        <p class="text-[#1b170d] text-base font-normal leading-normal">
                            "Маған ең ұнағаны – жетістікті бағалау жүйесі. Әр өткен тесттен кейін прогрессімді көріп, мотивациям арта түсті. Оқу ойын сияқты қызықты болып кетті."
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 bg-[#fcfbf8]">
                        <div class="flex items-center gap-3">
                            <div class="flex-1">
                                <p class="text-[#1b170d] text-base font-medium leading-normal">Аружан</p>
                                <p class="text-[#9a824c] text-sm font-normal leading-normal">2025-09-10</p>
                            </div>
                        </div>
                        <p class="text-[#1b170d] text-base font-normal leading-normal">
                            "UNT интерфейсі өте ыңғайлы әрі заманауи. Тесттерді кез келген уақытта, кез келген жерде тапсыруға болады. Нағыз оқушыға қажетті платформа деп айта аламын."
                        </p>
                    </div>
                </div>


            </div>
        </div>

        @include('partials.footer')
    </div>
</div>
</body>
</html>
