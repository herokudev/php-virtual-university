<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/dbCommands.php");

    session_start();
    $userName = getUserName($_SESSION["email"]);

    if (!isset($_SESSION["admin"])) {
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
    <link href="../output.css" rel="stylesheet">
    <script src="../scripts/main.js" defer></script>    
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
                <p class="ml-6 text-lg font-bold text-gray-200">Administrador</p>
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
                    <span class="ml-4">MENU ADMINISTRACION</span>
                </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                    href="permisosList.php"
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
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                    ></path>
                    </svg>
                    <span class="ml-6">Permisos</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                    href="maestrosList.php"
                >
                    <img class="w-[30px] h-[30px]" src="../assets/group.svg" alt="maestros-icon">
                    <span class="ml-4">Maestros</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                    href="alumnosList.php"
                >
                    <img class="w-[30px] h-[30px]" src="../assets/school-bag.png" alt="alumnos-icon">
                    <span class="ml-4">Alumnos</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                    href="clasesList.php"
                >
                    <img class="w-[30px] h-[30px]" src="../assets/classroom.png" alt="clases-icon">
                    <span class="ml-4">Clases</span>
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
                <h1 class=" p-3 text-2xl ml-2">Lista de Maestros</h1>
                <div class="p-3 bg-white ml-5 w-[80%]">
                    <div class="flex items-center justify-between">
                        <p>Informacion de Maestros</p>
                        <a href='maestrosAgregar.php'><button class="bg-[#2995c6] text-white w-[150px] pt-2 pb-2">Agregar Mestro</button></a>
                    </div> 
                    <table class="w-full border-collapse border border-slate-500 mt-5">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr class=" text-left">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Fec. de Nacimiento</th>
                                <th>Clase Asignada</th>                                
                                <th>Acciones</th>                                
                            </tr>
                        </thead>
                        <tbody class="border-b-2 border-gray-100 bg-[#fff5d2]">
                        <?php
                                $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
                                $sql = "SELECT * from maestroslist";
                                $result = $conn->query($sql); 
                                $line = 1;               
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['id_usuario'];
                                        echo "<tr>"
                                        . "<td>" . $line . "</td>"
                                        . "<td>" . $row['nombreCompleto'] . "</td>" 
                                        . "<td>" . $row['email'] . "</td>" 
                                        . "<td>" . $row['direccion'] . "</td>" 
                                        . "<td>" . $row['fecha_nac'] . "</td>" 
                                        . "<td>" . $row['claseAsignada'] . "</td>" 
                                        . "<td><div class='flex gap-2'><p><a href='maestrosEditar.php?editarId=$id'><img class='h-5 w-auto pr-3' src='../assets/edit_square.svg' alt='edit-icon'></a></p><p><a href='maestrosBorrar.php?borrarId=$id'><img class='h-5 w-auto ml-3 pr-3' src='../assets/delete_icon.svg' alt='delete-icon'></a></p></div></td>"                                        
                                        . "</tr>";
                                        $line++;
                                    }
                                }
                                $conn->close();
                            ?>            
                        </tbody>
                    </table>             
                </div>
            </div>
        </div>
    </main>      
</body>
</html>