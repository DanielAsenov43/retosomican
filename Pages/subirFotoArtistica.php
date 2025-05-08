<!DOCTYPE html>
<?php include "../PHPScripts/connection.php"; ?>
<html lang="es">
<head>
    <?php
        if(!isset($_SESSION["LOGGED-IN"])) header("location: ./accesoSocios.php");
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subir Setas - SOMICAN</title>

    <link rel="shortcut icon" href="../Images/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Styles/header.css" />
    <link rel="stylesheet" href="../Styles/footer.css" />
    <link rel="stylesheet" href="../Styles/subirSetaArtistica.css" />
    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    <script src="../Scripts/uploadImage.js"></script>
    <script src="../Scripts/subirFotoSeta.js"></script>
</head>

<header>
    <div class="header-top">
        <div class="left">
            <a href="../index.php">
                <img src="../Images/Logo.png" draggable="false" alt="Logo Somican"/>
            </a>
        </div>
        <div class="middle">
            <h1>Sociedad Micológica Cántabra</h1>
        </div>
        <div class="right">
            <a href="./profile.php" class="profile">
                <?php include "../PHPScripts/headerProfile.php"; ?>
            </a>
            <!-- Botón que al pinchar sobre el te redirige al Facebook de Somican -->
            <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                <!-- SVG's de facebook, youtube y email para no perder calidad -->
                <svg class="facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                </svg>
            </a>
            <!-- Botón que al pinchar sobre el te redirige al canal de Youtube de Somican -->
            <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
                <svg class="youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                </svg>
            </a>
            <!-- Botón que al pinchar sobre el te redirige a la pgina de contacto de Somican -->
            <a href="https://somican.com/contacto/">
                <svg class="email" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
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
    <!--main class="registro-container">
        <h1>Subir foto para la galería artística</h1>
        <form id="form-seta" method="POST" action="../PHPScripts/uploadArtistic.php">
            <div>
                <div class="subirFoto">
                    <input type="file" accept="image/*" id="crop" aspectRatio="16/9" phpScript="../PHPScripts/uploadMushroomImage.php" sourceTag="ARTISTIC-PICTURE-SRC"/>
                    <div id="imagePreview"></div>
                </div>
                <div class="observaciones">
                    <label>Comentario (opcional):</label>
                    <textarea name="comentario" rows="4" maxlength="512"></textarea>
                </div>
            </div>
            <div class="form-button">
                <button type="submit">SUBIR</button>
            </div>
        </form>
    </main-->
    <div id="container">
        <h1>Subir una foto artística</h1>
        <form action="../PHPScripts/uploadArtistic.php" method="POST">
            <div id="upload-image-container">
                <img id="preview-image" alt="" draggable="false">
                <input type="file" accept="image/*" id="crop" aspectRatio="16/9" phpScript="../PHPScripts/uploadMushroomImage.php" sourceTag="ARTISTIC-PICTURE-SRC" preview="preview-image" required/>
            </div>
            <div class="comment-container">
                <textarea name="comentario" rows="4" maxlength="512" placeholder="Comentario (opcional)"></textarea>
            </div>
            <div class="button-container">
                <button type="submit" id="upload-button">Subir Foto</button>
            </div>
        </form>
    </div>
</body>

<footer class="footer">
    <div class="footer-top">
        <div class="dropdown">
            <!-- Boton que se despliega al tener el cursor sobre él -->
            <h2>SOMICAN +</h2>
            <div class="dropdown-content">
                <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de sus noticias -->
                <a href="https://somican.com/blog/">NOTICIAS</a>
                <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de su historia -->
                <a href="https://somican.com/historia-la-sociedad-micologica-cantabra/">HISTORIA</a>
                <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican para consultar informacion respecto a los socios -->
                <a href="https://somican.com/socios-la-sociedad-micologica-cantabra/">SOCIOS</a>
            </div>
        </div>
    
        <div class="dropdown">
            <!-- Boton que se despliega al tener el cursor sobre él -->
            <h2>GALERÍAS +</h2>
            <div class="dropdown-content">
                <!-- Botón que al pinchar sobre él te redirige a nuestro Galería Artística -->
                <a href="">GALERIA ARTÍSTICA</a>
                <!-- Botón que al pinchar sobre él te redirige a nuestra Galeria Cientifica (será necesario acceder como socio para verla) -->
                <a href="./Pages/galeriacientifica.php">GALERIA CIENTÍFICA</a>
            </div>
        </div>
    
        <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de la Revista Yesca -->
        <div class="button">
            <a href="https://somican.com/revista-micologia-yesca/">REVISTA YESCA</a>
        </div>
        
    
        <div class="dropdown">
            <!-- Boton que se despliega al tener el cursor sobre él -->
            <h2>MEDIOS +</h2>
            <div class="dropdown-content">
                <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de su biblioteca -->
                <a href="https://somican.com/biblioteca-micologia/">BIBLIOTECA</a>
                <!-- Botón que al pinchar sobre él te redirige a la pagina de Somican de su historia -->
                <a href="https://somican.com/enlaces-interes-micologia/">ENLACES DE INTERÉS</a>
            </div>
        </div>
        
        <!-- Botón que al pinchar sobre el te redirige al canal de Youtube de Somican -->
        <div class="button">
            <a href="https://somican.com/contacto/">CONTACTO</a>
        </div>
        </div>

    <div class="footer-center">
        <div class="footer-left">
            <div class="enlaces">
                <a class="button" href="https://somican.com/aviso-legal/">LEGAL</a>
                <a class="button" href="https://somican.com/politica-de-privacidad/">POLÍTCA DE PRIVACIDAD</a>
                <a class="button" href="https://somican.com/cookies/">POLÍTICA DE COOKIES</a>
            </div>

            <div class="iconos">
                <a href="https://www.facebook.com/sociedad.micologicacantabra?locale=es_ES">
                    <svg class="facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                    </svg>
                </a>
                <a href="https://www.youtube.com/@SociedadMicologicaCantabra">
                    <svg class="youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                    </svg>
                </a>
            </div>
        </div>    
        
        <div class="footer-middle">
            <div class="text">
                <div class="name"><strong>SOMICAN</strong></div>
                <div><strong>Sociedad Micológica Cántabra</strong></div>
                <br>
                <div>Desde 1986 compartiendo la pasión por la micología en </div>
                <div>Cantabria.</div>
            </div>
        </div>

        <div class="footer-right">
            <div class="image">
                <img src="../Images/ayuntamiento-logo.png" alt="Ayuntamiento de Camargo" class="logoCamargo">
            </div>
            <div class="text">
                <h2>
                    <div class="button">
                        <a href="https://somican.com/contacto/">CONTACTA CON NOSOTROS</a>
                    </div>
                </h2>
                <div><strong>Sociedad Micológica de Cantabria</strong></div>
                <div>Plaza Mª Blanchard 7-2 bajo</div>
                <div>39600 Maliaño. CANTABRIA</div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div>©2023. Bóxer Publicidad. Todos los derechos reservados.</div>
    </div>
</footer>

</html>