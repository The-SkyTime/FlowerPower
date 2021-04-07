var klant = document.getElementById('showKlant').onclick = function() {
    if(this.checked) {
        var alles = document.getElementsByClassName('klant');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: visible;";
        }
    } else {
        var alles = document.getElementsByClassName('klant');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: hidden;";
            alles[i].style= "display: none;";
        }
    }
}

var medewerker = document.getElementById('showMedewerker').onclick = function() {
    if(this.checked) {
        var alles = document.getElementsByClassName('medewerker');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: visible;";
        }
    } else {
        var alles = document.getElementsByClassName('medewerker');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: hidden;";
            alles[i].style= "display: none;";
        }
    }
}
