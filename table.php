<?php
session_start();
require_once 'database.php';
    // Формируем запрос из таблицы с именем blog
    $sql = "SELECT * FROM `users`";
    $result = $connect->query($sql);
    // В цикле перебираем все записи таблицы и выводим их

if(isset($_GET['del'])){
    $id = ($_GET['del']);
    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'") or die( mysqli_error($connect));
}

    echo '<table>';
    echo '<tr>';
    echo '<td>' . 'ID' .'</td>';
    echo '<td>' . 'Name' .'</td>';
    echo '<td>' . 'Surname' .'</td>';
    echo '<td>' . 'Login' .'</td>';
    echo '<td>' . 'Password' .'</td>';
    echo '<td>' . 'Lang' .'</td>';
    echo '<td>' . 'Role' .'</td>';
    echo '</tr>';


    while ($mas = $result->fetch_assoc())
    {


        echo '<tr>';
        echo '<tr>';
        echo '<td>'; echo $mas['id']. ' '; echo '</td>';
        echo '<td>'; echo $mas['name']. ' '; echo '</td>';
        echo '<td>'; echo $mas['surname']. ' ';echo '</td>';
        echo '<td>'; echo $mas['login']. ' '; echo '</td>';
        echo '<td>'; echo $mas['password']. ' '; echo '</td>';
        echo '<td>'; echo $mas['lang']. ' '; echo '</td>';
        echo '<td>'; echo $mas['role']. ' '; echo '</td>';
        echo '<td>' . '<a href="table.php?table=1">Edit</a>'; echo '</td>'; ?>
        <td><a href="table.php?del=<?= $mas['id'] ?>>">Dell</a></td> <?php
        echo '</tr>';
    }
    echo '</table>';

if(isset($_GET['table'])) {
    $id = ($_GET['table']);
    echo '<form action="edituser.php" method="post" enctype="multipart/form-data">
        <label>Login</label><br>
        <input type="login" name="bad_login"> <br>

        <label>New Login</label><br>
        <input type="login" name="new_login"> <br>

        <label>Pass</label><br>
        <input type="password" name="bad_password"> <br>

        <label>New password</label><br>
        <input type="password" name="new_password"> <br>

        <button type="submit">Submit</button>
        <?php
        
        ?>
    </form>';

    if (isset($_SESSION['msg1'])) {
        echo '<div>' . $_SESSION['msg1'] . '</div>';
        unset($_SESSION['msg1']);
    }
}
