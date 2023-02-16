<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load composer's autoloader
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMAil($to, $subject, $content){
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->SMTPDebug = false;
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = '';                  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '';                // SMTP username
                $mail->Password = '';   // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable SSL encryption, TLS also accepted with port 587
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('tony@antiax.org', 'Tony Acosta');
                $mail->addAddress($to);     // Add a recipient
                //$mail->addAddress('contact@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                //$mail->isHTML(true);                                  // Set email format to HTML
                $mail->ContentType = 'text/plain'; 
                $mail->IsHTML(false);
                $mail->Subject = $subject;
                $mail->Body    = $content;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                //$mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
    }
?>