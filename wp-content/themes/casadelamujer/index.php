<?php get_header(); ?>

<!DOCTYPE html>
<html lang="en">


<body>

    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <?php
                $args = array(
                    'post_type' => 'CarruselInicio',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    $i = 0;
                    while ($query->have_posts()) :
                        $query->the_post();
                        $titulo = get_field('enlace_elemento_carrusel');
                ?>
                        <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>" style="object-position: bottom; background-image: url(<?php echo get_field('imagen_elemento_carrusel') ?>)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown"><?php echo get_the_title($query->ID) ?></h2>
                                    <p class="animate__animated animate__fadeInUp"><?php echo get_field('descripcion_elemento_carrusel'); ?></p>
                                    <?php if (get_field('enlace_elemento_carrusel') != '') { ?>
                                        <a href="<?php echo get_field('enlace_elemento_carrusel'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"><?php echo get_field('boton_elemento_carrusel'); ?></a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                } else {
                }
                ?>



            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section>

    <main id="main">

        <section id="featured-services" class="featured-services section-bg">
            <div class="container">
                <?php
                $mision_nosotras = "";
                $vision_nosotras = "";
                $objetivo_nosotras = "";
                $sub_titulo_nosotras = "";
                $primer_parrafo_nosotras = "";
                $imagen_principal_nosotras = "";
                $enlace_nosotras = "";

                $args = array(
                    'post_type' => 'quienessomos',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'

                );
                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    $i = 0;
                    while ($query->have_posts()) :
                        $query->the_post();
                        $mision_nosotras = get_field('mision_nosotras');
                        $vision_nosotras = get_field('vision_nosotras');
                        $objetivo_nosotras = get_field('objetivo_nosotras');
                        $sub_titulo_nosotras = get_field('sub_titulo_nosotras');
                        $primer_parrafo_nosotras = get_field('primer_parrafo_nosotras');
                        $imagen_principal_nosotras = get_field('imagen_principal_nosotras');
                        $enlace_nosotras = get_permalink();
                        break;
                    endwhile;
                    wp_reset_postdata();
                } else {
                } ?>
                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-house"></i></div>
                            <h4 class="title"><a href="<?php echo $enlace_nosotras ?>">Nuestra misión</a></h4>
                            <?php $mision_nosotras = strlen($mision_nosotras) > 256 ? substr($mision_nosotras, 0, 256) . "..." : $mision_nosotras; ?>
                            <p class="description"><?php echo $mision_nosotras ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-gender-female"></i></div>
                            <h4 class="title"><a href="<?php echo $enlace_nosotras ?>">Nuestra visión</a></h4>
                            <?php $vision_nosotras = strlen($vision_nosotras) > 256 ? substr($vision_nosotras, 0, 256) . "..." : $vision_nosotras; ?>
                            <p class="description"><?php echo $vision_nosotras ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-flag"></i></div>
                            <h4 class="title"><a href="<?php echo $enlace_nosotras ?>">Nuestro objetivo</a></h4>
                            <?php $objetivo_nosotras = strlen($objetivo_nosotras) > 256 ? substr($objetivo_nosotras, 0, 256) . "..." : $objetivo_nosotras; ?>
                            <p class="description"><?php echo  $objetivo_nosotras ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Quiénes somos</h2>
                    <p><?php echo $sub_titulo_nosotras ?></p>
                </div>

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="<?php echo $imagen_principal_nosotras ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <p class="">
                            <?php echo $primer_parrafo_nosotras ?>
                        </p>
                        <div class="text-center pt-3">
                            <a class="btn-get-started animate__animated animate__fadeInUp scrollto" href="<?php echo $enlace_nosotras ?>">Conoce nuestra historia</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section id="noticias" class="noticias">
            <div class="container">

                <div class="section-title">
                    <h2>Noticias</h2>
                    <p>Entérate de las últimas novedades</p>
                </div>

                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'Noticia',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC'

                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        $i = 0;
                        while ($query->have_posts()) :
                            $query->the_post();
                            $titulo = get_the_title($query->ID);
                            $subTitulo = get_field("sub_titulo_noticia");
                    ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                                <div class="icon-box">
                                    <img src="<?php echo get_field('imagen_banner_noticia'); ?>" alt="">
                                    <h4><?php echo  get_the_title($query->ID); ?></h4>
                                    <p class="fst-italic"><?php echo get_the_date('d M Y'); ?></p>
                                    <p><?php $out = strlen($subTitulo) > 101 ? substr($subTitulo, 0, 101) . "..." : $subTitulo;
                                        echo $out; ?></p>
                                    <p class="pt-4"><a href="<?php echo get_permalink(); ?>">Ver más...</a></p>
                                </div>
                            </div>
                    <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    } else {
                    }
                    ?>




                </div>
                <div class="text-center pt-5">
                    <a class="btn-get-started animate__animated animate__fadeInUp scrollto" href="<?php echo get_site_url(); ?>/noticias">Ve todas las noticias</a>
                </div>

            </div>
        </section>
        <section id="clients" class="clients">
            <div class="container">

                <div class="section-title">
                    <h2>Redes colaborativas</h2>

                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <?php
                        $args = array(
                            'post_type' => 'Apoyo',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        );
                        $query = new WP_Query($args);

                        if ($query->have_posts()) {
                            $i = 0;
                            while ($query->have_posts()) :
                                $query->the_post();
                                $titulo = get_the_title($query->ID);
                        ?>
                                <div class="swiper-slide"><a target="_blank" href="<?php echo get_field('link_apoyo'); ?>"> <img src="<?php echo get_field('imagen_apoyo'); ?>" class="img-fluid" alt=""></a></div>
                        <?php
                                $i++;
                            endwhile;
                            wp_reset_postdata();
                        } else {
                        }
                        ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <section id="services" class="noticias">
            <div class="container">

                <div class="section-title">
                    <h2>Servicios a la comunidad</h2>
                    <p>La Casa de la Mujer de Huamachuco, entrega diversos servicios a la comunidad, los cuales se llevan a cabo dependiendo de los recursos recaudados para su realización, estos se obtienen a través de donaciones y/o proyectos</p>
                </div>

                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'Servicios',
                        'posts_per_page' => 4,
                        'orderby' => 'menu_order',
                        'order' => 'ASC'

                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        $i = 0;
                        while ($query->have_posts()) :
                            $query->the_post();
                            $titulo = get_the_title($query->ID);
                    ?>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">

                                <div class="icon-box">
                                    <img  class="w-100" src="<?php echo get_field('imagen_servicio'); ?>" alt="">

                                    <h4><?php echo  get_the_title($query->ID); ?></h4>
                                    <p><?php echo get_field('descripcion_corta_servicios'); ?></p>
                                    <p class="pt-4"><a href="<?php echo get_permalink(); ?>">Conoce más...</a></p>
                                </div>

                            </div>
                           
                    <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    } else {
                    }
                    ?>




                </div>
                <div class="text-center pt-5">
                    <a class="btn-get-started animate__animated animate__fadeInUp scrollto" href="<?php echo get_site_url(); ?>/servicios">Ve todos los servicios</a>
                </div>
            </div>
        </section>
        <section id="cta" class="cta">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Apóyanos</h3>
                        <p> ¡Únete a nuestra causa! En Casa de la Mujer de Huamachuco estamos comprometidos en contribuir a mejorar la calidad de vida de mujeres, niños, niñas, personas mayores de la comuna de Renca y sus alrededores. <br><br>

                            Necesitamos colaboradores comprometidos que compartan nuestra visión de un mundo más igualitario y justo. Tu apoyo puede marcar la diferencia:
                        <ul>
                            <li>Dona para respaldar nuestras iniciativas.</li>
                            <li>Ofrece tu tiempo como voluntario o voluntaria.</li>
                            <li>Colabora como empresa o entidad comprometida.</li>
                            <li>Comparte nuestra misión y ayúdanos a visibilizar las necesidades de nuestra comunidad.</li>
                        </ul>
                        </p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" target="_blank" href="https://app.payku.cl/botonpago/index?idboton=25849&verif=a91e07d0">Dona</a>
                    </div>
                </div>

            </div>
        </section>





    </main>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div class="modal hide fade" id="modalEnConstruccion">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row  ">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 imgModal">
                        <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/1.png" alt="">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 section-title pb-0">
                        <h2>Este sitio se encuentra en construcción</h2>
                        <p>¡Gracias por visitarnos!<br>Pronto tendremos más información sobre nuestra Organización.</p>
                        <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/logoPng.png" alt="" class="img-fluid">
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- <script type="text/javascript">
    $(window).on('load', function() {
        $('#modalEnConstruccion').modal('show');
    });
</script> -->
<?php get_footer(); ?>