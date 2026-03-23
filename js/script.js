document.getElementById("admissionForm").addEventListener("submit", function (e) {

  let name = document.getElementById("name").value.trim();
  let mobile = document.getElementById("mobile").value.trim();
  let documentFile = document.getElementById("document").value;

  // Name validation (only letters & spaces)
  let namePattern = /^[A-Za-z\s]+$/;
  if (!namePattern.test(name)) {
    alert("Name should contain only alphabets");
    e.preventDefault();
    return;
  }

  // Mobile validation (exactly 10 digits)
  let mobilePattern = /^[0-9]{10}$/;
  if (!mobilePattern.test(mobile)) {
    alert("Mobile number must be exactly 10 digits");
    e.preventDefault();
    return;
  }

  // Document validation (PDF only)
  if (!documentFile.toLowerCase().endsWith(".pdf")) {
    alert("Only PDF documents are allowed");
    e.preventDefault();
    return;
  }

});

/* =====================
   STUDENT LOGIN VALIDATION
===================== */

let loginForm = document.getElementById("loginForm");

if (loginForm) {

  loginForm.addEventListener("submit", function (e) {

    let email = document.getElementById("loginEmail").value.trim();
    let password = document.getElementById("loginPassword").value.trim();

    let errorMsg = "";

    // EMAIL VALIDATION
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errorMsg = "Enter valid email address";
    }

    // PASSWORD VALIDATION
    else if (password.length < 4) {
      errorMsg = "Password must be at least 4 characters";
    }

    if (errorMsg !== "") {
      e.preventDefault();

      let msgBox = document.getElementById("loginMessage");
      msgBox.innerHTML = errorMsg;
      msgBox.className = "error";
      msgBox.style.display = "block";

      window.scrollTo({ top: 0, behavior: "smooth" });
    }

  });

}

/* =====================
   CONTACT FORM VALIDATION
===================== */

let contactForm = document.getElementById("contactForm");

if (contactForm) {

  contactForm.addEventListener("submit", function (e) {

    let name = document.getElementById("cname").value.trim();
    let email = document.getElementById("cemail").value.trim();
    let mobile = document.getElementById("cmobile").value.trim();
    let message = document.getElementById("cmessage").value.trim();

    let errorMsg = "";

    // NAME
    if (!/^[A-Za-z\s]+$/.test(name)) {
      errorMsg = "Name should contain only alphabets";
    }

    // EMAIL
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errorMsg = "Enter valid email";
    }

    // MOBILE
    else if (!/^[0-9]{10}$/.test(mobile)) {
      errorMsg = "Mobile must be 10 digits";
    }

    // MESSAGE
    else if (message.length < 5) {
      errorMsg = "Message must be at least 5 characters";
    }

    if (errorMsg !== "") {
      e.preventDefault();

      let msgBox = document.getElementById("contactMessage");
      msgBox.innerHTML = errorMsg;
      msgBox.className = "error";
      msgBox.style.display = "block";

      window.scrollTo({ top: 0, behavior: "smooth" });
    }

  });

}