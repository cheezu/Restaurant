function passValidate() {
    var pass1 = document.getElementById("pwd").value;
    var pass2 = document.getElementById("pwd2").value;
    var ok = true;
    if (pass1 != pass2) {
        ok = false;
        document.getElementById("pwd").style.borderColor = "#E34234";
        document.getElementById("pwd2").style.borderColor = "#E34234";
    }
    else {
      document.getElementById("pwd").style.borderColor = "#ccc";
      document.getElementById("pwd2").style.borderColor = "#ccc";
      ok = true;
    }
    return ok;
}
