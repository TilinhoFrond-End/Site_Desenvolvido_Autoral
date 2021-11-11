<?php

    require_once('vendor/autoload.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $name     =   $_POST['name'];  
    $email    =   $_POST['email'];
    $subject  =   $_POST['subject'];
    $message  =   $_POST['message'];
    
    $mail = new PHPMailer(true);
    //true é para habilitar o disparo Exception
    
    try{
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'aadejarde15@gmail.com';
      $mail->Password = 'eutnqtdqrsutxzil';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
    
      //Remetente
      $mail->setFrom($email, $name);
      $mail->addReplyTo($email,$name);
    
      //Destinatário
      $mail->addAddress('artillishenrique3@gmail.com', 'DGMOG');
    
      //Configs do Email
      $mail->isHTML(true);
      $mail->Subject = utf8_decode($subject);
      $mail->Body = utf8_decode($message . "<br /><br /><strong>Enviado via PHPMailer.</strong>"
      );
    
      //ENVIA o email
      $mail->send();
      echo 'Email enviado!!!!';
    
    }
    catch(Exception $e){
      echo 'Erro ao enviar: ' . $e->getMessage();
    }


?>