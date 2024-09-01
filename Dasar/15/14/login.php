<?php 
session_start();
require 'functions.php';

// cek cookie 
if (isset($_COOKIE['lock'] ) && isset($_COOKIE['key'])){
    $lock = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username 
    if( $key === hash('sha256',$row['username'])){
        $_SESSION['login'] = true;
    }

}


if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}




if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND email = '$email'");

    // cek username

    if( mysqli_num_rows($result)===1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
       if( password_verify($password, $row["password"])) {
        // set session
        $_SESSION["login"] = true;

        // cek stay sign in

        if(isset($_POST['remember'])){
            // buat cookie

            setcookie('lock', $row['id'], time()+120);
            setcookie('key',hash('sha256',$row['username']), time()+120);
        }

        header("location: index.php");
        exit;
       }
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

form {
    display: flex;
    flex-direction: column;
}

h2 {
    margin-bottom: 20px;
    text-align: center;
}

label {
    margin-bottom: 5px;
    color: #333;
}

input[type="text"]{
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
input[type="password"]{
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

.remember {
    display: flex;

}
    </style>
</head>



<body>
    <h1>Login</h1>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Login</h2>
            <label for="username">Username :</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">password :</label>
            <input type="password" id="pasword" name="password" required>
            
            <label for="email">email:</label>
            <input type="email" id="email" name="email" >
            <?php  if (isset($error)):?>

    <p style="font: italic; color:red; ">Username atau password salah!</p>

    <?php endif?>
                <div class="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Stay sign in</label>
                    
                    </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>