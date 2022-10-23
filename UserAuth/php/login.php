<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}

function loginUser($email, $password){
    $file = fopen('C:\Users\DE-GLOWZ\Desktop\UserAuth\storage\users.csv', 'r');
    while(!feof($file)){
    $line = fgetcsv($file);
    if($line[1] == $email && $line[2] == $password){
        $_SESSION['username'] = $line[0];
header("Location: C:\Users\DE-GLOWZ\Desktop\UserAuth\storage\dashboard.php");
        exit();
 }

}

echo "<h2 style='color: red'> Invalid username or password </h2>";
fclose($file);
}



