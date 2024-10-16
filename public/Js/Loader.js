let Loader = document.querySelector('.loader');

if (window.location.pathname == '/') {
    setTimeout(() => {
        Loader.style.display = 'none';
    }, 3000);
}