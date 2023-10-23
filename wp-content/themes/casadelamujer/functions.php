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
