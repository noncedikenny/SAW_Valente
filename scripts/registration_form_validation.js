const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email = document.getElementById('email');
const password = document.getElementById('pass');
const conf_pass = document.getElementById('confirm');

const firstname_error = document.getElementById('firstname_error');
const lastname_error = document.getElementById('lastname_error'); // Correggi il nome dell'elemento di errore del cognome
const email_error = document.getElementById('email_error');
const password_error = document.getElementById('password_error');
const confirm_error = document.getElementById('confirm_error');

firstname.addEventListener('input', () => validateName(firstname.value, firstname_error));
lastname.addEventListener('input', () => validateName(lastname.value, lastname_error));
email.addEventListener('input', validateEmail);
password.addEventListener('input', validatePassword);
conf_pass.addEventListener('input', validateConf);

function validateName(name, errorField) {
    const regex = /^[a-zA-Z]+$/;
    if (!regex.test(name)) {
        errorField.innerHTML = 'È possibile inserire solo lettere o numeri.';
    } else {
        errorField.innerHTML = '';
    }
}

function validateEmail() {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
        email_error.innerHTML = 'Email non valida.';
    } else {
        fetch('scripts/search_email.php?email=' + encodeURIComponent(email.value))
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    email_error.innerHTML = 'Email già registrata.';
                } else {
                    email_error.innerHTML = '';
                }
            })
            .catch(error => console.error('Errore:', error));
    }
}

function validatePassword() {
    if (password.value.length < 8) {
        password_error.innerHTML = 'La password deve contenere almeno 8 caratteri';
    }
    const password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!password_regex.test(password.value)) {
        password_error.innerHTML = 'La password deve contenere otto caratteri, almeno: una lettera maiuscola, una lettera minuscola, un numero ed un carattere speciale.';
    } else {
        password_error.innerHTML = '';
    }
}

function validateConf() {
    if (password.value !== conf_pass.value || conf_pass.value === '') {
        confirm_error.innerHTML = 'Le password non coincidono o la conferma della password è vuota.';
    }
    else {
        confirm_error.innerHTML = '';
    }
}

function validateForm() {
    validateName(firstname.value, firstname_error);
    validateName(lastname.value, lastname_error);
    validateEmail();
    validatePassword();
    validateConf();
    if (firstname_error.textContent || lastname_error.textContent || email_error.textContent || password_error.textContent || confirm_error.textContent) {
        return false;
    }
    return true;
}

document.getElementById("registrationForm").addEventListener('submit', function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});
