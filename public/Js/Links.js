let DashboardRoute = document.querySelectorAll('.DashboardRoute');
let LogoutRoute = document.querySelectorAll('.LogoutRoute');

DashboardRoute.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Dashboard';
    })
});
LogoutRoute.forEach(Button => { 
    Button.addEventListener('click', () => {
        window.location = '/Logout';
    })
});