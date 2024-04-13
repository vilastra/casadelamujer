<?php
get_header();
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
?>


<?php
while (have_posts()) {
    the_post();
    $banner_donde_estamos = get_field('banner_donde_estamos');



?>


    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>" style="object-position: bottom; background-image: url(<?php echo $banner_donde_estamos ?>)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Donde estamos?</h2>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">


            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <a target="_blank" href="https://www.google.com/maps?ll=-33.389928,-70.697021&z=17&t=m&hl=es-419&gl=CL&mapclient=embed&q=Villarrica+2553+Renca+Regi%C3%B3n+Metropolitana">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Dirección:</h4>
                                <p>Villarrica 2553, Huamachuco 2, Renca</p>
                            </div>
                        </a>
                        <a href="mailto:info@casadelamujer.cl">
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Correo:</h4>
                                <p>info@casadelamujer.cl</p>
                            </div>
                        </a>
                        <a href="https://wa.me/+56945983265" target="_blank">
                            <div class="phone">
                                <i class="bi bi-whatsapp"></i>
                                <h4>Teléfono:</h4>
                                <p>+56 9 4598 3265</p>
                            </div>
                        </a>
                        <a target="_blank" href="https://www.facebook.com/casamujer.huamachuco?mibextid=ZbWKwL">
                            <div class="email">
                                <i class="bi bi-facebook"></i>
                                <h4>Facebook:</h4>
                                <p>casamujer.huamachuco</p>
                            </div>
                        </a>
                        <a target="_blank" href="https://instagram.com/casadelamujerhuamachuco?igshid=MzMyNGUyNmU2YQ==">
                            <div class="email">
                                <i class="bi bi-instagram"></i>
                                <h4>Instagram:</h4>
                                <p>@casadelamujerhuamachuco</p>
                            </div>
                        </a>


                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1867.6769868832866!2d-70.6997520662292!3d-33.38992505894815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c6bf6cc680a7%3A0xaa77aac085316630!2sVillarrica%202553%2C%20Renca%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses-419!2scl!4v1697940388212!5m2!1ses-419!2scl" frameborder="0" style="border:0; width: 100%; height: 490px;" allowfullscreen></iframe>
                </div>

            </div>

            <?php if (have_rows('galeria_donde_estamos')) { ?>
                <div class="section-title mt-5">
                    <h2>Galería</h2>
                </div>
                <div class="galeria-slider swiper mb-5">
                    <div class="swiper-wrapper align-items-center">

                        <?php
                        while (have_rows('galeria_donde_estamos')) {
                            the_row();
                            $imagen_galeria_donde_estamos = get_sub_field('imagen_galeria_donde_estamos');
                            $descripcion_imagen_donde_estamos = get_sub_field('descripcion_imagen_donde_estamos');

                        ?>
                            <div class="swiper-slide "><a href="<?php echo $imagen_galeria_donde_estamos ?>" data-fancybox="gallery-a" data-caption="<?php echo $descripcion_imagen_donde_estamos; ?>"> <img src="<?php echo  $imagen_galeria_donde_estamos ?>" class="img-fluid zoom" alt=""></a></div>

                        <?php
                        }
                        wp_reset_postdata();

                        ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php } ?>

            <?php if (have_rows('videos_donde_estamos')) { ?>
                <div class="section-title">
                    <h2>Videos</h2>
                </div>
                <div class="video-slider swiper mb-5">
                    <div class="swiper-wrapper align-items-center">
                        <?php
                        while (have_rows('videos_donde_estamos')) {
                            the_row();
                        ?>
                            <?php if (get_sub_field('video_interno_donde_estamos') != "") { ?>
                                <div class="swiper-slide mb-5"> <video style="background-color: #000;" width="100%" controls class="tm-mb-40">
                                        <source src="<?php echo get_sub_field('video_interno_donde_estamos') ?>" type="video/mp4">
                                    </video></div>
                            <?php } else if (get_sub_field('video_externo_donde_estamos') != "") { ?>
                                <div class="swiper-slide mb-5"> <?php the_sub_field('video_externo_donde_estamos'); ?></div>
                            <?php } ?>
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php } ?>

            <?php if (have_rows('enlaces_documentos_donde_estamos')) { ?>
                <div class="section-title">
                    <h2>Enlaces y Documentos</h2>
                </div>
                <div class="row mb-5">

                    <?php
                    while (have_rows('enlaces_documentos_donde_estamos')) {
                        the_row();

                    ?>
                        <?php if (get_sub_field('archivo_documento_nosotras') != "") { ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12"><a class="align-items-center btn-get-started animate__animated animate__fadeInUp scrollto h-100 w-100 text-center" download href="<?php echo get_sub_field('archivo_documento_donde_estamos') ?>"><?php echo get_sub_field('nombre_enlace_documento_donde_estamos') ?> <i class="bi bi-download"></i></a> </div>
                        <?php } else if (get_sub_field('enlace_externo_nosotras') != "") { ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12"><a class="align-items-center btn-get-started animate__animated animate__fadeInUp scrollto h-100 w-100 text-center" target="_blank" href="<?php echo get_sub_field('enlace_externo_donde_estamos') ?>"><?php echo get_sub_field('nombre_enlace_documento_donde_estamos') ?> <i class="bi bi-box-arrow-up-right"></i></a> </div>
                        <?php } ?>
                    <?php
                    }
                    wp_reset_postdata();

                    ?>

                </div>
            <?php } ?>

        </div>
    </section>



<?php };




wp_reset_postdata(); ?>


<?php get_footer(); ?>