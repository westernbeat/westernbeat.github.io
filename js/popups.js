

let isMsgPromp = false;

function openForm(){
    contactForm.style.display = 'block';    
    doc.classList.add("no-scroll");
    console.log("contact form opened");
    return;
}

function closeForm(){
    contactForm.style.display = 'none';
    doc.classList.remove("no-scroll");
    console.log("Contact form closed");
    return;
}

function msgPrompt(){
    if(!isMsgPromp){
        confirmClose.style.display = 'block';
        isMsgPromp = true;
        return;
    }
    else{
        confirmClose.style.display = 'none';
        isMsgPromp = false;
        return;
    }
}

confirm.addEventListener('click', function(){
    closeForm();
    msgPrompt();
    return;
});

cancel.addEventListener('click', function(){
    msgPrompt();
    openForm();
    return;
});

closeButton.addEventListener('click', function(){
    msgPrompt();    
});

/* Check the validity of form fields */

function defaultState(field){
    
    field.value="";
    field.style.borderColor = "#48494B";
    field.style.backgroundColor = "#48494B";
    
    if(field.required){
        field.placeholder = `${field.name} (required)`;
        return;
    }
    else{
        field.placeholder = `${field.name}`;
        return;
    }    
}

function invalid(field, message){
    if(field.required){
        field.value = "";
        contactValidity();
        field.style.borderColor = red;
        field.style.backgroundColor = red;
        field.placeholder = `${field.name} ${message}`;
        return;
    }
    else{
        field.value="";
        field.style.borderColor = "none";
        field.style.backgroundColor = "#48494B";
        field.placeholder = `${field.name} ${message}`;
        return;
    }
}

function toggleSubmit(){
    console.log("toggleSubmit()");
    if(isFormValid){
        submitButton.disabled = false;
        return;
    }
    else{
        submitButton.disabled = true;
        return;
    }
}

function setIsValid(field, isValid){
    
    if(field == givenName){
        isNameValid = isValid;   
    }
    if(field == surname){
        isSurnameValid = isValid;        
    }
    if(field == nickname){
        isNicknameValid = isValid;       
    }
    if(field == email){
        isEmailValid = isValid;      
    }
    if(field == phone){
        isPhoneValid = isValid;         
    }
    if(field == description){
        isEnquiryValid = isValid;        
    }
    if(isNameValid && isSurnameValid && isNicknameValid && isEmailValid && isPhoneValid && isEnquiryValid){
        isFormValid = true;       
    }
    else{
        isFormValid = false;
        return;
    }
    return;

}

function valid(field){
    contactValidity();
    field.style.borderColor = "#ffe135";
    field.style.backgroundColor = "#ffe135";
    field.placeholder = `${field.name} (required)`;
    setIsValid(field, true);
}

function validateField(field){
    field.value = field.value.trim();
    if(field.value.length === 0){
        if(field.required){
            invalid(field, "must not be empty!");
            return false;
        }
    }
    else{
        fieldValidity(field);
    }
}

function fieldValidity(field){
    
    if(field.classList.contains("name")){
        if(/^[a-zA-Z- ]+$/.test(field.value)){
            field.value = field.value[0].toUpperCase() + field.value.substring(1, field.value.length).toLowerCase();
            formatHyphen(field);
            valid(field);
            console.log(field.value);
            return;
        }
        else{
            invalid(field, "must only contain letters!")
            return;
        }
    }

    if(field.classList.contains("phone")){
        if(/^\d+$/.test(field.value)){
            if(/04|03/.test(field.value)){
                if(field.value.length === 10){
                    valid(field);
                    return;
                }
                else{
                    invalid(field, "must be 10 digits in length!")
                }
            }
            else{
                invalid(field, "must begin with 03 or 04!");
                return;
            }
        }
        else{
            invalid(field, "must only contain numbers!");
            return;
        }
    }

    if(field.classList.contains("email")){
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(field.value)){
            if(field.value.length > 6){
                field.value = field.value.toLowerCase();
                valid(field);
                return;
            }
            else{
                invalid(field, "is too short!")
            } 
        }
        else{
            invalid(field, "is not valid!");
            return;
        }
    }

    if(field.classList.contains("description")){
        if(field.value.length > 10){
            valid(field);
            return;
        }
        else{
            invalid(field, "must be more than 10 characters!");
            return;
        }
    }
    return;
}

function formatHyphen(field){
    
    field.value = field.value.replace(/(^|[\s-])\S/g, function(match){
    return match.toUpperCase()
  });
}

function formatEmail(input){
    input = input.trim();
    input = input.toLowerCase();
    return input;
}

function formatPhone(input){
    input = input.trim();
    return input;
}

document.getElementById('secondary-contact-btn').addEventListener('click', function(){
    givenName.focus();
});

givenName.addEventListener('focusout', function(){
    validateField(givenName);
    toggleSubmit();
});

surname.addEventListener('focusout', function(){
    validateField(surname);
    visitor.surname.value = surname.value;
    surname.value = visitor.surname.value;
    toggleSubmit();
});

nickname.addEventListener('focusout', function(){
    validateField(nickname);
    visitor.nickname.value = nickname.value;
    nickname.value = visitor.nickname.value;
    toggleSubmit();
});

email.addEventListener('focusout', function(){
    validateField(email);
    visitor.email.value = email.value;
    email.value = visitor.email.value;
    toggleSubmit();
});

phone.addEventListener('focusout', function(){
    validateField(phone);
    visitor.phone.value = phone.value;
    phone.value = visitor.phone.value;
    toggleSubmit();
});

description.addEventListener('focusout', function(){
    validateField(description);
    visitor.description.value = description.value;
    description.value = visitor.description.value;
    toggleSubmit();
});

function contactValidity(){
    if(isNameValid && isSurnameValid && isEmailValid && isPhoneValid && isEnquiryValid){
        submitButton.disabled = false;
        return;
    }
    else{
        submitButton.disabled = true;
        return ;
    }
}



givenName.addEventListener('focusin', function(){
    givenName.value = visitor.givenName.value;
    return;
});

