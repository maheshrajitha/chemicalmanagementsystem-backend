const BASE_URL = 'http://localhost/neochemstore/';
//animate login screen
$(document).ready(() => {
    $('#sideBar').addClass('login-side-bar-position');
    if (document.getElementById('loginError') !== (undefined || null)) {
        $('#loginError').toast({ delay: 5000, animation: true, autohide: true });
        $('#loginError').toast('show');
    }
});
$('#loginButton').click(() => {
    if ($('#password').val().length > 0 && $('#email').val().length > 0) {
        $('#sideBar').removeClass('login-side-bar-position')
    }
});

//search chemical name
$('#chemicalName').keyup(() => {
    $('#fixChemicalName').removeClass('d-none');
    $.ajax({
        //this url should change in production 
        url: `${BASE_URL}admin/search-chemicals/${$('#chemicalName').val()}`,
        method: 'GET',
    }).then(res => {
        $('#fixChemicalName').children().remove();
        if (res.length > 0) {
            $.each(res, (index, value) => {
            	$('#fixChemicalName').append($('<option>', {
            		value: value.id,
            		text: value.chemical_name
            	}))
            });
        } else {
            $('#fixChemicalName').addClass('d-none');
        }
    }).catch(e => console.log(e));
});
$('#fixChemicalName').click(() => {
    $('#chemicalName').val($('#fixChemicalName option:selected').text());
    $('#fixChemicalName').addClass('d-none');
});
$('#chemicalName').focusout(() => {
    if ($('#chemicalName').val().length < 1)
        $('#fixChemicalName').addClass('d-none');
});
$('#supplierName').keyup(() => {
    $('#supplierNameList').removeClass('d-none');
    $.ajax({
        //this url should change in production mode
        url: `${BASE_URL}admin/suppliers/search-suppliers/${$('#supplierName').val()}`,
        method: 'GET'
    }).then(res => {
        console.log(res);
        $('#supplierNameList').children().remove();
        if (res.length > 0) {
            $.each(res, (index, value) => {
                $('#supplierNameList').append($('<option>', {
                    value: value.id,
                    text: value.supplier_name
                }));
            });
        }
    }).catch(e => console.log(e));
});
$('#supplierNameList').click(() => { 
    $('#supplierName').val($('#supplierNameList option:selected').text());
    $('#supplierNameList').addClass('d-none');
});
$('#supplierName').focusout(() => {
    if ($('#supplierName').val().length === 0)
        $('#supplierNameList').addClass('d-none');
});
$('#addToStoreButton').click(() => { 
    alert($('#fixChemicalName').val());
});
