// Get all of the necessary elements
const input = document.querySelector(".pwd input");
const eye = document.querySelector(".pwd .fa-eye-slash");

// Add a click event to the eye icon
eye.addEventListener("click", () => {
    // If the password is hidden...
    if(input.type === "password") {
        // Show it
        input.type = "text";
        // Toggle between eye icons
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    } else {
        // Hide it
        input.type = "password";
        // Toggle between eye icons
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    }
});