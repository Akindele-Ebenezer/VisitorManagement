let LoginForm = document.querySelector('.LoginForm');
let LoginButton = document.querySelector('.LoginButton');
let Error = document.querySelector('.Error');
let Email = document.querySelector('input[name="Email"]');
let Password = document.querySelector('input[name="Password"]');

LoginButton.addEventListener('click', () => {
    if (Email.value == '') {
        Error.style.display = 'block'; 
        Error.textContent = 'Please enter your email...'; 
    } else if (Password.value == '') {
        Error.style.display = 'block'; 
        Error.textContent = 'Please enter your password...';
    } else {
        Error.style.display = 'block'; 
        Error.style.backgroundColor = '#79a379'; 
        LoginButton.style.color = '#fff'; 
        LoginButton.style.backgroundColor = '#000'; 
        Error.style.color = '#1a621a'; 
        Error.style.display = 'block'; 
        LoginButton.textContent = 'Authenticating user...';
        Error.textContent = 'Verification successful...';
        LoginForm.setAttribute("method", "POST");
        LoginForm.setAttribute("action", "/Login");
        LoginForm.submit(); 
    }
})