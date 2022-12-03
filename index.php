<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>BASIC CRUD</title>
</head>
<body>
<div class="container d-flex justify-content-center mt-5">
<center>
    <form action="insertData.php" method="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input name="fn" class="form-control form-control-lg" type="text" placeholder="First Name">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Last Name</label>
        <input name="ln" class="form-control form-control-lg" type="text" placeholder="Last Name">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Department</label>
        <input name="d" class="form-control form-control-lg" type="text" placeholder="Department">
        </div>
        <button class="btn btn-primary" type="submit">ADD</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include 'conn.php';
        $no =  1 ;
                $data = mysqli_query($conn, "SELECT * FROM student_list");
                while($row = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><a type="button" class="btn btn-danger" href="deleteData.php?id=<?php echo $row['id']?>">delete</a></td>
                <td><a type="button" class="btn btn-danger" href="editData.php?id=<?php echo $row['id']?>">edit</a></td>
            </tr>

                <?php $no++; } ?>
        
        </tbody>
    </table>
    
</center>
</div>
    
</body>
</html>