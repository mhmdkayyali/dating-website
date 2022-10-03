const signup = document.getElementById("signup");
const exit_btn = document.getElementById("x-btn");
const popup = document.getElementById("popup")

const login_signup_toggle = () => {
    popup.classList.toggle("hide")
}

signup.addEventListener("click", login_signup_toggle);
exit_btn.addEventListener("click", login_signup_toggle);
