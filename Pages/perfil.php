<!DOCTYPE html>
<html lang="es">
<?php include "../PHPScripts/connection.php"; ?>
<head>
    <?php
        if(!isset($_SESSION["LOGGED-IN"])) {
            $_SESSION["NEXT"] = "../index.php";
            header("location: ./accesoSocios.php");
        }
    ?>
    <!-- Explicado en index.php -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../Images/icono.ico" type="image/x-icon">
    <title>Acceso a Socios - SOMICAN</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="../Styles/headerYFooter.css" /> <!-- Estilos principales -->
    <link rel="stylesheet" href="../Styles/perfil.css">

    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" />

    <!-- Scripts -->
    <script type="text/javascript" src="../Scripts/changeProfileInfo.js"></script> <!-- Implementa la funcionalidad del buscador en esta página -->
    <script type="text/javascript" src="../Scripts/uploadImage.js"></script> <!-- Implementa la opción de subir y recortar una imagen con una relación de aspecto fija -->
</head>

<header> <!-- Explicado en index.php -->
    <div class="header-top">
        <div class="left">
            <a href="https://www.somican.com">
                <img src="../Images/Logo.png" draggable="false" alt="Logo Somican" />
            </a>
        </div>
        <div class="middle">
            <h1>Sociedad Micológica Cántabra</h1>
        </div>
        <div class="right">
            <div class="social-media">
                <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                    <svg class="facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
                    <svg class="youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                    </svg>
                </a>
                <a href="https://somican.com/contacto/">
                    <svg class="email" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="header-bottom navigation-bar">
        <div class="dropdown">
            <h2>Somican +</h2>
            <div class="dropdown-content">
                <a href="https://somican.com/blog/">Noticias</a>
                <a href="https://somican.com/historia-la-sociedad-micologica-cantabra/">Historia</a>
                <a href="https://somican.com/socios-la-sociedad-micologica-cantabra/">Socios</a>
            </div>
        </div>
        <div class="dropdown">
            <h2>Galerías +</h2>
            <div class="dropdown-content">
                <a href="../index.php">Galería Artística</a>
                <a href="./galeriaCientifica.php">Galería Científica</a>
            </div>
        </div>
        <div class="button">
            <a href="https://somican.com/revista-micologia-yesca">Revista Yesca</a>
        </div>
        <div class="dropdown">
            <h2>Medios +</h2>
            <div class="dropdown-content">
                <a href="https://somican.com/biblioteca-micologia">Biblioteca</a>
                <a href="https://somican.com/enlaces-interes-micologia">Enlaces de Interés</a>
            </div>
        </div>
        <div class="button">
            <a href="https://somican.com/contacto">Contacto</a>
        </div>
    </div>
</header>

<body> <!-- El <body> está dividido en 2 partes: Los contenedores invisibles y el contenido principal -->
    <div id="change-profile-info"> <!-- Este div funciona de fondo transparente para el div interior -->
        <div class="container"> <!-- Este div actúa como fondo blanco para los formularios de cambio de información -->
            <div class="logo-container"> <!-- Logo del formulario en la parte superior -->
                <img src="../Images/logo.png" draggable="false" alt="Logo Somican"/>
            </div>
            <!-- Estos formularios se muestran/ocultan dependiendo de si le das a "Cambiar correo" o "Cambiar contraseña".
                 Esto es controlado por changeProfileInfo.js, así como la visibilidad de estos contenedores. -->
            <form id="change-email-form" action="../PHPScripts/changeEmail.php" method="POST"> <!-- Utilizamos POST para que la información no aparezca en el buscador -->
                <label for="email-old">Correo actual: </label>
                <input type="email" name="email-old" maxlength="32" required>

                <label for="email-new">Correo nuevo: </label>
                <input type="email" name="email-new" maxlength="32" required>

                <label for="password">Contraseña: </label>
                <input type="password" name="email-password" maxlength="32" required>

                <button type="submit">Cambiar correo</button>
            </form>
            <form id="change-password-form" action="../PHPScripts/changePassword.php" method="POST">
                <label for="password-old">Contraseña actual: </label>
                <input type="password" name="password-old" minlength="8" maxlength="16" required>

                <label for="password-old">Contraseña nueva: </label>
                <input type="password" name="password-new" minlength="8" maxlength="16" required>

                <label for="password-old">Confirmar contraseña nueva: </label>
                <input type="password" name="password-new-confirm" minlength="8" maxlength="16" required>

                <button type="submit">Cambiar contraseña</button>
            </form>
            <form id="add-phone-number-form" action="../PHPScripts/addPhoneNumber.php" method="POST">
                <label for="phone-number">Añade tu número de teléfono: </label>
                <input type="number" name="phone-number" minlength="9" maxlength="9" required>
                
                <button type="submit">Agregar el teléfono</button>
            </form>
        </div>
    </div>
    <!-- Contenido principal de esta página -->
    <main>
        <h1 class="page-title">Perfil de Socio</h1> <!-- Título -->

        <div class="profile-container"> <!-- Contenedor con la foto de perfil a la izquierda y la información a la derecha -->
            <div class="profile-picture-container"> <!-- Contenedor con la foto de perfil y el botón para cambiarla debajo -->
                <div class="profile-picture"> <!-- Contenedor de la imagen de perfil, cuyo contenido es generado con PHP para obtener la imagen del socio -->
                    <?php echo "<img id='profile-picture-image' src='../Images/FotosDePerfil/SOCIO_".$_SESSION["USER-ID"].".png' draggable='false'/>"; ?>
                </div>
                <!-- IMPORTANTE:
                Hemos creado un script (uploadImage.js) que detecta elementos <input> cuya ID sea "crop".
                Su funcionalidad está explicada en ese script, así como todos estos parámetros del elemento <input> -->
                <input type="file" accept="image/*" id="crop" aspectRatio="1" phpScript="../PHPScripts/changeProfilePicture.php" sourceTag="PROFILE-PICTURE-SRC" preview="profile-picture-image" dontHideLabel/>
            </div>
            <div class="profile-info-container"> <!-- Contenedor de la información del perfil, contiene el título y la información debajo -->
                <div class="profile-info"> <!-- Contenedor de información: Nombre, Apellidos y Correo -->
                    <div> <!-- NOMBRE -->
                        <span class="title">Nombre:</span> <!-- Este elemento siempre es el mismo -->
                        <?php echo "<span class='data'>".$_SESSION["USER-NAME"]."</span>"; ?> <!-- El contenido del nombre es generado por PHP. El resto de los <div>'s funcionan igual. -->
                    </div>
                    <div> <!-- APELLIDOS -->
                        <span class="title">Apellidos:</span>
                        <?php echo "<span class='data'>".$_SESSION["USER-SURNAME"]."</span>"; ?>
                    </div>
                    <div> <!-- EMAIL -->
                        <span class="title">Correo:</span>
                        <?php echo "<span class='data'>".$_SESSION["USER-EMAIL"]."</span>"; ?>
                    </div>
                    <div> <!-- TELÉFONO -->
                        <span class="title">Teléfono:</span>
                        <?php 
                        if (isset($_SESSION["USER-PHONE-NUMBER"])){
                            echo "<span class='data'>".$_SESSION["USER-PHONE-NUMBER"]."</span>"; 
                        } else {
                            echo "<button id='change-phone-number-button'>Añadir Teléfono</button>"; 
                        }
                        ?>
                    </div>
                    <div class="actions"> <!-- Div que contiene los botones de cambio de correo y contraseña -->
                        <button id="change-email-button">Cambiar correo</button> <!-- La funcionalidad de estos botones está controlada por changeProfileInfo.js -->
                        <button id="change-password-button">Cambiar contraseña</button>
                    </div>
                </div>
                <?php
                    // Script que comprueba si la variable de sesión "CHANGE-RESULT" contiene un mensaje.
                    // En caso afirmativo, genera un span con ese mensaje y lo borra.
                    // Esto es utilizado para saber si ha habido un error al poner la contraseña, cambiar el correo, etc.
                    if(isset($_SESSION["CHANGE-RESULT"])) {
                        echo "<div id='error-message'>".$_SESSION["CHANGE-RESULT"]."</div>";
                        unset($_SESSION["CHANGE-RESULT"]);
                    }
                ?>
            </div>
        </div>
        <div class="logout"> <!-- Div que contiene un botón para cerrar la sesión. -->
            <a href="../PHPScripts/logout.php">Cerrar Sesión</a>
        </div>
    </main>
</body>

<footer> <!-- Explicado en index.php -->
    <div class="top navigation-bar">
        <div class="dropdown">
            <h2>Somican +</h2>
            <div class="dropdown-content">
                <a href="https://somican.com/blog/">Noticias</a>
                <a href="https://somican.com/historia-la-sociedad-micologica-cantabra/">Historia</a>
                <a href="https://somican.com/socios-la-sociedad-micologica-cantabra/">Socios</a>
            </div>
        </div>
        <div class="dropdown">
            <h2>Galerías +</h2>
            <div class="dropdown-content">
                <a href="../index.php">Galería Artística</a>
                <a href="./galeriaCientifica.php">Galería Científica</a>
            </div>
        </div>
        <div class="button">
            <a href="https://somican.com/revista-micologia-yesca">Revista Yesca</a>
        </div>
        <div class="dropdown">
            <h2>Medios +</h2>
            <div class="dropdown-content">
                <a href="https://somican.com/biblioteca-micologia">Biblioteca</a>
                <a href="https://somican.com/enlaces-interes-micologia">Enlaces de Interés</a>
            </div>
        </div>
        <div class="button">
            <a href="https://somican.com/contacto">Contacto</a>
        </div>
    </div>
    <div class="middle">
        <div class="left">
            <div class="privacy">
                <a href="https://somican.com/aviso-legal/">LEGAL</a>
                <a href="https://somican.com/politica-de-privacidad/">POLÍTCA DE PRIVACIDAD</a>
                <a href="https://somican.com/cookies/">POLÍTICA DE COOKIES</a>
            </div>
            <div class="social-media">
                <a class="facebook" href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                    <svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </a>
                <a class="youtube" href="https://www.youtube.com/@SociedadMicologicaCantabra">
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="title">SOMICAN</div>
            <div class="subtitle">Sociedad Micológica Cántabra</div>
            <div class="description">Desde 1986 compartiendo la pasión</div>
            <div class="description">por la micología en Cantabria</div>
        </div>
        <div class="right">
            <div class="logo">
                <img src="../Images/logo-ayuntamiento.png" alt="Logo ayuntamiento" draggable="false" />
            </div>
            <div class="contact-info">
                <p class="title">CONTACTA CON NOSOTROS</p>
                <p>Sociedad Micológica Cántabra</p>
                <br />
                <p>Plaza Mª Blanchard 7-2 Bajo</p>
                <p>39600 Maliaño, CANTABRIA</p>
            </div>
            <div class="map">
                <iframe src="https://maps.google.com/maps?q=M%C2%AA%20Blanchard%20Malia%C3%B1o%20Somican&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" width="220" height="135"></iframe>
            </div>
        </div>
    </div>
    <div class="bottom">
        <span>© 2023. Bóxer Publicidad. Todos los derechos reservados.</span>
    </div>
</footer>

</html>
