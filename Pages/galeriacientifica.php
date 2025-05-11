<!DOCTYPE html>
<?php include "../PHPScripts/connection.php"; ?>
<html lang="es">
<head>
    <?php
        if(!isset($_SESSION["LOGGED-IN"])) header("location: ./accesoSocios.php");
    ?>
    <!-- Explicado en index.php -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../Images/icono.ico" type="image/x-icon">
    <title>Acceso a Socios - SOMICAN</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="../Styles/headerYFooter.css" /> <!-- Estilos principales -->
    <link rel="stylesheet" href="../Styles/galeriaCientifica.css">
    <link rel="stylesheet" href="../Styles/detallesSeta.css"> <!-- Estilos secundarios -->

    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" />

    <!-- Scripts -->
    <script type="text/javascript" src="../Scripts/buscador.js"></script> <!-- Implementa la funcionalidad del buscador en esta página -->
    <script type="text/javascript" src="../Scripts/detallesSeta.js"></script> <!-- Implementa la opción de ver los detalles de una seta en esta página -->
</head>

<header>
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
            <a href="./perfil.php" class="profile">
                <?php include "../PHPScripts/headerProfile.php"; ?>
            </a>
            <div class="social-media">
                <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                    <!-- SVG's de facebook, youtube y email para no perder calidad -->
                    <svg class="facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </a>
                <!-- Botón que al pinchar sobre el te redirige al canal de Youtube de Somican -->
                <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
                    <svg class="youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                    </svg>
                </a>
                <!-- Botón que al pinchar sobre el te redirige a la pgina de contacto de Somican -->
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
                <a href="">Galería Científica</a>
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
    <h1 class="titulo">Galería Científica</h1>
    <a class="subir-seta" href="./subirSetaCientifica.php">SUBIR UNA SETA</a>

    <div class="search-box">
        <input type="text" id="caja-de-busqueda" placeholder="Buscar..." maxlength="50">
        <img src="../Images/search-icon.png" alt="Búsqueda">
    </div>
    <div id="background-black-fade"></div>
    <div id="detalles-seta">
        <!-- SVG de la X para cerrar el panel, obtenido de la página antigua de somican -->
        <svg viewBox="0 0 352 512" id="detail-close" onclick="hideInfoPanel()">
            <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
        </svg>
        <div id="detail-image-container"><img id="detail-image" src="../Images/seta.jpg" draggable="false"/></div>
        <p id="detail-nombre-legado"></p>
        <p id="detail-nombre-determinado"></p>
        <p id="detail-nombre-cientifico"></p>
        <p id="detail-nombre-comun"></p>
        <p id="detail-fecha-recogida"></p>
        <p id="detail-lugar-recogida"></p>
        <p id="detail-habitat"></p>
        <p id="detail-altura-mar"></p>
        <p id="detail-olor"></p>
        <p id="detail-sabor"></p>
        <p id="detail-tipo-suelo"></p>
        <p id="detail-climatologia"></p>
        <p id="detail-observaciones"></p>
    </div>
    <div id="setas">
        <?php
        $consultaSeta = "SELECT * FROM retosomican.setas WHERE registrada = TRUE";
        $result = mysqli_query($_SESSION["SQL"], $consultaSeta);

        while ($row = mysqli_fetch_row($result)) {
            $consultaLegado = "SELECT * FROM retosomican.socios WHERE ID = $row[1]";
            $datosLegado = mysqli_fetch_row(mysqli_query($_SESSION["SQL"], $consultaLegado));
            $nombreLegado = $datosLegado[1] . " " . $datosLegado[2];

            echo "<div onclick=\"showInfoPanel($row[0], '$nombreLegado', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', '$row[12]', '$row[13]', '$row[14]')\">";
            echo "<img src='../Images/GaleriaCientifica/SETA_$row[0].png' alt='Icono' />";
            echo "<p class='nombreCientifico'>" . $row[4] . "</p>";
            echo "<p class='nombreComun'>" . $row[5] . "</p>";
            echo "<p class='fecha'>" . $row[6] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
    <span id="sin-resultados"></span>
</body>

<footer>
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
                <a href="">Galería Científica</a>
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