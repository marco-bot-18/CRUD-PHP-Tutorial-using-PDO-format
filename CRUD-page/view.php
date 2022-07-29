<?php require 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <!-- ccs links, cdns -->
    <?php require '../includes/css-links.php'; ?>
   
</head>
<body>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    .space-content {
        margin: 3%;
    }
    .logout{
        text-decoration: none;
        color: whitesmoke;
    }
    .logout:hover{
        text-decoration: underline;
        color: whitesmoke;
    }
    /* .form-control:. {
        text-transform: capitalize;
    } */
</style>
    <!-- Navbar -->
    <nav class="navbar navbar-sticky-top bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <span class="text-white">CRUD Page</span>
            </ul>
            <ul class="navbar-nav auto">
                <li class="nav-item">
                    <a class="logout" href="includes/logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="space-content">
        <!-- SPACE -->
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                Add Person
                            </button>
                        </div>
                        <div class="card-header bg-success">
                            <h class="text-white">List of Persons</h>
                        </div>
                        <div class="card-body">
                        <table id="tbl_persons" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Birthday</th>
                                    <th>Gender</th>
                                    <th>Date Created/Modified</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM tbl_persons";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                if($query->rowCount() > 0) {
                                    foreach($results as $res) {
                                ?>
                                <tr>
                                    <td><?php echo htmlentities($res->id);?></td>
                                    <td><?php echo htmlentities($res->fname)." ".($res->mname)." ".($res->lname);?></td>
                                    <td><?php echo date("M d, Y", strtotime($res->bday));?></td>
                                    <td><?php echo htmlentities($res->gender);?></td>
                                    <td><?php echo htmlentities($res->date_added_modified);?></td>
                                    <td>
                                        <a href="delete.php?person_id=<?php echo $res->id?>" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $res->id;?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>

                                <!-- Update Modal -->
                                <div class="modal fade" data-bs-backdrop="static" id="updateModal<?php echo $res->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                <!-- form create start -->
                                                <form action="update.php" method="POST">
                                                    <input type="text" value="<?php echo $res->id;?>" name="person_id" hidden>
                                                    <div class="mb-3">
                                                        <label for="firstname" class="form-label">First Name</label>
                                                        <input type="text" value="<?php echo $res->fname; ?>" name="firstname" class="form-control firstname" id="firstname" placeholder="Enter First Name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="middlename" class="form-label">Middle Name</label>
                                                        <input type="text" value="<?php echo $res->mname; ?>" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle Name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lastname" class="form-label">Last Name</label>
                                                        <input type="text" value="<?php echo $res->lname; ?>" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="bday" class="form-label">Birthday</label>
                                                        <input type="date" value="<?php echo $res->bday; ?>" name="bday" class="form-control" id="bday" placeholder="" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender</label>
                                                        <select class="browser-default custom-select" name="gender" id="gender" required>
                                                            <?php
                                                                if($res->gender == "Male"){
                                                                    echo '<option value="Male" selected>Male</option>';
                                                                    echo '<option value="Female">Female</option>';
                                                                }
                                                                else {
                                                                    echo '<option value="Male">Male</option>';
                                                                    echo '<option value="Female" selected>Female</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            </div>
                                            </form> <!-- form end -->
                                        </div>
                                    </div>
                                </div> <!-- end tag of Update modal -->

                                <?php 
                                    } //end of foreach loop
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Create Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Person</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <!-- form create start -->
                    <form action="create.php" method="POST">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Enter Middle Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="bday" class="form-label">Birthday</label>
                            <input type="date" name="bday" class="form-control" id="bday" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="browser-default custom-select" name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="create" class="btn btn-primary">Create</button>
                </div>
                </form> <!-- form end -->
            </div>
        </div>
    </div>
    
</body>
<?php require '../includes/scripts.php' ?> <!-- js links, cdns  -->
</html>