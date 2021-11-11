
<?php

if($_SERVER['REQUEST_METHOD'] =='POST'){

    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

   

    $formError = array();

    if(strlen($user) <= 3){
      $formError[] = 'Username Must Be Larger Than <strong>3</strong> Charecters';
    }
    if(strlen($msg) < 10){
        $formError[] = 'Messgae Must Be Larger Than <strong>10</strong> Charecters ';
    }

    if( empty ($formError)){

        $myEmail ='emo.emo123@hotmail.com';
        $subject = 'Form-Contact';
        $headers = 'From : ' . $email . 'r/n/';

        mail($myEmail , $subject , $msg , $headers);

        $user = '';
        $email = '';
        $phone = '';
        $msg = '';

     $success = '<div class="alert alert-success alert-dismissible ">We Received Your <strong>Message</strong> </div>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Contact Form </title>
    
</head>
<body class='body'>

<div class="container">
    <form action="" class="form" action='<?php echo $_SERVER['PHP_SELF']  ?>' method='POST'>
    
        <h1 class='text-center text-danger'>Contact </h1>
        <?php if (! empty ($formError)) { ?>
            <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>  
         
            <?php
            foreach ($formError as $error){
                echo $error . '</br>';
                }
            
                ?>
                </div>
                <?php } ?>

                <?php if (isset($success)) { echo $success; } ?>

        
        <div class="form-group">
      
            <input  class='username form-control' type="text" placeholder='Type Your Name ' name='username' autocomplete="off" value='<?php if(isset($user)){ echo $user;} ?>'>
            <i class='fa fa-user fa-fw'></i>
            <span class='star'>*</span>
            <div class="alert alert-danger custom-alert" role="alert"> 
                Username Must Be Larger Than <strong>3</strong> Charecters
        </div>
        </div>
       
        
        <div class="form-group">

            <input class='email form-control' type="email" placeholder='Type Your Email ' name='email' autocomplete="off" value='<?php if(isset($email)){ echo $email;} ?>'>
            <i class='fa fa-envelope fa-fw'></i>
            <span class='star'>*</span>
            <div class="alert alert-danger custom-alert" role="alert">Email Cannot Be Empty</div>

        </div>


        <div class="form-group">
            <input  class='phone form-control' type="text" placeholder='Type Your Cell Phone ' name='phone' autocomplete="off" value='<?php if(isset($phone)){ echo $phone;} ?>'>
            <i class='fa fa-phone fa-fw'></i>
        </div>

        
        <div class=" form-group textarea" >

            <textarea class='msg form-control' placeholder='Your Message ! ' name='message' autocomplete="off" value='<?php if(isset($msg)){ echo $message;} ?>'></textarea>
             <i class='fa fa-comment fa-fw'></i>
            <span class='star'>*</span>
            <div class="alert alert-danger custom-alert" role="alert"> Messgae Must Be Larger Than <strong>10</strong> Charecters</div>

        </div>


 
        <input class='  btn btn-danger text-light' type="submit" value='Send Message'>
        <i class='fa fa-send fa-fw send'></i>

     
       
       
    </form>
</div>



<script src='js/jquery-3.5.1.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/main.js'></script>

</body>
</html>