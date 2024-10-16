let DeleteEntryButtons = document.querySelectorAll('.delete-confirm.small .yes'); 

DeleteEntryButtons.forEach(Button => {
    Button.addEventListener('click', () => { 
        window.location = '/Entry/Delete/' + Button.firstElementChild.textContent;
    }) 
});