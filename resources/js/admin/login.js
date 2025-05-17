const showPassword = document.querySelector('.show-password');
let passwordInput = document.querySelector('#show-password');

showPassword.addEventListener('click', () => {
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
});








