<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Casa de la mujer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <!-- <h1 class="logo me-auto"><a href="index.html">Casa de la mujer</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?php echo get_site_url(); ?>" class="logo me-auto"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/logoPng.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="ps-3"><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>">Inicio</a></li>
                <li class="ps-3"><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>/nosotras/all/#nosotras">Nosotras</a></li>
                <!-- <li><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>/noticias#noticias">Noticias</a></li> -->
                <li class="ps-3"><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>/cursos#cursos">Cursos y Talleres</a></li>
                <li class="ps-3"><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>#services">Servicios para la comunidad</a></li>
                <li class="ps-3"><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>#team">Directorio y Equipo</a></li>
                <li class="ps-3"><a class="nav-link scrollto" href="<?php echo get_site_url(); ?>#contact">Contactanos</a></li>
                <li class="ps-3"><?php echo do_shortcode('[weglot_switcher]'); ?></li>
                <li class="ps-3"><a class="btnHeaderDonar" target="_blank" href="https://app.payku.cl/botonpago/index?idboton=25849&verif=a91e07d0">Dona</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<?php
// if (function_exists('the_custom_logo')) {
//     $custom_logo_id = get_theme_mod('custom_logo');
//     $logo = wp_get_attachment_image_src($custom_logo_id);
// }
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">