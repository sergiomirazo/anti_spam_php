<?php
if(isset($_POST['submit'])){
//Email information
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $message = $_POST['message'];
  $finding = $_POST['finding'];
  $services = $_POST['services'];
  $letinblank = $_POST['letinblank'];
  $dontchange = $_POST['dontchange'];
  $destinatary = "your-mail@yourdomain.com";

//validations
  if ($letinblank == '' && $dontchange == 'http://') {
    if(empty($name)){
            echo "<p class='error'> *Name is required </p>";
        } else {
            if(strlen($name) > 30){
                echo "<p class='error'> *Name too long </p>";
            }
        }
        if(empty($email)){
            echo "<p class='error'> *Email is required </p>";
        } else {
            if(strlen($email) > 30){
                echo "<p class='error'> *Email too long </p>";
            }
        }
        if(!empty($cel)){
            if(strlen($phone) > 10){
                echo "<p class='error'> *Phone number too long </p>";
            }
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo " <p class='error'> *Invalid Email </p>";
      } else if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
          echo "<p class='error'> *Name must contain only letters </p>";
      } else {
      //Headers of mail
      $headers = "From: " . $destinatary . "\r\n";
      $headers .= "Reply-To: ". $destinatary . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

      //Body of mail
      $body = "Name: ". $name . ",\r\n";
      $body .= "Email: " . $email . ",\r\n";
      $body .= "Phone: " . $phone . ",\r\n";
      $body .= "City: " . $city . ",\r\n";
      $body .= "Messagee: " . $message . ",\r\n";
      $body .= "Found us: " . $finding . ",\r\n";
      $body .= "Date: " . date('d/m/Y', time());
      $affair = "Information for the service: " . $services;

      mail($destinatary, $affair, $body, $headers);
      mail($email, $affair, $body, $headers);
      header('Location:https://yourdomain.com/success/index.html',TRUE,301);

      exit;
      }
  } else {
    exit;
  }
}
?>
