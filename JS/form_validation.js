// Form validation
let form = document.querySelector("form");
let emailInput = document.getElementById('emailInput');
let passwordInput = document.getElementById('passwordInput');
let error1 = document.querySelector('.error1');
let error2 = document.querySelector('.error2');
let error3 = document.querySelector('.error3');

// Hide all errors initially
error1.style.display = "none";
error2.style.display = "none";
error3.style.display = "none";

form.addEventListener('submit', function (e) {
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
    let validEmail = /\b[A-Za-z0-9._-]+@(gmail|yahoo)\.com$/;
    let validPassword = /^.{8,}$/;  // ✅ At least 8 characters

    // Reset errors
    error1.style.display = "none";
    error2.style.display = "none";
    error3.style.display = "none";

    let hasError = false;

    if (!email.match(validEmail) && !password.match(validPassword)) {
        error3.style.display = "block";
        hasError = true;
    } else if (!password.match(validPassword)) {
        error2.style.display = "block";
        hasError = true;
    } else if (!email.match(validEmail)) {
        error1.style.display = "block";
        hasError = true;
    }

    if (hasError) {
        e.preventDefault(); // block submission
    }
});
