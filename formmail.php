<?php 

//$name = $_POST['name'];
//$subject = $_POST['subject'];
//$email = $_POST['email'];
//$message = $_POST['message'];
//$formcontent=" Van: $name \n Onderwerp: $subject \n Bericht: $message";
//$recipient = "info@thepartylover.nl";
//$subject = "Contact formulier";
//$mailheader = "From: $email \r\n";
//
//
//
//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailErr = "Invalid email format";}
//
//mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
//echo "Thank You!" . " -" . "<a href='index.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";


// Check if form was submitted:
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}

if (!$captcha) {
    //Do something with error
} else {
    $secret   = '6LdYGfoUAAAAAB-RsbZQptqxuOypF9bxjp6celd1';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    // use json_decode to extract json response
    $response = json_decode($response);

    if ($response->success === false) {
        //Do something with error
    }
}

//... The Captcha is valid you can continue with the rest of your code
//... Add code to filter access using $response . score
if ($response->success==true && $response->score <= 0.5) {
    //Do something to denied access
	
} else {
	
$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent=" Van: $name \n Onderwerp: $subject \n Bericht: $message";
$recipient = "info@thepartylover.nl";
$subject = "Contact formulier";
$mailheader = "From: $email \r\n";



if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailErr = "Invalid email format";}

mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo '<script language="javascript">';
echo 'alert("Bedankt voor uw bericht. Uw bericht is succesvol verzonden. Wij nemen zo spoedig mogelijk contact met u op.");';
echo 'window.location.href="index.html";';
//echo header('Location: index.html');
echo '</script>'; 
exit;
	
}
?>