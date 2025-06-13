document.getElementById("suggestForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("https://ctrl-alt-play.42web.io/submit_suggestion.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    if (data === "Success") {
      document.getElementById("formMessage").textContent =
        "Thanks for your suggestion! We'll check it out.";
      this.reset();
    } else {
      alert("Failed to submit suggestion: " + data);
    }
  });
});