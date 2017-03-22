<?php

$to1      =  'rizaeve@bk.ru';
$subject = 'Заявка на сайте ';
$message = 'На сайт '.$_SERVER['SERVER_NAME'].' поступила новая заявка.<br>';

$message .= 'Имя : '.$_POST['name'] .'<br>';
$message .= 'Контактный телефон : '.$_POST['phone'] .'<br>';
$message .= 'Сообщение : '.$_POST['message'] .'<br>';
$message .= '<br>'.'IP Адрес : '.$_SERVER['REMOTE_ADDR'].'<br>';

$message .= '<br>Письмо отправлено автоматически и не требует ответа';
$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: ROBOT <robot@".$_SERVER['SERVER_NAME'].">\r\n";
mail($to1, $subject, $message, $headers);
