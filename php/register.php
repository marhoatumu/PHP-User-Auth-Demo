<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $form_data = array($username, $email, $password);
    $filename = "../storage/users.csv";
    $handle = fopen($filename, "a+");
    $success = true;

    fputcsv($handle, $form_data);
    fclose($handle);
    echo "User Successfully registered". "<br>";
}

?>