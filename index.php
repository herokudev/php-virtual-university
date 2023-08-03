<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
</head>
<body>
    <main class="w-full h-screen bg-[#fff5d2] flex flex-col items-center">
        <img class="w-[300px] h-[275px]" src="./assets/logo.jpg" alt="log-icon">
        <div class="bg-white w-[350px] text-center">
            <p class="text-gray-500 pt-5">Bienvenido ingresa con tu cuenta</p>
            <form class="w-[330px] mt-8 max-w-[1200px]" action="./pages//verifyLogin.php" method="post">
                <div class="w-[300px] pl-2 mt-3 ml-[7%] rounded-lg flex items-center justify-between border-2 border-gray-400">                    
                    <input class="w-[280px] p-2 outline-none" type="email" name="email" id="email" placeholder="Email">
                    <img class="h-5 w-auto pl-2 pr-2" src="./assets/Email.svg" alt="email-icon">
                </div>
                <div class="w-[300px] pl-2 mt-3 ml-[7%] rounded-lg flex items-center justify-between border-2 border-gray-400">                    
                    <input class="w-[280px] p-2 outline-none" type="password" name="password" id="password" placeholder="Password">
                    <img class="h-5 w-auto pl-2 pr-2" src="./assets/Locked.svg" alt="pwd-icon">
                </div>
                <input class="bg-[#2F80ED] text-white pl-10 ml-[5%] mb-10 w-[295px] h-[38px] mt-6 rounded-lg" type="submit" value="Login" name="submit">        
            </form>               
        </div>
    </main>
    <?php
            session_start();
            $_SESSION["usuario"] = "";            
        ?>        
</body>
</html>