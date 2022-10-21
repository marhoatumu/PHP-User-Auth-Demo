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
    $form_data = array($email, $password);
    $handle = fopen($filename, "rw");
    $success = true;

    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($data[1] == $email) {
            $username = $data[0];
            array_push($form_data, $username);
            fputcsv($handle, $form_data);
            //print_r($data);
            $success = true;
            break;
        }
        
    }
    fclose($handle);
    
    if ($success) {
        // they registration ok
        echo "User Successfully registered". "<br>";  
    }
    else {
        echo "Sorry, this user doesn't exists. Please try again.";
    }
}



