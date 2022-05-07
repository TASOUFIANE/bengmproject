<?php
 if(($_SERVER['REQUEST_METHOD']=='POST')){
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));
if(empty($name) || empty($message) || empty($m_subject) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}
$to = "taatallaest@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(mail($to, $subject, $body, $header)){
      $url=$_SERVER['HTTP_REFERER'];?>
         <html lang="ar">
                  <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title></title>
                    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
                    <style>
                      @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
                      @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
                    </style>
                    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
                    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
                    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
                  </head>
                  <body>
                    <header class="site-header" id="header">
                      <h1 class="site-header__title" data-lead-id="site-header-title">شكرا على تواصلك معنا</h1>
                    </header>

                    <div class="main-content">
                      <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
                      <p class="main-content__body" data-lead-id="main-content-body">شكرا جزيلا لملء ذلك. هذا يعني الكثير بالنسبة لنا ، مثلك تمامًا! نحن نقدر حقًا منحنا لحظة من وقتك اليوم. شكرا لكونك نفسك.</p>
                    </div>

                    <footer class="site-footer" id="footer">
                      <p class="site-footer__fineprint" id="fineprint">Copyright ©2014 | All Rights Reserved</p>
                    </footer>
                  </body>
          </html>
    <?php  header("refresh:4;$url");}
else
  http_response_code(500);}
?>
