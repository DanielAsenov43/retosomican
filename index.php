<!DOCTYPE html>
<html lang="es">
<?php include "./PHPScripts/connection.php"; ?>
<head>
    <?php if (isset($_SESSION["USER-NAME"])) echo '<script src="./Scripts/changeLoginButton.js"></script>'; ?>
    <meta name="index" content="true" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Título de la página -->
    <title>Galería Artística - SOMICAN</title>

    <!-- Hojas de estilos -->
    <link rel="stylesheet" href="./Styles/index.css">
    <link rel="stylesheet" href="./Styles/header.css" />
    <link rel="stylesheet" href="./Styles/footer.css" />
    <link rel="stylesheet" href="./Styles/detallesSeta.css">

    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    <script src="./Scripts/detallesFotoSeta.js"></script>
</head>

<header>
    <div class="header-top">
        <div class="left">
            <a href="">
                <img src="./Images/Logo.png" alt="Logo Somican" />
            </a>
        </div>
        <div class="middle">
            <h1>Sociedad Micológica Cántabra</h1>
            <a href="./Pages/accesoSocios.php" id="access-button">Acceso Socios</a>
        </div>
        <div class="right">
            <a href="./Pages/profile.php" class="profile">
                <img src="./Images/user.png"></img>
                <span class="username">Username</span>
            </a>
            <!-- Botón que al pinchar sobre el te redirige al Facebook de Somican -->
            <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                <!-- SVG's de facebook, youtube y email para no perder calidad -->
                <svg class="facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                    </path>
                </svg>
            </a>
            <!-- Botón que al pinchar sobre el te redirige al canal de Youtube de Somican -->
            <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
                <svg class="youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                    </path>
                </svg>
            </a>
            <!-- Botón que al pinchar sobre el te redirige a la pgina de contacto de Somican -->
            <a href="https://somican.com/contacto/">
                <svg class="email" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                    </path>
                </svg>
            </a>
        </div>
    </div>

    <div class="header-bottom">
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
                <a href="">Galería Artística</a>
                <a href="./Pages/galeriacientifica.php">Galería Científica</a>
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

<body>
    <h1 class="title">Galería Artística</h1>
    <?php
        if (isset($_SESSION["USER-EMAIL"])) echo '<a class="subir-seta" href="./Pages/subirFotoArtistica.php">SUBIR UNA FOTO</a>';
    ?>
    <div id="background-black-fade"></div>
    <div id="detalles-seta">
        <!-- SVG de la X para cerrar el panel, obtenido de la página antigua de somican -->
        <svg viewBox="0 0 352 512" id="detail-close" onclick="hideInfoPanel()">
            <path fill="currentColor"
                d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
            </path>
        </svg>
        <div id="detail-image-container"><img id="detail-image" draggable="false" alt="Seta" /></div>
        <p id="detail-comentario"></p>
    </div>

    <div id="gallery-container">
        <div class="gallery">
            <?php
            if (!session_id())
                session_start();
            // Crear y ejecutar una consulta que devuelve todas las setas registradas.
            $consulta = "SELECT * FROM retosomican.fotosSetas WHERE registrada = TRUE";
            $resultado = mysqli_query($_SESSION["SQL"], $consulta);
            // Bucle que pasa por todas las filas devueltas y crea elementos que contienen las setas
            while ($row = mysqli_fetch_row($resultado)) {
                echo '<div onclick="showInfoPanel(' . $row[0] . ', \'' . $row[3] . '\')">';
                echo "<img class='mushroom' src='./Images/GaleriaArtistica/SETA_$row[0].png' draggable='false' alt='Icono' />";
                echo "<img class='user' src='./Images/FotosDePerfil/SOCIO_$row[1].png' alt='Usuario' />";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

<footer class="footer">
    <nav>
        <ul>
            <li>
                <div class="footer-dropdown">
                    <!-- Boton que se despliega al tener el cursor sobre él -->
                    <button>SOMICAN +</button>
                    <div class="footer-dropdown-content">
                        <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de sus noticias -->
                        <a href="https://somican.com/blog/">NOTICIAS</a>
                        <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de su historia -->
                        <a href="https://somican.com/historia-la-sociedad-micologica-cantabra/">HISTORIA</a>
                        <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican para consultar informacion respecto a los socios -->
                        <a href="https://somican.com/socios-la-sociedad-micologica-cantabra/">SOCIOS</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="footer-dropdown">
                    <!-- Boton que se despliega al tener el cursor sobre él -->
                    <button>GALERÍAS +</button>
                    <div class="footer-dropdown-content">
                        <!-- Botón que al pinchar sobre él te redirige a nuestro Galería Artística -->
                        <a href="">GALERIA ARTÍSTICA</a>
                        <!-- Botón que al pinchar sobre él te redirige a nuestra Galeria Cientifica (será necesario acceder como socio para verla) -->
                        <a href="./Pages/galeriacientifica.php">GALERIA CIENTÍFICA</a>
                    </div>
                </div>
            </li>
            <li>
                <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de la Revista Yesca -->
                <a href="https://somican.com/revista-micologia-yesca/"><button>REVISTA YESCA</button></a>
            </li>
            <li>
                <div class="footer-dropdown">
                    <!-- Boton que se despliega al tener el cursor sobre él -->
                    <button>MEDIOS +</button>
                    <div class="footer-dropdown-content">
                        <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de su biblioteca -->
                        <a href="https://somican.com/biblioteca-micologia/">BIBLIOTECA</a>
                        <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de su historia -->
                        <a href="https://somican.com/enlaces-interes-micologia/">ENLACES DE INTERÉS</a>
                    </div>
                </div>
            </li>
            <li>
                <!-- Botón que al pinchar sobre el te redirige al canal de Youtube de Somican -->
                <a href="https://somican.com/contacto/"><button>CONTACTO</button></a>
            </li>
        </ul>
    </nav>


    <div class="footerIzquierda">
        <a class="simpleLinks" href="https://somican.com/aviso-legal/">LEGAL</a>
        <a class="simpleLinks" href="https://somican.com/politica-de-privacidad/">POLÍTCA DE PRIVACIDAD</a>
        <a class="simpleLinks" href="https://somican.com/cookies/">POLÍTICA DE COOKIES</a>
    </div>

    <div class="iconos">
        <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
            <svg class="facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                </path>
            </svg>
        </a>
        <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
            <svg class="youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                </path>
            </svg>
        </a>
    </div>

    <div class="footerCentro">
        <h2>SOMICAN</h2>
        <h3>Sociedad Micológica Cántabra</h3>
        <br>
        <p>Desde 1986 compartiendo la pasión por la micología en </p>
        <p>Cantabria.</p>
        <img src="../Images/ayuntamiento-logo.png" alt="Ayuntamiento de Camargo" class="logoCamargo">
    </div>

    <div class="footerContacto">
        <h3>
            <div class="simpleLinks"><a href="https://somican.com/contacto/"><button>CONTACTA CON NOSOTROS</button></a>
            </div>
        </h3>
        <p><strong>SOMICAN</strong></p>
        <p>Sociedad Micológica Cántabra</p>
        <p>Plaza Mª Blanchard 7-2 bajo</p>
        <p>39600 Maliaño. CANTABRIA</p>
    </div>
    </div>

    <div class="footerAbajo">
        <p>©2023. Bóxer Publicidad. Todos los derechos reservados.</p>
    </div>
</footer>

</html>

</html>