// import "./bootstrap";

import "flowbite/dist/flowbite";
import 'alpinejs';

// Sliding Ticker JS //

document.addEventListener("DOMContentLoaded", function () {
    const ticker = document.querySelector('.ticker');

    function addTickerItem(part1, part2) {
        const newItem = document.createElement('div');
        newItem.classList.add('ticker-item');

        const span1 = document.createElement('span');
        span1.classList.add('color1');
        span1.textContent = part1;

        const span2 = document.createElement('span');
        span2.classList.add('color2');
        span2.textContent = ' ' + part2;

        newItem.appendChild(span1);
        newItem.appendChild(span2);
        ticker.appendChild(newItem);
    }

    // Example of adding a new ticker item
    addTickerItem('Hottest Project', 'MEW');
});

// Banners cycling functionality
document.addEventListener("DOMContentLoaded", function () {
    const banners = JSON.parse(document.getElementById('bannersData').value); // Get the banners data passed from the controller
    const columnElements = document.querySelectorAll('.banner-column');

    // Function to change the banner in a column
    function changeBanner(column, index) {
        const bannerImg = column.querySelector('.banner-img');
        const bannerLink = column.querySelector('.banner-link');

        bannerImg.classList.remove('opacity-100');
        bannerImg.classList.add('opacity-0');

        setTimeout(() => {
            bannerImg.src = `/storage/${banners[index].image}`;
            bannerLink.href = banners[index].link || '#'; // Update the link
            bannerImg.classList.remove('opacity-0');
            bannerImg.classList.add('opacity-100');
        }, 500); // Transition delay
    }

    // Start the banner cycling for each column
    columnElements.forEach((column, columnIndex) => {
        let bannerIndex = columnIndex % banners.length; // Rotate through the available banners

        setInterval(() => {
            bannerIndex = (bannerIndex + 1) % banners.length; // Loop through banners
            changeBanner(column, bannerIndex);
        }, 3000); // Adjust timing here for how fast the banners should change
    });
});

// Highlighted Projects
document.addEventListener("DOMContentLoaded", function () {
    const projects = Array.from(document.querySelectorAll('.highlighted-item'));
    const container = document.querySelector('.highlighted-projects');
    const displayCount = 7;  // Number of tokens to display at a time
    let intervalId;
    let isPaused = false;

    // Function to display random tokens
    function displayRandomProjects() {
        if (isPaused) return;

        // Shuffle the projects array
        let shuffledProjects = projects.sort(() => Math.random() - 0.5);

        // Clear current display
        container.innerHTML = '';

        // Append only the first 'displayCount' items
        shuffledProjects.slice(0, displayCount).forEach(item => {
            container.appendChild(item.cloneNode(true));
        });
    }

    // Initial display
    displayRandomProjects();

    // Cycle every 3 seconds
    intervalId = setInterval(displayRandomProjects, 3000);  // Change every 3 seconds

    // Pause when hovering over a project
    container.addEventListener('mouseover', function () {
        isPaused = true;
        clearInterval(intervalId);  // Stop cycling
    });

    // Resume cycling when mouse leaves
    container.addEventListener('mouseleave', function () {
        isPaused = false;
        intervalId = setInterval(displayRandomProjects, 3000);  // Restart cycling
    });
});
