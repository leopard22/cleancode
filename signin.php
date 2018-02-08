<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 08/02/18
 * Time: 12:33
 */

$errors = [];
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($username !== 'toto' || $password !== '1234'){
        $errors[] = 'Identifiant ou mot de passe non valid';
    }else{
        header('Location: index.php');
    }

}


?>

<html>
<head>
    <title>signin</title>
</head>
<body>
<div class="errors">
    <?php foreach ($errors as $err) :?>
    <div><?php echo $err; ?></div>
    <?php endforeach;?>
</div>
<form action="signin.php" method="POST">
    <div>
        <input type="text" name="username" placeholder="identifiant">
    </div>
    <div>
        <input type="text" name="password" placeholder="mot de passe">
    </div>
    <div>
        <input type="submit" name="envoyer">
    </div>
</form>
</body>
</html>
