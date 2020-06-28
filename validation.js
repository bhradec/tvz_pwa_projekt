function isNotEmpty(inputId, errorPlaceId, type = "text") {
    let input = document.getElementById(inputId);
    let inputText = input.value;
    let errorPlace = document.getElementById(errorPlaceId);

    if (inputText.length == 0) {
        input.style.border = "1px dashed red";
        
        if (type == "username") {
            errorPlace.innerHTML = "Korisničko ime mora biti uneseno";
        } else if (type == "password") {
            errorPlace.innerHTML = "Zaporka mora biti unesena";
        } else if (type == "name") {
            errorPlace.innerHTML = "Ime  mora biti uneseno";
        } else if (type == "lastname") {
            errorPlace.innerHTML = "Prezime mora biti uneseno";
        } else {
            errorPlace.innerHTML = "Tekst mora biti unesen";
        }
        
        return false;
    } else {
        input.style.border = "";
        errorPlace.innerHTML = "";
        return true;
    }
}

function isTextBetween(inputId, errorPlaceId, lowerLimit, upperLimit) {
    let input = document.getElementById(inputId);
    let inputText = input.value;
    let errorPlace = document.getElementById(errorPlaceId);

    if (inputText.length < lowerLimit || inputText.length > upperLimit) {
        input.style.border = "1px dashed red";
        errorPlace.innerHTML = "Upisani tekst mora biti između " + 
            lowerLimit + " i " + upperLimit + " znakova";
        return false;
    } else {
        // Reset stila obruba na onaj zadan css-om
        input.style.border = "";
        // Pražnjenje mjesta za ispis errora
        errorPlace.innerHTML = "";
        return true;
    }
}

function isFileSelected(inputId, errorPlaceId) {
    let input = document.getElementById(inputId);
    let inputFile = input.value;
    let errorPlace = document.getElementById(errorPlaceId);

    if (inputFile.length == 0) {
        input.style.border = "1px dashed red";
        errorPlace.innerHTML = "Slika za članak mora biti odabrana!";
        return false;
    } else {
        input.style.border = "";
        errorPlace.innerHTML = "";
        return true;
    }
}

function comparePasswords(passInputId, pass2InputId, pass2ErrorPlaceId) {
    let password = document.getElementById(passInputId).value;
    let pass2input = document.getElementById(pass2InputId);
    let repeatedPassword = pass2input.value;
    let errorPlace = document.getElementById(pass2ErrorPlaceId);

    if (password != repeatedPassword) {
        errorPlace.innerHTML = "Upisana zaporka i ponovljena zaporka moraju nisu iste!";
        pass2input.style.border = "1px dashed red";
        return false;
    } else {
        errorPlace.innerHTML = "";
        pass2input.style.border = "";
        return true;
    }
}

function validateUnos(event) {
    var slanjeForme = true;

    if (isTextBetween("naslov", "naslovError", 5, 30) == false) {
        slanjeForme = false;
    }

    if (isTextBetween("sazetak", "sazetakError", 10, 100) == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("tekst", "tekstError") == false) {
        slanjeForme = false;
    }

    if (isFileSelected("slika", "slikaError") == false) {
        slanjeForme = false;
    }

    if (slanjeForme == false) { 
        event.preventDefault(); 
    }
}

function validateIzmjena(event) {
    var slanjeForme = true;

    if (isTextBetween("noviNaslov", "noviNaslovError", 5, 30) == false) {
        slanjeForme = false;
    }

    if (isTextBetween("noviSazetak", "noviSazetakError", 10, 100) == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("noviTekst", "noviTekstError") == false) {
        slanjeForme = false;
    }

    if (slanjeForme == false) { 
        event.preventDefault(); 
    }
}

function validatePrijava(event) {
    if (isNotEmpty("korisnickoIme", "korisnickoImeError", "username") == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("zaporka", "zaporkaError", "password") == false) {
        slanjeForme = false;
    }

    if (slanjeForme == false) { 
        event.preventDefault(); 
    }
}

function validateRegistracija(event) {
    var slanjeForme = true;

    if (isTextBetween("ime", "imeError", 1, 255) == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("ime", "imeError", "name") == false) {
        slanjeForme = false;
    }

    if (isTextBetween("prezime", "prezimeError", 1, 255) == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("prezime", "prezimeError", "lastname") == false) {
        slanjeForme = false;
    }

    if (isTextBetween("korisnickoIme", "korisnickoImeError", 1, 32) == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("korisnickoIme", "korisnickoImeError", "username") == false) {
        slanjeForme = false;
    }

    // Jesu li zaporka i ponovljena zaporka jednake?
    if (comparePasswords("zaporka", "ponovljenaZaporka", "ponovljenaZaporkaError") == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("ponovljenaZaporka", "ponovljenaZaporkaError", "password") == false) {
        slanjeForme = false;
    }

    if (isNotEmpty("zaporka", "zaporkaError", "password") == false) {
        slanjeForme = false;
    }

    if (slanjeForme == false) { 
        event.preventDefault(); 
    }
}
