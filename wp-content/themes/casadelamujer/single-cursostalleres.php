<?php

get_header(); ?>


<?php
while (have_posts()) {
    the_post();
    $titulo =  get_the_title();
    $lugar_del_curso = get_field('lugar_del_curso');
    $fecha_comienzo_curso = get_field('fecha_comienzo_curso');
    $descripcion_del_curso = get_field('descripcion_del_curso');
    $dia_inscripcion_curso = get_sub_field('dia_inscripcion_curso');
    $hora_inscripcion_curso = get_field('hora_inscripcion_curso');
    $dia_inscripcion_curso_limite = get_field('dia_inscripcion_curso_limite');
    $hora_inscripcion_curso_limite = get_field('hora_inscripcion_curso_limite');
    $icono_del_curso = get_field('icono_del_curso');
    $valor_del_curso = get_field('valor_del_curso');

?>

    <div class="container mt-5 mb-5 pt-5 ">
        <div class="section-title mt-5 pt-3">
            <h2><?php echo   "<div class='pb-3'>" . $icono_del_curso . "</div>" . $titulo ?></h2>
        </div>
        <div class="generalContent mb-5">
            <?php echo $descripcion_del_curso; ?>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <?php if (get_field('lugar_del_curso')) { ?>
                    <p> <b><i class="bi bi-geo-alt"></i> Lugar del curso: </b> <?php echo  $lugar_del_curso ?></p>
                <?php   } ?>
                <?php if (get_field('fecha_comienzo_curso')) { ?>
                    <p> <b><i class="bi bi-calendar-check"></i> Fecha de comienzo: </b> <?php echo  $fecha_comienzo_curso ?></p>
                <?php   } ?>
                <?php if (get_field('fecha_comienzo_curso')) { ?>
                    <p> <b><i class="bi bi-currency-dollar"></i> Valor: </b> <?php echo  $valor_del_curso ?></p>
                <?php   } ?>
                <?php
                if (have_rows('inscripcion_del_curso')) {
                    while (have_rows('inscripcion_del_curso')) {
                        the_row();
                        if (have_rows('fecha_inscripcion_curso')) {
                            while (have_rows('fecha_inscripcion_curso')) {
                                the_row();
                                echo ' <hr class="my-4">';
                                $dia_inscripcion_curso = get_sub_field('dia_inscripcion_curso');
                                $hora_inscripcion_curso = get_sub_field('hora_inscripcion_curso');
                                echo '<p><b>Fecha de inscripciones </b>' . $dia_inscripcion_curso . " " . $hora_inscripcion_curso;
                            }
                        }
                        if (have_rows('fecha_inscripcion_curso_limite')) {
                            while (have_rows('fecha_inscripcion_curso_limite')) {
                                the_row();
                                if (get_sub_field('dia_inscripcion_curso_limite')) {
                                    $dia_inscripcion_curso_limite = get_sub_field('dia_inscripcion_curso_limite');
                                    $hora_inscripcion_curso_limite = get_sub_field('hora_inscripcion_curso_limite');
                                    echo '<p><b>Hasta el </b>' . $dia_inscripcion_curso_limite . " " . $hora_inscripcion_curso_limite;
                                }
                            }
                        }
                    }
                }
                ?>


            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <?php
                if (have_rows('requisitos_inscripcion_curso')) {
                    echo ' <hr class="my-4 d-xl-noe d-lg-none">';
                    echo '<p><b><i class="bi bi-check2-all"></i> Requisitos:</b></p>';
                    echo '<p>';

                    while (have_rows('requisitos_inscripcion_curso')) {
                        the_row();
                        $item_requisito_curso = get_sub_field('item_requisito_curso');
                        echo '<i class="bi bi-check2"></i> ' . $item_requisito_curso . '<br>';
                    }
                    echo '</p>';
                }
                ?>

            </div>

        </div>


        <div class="generalContent text-center mb-5">
            <p class="text-center">Comparte este curso / taller</p>
            <?php echo do_shortcode('[addtoany]'); ?>
        </div>
    </div>

<?php };




wp_reset_postdata(); ?>


<?php get_footer(); ?>