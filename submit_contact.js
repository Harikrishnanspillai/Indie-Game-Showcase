document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();
  
  const form = this;
  const formData = new FormData(form);

  fetch("https://ctrl-alt-play.42web.io/submit_contact.php", {
    method: "POST",
    body: formData
  }).catch(err => {
    // You can log the error for debugging, but don't show it to the user
    console.error("Submission error:", err);
  });

  // Show success message immediately
  document.getElementById("formMessage").textContent =
    "Thanks for reaching out! We'll get back to you soon.";

  // Optional: Reset the form
  form.reset();
});
