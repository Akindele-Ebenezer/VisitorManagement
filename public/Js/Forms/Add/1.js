let EditEntryForm = document.querySelectorAll('.EditEntryForm');
let Layout = document.querySelector('.Layout');
let Layout_x = document.querySelector('.Layout-x');
let CreateEntryForm = document.querySelector('.CreateEntryForm'); 
let CreateEntryButton = document.querySelector('.CreateEntryButton');
let CloseCreateEntryFormButton = document.querySelector('.CreateEntryForm .Close');
let CreateEntryFormWrapper = document.querySelector('.CreateEntryForm .Wrapper');
let CreateEntrySubmitButton = document.querySelector('.CreateEntry');
let ErrorMessage = document.querySelector('.ErrorMessage');

CreateEntryButton.addEventListener('click', () => {
    CreateEntryForm.classList.remove('d-none');
    Layout_x.classList.remove('d-block');  
    Layout.style.overflow = 'hidden';  
    CreateEntryFormWrapper.classList.add('d-flex');  

    CloseCreateEntryFormButton.addEventListener('click', () => {
        CreateEntryForm.classList.remove('d-flex');
        CreateEntryForm.classList.add('d-none'); 
        Layout.style.overflow = 'unset';  
    }) 
})

let Name = document.querySelector('input[name="Name"]');
let PersonnelClass = document.querySelector('select[name="PersonnelClass"]');
let Address = document.querySelector('input[name="Address"]');
let SecurityStaff = document.querySelector('input[name="SecurityStaff"]');
let WhomToSee = document.querySelector('input[name="WhomToSee"]');
let CompanyVisiting = document.querySelector('input[name="CompanyVisiting"]');
let TagNumber = document.querySelector('input[name="TagNumber"]');
let EntryDate = document.querySelector('input[name="EntryDate"]');
let EntryTime = document.querySelector('input[name="EntryTime"]');
let EntrySignature = document.querySelector('input[name="EntrySignature"]');
let ExitDate = document.querySelector('input[name="ExitDate"]');
let ExitTime = document.querySelector('input[name="ExitTime"]');
let ExitSignature = document.querySelector('input[name="ExitSignature"]');
let ApprovedBy = document.querySelector('input[name="ApprovedBy"]');
let PhoneNumber = document.querySelector('input[name="PhoneNumber"]');
let PurposeOfVisiting = document.querySelector('textarea[name="PurposeOfVisiting"]'); 

CreateEntrySubmitButton.addEventListener('click', () => {
    if (Name.value == '') {
        ErrorMessage.textContent = 'Visitor name is required..';
    } else if (PersonnelClass.value == '') { 
        ErrorMessage.textContent = 'Personnel Class is required..';
    }  else if (Address.value == '') { 
        ErrorMessage.textContent = 'Visitor address is required..';
    } else if (SecurityStaff.value == '') { 
        ErrorMessage.textContent = 'Security Staff is required..';
    } else if (WhomToSee.value == '') { 
        ErrorMessage.textContent = 'Whom to see field is required..';
    }  else if (CompanyVisiting.value == '') { 
        ErrorMessage.textContent = 'Company visiting field is required..';
    }  else if (TagNumber.value == '') { 
        ErrorMessage.textContent = 'Tag number is required..';
    }  else if (EntryDate.value == '') { 
        ErrorMessage.textContent = 'Entry date is required..';
    }  else if (EntryTime.value == '') { 
        ErrorMessage.textContent = 'Entry time is required..';
    }  else if (EntrySignature.checked == false) { 
        ErrorMessage.textContent = 'Visitor entry signature is required..';
    }  else if (ApprovedBy.value == '') { 
        ErrorMessage.textContent = 'Approved by field is required..';
    }  else if (PhoneNumber.value == '') { 
        ErrorMessage.textContent = 'Visitor phone number is required..';
    }  else if (PurposeOfVisiting.value == '') { 
        ErrorMessage.textContent = 'Purpose of visiting field is required..';
    }  else {
        CreateEntrySubmitButton.textContent = 'Processing..';
        CreateEntrySubmitButton.style.background = 'tomato';
        CreateEntryForm.setAttribute('action', '/Entry/Create'); 
        CreateEntryForm.submit();
    }
});