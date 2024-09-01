<div class="bg-darkblackbg w-full relative">
    {{-- First hero Section --}}
    <div class="w-full h-56 bg-blend-darken bg-no-repeat bg-center bg-cover relative flex justify-center items-center" style="background-image: url('{{ asset('assets/card-images/hero-background.png') }}');">
        <h2 class="text-center font-manrope font-bold text-5xl text-white z-10">1999 Base set cards</h2>
        <div class="h-full w-full absolute top-0 right-0 bg-[#000000CC]"></div>
    </div>

    {{-- Second Main Section --}}
    <div class="w-full bg-darkblackbg min-h-screen">
        <div class="max-w-[1440px] relative flex gap-12 mx-auto p-5">
            <div class="w-1/5">
                <div class="bg-addbg rounded-xl flex flex-col gap-3 justify-center items-center px-5 py-8 w-full -mt-40">
                    <div class="flex justify-center">
                        <img class="w-36" src="{{ asset('assets/card-images/pikachuself.png') }}" alt="">
                    </div>
                    <div>
                        <h3 class="font-manrope font-bold text-yellowish text-2xl">Pikachu (232/091)</h3>
                        <h4 class="font-manrope font-semibold text-white text-lg">Temporal Forces (TEF)</h4>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Series</h5>
                        <h5 class="font-manrope font-medium text-white text-base">Scarlet & Voilet</h5>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Date</h5>
                        <h5 class="font-manrope font-medium text-white text-base">29th Aug, 2024</h5>
                    </div>
                </div>
                <div class="bg-addbg rounded-xl flex flex-col gap-3 justify-start items-start px-8 py-8 w-full mt-3">
                    <div>
                        <h3 class="font-manrope font-bold text-white text-xl mb-4">General</h3>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Marketcap</h5>
                        <h4 class="font-manrope font-semibold text-yellowish text-lg mb-3">#167/29344</h4>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Volume (30D)</h5>
                        <h5 class="font-manrope font-medium text-yellowish text-base mb-3">$186.32</h5>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Total Graded Population</h5>
                        <h5 class="font-manrope font-medium text-white text-base">1600</h5>
                    </div>
                </div>
                <div class="bg-addbg rounded-xl flex flex-col gap-3 justify-start items-start px-8 py-8 w-full mt-3">
                    <div>
                        <h3 class="font-manrope font-bold text-white text-xl mb-4">PSA</h3>

                        <div>
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white mb-4 w-full bg-[#383A3C] font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center justify-between   " type="button">
                                PSA 10
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

                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Market PSA 10</h5>
                        <h4 class="font-manrope font-semibold text-yellowish text-lg mb-3">#167/29541</h4>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Volume (30D) PSA10</h5>
                        <h5 class="font-manrope font-medium text-yellowish text-base mb-3">$98.24</h5>
                        <h5 class="font-manrope font-medium text-gray-600 text-sm">Total Graded Population PSA10</h5>
                        <h5 class="font-manrope font-medium text-white text-base">800</h5>
                    </div>
                </div>
                <div class="bg-addbg rounded-xl flex flex-col gap-3 justify-center items-center px-8 py-8 w-full mt-3 h-auto">
                    <div>
                        <h3 class="font-manrope font-bold text-white text-xl mb-4">Addvertisements</h3>
                    </div>
                </div>
            </div>
            <div class="w-4/5">
                <div class="flex items-center justify-end gap-4">
                    <div class="flex items-center gap-3">
                        <h2 class="font-manrope font-semibold text-sm text-white">Filter Cards: </h2>
                        <div class="flex items-center">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-yellowish w-full bg-[#383A3C] font-medium rounded-md text-base px-4 py-2.5 text-center flex items-center justify-between" type="button">
                                Show All
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
                    <div class="flex items-center gap-3">
                        <h2 class="font-manrope font-semibold text-sm text-white">Last Sale Grade: </h2>
                        <div class="flex items-center">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-yellowish w-full bg-[#383A3C] font-medium rounded-md text-base px-4 py-2.5 text-center flex items-center justify-between" type="button">
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
                    <div class="bg-[#383A3C] flex items-center p-1.5 rounded-md gap-3">
                        <button>
                            <svg width="34" height="30" viewBox="0 0 34 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.66602 9L24.3327 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.66602 15L24.3327 15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.66602 21L24.3327 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        <button class="bg-yellowish p-1.5 rounded">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.02762 1.04163C5.64357 1.04162 6.14984 1.04161 6.55941 1.08055C6.98502 1.12102 7.37031 1.2079 7.72077 1.42267C8.0687 1.63588 8.36124 1.92841 8.57449 2.27634C8.78924 2.6268 8.87607 3.01209 8.91657 3.4377C8.95549 3.84728 8.95549 4.35354 8.95549 4.96949V5.03043C8.95549 5.64637 8.95549 6.15264 8.91657 6.56222C8.87607 6.98783 8.78924 7.37312 8.57449 7.72358C8.36124 8.07151 8.0687 8.36404 7.72077 8.57729C7.37031 8.79204 6.98502 8.87888 6.55941 8.91938C6.14984 8.95829 5.64358 8.95829 5.02764 8.95829H4.96669C4.35074 8.95829 3.84447 8.95829 3.43489 8.91938C3.00929 8.87888 2.62399 8.79204 2.27354 8.57729C1.9256 8.36404 1.63307 8.07151 1.41986 7.72358C1.20509 7.37312 1.11821 6.98783 1.07774 6.56222C1.0388 6.15264 1.03881 5.64638 1.03882 5.03043V4.9695C1.03881 4.35355 1.0388 3.84728 1.07774 3.4377C1.11821 3.01209 1.20509 2.6268 1.41986 2.27634C1.63307 1.92841 1.9256 1.63588 2.27354 1.42267C2.62399 1.2079 3.00929 1.12102 3.43489 1.08055C3.84447 1.04161 4.35074 1.04162 4.96669 1.04163H5.02762Z" fill="#1B1B1B"/><path d="M5.02762 11.0416C5.64357 11.0416 6.14984 11.0416 6.55941 11.0805C6.98502 11.121 7.37031 11.2079 7.72077 11.4226C8.0687 11.6359 8.36124 11.9284 8.57449 12.2764C8.78924 12.6268 8.87607 13.0121 8.91657 13.4377C8.95549 13.8473 8.95549 14.3535 8.95549 14.9695V15.0305C8.95549 15.6464 8.95549 16.1526 8.91657 16.5622C8.87607 16.9878 8.78924 17.3731 8.57449 17.7235C8.36124 18.0715 8.0687 18.364 7.72077 18.5773C7.37031 18.792 6.98502 18.8789 6.55941 18.9194C6.14984 18.9583 5.64358 18.9583 5.02764 18.9583H4.96669C4.35074 18.9583 3.84447 18.9583 3.43489 18.9194C3.00929 18.8789 2.62399 18.792 2.27354 18.5773C1.9256 18.364 1.63307 18.0715 1.41986 17.7235C1.20509 17.3731 1.11821 16.9878 1.07774 16.5622C1.0388 16.1526 1.03881 15.6464 1.03882 15.0305V14.9695C1.03881 14.3536 1.0388 13.8473 1.07774 13.4377C1.11821 13.0121 1.20509 12.6268 1.41986 12.2764C1.63307 11.9284 1.9256 11.6359 2.27354 11.4226C2.62399 11.2079 3.00929 11.121 3.43489 11.0805C3.84447 11.0416 4.35074 11.0416 4.96669 11.0416H5.02762Z" fill="#1B1B1B"/><path d="M15.0277 1.04163C15.6436 1.04162 16.1498 1.04161 16.5594 1.08055C16.985 1.12102 17.3703 1.2079 17.7207 1.42267C18.0687 1.63588 18.3612 1.92841 18.5745 2.27634C18.7892 2.6268 18.8761 3.01209 18.9166 3.4377C18.9555 3.84728 18.9555 4.35354 18.9555 4.96949V5.03043C18.9555 5.64637 18.9555 6.15264 18.9166 6.56222C18.8761 6.98783 18.7892 7.37312 18.5745 7.72358C18.3612 8.07151 18.0687 8.36404 17.7207 8.57729C17.3703 8.79204 16.985 8.87888 16.5594 8.91938C16.1498 8.95829 15.6436 8.95829 15.0277 8.95829H14.9667C14.3507 8.95829 13.8445 8.95829 13.4349 8.91938C13.0093 8.87888 12.624 8.79204 12.2736 8.57729C11.9256 8.36404 11.6331 8.07151 11.4198 7.72358C11.2051 7.37312 11.1182 6.98783 11.0777 6.56222C11.0388 6.15264 11.0388 5.64638 11.0388 5.03043V4.9695C11.0388 4.35355 11.0388 3.84728 11.0777 3.4377C11.1182 3.01209 11.2051 2.6268 11.4198 2.27634C11.6331 1.92841 11.9256 1.63588 12.2736 1.42267C12.624 1.2079 13.0093 1.12102 13.4349 1.08055C13.8445 1.04161 14.3507 1.04162 14.9667 1.04163H15.0277Z" fill="#1B1B1B"/><path d="M15.0277 11.0416C15.6436 11.0416 16.1498 11.0416 16.5594 11.0805C16.985 11.121 17.3703 11.2079 17.7207 11.4226C18.0687 11.6359 18.3612 11.9284 18.5745 12.2764C18.7892 12.6268 18.8761 13.0121 18.9166 13.4377C18.9555 13.8473 18.9555 14.3535 18.9555 14.9695V15.0305C18.9555 15.6464 18.9555 16.1526 18.9166 16.5622C18.8761 16.9878 18.7892 17.3731 18.5745 17.7235C18.3612 18.0715 18.0687 18.364 17.7207 18.5773C17.3703 18.792 16.985 18.8789 16.5594 18.9194C16.1498 18.9583 15.6436 18.9583 15.0277 18.9583H14.9667C14.3507 18.9583 13.8445 18.9583 13.4349 18.9194C13.0093 18.8789 12.624 18.792 12.2736 18.5773C11.9256 18.364 11.6331 18.0715 11.4198 17.7235C11.2051 17.3731 11.1182 16.9878 11.0777 16.5622C11.0388 16.1526 11.0388 15.6464 11.0388 15.0305V14.9695C11.0388 14.3536 11.0388 13.8473 11.0777 13.4377C11.1182 13.0121 11.2051 12.6268 11.4198 12.2764C11.6331 11.9284 11.9256 11.6359 12.2736 11.4226C12.624 11.2079 13.0093 11.121 13.4349 11.0805C13.8445 11.0416 14.3507 11.0416 14.9667 11.0416H15.0277Z" fill="#1B1B1B"/></svg>
                        </button>
                    </div>
                </div>

                <div class="grid gap-8 grid-cols-5 my-5">

                    {{-- items 01 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[8px] -ml-[45px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$36.00</p>
                        </div>
                    </div>

                    {{-- items 02 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$40.00</p>
                        </div>
                    </div>

                    {{-- items 03 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$26.00</p>
                        </div>
                    </div>

                    {{-- items 04 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$80.00</p>
                        </div>
                    </div>

                    {{-- items 05 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Pikachu - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$30.00</p>
                        </div>
                    </div>

                    {{-- items 06 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[8px] -ml-[45px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$36.00</p>
                        </div>
                    </div>

                    {{-- items 07 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$40.00</p>
                        </div>
                    </div>

                    {{-- items 08 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$26.00</p>
                        </div>
                    </div>

                    {{-- items 09 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$80.00</p>
                        </div>
                    </div>

                    {{-- items 10 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Pikachu - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$30.00</p>
                        </div>
                    </div>

                    {{-- items 11 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[8px] -ml-[45px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$36.00</p>
                        </div>
                    </div>

                    {{-- items 12 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$40.00</p>
                        </div>
                    </div>

                    {{-- items 13 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$26.00</p>
                        </div>
                    </div>

                    {{-- items 14 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$80.00</p>
                        </div>
                    </div>

                    {{-- items 15 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Pikachu - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$30.00</p>
                        </div>
                    </div>

                    {{-- items 16 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[8px] -ml-[45px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Thorns - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$36.00</p>
                        </div>
                    </div>

                    {{-- items 17 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Flutter Mane - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$40.00</p>
                        </div>
                    </div>

                    {{-- items 18 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Munkidori - SV06: Twilight Masquerade (TWM)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$26.00</p>
                        </div>
                    </div>

                    {{-- items 19 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$80.00</p>
                        </div>
                    </div>

                    {{-- items 20 --}}
                    <div class="w-full">
                        <div class="flex w-full">
                            <div class="p-4 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99935 6.66675V13.3334M13.3327 10.0001L6.66602 10.0001" stroke="white" stroke-width="1.27273" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.08008 10.0002C2.08008 6.26821 2.08008 4.40223 3.23945 3.24287C4.39882 2.0835 6.26479 2.0835 9.99675 2.0835C13.7287 2.0835 15.5947 2.0835 16.754 3.24287C17.9134 4.40223 17.9134 6.26821 17.9134 10.0002C17.9134 13.7321 17.9134 15.5981 16.754 16.7575C15.5947 17.9168 13.7287 17.9168 9.99675 17.9168C6.26479 17.9168 4.39882 17.9168 3.23945 16.7575C2.08008 15.5981 2.08008 13.7321 2.08008 10.0002Z" stroke="white" stroke-width="1.27273"/></svg>
                                </div>
                            </div>
                        </div>
                        <h2 class="font-manrope font-bold text-base text-white mt-2">Pikachu - SV05: Temporal Forces (TEF)</h2>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-manrope text-yellowish text-base font-semibold">Price :</p>
                            <p class="font-manrope text-white text-base font-bold">$30.00</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
