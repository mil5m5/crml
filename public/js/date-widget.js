$(document).ready(function(){
    $('#reservationdate').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    $('#reservation').daterangepicker({
        locale: {
            format: 'DD.MM.YYYY'
        }
    })
})
