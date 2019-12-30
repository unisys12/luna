<?php

function css()
{
    wp_enqueue_style('style', get_stylesheet_uri(), [], '0.0.1');
}
add_action('wp_enqueue_scripts', 'css');

function js()
{
    wp_enqueue_script('main', get_template_directory_uri() . '/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'js');

/**
 * Loads Browser Sync script in local environment
 *
 * @return void
 */
function browsersync()
{
    wp_enqueue_script('browsersync', get_template_directory_uri() . '/browsersync.js', [], false, true);
}

if ($_SERVER['HTTP_HOST'] === "wp-lmh.test") {
    add_action('wp_enqueue_scripts', 'browsersync');
}

/**
 * Load image switcher script only on a dogs profile page
 * 
 * @return void
 */
function load_image_switcher()
{
    wp_enqueue_script('image_switcher', get_template_directory_uri() . '/assests/js/imageSwitcher.js', [], false, true);
}

if (preg_match("/dogs\/*\w+/i", $_SERVER['REQUEST_URI'])) {
    add_action('wp_enqueue_scripts', 'load_image_switcher');
}

//* Load Lato and Merriweather Google fonts
function bg_load_google_fonts()
{
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Lato:300,700|Merriweather:300,700|Montserrat:300,700|Alata:300');
}
add_action('wp_enqueue_scripts', 'bg_load_google_fonts');

//Enqueue the Dashicons script
function load_dashicons_front_end()
{
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons_front_end');

/**
 * Custom Post Types
 */
function dog_post_type()
{
    $args = [
        'labels' => [
            'name' => 'Dogs',
            'singular_name' => 'Dog',
            'featured_image' => 'Puppy Profile Image',
            'add_new_item' => 'Add New Dog',
            'all_items' => 'All Dogs',
            'view_item' => 'View Dog',
            'edit_item' => 'Edit Dog',
            'update_item' => 'Update Dog',
            'search_items' => 'Search Dogs'
        ],
        'hierarchical' => false,
        'menu_icon' => 'http://wp-lmh.test/wp-content/uploads/2019/11/dog-1.png',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['editor', 'title', 'thumbnail', 'revisions', 'custom-fields'],
        'capability_type' => 'page'
    ];

    register_post_type('dogs', $args);
}

add_theme_support('post-thumbnails');

add_action('init', 'dog_post_type');

/**
 * Custom Taxonamies
 * 
 * Decided not to use. Leaving in case I
 * decide to move 'dog_post_type' to use
 * Posts instead of Pages. 
 */
// function dog_taxonomy()
// {
//     $args = [
//         'labels' => [
//             'name' => 'Breeds',
//             'singular_name' => 'Breed'
//         ],
//         'public' => true,
//         'hierarchical' => true,
//     ];

//     register_taxonomy('breeds', ['dogs'], $args);
// }

// add_action('init', 'dog_taxonomy');

/**
 * Process Dog Adoption Form
 * 
 * This works, but I threw up in my mouth a little...
 */
if (isset($_POST['appSubmit'])) {

    global $wpdb;
    $wpdb->show_errors();
    $table = 'wp_adoption_applications';

    $data = [
        'name' => sanitize_text_field($_POST['name']),
        'age' => $_POST['age'],
        'address' => sanitize_text_field($_POST['address']),
        'cell' => sanitize_text_field($_POST['cell']),
        'work' => sanitize_text_field($_POST['work']),
        'email' => sanitize_email($_POST['email']),
        'contact_window' => sanitize_text_field($_POST['contact_window']),
        'employment_status' => sanitize_text_field($_POST['employment_status']),
        'occupation' => sanitize_text_field($_POST['occupation']),
        'employeer_name' => sanitize_text_field($_POST['employeer_name']),
        'work_schedule' => sanitize_text_field($_POST['work_schedule']),
        'puppy_name' => sanitize_text_field($_POST['puppy_name'])
    ];

    $result = $wpdb->insert($table, $data, $format = null);

    if ($result) {
        $redirect_location = "/dogs/" . sanitize_text_field($_POST['puppy_name']);
        $redirect = wp_sanitize_redirect($redirect_location);
        echo $redirect;
        die;
        wp_redirect($redirect);
        exit;
    } else {
        echo '<h1>Adoption application has not been submitted!</h1>';
        echo '<p>' . $wpdb->print_error() . '</p>';
    }
}
