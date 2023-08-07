<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAdmin.php");

?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Editar Maestro</h1>
                <div class="p-3 bg-white ml-5 w-[800px]">
                    <p>Aqui puede editar informacion del Maestro</p>
                </div>
                <?php
                    if (isset($_GET['editarId'])) {
                        $id = $_GET['editarId'];
                        echo "Vamos a editar maestro usuario con Id --> " . $id;
                    }
                ?>                
            </div>
        </div>
    </main>      
</body>
</html>