<?php

require '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);


$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$errors = [];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $addingFriendQuery = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
    $addingFriendStatement = $pdo->prepare($addingFriendQuery);

    $addingFriendStatement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $addingFriendStatement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

    if (empty($firstname) || trim($firstname) === " ") {
        $errors[] = "You have to enter a firstname";

    } if (empty($lastname) || trim($lastname) === " ") {
        $errors[] = "You have to enter a lastname";

    } foreach($errors as $error) {
        echo $error . "<br>";
        
    } if (empty($errors)) { 
        $addingFriendStatement->execute();
    }
}

?>

<a href="index.php">Return to form</a>