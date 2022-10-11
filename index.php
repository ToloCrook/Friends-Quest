<?php

require '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul><?php foreach($friends as $friend) {?>
        <li>
            <?php echo $friend['firstname'] . " " . $friend['lastname'] . "<br>";} ?>
        </li>
    </ul>

    <form action="form.php" method='post'>
        <div>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" required>
        </div>
        <div>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" required>
        </div>
        <div>
            <input type="submit" value="Send">
            
            
        </div>
    </form>


</body>
</html>


