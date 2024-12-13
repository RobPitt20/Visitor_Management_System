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
        background-color: green; /* Change background color to green */
        /* Remove the existing background gradient animation */
        background-size: auto;
        animation: none;
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
            background: rgba(0, 0, 0, 0.8); /* Semi-transparent background for sidebar */
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">QR Code Attendance System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./indexIM.php">QR Scanner  |</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./subject.php">Subjects  |</a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Logout  |</a>
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
                        <h1 style="font-size: 36px;">Information Management</h1>
                        
                    </div>
                    <hr>
                     <div class="table-container table-responsive">
        <table class="table text-center table-sm" id="studentTable">
            <thead class="thead-dark">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year Level</th>
                    <th scope="col">Status</th>
                    <th scope="col">Student #</th>
                    <th scope="col">QR Code</th>
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
                        $yearLevel = $row["year_level"];
                        $studentStatus = $row["student_status"];
                        $studentNO = $row["student_no"];
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
                     <td><?= $yearLevel ?></td>
                     <td><?= $studentStatus ?></td>
                     <td><?= $studentNO ?></td>
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
                <h5 class="modal-title" id="addStudent">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/add-studentIM.php" method="POST">
                    <div class="form-group">
    <label for="studentSection">Section:</label>
    <select class="form-control" id="studentSection" name="section" required>
        <option value="Information Management">Information Management</option>
        <option value="Human-Computer Interaction">Human-Computer Interaction</option>
    </select>
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
                        <label for="yearlevel">Year Level:</label>
                        <input type="text" class="form-control" id="yearlevel" name="year_level" >
                    </div>
                    <div class="form-group">
                        <label for="studentcourse">Course:</label>
                        <select class="form-control" id="studentCourse" name="student_course" required>
                           <option value="BSA">Bachelor of Science in Accountancy</option>
                <option value="BSAIS">Bachelor of Science in Accounting Information System</option>
                <option value="BSBAFM">Bachelor of Science in Business Administration (Financial Management Track)</option>
                <option value="BSBAMM">Bachelor of Science in Business Administration (Marketing Management Track)</option>
                <option value="BSE">Bachelor of Science in Education</option>
                <option value="BSHMCM">Bachelor of Science in Hospitality Management (Culinary Management Track)</option>
                <option value="BSHMHO">Bachelor of Science in Hospitality Management (Hotel Operations Track)</option>
                <option value="BSIT">Bachelor of Science in Information Technology</option>
                <option value="BSMT">Bachelor of Science in Medical Technology</option>
                <option value="BSN">Bachelor of Science in Nursing</option>
                <option value="BSP">Bachelor of Science in Psychology</option>
                <option value="BSTME">Bachelor of Science in Tourism Management (Events Management Track)</option>
                <option value="BSTMTM">Bachelor of Science in Tourism Management (Travel and Tours Management Track)</option>
                <option value="BACCM">Bachelor of Arts in Communication (Convergent Media Track)</option>
                <option value="BACDC">Bachelor of Arts in Communication (Digital Cinema Track)</option>
                <option value="BAPSP">Bachelor of Arts in Political Science (Philippine Politics and Foreign Relations Track)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="student_status" >
                            <option value="regular">Regular</option>
                            <option value="irregular">Irregular</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentID">Student ID:</label>
                        <input type="text" class="form-control" id="studentNO" name="student_no" >
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
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/update-student.php" method="POST">
                    <div class="form-group">
                        <label for="updateStudentID">#</label>
                        <input type="text" class="form-control" id="updateStudentID" name="update_tbl_student_id">
                    </div>
                    
                    <div class="form-group">
                        <label for="updateStudentfName">First Name:</label>
                        <input type="text" class="form-control" id="updateStudentfName" name="update_student_fName">
                    </div>
                    <div class="form-group">
                        <label for="updateStudentmName">Middle Name:</label>
                        <input type="text" class="form-control" id="updateStudentmName" name="update_student_mName">
                    </div>
                    <div class="form-group">
                        <label for="updateStudentlName">Last Name:</label>
                        <input type="text" class="form-control" id="updateStudentlName" name="update_student_lName">
                    </div>
                    <div class="form-group">
                        <label for="updateYearlevel">Year Level:</label>
                        <input type="text" class="form-control" id="updateYearlevel" name="update_student_yearlevel">
                    </div>
                    <div class="form-group">
                        <label for="updateStudentcourse">Course:</label>
                        <input type="text" class="form-control" id="updateStudentcourse" name="update_student_course">
                    </div>
                    <div class="form-group">
                        <label for="updateStatus">Status:</label>
                        <select class="form-control" id="updateStatus" name="update_status">
                            <option value="regular">Regular</option>
                            <option value="irregular">Irregular</option>
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
                window.location = "./endpoint/delete-studentIM.php?student=" + id;
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




</script>

</body>
</html>
