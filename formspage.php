<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Notice and Consent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        body {
        background-color: antiquewhite; 
        /* Remove the existing background gradient animation */
        background-size: auto;
        animation: none;
        padding-top: 70px;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 4 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 40px;
            text-align: center;
            padding: 30px;
            white-space: nowrap;
            background-color: #39204c;
            color: white;
            border-radius: 5px;
        }
        p {
            font-size: 16px;
            line-height: 1.7;
            text-align: justify;
            margin-bottom: 20px;
        }
        .navbar-custom {
            background-color: #39204c; /* Custom navbar color */
        }
        .btn-primary {
            background-color: #39204c;
            border-color: #39204c;
            padding: 12px 24px;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 12px 24px;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        .modal-header {
            background-color: #39204c;
            color: white;
        }
        .modal-body {
            font-size: 16px;
            max-height: 600px;
            overflow-y: auto;
        }
        .modal-footer {
            text-align: center;
        }
        .form-group label {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .qr-con {
            margin-top: 20px;
        }
        .qr-generator {
            background-color: #007bff;
            color: white;
        }
        .qr-generator:hover {
            background-color: #0056b3;
        }
        .close span {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand ml-4" href="#">Visitor Management System</a>
    </nav>

    <div class="main_content">
        <div class="container">
            <h1>Privacy Notice and Consent</h1>
            <p><strong>Introduction:</strong> The information that you will provide in this form will be collected and processed in accordance with applicable data protection laws, including the Data Privacy Act of 2012 (Republic Act No. 10173). This information will be used solely for the purpose of managing your visit and ensuring safety and security at the event.</p>
            
            <p><strong>What Information is Collected?</strong><br>We collect personal information such as your Name and Gender for the purpose of event registration and security verification.</p>
            
            <p><strong>How the Information is Used?</strong><br>Your personal data will be processed for the following purposes: Event Management, Security, and Attendance Tracking.</p>
            
            <p><strong>Your Rights:</strong><br>You have the right to access, correct, or delete the information we collect about you. For more details, please contact our support team.</p>
            
            <p><strong>Consent:</strong><br>By clicking 'I Agree', you consent to the collection, use, and processing of your personal data for the purposes described above.</p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">I Agree</button>
            <button class="btn btn-secondary" onclick="confirmExit()">I Do Not Agree</button>
        </div>
        </div>

        <!-- Add Guest Modal -->
        <div class="modal fade" id="addStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudent">Fill up your details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="guestForm" onsubmit="submitForm(event)">
                            <div class="form-group">
                                <label for="studentfName">First Name:</label>
                                <input type="text" class="form-control" id="studentfName" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="studentmName">Middle Name:</label>
                                <input type="text" class="form-control" id="studentmName" name="middle_name">
                            </div>
                            <div class="form-group">
                                <label for="studentlName">Last Name:</label>
                                <input type="text" class="form-control" id="studentlName" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="studentcourse">Gender:</label>
                                <select class="form-control" id="studentCourse" name="student_course" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-secondary form-control qr-generator" onclick="generateQrCode()">Generate QR Code</button>
                            <div class="qr-con text-center" style="display: none;">
                                <input type="hidden" class="form-control" id="qrCode" name="qr_code">
                                <p>Take a picture with your QR code.</p>
                                <img class="mb-4" src="" id="qrImg" alt="">
                            </div>
                            <div class="modal-footer modal-close" style="display: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Error Modal -->
    <div id="errorModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please fill out all the required fields before generating the QR code.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Your details have been successfully submitted!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.reload();">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="confirmModal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to exit the site? You will not be able to fill up the form if you proceed.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='formspage2.php';">Yes, Exit</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        function generateRandomCode(length) {
            const characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            let randomString = '';

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomString += characters.charAt(randomIndex);
            }

            return randomString;
        }


        function generateQrCode() {
            const firstName = document.getElementById('studentfName').value;
        const middleName = document.getElementById('studentmName').value;
        const lastName = document.getElementById('studentlName').value;
        const gender = document.getElementById('studentCourse').value;

        // Check if required fields are filled
        if (!firstName || !middleName || !lastName || !gender) {
            // Show error message modal
            $('#errorModal').modal('show');
            return; // Prevent QR code generation
        }

            const qrImg = document.getElementById('qrImg');

            let text = generateRandomCode(10);
            $("#qrCode").val(text);

            if (text === "") {
                alert("Please enter text to generate a QR code.");
                return;
            } else {
                const apiUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(text)}`;

                qrImg.src = apiUrl;
                document.getElementById('studentfName').style.pointerEvents = 'none';
                document.getElementById('studentCourse').style.pointerEvents = 'none';
                document.querySelector('.modal-close').style.display = '';
                document.querySelector('.qr-con').style.display = '';
                document.querySelector('.qr-generator').style.display = 'none';
            }
            
        }

            function submitForm(event) {
            event.preventDefault(); // Prevent form submission
            const firstName = document.getElementById('studentfName').value;
            const middleName = document.getElementById('studentmName').value;
            const lastName = document.getElementById('studentlName').value;
            const gender = document.getElementById('studentCourse').value;

            // Check if required fields are filled
            if (!firstName || !middleName || !lastName || !gender) {
                // Show error message
                $('#errorModal').modal('show');
                return false; // Prevent form submission
            }

            // Gather form data
            let formData = new FormData(document.getElementById('guestForm'));

            // Send form data via AJAX
            $.ajax({
                url: './endpoint/add-guest.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    
                    $('#addStudentModal').modal('hide'); // Close the modal
                    $('#guestForm')[0].reset(); // Reset the form
                    $('#successModal').modal('show');
                }
            });
        }

            function fetchInsertedData() {
            $.ajax({
                url: './endpoint/add-guest.php',
                type: 'GET',
                success: function(response) {
                    $('#dataDisplay').html(response); // Display inserted data
                }
            });
        }

            $(document).ready(function() {
            fetchInsertedData();
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmExit() {
            $('#confirmModal').modal('show'); // Show the modal
        }
    </script>
</body>
</html>