<?php
if(isset($_FILES["upload_file"])) {
    $name_array = $_FILES['upload_file']['name'];
    $tmp_name_array = $_FILES['upload_file']['tmp_name'];
    $type_array = $_FILES['upload_file']['type'];
    $size_array = $_FILES['upload_file']['size'];
    $error_array = $_FILES['upload_file']['error'];
    for($i = 0; $i < count($tmp_name_array); $i++){
        $shortname = $name_array[$i];
        $filePath = "uploads/" . date('d-m-Y-H-i-s').'-'.$name_array[$i];
        if(move_uploaded_file($tmp_name_array[$i], $filePath)){
            $files[] = $filePath;
        } else {
//            echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
        }
    }
}


$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$utm_content = $_POST['utm_content'];
$utm_term = $_POST['utm_term'];

$select1 = $_REQUEST['select1'];
$select2 = $_REQUEST['select2'];

$naklad = $_REQUEST['naklad'];

$optionsRadios1 = $_REQUEST['optionsRadios1'];
$optionsRadios2 = $_REQUEST['optionsRadios2'];
$optionsRadios3 = $_REQUEST['optionsRadios3'];

$pers1 = $_REQUEST['magpaska'];
$pers2 = $_REQUEST['carovycod'];
$pers3 = $_REQUEST['stiracepole'];
$pers4 = $_REQUEST['embosovanirazba'];
$pers5 = $_REQUEST['podpisnoepole'];
$pers6 = $_REQUEST['cislovani'];
$pers7 = $_REQUEST['foliotisk'];

$komment = $_REQUEST['komment'];
$upload_file = $_FILES['upload_file'];

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$form = $_REQUEST['form'];

$to1      =  'kirillov@4card.cz';
$subject = 'Заявка на сайте '.$sppay;
$message = 'На сайт '.$_SERVER['SERVER_NAME'].' поступила новая заявка.<br><br>';

$message .= 'Имя : '.$name .'<br>';
$message .= 'Контактный телефон : '.$phone .'<br>';
$message .= 'E-mail : '.$email .'<br><br>';
//$message .= 'Форма : '.$form .'<br>';

$message .= 'Bílá "barevná" : '.$select1 .'<br>';
$message .= 'Matna : '.$select2 .'<br>';
$message .= 'Naklad : '.$naklad .'<br><br>';

$message .= 'Vyberte si tloušťku karty : '.$optionsRadios1 .'<br>';
$message .= 'Vyberte si typ potisku : '.$optionsRadios2 .'<br><br>';

$message .= 'Magnetická páska : '.$pers1 .'<br>';
$message .= 'Čárový kód: '.$pers2 .'<br>';
$message .= 'Stírací pole: '.$pers3 .'<br>';
$message .= 'Embosování / ražba: '.$pers4 .'<br>';
$message .= 'Podpisové pole: '.$pers5 .'<br>';
$message .= 'Číslování: '.$pers6 .'<br>';
$message .= 'Fóliotisk: '.$pers7 .'<br><br>';

$message .= 'S čipem/bez čipu: : '.$optionsRadios3 .'<br>';
$message .= 'Komment: : '.$komment .'<br><br>';

if(!isset($_FILES["upload_file"])) {
    foreach ($files as $file) {
        $message .= "Файл -  <a href='http://4card.cz/wp-content/themes/zerif-lite/lp/forms/{$file}'>Скачать</a><br><br>";
    }
}

$message .= 'utm_source : '.$utm_source .'<br>';
$message .= 'utm_medium : '.$utm_medium .'<br>';
$message .= 'utm_campaign : '.$utm_campaign .'<br>';
$message .= 'utm_content : '.$utm_content .'<br>';
$message .= 'utm_term : '.$utm_term .'<br><br>';


$message .= '<br>'.'IP Адрес : '.$_SERVER['REMOTE_ADDR'].'<br>';

$message .= '<br>Письмо отправлено автоматически и не требует ответа';
$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: ROBOT <robot@".$_SERVER['SERVER_NAME'].">\r\n";
if(mail($to1, $subject, $message, $headers)){
    header("Location: success ");
}
