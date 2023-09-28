function validateFile() {
    var csvInputFile = document.forms["frmCSVImport"]["file"].value;
    if (csvInputFile === "") {
        error = "No source found to import. Please select a CSV file. ";
        $("#response").html(error).addClass("error");
        return false;
    }
    return true;
}