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

    <?php require_once 'Process.php';
    $id = $_GET['id'];
    $data = mysqli_query($mysqli, "SELECT * FROM menu WHERE id = '$id'");
    while ($menu = $data->fetch_assoc()) :
    ?>

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

        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="card" style="width: 30rem;">
                    <h5 class="card-title">Edit Menu Here</h5>
                    <form action="Query.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $menu['id']; ?>">
                        <div class="form-group">
                            <label> Menu Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter menu name" value="<?php echo $menu['name']; ?>">
                        </div>
                        <div class=" form-group">
                            <label> Menu Stock</label>
                            <input type="number" class="form-control" name="stock" placeholder="Enter menu stock" value="<?php echo $menu['stock']; ?>">
                        </div>
                        <div class="form-group">
                            <label> Menu Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter menu price" value="<?php echo $menu['price']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" name="update">Update</button>
                            <a href="Index.php" class="btn btn-danger btn-block">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endwhile ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>