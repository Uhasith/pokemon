<div class="bg-darkblackbg w-full relative">
    {{-- First hero Section --}}
    <div class="w-full h-56 bg-blend-darken bg-no-repeat bg-center bg-cover relative flex justify-center items-center" style="background-image: url('{{ asset('assets/card-images/hero-background.png') }}');">
        <h2 class="text-center font-manrope font-bold text-3xl lg:text-4xl xl:text-5xl text-white z-10 md:pl-24">1999 Base sets</h2>
        <div class="h-full w-full absolute top-0 right-0 bg-[#000000CC]"></div>
    </div>

    {{-- Second Main Section --}}
    <div class="w-full bg-darkblackbg min-h-screen">
        <div class="max-w-[1440px] relative flex flex-col md:flex-row gap-8 xl:gap-12 mx-auto p-5">
            <div class="w-full md:w-2/12 xl:w-2/12">
                {{-- <div class="font-manrope mt-20">
                    <h3 class="text-white font-bold text-xl mb-5">Categories</h3>
                    <div class="text-white font-semibold text-base flex flex-col gap-2">
                        <h4>Scarlet & Violet</h4>
                        <h4>Sword & Shield</h4>
                        <h4>Sun & Moon</h4>
                        <h4>Black & White</h4>
                        <h4>Call of Legends</h4>
                        <h4>HeartGold SoulSilver</h4>
                        <h4>Platinum</h4>
                        <h4>Diamond & Pearl</h4>
                        <h4>EX Ruby & Sapphire</h4>
                        <h4>Legendary Collection</h4>
                    </div>
                </div> --}}
            </div>
            <div class="w-full md:w-10/12 xl:w-10/12">
                <div class="flex items-center justify-start gap-4">
                    <div class="flex items-center gap-3 w-auto">
                        <h2 class="font-manrope font-semibold text-sm text-white">Filter Cards: </h2>
                        <div class="flex items-center w-auto">
                            <button id="dropdownFilterButton" data-dropdown-toggle="filterdropdown" class="text-yellowish w-full bg-[#383A3C] font-medium rounded-md text-sm xl:text-base px-4 py-2.5 text-center flex items-center justify-between" type="button">
                                Show All
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="filterdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownFilterButton">
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 w-auto">
                        <h2 class="font-manrope font-semibold text-sm text-white">Last Sale Grade: </h2>
                        <div class="flex items-center w-auto">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-yellowish w-full bg-[#383A3C] font-medium rounded-md text-sm xl:text-base px-4 py-2.5 text-center flex items-center justify-between" type="button">
                                10
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-3">

                {{-- This is Grid View --}}
                <div class="grid gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 my-5">

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Pikachu - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Pikachu - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Pikachu - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                    </div>

                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-3 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="" class="rounded-lg">
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-sm xl:text-base text-white mt-2 text-center">Pikachu - SV05: Temporal Forces (TEF)</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
