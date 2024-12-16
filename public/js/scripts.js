// Function to handle vote loading from localStorage
function loadVotes() {
    projects.forEach(project => {
        const voteCount = localStorage.getItem('voteCount' + project.id);
        if (voteCount) {
            document.getElementById('voteCount' + project.id).innerText = voteCount;
        }
    });
}

// Event listener to load votes when DOM is fully loaded
document.addEventListener('DOMContentLoaded', loadVotes);

// Search Tokens functionality
document.getElementById('search-tokens').addEventListener('input', function() {
    let query = this.value;
    if (query.length > 0) {
        fetch(`/search-tokens?query=${query}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('projects-table').innerHTML = html;
            });
    } else {
        location.reload();
    }
});

// Vote button functionality
document.addEventListener('DOMContentLoaded', function() {
    const voteButtons = document.querySelectorAll('.vote-button');

    voteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectId = this.getAttribute('data-project-id');
            const voteCountElement = document.getElementById(`voteCount${projectId}`);
            
            fetch(`/projects/${projectId}/boost`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ project_id: projectId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    voteCountElement.textContent = data.boosts;
                } else if (data.message) {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Promoted Tokens cycling functionality
    const promotedTokensList = document.getElementById('promotedTokensList');
    let currentIndex = 0;

    function cyclePromotedTokens() {
        const promotedTokens = promotedTokensList.querySelectorAll('li');
        if (promotedTokens.length > 5) {
            promotedTokens.forEach((token, index) => {
                token.style.display = (index >= currentIndex && index < currentIndex + 5) ? 'flex' : 'none';
            });
            currentIndex = (currentIndex + 1) % (promotedTokens.length - 4);
        }
    }

    setInterval(cyclePromotedTokens, 3000);
    cyclePromotedTokens(); // Initially show the first set
});

// Long Banner Ads functionality
const bannerImages = [
    ['/images/banner/Token-Banner-Advert-1.jpg', '/images/banner/Token-Banner-Advert-2.jpg', '/images/banner/Token-Banner-Advert-3.jpg', '/images/banner/Token-Banner-Advert-4.jpg', '/images/banner/Token-Banner-Advert-5.jpg', '/images/banner/Token-Banner-Advert-6.jpg'],
    ['/images/banner/Token-Banner-Advert-7.jpg', '/images/banner/Token-Banner-Advert-8.jpg', '/images/banner/Token-Banner-Advert-9.jpg', '/images/banner/Token-Banner-Advert-10.jpg', '/images/banner/Token-Banner-Advert-11.jpg', '/images/banner/Token-Banner-Advert-12.jpg'],
    ['/images/banner/Token-Banner-Advert-13.jpg', '/images/banner/Token-Banner-Advert-14.jpg', '/images/banner/Token-Banner-Advert-15.jpg', '/images/banner/Token-Banner-Advert-16.jpg', '/images/banner/Token-Banner-Advert-17.jpg', '/images/banner/Token-Banner-Advert-18.jpg', '/images/banner/Token-Banner-Advert-19.jpg', '/images/banner/Token-Banner-Advert-20.jpg', '/images/banner/Token-Banner-Advert-21.jpg', '/images/banner/Token-Banner-Advert-22.jpg']
];

const bannerLinks = [
    ['https://dex-tokens.io/ico/muttley-mutt', 'https://dex-tokens.io/advertisement', 'https://dex-tokens.io/ico/meme-street-bets', 'https://dex-tokens.io/ico/froppies', 'https://dex-tokens.io/advertisement', 'https://dex-tokens.io/ico/landwolf'],
    ['https://dex-tokens.io/ico/peipei', 'https://dex-tokens.io/advertisement', 'https://dex-tokens.io/ico/peipei', 'https://dex-tokens.io/advertisement', 'https://dex-tokens.io/advertisement', 'https://dex-tokens.io/ico/mumu-the-bull'],
    ['https://dex-tokens.io/ico/trett', 'https://dex-tokens.io/ico/cat-in-dogs-world', 'https://dex-tokens.io/ico/maneki', 'https://dex-tokens.io/ico/landwolf', 'https://www.dex-tokens.io/ico/mummat', 'https://dex-tokens.io/ico/jail-cat', 'https://dex-tokens.io/ico/landlord-ronald', 'https://www.dex-tokens.io/ico/peipei', 'https://dex-tokens.io/advertisement', 'https://www.dex-tokens.io/ico/ethereum-is-good']
];

function loadBanners() {
    const banners = document.querySelectorAll('.banner-img');
    banners.forEach((banner, index) => {
        const imgSet = bannerImages[index];
        const linkSet = bannerLinks[index];
        let currentImgIndex = 0;
        setInterval(() => {
            banner.src = imgSet[currentImgIndex];
            banner.parentElement.href = linkSet[currentImgIndex];
            currentImgIndex = (currentImgIndex + 1) % imgSet.length;
        }, 3000);
    });
}

document.addEventListener('DOMContentLoaded', loadBanners);

// Long banner ad rotation
const longBannerImages = [
    { src: '/images/banner/long-banner.png', link: 'https://www.dex-tokens.io/ico/minky' },
    { src: '/images/banner/long-banner2.jpg', link: 'https://www.dex-tokens.io/advertisement' },
    { src: '/images/banner/long-banner3.jpg', link: 'https://www.dex-tokens.io/ico/landwolf' },
    { src: '/images/banner/long-banner4.jpg', link: 'https://www.dex-tokens.io/advertisement' },
    { src: '/images/banner/long-banner5.png', link: 'https://www.dex-tokens.io/ethereum-is-good' },
    { src: '/images/banner/long-banner6.png', link: 'https://sunpump.meme/' },
    { src: '/images/banner/long-banner7.png', link: 'https://www.dex-tokens.io/ico/meme-street-bets' }
];
let currentLongBannerIndex = 0;

function changeLongBanner() {
    const longBanner = document.querySelector('.long-banner-img');
    const longBannerLink = document.getElementById('long-banner-link');
    longBanner.src = longBannerImages[currentLongBannerIndex].src;
    longBannerLink.href = longBannerImages[currentLongBannerIndex].link;
    currentLongBannerIndex = (currentLongBannerIndex + 1) % longBannerImages.length;
}

setInterval(changeLongBanner, 3000);
