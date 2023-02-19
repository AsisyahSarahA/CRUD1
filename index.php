<?php

    session_start();
    require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Index</title>
  </head>
  <body>
   

   <div class="containe mt-4">
        <?php include('message.php');?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details</h4>
                        <a href="student-create.php" class='btn btn-primary float-end'>Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                    $query ="SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            
                                            ?>
                                            <tr>
                                            <td><?= $student['id'] ?></td>
                                            <td><?= $student['name'] ?></td>
                                            <td><?= $student['email'] ?></td>
                                            <td><?= $student['phone'] ?></td>
                                            <td><?= $student['course'] ?></td>

                                            <td>
                                                <a href="" class="btn btn-info btn-sm">View</a>
                                                <a href="student-view.php?id=<?=$student['id']; ?>"class="btn btn-success btn-sm"> View</a>
                                                <a href="student-edit.php?id=<?=$student['id']; ?>"class="btn btn-success btn-sm"> Edit</a>
                                                <a href="" class="btn btn-danger btn-sm"> Delete</a>
                                                <button action="code.php" method="POST" class ="d-inline">
                                                <button type="submit" name="delete_student"<? value=$student['id'];?> class ="btn btn-danger btn-sm ">Delete</button>
                                            </td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5>No Record Found </h5>";
                                    }

                                ?>
                                <tr>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>