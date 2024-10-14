$('#detallelog').val('');

function sendTicket() {
    var hagosubtmit = 'S';

    var v_hhhh = $("#hhhh").val();


    var regexNum = /^[0-9]*$/;
    var regexAlfaNumSimbB = /^[a-zA-Z0-9#()&_\-\[\]\\,\.\/\n? ]*$/;
    //var regexAlfaNumSimbB = /^[^<>=\'%$\"]*$/;

    if ($('#idpp').val().match(regexNum)) {
        var v_idpp = $('#idpp').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"]("Error ProjectID", "");
    }
    if ($('#detallelog').val() == '') {
        hagosubtmit = 'N';
        toastr["error"]("Please complete description", "");
    }
    if ($('#detallelog').val().match(regexAlfaNumSimbB)) {
        var v_detallelog = $('#detallelog').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"]("Description is invalid", "");
    }

    if (hagosubtmit == 'S') {
        $("#abc").prop('disabled', true);
        //enviamos para crear presup
        return new Promise(function(resolve, reject) {
                var formData = new FormData();
                var req = new XMLHttpRequest();


                //consulta si devolvio el Scan Device
                formData.append("v_detallelog", v_detallelog);
                formData.append("v_idpp", v_idpp);
                formData.append("v_hhhh", v_hhhh);

                req.open("POST", "ajax_sendtksupportmm.php");
                toastr["info"]("Sending information", "");
                req.send(formData);

                req.onload = function() {
                    if (req.status == 200) {
                        //console.log(req.response)
                        $('#detallelog').val('');
                        var datos = JSON.parse(req.response);
                        //console.log (datos.resultiu);
                        /// resolve(JSON.parse(req.response));
                        if (datos.resultiu == 'ok') {
                            toastr["success"]("support ticket created", "");

                            ///    window.location = 'listprojects.php';	
                        } else {
                            toastr["error"]("Error,error generating support ticket", "");
                        }


                    } else {
                        reject();
                    }
                };


            })
            ///fin enviamos crear presup
    } else {
        toastr["error"]("Error,incomplete information", "");
    }

}