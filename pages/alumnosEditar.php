<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAdmin.php");

    if (isset($_GET['editarId'])) {
        $id = $_GET['editarId'];
        $_SESSION["editId"] = $id;
        $conn = new mysqli("localhost", "root", "", "php-university");
        $sql = "SELECT id_usuario, dni, nombre, apellido, email, direccion, fecha_nac FROM usuarios where id_usuario=$id";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["edit_dni"] = $row['dni'];
                $_SESSION["edit_nombre"] = $row['nombre'];
                $_SESSION["edit_apellido"] = $row['apellido'];
                $_SESSION["edit_email"] = $row['email'];
                $_SESSION["edit_direccion"] = $row['direccion']; 
                $_SESSION["edit_fecha_nac"] = $row['fecha_nac'];
            }
        }
        $conn->close();        
    }
    
?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Editar Alumno</h1>
                <div class="p-3 bg-white ml-5 w-[80%]">
                    <p>Aqui puede editar informacion de Alumno</p>
                </div>
                <form class=" bg-white ml-5 w-[80%] p-5" action="../scripts/updateAlumno.php" method="post">
                    <div class="">
                        <span>DNI</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#474747]">
                            <input class="ml-2 p-3 outline-none" type="text" name="dni" id="dni" value="<?= $_SESSION["edit_dni"]?>" placeholder="Ingresa la matricula">
                        </div>
                    </div>
                    <div class="mt-2">
                        <span>Correo Electronico</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="email" id="email" value="<?= $_SESSION["edit_email"]?>" placeholder="Ingresa email">
                        </div>
                    </div>
                    <div class="mt-2">
                        <span>Nombre(s)</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="firstName" id="firstName" value="<?= $_SESSION["edit_nombre"]?>" placeholder="Ingresa nombre(s)">
                        </div>
                    </div>            
                    <div class="mt-2">
                        <span>Apellido(s)</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="lastName" id="lastName" value="<?= $_SESSION["edit_apellido"]?>" placeholder="Ingresa apellido(s)">
                        </div>
                    </div>            
                    <div class="mt-2">
                        <span>Direccion</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="address" id="address" value="<?= $_SESSION["edit_direccion"]?>" placeholder="Ingresa direccion">
                        </div>
                    </div> 
                    <div class="mt-2">
                        <span>Fecha de Nacimiento</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="birthDate" id="birthDate" value="<?= $_SESSION["edit_fecha_nac"]?>" placeholder="dd/mm/yyyy">
                        </div>
                    </div>  
                    <input class="bg-[#2F80ED] text-white w-[150px] h-[38px] mt-5 cursor-pointer" type="submit" value="Guardar alumno" name="submit">
                
                </form> 
            </div>
        </div>
    </main>      
</body>
</html>