<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Attendance System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

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
    }
    .navbar-custom {
            background-color: #39204c; /* Custom navbar color */
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .main {
            display: flex;
            width: 100vw;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            height: 100%;
            background: #39204c;; /* Semi-transparent background for sidebar */
            padding: 30px 0;
        }

        .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a {
            color: #fff;
        }

        .main_content {
            flex: 1;
            padding: 50px;
        }

        .header {
            color: #fff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .info {
            color: #fff;
            font-size: 18px;
        }

        .student-container {
            height: 90%;
            width: 90%;
            border-radius: 20px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            
        }

        .student-container > div {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding: 30px;
            height: 100%;
            
        }

        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table.dataTable thead > tr > th.sorting,
        table.dataTable thead > tr > th.sorting_asc,
        table.dataTable thead > tr > th.sorting_desc,
        table.dataTable thead > tr > th.sorting_asc_disabled,
        table.dataTable thead > tr > th.sorting_desc_disabled,
        table.dataTable thead > tr > td.sorting,
        table.dataTable thead > tr > td.sorting_asc,
        table.dataTable thead > tr > td.sorting_desc,
        table.dataTable thead > tr > td.sorting_asc_disabled,
        table.dataTable thead > tr > td.sorting_desc_disabled {
            text-align: center;
        }
    </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark navbar-custom ">
    <a class="navbar-brand ml-4"  href="#">Visitor Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav" style="margin-right: 5rem;"> <!-- Adjust margin-right to position closer to center -->
            <li class="nav-item" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="http://localhost/htdocfinals2/QrScanner.php">Qr Scanner<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="./add-guest.php">Add guest</a>
            </li>
            <li class="nav-item" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="http://localhost/htdocfinals2/SCHEDULEPAGE/schedulep.php">Schedules</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="#" onclick="confirmLogout()">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main">
        <div class="sidebar">
            <h2 style="font-size: 24px;">Welcome!</h2>
            <ul>
                
             
        </div>
                  
        


<div class="main_content">
    <div class="student-container">
        <div class="student-list">
            <div class="title">
                <h1 style="font-size: 36px;">Add Guest</h1>
                <button class="btn btn-dark" data-toggle="modal" data-target="#addStudentModal">Add Guest</button>
            </div>
            <hr>
            <div class="table-container table-responsive">
                <table class="table text-center table-sm" id="studentTable">
                    <thead class="#39204c" style="background-color: #39204c; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">QR Scanner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include ('./conn/conn.php');

                            $stmt = $conn->prepare("SELECT * FROM tbl_student");
                            $stmt->execute();

                            $result = $stmt->fetchAll();

                            foreach ($result as $row) {
                                $studentID = $row["tbl_student_id"];
                                $lastName = $row["last_name"];
                                $firstName = $row["first_name"];
                                $middleName = $row["middle_name"];
                                $studentCourse = $row["student_course"];
                                $qrCode = $row["qr_code"];

                                // Concatenate first name and last name to form student name
                                $studentName = $firstName . ' ' . $lastName;
                        ?>
                        <tr>
                            <th scope="row" id="studentID-<?= $studentID ?>"><?= $studentID ?></th>
                            <td><?= $lastName ?></td>
                            <td><?= $firstName ?></td>
                            <td><?= $middleName ?></td>
                            <td><?= $studentCourse ?></td>
                            <td>
                        <div class="action-button">
                             <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#qrCodeModal<?= $studentID ?>"><img src="https://cdn-icons-png.flaticon.com/512/1341/1341632.png" alt="" width="16"></button>

                            <!-- QR Modal -->
                            <div class="modal fade" id="qrCodeModal<?= $studentID ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?= $studentName ?>'s QR Code</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $qrCode ?>" alt="QR Code">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-secondary btn-sm" onclick="updateStudent(<?= $studentID ?>)">&#128393;</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteStudent(<?= $studentID ?>)">&#10006;</button>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudent" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudent">Add Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/add-guest.php" method="POST">
                    <div class="form-group">
</div>

                    <div class="form-group">
                        <label for="studentfName">First Name:</label>
                        <input type="text" class="form-control" id="studentfName" name="first_name" >
                    </div>
                    <div class="form-group">
                        <label for="studentmName">Middle Name:</label>
                        <input type="text" class="form-control" id="studentmName" name="middle_name" >
                    </div>
                    <div class="form-group">
                        <label for="studentlName">Last Name:</label>
                        <input type="text" class="form-control" id="studentlName" name="last_name" >
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
                            <p>Take a pic with your qr code.</p>
                            <img class="mb-4" src="" id="qrImg" alt="">
                        </div>
                        <div class="modal-footer modal-close" style="display: none;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Add List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<!-- Update Modal -->
<div class="modal fade" id="updateStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateStudent" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStudent">Update Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/update-guest.php" method="POST">
                    <div class="form-group">
                        <label for="updateStudentID">#</label>
                        <input type="text" class="form-control" id="updateStudentID" name="update_tbl_student_id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="updateStudentfName">First Name:</label>
                        <input type="text" class="form-control" id="updateStudentfName" name="update_student_fName" required>
                    </div>
                    <div class="form-group">
                        <label for="updateStudentmName">Middle Name:</label>
                        <input type="text" class="form-control" id="updateStudentmName" name="update_student_mName" required>
                    </div>
                    <div class="form-group">
                        <label for="updateStudentlName">Last Name:</label>
                        <input type="text" class="form-control" id="updateStudentlName" name="update_student_lName" required>
                    </div>
                    <div class="form-group">
                        <label for="updateStudentCourse">Gender:</label>
                        
                        <select class="form-control" id="updateStudentCourse" name="update_student_course" required>
                           <option value="Male">Male</option>
                <option value="Female">Female</option>
                        </select>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Update List</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmation" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmation">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this student?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteStudentConfirmed()">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#studentTable').DataTable();
    });

function updateStudent(id) {
    $("#updateStudentModal").modal("show");

    let updateStudentId = $("#studentID-" + id).text();
    let updateStudentName = $("#studentName-" + id).text().split(" ")[0];
    let updateStudentMiddleName = $("#studentName-" + id).text().split(" ")[1];
    let updateStudentLastName = $("#studentName-" + id).text().split(" ")[2];
    let updateStudentCourse = $("#studentCourse-" + id).text();

    $("#updateStudentId").val(updateStudentId);
    $("#updateStudentfName").val(updateStudentName);
    $("#updateStudentmName").val(updateStudentMiddleName);
    $("#updateStudentlName").val(updateStudentLastName);
    $("#updateStudentcourse").val(updateStudentCourse);
}

        function deleteStudent(id) {
            if (confirm("Do you want to delete this student?")) {
                window.location = "./endpoint/delete-guest.php?student=" + id;
            }
        }
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
        function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "logout.php";
        }
    }



</script>

</body>
</html>
