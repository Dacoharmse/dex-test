<!-- resources/views/components/banners.blade.php -->

<div class="flex justify-center space-x-6 py-2 ml-[5rem]">
    @for ($i = 1; $i <= 5; $i++) <!-- Always display 5 frames -->
        <div class="relative w-[330px] h-[133px] flex-shrink-0 shadow-lg bg-gray-800 rounded-md overflow-hidden banner-column" data-column="{{ $i }}">
            <a href="{{ $banners[$i-1]->link ?? '#' }}" target="_blank" class="banner-link">
                <img src="{{ Storage::url($banners[$i-1]->image ?? 'images/banner-placeholder.jpg') }}" alt="Banner {{ $i }}" class="w-full h-full object-contain banner-img opacity-0 transition-opacity duration-500">
            </a>
        </div>
    @endfor
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const banners = @json($banners); // Array of banner objects
    const columnElements = document.querySelectorAll('.banner-column');

    // Function to change the banner in a column
    function changeBanner(column, index) {
        const bannerImg = column.querySelector('.banner-img');
        const bannerLink = column.querySelector('.banner-link');

        bannerImg.classList.remove('opacity-100');
        bannerImg.classList.add('opacity-0');

        // Change the image and link after a short delay to ensure smooth transition
        setTimeout(() => {
            bannerImg.src = `/storage/${banners[index].image}`;
            bannerLink.href = banners[index].link || '#'; // Update link
            bannerImg.classList.remove('opacity-0');
            bannerImg.classList.add('opacity-100');
        }, 500); // Slight delay for fade effect
    }

    // Start independent cycling for each column
    columnElements.forEach((column, columnIndex) => {
        let bannerIndex = columnIndex % banners.length; // Ensure we loop through the banners

        setInterval(() => {
            bannerIndex = (bannerIndex + 1) % banners.length; // Loop through the banners
            changeBanner(column, bannerIndex);
        }, 3000); // Change every 3 seconds
    });
});
</script>

<style>
.banner-column {
    transition: all 0.5s ease-in-out;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    /* Add a soft shadow */
}

.banner-img {
    object-fit: contain;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.banner-img.opacity-100 {
    opacity: 1;
}

.banner-link:hover .banner-img {
    transform: scale(1.05);
    /* Slight zoom-in effect on hover */
}
</style>
