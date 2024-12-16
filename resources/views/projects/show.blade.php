@extends('layout.main')

@section('meta_title')
    {{ $project->title }} | Dex-Tokens
@endsection

@section('meta_description')
    {{ $project->description }}
@endsection

@section('meta_image')
    {{ Storage::url($project->logo) }}
@endsection

@section('content')
    <div style="width: 72%; max-width: 100%; margin: 0 auto;">
        <section class="">
            <div class="flex flex-wrap">
                <div class="md:w-2/12 w-full md:0 mb-4 md:block flex justify-center">
                    <img class="rounded-full" src="{{ Storage::url($project->logo) }}" alt="{{ $project->title }}" style="width: 150px; height: 150px;">
                </div>
                <div class="md:w-10/12 w-full md:text-left text-center md:pl-4 pl-0">
                    <div class="flex items-center gap-2">
                        <h1 class="text-2xl font-semibold mb-2">
                            {{ $project->title }}
                        </h1>
                        @if (strtolower($project->presale) === 'moonshot')
                            <span style="background-color: #dfff16; color: #1E2430; padding: 0.2rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600; border: 1px solid #dfff16; margin-bottom: 0.5rem;">Moonshot</span>
                        @elseif (strtolower($project->presale) === 'presale')
                            <span style="background-color: blue; color: white; padding: 0.2rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Presale</span>
                        @elseif (strtolower($project->presale) === 'pump.fun')
                            <span style="background-color: white; color: green; padding: 0.2rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Pump.Fun</span>
                        @elseif (strtolower($project->presale) === 'ape.store')
                            <span style="background-color: yellow; color: black; padding: 0.2rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Ape.Store</span>
                        @elseif (strtolower($project->presale) === 'sun.pump')
                            <span style="background-color: orange; color: white; padding: 0.2rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Sun.Pump</span>
                        @endif
                    </div>
                    <div class="flex items-center mb-6">
                        <p id="contractAddress" class="mr-2">{{ $project->contract_address }}</p>
                        <button onclick="copyToClipboard()" class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-gray-700 transition-all duration-200 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-2M16 2H8m8 0a2 2 0 012 2v12a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2m8 0V2m0 4H6" />
                            </svg>
                            <span id="copyAlert" class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-700 text-white text-xs rounded py-1 px-2 opacity-0 transition-opacity duration-300">Copied</span>
                        </button>
                    </div>
                    <div class="flex flex-wrap md:justify-between justify-center gap-6 items-center">
                        <x-social-links :links="$project->links" />
                        <div class="flex flex-wrap">
                            <a class="btn btn-outline-primary" href="{{ $project->token_explorer_link }}" target="_blank">
                                <i class="fa-solid fa-file-pdf"></i> View In Explorer
                            </a>
                            <a class="btn btn-primary" href="{{ $project->website_link }}?from=cryptoicon.net" target="_blank">
                                <i class="fa-solid fa-link"></i> View Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-1">
            <div class="flex flex-wrap">
                <div style="width: 73%; max-width: 100%; margin-right: 1rem;"> <!-- Adjust this percentage for the embedded section -->
                    <div id="dexscreener-embed" class="relative rounded-xl" style="height: 740px;">
                        <iframe src="{{ $project->embed_url }}?embed=1&theme=dark&trades=1&info=0" class="w-full h-full" frameborder="2" style="height: 100%;"></iframe>
                    </div>
                    <div class="mb-6 mt-6">
                        <h4 class="feut font-semibold">Features</h4>
                        <div class="prose">
                            {!! $project->features !!}
                        </div>
                    </div>
                </div>

                <div style="width: 25%; max-width: 100%;" class="self-start md:sticky top-5"> <!-- Adjust this percentage for the right section -->
                    <div class="icon-group">
                        <div class="icon-container" id="boostButton" data-action="boost" data-count="{{ $project->boosts }}" data-project-id="{{ $project->id }}">
                            <img src="{{ asset('images/rocket.png') }}" alt="Boost Icon" class="w-6 h-6">
                            <span class="count" id="boostCount{{ $project->id }}">{{ $project->boosts }}</span>
                            <span class="tooltip">Boost</span>
                        </div>
                        <div class="icon-container" id="voteButton" data-action="vote" data-count="{{ $project->votes }}" data-project-id="{{ $project->id }}">
                            <img src="{{ asset('images/flame.png') }}" alt="Vote Icon" class="w-6 h-6">
                            <span class="count" id="voteCount{{ $project->id }}">{{ $project->votes }}</span>
                            <span class="tooltip">Vote</span>
                        </div>
                        <div class="icon-container" id="shitButton" data-action="shit" data-count="{{ $project->shits }}" data-project-id="{{ $project->id }}">
                            <img src="{{ asset('images/shit.png') }}" alt="Shit Icon" class="w-6 h-6">
                            <span class="count" id="shitCount{{ $project->id }}">{{ $project->shits }}</span>
                            <span class="tooltip">Shit</span>
                        </div>
                        <div class="icon-container" id="flagButton" data-action="flag" data-count="{{ $project->flags }}" data-project-id="{{ $project->id }}">
                            <img src="{{ asset('images/flag.png') }}" alt="Flag Icon" class="w-6 h-6">
                            <span class="count" id="flagCount{{ $project->id }}">{{ $project->flags }}</span>
                            <span class="tooltip">Flag</span>
                        </div>
                    </div>
                    <div class="token-details-box">
                        <h2 class="text-2xl mb-8">Token Details</h2>
                        @php
							// Define currency mappings for token_hard_cap_currency and token_network
							$currencyMapping = [
								'usd' => '(USD)',
								'eth' => '(ETH)',
								'btc' => '(BTC)',
								'bnb' => '(BNB)',
								'sol' => '(SOL)',
								'base' => '(BASE)',
								'matic' => '(MATIC)',
								'arb' => '(ARB)',
								'trx' => '(TRX)',
							];

							// Get the formatted Token Hard Cap Currency (default to uppercase if not found in the map)
							$formattedHardCapCurrency = isset($currencyMapping[$project->token_hard_cap_currency]) 
														? $currencyMapping[$project->token_hard_cap_currency] 
														: strtoupper($project->token_hard_cap_currency);

							// Get the formatted Token Network (default to uppercase if not found in the map)
							$formattedTokenNetwork = isset($currencyMapping[$project->token_network]) 
													 ? $currencyMapping[$project->token_network] 
													 : strtoupper($project->token_network);

							// Define details array for display
							$details = [
								'Status' => Str::ucfirst($project->status),
								'Launch Date' => date('M d, Y', strtotime($project->start_date)),
								'Launch Type' => Str::upper($project->presale),
								'Whitelist' => $project->whitelist ? 'Yes' : 'No',
								'Token Pair Currency' => "{$formattedHardCapCurrency} {$project->token_pair_currency}",
								'Token Pooled' => "{$formattedTokenNetwork} {$project->token_pooled}",
								'Token Symbol' => $project->token_symbol,
								'Initial Token Price' => "$ {$project->price_per_token}",
							];
						@endphp
                        @foreach ($details as $key => $value)
                            <div class="flex mb-4 gap-4">
                                <div class="key w-1/2 text-grey-500 text-sm">{{ $key }}</div>
                                <div class="value w-1/2 text-sm">{{ $value }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="button-section">
                        <div class="button-group">
                            <button class="custom-share-btn">
                                <i class="fas fa-share"></i>&nbsp;Share
                            </button>
                            <button class="custom-promote-btn">
                                <i class="fas fa-crown"></i>&nbsp;Promote
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($project->coreTeam->count() > 0)
            <section class="py-8">
                <h4 class="text-xl font-semibold">Core Team</h4>
                <div class="flex flex-wrap gap-10 md:justify-start justify-center">
                    @foreach ($project->coreTeam as $member)
                        <x-member :member="$member" />
                    @endforeach
                </div>
            </section>
        @endif

        @if ($project->advisoryTeam->count() > 0)
            <section class="py-8">
                <h4 class="text-xl font-semibold text-cyan-700 mb-4">Advisory Team</h4>
                <div class="flex flex-wrap gap-10 md:justify-start justify-center">
                    @foreach ($project->advisoryTeam as $member)
                        <x-member :member="$member" />
                    @endforeach
                </div>
            </section>
        @endif
        <section class="py-8">
            <div id="disqus_thread"></div>
            <script>
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://cryptoico.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </section>
    </div>

    <script>
        function copyToClipboard() {
            const contractAddress = document.getElementById('contractAddress').innerText;
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(contractAddress).then(function() {
                    const copyAlert = document.getElementById('copyAlert');
                    copyAlert.style.opacity = 1;
                    setTimeout(() => {
                        copyAlert.style.opacity = 0;
                    }, 2000);
                }, function(err) {
                    console.error('Could not copy text: ', err);
                });
            } else {
                const textarea = document.createElement('textarea');
                textarea.value = contractAddress;
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    document.execCommand('copy');
                    const copyAlert = document.getElementById('copyAlert');
                    copyAlert.style.opacity = 1;
                    setTimeout(() => {
                        copyAlert.style.opacity = 0;
                    }, 2000);
                } catch (err) {
                    console.error('Could not copy text: ', err);
                }
                document.body.removeChild(textarea);
            }
        }

        document.querySelectorAll('.icon-container').forEach(icon => {
            icon.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const projectId = this.getAttribute('data-project-id');
                const countElement = this.querySelector('.count');
                
                fetch(`/projects/${projectId}/${action}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ project_id: projectId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        countElement.textContent = parseInt(countElement.textContent) + 1;
                        countElement.classList.add('glow-green');
                    } else if (data.message) {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>

    <style>
        .token-details-box {
            background-color: #374151;
            border: 2px solid #16c784;
            box-shadow: 0 0 10px #16c784;
            padding: 1.5rem;
            border-radius: 0.5rem;
            width: 100%;
        }
		
		.prose {
   			 max-width: 100%; /* Ensure it matches the iframe width */
		}


		.key {
    		color: #dbf954; /* Updated color to a darker grey */
		}
		
		.value {
    		color: #D3D3D3; /* Updated color to a darker grey */
		}
		
        .button-section {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 1rem;
            width: 100%;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .custom-share-btn, .custom-promote-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        .custom-share-btn {
            background-color: #16c784;
            color: white;
            transition: box-shadow 0.3s ease-in-out;
        }

        .custom-share-btn:hover {
            box-shadow: 0 0 10px #16c784;
        }

        .custom-promote-btn {
            background-color: #f39c12;
            color: white;
            transition: box-shadow 0.3s ease-in-out;
        }

        .custom-promote-btn:hover {
            box-shadow: 0 0 10px #f39c12;
        }

        .icon-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            width: 100%;
        }
		
		.feut{
			font-size: 2rem;
		}
        .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #374151;
            padding: 0.3rem;
            border-radius: 0.5rem;
            border:;
			box-shadow: 0 0 8px #16c784;
            transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out;
            width: 75px;
            height: 70px;
            position: relative;
            cursor: pointer;
        }
		
		.icon-container:hover {
    		border: 2px solid #16c784; /* Change border color on hover */
    		box-shadow: 0 0 10px #16c784; /* Add glow effect on hover */
		}

        .icon-container img {
            width: 24px;
            height: 24px;
        }

        .icon-container .count {
            margin-top: 0.25rem;
            font-size: 1rem;
            color: white;
        }

        .icon-container:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }

        .tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: #fff;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            opacity: 0;
            visibility: hidden;
            white-space: nowrap;
            transition: opacity 0.2s ease-in-out;
        }

        .glow-green {
            color: #16c784;
            text-shadow: 0 0 8px #16c784;
            font-weight: bold;
        }
    </style>
@endsection
