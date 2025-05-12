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
    <link rel="stylesheet" href="../Styles/resultadoSubirSeta.css">

    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" />
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
            <a href="./perfil.php" class="profile">
                <?php include "../PHPScripts/headerProfile.php"; ?>
            </a>
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

<body>
    <main> <!-- Elemento principal con todo el contenido de la página -->
        <?php
        // Este código genera un SVG principal dependiendo del resultado de subir la seta, guardado en $_SESSION["RESULT"]
        if(isset($_SESSION["RESULT"])) {
            // Guardamos los SVG's en variables para mantener el código limpio
            $SVG_SUCCESS = '<svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#6DC180;" cx="256" cy="256" r="256"></circle> <path style="fill:#5CA15D;" d="M256,0v512c141.385,0,256-114.615,256-256S397.385,0,256,0z"></path> <polygon style="fill:#F2F2F4;" points="219.429,367.932 108.606,257.108 147.394,218.32 219.429,290.353 355.463,154.32 394.251,193.108 "></polygon> <polygon style="fill:#DFDFE1;" points="256,331.361 394.251,193.108 355.463,154.32 256,253.782 "></polygon> </g></svg>';
            $SVG_ERROR = '<svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#FF6643;" cx="256" cy="256" r="256"></circle> <path style="fill:#FF4F19;" d="M256,0v512c141.385,0,256-114.615,256-256S397.385,0,256,0z"></path> <polygon style="fill:#F2F2F4;" points="365.904,184.885 327.115,146.096 256,217.211 184.885,146.096 146.096,184.885 217.211,256 146.096,327.115 184.885,365.904 256,294.789 327.115,365.904 365.904,327.115 294.789,256 "></polygon> <polygon style="fill:#DFDFE1;" points="365.904,184.885 327.115,146.096 256,217.211 256,294.789 327.115,365.904 365.904,327.115 294.789,256 "></polygon> </g></svg>';
            // <div> que contiene el SVG (tick o X) dependiendo del resultado de subir la seta
            echo '<div class="svg-container">';
            // Si el resultado contiene la clase "success", mostrar el SVG del tick. Si no, mostrar el de la X.
            echo (str_contains($_SESSION["RESULT"], "success")) ? $SVG_SUCCESS : $SVG_ERROR;
            echo "</div>";
            // Creamos el título y subtítulo dependiendo del resultado, con algún que otro contenedor para facilitar el CSS.
            echo "<h1>".$_SESSION['RESULT']."</h1>";
            echo "<div class='comment-container'><p>".$_SESSION['RESULT-COMMENT']."</p></div>";
        }
        ?>
        </div>

        <!-- <div> que contiene los botones para navegar a otras páginas. -->
        <div class="option-container"> <!-- Contiene <div>'s ordenados de forma horizontal -->
            <div class="option"> <!-- Cada opción tiene un enlace y un SVG sacado de la página que aparece en el comentario encima -->
                <a href="./subirSetaCientifica.php"> <!-- https://www.svgrepo.com/svg/97968/application-form -->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 197.737 197.737" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" d="M167.619,0h-137.5c-2.762,0-5,2.239-5,5v187.737c0,2.761,2.238,5,5,5h137.5c2.762,0,5-2.239,5-5V5 C172.619,2.239,170.38,0,167.619,0z M96.403,21.358h46.5c2.762,0,5,2.239,5,5c0,2.761-2.238,5-5,5h-46.5c-2.762,0-5-2.239-5-5 C91.403,23.597,93.641,21.358,96.403,21.358z M96.403,47.108h46.5c2.762,0,5,2.239,5,5c0,2.761-2.238,5-5,5h-46.5 c-2.762,0-5-2.239-5-5C91.403,49.347,93.641,47.108,96.403,47.108z M58.245,39.55c-1.881-1.382-3.109-3.602-3.109-6.109v-4.5 c0-4.181,3.402-7.583,7.584-7.583s7.583,3.402,7.583,7.583v4.5c0,2.507-1.228,4.728-3.109,6.109 c5.898,1.375,10.31,6.664,10.31,12.975c0,2.761-2.238,5-5,5H52.935c-2.762,0-5-2.239-5-5C47.935,46.214,52.347,40.925,58.245,39.55z M52.834,72.858h90.068c2.762,0,5,2.239,5,5c0,2.761-2.238,5-5,5H52.834c-2.762,0-5-2.239-5-5 C47.834,75.097,50.073,72.858,52.834,72.858z M52.834,98.608h90.068c2.762,0,5,2.239,5,5c0,2.761-2.238,5-5,5H52.834 c-2.762,0-5-2.239-5-5C47.834,100.847,50.073,98.608,52.834,98.608z M52.834,124.358h90.068c2.762,0,5,2.239,5,5 c0,2.761-2.238,5-5,5H52.834c-2.762,0-5-2.239-5-5C47.834,126.597,50.073,124.358,52.834,124.358z M78.084,170.251h-25.25 c-2.762,0-5-2.239-5-5c0-2.761,2.238-5,5-5h25.25c2.762,0,5,2.239,5,5C83.084,168.013,80.846,170.251,78.084,170.251z M144.903,170.251h-25.25c-2.762,0-5-2.239-5-5c0-2.761,2.238-5,5-5h25.25c2.762,0,5,2.239,5,5 C149.903,168.013,147.665,170.251,144.903,170.251z"></path></g></svg>
                </a>
                <span>Registrar otra seta</span> <!-- Texto debajo del botón -->
            </div>
            <div class="option">
                <a href="../index.php"> <!-- https://uxwing.com/art-icon/ -->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100.33 122.88" xml:space="preserve"><path fill="currentColor" d="M54.45,122.47c16.11-2.33,30.4-12.87,38.67-26.18c-0.66-0.1-1.32-0.29-1.96-0.56 c-2.06-0.9-3.54-2.58-4.25-4.54c-0.6-1.4-2.7-3.02-4.75-4.61c-5.82-4.5-11.46-8.88-10.23-19.03c0.26-2.11,0.96-4.28,2.01-6.26 L66.33,47.3c-0.44-0.81-0.72-1.66-0.86-2.52c-0.09-0.18-0.18-0.35-0.25-0.53c-2.18,1.21-4.53,2.39-7.17,3.22 c-13.8,4.34-23.2-1.87-12.36-16.12c7.41-9.74-8.94-18.56-23.43-8.72C10.41,30.66,0.18,48.29,0,67.68 C-0.25,95.74,24.34,126.82,54.45,122.47L54.45,122.47z M96.63,86.43c-3.12-8.28-15.78-10.09-14.57-20.07 c0.32-2.64,1.92-5.5,4.25-7.05c0.94-0.62,1.99-1.04,3.12-1.14c0.5-0.04,1.01-0.04,1.54,0.03c6.55,0.84,9.4,7.69,9.36,13.63 C100.29,77.31,98.21,82.78,96.63,86.43L96.63,86.43L96.63,86.43z M88.6,34.92c-5.11,0.43-9.74,1.77-13.85,4.11l-6-32.94 c-0.6-2.61-0.64-4.53,2.28-5.96c1.13-0.24,2.1-0.14,2.89,0.32c0.78,0.45,1.39,1.24,1.82,2.39L88.6,34.92L88.6,34.92L88.6,34.92z M90.59,53.97c-1.93-0.19-5.13,0.39-6.96,2.13L75.7,41.53c4.44-2.52,9.03-4.14,13.89-4.22C89.95,44.28,89.59,46.91,90.59,53.97 L90.59,53.97L90.59,53.97z M15.87,55.39c2.58,3.25,7.31,3.8,10.56,1.21s3.8-7.31,1.21-10.56c-2.58-3.25-7.3-3.8-10.56-1.21 C13.83,47.4,13.29,52.13,15.87,55.39L15.87,55.39L15.87,55.39z M61.67,97.29c2.89,3.64,8.2,4.25,11.85,1.36 c3.66-2.9,4.27-8.21,1.38-11.86C68,78.11,54.77,88.59,61.67,97.29L61.67,97.29L61.67,97.29z M33.58,105.71 c3.53,4.45,10,5.19,14.45,1.66c4.45-3.53,5.19-10,1.66-14.45c-3.53-4.45-10-5.19-14.45-1.66S30.05,101.26,33.58,105.71 L33.58,105.71L33.58,105.71z M13.46,83.23c3.05,3.85,8.66,4.49,12.51,1.44c3.85-3.05,4.5-8.65,1.44-12.51 c-3.05-3.85-8.66-4.49-12.51-1.44C11.05,73.78,10.41,79.38,13.46,83.23L13.46,83.23L13.46,83.23z"/></svg>
                </a>
                <span>Galería Artística</span>
            </div>
            <div class="option">
                <a href="./galeriaCientifica.php"> <!-- https://www.svgrepo.com/svg/91060/shopping-list -->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 494.64 494.64" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path fill="currentColor" d="M491.986,79.216c-2.775-4.641-7.351-7.895-12.631-8.957L199.171,2.712 c-9.234-1.79-18.344,3.311-21.54,12.134L70.833,286.161l35.654,12.993l101.21-257.977L451.144,103.3 c-15.204,47.134-51.383,145.512-86.064,237.112c-30.236,79.921-47.635,107.289-80.705,112.878 c-0.039-0.039-0.075-0.077-0.075-0.135c-67.586,9.474-66.373-76.688-66.373-76.688L2.076,289.276 C-13.263,386.5,61.443,409.884,61.443,409.884l158.033,71.75c0.038,0.02,24.708,11.771,51.521,10.563 c72.323-1.703,97.739-54.218,129.585-138.352c46.008-121.594,92.705-257.838,93.164-259.283 C495.392,89.407,494.742,83.847,491.986,79.216z"></path> <path fill="currentColor" d="M364.272,188.63c1.646,0.45,3.35,0.689,5.033,0.689c8.324,0,15.94-5.55,18.274-13.971 c2.774-10.115-3.216-20.564-13.317-23.32l-82.233-25.381c-9.989-2.765-20.555,3.177-23.311,13.282 c-2.757,10.114,3.178,20.564,13.318,23.33L364.272,188.63z"></path> <path fill="currentColor" d="M235.784,215.939c-3.296,9.962,2.055,20.69,11.989,24.015l81.802,29.232 c1.986,0.661,3.938,0.958,5.907,0.969c7.979,0.042,15.453-4.991,18.117-12.96c3.305-9.935-2.036-20.679-12.01-24.002 l-81.771-29.213C249.825,200.673,239.119,206.023,235.784,215.939z"></path> <path fill="currentColor" d="M228.587,283.185c-9.952-3.33-20.698,2.104-23.952,12.096c-3.272,9.914,2.182,20.67,12.134,23.923 l81.973,29.111c1.975,0.669,3.942,0.956,5.936,0.956c7.961,0,15.387-5.07,18.01-13.033c3.271-9.971-2.163-20.707-12.115-23.961 L228.587,283.185z"></path> <path fill="currentColor" d="M225.552,104.517c11.617,0,21.043,9.167,21.043,20.459c0,11.301-9.426,20.458-21.043,20.458 c-11.626,0-21.052-9.158-21.052-20.458C204.501,113.684,213.926,104.517,225.552,104.517z"></path> <path fill="currentColor" d="M195.783,180.572c11.627,0,21.043,9.158,21.043,20.449c0,11.282-9.416,20.439-21.043,20.439 c-11.626,0-21.052-9.157-21.052-20.439C174.731,189.731,184.157,180.572,195.783,180.572z"></path> <path fill="currentColor" d="M164.033,259.039c11.627,0,21.052,9.168,21.052,20.479c0,11.29-9.425,20.438-21.052,20.438 c-11.626,0-21.052-9.146-21.052-20.438C142.981,268.207,152.407,259.039,164.033,259.039z"></path></g></g></g></svg>
                </a>
                <span>Galería Científica</span>
            </div>
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
