<?php
get_header();
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
?>




<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>" style="object-position: bottom; background-image: url(<?php echo $imagen_principal_nosotras ?>)">
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

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <a style="text-decoration: none;color: unset;"  href="<?php echo get_permalink(); ?>">
                            <div class="member">
                                <img src="<?php echo get_field('foto_directorio'); ?>" alt="">
                                <h4><?php echo get_the_title($query->ID); ?> </h4>
                                <span><?php echo get_field('cargo_directorio'); ?></span>
                            </div>
                        </a>
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