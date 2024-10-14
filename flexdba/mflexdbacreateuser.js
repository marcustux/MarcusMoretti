function validateEmail(email) {
    ///var emailRegformatoviejo = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var regexMail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
    return regexMail.test(email);
}

function controlar_email() {
    //console.log($("#txtemailtos").val());

    if ($("#txtemailtos").val() != '') {
        $.ajax({
            url: 'ajax_mirame.php',
            data: "ve=" + $("#txtemailtos").val(),
            type: 'post',
            datatype: 'JSON',
            async: false,
            success: function(data) {
                //console.log(data);
                //console.log(data.isfree);
                if (data.isfree == 1) {
                    toastr["error"](" E-mail already registered", "");
                    $("#txtemailtos").val('');

                }
            }
        });
    }


}



function createuser() {

    var v_hhhh = $("#hhhh").val();

    var lettersAndSpaces = /^[a-z][a-z\s]*$/i
    var lettersNoSpaces = /^[A-Za-z]+$/;

    var regexName = /^[a-z][a-z\s]*$/i;
    var regexPass = /^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$/;
    var regexCompany = /[a-zA-Z0-9-_.,& ]+$/;
    var regexESD = /[a-zA-Z_]+$/i;
    var regexHonNo = /[0-9]+$/;

    var hagosubtmit = 'S';
    var v_txtnameuserfull = $('#txtnameuserfull').val();
    if (v_txtnameuserfull == '' || !v_txtnameuserfull.toUpperCase().match(regexName)) {
        hagosubtmit = 'N';
        toastr["error"](" Valid full name is invalid - no special characters", "");
    }
    //
    var v_txtemailtos = $('#txtemailtos').val();
    if (v_txtemailtos == '') {
        hagosubtmit = 'N';
        toastr["error"](" E-mail is required", "");
    }

    if (!validateEmail(v_txtemailtos)) {
        hagosubtmit = 'N';
        toastr["error"](" Wrong e-mail format - Lowercase", "");
    }

    var v_txtlapwd1 = $('#txtlapwd1').val();
    if (v_txtlapwd1 == '' || !v_txtlapwd1.match(regexPass)) {
        hagosubtmit = 'N';
        toastr["error"](" Password invalid - At least one digit, at least one special character (#?!@$%^&*-), 8 in length", "");
    }

    //txthoneywellaccnumber
    var v_txthoneywellaccnumber = $('#txthoneywellaccnumber').val();
    if (v_txthoneywellaccnumber == '' || !v_txthoneywellaccnumber.match(regexHonNo)) {
        hagosubtmit = 'N';
        toastr["error"](" Honeywell account number is required, only numbers", "");
    }

    var v_txtcompname = $('#txtcompname').val();
    if (v_txtcompname == '' || !v_txtcompname.match(regexCompany)) {
        hagosubtmit = 'N';
        toastr["error"](" Company name is required - no special characters", "");
    }


    var v_txtedsdealer = $('#txtedsdealer').val();
    if (v_txtedsdealer == '') {
        hagosubtmit = 'N';
        toastr["error"](" ESD/Dealer Channel  is required", "");
    }

    var v_txtlapwd2 = $('#txtlapwd2').val();
    if (v_txtlapwd1 == v_txtlapwd2) {

        if ($('.micheckbox').prop('checked')) {

        } else {
            hagosubtmit = 'N';
            toastr["error"](" You must accept the terms and conditions", "");
        }

        if (grecaptcha.getResponse() == '') {
            hagosubtmit = 'N';
            toastr["error"]("It should indicate that it is not a robot", "");
        }

        if (hagosubtmit == 'S') {

            $("#abc").prop('disabled', true);


            var formData = new FormData();
            var req = new XMLHttpRequest();

            $("#txterror").html('');
            $("#diverror").hide();

            //consulta si devolvio el Scan Device
            //formData.append("v_txtnameuserfull", v_txtnomproj);


            formData.append("v_txtnameuserfull", v_txtnameuserfull);
            formData.append("v_txtemailtos", v_txtemailtos);
            formData.append("v_txtlapwd1", v_txtlapwd1);
            formData.append("v_txtlapwd2", v_txtlapwd2);
            formData.append("v_txtcompname", v_txtcompname);
            formData.append("v_txthoneywellaccnumber", v_txthoneywellaccnumber);
            formData.append("v_txtedsdealer", v_txtedsdealer);
            formData.append("v_hhhh", v_hhhh);


            formData.append("v_txttoken", grecaptcha.getResponse());

            req.open("POST", "ajax_createuser.php");
            toastr["info"]("Sending information", "");
            req.send(formData);

            req.onload = function() {
                if (req.status == 200) {
                    //console.log(req.response)

                    var datos = JSON.parse(req.response);
                    //console.log(datos.resultiu);
                    /// resolve(JSON.parse(req.response));
                    if (datos.resultiu == 'ok') {
                        $("#form-new-user")[0].reset();
                        toastr["success"]("Registered User", "");



                        ///   window.location = 'listprojects.php';	
                    } else {
                        toastr["error"]("User not registered", "");
                    }


                } else {
                    toastr["error"]("User not registered", "");
                }
            };
        }

    } else {
        toastr["error"](" Passwords must be the same", "");
    }





}