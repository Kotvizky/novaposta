
function updateSelect(npSelect, options, firstOption) {

    npSelect.prop( "disabled", false );

    npSelect
        .find('option')
        .remove();

    if (options.length > 1) {
        npSelect.append('<option disabled selected value> Выберите '+ firstOption +' </option>');
    }

    if (options) {
        options.forEach( function(item, value) {
            npSelect.append(new Option(item.description, item.ref));
        } )
    }
}

$('#np-area').on('change', function (e) {
    var select = $('#np-city');
    var npWarehouse = $('#np-warehouse');

        $.ajax({
        url: "app/action/getCities.php",
        data:{ref: e.target.value},
    }).done(function(data) {
        var cities = JSON.parse(data);
        updateSelect(select, cities, 'город');

        npWarehouse.prop( "disabled", true );

        npWarehouse
            .find('option')
            .remove();
    })
})

$('#np-city').on('change', function (e) {

    var select = $('#np-warehouse');

    $.ajax({
        url: "app/action/getWarehouses.php",
        data:{ref: e.target.value},
    }).done(function(data) {
        var warehouses = JSON.parse(data);
        updateSelect(select, warehouses, 'склад')
    })

})

function showMessage(text) {
    $('#message-text').html('<pre>' + text + '</pre>');
    $('#message').removeClass('d-none');
}

$('#getSenderRef').on('click', function(e) {

    $.ajax({
        url: "app/action/saveSenderRef.php",
        data:{ref: e.target.value},
    }).done(function(data) {
        var answer = JSON.parse(data);
        if (answer.success){
            $('#np-sender-ref').val(answer.ref);
        }
        console.log(answer);
        showMessage(data);
        //updateSelect(select, warehouses, 'склад')
    })
})

$('#btn-close').on('click', function(e) {
    $('#message').addClass('d-none');
})

