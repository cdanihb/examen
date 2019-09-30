$(document).ready(function () {
    $('#staff').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "aoColumns": [
            { "bSortable": true, "bSearchable": true },
            { "bSortable": true, "bSearchable": true },
            { "bSortable": false, "bSearchable": false },
            { "bSortable": false, "bSearchable": false },
            { "bSortable": true, "bSearchable": true },
            { "bSortable": false, "bSearchable": false },
            { "bSortable": false, "bSearchable": false },
        ]
    });

    $('#btnModalActiveAccept').click(function () {
        var id = $(this).data('id'), url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { id: id, status: '1' },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                if (data.success == true) {
                    toastr.success('Se activo correctamente el empleado.', '¡ÉXITO!');

                    setTimeout(function () {
                        $("#modal-active").modal('hide');

                        location.reload();
                    }, 1000);
                }
                if (data.success == false) {
                    toastr.warning('Existen errores en la petición.', '¡ADVERTENCIA!');

                    $('#btnModalActiveCancel').prop('disabled', false);
                    $('#btnModalActiveAccept').prop('disabled', false);
                }
            },
            error: function (requestData, strError, strTipoError) {
                $('#btnModalActiveCancel').prop('disabled', false);
                $('#btnModalActiveAccept').prop('disabled', false);
                toastr.error('Ocurrio un error. ' + strTipoError, '¡ERROR!');
            },
            beforeSend: function () {
                $('#btnModalActiveCancel').prop('disabled', true);
                $('#btnModalActiveAccept').prop('disabled', true);
            }
        });
    });

    $('#btnModalActiveCancel').click(function () {
        $('#modal-active').modal('hide');
        $('#modalBodyActive').empty();
        $('#btnModalAcceptActive').removeAttr('data-id');
        $('#btnModalAcceptActive').removeAttr('data-url');
    });

    $('#btnModalInactiveAccept').click(function () {
        var id = $(this).data('id'), url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { id: id, status: '0' },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                if (data.success == true) {
                    toastr.success('Se inactivo correctamente el empleado.', '¡ÉXITO!');

                    setTimeout(function () {
                        $("#modal-inactive").modal('hide');

                        location.reload();
                    }, 1000);
                }
                if (data.success == false) {
                    toastr.warning('Existen errores en la petición.', '¡ADVERTENCIA!');

                    $('#btnModalInactiveCancel').prop('disabled', false);
                    $('#btnModalInactiveAccept').prop('disabled', false);
                }
            },
            error: function (requestData, strError, strTipoError) {
                $('#btnModalInactiveCancel').prop('disabled', false);
                $('#btnModalInactiveAccept').prop('disabled', false);
                toastr.error('Ocurrio un error. ' + strTipoError, '¡ERROR!');
            },
            beforeSend: function () {
                $('#btnModalInactiveCancel').prop('disabled', true);
                $('#btnModalInactiveAccept').prop('disabled', true);
            }
        });
    });

    $('#btnModalInactiveCancel').click(function () {
        $('#modal-inactive').modal('hide');
        $('#modalBodInactive').empty();
        $('#btnModalInactiveAccept').removeAttr('data-id');
        $('#btnModalInactiveAccept').removeAttr('data-url');
    });

    $('#btnModalDeleteAccept').click(function () {
        var id = $(this).data('id'), url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { id: id },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                if (data.success == true) {
                    toastr.success('Se elimino correctamente el empleado.', '¡ÉXITO!');

                    setTimeout(function () {
                        $("#modal-delete").modal('hide');

                        location.reload();
                    }, 1000);
                }
                if (data.success == false) {
                    toastr.warning('Existen errores en la petición.', '¡ADVERTENCIA!');

                    $('#btnModalDeleteCancel').prop('disabled', false);
                    $('#btnModalDeleteAccept').prop('disabled', false);
                }
            },
            error: function (requestData, strError, strTipoError) {
                $('#btnModalDeleteCancel').prop('disabled', false);
                $('#btnModalDeleteAccept').prop('disabled', false);
                toastr.error('Ocurrio un error. ' + strTipoError, '¡ERROR!');
            },
            beforeSend: function () {
                $('#btnModalDeleteCancel').prop('disabled', true);
                $('#btnModalDeleteAccept').prop('disabled', true);
            }
        });
    });

    $('#btnModalDeleteCancel').click(function () {
        $('#modal-delete').modal('hide');
        $('#modalBodyDelete').empty();
        $('#btnModalDeleteAccept').removeAttr('data-id');
        $('#btnModalDeleteAccept').removeAttr('data-url');
    });
});

function activeStaff(id, name, url) {
    $('#modal-active').modal({
        show: true,
        backdrop: 'static',
        keyboard: false
    });

    $('#modalBodyActive').html('<p class="text-left">¿Realmente deseas activar el empleado ' + name + '?</p>');
    $('#btnModalActiveAccept').attr('data-id', id);
    $('#btnModalActiveAccept').attr('data-url', url);
}

function inactiveStaff(id, name, url) {
    $('#modal-inactive').modal({
        show: true,
        backdrop: 'static',
        keyboard: false
    });

    $('#modalBodyInactive').html('<p class="text-left">¿Realmente deseas inactivar el empleado ' + name + '?</p>');
    $('#btnModalInactiveAccept').attr('data-id', id);
    $('#btnModalInactiveAccept').attr('data-url', url);
}

function deleteStaff(id, name, url) {
    $('#modal-delete').modal({
        show: true,
        backdrop: 'static',
        keyboard: false
    });

    $('#modalBodyDelete').html('<p class="text-left">¿Realmente deseas eliminar el empleado ' + name + '?</p>');
    $('#btnModalDeleteAccept').attr('data-id', id);
    $('#btnModalDeleteAccept').attr('data-url', url);
}
