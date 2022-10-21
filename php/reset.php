<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];//complete this;
    $newpassword = $_POST['password'];  //complete this;

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password
    $filename = "../storage/users.csv";
    $filename2 = "../storage/users2.csv";
    $form_data = array($email, $password);
    $handle = fopen($filename, "r");
    $output = fopen($filename2, "w");

    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($data[1] == $email) {
            $username = $data[0];
            $form_data = array($username, $email, $password);
            continue;
        }
        fputcsv($output, $data);
    }
    fclose($handle);
    
    fputcsv($output, $form_data);
    fclose($output);
    
    rename("../storage/users2.csv","../storage/users.csv");

    header("location: ../forms/login.html");
}