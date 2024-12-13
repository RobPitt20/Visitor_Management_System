<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Act Statement</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS for background animation -->
    <style>
        body {
            background-color: #009900;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .modal-content {
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            border-radius: 10px;
        }

        .modal-header, .modal-body, .modal-footer {
            border: none;
        }

        .btn-close {
            background-color: #009900;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-close:hover {
            background-color: #007700;
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#privacyModal">
            View Privacy Act
        </button>
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
                    <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
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
