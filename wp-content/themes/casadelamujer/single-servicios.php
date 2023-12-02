<?php

get_header(); ?>


<?php
while (have_posts()) {
    the_post();
    $titulo =  get_the_title();
    $sub_titulo_servicios = get_field('sub_titulo_servicios');
    $imagen_servicio = get_field('imagen_servicio');
    $imagen_cuerpo_servicio = get_field('imagen_cuerpo_servicio');
    $descripcion_larga_servicios = get_field('descripcion_larga_servicios');
    $enlace_informacion_servicio = get_field('enlace_informacion_servicio');

?>
    <div class="bannerContent">
        <img src="<?php echo  $imagen_servicio ?>">
        <div class="container">
            <div class="subContainer">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $titulo; ?></h2>


            </div>
        </div>
    </div>
    <div class="container">
        <div class="section-title mt-5 mb-5">
            <p class="animate__animated animate__fadeInUp"><?php echo $sub_titulo_servicios; ?></p>
        </div>
        <div class="generalContent mb-5">
            <img class="d-none d-lg-block" src="<?php echo $imagen_cuerpo_servicio; ?>">
            <?php echo $descripcion_larga_servicios; ?>
        </div>
        <?php if (get_field('enlace_informacion_servicio') != "") { ?>
            <div class="generalContent mb-5 text-center">
                <a class="btn-get-started animate__animated animate__fadeInUp scrollto keychainify-checked" href="<?php echo $enlace_informacion_servicio["url"] ?>"><?php echo $enlace_informacion_servicio["title"] ?> <i class="ps-1 bi bi-box-arrow-up-right"></i></a>
            </div>
        <?php } ?>
        <?php if (have_rows('galeria_servicio')) { ?>
            <div class="section-title">
                <h2>Galería</h2>

            </div>
            <div class="galeria-slider swiper mb-5">
                <div class="swiper-wrapper align-items-center">

                    <?php
                    while (have_rows('galeria_servicio')) {
                        the_row();
                        $imagen_galeria_servicio = get_sub_field('imagen_galeria_servicio');
                        $descripcion_imagen_galeria_servicio = get_sub_field('descripcion_imagen_galeria_servicio');

                    ?>
                        <div class="swiper-slide "><a href="<?php echo $imagen_galeria_servicio ?>" data-fancybox="gallery-a" data-caption="<?php echo $descripcion_imagen_galeria_servicio; ?>"> <img src="<?php echo  $imagen_galeria_servicio ?>" class="img-fluid zoom" alt=""></a></div>

                    <?php
                    }
                    wp_reset_postdata();

                    ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } ?>

        <?php if (have_rows('videos_servicio')) { ?>
            <div class="section-title">
                <h2>Videos</h2>
            </div>
            <div class="video-slider swiper mb-5">
                <div class="swiper-wrapper align-items-center">
                    <?php
                    while (have_rows('videos_servicio')) {
                        the_row();
                    ?>
                        <?php if (get_sub_field('video_interno_servicio') != "") { ?>
                            <div class="swiper-slide mb-5"> <video style="background-color: #000;" width="100%" controls class="tm-mb-40">
                                    <source src="<?php echo get_sub_field('video_interno_servicio') ?>" type="video/mp4">
                                </video></div>
                        <?php } else if (get_sub_field('video_externo_servicio') != "") { ?>
                            <div class="swiper-slide mb-5"> <?php the_sub_field('video_externo_servicio'); ?></div>
                        <?php } ?>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } ?>
        <div class="generalContent text-center mb-5">
            <p class="text-center">Comparte este servicio</p>
            <?php echo do_shortcode('[addtoany]'); ?>
        </div>
    </div>

<?php };




wp_reset_postdata(); ?>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<?php get_footer(); ?>