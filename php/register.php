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

    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($data[0] !== $username || $data[1] !== $email) {
            fputcsv($handle, $form_data);
            //print_r($data);
            $success = true;
            break;
        }
        else {
            echo "Sorry, this user already exists. Please try again.";
        }
    }
    fclose($handle);
    
    if ($success) {
        // they registration ok
        echo "User Successfully registered". "<br>";  
    }
}

?>