@extends('layout.main')

@section('meta_title')
    Advertise with Us | Dex-Tokens
@endsection
@section('meta_description')
    Promote your coin on Dex-Tokens and get the visibility you deserve.
@endsection

@section('content')
<!-- Banner Ads -->
<div class="max-w-6xl px-5 mx-auto">
    <section class="py-4 max-w-7xl mx-auto text-center">
        <div class="grid grid-cols-3 gap-4">
            <div class="p-2">
                <div class="banner-frame rounded-lg shadow-lg" style="width: 100%; height: 150px;">
                    <img src="/images/banner/Token-Banner-Advert-10.jpg" alt="Banner Ad 1" class="banner-img rounded-lg shadow-lg" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="p-2">
                <div class="banner-frame rounded-lg shadow-lg" style="width: 100%; height: 150px;">
                    <img src="/images/banner/Token-Banner-Advert-5.jpg" alt="Banner Ad 3" class="banner-img rounded-lg shadow-lg" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="p-2">
                <div class="banner-frame rounded-lg shadow-lg" style="width: 100%; height: 150px;">
                    <img src="/images/banner/Token-Banner-Advert-2.jpg" alt="Banner Ad 5" class="banner-img rounded-lg shadow-lg" style="width: 100%; height: 100%;">
                </div>
            </div>
        </div>
    </section>

    <!-- Promotion Section -->
    <section class="py-4 text-center">
        <img src="/images/advert/cartoon_space_rocket.png" alt="Rocket" class="floating-rocket" style="width: 150px; height: auto; display: block; margin: 0 auto;">
        <h1 class="text-5xl font-bold text-green-500 mt-4">Promote your token!</h1>
        <h2 class="text-3xl font-bold text-green-500 mt-2" style="margin-top: -5px;">Get the visibility your token deserves.</h2>
        <p class="text-lg text-gray-400 mt-2">By promoting on dex-tokens.com, your token will be visible on top of all other tokens.</p>
        <div class="max-w-6xl px-5 mx-auto">
            <section class="py-4">
                <div class="text-green-700 bg-green-100" role="alert">
                    <div class="flex p-4 text-sm max-w-6xl px-5 mx-auto justify-center">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-center">
                            <span class="font-semibold">Info</span> Do not ever pay anyone for a promotion on our platform, unless you have received a confirmation email from advertise@dex-tokens.com
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <p class="mt-2 mb-4 text-gray-400">To promote your token, send an email to advertise</p>
        <div style="height: 10px;"></div> <!-- Add this div to create space -->
        <a href="https://www.dex-tokens.com/contact-us" class="btn btn-primary" style="font-size: 16px">Contact Us</a>
    </section>
   <!-- Advertisement Packages -->
    <section class="py-8 text-center">
        <h2 class="text-3xl font-bold text-green-500">Listing Options!</h2>
        <div class="ad-packages">
            <div class="ad-package">
                <h3 class="text-xl font-bold text-white">Latest Trending</h3>
                <img src="/images/advert/asset2.jpg" alt="Asset 1" class="ad-image">
                <p class="text-sm text-gray-400 mt-2">Token will also show on @MoonTrending Click here for Trending Price List</p>
                <button class="btn btn-primary mt-4" onclick="window.location.href='/promote#'">Order Now</button>
            </div>
            <div class="ad-package">
                <h3 class="text-xl font-bold text-white">Rotating Banners</h3>
                <img src="/images/advert/asset1.jpg" alt="Asset 2" class="ad-image">
                <p class="text-sm text-gray-400 mt-2">7 Day $250 | 14 Days $700 (+10%) |30 Days $1,200 (+20%) TG Channel + Group Pin</p>
                <button class="btn btn-primary mt-4" onclick="window.location.href='promote#'">Order Now</button>
            </div>
            <div class="ad-package">
                <h3 class="text-xl font-bold text-white">Wide Banners</h3>
                <img src="/images/advert/asset3.jpg" alt="Asset 3" class="ad-image">
                <p class="text-sm text-gray-400 mt-2">7 Day $450 | 14 Days $1,200 (+10%) | 30 Days $2,800 (+20%) TG Channel + Group Pin</p>
                <button class="btn btn-primary mt-4" onclick="window.location.href='/promote#'">Order Now</button>
            </div>
        </div>
    </section>
    <!-- New Section: Advertise on our platform -->
    <section class="py-8 flex items-center justify-center">
        <div class="flex-1 pr-8">
            <h2 class="advert font-bold text-green-500 mb-4">Advertise on our platform!</h2>
            <ul class="text-left text-lg text-gray-400 leading-loose list-none pl-5">
                <li><i class="fas fa-check-circle text-green-500"></i> 4.9 million users monthly</li>
                <li><i class="fas fa-check-circle text-green-500"></i> 300,000+ views daily</li>
                <li><i class="fas fa-check-circle text-green-500"></i> More than 95,000+ Tokens listed</li>
                <li><i class="fas fa-check-circle text-green-500"></i> Contract Scanner, Twitter 50,000 followers</li>
                <li><i class="fas fa-check-circle text-green-500"></i> Supported chains: Ethereum, BSC, AVAX...</li>
                <li><i class="fas fa-check-circle text-green-500"></i> More than 4,000 satisfied clients</li>
            </ul>
        </div>
        <div class="flex-1">
            <img src="/images/advert/website-screen.png" alt="Website Screen" class="w-full h-auto">
        </div>
    </section>
    <!-- Discounts Section -->
    <section class="py-8 text-center">
        <h2 class="disc font-bold text-green-500">Discount %</h2>
        <div class="discounts">
            <div class="discount">
                <h3 class="discount-title">10%</h3>
                <p class="text-gray-400 mt-2">7 Days +</p>
            </div>
            <div class="discount">
                <h3 class="discount-title">30%</h3>
                <p class="text-gray-400 mt-2">14 Days +</p>
            </div>
            <div class="discount">
                <h3 class="discount-title">50%</h3>
                <p class="text-gray-400 mt-2">30 Days +</p>
            </div>
        </div>
    </section>

    <!-- Press Release Section -->
    <section class="py-8">
        <div class="press-release-container">
            <div class="press-release-title">
                <h2 class="text-3xl font-bold text-green-500">Press Release</h2>
            </div>
            <div class="press-release-description">
                <p class="text-gray-400 mt-2">With the crypto market scathing for attention, it is essential to put your word where it matters. A press release is an immaculate arsenal to introduce your idea pitch to the audience/investors or announce a major update in front of listeners, admirers, and enthusiasts of crypto.</p>
                <p class="text-gray-400 mt-2">Dex Tokens is one of the largest growing crypto and blockchain listings and media websites in the industry. We host a super-engaged crypto community, and our press release publications are viewed by millions of users from over 30 countries.</p>
                <div class="press-release-button">
                    <a href="/contact-us" class="btn btn-primary" style="font-size: 16px; margin-top: 1rem;">Post an Article</a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 text-center block">
        <div class="long-banner-frame rounded-lg shadow-lg" style="width: 100%; height: 100px; overflow: hidden; position: relative;">
            <a href="/advertisement" id="long-banner-link">
                <img src="/images/banner/long-banner4.jpg" alt="Long Banner 1" class="long-banner-img rounded-lg shadow-lg w-full h-full absolute">
            </a>
        </div>
    </section>    
</div>
@endsection

<style>
    .long-banner-frame {
        position: relative;
    }

    .long-banner-img {
        position: absolute;
        width: 100%;
        height: 100%;
        transition: transform 1s ease-in-out;
    }


    .floating-rocket {
        transition: transform 0.3s ease-in-out;
    }

    .floating-rocket:hover {
        transform: translateY(-10px) rotate(-45deg);
    }

    .ad-packages {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .ad-package {
        background-color: #2d3748;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        flex: 1 1 30%;
        margin: 0.5rem;
        text-align: center;
    }

    .ad-package h3 {
        color: #fff;
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .ad-package p {
        color: #a0aec0;
        margin-top: 0.5rem;
        font-size: 0.875rem; /* Smaller text */
    }

    .ad-package .ad-image {
        height: 150px;
        width: auto;
        margin: 0.5rem auto;
    }

    .btn {
        background-color: #38a169;
        border: none;
        border-radius: 0.375rem;
        color: #fff;
        cursor: pointer;
        font-size: 1rem;
        padding: 0.5rem 1rem;
        text-align: center;
    }

    .btn:hover {
        background-color: #2f855a;
    }

    .discounts {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .discount {
        background-color: #2d3748;
        border-radius: 0.5rem;
        box-shadow: 0 0 10px #38a169; /* Add glow effect */
        padding: 1rem;
        flex: 1 1 30%;
        margin: 0.5rem;
        position: relative;
        text-align: center;
    }

    .discount-title {
        color: #fff;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        position: relative;
    }

    .discount-title::before {
        content: '%';
        font-size: 5rem;
        color: rgba(56, 161, 105, 0.2);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        background: linear-gradient(to bottom, rgba(56, 161, 105, 0.5), rgba(45, 55, 72, 0));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .press-release-container {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .press-release-title {
        flex: 0 0 auto;
        width: 35%;
        padding-left: 80px;
    }

    .press-release-description {
        flex: 1 1 auto;
        padding-left: 30px;
        text-align: left;
    }

    .press-release-description p {
        margin-bottom: 1rem;
    }

    .press-release-button {
        text-align: right;
    }
    
    .advert {
        font-size: 4rem;
    }
    .disc {
        font-size: 2rem;
        margin-bottom: 1rem;
    }
</style>
