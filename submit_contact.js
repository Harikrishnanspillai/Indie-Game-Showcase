document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();
  
  const formData = new FormData(this);

  fetch("https://ctrl-alt-play.42web.io/submit_contact.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    if (data === "Success") {
      document.getElementById("formMessage").textContent =
        "Thanks for reaching out! We'll get back to you soon.";
      this.reset();
    } else {
      alert("Failed to send message: " + data);
    }
  });
});