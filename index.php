<!DOCTYPE html>
<html lang="es">
<?php include "./PHPScripts/connection.php"; ?>
<head>
    <meta charset="UTF-8" /> <!-- Establecer el tipo de caracteres que utiliza la web -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Adaptación de la web a los distintos tipos de pantalla -->
    <link rel="shortcut icon" href="./Images/icono.ico" type="image/x-icon"> <!-- Icono de la web que aparece en la pestaña al lado del texto -->

    <!-- Título de la página -->
    <title>Galería Artística - SOMICAN</title>

    <!-- Hojas de estilos -->
    <link rel="stylesheet" href="./Styles/headerYFooter.css" /> <!-- Estilos principales -->
    <link rel="stylesheet" href="./Styles/index.css">
    <link rel="stylesheet" href="./Styles/detallesSeta.css"> <!-- Otros estilos -->

    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" />

    <!-- Scripts -->
    <script src="./Scripts/detallesFotoSeta.js"></script> <!-- Implementa la opción de ver la foto y el comentario de una seta al darle click -->
</head>

<header> <!-- Elemento que contiene toda la parte superior de la web, incluída la barra de navegación -->
    <div class="header-top"> <!-- El header está dividido en 2 partes: header-top y header-bottom -->
        <div class="left"> <!-- El header-top está dividido en 3 partes: left, middle y right -->
            <a href="https://www.somican.com"> <!-- La parte izquierda contiene el logo de somican -->
                <img src="./Images/Logo.png" draggable="false" alt="Logo Somican" />
            </a>
        </div>
        <div class="middle"> <!-- La parte central contien el título de la página -->
            <h1>Sociedad Micológica Cántabra</h1>
        </div>
        <div class="right"> <!-- La parte derecha contiene el perfil y las redes sociales -->
            <a href="./Pages/perfil.php" class="profile"> <!-- El contenido del perfil (Imagen y nombre) se generan con PHP para comprobar si se ha inciado sesión. -->
                <?php include "./PHPScripts/headerProfile.php"; ?> <!-- Es necesario para mostrar la foto de perfil y el nombre, o la foto por defecto e "Iniciar Sesión" -->
            </a>
            <div class="social-media"> <!-- Div que contiene los iconos de las redes sociales al lado del perfil -->
                <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                    <!-- Un SVG (Scalable Vector Graphic) es una imagen creada de forma matemática con puntos y vectores que permite no perder
                     calidad al cambiar su tamaño o realizar transformaciones. Hemos obtenido estos SVG's directamente de la página oficial de somican. -->
                    <svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"> <!-- SVG de Facebook. El atributo fill="currentColor" permite colorearlo más facilmente con CSS. -->
                        <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"> <!-- SVG de YouTube -->
                        <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                    </svg>
                </a>
                <a href="https://somican.com/contacto/">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"> <!-- SVG del Email de Somican. El enlace te lleva directamente a su página de contacto -->
                        <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="header-bottom navigation-bar"> <!-- La parte inferior del header es la barra de navegación -->
        <div class="dropdown"> <!-- Esta barra contiene 2 tipos de <div>: .dropdown y .button. El dropdown contiene sub-enlaces, y el botón te lleva directamente a algún lugar. -->
            <h2>Somican +</h2> <!-- Título del dropdown, no es un enlace -->
            <div class="dropdown-content"> <!-- Contenedor de los enlaces del dropdown. Se pueden añadir o quitar fácilmente. -->
                <a href="https://somican.com/blog/">Noticias</a>
                <a href="https://somican.com/historia-la-sociedad-micologica-cantabra/">Historia</a>
                <a href="https://somican.com/socios-la-sociedad-micologica-cantabra/">Socios</a>
            </div>
        </div>
        <div class="dropdown"> <!-- El resto de los dropdowns son iguales -->
            <h2>Galerías +</h2>
            <div class="dropdown-content">
                <a href="">Galería Artística</a>
                <a href="./Pages/galeriaCientifica.php">Galería Científica</a>
            </div>
        </div>
        <div class="button"> <!-- El botón simplemente contiene un enlace -->
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
    <main>
        <h1 id="page-title">Galería Artística</h1>
        <?php
            if (isset($_SESSION["LOGGED-IN"])) echo '<a class="subir-seta" href="./Pages/subirFotoArtistica.php">SUBIR UNA FOTO</a>';
        ?>
        <div id="background-black-fade"></div>
        <div id="detalles-seta">
            <!-- SVG de la X para cerrar el panel, obtenido de la página antigua de somican -->
            <svg viewBox="0 0 352 512" id="detail-close" onclick="hideInfoPanel()">
                <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
            </svg>
            <div id="detail-image-container">
                <img id="detail-image" draggable="false" alt="Seta" />
            </div>
            <div class="detail-comment-container">
                <img src="./Images/user-default.png" id="detail-profile-picture" draggable="false" alt="Foto de Perfil">
                <span id="detail-comment"></span>
            </div>
        </div>

        <div id="gallery-container">
            <div class="gallery">
                <?php
                if (!session_id())
                    session_start();
                // Crear y ejecutar una consulta que devuelve todas las setas registradas.
                $query = "SELECT * FROM retosomican.fotosSetas WHERE registrada = TRUE";
                $result = mysqli_query($_SESSION["SQL"], $query);
                // Bucle que pasa por todas las filas devueltas y crea elementos que contienen las setas
                while ($row = mysqli_fetch_row($result)) {
                    echo '<div onclick="showInfoPanel('.$row[0].', '.$row[1].', \''.$row[3].'\')">';
                    echo "<img class='mushroom' src='./Images/GaleriaArtistica/SETA_$row[0].png' draggable='false' alt='Icono' />";
                    echo "<img class='user' src='./Images/FotosDePerfil/SOCIO_$row[1].png' alt='Usuario' />";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </main>
</body>

<footer> <!-- Elemento que contiene toda la parte inferior de la web. Está dividida en 3 partes: top, middle y bottom. -->
    <div class="top navigation-bar">  <!-- El top contiene la misma barra de navegación que el <header>. Ya se ha explicado ahí. -->
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
                <a href="./Pages/galeriaCientifica.php">Galería Científica</a>
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
    <div class="middle"> <!-- La parte central se divide en 3 partes: left, center y right. -->
        <div class="left"> <!-- La parte izquierda contiene los enlaces de privacidad y las redes sociales -->
            <div class="privacy">  <!-- Los enlaces de privacidad están en un contenedor y tienen forma de botón -->
                <a href="https://somican.com/aviso-legal/">LEGAL</a>
                <a href="https://somican.com/politica-de-privacidad/">POLÍTCA DE PRIVACIDAD</a>
                <a href="https://somican.com/cookies/">POLÍTICA DE COOKIES</a>
            </div>
            <div class="social-media"> <!-- Las redes sociales están en un contenedor y contienen los mismos SVG's que el header, explicados anteriormente. -->
                <a class="facebook" href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES"> <!-- SVG de Facebook -->
                    <svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </a>
                <a class="youtube" href="https://www.youtube.com/@SociedadMicologicaCantabra"> <!-- SVG de YouTube -->
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="center"> <!-- La parte central contiene el título y texto descriptivo -->
            <div class="title">SOMICAN</div> <!-- El título es más grande que el resto -->
            <div class="subtitle">Sociedad Micológica Cántabra</div>
            <div class="description">Desde 1986 compartiendo la pasión</div>
            <div class="description">por la micología en Cantabria</div>
        </div>
        <div class="right"> <!-- La parte derecha contiene el logo del ayuntamiento, información de contacto y el mapa. -->
            <div class="logo"> <!-- El logo del ayuntamiento está en un contenedor para centrarlo más facilmente -->
                <img src="./Images/logo-ayuntamiento.png" alt="Logo ayuntamiento" draggable="false" />
            </div>
            <div class="contact-info"> <!-- La información de contacto tiene casi la misma estructura que el centro del footer -->
                <p class="title">CONTACTA CON NOSOTROS</p>
                <p>Sociedad Micológica Cántabra</p>
                <br />
                <p>Plaza Mª Blanchard 7-2 Bajo</p>
                <p>39600 Maliaño, CANTABRIA</p>
            </div>
            <div class="map"> <!-- El mapa lo hemos sacado de: https://www.googlemapsiframegenerator.com -->
                <iframe src="https://maps.google.com/maps?q=M%C2%AA%20Blanchard%20Malia%C3%B1o%20Somican&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" width="220" height="135"></iframe>
            </div>
        </div>
    </div>
    <div class="bottom"> <!-- La parte inferior contiene el copyright. -->
        <span>© 2023. Bóxer Publicidad. Todos los derechos reservados.</span>
    </div>
</footer>

</html>