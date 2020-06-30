<?php
@session_start();
$LangArray = array("ru", "en");
$DefaultLang = "ru";


$language = addslashes($_GET['lang']); //Экранирует строку с помощью слешей
if($language) {
    if(!in_array($language, $LangArray)) { //Проверяет, присутствует ли в массиве значение
        $_SESSION['NowLang'] = $DefaultLang;
    }else {
        $_SESSION['NowLang'] = $language;
    }
}
$Lang_Now = addslashes($_SESSION['NowLang']);//Экранирует строку с помощью слешей
include_once ("lang.".$Lang_Now.".php");
if(isset($_GET['lang'])) {
    echo $translate['msgAdm'] .' '.  $_SESSION['name'].' ' . $_SESSION['surname'] . $translate['msgAdm2'];
}

echo '<br><a href="admin.php?lang=ru">Русский</a>';
echo '<br><a href="admin.php?lang=en">Англиский</a>';
echo '<br><a href="admin.php?tab=1">Таблица</a>';
if(isset($_GET['tab'])) {
    include 'table.php';
}