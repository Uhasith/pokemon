<x-app-layout>
    <div class="w-full bg-darkblackbg">
        {{-- Single Product Details Section --}}
        <div class="max-w-[1440px] bg-darkbg mx-auto relative flex flex-col">
            <div class="my-12">
                <h3 class="flex gap-3 items-center font-manrope">
                    <span class="font-medium text-[#908F8C] text-sm">All Categories</span>
                    <span>
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M6 12.5L9.46967 9.03033C9.71967 8.78033 9.84467 8.65533 9.84467 8.5C9.84467 8.34467 9.71967 8.21967 9.46967 7.96967L6 4.5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                    </span>
                    <span class="font-medium text-[#908F8C] text-sm">Pokemon Cards</span>
                    <span>
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.5"><path d="M6 12.5L9.46967 9.03033C9.71967 8.78033 9.84467 8.65533 9.84467 8.5C9.84467 8.34467 9.71967 8.21967 9.46967 7.96967L6 4.5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></g></svg>
                    </span>
                    <span class="font-semibold text-white text-sm">Ancient Booster Energy Capsule</span>
                </h3>
            </div>

            <div class="flex gap-4">
                {{-- left Image section --}}
                <div class="w-4/12">
                    <div class="flex w-full">
                        {{-- <div class="p-8 rounded-2xl bg-[radial-gradient(81.7%_81.7%_at_10.35%_28.75%,_#7E6A7E_8.33%,_#D5D5D5_37.5%,_#75888A_63.45%,_#896753_100%)] bg-[conic-gradient(from_219.88deg_at_88.77%_56.84%,_#000000_0deg,_#FFFFFF_30deg,_#000000_95.62deg,_#FFFFFF_168.75deg,_#000000_228.75deg,_#FFFFFF_285deg,_#000000_360deg)] bg-blend-screen bg-[conic-gradient(from_219.95deg_at_88.81%_56.89%,_#000000_0deg,_rgba(255,_255,_255,_0.72)_16.88deg,_#000000_88.12deg,_rgba(255,_255,_255,_0.72)_151.87deg,_#000000_225deg,_rgba(255,_255,_255,_0.72)_288.75deg,_#000000_360deg)]"> --}}
                        <div class="p-8 rounded-2xl bg-[#414343] bg-blend-screen">
                            <img src="{{ asset('assets/card-images/pikachu50.png') }}" alt="">
                        </div>
                        <div class="relative">
                            <div class="bg-[#3D3D3D] p-3 rounded-full w-auto absolute top-[50px] -ml-[20px] border-[5px] border-[solid] border-[#212121]">
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
                    <div class="flex flex-col gap-3 my-3">
                        <button class="w-full border border-yellowish text-yellowish rounded-lg text-center flex gap-3 items-center justify-start p-3">
                            <span>
                                <svg width="59" height="36" viewBox="0 0 59 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="59" height="36" rx="5" fill="#FFC107"/><g clip-path="url(#clip0_318_18895)"><path d="M12.9482 12.9287C9.70369 12.9287 7 14.2724 7 18.3269C7 21.5389 8.81806 23.5615 13.0319 23.5615C17.9918 23.5615 18.3097 20.3717 18.3097 20.3717H15.9065C15.9065 20.3717 15.3912 22.0893 12.8853 22.0893C10.8443 22.0893 9.37641 20.7432 9.37641 18.8566H18.5612V17.6726C18.5612 15.8061 17.3475 12.9287 12.9482 12.9287ZM12.8643 14.4418C14.8071 14.4418 16.1316 15.6038 16.1316 17.3454H9.4295C9.4295 15.4964 11.1584 14.4418 12.8643 14.4418Z" fill="#1B1B1B"/><path d="M18.5598 9.00293V21.5258C18.5598 22.2366 18.5078 23.2347 18.5078 23.2347H20.8C20.8 23.2347 20.8824 22.5179 20.8824 21.8627C20.8824 21.8627 22.0149 23.5926 25.0943 23.5926C28.3371 23.5926 30.5398 21.3944 30.5398 18.2455C30.5398 15.3158 28.5166 12.9596 25.0996 12.9596C21.8998 12.9596 20.9056 14.6465 20.9056 14.6465V9.00293H18.5598ZM24.5079 14.5085C26.71 14.5085 28.1104 16.1042 28.1104 18.2455C28.1104 20.5416 26.4931 22.0437 24.5237 22.0437C22.1734 22.0437 20.9056 20.2519 20.9056 18.2658C20.9056 16.4152 22.0431 14.5085 24.5079 14.5085Z" fill="#1B1B1B"/><path d="M36.2371 12.9287C31.3561 12.9287 31.043 15.5379 31.043 15.955H33.4725C33.4725 15.955 33.5999 14.4317 36.0696 14.4317C37.6744 14.4317 38.918 15.1489 38.918 16.5275V17.0183H36.0696C32.2882 17.0183 30.2891 18.0983 30.2891 20.2901C30.2891 22.4469 32.1361 23.6204 34.6324 23.6204C38.0343 23.6204 39.1302 21.7852 39.1302 21.7852C39.1302 22.5152 39.1877 23.2345 39.1877 23.2345H41.3475C41.3475 23.2345 41.2639 22.3429 41.2639 21.7725V16.8419C41.2639 13.609 38.5928 12.9287 36.2371 12.9287ZM38.918 18.4905V19.1448C38.918 19.9982 38.3785 22.12 35.203 22.12C33.4641 22.12 32.7186 21.2727 32.7186 20.2899C32.7186 18.502 35.2292 18.4905 38.918 18.4905Z" fill="#1B1B1B"/><path d="M39.9531 13.3379H42.6863L46.6089 21.0104L50.5224 13.3379H52.9984L45.8699 26.9973H43.2727L45.3297 23.1895L39.9531 13.3379Z" fill="#1B1B1B"/></g><defs><clipPath id="clip0_318_18895"><rect width="46" height="18" fill="white" transform="translate(7 9)"/></clipPath></defs></svg>
                            </span>
                            <span>Buy the card right now on ebay</span>
                        </button>
                        <button class="w-full border border-yellowish text-yellowish rounded-lg text-center flex gap-3 items-center justify-start p-3">
                            <span>
                                <svg width="59" height="36" viewBox="0 0 59 36" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="59" height="36" rx="5" fill="#FFC107"/><rect width="24" height="28" transform="matrix(-1 0 0 1 42 4)" fill="url(#pattern0_318_18904)"/><defs><pattern id="pattern0_318_18904" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_318_18904" transform="matrix(0.00746269 0 0 0.00639659 0 0.0202559)"/></pattern><image id="image0_318_18904" width="134" height="150" xlink:href="data:image/png;base64,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"/></defs></svg>
                            </span>
                            <span>Buy the card right now on TCG player </span>
                        </button>
                    </div>
                </div>

                {{-- right content section --}}
                <div class="w-6/12 px-3 ml-5">
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
                        <div class="mb-4 border-b border-evengray">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-yellowish hover:text-yellowish dark:text-purple-500 dark:hover:text-purple-500 border-yellowish dark:border-yellowish" data-tabs-inactive-classes="text-white hover:text-yellowish dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg" id="prices-styled-tab" data-tabs-target="#styled-prices" type="button" role="tab" aria-controls="prices" aria-selected="false">Prices</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b border-evengray rounded-t-lg hover:text-yellowish hover:border-yellowish" id="market-styled-tab" data-tabs-target="#styled-market" type="button" role="tab" aria-controls="market" aria-selected="false">Market</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b border-evengray rounded-t-lg hover:text-yellowish hover:border-yellowish" id="auctions-styled-tab" data-tabs-target="#styled-auctions" type="button" role="tab" aria-controls="auctions" aria-selected="false">Auctions</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b border-evengray rounded-t-lg hover:text-yellowish hover:border-yellowish" id="details-styled-tab" data-tabs-target="#styled-details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-styled-tab-content">
                            <div class="hidden" id="styled-prices" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="relative overflow-x-auto sm:rounded-lg">
                                    {{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500">
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
                                    </table> --}}

                                    <div class="w-full flex gap-5 my-3">
                                        <div class="w-10/12 bg-[#27292B] rounded-xl p-4 overflow-x-auto">
                                            <div class="flex justify-start w-full mb-3">
                                                <h2 class="font-manrope font-bold text-base text-white">PSA Population price</h2>
                                            </div>
                                            <div class="grid grid-cols-10 gap-4 w-full">
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA10</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$67</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA9</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$453</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA8</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$364</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA7</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$230</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA6</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$203</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA5</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$154</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA4</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$59</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA3</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$37</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA2</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$10</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA1</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$17</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-2/12 bg-[#27292B] rounded-xl p-4">
                                            <div class="flex justify-center w-full mb-3 flex-col gap-1 items-center">
                                                <h2 class="font-manrope font-bold text-base text-white">Fair Price</h2>
                                                <h2 class="font-manrope font-bold text-lg text-yellowish">$1494.24</h2>
                                                <h2 class="font-manrope font-bold text-sm text-[#BEBFBF]">3D Volume</h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full flex gap-5 my-5">
                                        <div class="w-10/12 bg-[#27292B] rounded-xl p-4 overflow-x-auto flex flex-col justify-between">
                                            <div class="flex justify-start w-full mb-3">
                                                <h2 class="font-manrope font-bold text-base text-white">PSA Population price</h2>
                                            </div>
                                            <div class="flex gap-4 w-full">
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA total population</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">1860</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA 10 chance</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">14.13%</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA 9/10 Ratio</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">5.99:1</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA Grade Difficulty</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">Very Hard</h4>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="grid grid-cols-10 gap-4 w-full">
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA10</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$67</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA9</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$453</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA8</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$364</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA7</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$230</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA6</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$203</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA5</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$154</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA4</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$59</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA3</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$37</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA2</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$10</h4>
                                                </div>
                                                <div class="w-full flex flex-col gap-2 justify-center">
                                                    <h4 class="font-manrope font-semibold text-sm text-[#BEBFBF]">PSA1</h4>
                                                    <h4 class="font-manrope font-semibold text-sm text-white">$17</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-2/12 bg-[#27292B] rounded-xl p-4">
                                            <div class="flex justify-center w-full mb-3 flex-col gap-1 items-center">
                                                <h2 class="font-manrope font-bold text-base text-white">PSA Market Cap</h2>
                                                <h2 class="font-manrope font-bold text-sm text-[#BEBFBF]">Market Cap Rating</h2>
                                                <h2 class="font-manrope font-bold text-lg text-yellowish">#193/29344</h2>
                                                <h2 class="font-manrope font-bold text-sm text-[#BEBFBF] mt-2">Total PSA Market Cap</h2>
                                                <h2 class="font-manrope font-bold text-lg text-yellowish">$1,244.014</h2>
                                            </div>
                                        </div>
                                    </div>
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

                        <div class="w-3/5">
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

                <div class="w-/12 h-fit ml-2">
                    <div class="w-full h-[100vh] rounded-3xl bg-addbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- Second Section --}}
        <div class="w-full bg-blackish py-12">
            <div class="max-w-[1440px] bg-blackish flex relative mx-auto flex-row gap-12 items-center justify-center">
                <div class="w-10/12">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-white uppercase bg-evengray">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                        Sale Price (USD)
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                        Grade
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                        #Bids
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                        Date Sold
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                        Listing ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-yellowish font-manrope font-semibold text-sm normal-case">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                                <tr class="odd:bg-oddgray text-white even:bg-evengray">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        $54.00
                                    </th>
                                    <td class="px-6 py-4">
                                        Raw
                                    </td>
                                    <td class="px-6 py-4">
                                        No Auction
                                    </td>
                                    <td class="px-6 py-4">
                                        13 Jun 2024
                                    </td>
                                    <td class="px-6 py-4">
                                        405034296439nichmcg-38
                                    </td>
                                    <td class="px-6 py-4">
                                        Walking Wake ex 205/162 Pokemon Temporal Forces Special Illustration Rare (CB)
                                    </td>
                                    <td class="px-6 py-4">
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.04" cx="21" cy="21" r="21" fill="white"/><g opacity="0.8"><path d="M15.2734 10.917C15.6531 10.917 15.9609 11.2248 15.9609 11.6045V13.3003L17.5382 12.9849C19.0512 12.6823 20.6195 12.8263 22.0521 13.3993L22.2388 13.474C23.6699 14.0464 25.2449 14.1533 26.7402 13.7795C27.4344 13.6059 28.1068 14.1309 28.1068 14.8465V21.5996C28.1068 22.1902 27.7048 22.705 27.1318 22.8482L26.9352 22.8974C25.3132 23.3029 23.6045 23.1869 22.0521 22.566C20.6195 21.9929 19.0512 21.8489 17.5382 22.1515L15.9609 22.467V29.9378C15.9609 30.3175 15.6531 30.6253 15.2734 30.6253C14.8937 30.6253 14.5859 30.3175 14.5859 29.9378V11.6045C14.5859 11.2248 14.8937 10.917 15.2734 10.917Z" fill="white"/></g></svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="w-full flex justify-center items-center my-8">
                        <nav aria-label="Page navigation example">
                            <ul class="flex items-center -space-x-px h-10 text-base">
                            <li>
                                <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-black rounded-lg bg-yellowish">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500">5</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500">
                                <span class="sr-only">Next</span>
                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                </a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="2/12 h-full">
                    <div class="w-full h-full rounded-3xl bg-darkblackbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- Third Section --}}
        <div class="w-full bg-darkblackbg py-12">
            <div class="max-w-[1440px] bg-darkblackbg flex relative mx-auto flex-row gap-12 items-center justify-center">
                <div class="w-10/12">
                    <div class="w-full grid grid-cols-4 gap-5 items-center justify-center">
                        {{-- Item - 01 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path d="M27.1358 23.1397C29.4503 20.8252 30.6075 19.668 32.0455 19.668C33.4836 19.668 34.6408 20.8252 36.9553 23.1397L42.847 29.0314C45.1615 31.3459 46.3187 32.5031 46.3187 33.9411C46.3187 35.3792 45.1615 36.5364 42.847 38.8509C40.5325 41.1654 39.3753 42.3226 37.9372 42.3226C36.4992 42.3226 35.342 41.1654 33.0275 38.8509L27.1358 32.9592C24.8213 30.6447 23.6641 29.4875 23.6641 28.0494C23.6641 26.6114 24.8213 25.4542 27.1358 23.1397Z" fill="#FFC107"/><path d="M26.7094 35.3602L20.7651 41.3045C20.3086 41.7611 20.0803 41.9894 19.9431 42.2269C19.571 42.8714 19.571 43.6654 19.9431 44.3099C20.0803 44.5474 20.3085 44.7757 20.7651 45.2323C21.2217 45.6888 21.45 45.9172 21.6875 46.0543C22.332 46.4264 23.1261 46.4264 23.7706 46.0543C24.0081 45.9172 24.2363 45.6889 24.6929 45.2323L30.6372 39.288L26.7094 35.3602Z" fill="#FFC107"/><path d="M28.1236 33.946L28.1295 33.9402L32.0573 37.868L32.0514 37.8738L28.1236 33.946Z" fill="#FFC107"/><path d="M43.2221 26.5771C43.5618 25.9434 43.5511 25.1772 43.19 24.5518C43.0529 24.3143 42.8246 24.086 42.368 23.6294C41.9114 23.1728 41.6831 22.9445 41.4457 22.8074C40.8203 22.4463 40.054 22.4356 39.4203 22.7753L43.2221 26.5771Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Type</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">Pokémon</h3>
                            </div>
                        </div>

                        {{-- Item - 02 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path fill-rule="evenodd" clip-rule="evenodd" d="M32.9974 47.3337C25.0813 47.3337 18.6641 40.9165 18.6641 33.0003C18.6641 25.0842 25.0813 18.667 32.9974 18.667C40.9135 18.667 47.3307 25.0842 47.3307 33.0003C47.3307 40.9165 40.9135 47.3337 32.9974 47.3337ZM34.7095 26.6614C34.3331 25.8988 33.7438 25.3337 32.9955 25.3337C32.2481 25.3337 31.6569 25.8978 31.277 26.6598L30.0215 29.1915L30.0196 29.1954C29.9814 29.274 29.8909 29.3846 29.7553 29.486C29.62 29.5872 29.4891 29.6422 29.4058 29.6567L27.1323 30.0375C26.3101 30.1757 25.6228 30.5789 25.4005 31.2806C25.1789 31.9803 25.5052 32.7079 26.0922 33.2998L27.8606 35.0827C27.9306 35.1534 28.0091 35.2865 28.0583 35.4598C28.1072 35.6319 28.1115 35.7886 28.0893 35.8899L28.089 35.8914L27.5836 38.095C27.3732 39.0115 27.4462 39.9195 28.0927 40.3951C28.742 40.8729 29.6281 40.665 30.4331 40.1834L32.5611 38.9131L32.5625 38.9125C32.6578 38.8569 32.8149 38.8142 32.9991 38.8142C33.1847 38.8142 33.3385 38.8575 33.4279 38.911L35.5602 40.1837C36.3662 40.6637 37.2534 40.8751 37.9026 40.3979C38.5495 39.9225 38.619 39.0127 38.4094 38.0954L37.9038 35.8914L37.9035 35.8899C37.8813 35.7886 37.8857 35.6319 37.9345 35.4598C37.9837 35.2865 38.0622 35.1534 38.1322 35.0827L39.8993 33.3011C40.4901 32.7093 40.8181 31.9805 40.5946 31.2797C40.371 30.5783 39.6823 30.1756 38.8607 30.0376L36.5861 29.6565C36.4987 29.6418 36.3659 29.5862 36.2302 29.4853C36.0945 29.3842 36.0042 29.2738 35.9661 29.1954L34.7095 26.6614Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Retreat</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">X1</h3>
                            </div>
                        </div>

                        {{-- Item - 03 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path fill-rule="evenodd" clip-rule="evenodd" d="M23.3055 20.6169C23.7127 20.218 24.2844 19.9579 25.364 19.8157C26.4753 19.6693 27.9482 19.667 30.0601 19.667H35.9451C38.057 19.667 39.5299 19.6693 40.6412 19.8157C41.7208 19.9579 42.2925 20.218 42.6997 20.6169C43.1069 21.0159 43.3724 21.576 43.5175 22.6337C43.6669 23.7224 43.6693 25.1655 43.6693 27.2346V37.685L26.7968 37.685C25.5933 37.6846 24.7722 37.6843 24.0679 37.8692C23.4383 38.0345 22.8542 38.3045 22.3359 38.6593V27.2346C22.3359 25.1655 22.3383 23.7224 22.4877 22.6337C22.6328 21.576 22.8983 21.0159 23.3055 20.6169ZM27.1175 24.712C26.5081 24.712 26.0141 25.1961 26.0141 25.7931C26.0141 26.3902 26.5081 26.8742 27.1175 26.8742H38.8877C39.4971 26.8742 39.9911 26.3902 39.9911 25.7931C39.9911 25.1961 39.4971 24.712 38.8877 24.712H27.1175ZM26.0141 30.8382C26.0141 30.2411 26.5081 29.7571 27.1175 29.7571H34.4739C35.0833 29.7571 35.5773 30.2411 35.5773 30.8382C35.5773 31.4352 35.0833 31.9192 34.4739 31.9192H27.1175C26.5081 31.9192 26.0141 31.4352 26.0141 30.8382Z" fill="#FFC107"/><path d="M26.9672 39.8472C25.5279 39.8472 25.0247 39.8565 24.6391 39.9577C23.5808 40.2355 22.7371 41.0062 22.3753 42.008C22.3977 42.518 22.4327 42.9665 22.4877 43.367C22.6328 44.4247 22.8983 44.9848 23.3055 45.3837C23.7127 45.7827 24.2844 46.0428 25.364 46.185C26.4753 46.3314 27.9482 46.3337 30.0601 46.3337H35.9451C38.057 46.3337 39.5299 46.3314 40.6412 46.185C41.7208 46.0428 42.2925 45.7827 42.6997 45.3837C42.9885 45.1008 43.2061 44.7367 43.3599 44.1715H27.1175C26.5081 44.1715 26.0141 43.6875 26.0141 43.0904C26.0141 42.4934 26.5081 42.0093 27.1175 42.0093H43.6298C43.6571 41.388 43.6655 40.6755 43.6681 39.8472H26.9672Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Form</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">Basic</h3>
                            </div>
                        </div>

                        {{-- Item - 04 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path d="M24.562 30.2195L28.6448 24.6954C31.284 21.1247 32.6035 19.3393 33.8347 19.7166C35.0658 20.0939 35.0658 22.2836 35.0658 26.6631V27.0761C35.0658 28.6557 35.0658 29.4455 35.5706 29.9409L35.5973 29.9665C36.1129 30.4515 36.9349 30.4515 38.5789 30.4515C41.5374 30.4515 43.0167 30.4515 43.5166 31.3487C43.5249 31.3636 43.5329 31.3786 43.5408 31.3937C44.0127 32.3048 43.1562 33.4636 41.4432 35.7812L37.3603 41.3052C34.7211 44.876 33.4015 46.6613 32.1704 46.284C30.9392 45.9067 30.9393 43.717 30.9393 39.3374L30.9393 38.9247C30.9394 37.345 30.9394 36.5552 30.4347 36.0598L30.408 36.0342C29.8923 35.5492 29.0703 35.5492 27.4263 35.5492C24.4678 35.5492 22.9885 35.5492 22.4886 34.652C22.4803 34.6371 22.4723 34.6221 22.4645 34.607C21.9925 33.6959 22.849 32.5371 24.562 30.2195Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Typings</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">Lightning</h3>
                            </div>
                        </div>

                        {{-- Item - 05 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path fill-rule="evenodd" clip-rule="evenodd" d="M36.8938 20.2382C34.6879 18.1433 31.3069 18.1433 29.1009 20.2382C27.3943 21.859 25.3031 24.0931 23.6324 26.6557C21.9693 29.2069 20.6641 32.1733 20.6641 35.2377C20.6641 41.1949 25.3406 47.3337 32.9974 47.3337C40.6542 47.3337 45.3307 41.1949 45.3307 35.2377C45.3307 32.1733 44.0255 29.2069 42.3623 26.6557C40.6917 24.0931 38.6005 21.859 36.8938 20.2382ZM36.9974 35.6669C36.9974 37.8761 35.2066 39.6669 32.9974 39.6669C32.261 39.6669 31.6641 40.2639 31.6641 41.0002C31.6641 41.7366 32.261 42.3335 32.9974 42.3335C36.6793 42.3335 39.6641 39.3489 39.6641 35.6669C39.6641 34.9306 39.0671 34.3335 38.3307 34.3335C37.5943 34.3335 36.9974 34.9306 36.9974 35.6669Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">HP</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">50</h3>
                            </div>
                        </div>

                        {{-- Item - 06 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path d="M33.5344 27.7731V19.6878C33.5344 19.0163 33.1008 18.4371 32.4554 18.2472C31.6272 18.0078 30.6442 18.0067 29.8106 18.2483C29.168 18.4371 28.7344 19.0163 28.7344 19.6878V26.0665H29.801C30.9776 26.0665 31.9344 27.0232 31.9344 28.1998C31.9344 28.9752 31.6938 29.7107 31.2629 30.3283C32.5168 30.2627 33.5344 29.1177 33.5344 27.7731Z" fill="#FFC107"/><path d="M27.6672 20.733C27.6672 20.0615 27.2336 19.4823 26.5883 19.2924C25.7915 19.0519 24.7397 19.053 23.9493 19.2914C23.3008 19.4823 22.8672 20.0615 22.8672 20.733V26.0663H27.6672V20.733Z" fill="#FFC107"/><path d="M37.1274 30.3302C38.3813 30.2672 39.4016 29.12 39.4016 27.7744V20.7334C39.4016 20.0608 38.9685 19.4816 38.3242 19.2923C37.9125 19.1707 37.4677 19.1094 37.0016 19.1094C36.5354 19.1094 36.0906 19.1707 35.6794 19.2923C35.0346 19.4816 34.6016 20.0608 34.6016 20.7334V27.935C34.6016 28.5995 34.8661 29.2171 35.3461 29.6736C35.8266 30.1302 36.4528 30.3622 37.1274 30.3302Z" fill="#FFC107"/><path d="M42.9907 30.3302C44.2446 30.2673 45.2648 29.1201 45.2648 27.7745V22.3574C45.2648 21.6849 44.8318 21.1051 44.1875 20.9158C43.7752 20.7947 43.3304 20.7334 42.8648 20.7334C42.3992 20.7334 41.9544 20.7947 41.5416 20.9163C40.8979 21.1051 40.4648 21.6849 40.4648 22.3574V27.935C40.4648 28.5995 40.7294 29.2171 41.2094 29.6737C41.6899 30.1302 42.3176 30.3622 42.9907 30.3302Z" fill="#FFC107"/><path d="M20.7344 35.6666C20.7344 42.4309 26.2373 47.9333 33.001 47.9333C39.7648 47.9333 45.2677 42.4309 45.2677 35.6666V30.3685C44.6821 30.9642 43.904 31.3525 43.0474 31.3957C42.9866 31.3989 42.9258 31.3999 42.8656 31.3999C41.9696 31.3999 41.1274 31.065 40.4768 30.4463C40.2512 30.2319 40.0624 29.9909 39.9056 29.7333C39.3141 30.6826 38.3136 31.3386 37.1808 31.3957C37.12 31.3989 37.0592 31.3999 36.9989 31.3999C36.1029 31.3999 35.2608 31.065 34.6101 30.4463C34.3845 30.2319 34.1957 29.9909 34.0384 29.7327C33.4474 30.6815 32.4474 31.337 31.3157 31.3941C31.2533 31.3973 31.1909 31.3994 31.129 31.3994C30.8448 31.3994 30.5637 31.3519 30.2858 31.281C29.6714 31.6959 28.9456 31.9333 28.2005 31.9333H26.2336C26.5008 33.0527 26.8565 35.2794 26.0106 36.9717C25.9173 37.1589 25.729 37.2666 25.5328 37.2666C25.4528 37.2666 25.3712 37.2485 25.2949 37.2106C25.0314 37.0789 24.9248 36.7583 25.0565 36.4949C26.0133 34.5813 25.0373 31.5983 25.0277 31.569C24.9733 31.4063 25.001 31.2271 25.1013 31.0885C25.2016 30.9493 25.3626 30.8671 25.5338 30.8671H28.2005C28.808 30.8671 29.3802 30.6682 29.8554 30.2917C29.8554 30.2917 29.8565 30.2917 29.857 30.2911C30.4992 29.7807 30.8677 29.0191 30.8677 28.2005C30.8677 27.6122 30.3893 27.1338 29.801 27.1338H22.8677C21.6912 27.1338 20.7344 28.0906 20.7344 29.2671V35.6666Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Weakness</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">X2</h3>
                            </div>
                        </div>

                        {{-- Item - 07 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path d="M27.3307 20.333C27.3307 19.7807 26.883 19.333 26.3307 19.333C25.7784 19.333 25.3307 19.7807 25.3307 20.333V22.4387C23.4116 22.5924 22.1518 22.9695 21.2262 23.8951C20.3006 24.8207 19.9234 26.0806 19.7697 27.9997H46.225C46.0714 26.0806 45.6942 24.8207 44.7686 23.8951C43.843 22.9695 42.5832 22.5924 40.6641 22.4387V20.333C40.6641 19.7807 40.2163 19.333 39.6641 19.333C39.1118 19.333 38.6641 19.7807 38.6641 20.333V22.3502C37.777 22.333 36.7828 22.333 35.6641 22.333H30.3307C29.212 22.333 28.2177 22.333 27.3307 22.3502V20.333Z" fill="#FFC107"/><path fill-rule="evenodd" clip-rule="evenodd" d="M19.6641 32.9997C19.6641 31.881 19.6641 30.8867 19.6813 29.9997H46.3135C46.3307 30.8867 46.3307 31.881 46.3307 32.9997V35.6663C46.3307 40.6947 46.3307 43.2088 44.7686 44.7709C43.2065 46.333 40.6924 46.333 35.6641 46.333H30.3307C25.3024 46.333 22.7883 46.333 21.2262 44.7709C19.6641 43.2088 19.6641 40.6947 19.6641 35.6663V32.9997ZM39.6641 35.6663C40.4004 35.6663 40.9974 35.0694 40.9974 34.333C40.9974 33.5966 40.4004 32.9997 39.6641 32.9997C38.9277 32.9997 38.3307 33.5966 38.3307 34.333C38.3307 35.0694 38.9277 35.6663 39.6641 35.6663ZM39.6641 40.9997C40.4004 40.9997 40.9974 40.4027 40.9974 39.6663C40.9974 38.93 40.4004 38.333 39.6641 38.333C38.9277 38.333 38.3307 38.93 38.3307 39.6663C38.3307 40.4027 38.9277 40.9997 39.6641 40.9997ZM34.3307 34.333C34.3307 35.0694 33.7338 35.6663 32.9974 35.6663C32.261 35.6663 31.6641 35.0694 31.6641 34.333C31.6641 33.5966 32.261 32.9997 32.9974 32.9997C33.7338 32.9997 34.3307 33.5966 34.3307 34.333ZM34.3307 39.6663C34.3307 40.4027 33.7338 40.9997 32.9974 40.9997C32.261 40.9997 31.6641 40.4027 31.6641 39.6663C31.6641 38.93 32.261 38.333 32.9974 38.333C33.7338 38.333 34.3307 38.93 34.3307 39.6663ZM26.3307 35.6663C27.0671 35.6663 27.6641 35.0694 27.6641 34.333C27.6641 33.5966 27.0671 32.9997 26.3307 32.9997C25.5943 32.9997 24.9974 33.5966 24.9974 34.333C24.9974 35.0694 25.5943 35.6663 26.3307 35.6663ZM26.3307 40.9997C27.0671 40.9997 27.6641 40.4027 27.6641 39.6663C27.6641 38.93 27.0671 38.333 26.3307 38.333C25.5943 38.333 24.9974 38.93 24.9974 39.6663C24.9974 40.4027 25.5943 40.9997 26.3307 40.9997Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Release Date</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">1997-07-01</h3>
                            </div>
                        </div>

                        {{-- Item - 08 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path fill-rule="evenodd" clip-rule="evenodd" d="M31.4598 46.246C24.8202 45.4836 19.6641 39.8441 19.6641 33.0003C19.6641 25.6365 25.6336 19.667 32.9974 19.667C40.3612 19.667 46.3307 25.6365 46.3307 33.0003C46.3307 39.8757 41.9538 39.3103 38.2154 38.8274C36.0593 38.5488 34.1155 38.2978 33.3466 39.5176C32.8207 40.3518 33.3892 41.3921 34.0865 42.0894C34.9578 42.9607 34.9578 44.3733 34.0865 45.2446C33.3892 45.9419 32.4395 46.3585 31.4598 46.246ZM31.7774 26.3333C31.7774 27.4379 30.882 28.3333 29.7774 28.3333C28.6728 28.3333 27.7774 27.4379 27.7774 26.3333C27.7774 25.2288 28.6728 24.3333 29.7774 24.3333C30.882 24.3333 31.7774 25.2288 31.7774 26.3333ZM25.6641 34.3336C26.7686 34.3336 27.6641 33.4382 27.6641 32.3336C27.6641 31.2291 26.7686 30.3336 25.6641 30.3336C24.5595 30.3336 23.6641 31.2291 23.6641 32.3336C23.6641 33.4382 24.5595 34.3336 25.6641 34.3336ZM40.3307 34.3336C41.4353 34.3336 42.3307 33.4382 42.3307 32.3336C42.3307 31.2291 41.4353 30.3336 40.3307 30.3336C39.2262 30.3336 38.3307 31.2291 38.3307 32.3336C38.3307 33.4382 39.2262 34.3336 40.3307 34.3336ZM36.3307 28.3336C37.4353 28.3336 38.3307 27.4382 38.3307 26.3336C38.3307 25.2291 37.4353 24.3336 36.3307 24.3336C35.2262 24.3336 34.3307 25.2291 34.3307 26.3336C34.3307 27.4382 35.2262 28.3336 36.3307 28.3336Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Artist</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">Kagemaru Himeno</h3>
                            </div>
                        </div>

                        {{-- Item - 09 --}}
                        <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D]">
                            <div>
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08"/><path d="M46.0804 22.2531C44.3338 26.6131 40.3471 32.3065 36.5471 36.0265C36.0004 32.5865 33.2538 29.8931 29.7871 29.4131C33.5204 25.5998 39.2538 21.5598 43.6271 19.7998C44.4004 19.5065 45.1738 19.7331 45.6538 20.2131C46.1604 20.7198 46.4004 21.4798 46.0804 22.2531Z" fill="#FFC107"/><path d="M35.3734 37.1199C35.1067 37.3466 34.84 37.5733 34.5734 37.7866L32.1867 39.6933C32.1867 39.6533 32.1734 39.5999 32.1734 39.5466C31.9867 38.1199 31.32 36.7999 30.24 35.7199C29.1467 34.6266 27.7867 33.9599 26.2934 33.7733C26.2534 33.7733 26.2 33.7599 26.16 33.7599L28.0934 31.3199C28.28 31.0799 28.48 30.8533 28.6934 30.6133L29.6 30.7333C32.4667 31.1333 34.7734 33.3866 35.2267 36.2399L35.3734 37.1199Z" fill="#FFC107"/><path d="M30.9057 40.4934C30.9057 41.9601 30.3457 43.3601 29.279 44.4134C28.4657 45.2401 27.3724 45.8001 26.039 45.9601L22.7724 46.3201C20.9857 46.5201 19.4524 44.9868 19.6524 43.1868L20.0124 39.9068C20.3324 36.9868 22.7724 35.1201 25.359 35.0668C25.6124 35.0534 25.8924 35.0668 26.159 35.0934C27.2924 35.2401 28.3857 35.7601 29.3057 36.6668C30.199 37.5601 30.7057 38.6134 30.8524 39.7201C30.879 39.9868 30.9057 40.2401 30.9057 40.4934Z" fill="#FFC107"/></svg>
                            </div>
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Regulation mark</h5>
                                <h3 class="font-manrope font-semibold text-base text-white">D</h3>
                            </div>
                        </div>

                    </div>

                    <div class="my-12">
                        <h2 class="font-manrope font-bold text-xl text-white mb-2">Battle sense (Ability)</h2>
                        <h3 class="font-manrope font-medium text-base text-white">Once during your turn, you may look at the top 3 cards of your deck and put 1 of them into your hand. Discard the other cards</h3>
                    </div>
                    <div>
                        <h2 class="font-manrope font-bold text-xl text-white mb-2">Royal Blaze : 100</h2>
                        <h3 class="font-manrope font-medium text-base text-white">This attack does more damage  for each Leon card in your discard pile.</h3>
                    </div>
                </div>
                <div class="2/12 h-full">
                    <div class="w-full h-full rounded-3xl bg-addbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- Fourth Section --}}
        <div class="w-full bg-blackish py-12">
            <div class="max-w-[1440px] bg-blackish flex relative mx-auto flex-row gap-12 items-center justify-center">
                <div class="w-10/12">
                    <div>
                        <h2 class="font-manrope font-bold text-center text-3xl text-white">Similar Cards to Pikachu</h2>
                    </div>
                    <div class="grid grid-cols-5 gap-5 my-12">
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/Flareon.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikashuelectro.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h2 class="font-manrope font-bold text-center text-3xl text-white">Similar Cards from Wizards Black Star Promos </h2>
                    </div>
                    <div class="grid grid-cols-5 gap-5 my-12">
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikachuthunder.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/pikashuelectro.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/starly.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/zapdos.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="p-6 rounded-2xl bg-[#2C2C2C] bg-blend-screen">
                                <img src="{{ asset('assets/card-images/prinpulp.png') }}" alt="">
                            </div>
                            <div class="relative">
                                <div class="bg-[#555555e3] p-2 rounded-full w-auto absolute top-[10px] -ml-[50px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4626 4.99415C16.7809 3.34923 14.4404 4.01211 13.0344 5.06801C12.4578 5.50096 12.1696 5.71743 12 5.71743C11.8304 5.71743 11.5422 5.50096 10.9656 5.06801C9.55962 4.01211 7.21909 3.34923 4.53744 4.99415C1.01807 7.15294 0.221721 14.2749 8.33953 20.2834C9.88572 21.4278 10.6588 22 12 22C13.3412 22 14.1143 21.4278 15.6605 20.2834C23.7783 14.2749 22.9819 7.15294 19.4626 4.99415Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="2/12 h-full">
                    <div class="w-full h-full rounded-3xl bg-darkblackbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- Fifth Section --}}
        <div class="w-full bg-darkblackbg py-12">
            <div class="max-w-[1440px] bg-darkblackbg flex relative mx-auto flex-row gap-12 items-center justify-center">
                <div class="w-10/12">
                    <div class="mt-8">
                        <h2 class="font-manrope font-bold text-center text-3xl text-white">Auctions ending soon for Pikachu - SV05: Temporal Forces (TEF)</h2>
                    </div>
                    <div class="my-8">
                        <div class="mb-4">
                            <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-yellowish hover:text-yellowish border-yellowish" data-tabs-inactive-classes="dark:border-transparent text-white hover:text-yellowish" role="tablist">
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg" id="All-styled-tab" data-tabs-target="#styled-All" type="button" role="tab" aria-controls="All" aria-selected="false">All</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Ungraded-styled-tab" data-tabs-target="#styled-Ungraded" type="button" role="tab" aria-controls="Ungraded" aria-selected="false">Ungraded</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Grade-7-styled-tab" data-tabs-target="#styled-Grade-7" type="button" role="tab" aria-controls="Grade-7" aria-selected="false">Grade 7</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Grade-8-styled-tab" data-tabs-target="#styled-Grade-8" type="button" role="tab" aria-controls="Grade-8" aria-selected="false">Grade 8</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Grade-9-styled-tab" data-tabs-target="#styled-Grade-9" type="button" role="tab" aria-controls="Grade-9" aria-selected="false">Grade 9</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Grade-95-styled-tab" data-tabs-target="#styled-Grade-95" type="button" role="tab" aria-controls="Grade-95" aria-selected="false">Grade 9.5</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="psa10-styled-tab" data-tabs-target="#styled-psa10" type="button" role="tab" aria-controls="psa10" aria-selected="false">PSA 10</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-styled-tab-content">

                            <div class="hidden p-4 rounded-lg" id="styled-All" role="tabpanel" aria-labelledby="All-tab">
                                <div class="grid gap-5 grid-cols-3">

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Iron Thorns - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Flutter Mane - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Munkidori - SV06: Twilight Masquerade (TWM)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareon.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Iron Thorns - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonflash.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Flutter Mane - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareonfire.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Munkidori - SV06: Twilight Masquerade (TWM)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/Flareon.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Iron Valiant - 080/162 - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 items-center w-full rounded-lg bg-[#262626] p-5">
                                        <div class="w-1/3">
                                            <img src="{{ asset('assets/card-images/pikachu60.png') }}" alt="">
                                        </div>
                                        <div class="w-2/3 relative">
                                            <div class="flex items-center justify-center gap-2 w-full h-10 bg-no-repeat bg-center bg-contain absolute -top-11" style="background-image: url('{{ asset('assets/card-images/timebanner.png') }}');">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 10.833C17.5 14.9751 14.1421 18.333 10 18.333C5.85786 18.333 2.5 14.9751 2.5 10.833C2.5 6.69087 5.85786 3.33301 10 3.33301C14.1421 3.33301 17.5 6.69087 17.5 10.833Z" stroke="#1B1B1B" stroke-width="1.8"/><path d="M10 10.8333V7.5" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33594 1.66699H11.6693" stroke="#1B1B1B" stroke-width="1.8" stroke-linecap="round"/></svg>
                                                <h3 class="font-manrope font-bold text-sm text-black">Ends on 3d 7h 19m</h3>
                                            </div>
                                            <div class="flex flex-col">
                                                <h3 class="font-manrope font-semibold text-base text-white truncate max-w-xs">Iron Thorns - SV05: Temporal Forces (TEF)</h3>
                                                <h4 class="font-manrope font-semibold text-lg text-yellowish mb-2">$2.25</h4>
                                                <button class="w-full rounded-lg py-2 border border-[#FFC1071F] bg-[#FFC1070D] flex justify-center items-center">
                                                    <svg width="50" height="20" viewBox="0 0 50 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_318_19463)"><path d="M6.5025 4.36523C2.98285 4.36523 0.0499268 5.85825 0.0499268 10.3632C0.0499268 13.9322 2.02213 16.1795 6.59321 16.1795C11.9737 16.1795 12.3186 12.6352 12.3186 12.6352H9.71156C9.71156 12.6352 9.15264 14.5437 6.43426 14.5437C4.22021 14.5437 2.62783 13.048 2.62783 10.9518H12.5914V9.63621C12.5914 7.56231 11.2748 4.36523 6.5025 4.36523ZM6.41145 6.0465C8.51898 6.0465 9.95573 7.33761 9.95573 9.2727H2.68542C2.68542 7.21827 4.56092 6.0465 6.41145 6.0465Z" fill="#E53238"/><path d="M12.5868 0.00292969V13.9172C12.5868 14.707 12.5304 15.816 12.5304 15.816H15.0169C15.0169 15.816 15.1063 15.0196 15.1063 14.2916C15.1063 14.2916 16.3348 16.2137 19.6754 16.2137C23.193 16.2137 25.5825 13.7713 25.5825 10.2724C25.5825 7.01725 23.3878 4.39924 19.681 4.39924C16.21 4.39924 15.1314 6.27358 15.1314 6.27358V0.00292969H12.5868ZM19.0392 6.12028C21.428 6.12028 22.9472 7.89325 22.9472 10.2724C22.9472 12.8237 21.1927 14.4926 19.0564 14.4926C16.5068 14.4926 15.1314 12.5018 15.1314 10.2951C15.1314 8.23879 16.3655 6.12028 19.0392 6.12028Z" fill="#0064D2"/><path d="M31.7641 4.36523C26.4691 4.36523 26.1296 7.26437 26.1296 7.72776H28.765C28.765 7.72776 28.9032 6.03518 31.5823 6.03518C33.3231 6.03518 34.6722 6.83212 34.6722 8.36391V8.90918H31.5823C27.4803 8.90918 25.3116 10.1093 25.3116 12.5445C25.3116 14.941 27.3153 16.2449 30.0232 16.2449C33.7136 16.2449 34.9024 14.2058 34.9024 14.2058C34.9024 15.0169 34.9648 15.8161 34.9648 15.8161H37.3077C37.3077 15.8161 37.217 14.8255 37.217 14.1916V8.71328C37.217 5.12106 34.3195 4.36523 31.7641 4.36523ZM34.6722 10.545V11.272C34.6722 12.2203 34.087 14.5778 30.6422 14.5778C28.7559 14.5778 27.9471 13.6364 27.9471 12.5443C27.9471 10.5578 30.6707 10.545 34.6722 10.545Z" fill="#F5AF02"/><path d="M35.796 4.82031H38.7609L43.0161 13.3453L47.2614 4.82031H49.9473L42.2145 19.9974H39.3971L41.6284 15.7666L35.796 4.82031Z" fill="#86B817"/></g><defs><clipPath id="clip0_318_19463"><rect width="49.9002" height="20" fill="white" transform="translate(0.0499268)"/></clipPath></defs></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="flex w-full justify-center mt-8">
                                    <button class="text-yellowish font-manrope font-semibold text-base text-center border border-yellowish rounded-lg py-2.5 px-6 hover:text-black hover:bg-yellowish cursor-pointer">Explore More</button>
                                </div>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Ungraded" role="tabpanel" aria-labelledby="Ungraded-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Ungraded tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-7" role="tabpanel" aria-labelledby="Grade-7-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Grade7 tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-8" role="tabpanel" aria-labelledby="Grade-8-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Grade8 tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-9" role="tabpanel" aria-labelledby="Grade-9-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Grade9 tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-Grade-95" role="tabpanel" aria-labelledby="Grade-95-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Grade95 tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>

                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-psa10" role="tabpanel" aria-labelledby="psa10-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">PSA 10 tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="2/12 h-full">
                    <div class="w-full h-full rounded-3xl bg-addbg p-8 flex items-center justify-center">
                        <h1 class="text-white">addvertisements</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
