function treatmentType() {
    var select = document.getElementById('form-field-select-1');

    if(select.value == 0) {
        document.getElementById("divLegalEntity").hidden = true;
        document.getElementById("divNaturalPerson").hidden = true;
    }
    else if(select.value == 1) {
        document.getElementById("divLegalEntity").hidden = false;
        document.getElementById("divNaturalPerson").hidden = true;
    }
    else {
        document.getElementById("divLegalEntity").hidden = true;
        document.getElementById("divNaturalPerson").hidden = false;
    }
}