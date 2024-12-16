<!-- Full Page Preloader -->
<div id="preloader" class="fixed inset-0 flex items-center justify-center bg-dark z-50">
    <div class="loader border-t-4 border-green-500 w-12 h-12 rounded-full animate-spin"></div>
</div>

<!-- Main Content (This content will load after the preloader disappears) -->
<div id="main-content" class="hidden">
    <!-- Sidebar Blade Template -->
    <div x-data="{ isOpen: false }"
         x-init="() => { isOpen = false; $el.style.width = '5rem'; }" 
         class="fixed top-0 left-0 h-full bg-dark text-white transition-all duration-200 ease-in-out z-20 shadow-lg"
         @mouseenter="isOpen = true; $el.style.width = '18rem';" 
         @mouseleave="isOpen = false; $el.style.width = '5rem';" 
         style="box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);">

        <!-- Logo Section -->
        <div class="flex items-center justify-center p-4">
            <a href="/">
                <!-- Show small logo when sidebar is collapsed and large logo when expanded -->
                <img :src="isOpen ? '{{ asset('images/dex_tokens_logo.png') }}' : '{{ asset('images/Dex-tokens-small.png') }}'" 
                     alt="Dex-Tokens Logo" 
                     class="h-14 transition-all duration-200 ease-in-out">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="px-2 py-2 flex-1">
            <ul class="space-y-2">
                <!-- Login/Register -->
                <li>
                    <a href="/login" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-user mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Login / Register</span>
                    </a>
                </li>
                <!-- Dashboard -->
                <li>
                    <a href="/dashboard" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-chart-bar mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Dashboard</span>
                    </a>
                </li>
                <!-- Signal Channels -->
                <li>
                    <a href="/signal-channels" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-rocket mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Signal Channels</span>
                    </a>
                </li>
                <!-- New Pairs -->
                <li>
                    <a href="/new-pairs" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-paper-plane mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">New Pairs</span>
                        <span x-show="isOpen" class="bg-blue-500 text-xs px-2 py-1 rounded ml-auto">NEW</span>
                    </a>
                </li>
                <!-- Exchanges -->
                <li>
                    <a href="/exchanges" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-boxes mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Exchanges</span>
                    </a>
                </li>
                <!-- Portfolio -->
                <li>
                    <a href="/portfolio" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-chart-pie mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Portfolio</span>
                    </a>
                </li>
                <!-- Create Token -->
                <li>
                    <a href="/create-token" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-coins mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Create Token</span>
                    </a>
                </li>
                <!-- Edit Token -->
                <li>
                    <a href="/edit-token" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-edit mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Edit Token</span>
                    </a>
                </li>
                <!-- Profile -->
                <li>
                    <a href="/profile" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-user-circle mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Profile</span>
                    </a>
                </li>
                <!-- Settings -->
                <li>
                    <a href="/settings" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-cog mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Settings</span>
                    </a>
                </li>

                <!-- Extra Section Title (Icon when collapsed) -->
                <li>
                    <div class="flex items-center p-2 text-gray-400">
                        <i class="fa-solid fa-circle-plus mr-3 text-gray-400" :class="isOpen ? 'opacity-0 w-0' : 'opacity-100 w-full'"></i>
                        <span class="text-sm text-gray-500 uppercase transition-all duration-200 ease-in-out" 
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Extra</span>
                    </div>
                </li>

                <!-- Promote Token -->
                <li>
                    <a href="/promote-token" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-trophy mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Promote Token</span>
                    </a>
                </li>
                <!-- Traffic Stats -->
                <li>
                    <a href="/traffic-stats" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-chart-bar mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Traffic Stats</span>
                    </a>
                </li>
                <!-- Banners -->
                <li>
                    <a href="/banners" class="flex items-center p-2 rounded-lg hover:bg-gray-700"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-desktop mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Banners</span>
                    </a>
                </li>
                <!-- Submit Token button -->
                <li>
                    <a href="/submit-token" class="flex items-center p-2 round-lg text-green-600 rounded-lg hover:text-white hover:bg-green-700 transition-all duration-300 ease-in-out"
                       :class="isOpen ? 'justify-start' : 'justify-center'">
                        <i class="fa-solid fa-coins mr-3"></i>
                        <span class="ml-2 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-200 ease-in-out"
                              :class="isOpen ? 'opacity-100 w-full' : 'opacity-0 w-0'">Submit Token</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Preloader Styling -->
<style>
    #preloader {
        background-color: #1a1a1a;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100vw;
    }

    .loader {
        border-top: 4px solid #00ff00;
        border-radius: 50%;
        width: 3rem;
        height: 3rem;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Hide the main content until fully loaded */
    #main-content {
        display: none;
    }
</style>

<!-- JavaScript for Preloader -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Wait for everything to fully load
        window.onload = function() {
            // Hide the preloader and show the main content
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('main-content').style.display = 'block';
        };
    });
</script>
