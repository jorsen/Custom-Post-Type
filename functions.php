// Our custom post type function
function create_event_type() {

    register_post_type( 'ac_event',
                       // CPT Options
                       array(
                           'labels' => array(
                               'name' => __( 'Events' ),
                               'singular_name' => __( 'Event' )
                           ),
                           'public' => true,
                           'has_archive' => false,
                           'rewrite' => array('slug' => 'event'),
                           'show_in_rest' => true,
                           'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', ),
                           'menu_icon' => 'dashicons-calendar', 
                       )
                      );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_event_type' );






function event_taxonomy() {
    register_taxonomy(
        'event_cat',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'ac_event',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Event Category', // display name
            'query_var' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'event-cat',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'event_taxonomy');


function event_type_taxonomy() {
    register_taxonomy(
        'event_type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'ac_event',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Event Type', // display name
            'query_var' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'event-type',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'event_type_taxonomy');
