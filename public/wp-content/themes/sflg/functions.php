<?php
/**
 * Front Facing Styles and Scripts
 */
function load_my_styles_scripts()
{
    wp_enqueue_style('styles', get_template_directory_uri() . '/style.css', '', 5, 'all');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'load_my_styles_scripts', 20);
add_action('wp_enqueue_scripts', function ($scripts) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, null, true);
    wp_enqueue_script('jquery');
    $dirJS = new DirectoryIterator(get_stylesheet_directory() . '/js');
    foreach ($dirJS as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
            $fullName = basename($file);
            $name = substr(basename($fullName), 0, strpos(basename($fullName), '.'));
            // Set Dependencies for any script.
            // Since jQuery is already set as a priority requirement no need to list it as a dependency here.
            switch ($name) {
                // case 'examplename':
                //     $deps = array('exampleDependency');
                //     break;
                default:
                    $deps = null;
                    break;
            }
            // string #defer is added to the filename, used as an identifier to Defer the specific script
            // It is filtered, using the 'script_loader_tag' filter.
            wp_enqueue_script($name, get_template_directory_uri() . '/js/' . $fullName . '#defer', $deps, null, true);
        }
    }
    // Main is Custom Coded by the 1P21 Team.
    // ( Used with an IF Statement, for Legacy Compatability )
    if (file_exists(get_template_directory() . '/main-min.js')):
        wp_register_script('mainjs', get_template_directory_uri() . '/main-min.js', '', false, true);
        wp_enqueue_script('mainjs');
    endif;
}, 10);

/**
 * JS - Defer Third Party or Manually Added Script
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    if (strpos($src, '#defer') === false):
        return $tag;
    else:
        $tag = str_replace('#defer', '', $tag);
        $tag = str_replace('<script', '<script defer data-handle="' . $handle . '"', $tag);
        return $tag;
    endif;
}, 10, 3);

/**
 * CSS in Header for Lighthouse
 */
//add_action('wp_head', 'merge_include_css');
function merge_include_css()
{
    $theme = wp_get_theme();
    $styles = file_get_contents(get_stylesheet_directory() . '/style.css');
    $styles = str_replace("images", site_url() . "/wp-content/themes/$theme->template/images", $styles);
    $mergedCSS .= $styles;
    $mergedCSS = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $mergedCSS);
    $mergedCSS = preg_replace('/\s{2,}/', ' ', $mergedCSS);
    $mergedCSS = preg_replace('/\s*([:;{}])\s*/', '$1', $mergedCSS);
    $mergedCSS = preg_replace('/;}/', '}', $mergedCSS);
    file_put_contents(get_stylesheet_directory() . '/styles-in-head.php', $mergedCSS);
    {
        echo '<style>';
        include_once get_template_directory() . '/styles-in-head.php';
        echo '</style>';
    }
}

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme()
{
    add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'wpdocs_after_setup_theme');

/**
 * Remove margin from admin bar
 */
function ilaw_remove_html_admin_margin()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'ilaw_remove_html_admin_margin');

/**
 * No Tab Conflicts Gravity Forms
 */
add_filter('gform_tabindex', 'gform_tabindexer', 10, 2);
function gform_tabindexer($tab_index, $form = false)
{
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if ($form) {
        add_filter('gform_tabindex_' . $form['id'], 'gform_tabindexer');
    }
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

/**
 * Remove Unnecessary Scripts
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Register Nav-Menus
 */
register_nav_menus(array(
    'main_menu' => 'Main Menu',
));

/**
 * Add Theme Support Page Thumbnails
 */
add_theme_support('post-thumbnails');

/**
 *Modify the_excerpt() " read more "
 */
function new_excerpt_more($more)
{
    global $post;
    return '... <a href="' . get_permalink($post->ID) . '">' . 'read more' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Add Page Slug to Body Class
 */
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');

/**
 * ACF: CREATE OPTIONS PAGE
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}

/**
 * Allow Various to Media Upload
 */
add_filter('upload_mimes', 'add_custom_upload_mimes');
function add_custom_upload_mimes($existing_mimes)
{
    $existing_mimes['woff2'] = 'application/x-font-woff2';
    $existing_mimes['webp'] = 'image/webp';
    $existing_mimes['svg'] = 'image/svg+xml';
    return $existing_mimes;
}

/**
 * Add types that dont work on ulpoad_mimes filter
 */
add_filter('wp_check_filetype_and_ext', 'ilaw_wp_upload_mimes_bug_fix', 10, 4);
function ilaw_wp_upload_mimes_bug_fix($types, $file, $filename, $mimes)
{
    if (false !== strpos($filename, '.vcf')) {
        $types['ext'] = 'vcf';
        $types['type'] = 'text/x-vcard';
    }
    return $types;
}

/**
 * Blog Pagination
 */
function my_numeric_posts_nav()
{
    if (is_singular()) {
        return;
    }
    global $wp_query;
    /**
     * Stop execution if there's only 1 page
     */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /**
     * Add current page to the array
     */
    if ($paged >= 1) {
        $links[] = $paged;
    }
    /**
     * Add the pages around the current page to the array
     */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div id="paged-wrapper"><ul>' . "\n";
    /**
     * Previous Post Link
     */
    if (get_previous_posts_link()) {
        printf('<li class="myprev">' . file_get_contents(get_template_directory() . '/images/arrow.svg') . '%s</li>' . "\n", get_previous_posts_link('Prev'));
    }
    /**
     * Link to first page, plus ellipses if necessary
     * put "prev" string in get_previous_posts_link
     */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links)) {
            echo '<li>…</li>';
        }
    }
    /**
     * Link to current page, plus 2 pages in either direction if necessary
     */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /**
     * Link to last page, plus ellipses if necessary
     */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li class="ddd">…</li>' . "\n";
        }
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    /**
     * Next Post Link
     */
    if (get_next_posts_link()) {
        printf('<li class="mynext">%s' . file_get_contents(get_template_directory() . '/images/arrow.svg') . '</li>' . "\n", get_next_posts_link('Next'));
    }
    /**
     * put "next" string in get_previous_posts_link
     */
    echo '</ul></div>' . "\n";
}

/**
 * Remove Block Library
 */
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css');

/**
 * Responsive Content Images
 */
function ilaw_content_image_sizes_attr($sizes, $size)
{
    $width = $size[0];
    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
    if ('page' === get_post_type()) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }
    return $sizes;
}
add_filter('wp_calculate_image_sizes', 'ilaw_content_image_sizes_attr', 10, 2);

/**
 *  Responsive Featured Images
 */
function ilaw_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
    if ('post-thumbnail' === $size) {
        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'ilaw_post_thumbnail_sizes_attr', 10, 3);

/**
 *  ACF Gutenberg Blocks
 */
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    /**
     *  Check function exists
     */
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name' => 'testimonials',
            'title' => __('Testimonials'),
            'description' => __('A custom testimonial block.'),
            'render_template' => 'page-templates/includes/template-infoslider_component.php',
            'category' => 'formatting',
            'icon' => 'testimonial',
            'mode' => 'edit',
            'supports' => array('mode' => false),
            'keywords' => array('testimonials', 'quote'),
        ));
        acf_register_block_type(array(
            'name' => 'awards',
            'title' => __('Awards'),
            'description' => __('A custom awards block.'),
            'render_template' => 'page-templates/includes/template-awards_component.php',
            'category' => 'formatting',
            'icon' => 'awards',
            'mode' => 'edit',
            'supports' => array('mode' => false),
            'keywords' => array('awards'),
        ));
    }
}