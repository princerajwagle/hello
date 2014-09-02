<?php
    add_action('init', 'my_add_excerpts_to_pages');
    function my_add_excerpts_to_pages()
    {
        add_post_type_support('page', 'excerpt');
    }

    /* ======================================================================= */
// Custom Menus
    /* ======================================================================= */
    function h5bs_register_menus()
    {
        register_nav_menus(array(
            'primary'   => __('Primary Navigation'),
            'secondary' => __('Secondary Navigation'),
            'tertiary'  => __('Tertiary Navigation')
        ));
    }

    add_action('init', 'h5bs_register_menus');


    function h5bs_primary_nav()
    {
        wp_nav_menu(array(
            'container'      => false, // remove nav container
            'menu'           => 'Primary Nav', // nav name
            'menu_id'        => 'nav-main', // custom id
            'menu_class'     => 'main-nav', // custom class
            'theme_location' => 'primary', // where it's located in the theme
            'before'         => '', // before the menu
            'after'          => '', // after the menu
            'link_before'    => '', // before each link
            'link_after'     => '', // after each link
            'depth'          => 0, // set to 1 to disable dropdowns
            'fallback_cb'    => 'h5bs_primary_nav_fallback' // fallback function
        ));
    }

    function h5bs_secondary_nav()
    {
        wp_nav_menu(array(
            'container'      => false, // remove nav container
            'menu'           => 'Secondary Nav', // nav name
            'menu_id'        => '', // custom id
            'menu_class'     => '', // custom class
            'theme_location' => 'secondary', // where it's located in the theme
            'before'         => '', // before the menu
            'after'          => '', // after the menu
            'link_before'    => '', // before each link
            'link_after'     => '', // after each link
            'depth'          => 0, // set to 1 to disable dropdowns
            'fallback_cb'    => 'h5bs_secondary_nav_fallback' // fallback function
        ));
    }

    function h5bs_primary_nav_fallback()
    {
        wp_page_menu(array(
            'menu_class'  => 'nav group',
            'include'     => '',
            'exclude'     => '',
            'link_before' => '',
            'link_after'  => '',
            'show_home'   => true
        ));
    }

    function h5bs_secondary_nav_fallback()
    {
        wp_page_menu(array(
            'menu_class'  => 'nav group',
            'include'     => '',
            'exclude'     => '',
            'link_before' => '',
            'link_after'  => '',
            'show_home'   => true
        ));
    }


    /* ======================================================================= */
// Image Thumbnails
    /* ======================================================================= */
    add_theme_support('post-thumbnails');

    /* ======================================================================= */
// Remove junk from head
    /* ======================================================================= */

    function h5bs_remove_junk()
    {
        // Really Simple Discovery
        remove_action('wp_head', 'rsd_link');
        // Windows Live Writer
        remove_action('wp_head', 'wlwmanifest_link');
        // WP Version
        remove_action('wp_head', 'wp_generator');
    }

    add_action('init', 'h5bs_remove_junk');


    /* ======================================================================= */
// Enqueue Global Scripts
    /* ======================================================================= */
    function h5bs_enqueue_scripts()
    {
        wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.7.1.min.js', array(), '2.7.1', false);
        wp_register_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.js', array('jquery'), '', false);
        wp_register_script('plugins', get_template_directory_uri() . '/js/vendor/plugins.js', array('jquery'), '', true);
        wp_register_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
        wp_register_script('superfish-js', get_template_directory_uri() . '/js/vendor/superfish.js', array('jquery'), '', true);
        wp_register_script('selectivizr-min-js', get_template_directory_uri() . '/js/vendor/selectivizr-min.js', array('jquery'), '', true);
        wp_register_script('selectivizr-min-js', get_template_directory_uri() . '/js/vendor/isotope-min.js', array('jquery'), '', false);
        wp_register_script('respond-js', get_template_directory_uri() . '/js/vendor/respond.js', array('jquery'), '', true);

        wp_enqueue_script('jquery-masonry');


        wp_enqueue_script('modernizr');
        wp_enqueue_script('bootstrap');
        wp_enqueue_script('plugins');
        wp_enqueue_script('main-js');
        wp_enqueue_script('superfish-js');
        wp_enqueue_script('selectivizr-min-js');
        wp_enqueue_script('respond-js');

    }

    add_action('wp_enqueue_scripts', 'h5bs_enqueue_scripts');


    function enqueue_style()
    {

        wp_register_style('bootstrap-modal-carousel', get_template_directory_uri() . '/css/bootstrap-modal-carousel.css');
        wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css');
        wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css');
        wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css');
        wp_register_style('screen', get_template_directory_uri() . '/css/screen.css');
        wp_register_style('wp-default', get_template_directory_uri() . '/css/wp-default.css');
        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
        wp_register_style('styles', get_template_directory_uri() . '/style.css');
        wp_register_style('print', get_template_directory_uri() . '/css/print.css');

        wp_enqueue_style('bootstrap-modal-carousel');
        wp_enqueue_style('flexslider');
        wp_enqueue_style('fonts');
        wp_enqueue_style('normalize');
        wp_enqueue_style('screen');
        wp_enqueue_style('wp-default');
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('styles');
        wp_enqueue_style('print');

    }

    add_action('wp_enqueue_scripts', 'enqueue_style');


    /* ======================================================================= */
// Sidebars & Widgetizes Areas
    /* ======================================================================= */
    function h5bs_register_sidebars()
    {
        register_sidebar(array(
            'id'            => 'sidebar1',
            'name'          => 'Sidebar 1',
            'description'   => 'The first (primary) sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ));

        /*
        uncomment to add additional sidebar

        register_sidebar(array(
            'id'            => 'sidebar2',
            'name'          => 'Sidebar 2',
            'description'   => 'The second (secondary) sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ));
        */
    }

    add_action('widgets_init', 'h5bs_register_sidebars');

    /* ======================================================================= */
// dynamic classes and body IDs
    /* ======================================================================= */
    function dynamicClass()
    {

        global $post;
        $page_slug = $post->post_name;

        if (!empty($post->post_parent)) {
            $parent      = get_post($post->post_parent);
            $parent_slug = $parent->post_name;
            $class       = "$parent_slug $page_slug";
        } else {
            $class = "$page_slug";
        }

        return $class;
    }

    function pageID()
    {
        global $post;
        return $post->post_name;
    }

    function dynamicBody()
    {

        $dynamic_class   = dynamicClass();
        $page_id         = pageID();
        $classes         = get_body_class(false);
        $default_classes = implode(" ", $classes);

        if (is_front_page()) {
            echo 'id="home" class="' . $default_classes . '"';
        } elseif (is_home()) {
            // echo 'id="blog"';
            echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
        } elseif (is_single()) {
            echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
        } elseif (is_archive()) {
            //echo 'id="blog" class="archive"';
            echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
        } elseif (is_search()) {
            //echo 'id="search"';
            echo 'id="search" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
        } else {
            echo 'id="' . $page_id . '" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
        }
    }

    /* ======================================================================= */
    /** https://github.com/blineberry/Improved-HTML5-WordPress-Captions **/
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
    /* ======================================================================= */

    add_filter('img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3);

    function h5bs_img_caption_shortcode_filter($val, $attr, $content = null)
    {
        extract(shortcode_atts(array(
            'id'      => '',
            'align'   => '',
            'width'   => '',
            'caption' => ''
        ), $attr));

        if (1 > (int)$width || empty($caption))
            return $val;

        return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
        . do_shortcode($content) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
    }

    /* ======================================================================= */
    /* Client Options Page */
    /* ======================================================================= */
    require_once('lib/inc/client-options.php');
    add_action('admin_menu', 'h5bs_client_options');

    /* ======================================================================= */
    /* Meta Data for Taxonomy */
    /* ======================================================================= */
    function _cat_add_page($tag)
    {
        ?>
        <div class="form-field">
            <label for="_top_destination"><?php _e('Phone Number'); ?></label>
            <input type="text" name="location-phone-number"/>


        </div>
    <?php
    }

    add_action('staff_location_add_form_fields', '_cat_add_page', 10, 1);

    function _cat_edit_page($tag)
    {
        $value = get_term_meta($tag->term_id, 'location-phone-number', true);

        ?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="location-phone-number"><?php _e('Phone Number'); ?></label>
            </th>
            <td class="cat-upload-field">

                <input type="text" name="location-phone-number" value="<?php echo $value; ?>"/>


            </td>
        </tr>
    <?php
    }

    add_action('staff_location_edit_form_fields', '_cat_edit_page', 10, 1);

    add_action("created_staff_location", 'save_tax_metadata', 10, 1);
    add_action("edited_staff_location", 'save_tax_metadata', 10, 1);
?>
<?php

    function save_tax_metadata($term_id)
    {
        if (isset($_POST['location-phone-number'])) {
            update_term_meta($term_id, 'location-phone-number', esc_attr($_POST['location-phone-number']));
        }
    }

// get taxonomies terms
    function custom_taxonomies_terms()
    {
        global $post, $post_id;
        // get post by post id
        $post = & get_post($post->ID);
        // get post type by post
        $post_type = $post->post_type;
        // get post type taxonomies
        $taxonomies = get_object_taxonomies($post_type);
        foreach ($taxonomies as $taxonomy) {
            // get the terms related to post
            $terms = get_the_terms($post->ID, $taxonomy);
            if (!empty($terms)) {
                $out = array();
                foreach ($terms as $term)
                    $out[] = $term->slug;
                $return = join(', ', $out);
            }
        }
        return $return;
    }
