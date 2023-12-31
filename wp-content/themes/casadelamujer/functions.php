<?php

function casadelamujer_theme_support()
{
  add_theme_support('custom-logo');
}

add_action('init', 'casadelamujer_theme_support');

function casadelamujer_enqueue_styles()
{
  wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css');
  $dependencies = array('bootstrap');
  wp_enqueue_style('bootstrap-style', get_stylesheet_uri(), $dependencies);
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
  wp_enqueue_style('customcss', get_template_directory_uri() . '/assets/css/style.css');
  wp_enqueue_style('animatecss', get_template_directory_uri() . '/assets/vendor/animate.css/animate.min.css');
  wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
  wp_enqueue_style('boxicons', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css');
  wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
  wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
}

function casadelamujer_enqueue_scripts()
{
  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jQuery.js');
  $dependencies = array('jquery', 'jquery-ui-core');
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', $dependencies, '', true);

  wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', $dependencies, '', true);
  wp_enqueue_script('isotope-layout', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', $dependencies, '', true);
  wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', $dependencies, '', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', $dependencies, '', true);
  wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', $dependencies, '', true);
}
function enqueue_jquery()
{
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');
function load_fonts()
{
  wp_register_style('fontawesome', get_template_directory_uri() . '/fontawesome/css/all.css ');
  wp_enqueue_style('fontawesome');
}

add_action('wp_enqueue_scripts', 'load_fonts');
add_action('wp_enqueue_scripts', 'casadelamujer_enqueue_styles');
add_action('wp_enqueue_scripts', 'casadelamujer_enqueue_scripts');

function casadelamujer_menus()
{
  $locations = array(
    'header-menu' => "Header Menu",
    'footer' => "Footer Menu"
  );

  register_nav_menus($locations);
}

add_action('init', 'casadelamujer_menus');


function wp_get_menu_array($current_menu)
{
  $array_menu = wp_get_nav_menu_items($current_menu);
  $menu = array();
  foreach ($array_menu as $m) {
    if (empty($m->menu_item_parent)) {
      $menu[$m->ID] = array();
      $menu[$m->ID]['ID']     =   $m->ID;
      $menu[$m->ID]['title']     =   $m->title;
      $menu[$m->ID]['url']     =   $m->url;
      $menu[$m->ID]['children']  =   array();
    }
  }
  $submenu = array();
  foreach ($array_menu as $m) {
    if ($m->menu_item_parent) {
      $submenu[$m->ID] = array();
      $submenu[$m->ID]['ID']     =   $m->ID;
      $submenu[$m->ID]['title']  =   $m->title;
      $submenu[$m->ID]['url']   =   $m->url;
      $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
    }
  }
  return $menu;
}


$labels = array(
  'name'                => _x('Carrusel en inicio', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Contenido en carrusel', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Carrusel en inicio', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Todos los contenidos', 'casadelamujer'),
  'view_item'           => __('Ver contenido en carrusel', 'casadelamujer'),
  'add_new_item'        => __('Agregar un nuevo contenido en carrusel', 'casadelamujer'),
  'add_new'             => __('Agregar un nuevo contenido en carrusel', 'casadelamujer'),
  'edit_item'           => __('Editar un contenido en carrusel', 'casadelamujer'),
  'update_item'         => __('Actualizar un contenido en carrusel', 'casadelamujer'),
  'search_items'        => __('Buscar un contenido en carrusel', 'casadelamujer'),
  'not_found'           => __('Contenido en carrusel no encontrado', 'casadelamujer'),
  'not_found_in_trash'  => __('Contenido en carrusel no encontrado', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'CarruselInicio',
  'labels' => $labels,
  'supports' => array('title'),
  'menu_position' => 3,
  'menu_icon' => 'dashicons-images-alt'
);
register_post_type('CarruselInicio', $args);

$labels = array(
  'name'                => _x('Servicios', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Servicio', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Servicios', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Todos los servicios', 'casadelamujer'),
  'view_item'           => __('Ver servicio', 'casadelamujer'),
  'add_new_item'        => __('Agregar un nuevo servicio', 'casadelamujer'),
  'add_new'             => __('Agregar un nuevo servicio', 'casadelamujer'),
  'edit_item'           => __('Editar servicio', 'casadelamujer'),
  'update_item'         => __('Actualizar servicio', 'casadelamujer'),
  'search_items'        => __('Buscar un servicio', 'casadelamujer'),
  'not_found'           => __('Servicio no encontrado', 'casadelamujer'),
  'not_found_in_trash'  => __('Servicio en carrusel no encontrado', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'Servicios',
  'labels' => $labels,
  'supports' => array('title'),
  'menu_position' => 4,
  'menu_icon' => 'dashicons-buddicons-buddypress-logo'
);
register_post_type('Servicios', $args);

$labels = array(
  'name'                => _x('Directorio', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Directorio', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Directorio', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Todas las personas', 'casadelamujer'),
  'view_item'           => __('Ver persona', 'casadelamujer'),
  'add_new_item'        => __('Agregar una nueva persona', 'casadelamujer'),
  'add_new'             => __('Agregar una nueva persona', 'casadelamujer'),
  'edit_item'           => __('Editar persona', 'casadelamujer'),
  'update_item'         => __('Actualizar persona', 'casadelamujer'),
  'search_items'        => __('Buscar una persona', 'casadelamujer'),
  'not_found'           => __('Persona no encontrada', 'casadelamujer'),
  'not_found_in_trash'  => __('Persona no encontrada', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'Directorio',
  'labels' => $labels,
  'supports' => array('title'),
  'menu_position' => 4,
  'menu_icon' => 'dashicons-businesswoman'
);
register_post_type('Directorio', $args);

$labels = array(
  'name'                => _x('Redes colaborativas', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Redes colaborativas', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Redes colaborativas', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Todas las redes', 'casadelamujer'),
  'view_item'           => __('Ver red', 'casadelamujer'),
  'add_new_item'        => __('Agregar nueva red', 'casadelamujer'),
  'add_new'             => __('Agregar nueva red', 'casadelamujer'),
  'edit_item'           => __('Editar red', 'casadelamujer'),
  'update_item'         => __('Actualizar red', 'casadelamujer'),
  'search_items'        => __('Buscar una red', 'casadelamujer'),
  'not_found'           => __('Red no encontrada', 'casadelamujer'),
  'not_found_in_trash'  => __('Red no encontrada', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'Apoyo',
  'labels' => $labels,
  'supports' => array('title'),
  'menu_position' => 4,
  'menu_icon' => 'dashicons-admin-site'
);
register_post_type('Apoyo', $args);

$labels = array(
  'name'                => _x('Noticias', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Noticias', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Noticias', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Todas las Noticias', 'casadelamujer'),
  'view_item'           => __('Ver Noticia', 'casadelamujer'),
  'add_new_item'        => __('Agregar nueva Noticia', 'casadelamujer'),
  'add_new'             => __('Agregar nueva Noticia', 'casadelamujer'),
  'edit_item'           => __('Editar Noticia', 'casadelamujer'),
  'update_item'         => __('Actualizar Noticia', 'casadelamujer'),
  'search_items'        => __('Buscar una Noticia', 'casadelamujer'),
  'not_found'           => __('Noticia no encontrada', 'casadelamujer'),
  'not_found_in_trash'  => __('Noticia no encontrada', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'Noticia',
  'labels' => $labels,
  'public' => true,
  'has_archive' => true,
  'supports' => array('title', 'thumbnail'),
  'menu_position' => 4,
  'menu_icon' => 'dashicons-feedback'
);
add_theme_support('post-thumbnails');
add_post_type_support('Noticia', 'thumbnail');
register_post_type('Noticia', $args);

$labels = array(
  'name'                => _x('Cursos', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Cursos', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Cursos y Talleres', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Todos los cursos y talleres', 'casadelamujer'),
  'view_item'           => __('Ver curso o taller', 'casadelamujer'),
  'add_new_item'        => __('Agregar nuevo curso o taller', 'casadelamujer'),
  'add_new'             => __('Agregar nueva curso o taller', 'casadelamujer'),
  'edit_item'           => __('Editar curso o taller', 'casadelamujer'),
  'update_item'         => __('Actualizar curso o taller', 'casadelamujer'),
  'search_items'        => __('Buscar un curso o taller', 'casadelamujer'),
  'not_found'           => __('Curso o taller no encontrado', 'casadelamujer'),
  'not_found_in_trash'  => __('Curso o taller no encontrado', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'CursosTalleres',
  'labels' => $labels,
  'public' => true,
  'has_archive' => true,
  'supports' => array('title', 'thumbnail'),
  'menu_position' => 4,
  'menu_icon' => 'dashicons-welcome-learn-more'
);

add_theme_support('post-thumbnails');
add_post_type_support('CursosTalleres', 'thumbnail');
register_post_type('CursosTalleres', $args);
$labels = array(
  'name'                => _x('Nosotras', 'Post Type General Name', 'casadelamujer'),
  'singular_name'       => _x('Nosotras', 'Post Type Singular Name', 'casadelamujer'),
  'menu_name'           => __('Nosotras', 'casadelamujer'),
  'parent_item_colon'   => __('Parent', 'casadelamujer'),
  'all_items'           => __('Nosotras', 'casadelamujer'),
  'view_item'           => __('Ver Nosotras', 'casadelamujer'),
  'add_new_item'        => __('Agregar nuevo Nosotras', 'casadelamujer'),
  'add_new'             => __('Agregar nueva Nosotras', 'casadelamujer'),
  'edit_item'           => __('Editar Nosotras', 'casadelamujer'),
  'update_item'         => __('Actualizar Nosotras', 'casadelamujer'),
  'search_items'        => __('Buscar Nosotras', 'casadelamujer'),
  'not_found'           => __('Nosotras no encontrado', 'casadelamujer'),
  'not_found_in_trash'  => __('Nosotras no encontrado', 'casadelamujer'),
);
$args = array(
  'public' => true,
  'label' => 'Nosotras',
  'labels' => $labels,
  'capabilities' => array(
    'create_posts' => false, // Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
  ),
  'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
  'supports' => array('title', 'thumbnail'),
  'menu_position' => 4,
  'menu_icon' => 'dashicons-groups'
);
register_post_type('Nosotras', $args);



// ======== ACCIONES PARA EVITAR ELIMINAR UN CONTENIDO ========
global $noborrar;
$noborrar = array("nosotras");
add_filter('post_row_actions', 'remove_row_actions_post_delete', 10, 2);
function remove_row_actions_post_delete($actions, $post)
{
  if (in_array($post->post_type, $GLOBALS['noborrar'])) {
    unset($actions['clone']);
    unset($actions['trash']);
  }
  return $actions;
}
function remove_row_actions_page_delete($actions)
{
  if (get_post_type() === 'page') {
    unset($actions['clone']);
    unset($actions['trash']);
    return $actions;
  }
}
add_action('admin_head', function () {
  $current_screen = get_current_screen();
  if (
    'post' === $current_screen->base &&
    in_array($current_screen->post_type, $GLOBALS['noborrar'])
  ) :
?>
    <style>
      #delete-action {
        display: none;
      }

      #preview-action,
      .updated a {
        display: none;
      }
    </style>
<?php
  endif;
});

$role = get_role('administrator');
$role->remove_cap('delete_published_pages');
$role->add_cap('publish_pages');
// ======== FIN DE ACCIONES PARA EVITAR ELIMINAR UN CONTENIDO ========


// require_once plugin_dir_path(__FILE__). 'templates/admin.php';
$menu_name = 'Main menu'; // Reemplaza 'nombre_del_menu' con el nombre de tu menú
$menu_items = wp_get_nav_menu_items($menu_name);
function custom_breadcrumb()
{
  if (is_front_page()) {
    return; // No mostrar el breadcrumb en la página de inicio
  }
  echo '<div class="breadcrumb">';
  echo '<a href="' . home_url() . '">Inicio</a>';

  // Verificar si estamos en una página
  if (is_page() && $post = get_post()) {
    $post_parent_id = $post->post_parent;

    // Si tiene una página principal, mostrarla como texto no enlazado
    if ($post_parent_id) {
      $parent_page = get_post($post_parent_id);
      echo ' <span class="separator">></span> ';
      echo '<span href="' . get_permalink($parent_page) . '">' . $parent_page->post_title . '</span>';
    }
  }

  echo ' <span class="separator">></span> ';
  the_title();

  echo '</div>';
}

///  para enviar correo de la pagina contacto

function wpacg_casa_de_la_mujer_admin_color_scheme()
{
  //Get the theme directory
  $theme_dir = get_stylesheet_directory_uri();

  //Casa de la mujer
  wp_admin_css_color(
    'casa_de_la_mujer',
    __('Casa de la mujer'),
    $theme_dir . '/css/casa_de_la_mujer_theme.css',
    array('#5d2385', '#fff', '#955597', '#a805dd')
  );
}
add_action('admin_init', 'wpacg_casa_de_la_mujer_admin_color_scheme');
