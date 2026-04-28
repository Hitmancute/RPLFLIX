function togglePassword(e) {
    const passinput = document.getElementById("password");
    const togglebtn = e.target;

    if (passinput.type === "password") {
        passinput.type = "text";
        togglebtn.textContent = "🐵";
    } else {
        passinput.type = "password";
        togglebtn.textContent = "🙈";
    }
}
