const socialMedia = document.getElementsByClassName('fa');
const textAllowed = /^[A-Za-z]+$/;

const contactForm = document.getElementById("contact-form");
const closeButton = document.getElementById('contact-form-close');
const confirmClose = document.getElementById('msg-prompt');
const doc = document.getElementById('html');
const cancel = document.getElementById('cancel-btn');
const confirm = document.getElementById('confirm-btn');
const submitButton = document.getElementById('submit');

var element = document.activeElement.id;
let givenName = document.getElementById('givenName');
let surname = document.getElementById('surname');
let nickname = document.getElementById('nickname');
let email = document.getElementById('email');
let phone = document.getElementById('phone');
let description = document.getElementById('description');

const visitor = { givenName, surname, nickname, email, phone, description};

let isNameValid = false;
let isSurnameValid = false;
let isNicknameValid = true;
let isEmailValid = false;
let isPhoneValid = false;
let isEnquiryValid = false;

let isFormValid = false;

const green = '#4CAF50';
const red = '#F44366';

socialMedia.addEventlistener('onload', function(){
    if(socialMedia.href == ""){
        socialMedia.display = 'none';
    }
    else{
        socialMedia.display = 'flex';
    }
});