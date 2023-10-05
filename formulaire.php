<?php
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login &signup form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class=" wrapper">
        <div class="title-text">
            <div class="title login">login form<form action=""></form></div>
            <div class="title signup">signup form<form action=""></form></div>
            <div class="form-container">
                <div class="slide-controls">
                    <label for="" class="slide login">Login</label>
                    <label for="" class="slide signup">Singn up</label>
                </div>
                <div class="form-inner">
                    <form action="#" class="login">
                        <div class="field">
                            <input type="text" placeholder="Email Address" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Password" required>
                        </div>
                        <div class="pass-link"><a href="#">Mot de place oublier?</a></div>
                        <div class="field">
                            <input type="submit" placeholder="Login">
                        </div>
                        <div class="signup-link">vous n'etes pas membre?<a href="#">S'inscrire</a></div>
                    </form>
                    <form action="#" class="signup">
                        <div class="field">
                            <input type="text" placeholder="Email Address" required>
                        </div>

                        <div class="field">
                            <input type="password" placeholder="Cinfirm password" required>
                        </div>

                        <div class="field">
                            <input type="password" placeholder="Password" required>
                        </div>
                        <div class="field">
                            <input type="submit" placeholder="Singnup">
                        </div>

                        <div class="signup-link">vous n'etes pas membre?<a href="#">S'inscrire</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>