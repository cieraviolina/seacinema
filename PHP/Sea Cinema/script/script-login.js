// Dapatkan elemen-elemen yang dibutuhkan
const registrationForm = document.getElementById("registration-form");
const loginForm = document.getElementById("login-form");
const loginLink = document.getElementById("login-link");
const registerLink = document.getElementById("register-link");

// Tambahkan event listener untuk tautan "Login di sini"
loginLink.addEventListener("click", function(event) {
  event.preventDefault();
  registrationForm.style.display = "none";
  loginForm.style.display = "block";
});

// Tambahkan event listener untuk tautan "Daftar di sini"
registerLink.addEventListener("click", function(event) {
  event.preventDefault();
  registrationForm.style.display = "block";
  loginForm.style.display = "none";
});