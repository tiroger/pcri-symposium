
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
// $subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
exit();
}
}
// if ($subject === ''){
// print json_encode(array('message' => 'Subject cannot be empty', 'code' => 0));
// exit();
// }
if ($message === ''){
print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "rogerlefort@icloud.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
exit();
?>



// $errorMSG = "";

// // NAME
// if (empty($_POST["name"])) {
//     $errorMSG = "Name is required ";
// } else {
//     $name = $_POST["name"];
// }

// // EMAIL
// if (empty($_POST["email"])) {
//     $errorMSG .= "Email is required ";
// } else {
//     $email = $_POST["email"];
// }

// // MESSAGE
// if (empty($_POST["message"])) {
//     $errorMSG .= "Message is required ";
// } else {
//     $message = $_POST["message"];
// }


// $EmailTo = "rogerlefort@icloud.com";
// $Subject = "New Message Received";

// // prepare email body text
// $Body = "";
// $Body .= "Name: ";
// $Body .= $name;
// $Body .= "\n";
// $Body .= "Email: ";
// $Body .= $email;
// $Body .= "\n";
// $Body .= "Message: ";
// $Body .= $message;
// $Body .= "\n";

// // send email
// $success = mail($EmailTo, $Subject, $Body, "From:".$email);

// // redirect to success page
// if ($success && $errorMSG == ""){
//    echo "success";
// }else{
//     if($errorMSG == ""){
//         echo "Something went wrong :(";
//     } else {
//         echo $errorMSG;
//     }
// }
