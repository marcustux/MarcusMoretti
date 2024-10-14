(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    console.log('a');
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();



function createuser() {
    var _entornoActual = document.getElementById('entornoactualdiv').getAttribute('value');

    if (_entornoActual == 'TST') {
        window.location = 'https://flexbda.com/testing/mflexdbacreateuser.php';
    } else if (_entornoActual == 'DEV') {
        window.location = 'http://localhost:3000/mflexdbacreateuser.php';
    } else {
        window.location = 'https://flexbda.com/mflexdbacreateuser.php';
    }
}

function recordarpas() {

    //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
    var regexMail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i;
    //  if( $("#txtuser").val()  != '' && emailReg.test( $("#txtuser").val() ))
    if (regexMail.test($("#txtuser").val())) {
        $.ajax({
            url: 'ajax_updateinfo_user.php',
            data: "qaccem=1&txtuser=" + $("#txtuser").val(),
            type: 'post',
            datatype: 'JSON',
            cache: false,
            success: function(data, status, xhr) {
                var resultadom = data.resultiu;
                var resulterr = data.erromsj;

                if (resultadom == "ok") {
                    ///		toastr["success"]("Save OK!", "");	
                    Swal.fire(
                        'Password reset Ok',
                        'Please check your email.',
                        'success'
                    ).then((result) => {
                        window.location = 'index.php';
                    })


                } else {
                    Swal.fire(
                        'Error when resetting the password',
                        '',
                        'error'
                    ).then((result) => {
                        window.location = 'index.php';
                    })
                }
                return false;

            },
            error: function(xhr, status, error) {
                console.log(status);
            }
        });
    }

}