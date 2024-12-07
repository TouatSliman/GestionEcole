'strict mode';

function login() {
    const login = document.getElementById('login');
    login.classList.remove('hidden');
    const register = document.getElementById('register');
    register.classList.add('hidden');
}

function register() {
    const login = document.getElementById('login');
    login.classList.add('hidden');
    const register = document.getElementById('register');
    register.classList.remove('hidden');
}

const hide_password = document.querySelectorAll('.hide_password');
hide_password.forEach(element => {
    element.addEventListener('click', () => {
        if (element.checked) {
            element.parentElement.querySelector('.password').type = 'text';
        } else {
            element.parentElement.querySelector('.password').type = 'password';
        }
    })
})


