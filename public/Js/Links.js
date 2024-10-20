let DashboardRoute = document.querySelectorAll('.DashboardRoute');
let LogoutRoute = document.querySelectorAll('.LogoutRoute');
let CurrentlyInTheYard = document.querySelectorAll('.CurrentlyInTheYard');
let SignedOut = document.querySelectorAll('.SignedOut');
let All = document.querySelectorAll('.All');
let Stat_SignedIn = document.querySelectorAll('.Stat_SignedIn');
let Stat_SignedOut = document.querySelectorAll('.Stat_SignedOut');

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
All.forEach(Button => { 
    Button.addEventListener('click', () => {
        window.location = '/Dashboard?FilterValue=*&PersonnelClass=' + Button.firstElementChild.textContent;
    })
});
Stat_SignedIn.forEach(Button => { 
    Button.addEventListener('click', () => {
        window.location = '/Dashboard?FilterValue=CurrentlyInTheYard&PersonnelClass=' + Button.firstElementChild.textContent;
    })
});
Stat_SignedOut.forEach(Button => { 
    Button.addEventListener('click', () => {
        window.location = '/Dashboard?FilterValue=SignedOut&PersonnelClass=' + Button.firstElementChild.textContent;
    })
});