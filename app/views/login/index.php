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
            <form action="<?= BASEURL ?>/Log/login" method="post">
                <div class="input-group">
                    <input type="text" id="username" name="username" required placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" required placeholder="Password">
                </div>
                <!-- <div class="input-group">
                    <select id="role" name="role" >
                        <option value="" disabled selected>Role</option>
                        <option value="admin">Administrator</option>                       
                        <option value="Asisten">Asisten</option>
                        <option value="Praktikan">Praktikan</option>
                    </select>
                </div> -->
                <button type="submit">Login</button>
                <a href="#">Lupa Kata Sandi?</a>
            </form>
        </div>

  
    </div>
    

