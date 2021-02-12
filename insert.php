<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");

mysqli_query($conn, "
    INSERT INTO topic
    (title, description, created)
    VALUE(
        'MySQL',
        'MySQL is ..',
        NOW()
    )
");

?>