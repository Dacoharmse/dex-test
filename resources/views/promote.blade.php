@extends('layout.main')

@section('meta_title')
    Banner Advertisement
@endsection

@section('meta_description')
    Promote your token with our effective banner advertising options.
@endsection

@section('content')
<div class="max-w-6xl px-5 mx-auto py-8">
    <section class="text-center">
        <h1 class="text-ad1 font-bold mb-8 text-green-400">Banner Advertisement</h1>
        <div class="flex flex-col md:flex-row justify-center items-center mb-8 space-y-4 md:space-y-0 md:space-x-4">
            <div class="p-4 text-center w-full md:w-1/3 max-w-xs">
                <div class="adbox1 flex flex-col justify-center items-center bg-gray-800 text-white rounded-lg p-8 border border-gray-700 shadow-lg">
                    <i class="fas fa-rocket text-10xl mb-6 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-green-700"></i>
                    <p class="font-semibold text-xl">Best Deal</p>
                    <p class="text-l text-gray-400">More than 75,000 views daily</p>
                </div>
            </div>
            <div class="p-4 text-center w-full md:w-1/3 max-w-xs">
                <div class="adbox1 flex flex-col justify-center items-center bg-gray-800 text-white rounded-lg p-8 border border-gray-700 shadow-lg">
                    <i class="fas fa-shield-alt text-10xl mb-6 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-green-700"></i>
                    <p class="font-semibold text-xl">Web3 Payment</p>
                    <p class="text-l text-gray-400">Safe & instant crypto payment</p>
                </div>
            </div>
            <div class="p-4 text-center w-full md:w-1/3 max-w-xs">
                <div class="adbox1 flex flex-col justify-center items-center bg-gray-800 text-white rounded-lg p-8 border border-gray-700 shadow-lg">
                    <i class="fas fa-question-circle text-10xl mb-6 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-green-700"></i>
                    <p class="font-semibold text-xl">How to use?</p>
                    <p class="text-l text-gray-400">Check video guide</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container1 bg-gray-800 rounded-lg p-8 mb-8 border border-gray-700">
        <h2 class="text-xl font-semibold mb-4 text-white-400 text-center">1. Upload Banner</h2>
        <div class="flex justify-center items-center mb-4">
            <label class="custom-file-upload">
                <input type="file" id="banner-upload">
            </label>
        </div>
        <p class="text-l text-gray-400">• Accepted formats: JPG, JPEG, PNG, GIF<br>• Size up to 5MB<br>• Optimal dimensions: 600x240 (aspect ratio 5:2)</p>
        <div class="flex justify-center">
            <button id="preview-button" class="bg-gray-700 text-white py-2 px-4 rounded" disabled>Preview Image</button>
        </div>
    </div>
    <div class="container1 bg-gray-800 text-white rounded-lg p-8 mb-8 border border-gray-700">
        <h2 class="text-xl font-semibold mb-4 text-green-400 text-center">2. Target URL <span class="text-red-500">*</span></h2>
        <input type="text" id="target-url" class="urlblk block w-3/4 mx-auto rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white" placeholder="https://yourwebsite.com">
    </div>
    <div class="container1 bg-gray-800 text-white rounded-lg p-8 mb-8 border border-gray-700">
        <h2 class="text-xl font-semibold mb-4 text-green-400 text-center">3. Preview and Confirm</h2>
        <div id="banner-preview" class="bg-black text-white rounded-lg p-8 flex justify-center items-center mb-4 border border-gray-700 mx-auto" style="width: 600px; height: 240px;">
            <p id="preview-text" class="text-center text-xl">Preview your banner!<br>600x240 / 5:2 Aspect Ratio</p>
        </div>
    </div>
    <div class="container1 bg-gray-800 text-white rounded-lg p-8 mb-8 border border-gray-700">
        <h2 class="text-xl font-semibold mb-4 text-green-400 text-center">4. Select Advertisement Duration</h2>
        <div id="duration-options" class="flex flex-col items-center space-y-4">
            <label class="form-radio">
                <input type="radio" name="duration" value="7">
                <span class="radio-label">0.1 BSC = 7 day banner duration</span>
            </label>
            <label class="form-radio">
                <input type="radio" name="duration" value="14">
                <span class="radio-label">0.2 BSC = 14 days banner duration</span>
            </label>
            <label class="form-radio">
                <input type="radio" name="duration" value="30">
                <span class="radio-label">0.35 BSC = 30 days banner duration</span>
            </label>
        </div>
    </div>
    <div class="container1 bg-gray-800 text-white rounded-lg p-8 mb-8 border border-gray-700">
        <h2 class="text-xl text-center font-semibold mb-4 text-green-400">5. Select Payment Currency</h2>
        <div class="flex justify-center items-center space-x-4">
            <button id="currency-bnb" class="currency-button">
                <img src="/images/bnb-logo.png" alt="BNB" class="currency-logo"> BSC
            </button>
            <button id="currency-eth" class="currency-button">
                <img src="/images/ethereum-logo.png" alt="ETH" class="currency-logo"> ETH
            </button>
            <button id="currency-sol" class="currency-button">
                <img src="/images/sol-logo.png" alt="SOL" class="currency-logo"> SOL
            </button>
        </div>
    </div>
    <div class="container1 bg-gray-800 text-white rounded-lg p-8 mb-8 border border-gray-700">
        <h2 class="text-xl text-center font-semibold mb-4 text-green-400">6. Summary</h2>
        <div class="flex justify-center">
            <button id="confirm-summary" class="btn" disabled>Confirm Banner Details</button>
        </div>
    </div>
    <div class="flex justify-center space-x-8 mt-8">
        <a href="https://t.me/dex_tokens" class="telegram-btn flex items-center">
            <i class="fab fa-telegram-plane telegram-icon"></i> DM on Telegram
        </a>
        <a href="#/contact-us" class="contact-btn flex items-center">
            <i class="fas fa-envelope contact-icon"></i> Contact Us
        </a>
    </div>
</div>

<style>
    .text-ad1 {
        font-size: 2rem;
    }
     .fas {
        font-size: 2rem;
    }
    .adbox1 {
        padding: 10px;
    }
    .container1 {
        padding: 10px;
    }
    .custom-file-upload {
        border: 1px solid #3A4D5C;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background: #2D3748;
        color: white;
        border-radius: 5px;
        transition: background 0.3s, box-shadow 0.3s;
    }
    .custom-file-upload:hover {
        background: #4A5568;
        box-shadow: 0 0 10px rgba(0, 255, 0, 0.6);
    }
    #target-url {
        width: calc(100% - 40px);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    #target-url:focus {
        outline: none;
        box-shadow: 0 0 0 1px #38A169;
        border-color: #38A169;
    }
    #banner-preview {
        width: 600px;
        height: 240px;
        background-size: cover;
        background-position: center;
        border: 1px solid #3A4D5C;
    }
    .form-radio {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    .form-radio input[type="radio"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #b0b0b0; /* Grey border when unchecked */
        border-radius: 50%;
        background-color: #fff;
        cursor: pointer;
        position: relative;
        outline: none; /* Remove default focus outline */
        transition: all 0.3s ease;
        margin-right: 10px; /* Add space between radio and label */
    }
    .form-radio input[type="radio"]:checked {
        background-color: #16c784; /* Green background when checked */
        border-color: #16c784; /* Green border when checked */
        box-shadow: 0 0 5px rgba(22, 199, 132, 0.6); /* Glow effect */
    }
    .form-radio input[type="radio"]:hover {
        border-color: #16c784; /* Green border when hovered */
    }
    .form-radio input[type="radio"]:checked:active {
        box-shadow: 0 0 10px rgba(22, 199, 132, 0.8); /* Stronger glow effect */
    }
    .form-radio input[type="radio"]:focus {
        outline: none; /* Remove default focus outline */
        box-shadow: 0 0 5px rgba(22, 199, 132, 0.6); /* Custom glow effect */
    }
    .form-radio .radio-label {
        display: flex;
        align-items: center;
        margin-left: 10px;
    }
    .form-radio input[type="radio"]:checked + .radio-label {
        color: #38A169;
        font-weight: bold;
    }
    .currency-button {
        display: flex;
        align-items: center;
        background-color: #2D3748;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 0 10px;
    }
    .currency-button:hover, .currency-button.bg-selected {
        background-color: #4A5568;
    }
    .currency-logo {
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }
    .btn {
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: medium;
        border-radius: 0.375rem;
        background: linear-gradient(90deg, #16c784, #1afa7b) !important;
        border: none !important;
        color: #1E2430 !important;
        transition: background 0.3s, color 0.3s, box-shadow 0.3s !important;
        outline: none !important; /* Remove default focus outline */
        box-shadow: none !important; /* Remove blue outline on other browsers */
    }

    .btn:hover, .btn:focus {
        background: linear-gradient(90deg, #1afa7b, #16c784) !important; /* Swap gradient colors on hover */
        color: #000000 !important; /* Darker text color on hover */
        box-shadow: 0 4px 10px rgba(26, 250, 123, 0.6) !important; /* Glow effect */
    }

    .btn:active {
        background: linear-gradient(90deg, #0c6d44, #0f804b) !important;
        box-shadow: 0 0 10px 2px rgba(22, 199, 132, 0.7) !important; /* Glow effect */
        color: #000000 !important; /* Darker text color on active */
    }
    .telegram-btn {
        margin-right: 6rem;
        display: flex;
        align-items: center;
        padding: 0.625rem 1.25rem;
        background-color: transparent; /* No background color */
        color: #16c784; /* Gradient green text */
        border-radius: 0.375rem;
        font-size: 1rem;
        font-weight: medium;
        transition: color 0.3s, box-shadow 0.3s;
        text-decoration: none; /* Remove underline */
    }

    .telegram-btn:hover, .telegram-btn:focus {
        color: #1afa7b; /* Lighter gradient green on hover */
        box-shadow: none; /* Remove shadow on hover */
    }

    .telegram-icon {
        font-size: 1.5rem; /* Larger icon size */
        margin-right: 0.5rem; /* Padding between icon and text */
    }

    .contact-btn {
        margin-left: 6rem;
        display: flex;
        align-items: center;
        padding: 0.625rem 1.25rem;
        background-color: transparent; /* No background color */
        color: #16c784; /* Gradient green text */
        border-radius: 0.375rem;
        font-size: 1rem;
        font-weight: medium;
        transition: color 0.3s, box-shadow 0.3s;
        text-decoration: none; /* Remove underline */
        
    }

    .contact-btn:hover, .contact-btn:focus {
        color: #1afa7b; /* Lighter gradient green on hover */
        box-shadow: none; /* Remove shadow on hover */
    }

    .contact-icon {
        font-size: 1.5rem; /* Larger icon size */
        margin-right: 0.5rem; /* Padding between icon and text */
    }

    /* Modal Styling */
    #expressListingModal {
        display: none; /* Hide modal by default */
        position: fixed;
        inset: 0;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px); /* Add blur effect */
        z-index: 1000;
    }
    #expressListingModal .modal-content {
        background-color: #1a202c; /* Dark background */
        color: #fff; /* Light text */
        border: 2px solid #16c784cc; /* Green border */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px #16c784cc;
        max-width: 600px; /* Increased width */
        width: 100%;
        padding: 20px;
    }
    #closeModal {
        cursor: pointer;
        color: #dfff16; /* Green color */
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
    }
    .w-40 {
        width: 10rem;
        height: 10rem;
    }
    .rounded-lg {
        border-radius: 0.5rem;
    }

    #expressListingModal.flex {
        display: flex;
    }
    .relative .mb-6 {
        margin-bottom: 1.5rem;
    }
    #copyButton {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: white;
        font-size: 1rem;
    }
    #copyButton i {
        font-size: 1.25rem;
    }
    .flex.items-center.mb-6.relative input {
        padding-right: 2.5rem;
    }
    .relative .mr-2 {
        margin-right: 0.5rem;
    }
    .tooltip {
        display: none;
        position: absolute;
        top: -30px;
        right: 0;
        background: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.75rem;
    }
    .tooltip.visible {
        display: block;
    }
    
    
</style>

<div id="expressListingModal" class="hidden">
    <div class="modal-content relative">
        <button id="closeModal" class="absolute top-2 right-2 text-white">✖</button>
        <h2 class="text-2xl mb-6 text-white">Confirm Payment</h2>
        <p id="selectedDuration" class="text-white mb-4">Selected Duration:</p>
        <div class="flex items-center mb-6 relative">
            <img id="currencyLogo" src="" alt="Currency Logo" class="w-8 h-8 mr-2" />
            <input id="walletAddress" type="text" value="" readonly class="w-full p-2 bg-gray-700 text-white rounded">
            <button id="copyButton" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white bg-transparent border-none"><i class="fa fa-copy"></i></button>
            <div id="copyTooltip" class="tooltip">Copied!</div>
        </div>
        <div class="flex justify-center mb-6">
            <img id="qrCode" src="" alt="QR Code" class="w-40 h-40 rounded-lg" />
        </div>
        <div class="flex justify-between mt-6">
            <a id="blockchainLink" href="" target="_blank" class="btn">View On Blockchain</a>
            <button id="confirmPaymentButton" class="btn">Confirm Payment</button>
        </div>
        <div id="notification" class="hidden text-center mt-4"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let uploadedFile;
        const modal = document.getElementById('expressListingModal');
        const closeModalButton = document.getElementById('closeModal');
        const confirmSummaryButton = document.getElementById('confirm-summary');
        const confirmPaymentButton = document.getElementById('confirmPaymentButton');
        const copyButton = document.getElementById('copyButton');
        const copyTooltip = document.getElementById('copyTooltip');
        const walletAddress = document.getElementById('walletAddress');
        const qrCode = document.getElementById('qrCode');
        const blockchainLink = document.getElementById('blockchainLink');
        const selectedDuration = document.getElementById('selectedDuration');
        const currencyLogo = document.getElementById('currencyLogo');
        const currencyButtons = document.querySelectorAll('.currency-button');
        const durationOptions = document.querySelectorAll('input[name="duration"]');
        const notification = document.getElementById('notification');
        let selectedCurrency = 'BSC';
        let durationText = '0.1 BSC = 7 day banner duration';

        const prices = {
            BNB: {
                7: '0.1 BSC = 7 day banner duration',
                14: '0.2 BSC = 14 days banner duration',
                30: '0.35 BSC = 30 days banner duration'
            },
            ETH: {
                7: '0.017 ETH = 7 day banner duration',
                14: '0.035 ETH = 14 days banner duration',
                30: '0.062 ETH = 30 days banner duration'
            },
            SOL: {
                7: '0.33 SOL = 7 day banner duration',
                14: '0.67 SOL = 14 days banner duration',
                30: '1.18 SOL = 30 days banner duration'
            }
        };

        const wallets = {
            BSC: '0xB661c0c7278D2Ca77Fea5903744F72FD1ab94F45',
            ETH: '0xc062833dC6538739056a6EB8ae003892D3577cC3',
            SOL: 'GZ7fEsZPFnbUTrN78j8Z633KSyrBqriWsA8h5SjpW1q'
        };

        const qrCodes = {
            BSC: '/images/qr/BNB.png',
            ETH: '/images/qr/Eth.png',
            SOL: '/images/qr/Sol.png'
        };

        const blockchainLinks = {
            BSC: 'https://bscscan.com/address/0xB661c0c7278D2Ca77Fea5903744F72FD1ab94F45',
            ETH: 'https://etherscan.io/address/0xc062833dC6538739056a6EB8ae003892D3577cC3',
            SOL: 'https://solscan.io/account/GZ7fEsZPFnbUTrN78j8Z633KSyrBqriWsA8h5SjpW1q'
        };

        function updatePrices() {
            durationOptions.forEach(option => {
                option.nextElementSibling.textContent = prices[selectedCurrency][option.value];
            });
        }

        function openModal() {
            selectedDuration.textContent = `Selected Duration: ${durationText}`;
            walletAddress.value = wallets[selectedCurrency];
            qrCode.src = qrCodes[selectedCurrency];
            blockchainLink.href = blockchainLinks[selectedCurrency] + wallets[selectedCurrency];
            currencyLogo.src = document.querySelector(`#currency-${selectedCurrency.toLowerCase()} .currency-logo`).src;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        closeModalButton.addEventListener('click', closeModal);
        confirmSummaryButton.addEventListener('click', openModal);

        currencyButtons.forEach(button => {
            button.addEventListener('click', function () {
                selectedCurrency = this.textContent.trim();
                updatePrices();
                currencyButtons.forEach(btn => btn.classList.remove('bg-selected'));
                this.classList.add('bg-selected');
            });
        });

        durationOptions.forEach(option => {
            option.addEventListener('change', function () {
                durationText = prices[selectedCurrency][this.value];
            });
        });

        document.getElementById('banner-upload').addEventListener('change', function (event) {
            uploadedFile = event.target.files[0];
            if (uploadedFile && ['image/jpeg', 'image/png', 'image/gif'].includes(uploadedFile.type) && uploadedFile.size <= 5242880) { // 5MB in bytes
                document.getElementById('preview-button').disabled = false;
            } else {
                document.getElementById('preview-button').disabled = true;
                alert('Invalid file format or size. Please upload a valid image file up to 5MB.');
            }
        });

        document.getElementById('preview-button').addEventListener('click', function () {
            if (uploadedFile) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('banner-preview');
                    const previewText = document.getElementById('preview-text');
                    preview.style.backgroundImage = `url(${e.target.result})`;
                    previewText.style.display = 'none';
                    confirmSummaryButton.disabled = false; // Enable the confirm button
                };
                reader.readAsDataURL(uploadedFile);
            }
        });

        copyButton.addEventListener('click', function () {
            navigator.clipboard.writeText(walletAddress.value).then(() => {
                copyTooltip.classList.add('visible');
                setTimeout(() => {
                    copyTooltip.classList.remove('visible');
                }, 1000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        });

        confirmPaymentButton.addEventListener('click', function () {
            const banner = document.getElementById('banner-upload').files[0];
            const targetUrl = document.getElementById('target-url').value;
            const duration = document.querySelector('input[name="duration"]:checked').value;
            const currency = selectedCurrency;

            const formData = new FormData();
            formData.append('banner', banner);
            formData.append('target_url', targetUrl);
            formData.append('duration', duration);
            formData.append('currency', currency);

            fetch('{{ route("send.email") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            }).then(response => {
                if (response.ok) {
                    notification.textContent = 'Banner Submitted!';
                    notification.classList.add('text-green-500');
                    notification.classList.remove('hidden');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    notification.textContent = 'Failed to send email. Please try again.';
                    notification.classList.add('text-red-500');
                    notification.classList.remove('hidden');
                }
            }).catch(error => {
                console.error('Error:', error);
                notification.textContent = 'Failed to send email. Please try again.';
                notification.classList.add('text-red-500');
                notification.classList.remove('hidden');
            });
        });
    });
</script>
@endsection
