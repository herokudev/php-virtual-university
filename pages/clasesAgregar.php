<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAdmin.php");

?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Agregar Clase</h1>
                <div class="p-3 bg-white ml-5 w-[80%]">
                    <p>Ingrese informacion de la nueva Clase</p>
                </div>
                <form class=" bg-white ml-5 w-[80%] p-5" action="../scripts/saveClase.php" method="post">
                    <div class="mt-2">
                        <span>Nombre de la materia</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="nombreClase" id="nombreClase" value="" placeholder="Ingresa nombre">
                        </div>
                    </div>                       
                    <div class="">
                        <span>Maestro para la clase</span>                        
                        <select class="w-[415] h-[52px] border-[1px] border-[#828282] bg-white p-3 mt-3 ml-3" name="id_maestro" id="id_maestro">            
                        <?php
                            $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
                            $sql = "SELECT id_usuario, nombreCompleto FROM maestrosList";
                            $result = $conn->query($sql);
                            echo "<option name='id_clase' value='-1'>Sin Asignar</option> "; 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option name='id_maestro' value='" . $row['id_usuario'] . "' >" . $row['nombreCompleto'] . "</option>";
                                }
                            }
                            $conn->close();
                        ?>
                        </select>  
                    </div>                    
                    <input class="bg-[#2F80ED] text-white w-[150px] h-[38px] mt-5 cursor-pointer" type="submit" value="Guardar Clase" name="submit">                
                </form> 
            </div>
        </div>
    </main>      
</body>
</html>