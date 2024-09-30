<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-blackish border-b border-[#27292B]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex w-full xl:w-1/2">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home', ['set_id' => '6763889C-2A51-48F5-B540-01626C1345C2']) }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                    <x-nav-link class="text-white font-manrope text-base font-medium" :href="route('home', ['set_id' => '6763889C-2A51-48F5-B540-01626C1345C2'])" :active="request()->routeIs('home')"
                        wire:navigate>
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link class="text-white font-manrope text-base font-medium">
                        Market
                    </x-nav-link>

                    <x-nav-link class="text-white font-manrope text-base font-medium">
                        Trading-cards
                    </x-nav-link>

                    <x-nav-link class="text-white font-manrope text-base font-medium">
                        Comics
                    </x-nav-link>

                    <x-nav-link class="text-white font-manrope text-base font-medium">
                        Tools
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden xl:flex w-1/2 justify-end items-center">
                <div class="flex items-center justify-end">
                    {{-- Language Dropdown --}}
                    <div class="flex items-center justify-center">
                        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
                            <button type="button" data-dropdown-toggle="language-dropdown-menu"
                                class="flex items-center font-medium justify-center px-4 py-2 text-sm text-white cursor-pointer">
                                Eng (US)
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="ml-2"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9467 5.45337H7.79332H4.05332C3.41332 5.45337 3.09332 6.2267 3.54665 6.68004L6.99998 10.1334C7.55332 10.6867 8.45332 10.6867 9.00665 10.1334L10.32 8.82003L12.46 6.68004C12.9067 6.2267 12.5867 5.45337 11.9467 5.45337Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="z-50 hidden my-4 text-base list-none bg-blackish divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                                id="language-dropdown-menu">
                                <ul class="py-2 font-medium" role="none">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                                    xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                                    viewBox="0 0 512 512">
                                                    <g fill-rule="evenodd">
                                                        <g stroke-width="1pt">
                                                            <path fill="#bd3d44"
                                                                d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                                transform="scale(3.9385)" />
                                                            <path fill="#fff"
                                                                d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                                transform="scale(3.9385)" />
                                                        </g>
                                                        <path fill="#192f5d" d="M0 0h98.8v70H0z"
                                                            transform="scale(3.9385)" />
                                                        <path fill="#fff"
                                                            d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                            transform="scale(3.9385)" />
                                                    </g>
                                                </svg>
                                                Eng (US)
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg class="h-3.5 w-3.5 rounded-full me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-de"
                                                    viewBox="0 0 512 512">
                                                    <path fill="#ffce00" d="M0 341.3h512V512H0z" />
                                                    <path d="M0 0h512v170.7H0z" />
                                                    <path fill="#d00" d="M0 170.7h512v170.6H0z" />
                                                </svg>
                                                NL
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg class="h-3.5 w-3.5 rounded-full me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-it"
                                                    viewBox="0 0 512 512">
                                                    <g fill-rule="evenodd" stroke-width="1pt">
                                                        <path fill="#fff" d="M0 0h512v512H0z" />
                                                        <path fill="#009246" d="M0 0h170.7v512H0z" />
                                                        <path fill="#ce2b37" d="M341.3 0H512v512H341.3z" />
                                                    </g>
                                                </svg>
                                                IT
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg class="h-3.5 w-3.5 rounded-full me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" id="flag-icon-css-cn"
                                                    viewBox="0 0 512 512">
                                                    <defs>
                                                        <path id="a" fill="#ffde00"
                                                            d="M1-.3L-.7.8 0-1 .6.8-1-.3z" />
                                                    </defs>
                                                    <path fill="#de2910" d="M0 0h512v512H0z" />
                                                    <use width="30" height="20"
                                                        transform="matrix(76.8 0 0 76.8 128 128)" xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="rotate(-121 142.6 -47) scale(25.5827)"
                                                        xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="rotate(-98.1 198 -82) scale(25.6)"
                                                        xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="rotate(-74 272.4 -114) scale(25.6137)"
                                                        xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="matrix(16 -19.968 19.968 16 256 230.4)"
                                                        xlink:href="#a" />
                                                </svg>
                                                中文 (繁體)
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button data-collapse-toggle="navbar-language" type="button"
                                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden"
                                aria-controls="navbar-language" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Currency Dropdown --}}
                    <div>
                        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
                            <button type="button" data-dropdown-toggle="currency-dropdown-menu"
                                class="flex items-center font-medium justify-center px-4 py-2 text-sm text-white cursor-pointer">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="5" y="3" width="8" height="12" fill="white" />
                                    <path
                                        d="M8.43752 5.88561C7.73559 6.07754 7.31252 6.61616 7.31252 7.125C7.31252 7.63384 7.73559 8.17246 8.43752 8.36439V5.88561Z"
                                        fill="#16C784" />
                                    <path
                                        d="M9.56252 9.63561V12.1144C10.2644 11.9225 10.6875 11.3838 10.6875 10.875C10.6875 10.3662 10.2644 9.82754 9.56252 9.63561Z"
                                        fill="#16C784" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.5 9C16.5 13.1421 13.1422 16.5 9.00002 16.5C4.85788 16.5 1.50002 13.1421 1.50002 9C1.50002 4.85786 4.85788 1.5 9.00002 1.5C13.1422 1.5 16.5 4.85786 16.5 9ZM9.00002 3.9375C9.31068 3.9375 9.56252 4.18934 9.56252 4.5V4.73755C10.7853 4.9565 11.8125 5.87521 11.8125 7.125C11.8125 7.43566 11.5607 7.6875 11.25 7.6875C10.9394 7.6875 10.6875 7.43566 10.6875 7.125C10.6875 6.61616 10.2644 6.07754 9.56252 5.88561V8.48755C10.7853 8.7065 11.8125 9.62521 11.8125 10.875C11.8125 12.1248 10.7853 13.0435 9.56252 13.2624V13.5C9.56252 13.8107 9.31068 14.0625 9.00002 14.0625C8.68936 14.0625 8.43752 13.8107 8.43752 13.5V13.2624C7.21469 13.0435 6.18752 12.1248 6.18752 10.875C6.18752 10.5643 6.43935 10.3125 6.75002 10.3125C7.06068 10.3125 7.31252 10.5643 7.31252 10.875C7.31252 11.3838 7.73559 11.9225 8.43752 12.1144V9.51245C7.21469 9.2935 6.18752 8.37479 6.18752 7.125C6.18752 5.87521 7.21469 4.9565 8.43752 4.73755V4.5C8.43752 4.18934 8.68936 3.9375 9.00002 3.9375Z"
                                        fill="#16C784" />
                                </svg>
                                USD
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    class="ml-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9467 5.45337H7.79332H4.05332C3.41332 5.45337 3.09332 6.2267 3.54665 6.68004L6.99998 10.1334C7.55332 10.6867 8.45332 10.6867 9.00665 10.1334L10.32 8.82003L12.46 6.68004C12.9067 6.2267 12.5867 5.45337 11.9467 5.45337Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="z-50 hidden my-4 text-base list-none bg-gray-700 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                                id="currency-dropdown-menu">
                                <ul class="py-2 font-medium" role="none">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full me-2"
                                                    xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                                    viewBox="0 0 512 512">
                                                    <g fill-rule="evenodd">
                                                        <g stroke-width="1pt">
                                                            <path fill="#bd3d44"
                                                                d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                                transform="scale(3.9385)" />
                                                            <path fill="#fff"
                                                                d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                                transform="scale(3.9385)" />
                                                        </g>
                                                        <path fill="#192f5d" d="M0 0h98.8v70H0z"
                                                            transform="scale(3.9385)" />
                                                        <path fill="#fff"
                                                            d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                            transform="scale(3.9385)" />
                                                    </g>
                                                </svg>
                                                $ USD
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg class="h-3.5 w-3.5 rounded-full me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-de"
                                                    viewBox="0 0 512 512">
                                                    <path fill="#ffce00" d="M0 341.3h512V512H0z" />
                                                    <path d="M0 0h512v170.7H0z" />
                                                    <path fill="#d00" d="M0 170.7h512v170.6H0z" />
                                                </svg>
                                                EURO
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg class="h-3.5 w-3.5 rounded-full me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-it"
                                                    viewBox="0 0 512 512">
                                                    <g fill-rule="evenodd" stroke-width="1pt">
                                                        <path fill="#fff" d="M0 0h512v512H0z" />
                                                        <path fill="#009246" d="M0 0h170.7v512H0z" />
                                                        <path fill="#ce2b37" d="M341.3 0H512v512H341.3z" />
                                                    </g>
                                                </svg>
                                                AUD
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <div class="inline-flex items-center">
                                                <svg class="h-3.5 w-3.5 rounded-full me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" id="flag-icon-css-cn"
                                                    viewBox="0 0 512 512">
                                                    <defs>
                                                        <path id="a" fill="#ffde00"
                                                            d="M1-.3L-.7.8 0-1 .6.8-1-.3z" />
                                                    </defs>
                                                    <path fill="#de2910" d="M0 0h512v512H0z" />
                                                    <use width="30" height="20"
                                                        transform="matrix(76.8 0 0 76.8 128 128)" xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="rotate(-121 142.6 -47) scale(25.5827)"
                                                        xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="rotate(-98.1 198 -82) scale(25.6)"
                                                        xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="rotate(-74 272.4 -114) scale(25.6137)"
                                                        xlink:href="#a" />
                                                    <use width="30" height="20"
                                                        transform="matrix(16 -19.968 19.968 16 256 230.4)"
                                                        xlink:href="#a" />
                                                </svg>
                                                中文 (繁體)
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button data-collapse-toggle="navbar-currency" type="button"
                                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden"
                                aria-controls="navbar-currency" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="">
                    <livewire:global.search/>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden md:flex md:items-center">
                    <div class="grid grid-cols-2 gap-3 my-3 w-full">
                        <button
                            class="w-full bg-yellowish rounded-lg text-center flex gap-3 items-center justify-center marker p-2 text-base">
                            <span>Log In</span>
                        </button>
                        <button
                            class="w-full border border-yellowish text-yellowish rounded-lg text-center flex gap-3 items-center justify-center p-2 text-base">
                            <span>Sign Up</span>
                        </button>
                    </div>
                    {{-- <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown> --}}
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home', ['set_id' => '6763889C-2A51-48F5-B540-01626C1345C2'])" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @if (auth()->check())
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                        x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>
            @endif

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
