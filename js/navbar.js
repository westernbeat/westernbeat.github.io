let isOpen = false;

const sideNav = document.getElementById("secondaryNav");
const topNav = document.getElementById("primaryNav");

const navBtn = document.getElementById("side-nav-btn");
const navClose = document.getElementById("side-nav-close");

const contactButton0 = document.getElementById("primary-contact-btn");
const contactButton1 = document.getElementById("secondary-contact-btn");

//const contactForm = document.getElementById("contact-form");

/* Set the width of the side navigation to 0 */
function closeNav() {
  sideNav.style.width = "0";
  isOpen = false;
  console.log("Side nav closed");
  return;
}

/* Set the width of the side navigation to 250px */
function openNav() {
  sideNav.style.width = "250px";
  isOpen = true;
  console.log("Side nav open");
  return;
}

/* Operate the menu button based on the isOpen boolean value */
function toggleNav(){
  if (!isOpen){
    openNav();
    return;
  }
  else{
    closeNav();
    return;
  }
}

navBtn.addEventListener('click', function(){
  toggleNav();
  return;
});

navClose.addEventListener('click', function(){
  closeNav();
  return;
});

/*  Close the side nav when the window width is greater than 1070px  */
addEventListener('resize', function(){
  if (window.innerWidth >= 1070) {
    if(isOpen){
      closeNav();
    }
  }
  return;
});


/*  open the contact form  */
/*  primary contact button opens contact form  */
contactButton0.addEventListener('click', function(){
  openForm();
  return;
});

/*  secondary contact button closes the side nave and opens contact form  */
contactButton1.addEventListener('click', function(){
  closeNav();
  openForm();
  return;
});