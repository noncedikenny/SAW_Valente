// Initialize the slide index
let slideIndex = 0;
// Call the function to show slides
showDivs();

// Function to change the slide index by a specific number
function plusDivs(n) {
    slideIndex += n;
    showDivs();
}

// Function to show the current slide based on the slide index
function showDivs() {
    // Select all elements with the class "mySlides"
    let $slides = $(".mySlides");
    
    // Reset the slide index if it exceeds the number of slides
    if (slideIndex >= $slides.length) {
        slideIndex = 0;
    }
    
    // Set the slide index to the last slide if it goes below 0
    if (slideIndex < 0) {
        slideIndex = $slides.length - 1;
    }
    
    $slides.hide();
    $slides.eq(slideIndex).show();
}

// Add a timer to automatically move to the next photo every 10 seconds
setInterval(function() {
    plusDivs(1);
}, 10000);
