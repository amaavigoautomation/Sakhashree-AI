// type js plugin
let typeJsText = document.querySelector(".footertagline");
let textArray = typeJsText.dataset.typetext.split("");
let counter = -1;

typeJsText.innerHTML = "";

function typeJs() {
    if (counter < typeJsText.dataset.typetext.length) {
      typeJsText.innerHTML += typeJsText.dataset.typetext.charAt(counter);
      counter++;
    } else {
      clearInterval(intervalId); // Stop the typing effect
    }
  }

  // let intervalId = setInterval(typeJs, 80); // Store the interval id

 function startTypingAnimation() {
  intervalId = setInterval(typeJs, 80);
}

// Callback function to handle intersection observer changes
function handleIntersect(entries) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Start typing animation when footer enters viewport
      startTypingAnimation();
    } else {
      // Stop typing animation when footer exits viewport
      clearInterval(intervalId);
    }
  });
}

// Options for the intersection observer
const options = {
  root: null,
  rootMargin: '0px',
  threshold: 0.5 // Trigger when 50% of the footer is visible
};

// Create a new intersection observer
const observer = new IntersectionObserver(handleIntersect, options);

// Observe the footer element
const footer = document.querySelector('.footer');
if (footer) {
  observer.observe(footer);
}