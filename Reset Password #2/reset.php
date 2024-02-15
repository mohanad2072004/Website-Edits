<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href = "style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class = "wrapper">
            <div class = "container">
                <div class="title-section">
                    <h2 class = "title">Reset Password</h2>
                     <p class="para">Please confirm your email by clicking on the link sent to your inbox before your account creation process is completed. Once verified, a new password will be generated for you.</p>
                </div>
                <form action = "sent-password-reset.php" class = "from" method = "post">
                    <div class="input-group">
                        <label for="" class="label-title">Enter your Email</label>
                        <input type = "email" name = "email" placeholder = "Enter your Email">
                    </div>

                    <div class="input-group">
                        <button class = "submit-btn" type = "submit">Send Reset Email</button>

                    </div>
                </form>

            </div>
        </div>
    </body>
</html> 


