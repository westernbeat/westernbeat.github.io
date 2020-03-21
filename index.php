
<?php

$public_key = "6LfSNtQUAAAAAF4EnRC3Q4PfXrO_wWiNz4gOcSfZ";
$private_key = "6LfSNtQUAAAAAIC1ZY7hMc0njq6lCB_OtmeAWRbX";
$url = "https://www.google.com/recaptcha/api/siteverify";

if(array_key_exists('submit_form',$_POST)){
  //echo "<pre>";print_r($_POST);echo "</pre>";

  $response_key = $_POST['g-recaptcha-response'];
  $response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
  $response = json_decode($response);
  
  //echo "<pre>";print_r($response);echo "</pre>";
  
  if($response->success === true){
      
        if(isset($_POST['submit_form'])){
            $firstName = $_POST['Name'];
            $surname = $_POST['Surname'];
            $fullName = $firstName . " " . $surname;
            $nickname = $_POST['Preferred'];
            
            if($nickname == ""){
                $nickname = $firstName;
            }
            
            $senderEmail = $_POST['Email'];
            $senderPhone = $_POST['Number'];
            $txt = $_POST['Description'];

            $mailTo = "info@wallanplaster.com.au";
            $smsTo = "+61402825140@sms.utbox.net";
            $headers = "From: ".$senderEmail;
            $subject = "You have recieved a new enquiry from ".$fullName.".\n\n".$message;
            
            $smsNumber = $senderPhone;
            $smsNumber = substr_replace($smsNumber, "+61", 0,1);
            $smsMail = $smsNumber . "@sms.utbox.net";
            $confirmationTxt = "Dear " . $nickname . ", " . "\n\n" . 
            "Thank you for your enquiry today." . "\n" .
            "We will be in touch with you as soon as possible on " . $senderPhone . " to discuss your plastering needs." . " \n\n" . 
            "Kind regards," . "\n" . 
            "Wallan Plaster."; 
            
            $confirmationHeader =  "From: enquiries@wallanplaster.com.au";
            $confirmationSubject = "Thanks for your enquiry, " . $nickname . "!";
            $message = $subject . 
          $txt . "\n\n" .
            'Preferred Name : ' . $nickname     . "\n" .
            '  Phone Number : ' . $senderPhone  . "\n" .
            ' Email Address : ' . $senderEmail;
            
            
            
            mail($mailTo, $subject, $message, $headers);
            mail($senderEmail, $confirmationSubject, $confirmationTxt, $confirmationHeader);
            mail($smsMail, $confirmationSubject, $confirmationTxt, $confirmationHeader);
            mail($smsTo, $subject, $message, $confirmationHeader);
            echo "<script type='text/javascript'>alert('Thank you for your enquiry. you will recieve a call shortly');</script>";
            //header("Location: index.php?mailsend");
            //header("Location: mailsend.html?mailsend");   
        }
        
  }
  else{
    echo "<script type='text/javascript'>alert('An un-known error occured, Please try again');</script>";			
  }
}
?>

<!DOCTYPE html>
<html id = "html">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>WALLAN PLASTER</title>
        <link rel="shortcut icon" type="image.png" href='images/logosquare.png'>
        <link rel="stylesheet" href='css/styles.css'>
    </head>

    <body id = "body">

		<div class="facebook" id="fb-root"></div>
        <script>
        window.fbAsyncInit = function() {
        FB.init({
        xfbml            : true,
        version          : 'v6.0'
      });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    
    <div class="fb-customerchat"
    attribution=setup_tool
    page_id="1552490468110066"
    theme_color="#0088A9">
    </div>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src='https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=2558350947819825&autoLogAppEvents=1'></script>


        <div class="container">
        
<!--Start of side nav-->
          <div id="secondaryNav" class="sidenav">

            <div class="sidenavHead">
              <div class="">
                <a id="side-nav-close" href="javascript:void(0)" class="closebtn" title="Close">&times;</a>
              </div>
              <div class="">
                <hr>
              </div>
            </div>
            <div class="sidenavBody">
              <div class="">
                <nav>
                  <ul>
                      <li><a class="nav-Link active" href="/">Home</a></li>
                      <li><a class="nav-Link" href="/">About</a></li>
                      <li><a class="nav-Link" href="/">Services</a></li>
                      <li><a class="nav-Link" href="/">Reviews</a></li>
                      <li><a class="nav-Link" href="/">FAQ</a></li>
                      <li><a class="nav-Link" href="/">Blog</a></li>
                  </ul>
              </nav>
                <hr>
                <a><button id="secondary-contact-btn" class="contact-button" >Contact</button></a>
              </div>
            </div>

            <div class="sidenavFoot">

              <div class="center">

              </div>
            </div>
          </div>
<!--End of side Nav-->

            <div class="header-img-wrapper">
                <div class="header-img">
                   <!-- <img src="/images/logorec.png" alt="">  -->
                   <div class="logo-wrapper" style="width: 100vw; height: 100vh; display:flex; justify-content: center;
                   align-items: center;">
                       <a style="width: 100%; height: auto;
                       font-size: 8vw; text-align: center;"><strong class="wallan">Wallan</strong><strong class="plaster"><strong></strong>plaster</strong></a>
                   </div>
                    
                </div>
            </div>
            <div class="nav-bar-wrapper">
                <div class="logo-wrapper">
                    <a href="/"><strong class="wallan">Wallan</strong><strong class="plaster">plaster</strong></a>
                </div>
                <div class="drop-menu-wrapper">
                  <button id="side-nav-btn" title="navigate" type="button" name="menu">&#9776;</button>
                </div>

                <div id="primary-Nav" class="nav-wrapper">
                    <nav>
                        <ul>
                            <li><a class="nav-Link active" href="/">Home</a></li>
                            <li><a class="nav-Link" href="/">About</a></li>
                            <li><a class="nav-Link" href="/">Services</a></li>
                            <li><a class="nav-Link" href="/">Reviews</a></li>
                            <li><a class="nav-Link" href="/">FAQ</a></li>
                            <li><a class="nav-Link" href="/">Blog</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="contact-wrapper">
                    <button id="primary-contact-btn" class="contact-button">Contact</button>
                </div>
            </div>
            <div class="main-content-wrapper">
                <h1>Site comming soon!</h1>
            </div>
            <div class="footer-content-wrapper">
                <div class="footer-content-top">
                    <hr>
                </div>
                <div class="footer-content-main">
                </div>
                <div class="footer-content-btm">
                    <hr>
                    <div class="footer-content-btm-wrapper">
                      <div class="logo-wrapper">
                        <a href="/"><strong class="wallan">Wallan</strong><strong class="plaster"><strong></strong>plaster</strong>&copy;</a>
                      </div>
                      <div class="social-media-icon-wrapper">
                          <a id="fa-facebook" href="https://www.facebook.com/realwallanplaster" class="fa fa-facebook"></a>
                          <a id="fa-twitter" href="" class="fa fa-twitter"></a>
                          <a id="fa-linkedin" href="" class="fa fa-linkedin"></a>
                          <a id="fa-github" href="https://github.com/westernbeat" class="fa fa-github"></a>
                          <a id="fa-youtube" href="" class="fa fa-youtube"></a>
                      </div>
                      
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div id="contact-form" class="modal">
                <form id="enquiryForm" name="enquiryForm" class="contactForm modal-content animateIn" action="" onsubmit="return formValidation()" method="post">
                  <div class="close" >
                    <a id='contact-form-close' title="Close">&times;</a>
                  </div>
                    <h1 class='formHeading'>Please fill in the contact form</h1>
                  <div class="">
                    <input class="name" type="text" id="givenName" name="Name" placeholder="First name (required)" required maxlength="30">
                  </div>
                  <div id="form-fields">
                    <div>
                      <input  class="name" type="text" id="surname" name="Surname" placeholder="Surname (required)" required maxlength="30">
                    </div>
                    <div>
                      <input  class="name" type="text" id="nickname" name="Preferred" placeholder="Preferred name" maxlength="30">
                    </div>
                    <div>
                      <input  class="email" type="email" id="email" name="Email" placeholder="Email address (required)" required minlength="6">
                    </div>
                    <div>
                      <input  class="phone" type="tel" id="phone" name="Number" placeholder="Phone number (required)" required maxlength="10">
                    </div>
                    <div>
                      <textarea  class="description" id="description" name="Description" placeholder="Please leave a brief description about your enquiry (required max 255 charachters)" style="height:100px" required minlength="10" maxlength="200"></textarea>
                    </div>
                    <div class="g-recaptcha-wrapper">
                      <div class="g-recaptcha" data-sitekey='<?php print $public_key; ?>'></div>
                    </div>
                    <div style="height: 46px;">
                      <input id="submit" type="submit" name="submit_form" value="Submit">
                    </div>
                  </div>

                  <div id="msg-prompt" class="modal">
                    <div class="msg-modal modal-content animateIn">
                      <div class="msg-wrapper">
                        <h4>To cancel this enquiry</br>Select confirm</h4>
                      </div>
                      <div class="btn-wrapper">
                        <div>
                          <button id="confirm-btn" class="button">Confirm</button>
                        </div>
                        <div>
                          <button id="cancel-btn" class="button">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>


                </form>
                  <script src='https://www.google.com/recaptcha/api.js'></script>
              </div>

              

              <script src='js/navbar.js'></script>
              <script src='js/master.js'></script>
              <script src='js/popups.js'></script>
    </body>
    
</html>
