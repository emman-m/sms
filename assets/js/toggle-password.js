$(document).ready(function() {

    $('#togglePassword').on('click', function() {
        // Toggle the type attribute
        const type = $('.toggle-password').attr('type') === 'password' ? 'text' : 'password';
        $('.toggle-password').attr('type', type);

        // Toggle the eye icon
        $(this).toggleClass('fa-eye fa-eye-slash');
    })
})