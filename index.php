<?php
include "inc/header.php";
include "lib/config.php";
include "lib/Database.php";
?>
<?php
$db = new Database();
$query = "SELECT * FROM tbl_user";
$read = $db->select($query);
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

<div class="panel-heading d-flex align-items-center  justify-content-between">
    <div style="width: 50%; display: inline-block;">
        <h2 style="margin: 0;">Todo List </h2>
        <small>Todo list management Database</small>
    </div>
    <a class="btn btn-primary" style="float: right; display: inline-block; padding: 11px" href="create.php" class="text-right">Create Data</a>
</div>
<div class="panel-body px-0">
    <table style="width: 100%;">
        <tr>
            <td style="width: 12%">Serial</td>
            <td style="width: 22%">Name</td>
            <td style="width: 22%">Email</td>
            <td style="width: 22%">Skill</td>
            <td style="width: 22%">Action</td>
        </tr>
        <?php if ($read) { ?>
            <?php
            $i = 0;
            while ($row = $read->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['skill'] ?></td>
                    <td>
                        <a class="btn btn-info" href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">
                    <h2>Data is not available !</h2>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>

<?php include "inc/footer.php" ?>