<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fruticola Volcan</title>

    <link rel="icon" href="./assest/img/favicon.png">

    <!-- Estilo base -->
    <link rel="stylesheet" type="text/css" href="./assest/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./assest/css/style.css" />

    <!-- Custom styles -->
    <link rel="stylesheet" href="./assest/css/loginv2.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./api/bootstrap/css/bootstrap.css" />

    <!-- JS -->
    <script src="./assest/js/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="./api/bootstrap/js/bootstrap.min.js"></script>

    <!-- sweetalert -->
    <script src="./assest/js/sweetalert2@11.js"></script>

</head>

<body class="hold-transition sidebar-collapse sidebar-mini login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="./assest/img/volcan-foods-logo-original.png" alt="" height="50px">
        </div>
        <div class="card border-0">
            <div class="card-header bg-info text-white text-center text-uppercase">
                <img src="./assest/img/favicon.png" alt="" height="20px">
                Inicio de sesión <strong id="title_section"></strong>
            </div>
            <div class="card-body login-card-body">
                <!-- Tabs para seleccionar el tipo de login -->
                <ul class="nav nav-tabs" id="loginTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="fruta-tab" data-toggle="tab" href="#fruta" role="tab" aria-controls="fruta" aria-selected="true" style="color: black;">Fruta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="materiales-tab" data-toggle="tab" href="#materiales" role="tab" aria-controls="materiales" aria-selected="false" style="color: black;">Materiales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="exportadora-tab" data-toggle="tab" href="#exportadora" role="tab" aria-controls="exportadora" aria-selected="false" style="color: black;">Exportadora</a>
                    </li>
                </ul>

                <!-- Contenido de cada tab -->
                <div class="tab-content" id="loginTabContent">
                    <div class="tab-pane fade show active" id="fruta" role="tabpanel" aria-labelledby="fruta-tab" style="border: solid 1px rgba(0,0,0,0.1); padding: 10px;">
                        <!-- Formulario para Fruta -->
                        <form class="form" role="form" id="loginForm_fruta" name="form_reg_dato" onsubmit="enviarDatos(event)">
                            <input type="hidden" class="form-control" id="MODULO_FRUTA" name="MODULO" value="fruta">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="NOMBRE USUARIO" id="NOMBRE_FRUTA" name="NOMBRE" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="CONTRASEÑA" id="CONTRASENA_FRUTA" name="CONTRASENA" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group col-12 d-flex">
                                        
                                        <button type="submit" class="btn btn-success w-100" id="ENTRAR" name="ENTRAR">ENTRAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Login Materiales -->
                    <div class="tab-pane fade" id="materiales" role="tabpanel" aria-labelledby="materiales-tab" style="border: solid 1px rgba(0,0,0,0.1); padding: 10px;">
                        <!-- Formulario para Materiales -->
                        <form class="form" role="form" id="loginForm_material" name="form_reg_dato" onsubmit="enviarDatos(event)">
                            <input type="hidden" class="form-control" id="MODULO_MATERIAL" name="MODULO" value="material">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="NOMBRE USUARIO" id="NOMBRE_MATERIAL" name="NOMBRE" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="CONTRASEÑA" id="CONTRASENA_MATERIAL" name="CONTRASENA" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group col-12 d-flex">
                                       
                                        <button type="submit" class="btn btn-success w-100" id="ENTRAR" name="ENTRAR">ENTRAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Login Exportadora -->
                    <div class="tab-pane fade" id="exportadora" role="tabpanel" aria-labelledby="exportadora-tab" style="border: solid 1px rgba(0,0,0,0.1); padding: 10px;">
                        <!-- Formulario para exportadora -->
                        <form class="form" role="form" id="loginForm_exportadora" name="form_reg_dato" onsubmit="enviarDatos(event)">
                            <input type="hidden" class="form-control" id="MODULO_EXPORTADORA" name="MODULO" value="exportadora">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="NOMBRE USUARIO" id="NOMBRE_EXPORTADORA" name="NOMBRE" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="CONTRASEÑA" id="CONTRASENA_EXPORTADORA" name="CONTRASENA" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group col-12 d-flex">
                                        
                                        <button type="submit" class="btn btn-success w-100" id="ENTRAR" name="ENTRAR">ENTRAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>
</html>


<script>
        document.getElementById("loginForm_material").addEventListener("submit", function(e) {
            e.preventDefault(); // Prevenir que el formulario se envíe de manera tradicional

            // Capturar valores del formulario
            const nombreUsuario = document.getElementById("NOMBRE_MATERIAL").value;
            const contrasena = document.getElementById("CONTRASENA_MATERIAL").value;
            const modulo = document.getElementById("MODULO_MATERIAL").value;

            // Crear los datos a enviar
            const formData = new FormData();
            formData.append("NOMBRE", nombreUsuario);
            formData.append("CONTRASENA", contrasena);
            formData.append("ENTRAR", "ENTRAR"); // Valor del botón

            // Realizar la petición POST
            fetch("", { // Cambia a la URL de tu backend
                method: "POST",
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.text(); // O `response.json()` dependiendo del tipo de respuesta esperada
                } else {
                    throw new Error("Error en el inicio de sesión");
                }
            })
            .then(data => {
                // Manejar respuesta exitosa y redirigir
                console.log(data); // Aquí puedes manejar la respuesta del servidor si es necesario
                window.location.href = "./"+modulo+"/vista/iniciarSession.php"; // Redirige al dashboard o donde sea
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Fallo en el inicio de sesión");
            });
        });


        document.getElementById("loginForm_fruta").addEventListener("submit", function(e) {
            e.preventDefault(); // Prevenir que el formulario se envíe de manera tradicional

            // Capturar valores del formulario
            const nombreUsuario = document.getElementById("NOMBRE_FRUTA").value;
            const contrasena = document.getElementById("CONTRASENA_FRUTA").value;
            const modulo = document.getElementById("MODULO_FRUTA").value;

            // Crear los datos a enviar
            const formData = new FormData();
            formData.append("NOMBRE", nombreUsuario);
            formData.append("CONTRASENA", contrasena);
            formData.append("ENTRAR", "ENTRAR"); // Valor del botón

            // Realizar la petición POST
            fetch("", { // Cambia a la URL de tu backend
                method: "POST",
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.text(); // O `response.json()` dependiendo del tipo de respuesta esperada
                } else {
                    throw new Error("Error en el inicio de sesión");
                }
            })
            .then(data => {
                // Manejar respuesta exitosa y redirigir
                console.log(data); // Aquí puedes manejar la respuesta del servidor si es necesario
                window.location.href = "./"+modulo+"/vista/iniciarSession.php"; // Redirige al dashboard o donde sea
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Fallo en el inicio de sesión");
            });
        });


        document.getElementById("loginForm_exportadora").addEventListener("submit", function(e) {
            e.preventDefault(); // Prevenir que el formulario se envíe de manera tradicional

            // Capturar valores del formulario
            const nombreUsuario = document.getElementById("NOMBRE_EXPORTADORA").value;
            const contrasena = document.getElementById("CONTRASENA_EXPORTADORA").value;
            const modulo = document.getElementById("MODULO_EXPORTADORA").value;

            // Crear los datos a enviar
            const formData = new FormData();
            formData.append("NOMBRE", nombreUsuario);
            formData.append("CONTRASENA", contrasena);
            formData.append("ENTRAR", "ENTRAR"); // Valor del botón

            // Realizar la petición POST
            fetch("", { // Cambia a la URL de tu backend
                method: "POST",
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.text(); // O `response.json()` dependiendo del tipo de respuesta esperada
                } else {
                    throw new Error("Error en el inicio de sesión");
                }
            })
            .then(data => {
                // Manejar respuesta exitosa y redirigir
                console.log(data); // Aquí puedes manejar la respuesta del servidor si es necesario
                window.location.href = "./"+modulo+"/vista/iniciarSession.php"; // Redirige al dashboard o donde sea
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Fallo en el inicio de sesión");
            });
        });
    </script>
