const BASE_URL = 'http://localhost/neochemstore/';
//let salesChartCanvas = document.getElementById('salesChart').getContext('2d');
const colors = ['rgb(23, 10, 71)', 'green'];
let datasets = [];
let products = [];
let packSizes = [];
$(window).on('load', function () { 
    let month = [];
    let salesValue = [];
    let branches = [];
    if (document.getElementById('salesChart') !== null) {
        let configChart = [];
        let salesChartCanvas = document.getElementById('salesChart').getContext('2d');
        $.ajax({
            method: 'GET',
            url: `${BASE_URL}Sales_Controller/get_month_and_sales`,
        }).then(response => {
            this.console.log(response);
            $.each(response, function (i, value) {
                branches.push(value.branch);
                salesValue.push(value.total);
                configChart = configChart.concat({
                    label: [value.branch],
                    backgroundColor: colors[i % colors.length],
                    data: [value.total]
                });
                
            });
            new Chart(salesChartCanvas, {
                type: 'bar',
                data: {
                    labels: branches,
                    datasets: [{
                        label: 'branch',
                        backgroundColor: 'rgb(23, 10, 71)',
                        data: salesValue,
                        borderWidth: 2,
                        borderColor:'green'
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            barPercentage: 0.2,
                            
                        }]
                    },
                    legend: {
                        display: true
                    },
                    responsive: true,
                    animation: {
                        duration: 4000,

                    }
                    
                }
            });
            this.console.log(configChart);
            
            
            // response.map(res => {
            //     this.console.log(res);
            //     if(branches.findIndex(b=> b === res.branch) === 0)
            //         branches.push(res.branch);
            //     if (month.findIndex(m => m === res.month) === 0)
            //         month.push(res.month)
            //     salesValue.push(res.total);
            // })
            // branches.forEach(b => {
                
            // })
            // let i = 0;
            // new Chart(salesChartCanvas, {
            //     type: 'line',
            //     data: {
            //         labels: [...new Set(month)],
            //         datasets: datasets
            //     },
            //     options: {
            //         responsive: true,
            //         animation: {
            //             easing: "linear",
            //             duration: 5000
            //         },
            //         scales: {
            //             xAxes: [{
            //                 display: true,
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: 'Month'
            //                 }
            //             }],
            //             yAxes: [{
            //                 display: true,
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: 'Sales'
            //                 }
            //             }]
            //         }
            //     }
            // });

        }).catch(e => console.log(e));
    }
});
//animate login screen
$(document).ready(() => {
    // $.ajax({
    //     method: 'POST',
    //     data: {
    //         order_items:[{num: 1},{num : 2}]
    //     },
    //     url:`${BASE_URL}Sales_Controller/put`
    // }).then(r=> console.log(r))
    $('#sideBar').addClass('login-side-bar-position');
    if (document.getElementById('loginError') !== (undefined || null)) {
        $('#loginError').toast({ delay: 5000, animation: true, autohide: true });
        $('#loginError').toast('show');
    }
    // $(function () {
    //     $('[data-toggle="tooltip"]').tooltip()
    // })
    
    $('#updateEmployeeDetails').on('show.bs.modal', function (event) {
        let pressedButton = $(event.relatedTarget);
        $.ajax({
            method: 'GET',
            url: `${BASE_URL}admin/employees/get-by-id/${pressedButton.data('emp')}`
        }).then(response => {
            $('#updateEmpName').val(response.emp_name);
            $('#updateEmpDesignation').val(response.designation);
            $('#updateEmpEmail').val(response.email);
            $('#updateEmpContactNumber').val(response.contact_number);
            $('#updateEmpAddress').val(response.address);
            $('#updateEmployeeId').val(response.id);
            $('#updateEmpEmailHelper').text(null);
        }).catch(e => {
            window.location = '';
        })
    });
});
$('#loginButton').click(() => {
    if ($('#password').val().length > 0 && $('#email').val().length > 0) {
        $('#sideBar').removeClass('login-side-bar-position')
    }
});

//search chemical name
$('#chemicalName').keyup(() => {
    if ($('#chemicalName').val().length > 0) {
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
    } else {
        $('#fixChemicalName').addClass('d-none');
    }
});
$('#fixChemicalName').click(() => {
    $('#chemicalName').val($('#fixChemicalName option:selected').text());
    $('#fixChemicalName').addClass('d-none');
});
// $('#chemicalName').focusout(() => {
//     if ($('#chemicalName').val().length < 1)
//         $('#fixChemicalName').addClass('d-none');
//     else {
//         if ($('#chemicalName').val().length < 5)
//             $('#chemicalName').val($('#chemicalName').val().toUpperCase());
//     }
// });
$('#supplierName').keyup(() => {
    if ($('#supplierName').val().length > 0) {
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
    } else
        $('#supplierNameList').addClass('d-none');
});
$('#supplierNameList').click(() => { 
    $('#supplierName').val($('#supplierNameList option:selected').text());
    $('#supplierNameList').addClass('d-none');
});
// $('#supplierName').focusout(() => {
//     if ($('#supplierName').val().length === 0)
//         $('#supplierNameList').addClass('d-none');
// });
// $('#addToStoreButton').click(() => { 
//     alert($('#fixChemicalName').val());
// });

$('#chemicalNameSearchKeyword').keyup(function () {
    if ($('#chemicalNameSearchKeyword').val().length > 0) {
        $.ajax({
            method: 'GET',
            url: `${BASE_URL}admin/check-chemical-availability/${$('#chemicalNameSearchKeyword').val()}`
        }).then(response => {
            $('#searchChemicalResults').removeClass('display-hide');
            $('#searchChemicalResults').children().remove();
            $.each(response, function (i, value) {
                $('#searchChemicalResults').append($('<option>', {
                    text: value.chemical_name,
                    value: value.pack_size
                }));
            });
        }).catch(e => console.log(e));
    } else {
        $('#searchChemicalResults').addClass('display-hide');
    }
});
$('#orderChemicalId').click(function () { 
    console.log(packSizes);
    console.log(products);
    $.ajax({
        method: 'POST',
        data: {
            orderItems: products,
            packSizes : packSizes
        },
        url:`${BASE_URL}Sales_Controller/put`
    }).then(r=> console.log(r))
});
$('#searchChemicalResults').click(function () { 
    console.log($('#searchChemicalResults').val()[0]);
    products.push($('#searchChemicalResults').text());
    packSizes.push($('#searchChemicalResults').val()[0]);
    //$('#orderProduct').val().length > 1 ? $('#orderProduct').val(`${$('#orderProduct').val()}\n${$('#searchChemicalResults').text()}`) : $('#orderProduct').val($('#searchChemicalResults').text());
});
$('#orderQuantity').keyup(function () {
   $('#orderTotalPriceWithoutVat').val(parseFloat($('#orderUnitPriceWithoutVat').val()) * $('#orderQuantity').val());
});
$('#orderUnitPriceWithVat').keyup(function () {
    isNaN($('#orderUnitPriceWithVat').val()) || $('#orderUnitPriceWithVat').val().length < 1 ? $('#orderTotalPriceWithVat').val(null) : $('#orderTotalPriceWithVat').val(parseFloat($('#orderUnitPriceWithVat').val()) * $('#orderQuantity').val());
});
//check employee exist by contact number
$('#empContactNumber').keyup(function () {
    $.ajax({
        method: 'GET',
        url: `${BASE_URL}admin/employees/check-by-contact-number/${$('#empContactNumber').val()}`
    }).then(response => {
        response === null ? $('#empContactNumberHelper').text('') : $('#empContactNumberHelper').text('This Contact Number Is Belongs To An Another Employee');
    }).catch(e => console.log(e));
});
/**
 * expire date validation
 */
$('#expDate').focusout(function () {
    if (new Date($('#expDate').val()).getTime() <= new Date().getTime())
        $('#expDateHelper').text('This Is Not A Valied Expire Date');
    else
        $('#expDateHelper').text('');
});
//get employee email address
$('#empEmail,#updateEmpEmail').change(function () { 
    $.ajax({
        method: 'GET',
        url: `${BASE_URL}admin/employees/check-by-email/${$(this).val()}`
    }).then(res => res !== null ? $('#empEmailHelper,#updateEmpEmailHelper').text('This Email Is Belongs To Another Employee') : $('#empEmailHelper,#updateEmpEmailHelper').text('')).catch(e=> console.log(e));
});
$('.btn-resign').click(function () { 
    $.ajax({
        method: 'POST',
        url: `${BASE_URL}Employees_Controller/resign_an_employee`,
        data: {
            empId : $(this).val()
        }
    }).then(_ => window.location='').catch(_ => window.location='');
    //alert($(this).val());
});
$('.btn-delete').click(function () { 
    $.ajax({
        method: 'POST',
        url: `${BASE_URL}Employees_Controller/delete_an_employee`,
        data: {
            empId: $(this).val()
        }
    }).then(_ => window.location = '').catch(_ => console.log('err'));
});
/////////////search sales person
$('#orderSalesPerson').keyup(function () { 
    if ($('#orderSalesPerson').val().length > 0) {
        $.ajax({
            method: 'GET',
            url: `${BASE_URL}admin/employees/check-by-emp-no/${$('#orderSalesPerson').val()}`
        }).then(response => {
            console.log(response);
            $.each(response, function (i, value) { 
                $('#orderSalesPersonList').removeClass('display-hide');
                $('#orderSalesPersonList').children().remove();
                $('#orderSalesPersonList').append($('<option>', {
                	value: value.id,
                	text: value.emp_name
                }));
            });
        }).catch(e => $('#orderSalesPersonList').addClass('display-hide'));
    } else {
        $('#orderSalesPersonList').addClass('display-hide');
    }
});
$('#orderSalesPersonList').click(function () { 
    $('#orderSalesPerson').val($('#orderSalesPersonList option:selected').text());
    $('#orderSalesPersonList').addClass('d-none');
});
$('#orderSalesPerson').focusout(function () {
    if ($('#orderSalesPerson').val().length < 1)
	    $('#orderSalesPersonList').addClass('d-none');
});
///////
$("#orderEditButton").click(function () {
    // $('#orderUpdateForm').children('input').each(function () {
    //     $(this).prop('disabled', !$(this).prop('disabled'));
    // });
     //$('#orderUpdateForm').children('[disabled]').toggle();
    $('.update-order').removeAttr("disabled");
});