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

  let intervalId = setInterval(typeJs, 80); // Store the interval id






