$(document).ready(function () {
    $('#dollarSalary').inputmask('Regex', { regex: "^[0-9.]{1,15}(\\.\\d{2})?$" });
    $('#pesosSalary').inputmask('Regex', { regex: "^[0-9.]{1,15}(\\.\\d{2})?$" });
    $('#telephone').inputmask('Regex', { regex: "^[0-9]{1,10}?$" });

    $('input[type="radio"].flat-purple').iCheck({
        radioClass   : 'iradio_flat-purple'
    });

    $('#dollarSalary').blur(function () {
        $('#pesosSalary').val('');

        if ($('#dollarSalary').val() > 0) {
            $.get(urlWsStaff, function (data) {
                $('#pesosSalary').val((data * $('#dollarSalary').val()).toFixed(2));
            });
        }
    });

    $('#btnSave').click(function () {
        saveStaff();
    });

    $('#btnCancel').click(function () {
        $('#modal-cancel').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
    });

    $('#btnModalCancel').click(function () {
        $('#modal-cancel').modal('hide');
    });
});

function saveStaff() {
    $.ajax({
        url: urlStoreStaff,
        type: 'post',
        dataType: 'json',
        data: $('#frmNewStaff').serialize(),
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data) {
            if (data.success == false) {
                toastr.warning('Existen errores en el formulario.', '¡ADVERTENCIA!');

                $.each(data.errors, function(key, value) {
                    addErrorMsg(key, value);
                });

                $('#btnSave').prop('disabled', false);
                $('#btnCancel').prop('disabled', false);
            }
            if (data.success == true) {
                toastr.success('Se guardo correctamente el empleado.', '¡ÉXITO!');

                setTimeout(function () { location.href = urlStaff; }, 1000);
            }
        },
        error: function (requestData, strError, strTipoError) {
            $('#btnSave').prop('disabled', false);
            $('#btnCancel').prop('disabled', false);
            toastr.error('Ocurrio un error. ' + strTipoError, '¡ERROR!');
        },
        beforeSend: function () {
            $('#btnSave').prop('disabled', true);
            $('#btnCancel').prop('disabled', true);
            cleanErrorMsg();
        }
    });
}

function addErrorMsg(key, message) {
    $('#div_' + key).addClass('has-error');
    $('#span_' + key).empty().append('<strong>' + message + '</strong>');
}

function cleanErrorMsg() {
    $('.has-error').removeClass('has-error');
    $('.help-block').empty();
}
