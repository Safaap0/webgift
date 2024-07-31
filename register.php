<?php

include 'config.php';

if(isset($_POST['submit'])){

   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); // Consider using `password_hash()` for better security
   $des = mysqli_real_escape_string($conn, $_POST['description']);

   // Check if the email already exists
   $check = mysqli_query($conn, "SELECT * FROM `hack_table` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($check) > 0){
      $message[] = 'Email already exists!';
   }else{
      // Insert new user into the database
      $insert = mysqli_query($conn, "INSERT INTO `hack_table` (firstname, lastname, email, pass, des) VALUES ('$firstname', '$lastname', '$email', '$pass', '$des')") or die('query failed');
      
      if($insert){
         header('Location: hack.php'); // Redirect to login page
         exit(); // Ensure the script stops after redirect
      }else{
         $message[] = 'Registration failed!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safaa's Gift</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #6A0DAD;  /* Purple */
            --secondary-color: #4169E1;  /* Royal Blue */
            --text-color: #333;
            --background-color: #F0F8FF;  /* Alice Blue (light blue) */
            --card-background: #fff;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .page-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .left-sidebar, .right-sidebar, .main-content {
            padding: 1rem;
            background: var(--card-background);
            border-radius: 8px;
            box-shadow: 0 4px 6px var(--shadow-color);
            margin-bottom: 1rem;
        }

        .left-sidebar, .right-sidebar {
            flex: 1;
            min-width: 250px;
        }

        .main-content {
            flex: 2;
            min-width: 300px;
        }

        .logo-box {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-box img {
            width: 80px;
            height: auto;
            margin-bottom: 1rem;
        }

        .logo-box h2 {
            font-size: 2.2em;
            color: var(--text-color);
            margin: 0;
            font-weight: 300;
        }

        .form-container {
            padding: 2.5rem;
            background: var(--card-background);
            border-radius: 8px;
            box-shadow: 0 4px 6px var(--shadow-color);
        }

        .form-container h3 {
            margin-top: 0;
            margin-bottom: 1.5rem;
            color: var(--text-color);
            font-weight: 400;
        }

        .input-group {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .input-group i {
            color: var(--secondary-color);
            font-size: 1.2em;
            margin-right: 10px;
        }

        .input-group input,
        .input-group textarea {
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 0.8rem;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus,
        .input-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .btn {
            background-color: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 0.8rem 1.5rem;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background-color: var(--secondary-color);
        }

        .note-box {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #ecf0f1;
            border-radius: 4px;
            font-size: 0.9em;
            color: #7f8c8d;
        }

        .profile-info {
            text-align: center;
            margin-bottom: 1rem;
        }

        .profile-info img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 1rem;
            object-fit: cover;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: var(--primary-color);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--secondary-color);
        }

        .thank-you-note {
            margin-bottom: 1rem;
        }

        .education-links {
            margin-top: 1rem;
        }

        .education-links a {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9em;
            transition: color 0.3s ease;
        }

        .education-links a:hover {
            color: var(--secondary-color);
        }

        .footer {
            position: fixed;
            bottom: 0;
            right: 0;
            background: var(--card-background);
            padding: 1rem 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px var(--shadow-color);
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9em;
            width: 100%;
        }

        .footer img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .page-wrapper {
                flex-direction: column;
                padding: 1rem;
            }

            .left-sidebar, .right-sidebar, .main-content {
                flex: 1 100%;
                max-width: 100%;
                margin-bottom: 1rem;
            }

            .logo-box h2 {
                font-size: 1.8em;
            }
        }

        @media (max-width: 480px) {
            .logo-box h2 {
                font-size: 1.5em;
            }

            .input-group i {
                font-size: 1em;
            }

            .btn {
                font-size: 0.9em;
                padding: 0.7rem 1.2rem;
            }

            .footer {
                padding: 0.5rem 1rem;
            }

            .footer img {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="left-sidebar">
            <div class="profile-info">
                <img src="images/32.jpg" alt="Safaa">
                <h3>Safaa - صفاء</h3>
                <p>Software IT Professional & Educator</p>
                <div class="social-links">

                <a href="https://t.me/cplusplusbysafaa" target="_blank"><i class="fab fa-telegram"></i> </a>
                <a href="https://www.youtube.com/channel/UCQKu1BRJz5aiXp3Dj4vXhHA" target="_blank"><i class="fab fa-youtube"></i> </a>
                <a href="https://www.instagram.com/safaap0/" target="_blank"><i class="fab fa-instagram"></i> </a>
                <a href="https://www.facebook.com/safaa.the" target="_blank"><i class="fab fa-facebook"></i></a>
            
             
                </div>
            </div>
            <p>Passionate about creating innovative solutions and sharing knowledge with the community.</p>
            <p> 500 الف دينار</p>
            <p> فقط 5 اشخاص سوف يربحون معنا, لا تبجي اذا خسرت</p>


            <p>هدية بسيطة من صفاء لكم, بسرعا قبل ان يربح غيرك و شكرا لكم على دعم</p>
            <p> الرجاء اخذ سكرين اذ ربحت معنا, لا تنسى سكرين اهم شيء</p>


        </div>

        <div class="main-content">
            <div class="logo-box">
                <img src="images/logo.jpg" alt="GIFT logo">
                <h2>Gift from Safaa</h2>
            </div>

            <div class="form-container">
                <h3>Create an Account</h3>
                <form action="" method="post">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="firstname" required placeholder="First Name">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lastname" required placeholder="Last Name">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" required placeholder="Email">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" required placeholder="Password">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-info-circle"></i>
                        <textarea name="description" placeholder="Tell us about yourself"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn" value="Register">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                    <?php if (isset($message) && is_array($message)) {
                        foreach ($message as $msg) {
                            echo "<p>$msg</p>";
                        }
                    } ?>
                </form>
                <div class="note-box">
                    <p><strong>Important:</strong> Make sure your email is correct and your password is secure. Provide a brief description to help us know you better.</p>
                </div>
            </div>
        </div>

        <div class="right-sidebar">
            <div class="thank-you-note">
                <h4>Thank You!</h4>
                <p>We appreciate you using our tools and participating in our educational programs.</p>
            </div>
            <div class="education-links">
                <h4>Learn More</h4>
                <a href="https://t.me/cplusplusbysafaa" target="_blank"><i class="fab fa-telegram"></i> Join our Telegram Channel</a>
                <a href="https://www.youtube.com/channel/UCQKu1BRJz5aiXp3Dj4vXhHA" target="_blank"><i class="fab fa-youtube"></i> Watch Tutorials on YouTube</a>
                <a href="https://www.instagram.com/safaap0/" target="_blank"><i class="fab fa-instagram"></i> Follow us on Instagram</a>
                <a href="https://www.facebook.com/safaa.the" target="_blank"><i class="fab fa-facebook"></i> Like our Facebook Page</a>
            </div>
        </div>
    </div>

    <div class="footer">
        <img src="images/32.jpg" alt="Programmer Safaa">
        <span>Engineered by <a href="https://www.instagram.com/safaap0/" target="_blank">Safaa Systems</a></span>
    </div>
</body>
</html>
