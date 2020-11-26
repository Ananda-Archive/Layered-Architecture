<?php
    session_start();
    if(isset($_SESSION['username'])) {
        header("Location: home.php");   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Library JQuery Untuk AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="loginForm">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"  placeholder="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"  placeholder="password">
        <button type="submit" id="login">Login</button>
    </form>

    <script>
        $(document).ready(function() {
            $("#login").click(function(e) {
                e.preventDefault()
                var user = {
                    username: $("#username").val(),
                    password: $("#password").val()
                }
                $.ajax({
                    type:"POST",
                    url:"../endpoint/Login.php",
                    data:user,
                    success: function(response) {
                        if(response.status==400) {
                            console.log("GAGAL LOGIN")
                        }
                        if(response.status==200) {
                            console.log("BERHASIL LOGIN")
                            window.location.href="../view/home.php"
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })
            })
        })
    </script>
</body>
</html>