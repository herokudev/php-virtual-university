<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuMaestros.php");
    $userId = getUserId($_SESSION["email"]);
    $nombreClase = getNombreClase($userId);
?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Alumnos de la clase <?= $nombreClase ?> </h1>
                <div class="p-3 bg-white ml-5 w-[800px]">
                    <p>Alumnos de la clase <?= $nombreClase ?> </p>
                </div>
                <table class="border-collapse border border-slate-500 mt-5 ml-5 w-[80%]">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr class=" text-left">
                            <th>#</th>
                            <th>Nombre de clases</th>
                            <th>Calificacion</th>
                            <th>Mensajes</th>  
                            <th>Acciones</th>                                                         
                        </tr>
                    </thead>
                    <tbody class="border-b-2 border-gray-100 bg-[#fff5d2]">
                    <?php
                            $userId = getUserId($_SESSION["email"]);
                            $claseId = getIdClase($userId);
                            $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
                            $sql = "SELECT * FROM calificacionesList where id_clase = $claseId";
                            $result = $conn->query($sql); 
                            $line = 1;               
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id_clase'];
                                    echo "<tr>"
                                    . "<td>" . $line . "</td>"
                                    . "<td>" . $row['nombreCompleto'] . "</td>" 
                                    . "<td>" . $row['calificacion'] . "</td>" 
                                    . "<td>" . $row['mensaje'] . "</td>" 
                                    . "<td><div class='flex gap-2'><p><a href='#'><img class='h-5 w-auto pr-3' src='../assets/edit_square.svg' alt='edit-icon'></a></p></div></td>"
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
    </main>      
</body>
</html>