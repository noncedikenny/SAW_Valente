$(document).ready(function() {
    // Cache jQuery selectors
    const $firstname = $('#firstname');
    const $lastname = $('#lastname');
    const $email = $('#email');
    const $password = $('#pass');
    const $conf_pass = $('#confirm');
    
    const $firstname_error = $('#firstname_error');
    const $lastname_error = $('#lastname_error');
    const $email_error = $('#email_error');
    const $password_error = $('#password_error');
    const $confirm_error = $('#confirm_error');

    // Event listeners using jQuery
    $firstname.on('input', function() {
        validateName($firstname.val(), $firstname_error);
    });

    $lastname.on('input', function() {
        validateName($lastname.val(), $lastname_error);
    });

    $email.on('input', validateEmail);
    $password.on('input', validatePassword);
    $conf_pass.on('input', validateConf);

    // Function to validate name
    function validateName(name, $errorField) {
        const regex = /^[a-zA-Z ]+$/;
        if (!regex.test(name)) {
            $errorField.html('È possibile inserire solo lettere o numeri.');
        } else {
            $errorField.html('');
        }
    }

    // Function to validate email
    function validateEmail() {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test($email.val())) {
            $email_error.html('Email non valida.');
        } else {
            $.getJSON('scripts/search_email.php', { email: $email.val() })
                .done(function(data) {
                    if (data.exists) {
                        $email_error.html('Email già registrata.');
                    } else {
                        $email_error.html('');
                    }
                })
                .fail(function(error) {
                    console.error('Errore:', error);
                });
        }
    }

    // Function to validate password
    function validatePassword() {
        if ($password.val().length < 8) {
            $password_error.html('La password deve contenere almeno 8 caratteri');
        } else {
            $password_error.html('');
        }
    }

    // Function to validate password confirmation
    function validateConf() {
        if ($password.val() !== $conf_pass.val() || $conf_pass.val() === '') {
            $confirm_error.html('Le password non coincidono o la conferma della password è vuota.');
        } else {
            $confirm_error.html('');
        }
    }

    // Function to validate the form before submission
    function validateForm() {
        validateName($firstname.val(), $firstname_error);
        validateName($lastname.val(), $lastname_error);
        validateEmail();
        validatePassword();
        validateConf();
        if ($firstname_error.text() || $lastname_error.text() || $email_error.text() || $password_error.text() || $confirm_error.text()) {
            return false;
        }
        return true;
    }

    // Form submission event listener
    $("#registrationForm").on('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});
