<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>

<body>
    <h1><a href="index.php">WEB</a></h1>
    <p><a href="index.php">topic</a></p>
    <table border="1">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>profile</td>
            <td></td>
            <?php
            $sql = "SELECT * FROM author";
            $result = mysqli_query($conn, $sql);
            while (($row = mysqli_fetch_array($result)) != NULL)
            {
                $filtered =array(
                    'id'=>htmlspecialchars($row['id']),
                    'name'=>htmlspecialchars($row['name']),
                    'profile'=>htmlspecialchars($row['profile'])
                );
            ?>
                <tr>
                    <td><?=$filtered['id']?></td>
                    <td><?=$filtered['name']?></td>
                    <td><?=$filtered['profile']?></td>
                    <td><a href="author.php?id=<?=$filtered['id']?>">Update</a></td>
                    <td>
                        <!--만약 confirm값이 거짓이라면(cancel을 눌렀다면) false를 반환-->
                        <form action="process_delete_author.php" method="post" onsubmit="if(!confirm('sure?')){return false;}">
                            <input type="hidden" name='id' value="<?=$filtered['id']?>">
                            <input type="submit" value='delete'>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
    </tr>
    </table>
    
    <?php

    $escaped = array(
        'name'=>'',
        'profile'=>''
    );

    $label_submit = 'Create author';
    $form_action = 'process_create_author.php';
    $form_id = '';

    if(isset($_GET['id']))
    {
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        settype($filtered_id, 'integer');
        $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['profile'] = htmlspecialchars($row['profile']);
        $label_submit = 'Update author';
        $form_action = 'process_update_author.php';
        $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
    }
    ?>

    <form action=<?=$form_action?> method="post">
        <?=$form_id?>
        <p><input type="text" name="name" placeholder="name" value="<?=$escaped['name']?>"></p>
        <p><textarea name="profile" placeholder="profile"><?=$escaped['profile']?></textarea></p>
        <p><input type="submit" value=<?=$label_submit?>></p>
    </form>

</body>

</html>