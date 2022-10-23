<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
$form_data = array(
    'fullname' => $username,
    'email' => $email,
    'password' => $password
);

if(checkUserExist($email)){
    echo "User already exists";
}else{
    $file = fopen('C:\Users\DE-GLOWZ\Desktop\UserAuth\storage\users.csv', 'a');
    fputcsv($file, $form_data);
    fclose($file);
    echo "user registered successfully";
}
}

function checkUserExist($email){
$file = fopen('C:\Users\DE-GLOWZ\Desktop\UserAuth\storage\users.csv', 'r');
while(ifeof($file)){
$line = fgetcsv($file);
if($line[1] == $email){
    return true;
}
}

return false;
}


