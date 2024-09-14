const filter_btns = document.querySelectorAll(".filter-btn"); // Select all elements with the class "filter-btn" and store them in the filter_btns variable
const skills_wrap = document.querySelector(".skills"); // Select the element with the class "skills" and store it in the skills_wrap variable
const skills_bars = document.querySelectorAll(".skill-progress"); // Select all elements with the class "skill-progress" and store them in the skills_bars variable
const records_wrap = document.querySelector(".records"); // Select the element with the class "records" and store it in the records_wrap variable
const records_numbers = document.querySelectorAll(".number"); // Select all elements with the class "number" and store them in the records_numbers variable
const footer_input = document.querySelector(".footer-input"); // Select the element with the class "footer-input" and store it in the footer_input variable
const hamburger_menu = document.querySelector(".hamburger-menu"); // Select the element with the class "hamburger-menu" and store it in the hamburger_menu variable
const navbar = document.querySelector("header nav"); // Select the <nav> element within the <header> and store it in the navbar variable
const links = document.querySelectorAll(".links a");// Select all <a> elements within elements with the class "links" and store them in the links variable


// Add an event listener to the footer_input element for when it gains focus
footer_input.addEventListener("focus", () => {
  footer_input.classList.add("focus"); // When the input gains focus, add the "focus" class to it for styling
});

// Add an event listener to the footer_input element for when it loses focus
footer_input.addEventListener("blur", () => {
  // Check if the input value is not empty
  if (footer_input.value != "") return;
  footer_input.classList.remove("focus"); // If the input is empty, remove the "focus" class to reset styling
});

// Function to close the navigation menu
function closeMenu() {
  navbar.classList.remove("open"); // Remove the "open" class from the navbar to hide the menu
  document.body.classList.remove("stop-scrolling"); // Remove the "stop-scrolling" class from the body to enable scrolling again
}

// Add an event listener to the hamburger_menu element for a click event
hamburger_menu.addEventListener("click", () => {
  // Check if the navbar does not have the "open" class
  if (!navbar.classList.contains("open")) {
    navbar.classList.add("open"); // If the menu is not open, add the "open" class to the navbar to show the menu
    document.body.classList.add("stop-scrolling"); // Add the "stop-scrolling" class to the body to prevent scrolling when the menu is open
  } else {
    closeMenu(); // If the menu is already open, call the closeMenu function to close it
  }
});

// Add click event listeners to all elements in the "links" array
links.forEach((link) => link.addEventListener("click", () => closeMenu()));

// Iterate through all elements in the "filter_btns" array
filter_btns.forEach((btn) =>
  // Add a click event listener to each button
  btn.addEventListener("click", () => {
    filter_btns.forEach((button) => button.classList.remove("active"));// Remove the "active" class from all buttons to reset their styling
    btn.classList.add("active"); // Add the "active" class to the clicked button to highlight it
    let filterValue = btn.dataset.filter; // Get the filter value associated with the clicked button
    $(".grid").isotope({ filter: filterValue }); // Use the Isotope library to filter elements in the ".grid" container based on the filter value
  })
);

// Initialize the Isotope library for the ".grid" container
$(".grid").isotope({
  itemSelector: ".grid-item", // Define the elements to be selected within the container
  layoutMode: "fitRows", // Set the layout mode to "fitRows" for fitting items in rows
  transitionDuration: "0.6s", // Specify the transition duration for animations
});

// Add a scroll event listener to the window
window.addEventListener("scroll", () => {
  skillsEffect(); // When the user scrolls, call the skillsEffect function to handle skills animation
  countUp(); // Also, call the countUp function to handle counting up numbers
});

// Function to check if an element is in the viewport
function checkScroll(el) {
  let rect = el.getBoundingClientRect(); // Get the bounding rectangle of the element
  if (window.innerHeight >= rect.top + el.offsetHeight) 
  return true; // If true, the element is in the viewport
  return false; // If false, the element is not in the viewport
}

// Function to animate skills bars when they are in the viewport
function skillsEffect() {
  if (!checkScroll(skills_wrap)) return; // Check if the skills_wrap element is not in the viewport
  // If the skills_wrap is in the viewport, iterate through each skills bar
  skills_bars.forEach((skill) => (skill.style.width = skill.dataset.progress)); // Set the width of each skills bar to the specified progress value
}

// Function to count up numbers when they are in the viewport
function countUp() {
  if (!checkScroll(records_wrap)) return; // Check if the records_wrap element is not in the viewport
  // If the records_wrap is in the viewport, iterate through each number element
  records_numbers.forEach((numb) => {
    const updateCount = () => {
      let currentNum = +numb.innerText; // Get the current number displayed in the element
      let maxNum = +numb.dataset.num; // Get the maximum number to count up to from the dataset
      let speed = 100; // Set the counting speed
      const increment = Math.ceil(maxNum / speed); // Calculate the increment for each step of the count

      // Check if the current number is less than the maximum number
      if (currentNum < maxNum) {
        numb.innerText = currentNum + increment; // Increment the number and update the element's content
        setTimeout(updateCount, 1); // Schedule the next update with a short delay for animation
      } else {
        numb.innerText = maxNum; // Once the counting is complete, set the number to the maximum value
      }
    };
    
    // Start the count-up animation with a delay of 400ms
    setTimeout(updateCount, 400);
  });
}

// Initialize a Swiper slider with specified configuration options
var mySwiper = new Swiper(".swiper-container", {
  speed: 1100, // Set the transition speed to 1100 milliseconds (1.1 seconds)
  slidesPerView: 1, // Display one slide at a time
  loop: true,  // Enable loop mode to create a continuous slide loop
  // Configure autoplay with a 5-second delay between slides
  autoplay: {
    delay: 5000,
  },
  // Enable navigation buttons to navigate to previous and next slides
  navigation: {
    prevEl: ".swiper-button-prev",
    nextEl: ".swiper-button-next",
  },
});





// JavaScript for form validation
document.getElementById("first-name").addEventListener("blur", function(event) {
  let firstName = this.value;
  
  // First name validation (only letters and length)
  const nameRegex = /^[A-Za-z\s]{2,}$/;
  if (!nameRegex.test(firstName)) {
    this.setCustomValidity("Please enter a valid First Name (at least 2 letters, no special characters).");
    this.classList.add("invalid"); // Add the invalid style
  } else {
    this.setCustomValidity(""); // Remove the custom validation message
    this.classList.remove("invalid"); // Remove the invalid style
  }
});

document.getElementById("last-name").addEventListener("blur", function(event) {
  let lastName = this.value;
  
  // Last name validation (only letters and length)
  const nameRegex = /^[A-Za-z\s]{2,}$/;
  if (!nameRegex.test(lastName)) {
    this.setCustomValidity("Please enter a valid Last Name (at least 2 letters, no special characters).");
    this.classList.add("invalid"); // Add the invalid style
  } else {
    this.setCustomValidity(""); // Remove the custom validation message
    this.classList.remove("invalid"); // Remove the invalid style
  }
});

document.getElementById("phone").addEventListener("blur", function(event) {
  let phone = this.value;
  
  // Phone number validation (simplified)
  const phoneRegex = /^\d{10}$/; // Assumes a 10-digit phone number
  if (!phoneRegex.test(phone)) {
    this.setCustomValidity("Please enter a valid 10-digit phone number.");
    this.classList.add("invalid"); // Add the invalid style
  } else {
    this.setCustomValidity(""); // Remove the custom validation message
    this.classList.remove("invalid"); // Remove the invalid style
  }
});

document.getElementById("email").addEventListener("blur", function(event) {
  let email = this.value;
  
  // Email validation using a regular expression
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!emailRegex.test(email)) {
    this.setCustomValidity("Please enter a valid email address.");
    this.classList.add("invalid"); // Add the invalid style
  } else {
    this.setCustomValidity(""); // Remove the custom validation message
    this.classList.remove("invalid"); // Remove the invalid style
  }
});