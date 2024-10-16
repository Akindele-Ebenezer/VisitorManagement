let EditEntryButtons = document.querySelectorAll('.EditEntryButton');
let CloseEditEntryFormButton = document.querySelector('.EditEntryForm .Close');
let EditEntryFormWrapper = document.querySelector('.EditEntryForm .Wrapper');
let EditEntrySubmitButton = document.querySelector('.EditEntry');

let EditName = document.querySelector('input[name="EditName"]');
let EditPersonnelClass = document.querySelector('select[name="EditPersonnelClass"]');
let EditAddress = document.querySelector('input[name="EditAddress"]');
let EditSecurityStaff = document.querySelector('input[name="EditSecurityStaff"]');
let EditWhomToSee = document.querySelector('input[name="EditWhomToSee"]');
let EditCompanyVisiting = document.querySelector('input[name="EditCompanyVisiting"]');
let EditTagNumber = document.querySelector('input[name="EditTagNumber"]');
let EditEntryDate = document.querySelector('input[name="EditEntryDate"]');
let EditEntryTime = document.querySelector('input[name="EditEntryTime"]');
let EditEntrySignature = document.querySelector('input[name="EditEntrySignature"]');
let EditExitDate = document.querySelector('input[name="EditExitDate"]');
let EditExitTime = document.querySelector('input[name="EditExitTime"]');
let EditExitSignature = document.querySelector('input[name="EditExitSignature"]');
let EditApprovedBy = document.querySelector('input[name="EditApprovedBy"]');
let EditPhoneNumber = document.querySelector('input[name="EditPhoneNumber"]');
let EditPurposeOfVisiting = document.querySelector('textarea[name="EditPurposeOfVisiting"]'); 
let ErrorMessage_Edit = document.querySelector('.ErrorMessage_Edit');

EditEntryButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        EditEntryForm.forEach(El => {
            El.classList.remove('d-none');
        });
        Layout_x.classList.remove('d-block');  
        Layout.style.overflow = 'hidden';  
        EditEntryFormWrapper.classList.add('d-flex');  
        EditEntrySubmitButton.nextElementSibling.textContent = Button.nextElementSibling.textContent;

        EditName.value = Button.nextElementSibling.nextElementSibling.textContent; 
        EditAddress.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditWhomToSee.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditCompanyVisiting.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditTagNumber.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditEntryDate.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditEntryTime.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditEntrySignature.nextElementSibling.textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        if (EditEntrySignature.nextElementSibling.textContent == 'on') {
            EditEntrySignature.checked = true;
        }
        EditExitDate.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditExitTime.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditExitSignature.nextElementSibling.textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        if (EditExitSignature.nextElementSibling.textContent == 'on') {
            EditExitSignature.checked = true;
        }
        EditApprovedBy.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        EditPhoneNumber.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;  
        EditPurposeOfVisiting.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;  
        EditPersonnelClass.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;  
        EditSecurityStaff.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;  
        
        CloseEditEntryFormButton.addEventListener('click', () => {
            EditEntryForm.forEach(El => {
                El.classList.remove('d-flex');
                El.classList.add('d-none'); 
            });
            Layout.style.overflow = 'unset';  
        }) 
    })
    
    EditEntrySubmitButton.addEventListener('click', () => {
        if (EditName.value == '') {
            ErrorMessage_Edit.textContent = 'Visitor name is required..';
        } else if (EditPersonnelClass.value == '') { 
            ErrorMessage_Edit.textContent = 'Personnel Class is required..';
        }  else if (EditAddress.value == '') { 
            ErrorMessage_Edit.textContent = 'Visitor address is required..';
        } else if (EditSecurityStaff.value == '') { 
            ErrorMessage_Edit.textContent = 'Security Staff field is required..';
        }  else if (EditWhomToSee.value == '') { 
            ErrorMessage_Edit.textContent = 'Whom to see field is required..';
        }  else if (EditCompanyVisiting.value == '') { 
            ErrorMessage_Edit.textContent = 'Company visiting field is required..';
        }  else if (EditTagNumber.value == '') { 
            ErrorMessage_Edit.textContent = 'Tag number is required..';
        }  else if (EditEntryDate.value == '') { 
            ErrorMessage_Edit.textContent = 'Entry date is required..';
        }  else if (EditEntryTime.value == '') { 
            ErrorMessage_Edit.textContent = 'Entry time is required..';
        }  else if (EditEntrySignature.checked == false) { 
            ErrorMessage_Edit.textContent = 'Visitor entry signature is required..';
        }  else if (EditApprovedBy.value == '') { 
            ErrorMessage_Edit.textContent = 'Approved by field is required..';
        }  else if (EditPhoneNumber.value == '') { 
            ErrorMessage_Edit.textContent = 'Visitor phone number is required..';
        }  else if (EditPurposeOfVisiting.value == '') { 
            ErrorMessage_Edit.textContent = 'Purpose of visiting field is required..';
        }  else {
            EditEntrySubmitButton.textContent = 'Updating..';
            EditEntrySubmitButton.style.background = 'tomato';
            EditEntryForm[0].setAttribute('action', '/Entry/Update/' + EditEntrySubmitButton.nextElementSibling.textContent); 
            EditEntryForm[0].submit();
        }
    }); 
});