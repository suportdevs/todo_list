<?php
include "inc/header.php";
include "lib/config.php";
include "lib/Database.php";
?>
<?php
$db = new Database();
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    if ($name == "" || $email == "" || $skill == "") {
        $error = "<div class='alert alert-danger'>Field must be Empty !.</div>";
    } else {
        $query = "INSERT INTO tbl_user(name, email, skill) Values('$name', '$email', '$skill')";
        $create = $db->insert($query);
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <?php
        if (isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
        ?>
    </div>
</div>
<div class="body-content" style="border:1px solid #ddd; margin-bottom:15px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading d-flex align-items-center  justify-content-between">
                <div style="width: 50%; display: inline-block;">
                    <h2 style="margin: 0;">Todo Create </h2>
                    <small>Todo list management Database</small>
                </div>
                <a class="btn btn-primary" style="float: right; display: inline-block; padding: 11px" href="index.php" class="text-right">Back</a>
            </div>
            <div class="panel-body">
                <div style="width:60%; margin:0 auto;">
                    <?php
                    if (isset($error)) {
                        echo $error;
                    }
                    ?>
                    <form action="create.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Skill</label>
                            <input class="form-control" type="phone" name="skill" id="phone" placeholder="Enter Skill">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-info" type="submit" name="submit" value="Create">
                            <a href="index.php" class="btn btn-info" type="reset" value="Cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <?php include "inc/footer.php" ?>