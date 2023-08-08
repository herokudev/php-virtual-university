<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAdmin.php");

    if (isset($_GET['editarId'])) {
        $id = $_GET['editarId'];
        $_SESSION["editId"] = $id;
        $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
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
                <h1 class=" p-3 text-2xl ml-2">Editar Maestro</h1>
                <div class="p-3 bg-white ml-5 w-[80%]">
                    <p>Aqui puede editar informacion del Maestro</p>
                </div>
                <form class=" bg-white ml-5 w-[80%] p-5" action="../scripts/updateMaestro.php" method="post">
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
                    <div class="">
                        <span>Clase Asignada</span>                        
                        <select class="w-[415] h-[52px] border-[1px] border-[#828282] bg-white p-3 mt-3" name="id_clase" id="id_clase">            
                        <?php
                            $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
                            $sql = "SELECT id_clase, nombre_clase FROM clases";
                            $result = $conn->query($sql);
                            echo "<option name='id_clase' value='-1'>Selecciona Clase</option> "; 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option name='id_clase' value='" . $row['id_clase'] . "' >" . $row['nombre_clase'] . "</option>";
                                }
                            }
                            $conn->close();
                        ?>
                        </select>  
                    </div>                    
                    <input class="bg-[#2F80ED] text-white w-[150px] h-[38px] mt-5 cursor-pointer" type="submit" value="Guardar maestro" name="submit">                
                </form>             
            </div>
        </div>
    </main>      
</body>
</html>