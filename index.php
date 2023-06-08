<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- bootsrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Datatables Plugin CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <title>Basic CRUD</title>
</head>

<body>
    <h1 class="text-center mt-5">BASIC CRUD</h1>
    <div class="container-md mx-auto mt-5 border shadow p-5">
        <button type="button" class="btn btn-primary mb-2 btn-sm" data-bs-toggle="modal" data-bs-target="#addStudent">
        ADD STUDENT <i class='bx bxs-file-plus'></i>
        </button>

        <!-- show modal -->
        <!-- Modal Student Edit -->
        <div class="modal fade" id="addStudent" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="insertData.php" method="post">
                        <div class="modal-body">
                            
                            <div class="form-floating mb-3">
                                <input type="text" name="fname" class="form-control text-uppercase" id="floatingInput"
                                    placeholder="First Name">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="lname" class="form-control text-uppercase" id="floatingInput"
                                    placeholder="Last Name">
                                <label for="floatingInput">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="dept" class="form-control text-uppercase" id="floatingInput"
                                    placeholder="Department">
                                <label for="floatingInput">Department</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Table comes from datatables.net -->
        <div class="table-responsive">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">First name</th>
                        <th class="text-center">Last name</th>
                        <th class="text-center">Department</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- fetch from database -->
                    <?php
                    include 'conn.php';
                    $no = 1;
                    $data = mysqli_query($conn, "SELECT * FROM student_list");
                    while ($row = mysqli_fetch_assoc($data)) {
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center text-uppercase">
                                <?php echo $row[ 'firstname' ]; ?>
                            </td>
                            <td class="text-center text-uppercase">
                                <?php echo $row[ 'lastname' ]; ?>
                            </td>
                            <td class="text-center text-uppercase">
                                <?php echo $row[ 'department' ]; ?>
                            </td>
                            <td class="text-center">
                                <a type="button" class="text-primary fs-5" data-bs-toggle="modal"
                                    data-bs-target="#editStudent<?= $row[ 'id' ] ?>">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a type="button" class="text-danger fs-5" data-bs-toggle="modal"
                                    data-bs-target="#deleteStudent<?= $row[ 'id' ] ?>">
                                    <i class='bx bxs-trash'></i>
                                </a>

                                <!-- show modal -->
                                <!-- Modal Student Edit -->
                                <div class="modal fade" id="editStudent<?= $row[ 'id' ] ?>" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Student</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="update.php" method="post">
                                                <div class="modal-body">
                                                        <input type="hidden" name="student_id" value="<?= $row[ 'id' ] ?>">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="first_name" class="form-control text-uppercase" id="floatingInput"
                                                            placeholder="First Name" value="<?= $row[ 'firstname' ] ?>">
                                                        <label for="floatingInput">First Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="last_name" class="form-control text-uppercase" id="floatingInput"
                                                            placeholder="Last Name" value="<?= $row[ 'lastname' ] ?>">
                                                        <label for="floatingInput">Last Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="department" class="form-control text-uppercase" id="floatingInput"
                                                            placeholder="Department" value="<?= $row[ 'department' ] ?>">
                                                        <label for="floatingInput">Department</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- show modal -->
                                <!-- Modal Student Delete -->
                                <div class="modal fade" id="deleteStudent<?= $row[ 'id' ] ?>" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Student</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="deleteData.php" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="delete_id" value="<?= $row[ 'id' ] ?>">
                                                        <h3 class="text-center">Are you sure to delete the student?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>

                        <?php $no++;
                    } ?>

                </tbody>
            </table>
        </div>

    </div>
</body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

</html>