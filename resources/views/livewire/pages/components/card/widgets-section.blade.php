<?php

use Livewire\Volt\Component;
use App\Models\PokeCardSetRelation;
use App\Models\PokeCard;
use App\Models\PokeSet;
use Illuminate\Support\Facades\Log;

new class extends Component {
    public $card;
    public $set;
    public $allCardRecord;

    public function mount() {
        Log::info($this->allCardRecord);
    }

}; ?>

<div>
    <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-5 items-center justify-center">
        {{-- Item - 01 --}}
        @if (is_array($allCardRecord?->types) && count($allCardRecord?->types) > 0)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                @foreach ($allCardRecord->types as $type)
                <div class="bg-[#383838] rounded-[100px] p-[18px]">
                    @if (strtolower($type) === 'water')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Water.webp') }}" alt="Water">

                    @elseif (strtolower($type) === 'fire')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fire.webp') }}" alt="Fire">

                    @elseif (strtolower($type) === 'grass')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/grass.webp') }}" alt="Grass">

                    @elseif (strtolower($type) === 'darkness')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Darkness.webp') }}" alt="Darkness">

                    @elseif (strtolower($type) === 'fairy')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fairy.webp') }}" alt="Fairy">

                    @elseif (strtolower($type) === 'fighting')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fighting.webp') }}" alt="Fighting">

                    @elseif (strtolower($type) === 'lightning')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Lightning.webp') }}" alt="Lightning">

                    @elseif (strtolower($type) === 'metal')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Metal.webp') }}" alt="Metal">

                    @elseif (strtolower($type) === 'psychic')
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Psychic.webp') }}" alt="Psychic">

                    @else
                        <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Colorless.webp') }}" alt="Default">
                    @endif
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Types</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $type }}</h3>
                </div>
                @endforeach
            </div>
        @endif

        {{-- Item - 02 --}}
        @if ($allCardRecord?->converted_retreat_cost)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M32.9974 47.3337C25.0813 47.3337 18.6641 40.9165 18.6641 33.0003C18.6641 25.0842 25.0813 18.667 32.9974 18.667C40.9135 18.667 47.3307 25.0842 47.3307 33.0003C47.3307 40.9165 40.9135 47.3337 32.9974 47.3337ZM34.7095 26.6614C34.3331 25.8988 33.7438 25.3337 32.9955 25.3337C32.2481 25.3337 31.6569 25.8978 31.277 26.6598L30.0215 29.1915L30.0196 29.1954C29.9814 29.274 29.8909 29.3846 29.7553 29.486C29.62 29.5872 29.4891 29.6422 29.4058 29.6567L27.1323 30.0375C26.3101 30.1757 25.6228 30.5789 25.4005 31.2806C25.1789 31.9803 25.5052 32.7079 26.0922 33.2998L27.8606 35.0827C27.9306 35.1534 28.0091 35.2865 28.0583 35.4598C28.1072 35.6319 28.1115 35.7886 28.0893 35.8899L28.089 35.8914L27.5836 38.095C27.3732 39.0115 27.4462 39.9195 28.0927 40.3951C28.742 40.8729 29.6281 40.665 30.4331 40.1834L32.5611 38.9131L32.5625 38.9125C32.6578 38.8569 32.8149 38.8142 32.9991 38.8142C33.1847 38.8142 33.3385 38.8575 33.4279 38.911L35.5602 40.1837C36.3662 40.6637 37.2534 40.8751 37.9026 40.3979C38.5495 39.9225 38.619 39.0127 38.4094 38.0954L37.9038 35.8914L37.9035 35.8899C37.8813 35.7886 37.8857 35.6319 37.9345 35.4598C37.9837 35.2865 38.0622 35.1534 38.1322 35.0827L39.8993 33.3011C40.4901 32.7093 40.8181 31.9805 40.5946 31.2797C40.371 30.5783 39.6823 30.1756 38.8607 30.0376L36.5861 29.6565C36.4987 29.6418 36.3659 29.5862 36.2302 29.4853C36.0945 29.3842 36.0042 29.2738 35.9661 29.1954L34.7095 26.6614Z"
                            fill="#FFC107" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Retreat</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">
                        X{{ $allCardRecord->converted_retreat_cost }}</h3>
                </div>
            </div>
        @endif

        {{-- Item - 03 --}}
        @if (is_array($allCardRecord?->subtypes) && count($allCardRecord?->subtypes) > 0)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M23.3055 20.6169C23.7127 20.218 24.2844 19.9579 25.364 19.8157C26.4753 19.6693 27.9482 19.667 30.0601 19.667H35.9451C38.057 19.667 39.5299 19.6693 40.6412 19.8157C41.7208 19.9579 42.2925 20.218 42.6997 20.6169C43.1069 21.0159 43.3724 21.576 43.5175 22.6337C43.6669 23.7224 43.6693 25.1655 43.6693 27.2346V37.685L26.7968 37.685C25.5933 37.6846 24.7722 37.6843 24.0679 37.8692C23.4383 38.0345 22.8542 38.3045 22.3359 38.6593V27.2346C22.3359 25.1655 22.3383 23.7224 22.4877 22.6337C22.6328 21.576 22.8983 21.0159 23.3055 20.6169ZM27.1175 24.712C26.5081 24.712 26.0141 25.1961 26.0141 25.7931C26.0141 26.3902 26.5081 26.8742 27.1175 26.8742H38.8877C39.4971 26.8742 39.9911 26.3902 39.9911 25.7931C39.9911 25.1961 39.4971 24.712 38.8877 24.712H27.1175ZM26.0141 30.8382C26.0141 30.2411 26.5081 29.7571 27.1175 29.7571H34.4739C35.0833 29.7571 35.5773 30.2411 35.5773 30.8382C35.5773 31.4352 35.0833 31.9192 34.4739 31.9192H27.1175C26.5081 31.9192 26.0141 31.4352 26.0141 30.8382Z"
                            fill="#FFC107" />
                        <path
                            d="M26.9672 39.8472C25.5279 39.8472 25.0247 39.8565 24.6391 39.9577C23.5808 40.2355 22.7371 41.0062 22.3753 42.008C22.3977 42.518 22.4327 42.9665 22.4877 43.367C22.6328 44.4247 22.8983 44.9848 23.3055 45.3837C23.7127 45.7827 24.2844 46.0428 25.364 46.185C26.4753 46.3314 27.9482 46.3337 30.0601 46.3337H35.9451C38.057 46.3337 39.5299 46.3314 40.6412 46.185C41.7208 46.0428 42.2925 45.7827 42.6997 45.3837C42.9885 45.1008 43.2061 44.7367 43.3599 44.1715H27.1175C26.5081 44.1715 26.0141 43.6875 26.0141 43.0904C26.0141 42.4934 26.5081 42.0093 27.1175 42.0093H43.6298C43.6571 41.388 43.6655 40.6755 43.6681 39.8472H26.9672Z"
                            fill="#FFC107" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Form</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $allCardRecord->subtypes[0] }}</h3>
                </div>
            </div>
        @endif

        {{-- Item - 04 --}}
        @if ($allCardRecord?->supertype)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" /><path d="M27.1358 23.1397C29.4503 20.8252 30.6075 19.668 32.0455 19.668C33.4836 19.668 34.6408 20.8252 36.9553 23.1397L42.847 29.0314C45.1615 31.3459 46.3187 32.5031 46.3187 33.9411C46.3187 35.3792 45.1615 36.5364 42.847 38.8509C40.5325 41.1654 39.3753 42.3226 37.9372 42.3226C36.4992 42.3226 35.342 41.1654 33.0275 38.8509L27.1358 32.9592C24.8213 30.6447 23.6641 29.4875 23.6641 28.0494C23.6641 26.6114 24.8213 25.4542 27.1358 23.1397Z" fill="#FFC107" /><path d="M26.7094 35.3602L20.7651 41.3045C20.3086 41.7611 20.0803 41.9894 19.9431 42.2269C19.571 42.8714 19.571 43.6654 19.9431 44.3099C20.0803 44.5474 20.3085 44.7757 20.7651 45.2323C21.2217 45.6888 21.45 45.9172 21.6875 46.0543C22.332 46.4264 23.1261 46.4264 23.7706 46.0543C24.0081 45.9172 24.2363 45.6889 24.6929 45.2323L30.6372 39.288L26.7094 35.3602Z" fill="#FFC107" /><path d="M28.1236 33.946L28.1295 33.9402L32.0573 37.868L32.0514 37.8738L28.1236 33.946Z" fill="#FFC107" /><path d="M43.2221 26.5771C43.5618 25.9434 43.5511 25.1772 43.19 24.5518C43.0529 24.3143 42.8246 24.086 42.368 23.6294C41.9114 23.1728 41.6831 22.9445 41.4457 22.8074C40.8203 22.4463 40.054 22.4356 39.4203 22.7753L43.2221 26.5771Z" fill="#FFC107" /></svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Typings</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $allCardRecord->supertype }}</h3>
                </div>
            </div>
        @endif

        {{-- Item - 05 --}}
        @if ($allCardRecord?->hp)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" /><path fill-rule="evenodd" clip-rule="evenodd" d="M36.8938 20.2382C34.6879 18.1433 31.3069 18.1433 29.1009 20.2382C27.3943 21.859 25.3031 24.0931 23.6324 26.6557C21.9693 29.2069 20.6641 32.1733 20.6641 35.2377C20.6641 41.1949 25.3406 47.3337 32.9974 47.3337C40.6542 47.3337 45.3307 41.1949 45.3307 35.2377C45.3307 32.1733 44.0255 29.2069 42.3623 26.6557C40.6917 24.0931 38.6005 21.859 36.8938 20.2382ZM36.9974 35.6669C36.9974 37.8761 35.2066 39.6669 32.9974 39.6669C32.261 39.6669 31.6641 40.2639 31.6641 41.0002C31.6641 41.7366 32.261 42.3335 32.9974 42.3335C36.6793 42.3335 39.6641 39.3489 39.6641 35.6669C39.6641 34.9306 39.0671 34.3335 38.3307 34.3335C37.5943 34.3335 36.9974 34.9306 36.9974 35.6669Z" fill="#FFC107" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">HP</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $allCardRecord->hp }}</h3>
                </div>
            </div>
        @endif

        {{-- Item - 06 --}}
        {{-- @if (is_array($allCardRecord?->weaknesses) && count($allCardRecord?->weaknesses) > 0)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div class="bg-[#383838] rounded-[100px] p-[18px]">
                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fire.webp') }}" alt="">
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Weakness</h5>
                    @foreach ($allCardRecord->weaknesses as $weakness)
                        <div class="flex items-center gap-2">
                            <h3 class="font-manrope font-semibold text-base text-white">{{ $weakness['type'] }}</h3>
                            <h3 class="font-manrope font-semibold text-base text-white">{{ $weakness['value'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif --}}

        @if (is_array($allCardRecord?->weaknesses) && count($allCardRecord?->weaknesses) > 0)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    @foreach ($allCardRecord->weaknesses as $weakness)
                        <div class="flex items-center gap-5">
                            <div class="bg-[#383838] rounded-[100px] p-[18px]">
                                @if (strtolower($weakness['type']) === 'water')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Water.webp') }}" alt="Water">

                                @elseif (strtolower($weakness['type']) === 'fire')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fire.webp') }}" alt="Fire">

                                @elseif (strtolower($weakness['type']) === 'grass')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/grass.webp') }}" alt="Grass">

                                @elseif (strtolower($weakness['type']) === 'darkness')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Darkness.webp') }}" alt="Darkness">

                                @elseif (strtolower($weakness['type']) === 'fairy')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fairy.webp') }}" alt="Fairy">

                                @elseif (strtolower($weakness['type']) === 'fighting')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fighting.webp') }}" alt="Fighting">

                                @elseif (strtolower($weakness['type']) === 'lightning')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Lightning.webp') }}" alt="Lightning">

                                @elseif (strtolower($weakness['type']) === 'metal')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Metal.webp') }}" alt="Metal">

                                @elseif (strtolower($weakness['type']) === 'psychic')
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Psychic.webp') }}" alt="Psychic">

                                @else
                                    <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Colorless.webp') }}" alt="Default">
                                @endif
                            </div>

                            <!-- Display the weakness type and value -->
                            <div>
                                <h5 class="font-manrope font-medium text-sm text-white">Weakness</h5>
                                <div class="flex gap-1">
                                    <h3 class="font-manrope font-semibold text-base text-white">{{ $weakness['type'] }}</h3>
                                    <h3 class="font-manrope font-semibold text-base text-white">{{ $weakness['value'] }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Item - 07 --}}
        @if ($set?->release_date)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" />
                        <path
                            d="M27.3307 20.333C27.3307 19.7807 26.883 19.333 26.3307 19.333C25.7784 19.333 25.3307 19.7807 25.3307 20.333V22.4387C23.4116 22.5924 22.1518 22.9695 21.2262 23.8951C20.3006 24.8207 19.9234 26.0806 19.7697 27.9997H46.225C46.0714 26.0806 45.6942 24.8207 44.7686 23.8951C43.843 22.9695 42.5832 22.5924 40.6641 22.4387V20.333C40.6641 19.7807 40.2163 19.333 39.6641 19.333C39.1118 19.333 38.6641 19.7807 38.6641 20.333V22.3502C37.777 22.333 36.7828 22.333 35.6641 22.333H30.3307C29.212 22.333 28.2177 22.333 27.3307 22.3502V20.333Z"
                            fill="#FFC107" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.6641 32.9997C19.6641 31.881 19.6641 30.8867 19.6813 29.9997H46.3135C46.3307 30.8867 46.3307 31.881 46.3307 32.9997V35.6663C46.3307 40.6947 46.3307 43.2088 44.7686 44.7709C43.2065 46.333 40.6924 46.333 35.6641 46.333H30.3307C25.3024 46.333 22.7883 46.333 21.2262 44.7709C19.6641 43.2088 19.6641 40.6947 19.6641 35.6663V32.9997ZM39.6641 35.6663C40.4004 35.6663 40.9974 35.0694 40.9974 34.333C40.9974 33.5966 40.4004 32.9997 39.6641 32.9997C38.9277 32.9997 38.3307 33.5966 38.3307 34.333C38.3307 35.0694 38.9277 35.6663 39.6641 35.6663ZM39.6641 40.9997C40.4004 40.9997 40.9974 40.4027 40.9974 39.6663C40.9974 38.93 40.4004 38.333 39.6641 38.333C38.9277 38.333 38.3307 38.93 38.3307 39.6663C38.3307 40.4027 38.9277 40.9997 39.6641 40.9997ZM34.3307 34.333C34.3307 35.0694 33.7338 35.6663 32.9974 35.6663C32.261 35.6663 31.6641 35.0694 31.6641 34.333C31.6641 33.5966 32.261 32.9997 32.9974 32.9997C33.7338 32.9997 34.3307 33.5966 34.3307 34.333ZM34.3307 39.6663C34.3307 40.4027 33.7338 40.9997 32.9974 40.9997C32.261 40.9997 31.6641 40.4027 31.6641 39.6663C31.6641 38.93 32.261 38.333 32.9974 38.333C33.7338 38.333 34.3307 38.93 34.3307 39.6663ZM26.3307 35.6663C27.0671 35.6663 27.6641 35.0694 27.6641 34.333C27.6641 33.5966 27.0671 32.9997 26.3307 32.9997C25.5943 32.9997 24.9974 33.5966 24.9974 34.333C24.9974 35.0694 25.5943 35.6663 26.3307 35.6663ZM26.3307 40.9997C27.0671 40.9997 27.6641 40.4027 27.6641 39.6663C27.6641 38.93 27.0671 38.333 26.3307 38.333C25.5943 38.333 24.9974 38.93 24.9974 39.6663C24.9974 40.4027 25.5943 40.9997 26.3307 40.9997Z"
                            fill="#FFC107" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Release Date</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $set?->release_date }}</h3>
                </div>
            </div>
        @endif

        {{-- Item - 08 --}}
        @if ($allCardRecord?->artist)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M31.4598 46.246C24.8202 45.4836 19.6641 39.8441 19.6641 33.0003C19.6641 25.6365 25.6336 19.667 32.9974 19.667C40.3612 19.667 46.3307 25.6365 46.3307 33.0003C46.3307 39.8757 41.9538 39.3103 38.2154 38.8274C36.0593 38.5488 34.1155 38.2978 33.3466 39.5176C32.8207 40.3518 33.3892 41.3921 34.0865 42.0894C34.9578 42.9607 34.9578 44.3733 34.0865 45.2446C33.3892 45.9419 32.4395 46.3585 31.4598 46.246ZM31.7774 26.3333C31.7774 27.4379 30.882 28.3333 29.7774 28.3333C28.6728 28.3333 27.7774 27.4379 27.7774 26.3333C27.7774 25.2288 28.6728 24.3333 29.7774 24.3333C30.882 24.3333 31.7774 25.2288 31.7774 26.3333ZM25.6641 34.3336C26.7686 34.3336 27.6641 33.4382 27.6641 32.3336C27.6641 31.2291 26.7686 30.3336 25.6641 30.3336C24.5595 30.3336 23.6641 31.2291 23.6641 32.3336C23.6641 33.4382 24.5595 34.3336 25.6641 34.3336ZM40.3307 34.3336C41.4353 34.3336 42.3307 33.4382 42.3307 32.3336C42.3307 31.2291 41.4353 30.3336 40.3307 30.3336C39.2262 30.3336 38.3307 31.2291 38.3307 32.3336C38.3307 33.4382 39.2262 34.3336 40.3307 34.3336ZM36.3307 28.3336C37.4353 28.3336 38.3307 27.4382 38.3307 26.3336C38.3307 25.2291 37.4353 24.3336 36.3307 24.3336C35.2262 24.3336 34.3307 25.2291 34.3307 26.3336C34.3307 27.4382 35.2262 28.3336 36.3307 28.3336Z"
                            fill="#FFC107" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Artist</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $allCardRecord?->artist }}</h3>
                </div>
            </div>
        @endif

        {{-- Item - 09 --}}
        @if ($allCardRecord?->regulation_mark)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                <div>
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="66" height="66" rx="33" fill="white" fill-opacity="0.08" />
                        <path
                            d="M46.0804 22.2531C44.3338 26.6131 40.3471 32.3065 36.5471 36.0265C36.0004 32.5865 33.2538 29.8931 29.7871 29.4131C33.5204 25.5998 39.2538 21.5598 43.6271 19.7998C44.4004 19.5065 45.1738 19.7331 45.6538 20.2131C46.1604 20.7198 46.4004 21.4798 46.0804 22.2531Z"
                            fill="#FFC107" />
                        <path
                            d="M35.3734 37.1199C35.1067 37.3466 34.84 37.5733 34.5734 37.7866L32.1867 39.6933C32.1867 39.6533 32.1734 39.5999 32.1734 39.5466C31.9867 38.1199 31.32 36.7999 30.24 35.7199C29.1467 34.6266 27.7867 33.9599 26.2934 33.7733C26.2534 33.7733 26.2 33.7599 26.16 33.7599L28.0934 31.3199C28.28 31.0799 28.48 30.8533 28.6934 30.6133L29.6 30.7333C32.4667 31.1333 34.7734 33.3866 35.2267 36.2399L35.3734 37.1199Z"
                            fill="#FFC107" />
                        <path
                            d="M30.9057 40.4934C30.9057 41.9601 30.3457 43.3601 29.279 44.4134C28.4657 45.2401 27.3724 45.8001 26.039 45.9601L22.7724 46.3201C20.9857 46.5201 19.4524 44.9868 19.6524 43.1868L20.0124 39.9068C20.3324 36.9868 22.7724 35.1201 25.359 35.0668C25.6124 35.0534 25.8924 35.0668 26.159 35.0934C27.2924 35.2401 28.3857 35.7601 29.3057 36.6668C30.199 37.5601 30.7057 38.6134 30.8524 39.7201C30.879 39.9868 30.9057 40.2401 30.9057 40.4934Z"
                            fill="#FFC107" />
                    </svg>
                </div>
                <div>
                    <h5 class="font-manrope font-medium text-sm text-white">Regulation mark</h5>
                    <h3 class="font-manrope font-semibold text-base text-white">{{ $allCardRecord?->regulation_mark }}
                    </h3>
                </div>
            </div>
        @endif

        {{-- Item - 10 --}}
        @if (is_array($allCardRecord?->resistances) && count($allCardRecord?->resistances) > 0)
            <div class="flex items-center gap-5 rounded-xl bg-[#FFFFFF08] w-72 p-5 border border-[#FFFFFF0D] mx-auto">
                @foreach ($allCardRecord->resistances as $resistance)
                    <div class="bg-[#383838] rounded-[100px] p-[18px]">
                        @if (strtolower($resistance['type']) === 'water')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Water.webp') }}" alt="Water">

                        @elseif (strtolower($resistance['type']) === 'fire')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fire.webp') }}" alt="Fire">

                        @elseif (strtolower($resistance['type']) === 'grass')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/grass.webp') }}" alt="Grass">

                        @elseif (strtolower($resistance['type']) === 'darkness')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Darkness.webp') }}" alt="Darkness">

                        @elseif (strtolower($resistance['type']) === 'fairy')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fairy.webp') }}" alt="Fairy">

                        @elseif (strtolower($resistance['type']) === 'fighting')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Fighting.webp') }}" alt="Fighting">

                        @elseif (strtolower($resistance['type']) === 'lightning')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Lightning.webp') }}" alt="Lightning">

                        @elseif (strtolower($resistance['type']) === 'metal')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Metal.webp') }}" alt="Metal">

                        @elseif (strtolower($resistance['type']) === 'psychic')
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Psychic.webp') }}" alt="Psychic">

                        @else
                            <img class="w-[30px] height-auto object-contain" src="{{ asset('assets/card-images/Colorless.webp') }}" alt="Default">
                        @endif
                    </div>
                    <div>
                        <h5 class="font-manrope font-medium text-sm text-white">Resistence</h5>
                        <h3 class="font-manrope font-semibold text-base text-white">{{ $resistance['type'] }}</h3>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @if (is_array($allCardRecord?->abilities) && count($allCardRecord?->abilities) > 0)
        <div class="my-12">
            @foreach ($allCardRecord->abilities as $ability)
                <h2 class="font-manrope font-bold text-xl text-white mb-2">{{ $ability['name'] }}
                    ({{ $ability['type'] }})</h2>
                <h3 class="font-manrope font-medium text-base text-white">
                    {{ $ability['text'] }}
                </h3>
            @endforeach
        </div>
    @endif
</div>
