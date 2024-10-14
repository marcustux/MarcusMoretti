var tabla_channel_quantity = [];
var tabla_gain_dlul = [];

tabla_channel_quantity.length = 0;
tabla_gain_dlul.length = 0;


$(document).ready(function() {


    console.log('ready');

    $('#example1').DataTable({
        "order": [
            [0, "desc"]
        ],
        "paging": true,
        "pageLength": 20
    });






});




function activatemeail(nombobjtxt, refmm) {
    var formData = new FormData();
    var req = new XMLHttpRequest();
    var refvaccionmm = 'A';
    $("#txterror").html('');
    $("#diverror").hide();


    ///   console.log(nombobjtxt);
    //consulta si devolvio el Scan Device
    formData.append("vemail", nombobjtxt);
    formData.append("vref", refmm);
    formData.append("acc", refvaccionmm);


    req.open("POST", "ajax_createnotifications.php");
    toastr["info"]("Sending information", "");
    req.send(formData);

    req.onload = function() {
        if (req.status == 200) {
            //console.log(req.response)

            var datos = JSON.parse(req.response);
            console.log(datos.resultiu);
            /// resolve(JSON.parse(req.response));
            if (datos.resultiu == 'ok') {
                toastr["success"]("Registered OK", "");

                window.location = 'managerusers.php';
            } else {
                toastr["error"]("Error. not registered", "");
            }


        } else {
            toastr["error"]("User not registered", "");
        }
    };

}

function validateEmail($email) {
    ///var emailRegformatoviejo = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;


    var regexMail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i;
    //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
    return regexMail.test($email);
}

function Inactiveuser(refmmus) {
    var formData = new FormData();
    var req = new XMLHttpRequest();
    var refvaccionmm = 'N';
    $("#txterror").html('');
    $("#diverror").hide();


    ///   console.log(nombobjtxt);
    //consulta si devolvio el Scan Device
    formData.append("vusu", refmmus);
    formData.append("vparam", refvaccionmm);


    req.open("POST", "ajax_updauser.php");
    toastr["info"]("Sending information", "");
    req.send(formData);

    req.onload = function() {
        if (req.status == 200) {
            //console.log(req.response)

            var datos = JSON.parse(req.response);
            console.log(datos.resultiu);
            /// resolve(JSON.parse(req.response));
            if (datos.resultiu == 'ok') {
                toastr["success"]("Updated ", "");

                window.location = 'managerusers.php';
            } else {
                toastr["error"]("Error. not registered", "");
            }


        } else {
            toastr["error"]("Error AJAX COM", "");
        }
    };


}

function activeuser(refmmus) {
    var formData = new FormData();
    var req = new XMLHttpRequest();
    var refvaccionmm = 'Y';
    $("#txterror").html('');
    $("#diverror").hide();


    ///   console.log(nombobjtxt);
    //consulta si devolvio el Scan Device
    formData.append("vusu", refmmus);
    formData.append("vparam", refvaccionmm);


    req.open("POST", "ajax_updauser.php");
    toastr["info"]("Sending information", "");
    req.send(formData);

    req.onload = function() {
        if (req.status == 200) {
            //console.log(req.response)

            var datos = JSON.parse(req.response);
            console.log(datos.resultiu);
            /// resolve(JSON.parse(req.response));
            if (datos.resultiu == 'ok') {
                toastr["success"]("Updated ", "");

                window.location = 'managerusers.php';
            } else {
                toastr["error"]("Error. not registered", "");
            }


        } else {
            toastr["error"]("Error AJAX COM", "");
        }
    };


}

function inacitvemail(nombobjtxt, refmm) {
    var formData = new FormData();
    var req = new XMLHttpRequest();
    var refvaccionmm = 'U';
    $("#txterror").html('');
    $("#diverror").hide();


    ///   console.log(nombobjtxt);
    //consulta si devolvio el Scan Device
    formData.append("vemail", nombobjtxt);
    formData.append("vref", refmm);
    formData.append("acc", refvaccionmm);


    req.open("POST", "ajax_createnotifications.php");
    toastr["info"]("Sending information", "");
    req.send(formData);

    req.onload = function() {
        if (req.status == 200) {
            //console.log(req.response)

            var datos = JSON.parse(req.response);
            console.log(datos.resultiu);
            /// resolve(JSON.parse(req.response));
            if (datos.resultiu == 'ok') {
                toastr["success"]("Updated ", "");

                window.location = 'managerusers.php';
            } else {
                toastr["error"]("Error. not registered", "");
            }


        } else {
            toastr["error"]("User not registered", "");
        }
    };


}

function Addemail(nombobjtxt, refmm) {
    var formData = new FormData();
    var req = new XMLHttpRequest();
    var refvaccionmm = 'I';
    $("#txterror").html('');
    $("#diverror").hide();
    hagosubtmit = 'Y';
    var vmailyon = $("#" + nombobjtxt).val();

    if (!validateEmail(vmailyon)) {
        hagosubtmit = 'N';
        toastr["error"](" Wrong e-mail format", "");
    }

    if (hagosubtmit == 'Y') {


        console.log(nombobjtxt);
        //consulta si devolvio el Scan Device
        formData.append("vemail", vmailyon);
        formData.append("vref", refmm);
        formData.append("acc", refvaccionmm);


        req.open("POST", "ajax_createnotifications.php");
        toastr["info"]("Sending information", "");
        req.send(formData);

        req.onload = function() {
            if (req.status == 200) {
                //console.log(req.response)

                var datos = JSON.parse(req.response);
                console.log(datos.resultiu);
                /// resolve(JSON.parse(req.response));
                if (datos.resultiu == 'ok') {
                    toastr["success"]("Registered OK", "");

                    window.location = 'managerusers.php';
                } else {
                    toastr["error"]("Error. not registered", "");
                }


            } else {
                toastr["error"](" not registered", "");
            }
        };


    }

}

function load_data_rsm_bdabdm(val_search) {
    //console.log(val_search);
    toastr["info"]("Search RSM / BDABDM", "");
    $.ajax({
        url: 'ajax_rsmbdabdm.php',
        data: "dealer=" + val_search,
        type: 'post',
        async: true,
        cache: false,
        success: function(data) {

            //		console.log(data);
            document.getElementById("txtrsm").options.length = 0;
            document.getElementById("txtbdabdm").options.length = 0;

            $('#txtbdabdm').append('<option value="">-Select-</option>');
            $('#txtrsm').append('<option value="">-Select-</option>');
            console.log(data.arr_bdabdm.length);
            for (var i = 0; i < data.arr_bdabdm.length; i++) {
                //   console.log(data.arr_idband[i].fstartul );
                $('#txtbdabdm').append($('<option/>', {
                    value: data.arr_bdabdm[i].nameuserfull,
                    text: data.arr_bdabdm[i].nameuserfull
                }));
                //   console.log('aaa' + data.arr_bdabdm[i].idusercus + '-vvv'+  data.arr_bdabdm[i].nameuserfull);
            }

            console.log(data.arr_rsm.length);
            for (var i = 0; i < data.arr_rsm.length; i++) {
                //   console.log(data.arr_idband[i].fstartul );
                $('#txtrsm').append($('<option/>', {
                    value: data.arr_rsm[i].nameuserfull,
                    text: data.arr_rsm[i].nameuserfull
                }));
                //    console.log('aaa' + data.arr_rsm[i].idusercus + '-vvv'+  data.arr_rsm[i].nameuserfull);
            }



        }
    });


}

function modifyuser(eldius, action) {
    var hagosubtmit = 'S';
    var regexName = /^[a-z][a-z\s]*$/i;
    var regexMail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    var regexHonNo = /[0-9]+$/;
    var regexCompany = /[a-zA-Z0-9-_.,& ]+$/;
    var regexESD = /[a-zA-Z_]+$/i;
    var regexEmployee = /[a-zA-Z0-9:_.& ]+$/;

    //   var v_txtnomproj = $('#txtnameuserfull').val();

    // var v_txtemailtos = $('#txtemailtos').val();

    // var v_txtcompname = $('#txtcompname').val();

    // var v_txtedsdealer = $('#txtedsdealer').val();

    // var v_txthoneywellaccnumber = $('#txthoneywellaccnumber').val();

    // var v_rsm = $('#txtrsm').val();

    // var v_bdabdm = $('#txtbdabdm').val();

    // var v_typeemployee = $('#txttypeemployee').val();

    // var v_txtprofile = $('#txtprofile').val();

    // var v_txtprofile  = $('#txtprofile').val();

    if ($('#txtnameuserfull').val().match(regexName)) {
        var v_txtnomproj = $('#txtnameuserfull').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"](" Full name is invalid - no special characters", "");
    }

    if ($('#txtemailtos').val().match(regexMail)) {
        var v_txtemailtos = $('#txtemailtos').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"](" Wrong - e-mail", "");
    }

    if ($('#txtcompname').val().match(regexCompany)) {
        var v_txtcompname = $('#txtcompname').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"](" Company name is invalid - no special characters", "");
    }

    // if ($('#txtedsdealer').val().match(regexESD)) {
    // var v_txtedsdealer = $('#txtedsdealer').val();
    // } else {
    //     hagosubtmit = 'N';
    //     toastr["error"](" ESD/Dealer Channel  is required", "");
    // }

    if ($('#txtedsdealer').val() != '') {
        var v_txtedsdealer = $('#txtedsdealer').val();
        //console.log('edsdealer '.v_txtedsdealer);
    } else {
        hagosubtmit = 'N';
        toastr["error"](" ESD/Dealer Channel  is required", "");
    }

    if ($('#txthoneywellaccnumber').val().match(regexHonNo)) {
        var v_txthoneywellaccnumber = $('#txthoneywellaccnumber').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"](" Honeywell account number is invalid", "");
    }

    // if ($('#txtrsm').val().match(regexMail) || $('#txtrsm').val() == '-') {
    // var v_rsm = $('#txtrsm').val();
    // } else {
    //     hagosubtmit = 'N';
    //     toastr["error"](" RSM is invalid", "");
    //     console.log('RSM ' + $('#txtrsm').val());
    // }

    // if ($('#txtbdabdm').val().match(regexMail) || $('#txtbdabdm').val() == '-') {
    // var v_bdabdm = $('#txtbdabdm').val();
    // } else {
    //     hagosubtmit = 'N';
    //     toastr["error"](" BDA BDM is invalid", "");
    //     console.log('BDA ' + $('#txtbdabdm').val());
    // }

    if ($('#txtrsm').val() != '') {
        var v_rsm = $('#txtrsm').val();
        //console.log('RSM if ' + v_rsm);
    } else {
        hagosubtmit = 'N';
        toastr["error"](" RSM is required", "");
        //console.log('RSM else ' + $('#txtrsm').val());
    }

    if ($('#txtbdabdm').val() != '') {
        var v_bdabdm = $('#txtbdabdm').val();
        //console.log('BDABDM if ' + v_bdabdm);
    } else {
        hagosubtmit = 'N';
        toastr["error"](" BDA BDM is required", "");
        //console.log('BDA else ' + $('#txtbdabdm').val());
    }

    // if ($('#txttypeemployee').val() != '') {
    var v_typeemployee = $('#txttypeemployee').val();
    //console.log('Employee ' + $('#txttypeemployee').val());
    // } else {
    //     hagosubtmit = 'N';
    //     toastr["error"](" Type Employee is invalid", "");
    // }


    // if ($('#txttypeemployee').val().match(regexEmployee)) {
    //     var v_typeemployee = $('#txttypeemployee').val();
    //     //console.log('Employee ' + $('#txttypeemployee').val());
    // } else {
    //     hagosubtmit = 'N';
    //     toastr["error"](" Type Employee is invalid", "");
    // }

    if ($('#txtprofile').val().match(regexName)) {
        var v_txtprofile = $('#txtprofile').val();
    } else {
        hagosubtmit = 'N';
        toastr["error"](" Type profile is invalid", "");
    }
    var v_txtprofile = $('#txtprofile').val();

    //var v_txtnomproj = $('#txtnameuserfull').val();
    //if (v_txtnomproj =='') { hagosubtmit = 'N';  toastr["error"](" Full name is required", "");}


    //txthoneywellaccnumber
    // var v_txthoneywellaccnumber = $('#txthoneywellaccnumber').val();
    // if (v_txthoneywellaccnumber =='') { hagosubtmit = 'N';  toastr["error"](" Honeywell account number is required", "");}


    // var v_txtcompname = $('#txtcompname').val();
    // if (v_txtcompname =='') { hagosubtmit = 'N';  toastr["error"](" Company name is required", "");}


    // var v_txtedsdealer = $('#txtedsdealer').val();
    // if (v_txtedsdealer =='') { hagosubtmit = 'N';  toastr["error"](" ESD/Dealer Channel  is required", "");}

    // var v_txtemailtos = $('#txtemailtos').val();
    // var v_typeemployee = $('#txttypeemployee').val();

    // var v_rsm = $('#txtrsm').val();
    // var v_bdabdm = $('#txtbdabdm').val();
    // var v_txtprofile  = $('#txtprofile').val();

    if (hagosubtmit == 'S') {

        $("#abc2").prop('disabled', true);
        $("#abc3").prop('disabled', true);

        var formData = new FormData();
        var req = new XMLHttpRequest();

        $("#txterror").html('');
        $("#diverror").hide();

        //consulta si devolvio el Scan Device
        formData.append("v_idcc", eldius);
        formData.append("v_idaction", action);
        formData.append("v_txtemailtos", v_txtemailtos);
        formData.append("v_txtnameuserfull", v_txtnomproj);
        formData.append("v_txtnomprojdb", v_txtnomproj);

        formData.append("v_txtcompname", v_txtcompname);
        formData.append("v_txthoneywellaccnumber", v_txthoneywellaccnumber);
        formData.append("v_txtedsdealer", v_txtedsdealer);
        formData.append("v_typeemployee", v_typeemployee);


        formData.append("v_rsm", v_rsm);
        formData.append("v_txtbdabdm", v_bdabdm);
        formData.append("v_txtprofile", v_txtprofile);



        req.open("POST", "ajax_modifuser.php");
        toastr["info"]("Sending information", "");
        req.send(formData);

        req.onload = function() {
            if (req.status == 200) {
                //console.log(req.response)

                var datos = JSON.parse(req.response);
                console.log(datos.resultiu);
                /// resolve(JSON.parse(req.response));
                if (datos.resultiu == 'ok') {
                    toastr["success"]("Saved modifications", "");

                    window.location = 'managerusers.php';
                } else {
                    toastr["error"](" not registered", "");
                }


            } else {
                toastr["error"]("MAM not registered", "");
            }
        };
    }

}