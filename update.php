<?php
    include "inc/header.php";
    include "lib/config.php";
    include "lib/Database.php";
?>
<?php
    $db = new Database();

    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_user WHERE id = $id";
    $getData = $db->select($query)->fetch_assoc();


    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);
        $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
        if ($name == "" || $email == "" || $skill == "") {
            $error= "<div class='alert alert-danger'>Field must be Empty !.</div>";
        } else {
            $query = "UPDATE tbl_user SET
                name = '$name',
                email = '$email',
                skill = '$skill'
                WHERE id = '$id'";
            $updateData = $db->update($query);
            
        }
    }
?>
<?php
    if (isset($_POST['delete'])) {
        $query = "DELETE FROM tbl_user WHERE id = $id";
        $deleteData = $db->delete($query);
    }    
?>

    <div class="panel-heading">
        <h2 style="width: 50%; display: inline-block;">Add Student </h2><a class="btn btn-primary text-right" style="float: right; display: inline-block; padding: 11px" href="index.php" class="text-right">Back</a>
    </div>
    <div class="panel-body">
        <div style="width:60%; margin:0 auto;">
        <?php
            if (isset($error)) {
                echo $error;
            }
        ?>
            <form action="update.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?php echo $getData['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $getData['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Skill</label>
                    <input class="form-control" type="phone" name="skill" id="phone" value="<?php echo $getData['skill']; ?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-info" type="submit" name="submit" value="Update">
                    <input class="btn btn-info" type="reset" value="Cancel">
                    <input class="btn btn-info" type="submit" name="delete" value="Delete">
                </div>
            </form>    
        </div>
    </div>

<?php include "inc/footer.php" ?>