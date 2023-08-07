<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAlumnos.php");
    
?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Calificaciones y mensajes de tus clases</h1>
                <div class="p-3 bg-white ml-5 w-[800px]">
                    <p>Calificaciones y mensajes de tus clases</p>
                </div>
                <table class="w-full border-collapse border border-slate-500 mt-5 ml-5">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr class=" text-left">
                            <th>#</th>
                            <th>Nombre de clases</th>
                            <th>Calificacion</th>
                            <th>Mensajes</th>                             
                        </tr>
                    </thead>
                    <tbody class="border-b-2 border-gray-100 bg-[#fff5d2]">
                    <?php
                            $userId = getUserId($_SESSION["email"]);
                            $conn = new mysqli("localhost", "root", "", "php-university");
                            $sql = "SELECT * FROM calificacionesList where id_usuario = $userId";
                            $result = $conn->query($sql); 
                            $line = 1;               
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id_clase'];
                                    echo "<tr>"
                                    . "<td>" . $line . "</td>"
                                    . "<td>" . $row['nombreClase'] . "</td>" 
                                    . "<td>" . $row['calificacion'] . "</td>" 
                                    . "<td>" . $row['mensaje'] . "</td>" 
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

