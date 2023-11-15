<?php

get_header(); ?>

<body>
    <main id="main">
        <section id="services" class="services">
            <div class="container">

                <div class="section-title mt-5 pt-3">
                    <h2>Cursos y Talleres</h2>
                    <p>Conoce los cursos y talleres disponibles</p>
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
                        ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 d-flex align-items-stretch mt-4 mt-lg-0 mb-3" data-aos="zoom-in" data-aos-delay="200">

                                <div class="icon-box w-100">
                                    <div class="icon iconbox-purple">
                                        <?php echo get_field('icono_del_curso'); ?>
                                    </div>
                                    <h4><?php echo  get_the_title($query->ID); ?></h4>
                                    <p class="fst-italic"><?php echo get_the_date('d M Y'); ?></p>
                                    
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