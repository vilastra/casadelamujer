<?php
get_header();
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');


$imagen_principal_nosotras = get_home_url() . "/wp-content/uploads/2023/11/img1-e1699819391374.jpg";
?>




<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="object-position: bottom; background-image: url(<?php echo $imagen_principal_nosotras ?>)">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Servicios a la comunidad</h2>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</section>

<section id="services" class="noticias">
    <div class="container">

        <div class="section-title">
            <p>La Casa de la Mujer de Huamachuco, entrega diversos servicios a la comunidad, los cuales se llevan a cabo dependiendo de los recursos recaudados para su realización, estos se obtienen a través de donaciones y/o proyectos</p>
        </div>

        <div class="row">
            <?php
            $args = array(
                'post_type' => 'Servicios',
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
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 mb-4" data-aos="zoom-in" data-aos-delay="200">

                        <div class="icon-box">
                            <img class="w-100" src="<?php echo get_field('imagen_servicio'); ?>" alt="">

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
    </div>
</section>



<?php
wp_reset_postdata(); ?>


<?php get_footer(); ?>