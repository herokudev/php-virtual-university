<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAlumnos.php");

?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Esquema de Clases</h1>
                <div class="p-3 bg-white ml-5 w-[800px]">
                    <p>Tus materias inscritas</p>
                </div>
                <table class="w-[80%] border-collapse border border-slate-500 mt-5 ml-5">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr class=" text-left">
                            <th>#</th>
                            <th>Materia</th>
                            <th>Darse de baja</th>
                        </tr>
                    </thead>
                    <tbody class="border-b-2 border-gray-100 bg-[#fff5d2]">
                    <?php
                            $userId = getUserId($_SESSION["email"]);
                            $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
                            $sql = "SELECT * FROM asig_namesr3 where id_usuario = $userId";
                            $result = $conn->query($sql); 
                            $line = 1;               
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id_clase'];
                                    echo "<tr>"
                                    . "<td>" . $line . "</td>"
                                    . "<td>" . $row['nombreClase'] . "</td>" 
                                    . "<td><div class='flex gap-2'><p><a href='alumnosClaseBaja.php?borrarId=$id&userId=$userId'><img class='h-5 w-auto ml-3 pr-3' src='../assets/delete_icon.svg' alt='delete-icon'></a></p></div></td>"                                        
                                    . "</tr>";
                                    $line++;
                                }
                            }
                            $conn->close();
                        ?>            
                    </tbody>
                </table>   
                <table class="w-[80%] border-collapse border border-slate-500 mt-5 ml-5">
                    <thead class="bg-gray-50 border-b-2 border-gray-200 w-[80%]">
                        <tr class=" text-left">                  
                            <th>Materia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="border-b-2 border-gray-100 bg-[#fff5d2]">
                    <?php
                            $userId = getUserId($_SESSION["email"]);
                            $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
                            $sql = "select c.id_clase as claseId, c.nombre_clase, a.id_usuario, a.id_clase 
                            from clases c
                            left join asig_namesr3 a on c.id_clase = a.id_clase
                            where a.id_usuario is null";
                            $result = $conn->query($sql); 
                            $line = 1;               
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['claseId'];
                                    echo "<tr>"
                                    . "<td>" . $line . "</td>"
                                    . "<td>" . $row['nombre_clase'] . "</td>" 
                                    . "<td><div><p><a class='bg-[#2995c6] h-[50px] w-[150px] pl-2 pr-2 text-white cursor-pointer' href='alumnosInscribirClase.php?claseId=$id&userId=$userId'>Inscribir</a></p></div></td>"                                        
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