// Obtain email from query parameters
const urlParams = new URLSearchParams(window.location.search);
const email = urlParams.get('username');

// Wait for DOM to load
document.addEventListener("DOMContentLoaded", () => {
  // Replace value and placeholder with query parameter
  const input = document.getElementById('username');
  input.placeholder = email;
  input.value = email;
});