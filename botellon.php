<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$party = $address = $name = $mail =  "";
$people=0;
$party_err = $people_err = $address_err =$name_err=$mail_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["party"]))){
        $party_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE party = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_party);

            // Set parameters
            $param_party = trim($_POST["party"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $party_err = "This party name is already taken.";
                } else{
                    $party = trim($_POST["mail"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["max"]))){
        $people_err = "Please enter the max number of people that you want to invite.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE people = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_people);

            // Set parameters
            $param_people = trim($_POST["max"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $people_err = "This party name is already taken.";
                } else{
                    $people = trim($_POST["max"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter a address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE address = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_address);

            // Set parameters
            $param_address= trim($_POST["address"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $address_err = "A party with this address already exist.";
                } else{
                    $address = trim($_POST["address"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate peoples
    if(empty(trim($_POST["name"]))){
        $name_err_err = "Please enter your name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);

            // Set parameters
            $param_name = trim($_POST["name"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                    $name = trim($_POST["name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
if(empty(trim($_POST["mail"]))){
        $mail_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM botellon WHERE mail = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_mail);

            // Set parameters
            $param_mail = trim($_POST["mail"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                    $mail = trim($_POST["mail"]);
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
    if(empty($party_err) && empty($max_err) && empty($address_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO botellon (party, people,address,name,mail,phone) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_party, $param_address,$param_people,$param_mail,$param_phone,$param_name);
            
            // Set parameters
            $param_party = $party;
            $param_address= $address;
            $param_people= $people;
            $param_mail = $mail;
            $param_phone = $phone;
            $param_name=$name;
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

?>
 