<!-- Top Ticker with Gradient Background -->
<div class="bg-dark py-1 w-full top-0 z-20 overflow-hidden">
    <div class="relative flex items-center">
        <div id="ticker" class="ticker-wrap flex space-x-8 text-xs whitespace-nowrap animate-ticker">
            <div>Projects Listed: <span class="text-green-500">63,358</span></div>
            <div>New Projects: <span class="text-green-500">2,669</span></div>
            <div>Total Votes: <span class="text-green-500">333,568</span></div>
            <div>Watchlist: <span class="text-green-500">5,478,253</span></div>
            <div>Total Users: <span class="text-green-500">4,258</span></div>
            <div>Most Popular: <span class="text-green-500">Solana Network</span></div>
            <div>Supported Chains: <span class="text-green-500">10</span></div>
            <div>Promoted Tokens: <span class="text-green-500">1,245</span></div>
        </div>
    </div>
</div>

<!-- Top Navbar Blade Template -->
<nav class="bg-dark text-white py-3 px-6 border-b border-none top-6 left-0 w-full z-10 flex items-center justify-between">
    <!-- Left Section: Social Followers -->
    <div class="flex items-center space-x-2" style="margin-left: 6rem;">
        <!-- Twitter Followers Static Count -->
        <a href="https://twitter.com/your_twitter_profile" target="_blank" class="flex items-center bg-gray-800 text-white px-2 py-1 text-sm rounded-lg">
            <i class="fa-brands fa-twitter text-white text-lg mr-1"></i>
            <div class="px-2 py-1 rounded-lg text-white">50K</div>
        </a>

        <!-- Telegram Followers Static Count -->
        <a href="https://t.me/your_telegram_channel" target="_blank" class="flex items-center bg-gray-800 text-white px-2 py-1 text-sm rounded-lg">
            <i class="fa-brands fa-telegram text-white text-lg mr-1"></i>
            <div class="px-2 py-1 rounded-lg text-white">26K</div>
        </a>
    </div>

    <!-- Middle Section: Navigation links -->
    <div class="flex justify-center space-x-8">
        <ul class="flex space-x-8 text-sm font-semibold">
            <li><a href="/" class="hover:text-green-500">Latest</a></li>
            <li><a href="/trending" class="hover:text-green-500">Trending</a></li>
            <li><a href="/blog_1" class="hover:text-green-500">Blog</a></li>
            <li><a href="/advertisement" class="hover:text-green-500">Advertise</a></li>
            <li><a href="/contact-us" class="hover:text-green-500">Contact Us</a></li>
            <li><a href="#" class="hover:text-green-500">Airdrops</a></li>
            <li><a href="#" class="hover:text-green-500">Giveaways</a></li>
        </ul>
    </div>

    <!-- Right Section: Icons and Buttons -->
    <div class="flex items-center space-x-4">
        <!-- Star and Gear Icons -->
        <i class="fa-solid fa-star text-white text-lg"></i>
        <i class="fa-solid fa-gear text-white text-lg"></i>

        <!-- Submit Token Button -->
        <a href="/submit-ico" class="border border-green-500 text-green-500 px-3 py-2 text-sm rounded-lg flex items-center transition-all hover:bg-green-500 hover:text-white">
            <i class="fa-solid fa-coins mr-2"></i> Submit Token
        </a>

        <!-- Link Wallet Button -->
        <a href="/link-wallet" class="bg-gray-800 text-white px-3 py-2 text-sm rounded-lg flex items-center transition-all hover:bg-gray-700">
            <i class="fa-solid fa-wallet mr-2"></i> Wallet
        </a>
    </div>
</nav>

<!-- CoinMarketCap Widget BELOW the Nav Bar -->
<div class="coin-widget" style="margin-left: 5rem; background-color: #2b2b2b; max-width: 100%; overflow-x: hidden;">
    <!-- Widget BEGIN -->
    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>
    <div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,52,5426,74,5994" currency="USD" theme="dark" transparent="false" show-symbol-logo="true"></div>
    <!-- Widget END -->
</div>

<!-- Ticker and Navbar Styling -->
<style>
    /* Ensure the ticker starts off the screen and moves smoothly */
    .animate-ticker {
        animation: ticker-scroll 30s linear infinite;
        padding-left: 20rem;
    }

    @keyframes ticker-scroll {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
</style>
