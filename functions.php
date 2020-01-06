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

/**
 * Load adoption form script only on the forms display page
 * 
 * @return void
 */
function load_adoption_script()
{
    wp_enqueue_script('image_switcher', get_template_directory_uri() . '/assests/js/adoptForm.js', [], false, true);
}

if (preg_match("/adoption-app/i", $_SERVER['REQUEST_URI'])) {
    add_action('wp_enqueue_scripts', 'load_adoption_script');
}

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
        'occupation' => sanitize_text_field($_POST['occupation'] ?? ""),
        'employeer_name' => sanitize_text_field($_POST['employeer_name'] ?? ""),
        'work_schedule' => sanitize_text_field($_POST['work_schedule'] ?? ""),
        'own_or_rent' => $_POST['own_or_rent'],
        'landlord_name' => sanitize_text_field($_POST['landlord_name'] ?? ""),
        'landlord_phone' => sanitize_text_field($_POST['landlord_phone'] ?? ""),
        'fence_desc' => sanitize_text_field($_POST['fence_desc']),
        'number_in_household' => $_POST['number_in_household'],
        'adult_age_list' => sanitize_text_field($_POST['adult_age_list']),
        'child_age_list' => sanitize_text_field($_POST['child_age_list']),
        'allergies' => sanitize_text_field($_POST['allergies']),
        'time_alone' => sanitize_text_field($_POST['time_alone']),
        'alone_precautions' => sanitize_text_field($_POST['alone_precautions']),
        'sleeping_arrangments' => sanitize_text_field($_POST['sleeping_arrangments']),
        'time_together' => sanitize_text_field($_POST['time_together']),
        'pet_members' => sanitize_text_field($_POST['pet_members']),
        'spayed' => sanitize_text_field($_POST['spayed']),
        'euthanasia' => sanitize_text_field($_POST['euthanasia']),
        'exercise' => sanitize_text_field($_POST['exercise']),
        'obedience_classes' => $_POST['obedience_classes'],
        'veterinarian' => $_POST['veterinarian'],
        'vet_name' => sanitize_text_field($_POST['vet_name']),
        'vet_number' => sanitize_text_field($_POST['vet_number']),
        'vet_city' => sanitize_text_field($_POST['vet_city']),
        'vet_state' => sanitize_text_field($_POST['vet_state']),
        'puppy_name' => sanitize_text_field($_POST['puppy_name'])
    ];

    $result = $wpdb->insert($table, $data, $format = null);

    if ($result) {
        $redirect_location = "/dogs/" . sanitize_text_field($_POST['puppy_name']);
        $redirect = wp_sanitize_redirect($redirect_location);
        die;
        wp_redirect($redirect);
        exit;
    } else {
        echo '<h1>Adoption application has not been submitted!</h1>';
        echo '<p>' . $wpdb->print_error() . '</p>';
    }
}
