<?php
/**
 * Created by PhpStorm.
 * User: hasan
 * Date: 1/23/17
 * Time: 11:50 AM
 */
    include_once 'Query.php';

    $queryobj = new Query();
    $studentinfo = $queryobj->getAllStudentInfo();

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $result = $queryobj->insertStudentInfo($_POST);
        header("Refresh:0");
    }

    if(isset($_GET['del']) && $_GET["del"] > 0){
        $id = $_GET["del"];
        $result = $queryobj->deleteStudentInfo($id);
        header('Location: index.php');
    }
?>

<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

    <div class="jumbotron">

    <h2>Add New Student</h2>
    <form class="form-inline" action="index.php" method="post">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="number">Age</label>
            <input type="number" name="age" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Add</button>
    </form>
    </div>

    <br><br>

    <div class="jumbotron">
    <h2>All Student Information</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Age</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
            <?php

                while ($data = $studentinfo->fetch_assoc()){
                    ?>
                <tr>
                    <td><?php echo $data['sl'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['age'];?></td>
                    <td>[<a href="index.php?edit=<?php echo $data['sl'];?>">Edit</a>]  [<a href="index.php?del=<?php echo $data['sl'];?>">Delete</a>]</td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>

</body>
</html>

