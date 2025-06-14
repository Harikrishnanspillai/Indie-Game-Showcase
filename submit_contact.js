document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const form = this;


  // Immediately show success message
  document.getElementById("formMessage").textContent =
    "Thanks for your feedback! We'll reach back to you soon.";

  // Reset the form
  form.reset();
});
