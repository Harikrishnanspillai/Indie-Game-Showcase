document.getElementById("suggestForm").addEventListener("submit", function (e) {
  e.preventDefault();

  

  // Immediately show success message
  document.getElementById("formMessage").textContent =
    "Thanks for your suggestion! We'll check it out.";

  // Reset the form
  form.reset();
});
