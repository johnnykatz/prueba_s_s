/**
 * Created by cesarkatz on 13/8/18.
 */

function selectTipoEmpleado() {
    if ($('#tipo_empleado_id').val() == 1) {
        $('#diseniador').attr('class', 'hidden');
        $('#programador').removeAttr('class');
    } else {
        $('#programador').attr('class', 'hidden');
        $('#diseniador').removeAttr('class');
    }
}