<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/pages/menuAdmin.php");

?>

<div class=" bg-gray-200 h-screen w-screen">
                <h1 class=" p-3 text-2xl ml-2">Agregar Alumno</h1>
                <div class="p-3 bg-white ml-5 w-[80%]">
                    <p>Ingrese informacion de nuevo Alumno</p>
                </div>
                <form class=" bg-white ml-5 w-[80%] p-5" action="../scripts/saveAlumno.php" method="post">
                    <div class="">
                        <span>DNI</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#474747]">
                            <input class="ml-2 p-3 outline-none" type="text" name="dni" id="dni" value="" placeholder="Ingresa la matricula">
                        </div>
                    </div>
                    <div class="mt-2">
                        <span>Correo Electronico</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="email" id="email" value="" placeholder="Ingresa email">
                        </div>
                    </div>
                    <div class="mt-2">
                        <span>Nombre(s)</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="firstName" id="firstName" value="" placeholder="Ingresa nombre(s)">
                        </div>
                    </div>            
                    <div class="mt-2">
                        <span>Apellido(s)</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="lastName" id="lastName" value="" placeholder="Ingresa apellido(s)">
                        </div>
                    </div>            
                    <div class="mt-2">
                        <span>Direccion</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="address" id="address" value="" placeholder="Ingresa direccion">
                        </div>
                    </div> 
                    <div class="mt-2">
                        <span>Fecha de Nacimiento</span>
                        <div class="w-[415] h-[52px] border-[1px] border-[#828282]">
                            <input class="ml-2 p-3 outline-none" type="text" name="birthDate" id="birthDate" value="" placeholder="dd/mm/yyyy">
                        </div>
                    </div>  
                    <input class="bg-[#2F80ED] text-white w-[150px] h-[38px] mt-5 cursor-pointer" type="submit" value="Guardar alumno" name="submit">
                
                </form>                       
            </div>
        </div>
    </main>      
</body>
</html>