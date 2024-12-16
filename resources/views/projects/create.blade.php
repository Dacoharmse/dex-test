@extends('layout.main')

@section('meta_title')
    List a New Token Free | Best Token Calendar | Dex-Tokens.com
@endsection

@section('meta_description')
    Submit a new Token on Dex-Tokens.com for free. Fast reviews and instant listing service. Start to gain community with listing on our platform!
@endsection

@section('meta_image')
    {{ Storage::url(setting('site.meta_image')) }}
@endsection

@push('head')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#features',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        });
    </script>
@endpush

@section('content')
    <div class="max-w-6xl px-5 mx-auto">
        <section class="py-4">
            <div class="text-green-700 bg-green-100" role="alert">
                <div class="flex p-4 text-sm max-w-6xl px-5 mx-auto">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-semibold">Info</span> Keep in mind, that each Token review can take up to 5-10 business days, Please be patient. <br><em>We also offer an express listing service for almost instant listing!</em>
                    </div>
                </div>
            </div>
            <h1 class="mb-6 mt-6 text-3xl">Submit a new Token</h1>
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="-mx-4">
                    <x-validation-alert />
                    <div class="form-group">
                        <label for="title" class="!text-xl required">Title</label>
                        <input class="form-control" type="text" id="title" name="title" required value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Overview</label>
                        <div class="flex flex-col divide-y border rounded-lg">
                            <div class="form-group">
                                <label for="logo" class="required">Logo</label>
                                <input class="form-control !p-0 !focus:outline-none" id="logo" name="logo" type="file" required>
                                <span class="help-text">JPG or PNG -file, size between 150x150px and 1600x1600px</span>
                            </div>
                            <div class="form-group">
                                <label for="contract_address" class="required">Contract Address: CA</label>
                                <input type="text" class="form-control" id="contract_address" name="contract_address" value="{{ old('contract_address') }}" placeholder="Enter your Contract Address">
                                <span class="help-text">Insert your Contract Address: CA. (This will appear on the front page)</span>
                            </div>
                            <div class="form-group">
                                <label for="embed_url" class="required">DEX Screener URL</label>
                                <input class="form-control" id="embed_url" type="url" name="embed_url" value="{{ old('embed_url') }}" required />
                                <span class="help-text">Please input a DexScreener URL.</span>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Token Launch Date</label>
                                <input class="form-control" type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                <span class="help-text">Do not enter Presale Date</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Project Details</label>
                        <div class="flex flex-col divide-y border rounded-lg">
                            <div class="form-group">
                                <label for="features" class="required">Features</label>
                                <textarea class="form-control" id="features" name="features" rows="3">{{ old('features') }}</textarea>
                                <span class="help-text">More info about the project or concept. Use case, problem/solution, features. How it works etc.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Links</label>
                        <div class="flex flex-col divide-y border rounded-lg">
                            @php
                                $links = [['name' => 'website_link', 'isRequired' => true], ['name' => 'token_explorer_link', 'isRequired' => true], ['name' => 'telegram_link', 'isRequired' => true], ['name' => 'twitter_link', 'isRequired' => false], ['name' => 'facebook_link', 'isRequired' => false]];
                            @endphp
                            @foreach ($links as $link)
                                <div class="form-group">
                                    <label for="{{ $link['name'] }}" class="{{ $link['isRequired'] ? 'required' : '' }}">
                                        {{ ucwords(str_replace('_', ' ', $link['name'])) }}
                                    </label>
                                    <input type="url" class="form-control" id="{{ $link['name'] }}" name="{{ $link['name'] }}" value="{{ old($link['name']) }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Token Details</label>
                        <div class="flex flex-col divide-y border rounded-lg">
                            <div class="form-group">
                                <label for="promoted">Promoted Token</label>
                                <label for="toggle-promoted" class="form-switch">
                                    <input type="checkbox" id="toggle-promoted" name="promoted" class="sr-only peer" value="1" @checked(old('promoted'))>
                                    <div class="toggle peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="flex flex-wrap divide-x divide-y">
                                <div class="form-group md:w-2/3 w-full">
                                    <label for="token_pair_currency">Token Pair Currency</label>
                                    <input class="form-control" id="token_pair_currency" name="token_pair_currency" type="text" step="any" value="{{ old('token_pair_currency') }}" />
                                </div>
                                <div class="form-group md:w-1/3 w-full">
                                    <label for="token_hard_cap_currency">Token Hard Cap Currency</label>
                                    <select id="token_hard_cap_currency" class="form-control" name="token_hard_cap_currency">
                                        @php
                                            $currencies = [
                                                'usd' => 'US Dollar (USD)',
                                                'eth' => 'Ethereum (ETH)',
                                                'btc' => 'Bitcoin (BTC)'
                                            ];
                                            $token_hard_cap_currency = old('token_hard_cap_currency') ?? 'usd';
                                        @endphp
                                        @foreach ($currencies as $value => $label)
                                            <option value="{{ $value }}" {{ $token_hard_cap_currency == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-wrap divide-x divide-y">
                                <div class="form-group md:w-2/3 w-full">
									<label for="token_pooled">Token Pooled</label>
                                    <input class="form-control" id="token_pooled" name="token_pooled" type="text" step="any" value="{{ old('token_pooled') }}" />
                                </div>
                                <div class="form-group md:w-1/3 w-full">
                                    <label for="token_network">Token Network</label>
                                    <select id="token_network" class="form-control" name="token_network">
                                        @php
                                            $currencies = [
                                                'bnb' => 'Binance (BNB)',
                                                'eth' => 'Ethereum (ETH)',
                                                'sol' => 'Solana (SOL)',
                                                'base' => 'Base (BASE)',
                                                'matic' => 'Polygon (MATIC)',
                                                'arb' => 'Arbitrum (ARB)',
                                                'trx' => 'TRON (TRX)',
												'avax' => 'Avax (AVAX)',
												'ton' => 'Ton (TON)',
												'sui' => 'Sui (sui)'
                                            ];
                                            $token_network = old('token_network') ?? 'bnb';
                                        @endphp
                                        @foreach ($currencies as $value => $label)
                                            <option value="{{ $value }}" {{ $token_network == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="presale" class="required">Launch Type</label>
                                <select id="presale" class="form-control" name="presale" required>
                                    @foreach (['no', 'presale', 'pump.fun', 'ape.store', 'sun.pump', 'moonshot'] as $option)
                                        <option value="{{ $option }}" {{ (old('presale') ?? 'no') === $option ? 'selected' : '' }}>
                                            {{ strtoupper($option) }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="help-text">Select the launch type for your token.</span>
                            </div>
                            <div class="form-group">
                                <label for="presale_start_date">Start Date</label>
                                <input class="form-control" type="date" id="presale_start_date" name="presale_start_date" value="{{ old('presale_start_date') }}">
                                <span class="help-text">Input the start date if already set.</span>
                            </div>
                            <div class="form-group">
                                <label for="presale_end_date">End Date</label>
                                <input class="form-control" type="date" id="presale_end_date" name="presale_end_date" value="{{ old('presale_end_date') }}">
                                <span class="help-text">Input the end date if already set.</span>
                            </div>

                            <div class="form-group">
                                <label for="token_symbol">Token Symbol</label>
                                <input id="token_symbol" class="form-control" name="token_symbol" value="{{ old('token_symbol') }}" />
                            </div>
                            <div class="form-group">
                                <label for="price_per_token">Price Per Token</label>
                                <input id="price_per_token" class="form-control" name="price_per_token" value="{{ old('price_per_token') }}" />
                                <span class="help-text">Example: 1 Token = 0.000216 USD</span>
                            </div>
                            <div class="form-group">
                                <label for="exchange_listing_1">Exchange Listing 1</label>
                                <select id="exchange_listing_1" class="form-control" name="exchange_listing_1">
                                    <option value="None" {{ old('exchange_listing_1') == 'None' ? 'selected' : '' }}>None</option>
                                    <option value="Dexscreener" {{ old('exchange_listing_1') == 'Dexscreener' ? 'selected' : '' }}>Dexscreener</option>
                                    <option value="Coingecko" {{ old('exchange_listing_1') == 'Coingecko' ? 'selected' : '' }}>Coingecko</option>
                                    <option value="Dextools" {{ old('exchange_listing_1') == 'Dextools' ? 'selected' : '' }}>Dextools</option>
                                    <option value="Coinmarketcap" {{ old('exchange_listing_1') == 'Coinmarketcap' ? 'selected' : '' }}>Coinmarketcap</option>
                                </select>
                                <span class="help-text">Select the first exchange where your project is listed or will be listed.</span>
                            </div>

                            <div class="form-group">
                                <label for="exchange_listing_2">Exchange Listing 2</label>
                                <select id="exchange_listing_2" class="form-control" name="exchange_listing_2">
                                    <option value="None" {{ old('exchange_listing_2') == 'None' ? 'selected' : '' }}>None</option>
                                    <option value="Dexscreener" {{ old('exchange_listing_2') == 'Dexscreener' ? 'selected' : '' }}>Dexscreener</option>
                                    <option value="Coingecko" {{ old('exchange_listing_2') == 'Coingecko' ? 'selected' : '' }}>Coingecko</option>
                                    <option value="Dextools" {{ old('exchange_listing_2') == 'Dextools' ? 'selected' : '' }}>Dextools</option>
                                    <option value="Coinmarketcap" {{ old('exchange_listing_2') == 'Coinmarketcap' ? 'selected' : '' }}>Coinmarketcap</option>
                                </select>
                                <span class="help-text">Select the second exchange where your project is listed or will be listed.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Team</label>
                        <div class="flex flex-col divide-y border rounded-lg">
                            <div class="form-group">
                                <label class="required">Core Team</label>
                                <span class="help-text mb-4">List team members and their roles.</span>
                                <div class="repeater-fields flex flex-col gap-5" data-team="core_team">
                                    <div class="flex justify-end">
                                        <button type="button" class="btn btn-primary repeatTeamButton" data-name="core_team">Add Team Member</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Advisory Team</label>
                                <div class="repeater-fields flex flex-col gap-5" data-team="advisory_team">
                                    <div class="flex justify-end">
                                        <button type="button" class="btn btn-primary repeatTeamButton" data-name="advisory_team">Add Name</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Contact Details</label>
                        <div class="flex flex-col divide-y border rounded-lg p-4">
                            <span class="help-text mb-4">Who should we contact for additional information regarding this Token? The person submitting a project to our site for approval must be either an official member of the team or an authorized representative with permission to represent the project and information given in this application. Proof of your involvement and permission to represent the Token will be required before any publications can be made.</span>
                            <div class="form-group">
                                <label for="full_name" class="required">Your Full Name</label>
                                <input class="form-control" id="full_name" name="full_name" required value="{{ old('full_name') }}" />
                                <span class="help-text">Please indicate the name of the individual making the submission, and not an entity or company</span>
                            </div>
                            <div class="form-group">
                                <label for="permissions" class="required">Permissions</label>
                                @php
                                    $permissions = [
                                        'recognition' => 'I certify that any statements provided in this form are by an authorized representative of this project, and that any public marketing materials are true and correct to the personal knowledge of the submitter.',
                                        'permissions_recognition' => 'This project complies with the laws and regulations, specifically dealing with sales of securities, in every country/jurisdiction that it sells.',
                                    ];
                                @endphp
                                @foreach ($permissions as $key => $permission)
                                    <div class="form-checkbox">
                                        <input id="permission_{{ $loop->iteration }}" name="{{ $key }}" type="checkbox" @checked(old($key)) value="1" required>
                                        <label for="permission_{{ $loop->iteration }}">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="email" class="required">Email Address</label>
                                <input class="form-control" id="email" name="email" type="email" required value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <label for="direct_telegram" class="required">Direct Telegram Message</label>
                                <input class="form-control" id="direct_telegram" name="direct_telegram" type="url" required value="{{ old('direct_telegram') }}" />
                                <span class="help-text">Please input your telegram link to directly contact you.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="!text-xl">Listing Methods</label>
                        <div class="flex flex-col divide-y border rounded-lg p-4">
                            <div class="flex justify-between items-center form-group">
                                <div>
                                    <label class="!text-xl"><b>Free Listing:</b></label>
                                    <p>Your review request will be reviewed by our review team and will be accepted within 5-10 business days at the latest. If you have any questions, please feel free to contact us.</p>
                                </div>
                                <label for="toggle-free_listing" class="form-switch">
                                    <input type="checkbox" id="toggle-free_listing" name="free_listing" class="sr-only peer" value="1" @checked(old('free_listing'))>
                                    <div class="toggle peer peer-checked:after:translate-x-full peer-checked:after:border-white peer-checked:bg-gradient-to-r from-green-400 to-green-600"></div>
                                </label>
                            </div>
                            <div class="flex justify-between items-center form-group">
                                <div>
                                    <label class="!text-xl"><b>Express Listing:</b></label>
                                    <p>Your token almost instantly listed on the Dex-Tokens.com platform in a few hours after you complete the crypto payment.</p>
                                    <p>Additional benefits of Express Listing:</p>
                                    <ul>
                                        <li>• Your token gets listed instantly, skipping the queue. Be seen right away!</li>
                                        <li>• +3500 Vote and 12h Promoted Listing</li>
                                        <li>• We shout out your listing on our popular <a href="#">Telegram Express Listing</a> channel, reaching a vast audience instantly.</li>
                                        <li>• Express-listed tokens are eligible to be featured as our exclusive "Token of The Day," amplifying your reach and prestige.</li>
                                        <li><br><b>Multiple Instant Crypto Payment options:</b> <span style="color: green;">SALE 60% OFF</span></li>
                                        <li>
                                            <img src="images/bnb-logo.png" alt="BNB Logo" class="inline-block w-6 h-6 mr-2">
                                            0.075 BSC
                                        </li>
                                        <li>
                                            <img src="images/ethereum-logo.png" alt="ETH Logo" class="inline-block w-6 h-6 mr-2">
                                            0.01 ETH
                                        </li>
                                        <li>
                                            <img src="images/sol-logo.png" alt="SOL Logo" class="inline-block w-6 h-6 mr-2">
                                            0.3 SOL
                                        </li>
                                    </ul>
                                </div>
                                <label for="toggle-express_listing" class="form-switch">
                                    <input type="checkbox" id="toggle-express_listing" name="express_listing" class="sr-only peer" value="1" @checked(old('express_listing'))>
                                    <div class="toggle peer peer-checked:after:translate-x-full peer-checked:after:border-white peer-checked:bg-gradient-to-r from-green-400 to-green-600"></div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="toggle-standard_listing_fee" class="form-switch">
                                <input type="checkbox" id="toggle-standard_listing_fee" name="standard_listing_fee" class="sr-only peer" value="1">
                                <div class="toggle peer peer-checked:after:translate-x-full peer-checked:after:border-white peer-checked:bg-gradient-to-r from-green-400 to-green-600"></div>
                                <span class="!text" style="padding-left: 15px;">I understand that there may be a listing fee for approved projects.</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="weight-500">
                            Submit for Review
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <!-- Pop-up Modal -->
    <div id="expressListingModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-gray-800 rounded-lg p-10 shadow-lg border-4 border-green-400 relative max-w-xl mx-auto modal-content" style="box-shadow: 0 0 15px green;">
            <button id="closeModal" class="absolute top-2 right-2 text-white">✖</button>
            <h2 class="text-2xl mb-6 text-white text-center">Express Listing Payment</h2>

            <!-- Currency Selector -->
            <label for="currency" class="block text-white mb-4 text-center">Select Currency</label>
            <select id="currency" class="mb-6 p-2 bg-gray-700 text-white rounded w-full text-center">
                <option value="solana">Solana (SOL)</option>
                <option value="ethereum">Ethereum (ETH)</option>
                <option value="bnb">Binance Coin (BSC)</option>
            </select>

            <p id="currencyAddress" class="text-white mb-2 text-center">Your Solana Address</p>
            <div class="flex items-center mb-6 relative justify-center">
                <img id="currencyLogo" src="images/sol-logo.png" alt="Currency Logo" class="w-8 h-8 mr-2" />
                <input id="walletAddress" type="text" value="GZ7fEsZPFnbUTrN78j8Z633KSyrBqriWsA8h5SjpW1q" readonly class="w-full p-2 bg-gray-700 text-white rounded text-center">
                <button id="copyButton" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white bg-transparent border-none"><i class="fa fa-copy"></i></button>
            </div>

            <div class="flex justify-center mb-6">
                <img id="qrCode" src="/images/qr/Sol.png" alt="QR Code" class="w-40 h-40 rounded-lg" />
            </div>

            <div class="flex justify-between mt-6">
                <button id="emailButton" class="btn22 btn-outline-primary w-full mr-2">Email This Address</button>
                <a id="viewOnBlockchain" href="https://solscan.io/account/GZ7fEsZPFnbUTrN78j8Z633KSyrBqriWsA8h5SjpW1q" target="_blank" class="btn22 btn-outline-primary w-full mr-2">View On Blockchain</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const expressToggle = document.getElementById('toggle-express_listing');
            const modal = document.getElementById('expressListingModal');
            const closeModal = document.getElementById('closeModal');
            const walletAddress = document.getElementById('walletAddress');
            const copyButton = document.getElementById('copyButton');
            const currencySelect = document.getElementById('currency');
            const currencyAddress = document.getElementById('currencyAddress');
            const qrCode = document.getElementById('qrCode');
            const blockchainLink = document.getElementById('viewOnBlockchain');
            const currencyLogo = document.getElementById('currencyLogo');

            // Show the modal when the express listing is checked
            expressToggle.addEventListener('change', () => {
                if (expressToggle.checked) {
                    modal.classList.remove('hidden');
                    modal.classList.add('show');
                } else {
                    modal.classList.remove('show');
                    modal.classList.add('hidden');
                }
            });

            // Hide the modal when the close button is clicked but keep the checkbox checked
            closeModal.addEventListener('click', (event) => {
                event.preventDefault();
                modal.classList.add('hidden');
                modal.classList.remove('show');
            });

            // Copy wallet address to clipboard
            copyButton.addEventListener('click', (event) => {
                event.preventDefault();
                navigator.clipboard.writeText(walletAddress.value).then(() => {
                    alert('Wallet address copied to clipboard');
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                });
            });

            // Change wallet address and QR code based on selected currency
            currencySelect.addEventListener('change', () => {
                const selectedCurrency = currencySelect.value;
                let address, qrCodeSrc, blockchainUrl, currencyLogoSrc;

                switch (selectedCurrency) {
                    case 'solana':
                        address = 'GZ7fEsZPFnbUTrN78j8Z633KSyrBqriWsA8h5SjpW1q';
                        qrCodeSrc = '/images/qr/Sol.png';
                        blockchainUrl = 'https://solscan.io/account/GZ7fEsZPFnbUTrN78j8Z633KSyrBqriWsA8h5SjpW1q';
                        currencyAddress.textContent = 'Your Solana Address';
                        currencyLogoSrc = '/images/sol-logo.png';
                        break;
                    case 'ethereum':
                        address = '0xc062833dC6538739056a6EB8ae003892D3577cC3';
                        qrCodeSrc = '/images/qr/Eth.png';
                        blockchainUrl = 'https://etherscan.io/address/0xc062833dC6538739056a6EB8ae003892D3577cC3';
                        currencyAddress.textContent = 'Your Ethereum Address';
                        currencyLogoSrc = '/images/ethereum-logo.png';
                        break;
                    case 'bnb':
                        address = '0xB661c0c7278D2Ca77Fea5903744F72FD1ab94F45';
                        qrCodeSrc = '/images/qr/BNB.png';
                        blockchainUrl = 'https://bscscan.com/address/0xB661c0c7278D2Ca77Fea5903744F72FD1ab94F45';
                        currencyAddress.textContent = 'Your BNB Address';
                        currencyLogoSrc = '/images/bnb-logo.png';
                        break;
                }

                walletAddress.value = address;
                qrCode.src = qrCodeSrc;
                blockchainLink.href = blockchainUrl;
                currencyLogo.src = currencyLogoSrc;
            });

            // Add team member functionality
            document.querySelectorAll('.repeatTeamButton').forEach(button => {
                button.addEventListener('click', (e) => {
                    const teamType = e.currentTarget.getAttribute('data-name');
                    const container = document.querySelector(`.repeater-fields[data-team="${teamType}"]`);
                    if (container) {
                        const newIndex = container.children.length;
                        const newMemberHtml = `
                            <div class="border rounded-lg grid md:grid-cols-2 grid-cols-1 gap-4 p-4">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input class="form-control !p-0 !focus:outline-none" name="${teamType}[${newIndex}][photo]" type="file" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label class="required">Full Name</label>
                                    <input required class="form-control" name="${teamType}[${newIndex}][full_name]" />
                                </div>
                                <div class="form-group">
                                    <label class="required">Job Title / Role</label>
                                    <input required class="form-control" name="${teamType}[${newIndex}][job_title]" />
                                </div>
                                <div class="form-group">
                                    <label>LinkedIn Link</label>
                                    <input class="form-control" type="url" name="${teamType}[${newIndex}][linkedin]" />
                                </div>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', newMemberHtml);
                    }
                });
            });

            // Email functionality
            const emailButton = document.getElementById('emailButton');
            emailButton.addEventListener('click', (event) => {
                event.preventDefault();
                const emailAddress = walletAddress.value;
                window.location.href = `mailto:?subject=Crypto Payment Address&body=Please send the payment to the following address: ${emailAddress}`;
            });
        });
    </script>

    <!-- Added Modal Styling -->
    <style>
		.glow-green {
			box-shadow: 0 0 10px rgba(22, 199, 132, 0.8);
		}
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
			text-align: center; /* Center all content */
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
		hidden {
			display: none;
		}
		#expressListingModal.show {
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
		.btn22 {
			display: inline-block;
			padding: 0.75rem 1.5rem;
			margin: 0.5rem 0;
			font-size: 0.8rem;
			font-weight: 600;
			text-align: center;
			text-decoration: none;
			color: #fff;
			background-color: #16c784; /* Green background */
			border: none;
			border-radius: 0.25rem;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		.btn22:hover {
			background-color: #14a772; /* Darker green on hover */
		}
		.btn-outline-primary {
			background-color: transparent;
			color: #16c784; /* Green text */
			border: 2px solid #16c784; /* Green border */
		}
		.btn-outline-primary:hover {
			background-color: #16c784; /* Green background on hover */
			color: #fff; /* White text on hover */
		}
	</style>
@endpush
