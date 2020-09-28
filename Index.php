<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php include 'Query.php'; ?>

    <div class="container">
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- form -->

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style="width: auto;">
                    <h5 class="card-title">Insert Menu Here</h5>
                    <form action="Query.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label> Menu Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter menu name">
                        </div>
                        <div class=" form-group">
                            <label> Menu Stock</label>
                            <input type="number" class="form-control" name="stock" placeholder="Enter menu stock">
                        </div>
                        <div class="form-group">
                            <label> Menu Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter menu price">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- table -->
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Menu Name</th>
                            <th>Menu Stock</th>
                            <th>Menu Price</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <?php
                    include 'Process.php';
                    ($list = mysqli_query($mysqli, 'SELECT * from menu')) or
                        die($mysqli->error);
                    while ($row = $list->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="Modal.php?id=<?php echo $row['id']; ?>" class="btn btn-info"> Edit</a>
                                <a href="Query.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete this?');" class="btn btn-danger"> Delete</a>
                            </td>
                        </tr>
                    <?php endwhile;
                    ?>
                </table>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>