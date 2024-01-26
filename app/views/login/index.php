<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/> -->
    <!-- <link rel="stylesheet" href="<?= BASEURL; ?> /css/style2.css"> -->
</head>
<body>
    <div id="bg-img"></div>
        <div class="container">
            <div class="display">
                <div class="title">
                    <h1>SISTEM PENGECEKAN </h1>
                    <h1>TUGAS PRAKTIKUM</h1>
                </div>
                <div class="logo">
                    <img src="<?= BASEURL; ?>/img/logo.png" alt="SIPETA">   
                </div>                
            </div>

            <div class="container2">
                <h2>Login</h2>
                <form action="<?= BASEURL ?>/Log/login" method="post" autocomplete="off">
                    <div class="input-group">
                        <input type="text" id="username" name="username" required placeholder="Username">
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" required placeholder="Password">
                    </div>
                    <button type="submit">Login</button>
                    <a href="#">Lupa Kata Sandi?</a>
                </form>
            </div>
        </div>
</body>
</html>


    

