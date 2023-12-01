<?php 
/*
* Plugin Name: Admin Casa de la mujer
* Plugin URI: https://www.casadelamujer.cl/
* Description: Administracion Casa de la mujer
* Version: 1.0
* Author: Victor Lastra
* Author URI: https://vilastra.github.io/
* License: GPL2
*
 */

//activate

require_once plugin_dir_path(__FILE__) . 'inc/class-admincdlm.php';
register_activation_hook(__FILE__, array('admincdlmactive', 'activate'));
//deactive
require_once plugin_dir_path(__FILE__) . 'inc/class-admincdlm.php';
register_deactivation_hook(__FILE__, array('admincdlmdeactivate', 'deactivate'));

function agregar_menu_personalizado() {
    add_menu_page(
        'Manual de persona usuaria',  // Título en la página
        'Manual de persona usuaria',               // Título en el menú
        'manage_options',          // Capacidad requerida para acceder
        'plugin-admincdlm',       // Identificador único
        'mostrar_pagina_adminplugin',   // Función para mostrar la página
        'dashicons-media-document'
    );

 
    // add_submenu_page(
    //     'mi-plugin-admincdlm',       // Identificador del menú padre
    //     'Manual de usuarios',             // Título en la página
    //     'Manual de usuarios',             // Título en el menú
    //     'manage_options',          // Capacidad requerida para acceder
    //     'mi-plugin-manual',   // Identificador único
    //     'mostrar_pagina_manual' // Función para mostrar la página
    // );


}
add_action('admin_menu', 'agregar_menu_personalizado');
// add_action('init', 'crear_cpt_preguntas');
// add_action('init', 'crear_cpt_preguntas2');



function mostrar_pagina_adminplugin() {
      // Ruta completa a la página de emergencias en el tema
  $ruta_adminplugin = get_template_directory() . '/page-manual.php';

      if (file_exists($ruta_adminplugin)) {
          // Contenido de la página de emergencias
          ob_start();
          include $ruta_adminplugin;
          echo ob_get_clean();
      } else {
          echo 'La página de emergencias no se encontró.';
      }
    
}


function mostrar_pagina_manual() {
    // Ruta completa a la página de emergencias en el tema
    $ruta_emergencias = get_template_directory() . '/page-manual.php';

    if (file_exists($ruta_emergencias)) {
        // Contenido de la página de emergencias
        ob_start();
        include $ruta_emergencias;
        echo ob_get_clean();
    } else {
        echo 'La página del manual no se encontró.';
    }
}
