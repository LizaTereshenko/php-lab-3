<?php

$x = $_POST['login'];
$y = $_POST['password'];
include 'database.php';
include 'class.php';

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$x' AND `password` = '$y'");
if(mysqli_num_rows($check_user) > 0)
{
    $user = mysqli_fetch_assoc($check_user);
            if ($x == $user['login'] && $y == $user['password'])
            {
                if($user['role'] =='admin'){
                    $admin = new Admin($user['name'], $user['surname']);
                    $admin->inmsg();
                }elseif ($user['role'] == 'manager'){
                    $manager = new Manager($user['name'], $user['surname']);
                    $manager->inmsg();
                }else{
                    $client = new Client($user['name'], $user['surname']);
                    $client->inmsg();

                }
            }
            else{
                echo 'Неверный логин или пароль';
                header('Location: index.php');
            }

}else{
    echo 'Неверный логин или пароль';
    header('Location: index.php');
}



