$(document).ready(function () {
    $('#loginForm').on('submit', function (event) {
        event.preventDefault();

        var email = $('#loginEmail').val();
        var password = $('#loginPassword').val();

        console.log('Validating login form...');

        if (!validateEmail(email)) {
            Swal.fire('Error', 'Please enter a valid Ashesi email address.', 'error');
            console.log('Validation failed: Invalid email address.');
            return;
        }

        if (password.length < 6) {
            Swal.fire('Error', 'Password must be at least 6 characters long.', 'error');
            console.log('Validation failed: Password too short.');
            return;
        }

        $.ajax({
            url: '../actions/loginprocess.php',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            dataType: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Success',
                        text: data.message,
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '../view/dashboard.php';
                    });
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            },
            error: function () {
                Swal.fire('Error', 'An error occurred while processing your request.', 'error');
            }
        });

        console.log('Validation passed.');
    });

    function validateEmail(email) {
        var re = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;
        return re.test(email);
    }
});