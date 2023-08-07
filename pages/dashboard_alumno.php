<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/dbCommands.php");

    session_start();
    $userName = getUserName($_SESSION["email"]);

    if (!isset($_SESSION["alumno"])) {
        require("nonauthorized.php");
        die();
    }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <script src="../scripts/main.js" defer></script>
    <link href="../output.css" rel="stylesheet">
    <title>University</title>
</head>
<body>
    <main class="flex h-screen">
        <aside
            class="h-screen z-20 hidden w-64 overflow-y-auto bg-[#384e77] md:block flex-shrink-0"
        >
            <div class="flex items-center">
                <img class="w-[50px] h-[50px] rounded-full mt-3 ml-3" src="../assets/logo_dhb.png" alt="logo-icon">
                <p class="text-gray-200 pl-3">Universidad</p>
            </div>
            <div class="py-4 text-gray-400">
            <div>
                <p class="ml-6 text-lg font-bold text-gray-200">Alumno</p>
                <p class="ml-6"><?= $userName ?></p>
            </div>  
            
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"
                ></span>
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200 text-gray-100"
                    href="#"
                >
                    <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    ></path>
                    </svg>
                    <span class="ml-4">MENU ALUMNO</span>
                </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                    href="alumnosNotas.php"
                >
                <img class="w-[30px] h-[30px]" src="../assets/education.png" alt="calificaciones-icon">
                    <span class="ml-4">Ver Calificaciones</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                    href="esquemaClases.php"
                >
                    <img class="w-[30px] h-[30px]" src="../assets/classroom.png" alt="clases-icon">
                    <span class="ml-4">Administra tus clases</span>
                </a>
                </li>
            </ul>
            </div>
        </aside>
        <div>
            <nav class="flex items-center justify-between w-[80%]">
                <div class="flex items-center">
                    <img class="w-[50px] h-[50px] rounded-full text-gray-400 p-3 mt-2" src="../assets/Menu.icon.png" alt="menu-icon">
                    <p class="text-gray-400">Home</p>
                </div>
                <div class="flex items-center">
                    <div class="text-gray-400"><p class="ml-6"><?= $userName ?></p></div>
                    <div><img id="togglebtn" class="w-[50px] h-[50px] rounded-full text-gray-400 p-3" src="../assets/expand_more.svg" alt="menu-icon"></div>
                    <div id="toggleBar">
                        <ul>
                            <li class="flex items-center h-[40px]">
                                <img class="h-5 w-auto pr-3" src="../assets/profile.svg" alt="profile-icon">
                                <a href="userProfile.php">Perfil</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="flex">
                            <img class="h-5 w-auto pr-3" src="../assets/logout.svg" alt="logout-icon">
                            <a href="logout.php" class=" text-[#EB5757]">Logout</a>
                        </div>
                    </div>                     
                </div>                
            </nav>
            <hr />
            <div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Dashboard</h1>
                <div class="p-3 bg-white ml-5 w-[800px]">
                    <p>Bienvenido</p>
                    <p>Selecciona la accion que deseas realizar en las pestañas del menu de la izquierda</p>
                </div>
            </div>
        </div>
    </main>      
</body>
</html>