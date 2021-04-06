<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$gender = $username = $drink= $phone = $botellon = "";
$gender_err = $username_err = $age_err = $drink_err=$phone_err= $botellon_err="";
 $age=0;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["name"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_mail);
            
            // Set parameters
            $param_username = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone number.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE phone = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);

            // Set parameters
            $param_phone = trim($_POST["phone"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $phone = trim($_POST["phone"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter your age.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE age = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_age);

            // Set parameters
            $param_age = trim($_POST["age"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $age = trim($_POST["age"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["gender"]))){
        $age_err = "Please enter your age.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE gender = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_gender);

            // Set parameters
            $param_gender= trim($_POST["gender"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $gender = trim($_POST["gender"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter your age.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE age = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_age);

            // Set parameters
            $param_age = trim($_POST["age"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $age = trim($_POST["age"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["drink"]))){
        $drink_err = "Please enter your age.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE age = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_drink);

            // Set parameters
            $param_drink = trim($_POST["drink"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $drink = trim($_POST["drink"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_SERVER["botellon"]))){
        $botellon_err = "Please enter your age.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE botellon = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_age);

            // Set parameters
            $param_age = trim($_SERVER["botellon"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $botellon = trim($_SERVER["botellon"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone number.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE phone = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);

            // Set parameters
            $param_phone = trim($_POST["phone"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                $phone = trim($_POST["phone"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Check input errors before inserting in database
    if(empty($gender_err) && empty($username_err) && empty($age_err) && empty($drink_err) && empty($phone_err) && empty($botellon_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (gender, username ,drink ,phone ,botellon ) VALUES (?, ?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username,
            $param_age,
            $param_drink,
            $param_botellon ,
            $param_gender
        );
            
            // Set parameters
            $param_username = $username;
            $param_age= $age;
            $param_drink= $drink;
            $param_botellon = $botellon;
            $param_gender = $gender;

           // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: feste.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 