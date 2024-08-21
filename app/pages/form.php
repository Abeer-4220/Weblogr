<head>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .list {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
        }

        .dec {
            /* text-decoration: none; */
            color: #dee2e6;
        }

        .dec:hover {
            color: black;
        }
        .box{
            background-color: #0d6efd;
            border-radius: 10% 3% 10% 3%;

        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Get in touch</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <!-- <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div> -->
                                <form id="contact-form" name="contact-form" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center-on-small-only">
                                                <input id="btn" class="btn btn-primary" type="submit" name="send" value="Send">
                                            </div>
                                            <div class="status" id="status"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch text-center mt-3 ">
                            <div class="info-wrap w-100 p-lg-5 p-4 box">
                                <ul class="contact-icons list text-center">
                                    <h3 class="mb-4 mt-md-4 text-center">Contact us</h3>
                                    <li><i class="fa fa-map-marker fa-2x"></i>
                                        <p>Karachi-75160, Pakistan</p>
                                    </li>

                                    <li><i class="fa fa-phone fa-2x"></i>
                                        <p>+92 314 292 2161</p>
                                    </li>

                                    <li><i class="fa fa-envelope fa-2x"></i>
                                        <p>muhammadabeeransari@gmail.com<br>bc190409614@vu.edu.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
  
    $mail = new PHPMailer(true);
  
    try{
    
    $mail->IsSMTP();
    $mail->Host       = "smtp.gmail.com";
    $mail->SMTPAuth   = TRUE;
    $mail->Username   = "muhammadabeeransari@gmail.com";
    $mail->Password   = "fxetuisahezfxrgm";
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
  
  
    $mail->IsHTML(true);
    $mail->SetFrom($email, "Message from Weblogr");
    $mail->AddAddress("muhammadabeeransari@gmail.com", "Admin-Weblogr");
    $mail->Subject = "Contact-Form Message";
    $mail->Body = "Name: <strong>$name</strong> <br>Email: <strong>$email</strong><br>Subject: <strong>$subject</strong><br><strong>Message:</strong><br>$message";
  
    $mail->send();
    
    echo'Your message was delivered';
    }catch (Exception $e){
      echo"Message could not be send. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <script type="text/javascript" src="contact/js/popper.min.js"></script>
    <script type="text/javascript" src="contact/js/bootstrap.js"></script>
    <script type="text/javascript" src="cpntact/js/mdb.js"></script>
    
</body>

</html>