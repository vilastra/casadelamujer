<?php

get_header();
$imagen_principal = get_home_url() . "/wp-content/uploads/2023/11/Screenshot_8-50-e1714267325324.png";
?>

<body>
    <main id="main">

        <section id="hero">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="object-position: bottom; background-image: url(<?php echo $imagen_principal ?>)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Cursos y Talleres</h2>
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
        <section id="cursos" class="noticias">
            <div class="container">

                <div class="section-title mt-3 pt-3">
                    <!-- <h2>Cursos y Talleres</h2> -->
                    <p>Conoce los cursos y talleres disponibles en Casa de la Mujer Huamachuco</p>
                </div>
                <div class="row">
                    <!-- query -->
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $query = new WP_Query(array(
                        'post_type' => 'CursosTalleres',
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged
                    ));
                    ?>

                    <?php if ($query->have_posts()) : ?>
                        <!-- begin loop -->
                        <?php while ($query->have_posts()) :
                            $query->the_post();
                            $titulo = get_the_title($query->ID);
                            $lugar_del_curso = get_field('lugar_del_curso');
                            $fecha_comienzo_curso = get_field('fecha_comienzo_curso');
                            $descripcion_del_curso = get_field('descripcion_del_curso');
                            $dia_inscripcion_curso = get_sub_field('dia_inscripcion_curso');
                            $hora_inscripcion_curso = get_field('hora_inscripcion_curso');
                            $dia_inscripcion_curso_limite = get_field('dia_inscripcion_curso_limite');
                            $hora_inscripcion_curso_limite = get_field('hora_inscripcion_curso_limite');
                            $icono_del_curso = get_field('icono_del_curso');
                            $valor_del_curso = get_field('valor_del_curso');
                            $banner_curso = get_field('banner_curso');
                        ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 d-flex align-items-stretch mt-4 mt-lg-0 mb-3" data-aos="zoom-in" data-aos-delay="200">

                                <div class="icon-box ">
                                    <?php
                                    if ($banner_curso != "") { ?>
                                       <img class="" src="<?php echo $banner_curso; ?>" alt="">
                                    <?php } else { ?>

                                        <div class="icon <?php echo get_field('color_icono_curso'); ?>">
                                            <?php echo get_field('icono_del_curso'); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <h4><?php echo  get_the_title($query->ID); ?></h4>
                                    <p class=""><?php echo "Inicio: " . $fecha_comienzo_curso ?></p>
                                    <p class=""><?php echo "Valor: " . $valor_del_curso ?></p>

                                    <p class="pt-4"><a href="<?php echo get_permalink(); ?>">Ver más...</a></p>
                                </div>

                            </div>
                        <?php
                        endwhile; ?>
                        <!-- end loop -->
                </div>

                <div class="pagination-cdlm text-center pt-5 ">
                    <?php
                        echo paginate_links(array(
                            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'total'        => $query->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf('<i></i> %1$s', __('<i class="pt-1 bi bi-caret-left-fill"></i>', 'text-domain')),
                            'next_text'    => sprintf('%1$s <i></i>', __('<i class="pt-1 bi bi-caret-right-fill"></i>', 'text-domain')),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ));
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>

<?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>