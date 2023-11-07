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
        <?php if (have_rows('galeria_servicio')) { ?>
            <div class="section-title">
                <h2>Galería</h2>

            </div>
        <?php } ?>
        <div class="servicios-slider swiper mb-5">
            <div class="swiper-wrapper align-items-center">

                <?php if (have_rows('galeria_servicio')) { ?>
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
                }
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

<?php };




wp_reset_postdata(); ?>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<?php get_footer(); ?>