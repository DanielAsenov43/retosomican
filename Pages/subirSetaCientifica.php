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
    <link rel="stylesheet" href="../Styles/subirSetaCientifica.css">

    <!-- Fuente de google: Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" />

    <!-- Scripts -->
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
    <main> <!-- Contenedor principal de la página, con el título y el formulario -->
        <h1>Registrar una seta nueva</h1> 
        <form action="../PHPScripts/uploadScientific.php" method="POST"> <!-- Formulario que manda los datos a uploadScientific.php, explicado en ese archivo -->
            <div class="row"> <!-- El formulario contiene dos filas principales, una con los campos y otra con el botón de envío. -->
                <div class="column"> <!-- La primera fila contiene dos columnas verticales. La primera contiene campos obligatorios y la segunda campos opcionales. -->
                    <div class="hint">*obligatorio</div> <!-- Texto que indica qué campos son obligatorios -->
                     <!-- No hay mucho que explicar en este formulario, simplemente hay distintos campos con distintas restricciones. -->
                    <label for="nombre-cientifico">Nombre científico<span>*</span></label> <!-- El asterisco está dentro de un <span> para poder cambiar su color de forma independiente -->
                    <input type="text" name="nombre-cientifico" maxlength="64" required placeholder='Ej. "Agaricus benesii"' />

                    <label for="fecha">Fecha de recogida<span>*</span></label>
                    <input type="date" name="fecha" required />

                    <label for="lugar">Lugar de recogida<span>*</span></label>
                    <input type="text" name="lugar" maxlength="32" required placeholder='Ej. "Santander"' />

                    <label for="habitat">Hábitat<span>*</span></label>
                    <input type="text" name="habitat" maxlength="32" required placeholder='Ej. "Pinar"'/>

                    <label for="altura">Altura sobre el nivel del mar<span>*</span></label>
                    <input type="number" name="altura" min="0" max="8848" required placeholder='(metros)' />
                
                    <div class="upload-image"> <!-- Este <div> contiene una imagen de previsualización cuya fuente cambiará al subir una imagen, además de un <input> con los parámetros necesarios para que uploadImage.js funcione. -->
                        <img id="preview-image" alt="Foto" draggable="false">
                        <input type="file" accept="image/*" id="crop" aspectRatio="16/9" phpScript="../PHPScripts/uploadMushroomImage.php" sourceTag="SCIENTIFIC-PICTURE-SRC" preview="preview-image" text="Subir Foto*" required/>
                    </div>
                </div>
                <div class="column"> <!-- Esta columna contiene los campos opcionales. Los elementos son casi idénticos a la columna anterior. -->
                    <label for="nombre-comun">Nombre común</label>
                    <input type="text" name="nombre-comun" maxlength="64" placeholder='Ej. "Champiñón de escamas"' />

                    <label for="olor">Olor</label>
                    <input type="text" name="olor" maxlength="32" placeholder='Ej. "Lavanda"' />

                    <label for="sabor">Sabor</label>
                    <input type="text" name="sabor" maxlength="32" placeholder='Ej. "Harina"' />

                    <label for="suelo">Tipo de suelo</label>
                    <input type="text" name="suelo" maxlength="32" placeholder='Ej. "Suelo herboso"' />

                    <label for="clima">Climatología</label>
                    <input type="text" name="clima" maxlength="32" placeholder='Ej. "Templado"' />

                    <div class="observaciones"> <!-- <div> que contiene la etiqueta de observaciones y su caja de texto. -->
                        <label for="observaciones">Observaciones</label>
                        <textarea name="observaciones" maxlength="512"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-button"> <!-- Botón para enviar el formulario -->
                <button type="submit">ENVIAR</button>
            </div>
        </form>
    </main>
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