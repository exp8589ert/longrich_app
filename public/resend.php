<?php 
require 'includes/check.php';

$_SESSION['errmessage'] = "<div class='error_msg'>You must be logged in before you can resend an email confirmation link. Please login to your account using your already registered details or <a href='signup'>Register</a> a new account. <br /><br />If you wish to retrieve your user account information, please click on forgot <a href='femail.php'>email address</a><br />or <a href='fpass.php'>password</a> on <a href='login'>log In</a> page or See <a href='help.php'>FAQ</a> on how do I retrieve my email and/or password?</span></div>";

if (isset($_COOKIE['c_user'])) {
    $sessionData = $showDATA->getSessionData($_COOKIE['c_user']);

if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
    $userid = $_SESSION['userid'];
    $email = $_SESSION['email'];
    $userCred = $showDATA->acc_prof_ref_Table($email);
    $fmName = $userCred['family_name'][0];
    $usergenCode = $userCred['user_code'];
    $hash = $userCred['hash'];
    $newSessId = $sessionData['session_id'];
    $loggedIn = $sessionData['session_token'];
    $loggedBool = $_SESSION['logged_in_token'];
    $newCookie = $_SESSION['new_sess_cookie'];

if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
    header('location: error');
} 
else {
     if(!empty($_GET['resendSet']) || $_GET['resendSet'] == 's9id5f7bvu') {

        include 'includes/phpmailer.inc.php';   
        $mail->From = 'no-reply noreply@longrichs.com';
        $mail->SetFrom('noreply@longrichs.com', 'Longrich Gtriune');
        $mail->AddReplyTo("noreply@longrichs.com", "Longrich Gtriune"); 
        $mail->Subject = 'Longrich Gtriune Account Verification';
        $mail->Body = '<html><head><title>User email verification</title>
        <style>
            #mail-body {
                width: 100%; 
                height: 50em;
                background: #ebebef; 
                padding: 2em 0 5em;
                
                font-family:"Roboto", sans-serif;
            }
            #mail-body > p {
                font-size: 1em; 
                text-align: left;
            }
            #mail-body .section {
                margin-left: auto;
                margin-right: auto;
                width: 52%;
                height: 43em;
                padding: 1em 2.3em;
                background: #fff;
                border-radius: 2px;
                font-size: 1.05em;
            }
            #mail-body .section > div.intro {
                font-size: 1.3em;
                color: #38393c;
                padding: 0.3em 0;
            }
        </style>
        </head>
        <body id="mail-body">
            <div class="section">
                <div class="intro">
                    <label>Longrich Gtruine</label>
                </div><br />
                <p>Hi '.$fmName.',<br /></p>
                    <span> 
                This is your confirmation link as you have requested. Please click on the link to confirm your email address</span>

                <a href="https://longrichs.com/verify.php?crypt='.$usergenCode.'&hash='.$hash.'">

                Confirm your email address</a> <br /><br />or copy and paste the link below in your browser address bar: <br />https://longrichs.com/verify.php?crypt='.$usergenCode.'&hash='.$hash.'<br /><br /> Please note that this is an auto generated email, so do NOT send messages to this email, it will not be replied. <br /><br /> 
                Kind regards, <br />
                Longrich Gtriune.

                <br /><br /><br />Please do not reply to this email (noreply@longrichs.com). <br />If you have questions about Longrich Gtriune, send us a message with your inquiry via live chat on our website or visit our frequently asked questions page <a href="https://longrichs.com/help.php">FAQ </a> for more information.
            </div></body></html>';
    
            $mail->addAddress($email);
            if(!$mail->send()) {
                $_SESSION['resentMsg'] = '<span class="resent_success">Message could not be sent to the email address you provided. Your network may be slow. Please try again.</span>';
            } 
            else {
            $_SESSION['resentMsg'] = '<span class="resent_success">A confirmation link has been resent to your email. Please check your email.</span>';
            header('location: '.'profile?_r='.$usergenCode.strtolower($_SESSION['FamilyName']). '.' .strtolower($_SESSION['FirstName']).'?_y='.$_SESSION['roChar'].'&'.$Fuserid.'&'.$_SESSION['rThrChar'].'');
            }
        }

        }
    } 
    else {
        header('location: error');
    }
} 
else {
    header('location: error');
}

?>