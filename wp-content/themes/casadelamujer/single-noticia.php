<?php
// require_once(ABSPATH . 'wp-admin/includes/media.php');
// require_once(ABSPATH . 'wp-admin/includes/file.php');
// require_once(ABSPATH . 'wp-admin/includes/image.php');
get_header(); ?>


<?php
while (have_posts()) {
    the_post();
    $titulo =  get_the_title();
    $sub_titulo_noticia = get_field('sub_titulo_noticia');
    $imagen_banner_noticia = get_field('imagen_banner_noticia');
    $texto_cuerpo_noticia = get_field('texto_cuerpo_noticia');
    $enlace_video_externo_noticia = get_field('enlace_video_externo_noticia');
    $video_noticia = get_field('video_noticia');

    // $url     = $imagen_banner_noticia;
    // $post_id = get_the_ID();
    // $image = media_sideload_image($url, $post_id, $titulo, 'id');

    // set_post_thumbnail($post_id, $image);

?>
    <div class="bannerContent">
        <img src="<?php echo  $imagen_banner_noticia ?>">
        <div class="container">
            <div class="subContainer">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $titulo; ?></h2>


            </div>
        </div>
    </div>
    <div class="container">
        <div class="section-title mt-5 mb-5">
            <p class="animate__animated animate__fadeInUp"><?php echo $sub_titulo_noticia; ?></p>
        </div>
        <div class="generalContent mb-5">
            <?php echo $texto_cuerpo_noticia; ?>
        </div>
        <?php if (get_field('boton_conoce_mas_noticia') != "") { ?>
            <div class="generalContent mb-5 text-center">
                <a class="btn-get-started animate__animated animate__fadeInUp scrollto keychainify-checked" target="_blank" href="<?php the_field('boton_conoce_mas_noticia'); ?>">Conoce más <i class="ps-1 bi bi-box-arrow-up-right"></i></a>
            </div>
        <?php } ?>
        <?php if (have_rows('galeria_noticia')) { ?>
            <div class="section-title">
                <h2>Galería</h2>

            </div>
            <div class="galeria-slider swiper mb-5">
                <div class="swiper-wrapper align-items-center">

                    <?php
                    while (have_rows('galeria_noticia')) {
                        the_row();
                        $imagen_galeria_noticia = get_sub_field('imagen_galeria_noticia');
                        $descripcion_imagen_galeria_noticia = get_sub_field('descripcion_imagen_galeria_noticia');

                    ?>
                        <div class="swiper-slide "><a href="<?php echo $imagen_galeria_noticia ?>" data-fancybox="gallery-a" data-caption="<?php echo $descripcion_imagen_galeria_noticia; ?>"> <img src="<?php echo  $imagen_galeria_noticia ?>" class="img-fluid zoom" alt=""></a></div>

                    <?php
                    }
                    wp_reset_postdata();

                    ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } ?>


        <?php if (have_rows('videos_noticia')) { ?>
            <div class="section-title">
                <h2>Videos</h2>
            </div>
            <div class="video-slider swiper mb-5">
                <div class="swiper-wrapper align-items-center">
                    <?php
                    while (have_rows('videos_noticia')) {
                        the_row();
                    ?>
                        <?php if (get_sub_field('video_interno_noticia') != "") { ?>
                            <div class="swiper-slide mb-5"> <video style="background-color: #000;" width="100%" controls class="tm-mb-40">
                                    <source src="<?php echo get_sub_field('video_interno_noticia') ?>" type="video/mp4">
                                </video></div>
                        <?php } else if (get_sub_field('video_externo_noticia') != "") { ?>
                            <div class="swiper-slide mb-5"> <?php the_sub_field('video_externo_noticia'); ?></div>
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
            <p class="text-center">Comparte esta noticia</p>
            <?php echo do_shortcode('[addtoany]'); ?>
        </div>


    </div>

<?php };




wp_reset_postdata(); ?>


<?php get_footer(); ?>