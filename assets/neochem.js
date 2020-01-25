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
