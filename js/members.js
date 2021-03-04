document.getElementById('showKlant').onclick = function() {
    if(this.checked) {
        document.getElementById('klant').style= "visibility: visible;";
    } else {
        document.getElementById('klant').style= "visibility: hidden;";
        document.getElementById('klant').style= "display: none;";
    }
}

document.getElementById('showMedewerker').onclick = function() {
    if(this.checked) {
        document.getElementById('medewerker').style= "visibility: visible;";
    } else {
        document.getElementById('medewerker').style= "visibility: hidden;";
        document.getElementById('medewerker').style= "display: none;";
    }
}
