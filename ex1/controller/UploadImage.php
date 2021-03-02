<?php
$img_path = 'C:/xampp/htdocs/ex1/view/image/';
if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $ext = explode('.', $file_name);
    $file_ext = strtolower(end($ext));
    $arr_ext = array('jpg', 'png', 'gif', 'jpeg', 'jfif');
    if (in_array($file_ext, $arr_ext) && !file_exists($img_path . $file_name)) {
        move_uploaded_file($tmp_name, $img_path . $file_name);
    }
}
?>

