<?php 
require 'dbconn.php';
//echo "id" .$get_id = mysqli_real_escape_string($conn, $_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud App</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
    </head>


    <body>
        <div class="container">
            <h2 class="h2 text-center text-uppercase fs-1 fw-bold lh-base my-5">Signup Form</h2>

            <!-- Signup Form -->
            <div class="bg-white border p-5 shadow-sm mb-5" >
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="f_name" class="form-label fs-2">First Name: </label>
                                <input type="text" class="form-control fs-2 shadow-none" id="f_name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="l_name" class="form-label fs-2">Last Name: </label>
                                <input type="text" class="form-control fs-2 shadow-none" id="l_name" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fs-2">Email address:</label>
                        <input type="email" class="form-control fs-2 shadow-none" id="email" name="email" required>
                    </div>
                    <select class="form-select fs-2 mb-3 shadow-none" name="cat_name" required>
                        <option value="" selected>Select Category</option>
                        <option value="cat1">Cat1</option>
                        <option value="cat2">Cat2</option>
                        <option value="cat3">Cat3</option>
                    </select>
                    <div class="mb-3">
                        <label for="file" class="form-label fs-2">Select File:</label>
                        <input class="form-control" type="file" name="uploadfile" value="" required>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="bg-primary px-5 py-3 fs-2 border-0 rounded" >
                </form>
            </div>
            <h4><a href="show-data.php" class="fs-3 btn btn-primary float-end">Show Data</a></h4>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script>
               jQuery( document ).ready(function() {
            //         jQuery('.nav li:first-child').addClass('active');
            //         jQuery('.tab-pane:first-child').addClass('active');

            //         jQuery('.nav li').click(function(){
            //             jQuery('.nav li').removeClass('active');
            //             jQuery('.tab-pane').removeClass('active');
            //             jQuery(this).addClass('active');
            //             var indexval = jQuery(this).index();
            //             jQuery(jQuery(".tab-pane")[indexval]).addClass("active");
            //         });
                });
            
            </script>
    </body>
</html>

<?php 
 if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $email = $_POST['email'];

    $cat_name = $_POST['cat_name'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $upload_dir = "images/";
    $file_path = $upload_dir . $filename;


    if (move_uploaded_file($tempname, $file_path)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }


    $sql = "INSERT INTO `test`(`first_name`, `last_name`, `email`, `caregory`,`filename`) VALUES ('$first_name','$last_name','$email','$cat_name',' $file_path ')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";
      header("Location: show-data.php");
      exit(0);

    }else{
      echo "Error:". $sql . "<br>". $conn->error;
      exit(0);
    } 

    $conn->close(); 

  }
?>