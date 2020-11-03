$(document).ready(function(){
    $("#currencyexchange-amount").change(function() {
        var res = 0;
        var rate = $('#currencyexchange-rate').val();
        var amount = $(this).val();
        var exchanged = $('#currencyexchange-exchanged').val();
        if (rate !== '' && amount !== '') {
            res = parseFloat(rate)*parseFloat(amount);
            $('#currencyexchange-exchanged').val(res.toFixed(2));
        }else if (amount !== '' && exchanged !== '') {
            res = parseFloat(exchanged)/parseFloat(amount);
            $('#currencyexchange-rate').val(res.toFixed(2));
        }
    });
    $("#currencyexchange-rate").change(function() {
        var res = 0;
        var rate = $(this).val();
        var amount = $("#currencyexchange-amount").val();
        if (rate !== '' && amount !== '') {
            res = parseFloat(rate)*parseFloat(amount);
            $('#currencyexchange-exchanged').val(res.toFixed(2));
        }
    });
    $("#currencyexchange-exchanged").change(function() {
        var res = 0;
        var exchanged = $(this).val();
        var amount = $("#currencyexchange-amount").val();
        if (exchanged !== '' && amount !== '') {
            res = parseFloat(exchanged)/parseFloat(amount);
            $('#currencyexchange-rate').val(res.toFixed(2));
        }
    });

})
