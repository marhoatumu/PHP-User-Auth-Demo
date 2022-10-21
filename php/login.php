<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];//finish this line
    $password = $_POST['password'];//finish this

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if email and password 
    from file match that which is passed from the form
    */
    $success = false;
    $username = false;
    $filename = "../storage/users.csv";    
    $handle = fopen($filename, "r");
    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($data[1] == $email && $data[2] == $password) {
            //print_r($data);
            $success = true;
            $username = $data[0];
            break;
        }
        else {
            // login failed
            header("location: ../forms/login.html");
        }
    }
    fclose($handle);
    
    if ($success) {
        // they logged in ok
        session_start();
        $_SESSION["username"] = $username;
        header("location: ..\dashboard.php");
    } 
}

?>
<!-- echo "HANDLE THIS PAGE"; -->