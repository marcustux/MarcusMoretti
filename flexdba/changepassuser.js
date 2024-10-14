function changepass() {
    var hagosubtmit = 'S';
    var regePassEx = '^[^\=\'{} \"<>\(\)]+$';
    //var regexlimite= '^.{8,32}$';
    var regexPass = '^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$';



    if (!$("#ccpass").val().match(regePassEx) || $("#ccpass").val().length < 8 || $("#ccpass").val().length > 32) {
        hagosubtmit = 'N';
        toastr["error"](" Current Password is wrong", "");
    }

    if (!$("#cc1pass").val().match(regexPass) || !$("#cc2pass").val().match(regexPass)) {
        hagosubtmit = 'N';
        toastr["error"]("Password invalid - At least one digit, at least one special character (#?!@$%^&*-), 8 in length", "");
    }

    var v_idcc = $("#ccpass").val();
    var v_idcc1 = $("#cc1pass").val();
    var v_idcc2 = $("#cc2pass").val();
    var v_iduu = $("#iduu").val();

    ;
    //   var v_idcc = $("#ccpass").val();
    //   var v_idcc1 =$("#cc1pass").val();
    //   var v_idcc2 = $("#cc2pass").val();

    //   var v_iduu = $("#iduu").val();

    // var hagosubtmit ='S';
    // if (v_idcc =='') { hagosubtmit = 'N';  toastr["error"](" Current Password is required", "");}
    // if (v_idcc1 =='') { hagosubtmit = 'N';  toastr["error"]("New Password is required", "");}
    // if (v_idcc2 =='') { hagosubtmit = 'N';  toastr["error"]("Verify Password is required", "");}


    if (hagosubtmit == 'S') {
        if (v_idcc1 == v_idcc2) {
            //enviamos para crear presup
            return new Promise(function(resolve, reject) {
                    var formData = new FormData();
                    var req = new XMLHttpRequest();


                    //consulta si devolvio el Scan Device
                    formData.append("v_iduu", v_iduu);
                    formData.append("v_idcc", v_idcc);
                    formData.append("v_idcc1", v_idcc1);
                    formData.append("v_idcc2", v_idcc2);


                    req.open("POST", "ajax_changepassuser.php");
                    toastr["info"]("Sending information", "");
                    req.send(formData);

                    req.onload = function() {
                        if (req.status == 200) {
                            //console.log(req.response)

                            var datos = JSON.parse(req.response);
                            console.log(datos.resultiu);
                            /// resolve(JSON.parse(req.response));
                            if (datos.resultiu == 'ok') {
                                toastr["success"]("Password changed", "");

                                window.location = 'homeflexbda.php';
                            } else {
                                toastr["error"]("Error, password not changed", "");
                            }


                        } else {
                            reject();
                        }
                    };


                })
                ///fin enviamos crear presup

        } else {
            toastr["error"]("passwords are not the same", "");
        }
    } else {
        toastr["error"]("Error,incomplete information", "");
    }

}