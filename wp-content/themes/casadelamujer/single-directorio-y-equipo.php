<?php
get_header();
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
?>


<?php
while (have_posts()) {
    the_post();
    $titulo =  get_the_title();
    $foto_directorio = get_field('foto_directorio');
    $cargo_directorio = get_field('cargo_directorio');
    $descripcion_directorio = get_field('descripcion_directorio');
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



            <div class="">


                <div class="row mt-5 member">
                    <div class="col-lg-4 col-md-2">
                        <img src="<?php echo get_field('foto_directorio'); ?>" alt="">
                    </div>
                    <div class="col-lg-8 text-start">
                        <h4><?php echo $titulo ?> </h4>
                        <span><?php echo get_field('cargo_directorio'); ?></span>
                        <br>
                        <span><?php echo get_field('descripcion_directorio'); ?></span>
                    </div>
                    <div class="col-12"></div>
                </div>


            </div>

        </div>
    </section>

<?php };




wp_reset_postdata(); ?>


<?php get_footer(); ?>