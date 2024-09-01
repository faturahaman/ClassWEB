<?php 
require 'functions.php' ;

if(isset($_POST["register"])){

    if (registrasi($_POST)>0) {
        echo "
        <script>
        alert('user baru berhasil di tambahkan')
        
        </script>
        ";
    }else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}
    </style>
</head>
<body>
    <h1>
        Resgistrasi
    </h1>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
                <h2>Registrasi</h2>
                <label for="username">username :</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">email :</label>
                <input type="text" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="password">konfirmasi password:</label>
                <input type="password" id="password" name="password2" required>
    
                <button type="submit" name="register">register</button>
            </form>

    </div>
</body>
</html>