<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAdmin.php");
    if (isset($_GET['editarId'])) {
        $id = $_GET['editarId'];
        $_SESSION["editId"] = $id;
        //echo "Vamos a editar permisos de usuario con Id --> " . $id;
        $email = getUserEmail($id);
    }
?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Editar Permiso</h1>
                <div class="p-3 bg-white ml-5 w-[80%]">
                    <p>Aqui puede editar Rol del usuario</p>
                </div>
                <form class=" bg-white ml-5 w-[80%] p-5" action="../scripts/updatePermiso.php" method="post">
                    <div class="mt-2">
                        <span>Email del usuario</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="emailUsuario" id="emailUsuario" value="<?= $email?>" placeholder="Ingresa email">
                        </div>
                    </div>                       
                    <div class="">
                        <span>Rol del usuario</span>                        
                        <select class="w-[415] h-[52px] border-[1px] border-[#828282] bg-white p-3 mt-3 ml-3" name="id_rol" id="id_rol">
                            <option name='id_rol' value='1'>Administrador</option>
                            <option name='id_rol' value='2'>Maestro</option>
                            <option name='id_rol' value='3'>Alumno</option>
                        </select>
                    </div>
                    <div>
                    <p>Status usuario</p>
                      <input type="radio" id="Activo" name="user_status" value="Activo">
                      <label for="html">Activo</label>
                      <input type="radio" id="Inactivo" name="user_status" value="Inactivo">
                      <label for="css">Inactivo</label><br>
                    </div>                   
                    <input class="bg-[#2F80ED] text-white w-[150px] h-[38px] mt-5 cursor-pointer" type="submit" value="Guardar Clase" name="submit">                
                </form> 
            </div>
        </div>
    </main>      
</body>
</html>