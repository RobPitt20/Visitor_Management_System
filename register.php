<?php
include 'db.php';
session_start(); // Start session

// Include the PHP mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['register'])) {
    if (!isset($_POST['privacyAct'])) {
        echo '<script>alert("You must accept the Privacy Act to register.");</script>';
    } else {
        $email = $_POST['email'];

        $sql_stat = "SELECT email FROM register WHERE email = ?";
        $stmt = $db->prepare($sql_stat);
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            // Insertion successful
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script language="javascript">
                alert("Email already exists");
               </script>';
        } else {
            $first_name = $_POST['firstName'];
            $middle_name = $_POST['middleName'];
            $last_name = $_POST['lastName'];
            $email = $_POST['email'];
            $contact_number = $_POST['contactNumber'];
            $address = $_POST['address'];
            $admin_id = $_POST['adminID'];
            $pass_one = $_POST['password'];
            $pass_two = $_POST['confirmPassword'];

            // Check if passwords match
            if ($pass_one !== $pass_two) {
                echo '<script language="javascript">
                    alert("Passwords do not match");
                   </script>';
                exit;
            }

            // Generate PIN
            $pin = rand(100000, 999999);

            $subject = "sample mailer";
            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;

                $mail->Username = 'it2208.pura@gmail.com'; // input your username here
                $mail->Password = 'ggszgowwyqhhbdqe'; //input your email password

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                //Send Email
                $mail->setFrom('it2208.pura@gmail.com'); //username

                //Recipients
                $mail->addAddress($email);
                $mail->addReplyTo('it2208.pura@gmail.com'); //username

                //Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = 'hi, this is a test, reply if you received this. ' . $pin;
                $mail->send();
                $_SESSION['message'] = 'Message has been sent';
            } catch (Exception $e) {
                $_SESSION['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }

            // Insert the data into the database using prepared statement
            $stmt = $db->prepare("INSERT INTO register (first_name, middle_name, last_name, email, contact, address, admin_id, password) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $first_name, $middle_name, $last_name, $email, $contact_number, $address, $admin_id, $pass_one);

            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // For successful insert the data
                echo '<script language="javascript">
                    alert("Successfully Registered!");
                    </script>';
                header("Location: register_process.php");
            } else {
                echo "Error: " . $db->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS for background animation -->
    <style>
        body {
            background-color: whitesmoke;
            color: green;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: antiquewhite;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .footer-text {
            font-size: 20px;
            margin-top: 25px;
        }

        .icon {
            font-size: 3rem;
        }

        .card-header h3 {
            color: #009900;
        }

        .form-group label {
            color: green;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group textarea {
            color: green;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus,
        .form-group textarea:focus {
            border-color: #ffffff;
            background-color: #ffffff;
            color: #009900;
        }

        .btn-success {
            background-color: #009900;
            border-color: #009900;
        }

        .btn-success:hover {
            background-color: #007700;
            border-color: #007700;
        }
        .modal-title {
    color: #000000; /* Set modal text color to black */
}
        .modal-body {
    color: #000000; /* Set modal text color to black */
}
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3><i class="fas fa-user-plus icon"></i> Register Now</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middleName">Middle Name</label>
                                    <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Enter your middle name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group">
                                <label for="adminID">Admin ID</label>
                                <input type="text" class="form-control" name="adminID" id="adminID" placeholder="Enter your admin ID" pattern="[0-9]+" title="Please enter numbers only" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Set Your Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Re-enter Your Password</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Re-enter your password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="privacyAct" name="privacyAct" required>
                                <label class="form-check-label" for="privacyAct" style="color: #009900;">I accept the <a href="#" data-toggle="modal" data-target="#privacyModal">Privacy Act</a></label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="register">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <p>Already have an account? <a href="login.php">Go back to Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Privacy Act Statement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>FEU Group of Schools is committed to uphold the rights of individuals to data privacy.</p>
                    <p>Each person shall be guided by the principles of transparency, legitimate purpose and proportionality in processing personal data of students and employees. These principles shall guide the university in the acquisition, use and dissemination of the cited personal data.</p>
                    <p>We shall adhere to all the provisions of Republic Act No. 10173 or the Data Privacy Act of 2012, its Implementing Rules and Regulation, relevant policies and issuances of the National Privacy Commission, and all other requirements and standards for continuous improvement and effectiveness of personal data security management system.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
