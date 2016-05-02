/**
 * Created by cachorios on 29/04/2016.
 */
eliminar = function($form,textoTitulo,textoMsg) {
    swal({
        title: textoTitulo,
        text: textoMsg,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrarlo!',
        closeOnConfirm: false
    }).then(function (isConfirm) {
        if (isConfirm) {
            $form.submit();

        }
    });

    return false;
}
