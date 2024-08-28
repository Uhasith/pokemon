<x-app-layout>
    <div class="max-w-[1440px] mx-auto relative flex flex-col">
        <div class="my-8">
            <h3>All Categories > Pokemon Cards > Ancient Booster Energy Capsule</h3>
        </div>

        {{-- Second Section --}}
        <div class="flex gap-12">
            {{-- left Image section --}}
            <div class="w-1/3">
                <div class="flex w-full">
                    <div class="p-8 rounded-2xl bg-[radial-gradient(81.7%_81.7%_at_10.35%_28.75%,_#7E6A7E_8.33%,_#D5D5D5_37.5%,_#75888A_63.45%,_#896753_100%)] bg-[conic-gradient(from_219.88deg_at_88.77%_56.84%,_#000000_0deg,_#FFFFFF_30deg,_#000000_95.62deg,_#FFFFFF_168.75deg,_#000000_228.75deg,_#FFFFFF_285deg,_#000000_360deg)] bg-blend-screen bg-[conic-gradient(from_219.95deg_at_88.81%_56.89%,_#000000_0deg,_rgba(255,_255,_255,_0.72)_16.88deg,_#000000_88.12deg,_rgba(255,_255,_255,_0.72)_151.87deg,_#000000_225deg,_rgba(255,_255,_255,_0.72)_288.75deg,_#000000_360deg)]">
                        <img src="{{ asset('assets/card-images/pikachu50.png') }}" alt="">
                    </div>
                    <div class="relative">
                        <div class="bg-[#FFFFFF26] p-3 rounded-full w-auto absolute top-[50px] -ml-[20px] border-[5px] border-[solid] border-[#212121]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3 my-3">
                    <button class="w-1/2 bg-yellowish rounded-lg text-center flex gap-3 items-center justify-center marker p-3">
                        <span><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.4114 9.95108C19.2496 9.59309 18.8931 9.36304 18.5002 9.36304C18.1074 9.36304 17.7509 9.59309 17.589 9.95108L14.5988 16.565C14.5448 16.5994 14.4918 16.6378 14.4401 16.6806C14.2377 16.8481 14.0899 17.0552 13.9785 17.2833C13.764 17.7224 13.7027 18.1362 13.7854 18.5792C13.853 18.9417 14.0188 19.3086 14.1754 19.655L14.1983 19.7057C14.9887 21.4573 16.5767 22.7498 18.5 22.7498C20.4232 22.7498 22.0112 21.4573 22.8017 19.7057L22.8246 19.655C22.9812 19.3086 23.147 18.9417 23.2146 18.5792C23.2973 18.1362 23.236 17.7224 23.0215 17.2833C22.9101 17.0552 22.7622 16.8481 22.5599 16.6806C22.5085 16.638 22.4557 16.5998 22.4019 16.5655L19.4114 9.95108ZM20.0643 16.2498L18.5002 12.7904L16.9362 16.2498H20.0643Z" fill="#1B1B1B"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7.41145 9.95108C7.2496 9.59309 6.89312 9.36304 6.50025 9.36304C6.10737 9.36304 5.75089 9.59309 5.58904 9.95108L2.59883 16.565C2.54479 16.5994 2.49175 16.6378 2.44007 16.6806C2.23775 16.8481 2.08994 17.0552 1.97848 17.2833C1.76399 17.7224 1.70274 18.1362 1.78538 18.5792C1.85301 18.9417 2.01881 19.3086 2.17537 19.655L2.1983 19.7057C2.98874 21.4573 4.57675 22.7498 6.5 22.7498C8.42325 22.7498 10.0112 21.4573 10.8017 19.7057L10.8246 19.655C10.9812 19.3086 11.147 18.9417 11.2146 18.5792C11.2973 18.1362 11.236 17.7224 11.0215 17.2833C10.9101 17.0552 10.7622 16.8481 10.5599 16.6806C10.5085 16.638 10.4557 16.5998 10.4019 16.5655L7.41145 9.95108ZM8.06425 16.2498L6.50025 12.7904L4.93624 16.2498H8.06425Z" fill="#1B1B1B"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 3.24976C11.9477 3.24976 11.5 3.69747 11.5 4.24976C11.5 4.80204 11.9477 5.24976 12.5 5.24976C13.0523 5.24976 13.5 4.80204 13.5 4.24976C13.5 3.69747 13.0523 3.24976 12.5 3.24976ZM14.9599 5.96739C15.3003 5.48083 15.5 4.88861 15.5 4.24976C15.5 2.5929 14.1569 1.24976 12.5 1.24976C10.8431 1.24976 9.5 2.5929 9.5 4.24976C9.5 4.88861 9.69969 5.48083 10.0401 5.96739C9.37632 6.37274 8.76496 6.93996 8.22872 7.64364C7.37158 8.76843 6.41278 9.24976 5.5482 9.24976H4.5C3.94772 9.24976 3.5 9.69747 3.5 10.2498C3.5 10.802 3.94772 11.2498 4.5 11.2498H5.5482C7.21055 11.2498 8.70343 10.3204 9.81948 8.85587C10.6995 7.7011 11.6604 7.24976 12.5 7.24976C13.3396 7.24976 14.3005 7.7011 15.1805 8.85587C16.2966 10.3204 17.7895 11.2498 19.4518 11.2498H20.5C21.0523 11.2498 21.5 10.802 21.5 10.2498C21.5 9.69747 21.0523 9.24976 20.5 9.24976H19.4518C18.5872 9.24976 17.6284 8.76843 16.7713 7.64364C16.235 6.93996 15.6237 6.37274 14.9599 5.96739Z" fill="#1B1B1B"/></svg></span>
                        <span>Compare</span>
                    </button>
                    <button class="w-1/2 border border-yellowish text-yellowish rounded-lg text-center flex gap-3 items-center justify-center p-3">
                        <span><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17.812 1.93059C16.4686 1.74998 14.7479 1.74999 12.5572 1.75H12.4428C10.2521 1.74999 8.53144 1.74998 7.18802 1.93059C5.81137 2.11568 4.71911 2.50272 3.86091 3.36091C3.00272 4.21911 2.61568 5.31137 2.43059 6.68802C2.24998 8.03144 2.24999 9.75212 2.25 11.9428V12.0572C2.24999 14.2479 2.24998 15.9686 2.43059 17.312C2.61568 18.6886 3.00272 19.7809 3.86091 20.6391C4.71911 21.4973 5.81137 21.8843 7.18802 22.0694C8.53144 22.25 10.2521 22.25 12.4428 22.25H12.5572C14.7479 22.25 16.4686 22.25 17.812 22.0694C19.1886 21.8843 20.2809 21.4973 21.1391 20.6391C21.9973 19.7809 22.3843 18.6886 22.5694 17.312C22.75 15.9686 22.75 14.2479 22.75 12.0572V11.9428C22.75 9.7521 22.75 8.03144 22.5694 6.68802C22.3843 5.31137 21.9973 4.21911 21.1391 3.36091C20.2809 2.50272 19.1886 2.11568 17.812 1.93059ZM13.5 8C13.5 7.44772 13.0523 7 12.5 7C11.9477 7 11.5 7.44772 11.5 8V11H8.5C7.94772 11 7.5 11.4477 7.5 12C7.5 12.5523 7.94772 13 8.5 13H11.5V16C11.5 16.5523 11.9477 17 12.5 17C13.0523 17 13.5 16.5523 13.5 16V13H16.5C17.0523 13 17.5 12.5523 17.5 12C17.5 11.4477 17.0523 11 16.5 11H13.5V8Z" fill="#FFC107"/></svg></span>
                        <span>Add to Portfolio</span>
                    </button>
                </div>
            </div>

            {{-- right content section --}}
            <div class="w-2/3 px-3">
                <div>
                    <h1 class="font-manrope text-4xl font-bold text-white">Pikachu - SV05: Temporal Forces (TEF)</h1>
                </div>
                <div class="flex flex-row gap-2 items-center justify-start my-3">
                    <h3 class="font-manrope font-medium text-sm text-white">SV05: Temporal Forces</h3>

                    <a href="" class="flex gap-2 items-center justify-center text-yellowish font-manrope font-medium text-sm">
                        <span>All versions</span>
                        <span><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.66602 7.83337L14.666 1.83337M14.666 1.83337H11.1035M14.666 1.83337V5.39587" stroke="#FFC107" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.6673 8.50004C14.6673 11.6427 14.6673 13.2141 13.691 14.1904C12.7147 15.1667 11.1433 15.1667 8.00065 15.1667C4.85795 15.1667 3.28661 15.1667 2.3103 14.1904C1.33398 13.2141 1.33398 11.6427 1.33398 8.50004C1.33398 5.35734 1.33398 3.786 2.3103 2.80968C3.28661 1.83337 4.85795 1.83337 8.00065 1.83337" stroke="#FFC107" stroke-width="1.5" stroke-linecap="round"/></svg></span>
                    </a>
                </div>

                <div>
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-yellowish hover:text-yellowish dark:text-purple-500 dark:hover:text-purple-500 border-yellowish dark:border-yellowish" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b rounded-t-lg" id="prices-styled-tab" data-tabs-target="#styled-prices" type="button" role="tab" aria-controls="prices" aria-selected="false">Prices</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="market-styled-tab" data-tabs-target="#styled-market" type="button" role="tab" aria-controls="market" aria-selected="false">Market</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="auctions-styled-tab" data-tabs-target="#styled-auctions" type="button" role="tab" aria-controls="auctions" aria-selected="false">Auctions</button>
                            </li>
                            <li role="presentation">
                                <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="details-styled-tab" data-tabs-target="#styled-details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-styled-tab-content">
                        <div class="hidden p-4 rounded-lg bg-grayish" id="styled-prices" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                    <thead class="text-xs text-white uppercase bg-evengray">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                PSA
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Ungraded
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Grade 7
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Grade 8
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Grade 9
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                PSA 10
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                eBay
                                            </th>
                                            <td class="px-6 py-4">
                                                N/A
                                            </td>
                                            <td class="px-6 py-4">
                                                $79.94
                                            </td>
                                            <td class="px-6 py-4">
                                                $106.98
                                            </td>
                                            <td class="px-6 py-4">
                                                $129.55
                                            </td>
                                            <td class="px-6 py-4">
                                                $270.00
                                            </td>
                                        </tr>
                                        <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                AliExpress
                                            </th>
                                            <td class="px-6 py-4">
                                                N/A
                                            </td>
                                            <td class="px-6 py-4">
                                                $79.94
                                            </td>
                                            <td class="px-6 py-4">
                                                $106.98
                                            </td>
                                            <td class="px-6 py-4">
                                                $129.55
                                            </td>
                                            <td class="px-6 py-4">
                                                $270.00
                                            </td>
                                        </tr>
                                        <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                                Population
                                            </th>
                                            <td class="px-6 py-4">
                                                N/A
                                            </td>
                                            <td class="px-6 py-4">
                                                $79.94
                                            </td>
                                            <td class="px-6 py-4">
                                                $106.98
                                            </td>
                                            <td class="px-6 py-4">
                                                $129.55
                                            </td>
                                            <td class="px-6 py-4">
                                                $270.00
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-grayish dark:bg-gray-800" id="styled-market" role="tabpanel" aria-labelledby="market-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 ">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-grayish dark:bg-gray-800" id="styled-auctions" role="tabpanel" aria-labelledby="auctions-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 ">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-grayish dark:bg-gray-800" id="styled-details" role="tabpanel" aria-labelledby="details-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 ">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                    </div>
                </div>

                <div class="py-5">
                    <h2 class="font-manrope font-bold text-white text-xl mb-5">Market Price History</h2>

                    <div>
                        <div class="border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center bg-evengray rounded-t-xl" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="tabactive bg-yellowish rounded-b-lg text-black" data-tabs-inactive-classes="text-gray-500 hover:text-black hover:bg-yellowish hover:rounded-lg" role="tablist">
                                <li class="bg-grayish p-3 rounded-t-xl" role="presentation">
                                    <button class="inline-block p-4 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Price Changes - $</button>
                                </li>
                                <li class="bg-evengray p-3 rounded-t-xl" role="presentation">
                                    <button class="inline-block p-4 rounded-t-lg" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Number of Sales - Bar chart</button>
                                </li>
                                <li class="bg-evengray p-3 rounded-t-xl" role="presentation">
                                    <button class="inline-block p-4 rounded-t-lg" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Population</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-styled-tab-content">
                            <div class="hidden p-4 rounded-b-xl bg-grayish" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div id="chart-container" style="width: 90%; height: 300px; margin: auto;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-5">
                    <h2 class="font-manrope font-bold text-white text-xl mb-5">Current Price Points</h2>

                    <div class="w-2/5">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 !rounded-xl">
                                <thead class="text-xs text-white bg-evengray rounded-xl">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-base normal-case">
                                            Price Point
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-base text-end normal-case">
                                            Foil
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="rounded-xl">
                                    <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                            Market Price
                                        </th>
                                        <td class="px-6 py-4  text-end">
                                            $0.18
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                            Buylist Market Price
                                        </th>
                                        <td class="px-6 py-4  text-end">
                                            -
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                            Listed Median Price
                                        </th>
                                        <td class="px-6 py-4  text-end">
                                            $0.24
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Third Section --}}
        <div class="w-full !bg-blackish h-10">

        </div>
    </div>
</x-app-layout>
