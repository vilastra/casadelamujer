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
                <img src="<?php echo $imagen_cuerpo_servicio; ?>">
                <p><?php echo $descripcion_larga_servicios; ?></p>
        </div>


    </div>
<?php };




wp_reset_postdata(); ?>


<?php get_footer(); ?>