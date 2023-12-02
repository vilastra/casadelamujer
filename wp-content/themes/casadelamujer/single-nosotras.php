<?php

get_header(); ?>


<?php
while (have_posts()) {
    the_post();
    $titulo =  get_the_title();
    $sub_titulo_nosotras = get_field('sub_titulo_nosotras');
    $imagen_principal_nosotras = get_field('imagen_principal_nosotras');
    $texto_cuerpo_noticia = get_field('texto_cuerpo_noticia');

?>
    <div class="bannerContent" id="nosotras" class="nosotras">
        <img src="<?php echo  $imagen_principal_nosotras ?>">
        <div class="container">
            <div class="subContainer">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $titulo; ?></h2>


            </div>
        </div>
    </div>
    <div class="container">
        <div class="section-title mt-5 mb-5">
            <p class="animate__animated animate__fadeInUp"><?php echo $sub_titulo_nosotras; ?></p>
        </div>
        <div class="row align-items-center featured-services" id="featured-services">
            <?php if (get_field('mision_nosotras')) { ?>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 text-center">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-house"></i></div>
                        <h4 class="title">Nuestra misión</h4>

                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 col-xs-12"><?php echo get_field('mision_nosotras') ?></div>
            <?php } ?>
            <?php if (get_field('vision_nosotras')) { ?>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 text-center">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-gender-female"></i></div>
                        <h4 class="title">Nuestra visión</h4>

                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 col-xs-12"><?php echo get_field('vision_nosotras') ?></div>
            <?php } ?>
            <?php if (get_field('objetivo_nosotras')) { ?>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 text-center">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-flag"></i></div>
                        <h4 class="title">Nuestro objetivo</h4>

                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 col-xs-12"><?php echo get_field('objetivo_nosotras') ?></div>
            <?php } ?>
        </div>
        <div class="row mb-5">
            <div class="section-title">
                <h2>Nuestra Historia</h2>
            </div>
            <?php if (get_field('primer_parrafo_nosotras')) { ?>
                <div class="col-12"><?php echo get_field('primer_parrafo_nosotras') ?></div>
            <?php } ?>
            <?php if (get_field('imagen_segundo_parrafo_nosotras') && get_field('segundo_parrafo_nosotras')) { ?>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12"><?php echo get_field('segundo_parrafo_nosotras') ?></div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12"><img class="w-100" src="<?php echo get_field('imagen_segundo_parrafo_nosotras') ?>" alt=""> </div>
            <?php } else if (get_field('segundo_parrafo_nosotras')) { ?>
                <div class="col-12"><?php echo get_field('segundo_parrafo_nosotras') ?></div>
            <?php } ?>
            <?php if (get_field('tercer_parrafo_nosotras')) { ?>
                <div class="col-12"><?php echo get_field('tercer_parrafo_nosotras') ?></div>
            <?php } ?>
        </div>

        <?php if (have_rows('galeria_nosotras')) { ?>
            <div class="section-title">
                <h2>Galería</h2>
            </div>
            <div class="galeria-slider swiper mb-5">
                <div class="swiper-wrapper align-items-center">

                    <?php
                    while (have_rows('galeria_nosotras')) {
                        the_row();
                        $imagen_galeria_nosotras = get_sub_field('imagen_galeria_nosotras');
                        $descripcion_imagen_nosotras = get_sub_field('descripcion_imagen_nosotras');

                    ?>
                        <div class="swiper-slide "><a href="<?php echo $imagen_galeria_nosotras ?>" data-fancybox="gallery-a" data-caption="<?php echo $descripcion_imagen_nosotras; ?>"> <img src="<?php echo  $imagen_galeria_nosotras ?>" class="img-fluid zoom" alt=""></a></div>

                    <?php
                    }
                    wp_reset_postdata();

                    ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } ?>

        <?php if (have_rows('videos_nosotras')) { ?>
            <div class="section-title">
                <h2>Videos</h2>
            </div>
            <div class="video-slider swiper mb-5">
                <div class="swiper-wrapper align-items-center">
                    <?php
                    while (have_rows('videos_nosotras')) {
                        the_row();
                    ?>
                        <?php if (get_sub_field('video_interno_nosotras') != "") { ?>
                            <div class="swiper-slide mb-5"> <video style="background-color: #000;" width="100%" controls class="tm-mb-40">
                                    <source src="<?php echo get_sub_field('video_interno_nosotras') ?>" type="video/mp4">
                                </video></div>
                        <?php } else if (get_sub_field('video_externo_nosotras') != "") { ?>
                            <div class="swiper-slide mb-5"> <?php the_sub_field('video_externo_nosotras'); ?></div>
                        <?php } ?>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } ?>

        <?php if (have_rows('enlaces_documentos_nosotras')) { ?>
            <div class="section-title">
                <h2>Enlaces y Documentos</h2>
            </div>
            <div class="row mb-5">

                <?php
                while (have_rows('enlaces_documentos_nosotras')) {
                    the_row();
                    $imagen_galeria_nosotras = get_sub_field('imagen_galeria_nosotras');
                    $descripcion_imagen_nosotras = get_sub_field('descripcion_imagen_nosotras');

                ?>
                    <?php if (get_sub_field('archivo_documento_nosotras') != "") { ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12"><a class="align-items-center btn-get-started animate__animated animate__fadeInUp scrollto h-100 w-100 text-center" download href="<?php echo get_sub_field('archivo_documento_nosotras') ?>"><?php echo get_sub_field('nombre_enlace_documento_nosotras') ?> <i class="bi bi-download"></i></a> </div>
                    <?php } else if (get_sub_field('enlace_externo_nosotras') != "") { ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12"><a class="align-items-center btn-get-started animate__animated animate__fadeInUp scrollto h-100 w-100 text-center" target="_blank" href="<?php echo get_sub_field('enlace_externo_nosotras') ?>"><?php echo get_sub_field('nombre_enlace_documento_nosotras') ?> <i class="bi bi-box-arrow-up-right"></i></a> </div>
                    <?php } ?>
                <?php
                }
                wp_reset_postdata();

                ?>

            </div>
        <?php } ?>

        <div class="generalContent text-center mb-5">
            <p class="text-center">Comparte nuestra historia</p>
            <?php echo do_shortcode('[addtoany]'); ?>
        </div>
    </div>

<?php };




wp_reset_postdata(); ?>


<?php get_footer(); ?>