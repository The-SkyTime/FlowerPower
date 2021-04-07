var bloem = document.getElementById('showBloemen').onclick = function() {
    if(this.checked) {
        var alles = document.getElementsByClassName('bloem');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: visible;";
        }
    } else {
        var alles = document.getElementsByClassName('bloem');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: hidden;";
            alles[i].style= "display: none;";
        }
    }
}

var boeket = document.getElementById('showBoeketen').onclick = function() {
    if(this.checked) {
        var alles = document.getElementsByClassName('boeket');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: visible;";
        }
    } else {
        var alles = document.getElementsByClassName('boeket');
        for (i = 0; i < alles.length; i++) {
            alles[i].style= "visibility: hidden;";
            alles[i].style= "display: none;";
        }
    }
}

