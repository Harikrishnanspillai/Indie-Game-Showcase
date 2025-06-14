document.getElementById("suggestForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);

  fetch("https://ctrl-alt-play.42web.io/submit_suggestion.php", {
    method: "POST",
    body: formData
  }).catch(err => {
    console.error("Suggestion submission error:", err);
  });

  // Immediately show success message
  document.getElementById("formMessage").textContent =
    "Thanks for your suggestion! We'll check it out.";

  // Reset the form
  form.reset();
});
