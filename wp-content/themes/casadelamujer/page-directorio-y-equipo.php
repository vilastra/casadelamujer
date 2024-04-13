<?php
get_header();
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');


$imagen_principal_nosotras = get_home_url() . "/wp-content/uploads/2023/11/IMG_20230127_213552-scaled-e1713032766293.jpg";
?>




<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="object-position: bottom; background-image: url(<?php echo $imagen_principal_nosotras ?>)">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Directorio y Equipo</h2>
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

<section id="team" class="team section-bg">
    <div class="container">

        <div class="section-title">
            <!-- <h2>Directorio y Equipo</h2> -->
            <p>La Organización está conformada por un directorio compuesto por Presidenta, Secretaria, Tesorera y 2 suplentes, el cual se renueva cada 4 años, donde participan más de 100 socias de la comunidad, inscritas en el Libro de Registro de Socias.</p>
        </div>
        <div class="row">
            <div class="col-12 text-center mb-2">
                <ul class="list-inline mb-4" id="equipo-flters">
                    <li class="btn  m-1 active btn-get-started animate__animated animate__fadeInUp" data-filter="*">Ver todo</li>
                    <li class="btn  m-1 btn-get-started animate__animated animate__fadeInUp" data-filter=".directorio">Directorio</li>
                    <li class="btn  m-1 btn-get-started animate__animated animate__fadeInUp" data-filter=".equipo">Equipo</li>
                    <li class="btn  m-1 btn-get-started animate__animated animate__fadeInUp" data-filter=".voluntarias">Voluntarias</li>
                </ul>
            </div>
        </div>
        <div class="row equipo-container">
            <?php
            $args = array(
                'post_type' => 'directorio-y-equipo',
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

                    <div class="equipo-item col-lg-4 col-md-6  align-items-stretch <?php echo get_field('area_directorio'); ?>">
                       
                            <div class="member">
                                <img src="<?php echo get_field('foto_directorio'); ?>" alt="">
                                <h4><?php echo get_the_title($query->ID); ?> </h4>
                                <span><?php echo get_field('cargo_directorio'); ?></span>
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