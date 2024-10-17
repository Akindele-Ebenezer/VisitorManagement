let DashboardRoute = document.querySelectorAll('.DashboardRoute');
let LogoutRoute = document.querySelectorAll('.LogoutRoute');
let CurrentlyInTheYard = document.querySelectorAll('.CurrentlyInTheYard');
let SignedOut = document.querySelectorAll('.SignedOut');

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

CurrentlyInTheYard.forEach(Button => { 
    Button.addEventListener('click', () => {
        window.location = '/Dashboard?FilterValue=CurrentlyInTheYard';
    })
});
SignedOut.forEach(Button => { 
    Button.addEventListener('click', () => {
        window.location = '/Dashboard?FilterValue=SignedOut';
    })
});