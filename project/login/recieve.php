<?php
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_NAME', 'project');
                
                /* Attempt to connect to MySQL database */
                $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                
                // Check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                
                if(isset($_POST["login"])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    
                    $sql = "SELECT * FROM examers WHERE email = '$email'";
                    $result = mysqli_query($link, $sql);
                    if($result){
                        $examer = mysqli_fetch_assoc($result);
                        if($examer){
                            if(password_verify($password, $examer["pass"])){
                                header("Location: http://localhost/project/main.html");
                                exit();
                            } else {
                                echo "<div class='alert alert-danger'>Password does not match</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Email does not match</div>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($link);
                    }
                }
?>