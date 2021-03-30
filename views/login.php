<?php
require_once "../classes/user.php";

$user = new User;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="../views/assets/css/login.css">
    <title>Log in</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <div class="contents">
                    <h1><span>B</span>LEAF</h1>
                    <div class="card">
                        <div class="card-body">
                            <p>Log in</p>
                            <div class="row">
                                <div class="col-2">
                                    
                                </div>
                                <div class="col-8">
                                    <form action="" method="post">
                                        <label for="username">username</label>
                                        <input type="text" name="username" id="username" maxlength="15" minlength="3" required autofocus>
                                        <label for="password">password</label>
                                        <input type="password" name="password" id="password" maxlength="255" minlength="6" required>
                                        <div class="errorMessage">
                                            <?= $user->login() ?>
                                        </div>
                                        <button type="submit" name="login">Log in</button>
                                    </form>
                                    <div class="sign_up">
                                        <a href="../index.php">Sign up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>