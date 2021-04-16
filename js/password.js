// Laat het wachtwoord zien als je op de knop drukt
document.getElementById('showPassword').onclick = function() {
    if(this.checked) {
        document.getElementById('password').type= "text";
    } else {
        document.getElementById('password').type= "password";
    }
}