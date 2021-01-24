<?php
require_once('lib/print.php');
require_once('view/top.php');
?>

    <a href="create.php">Create</a>
    <?php if (isset($_GET['id'])) { ?>
        
        <a href="update.php?id=<?=$_GET['id']?>">Update</a>

        <form action="delete_process.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <input type="submit" value="Delete">
        </form>

    <?php } ?>

    <h2>
        <?php
        print_title();
        ?>
    </h2>

    <?php
        print_description();
    ?>

<?php
    require('view/bottom.php');
?>