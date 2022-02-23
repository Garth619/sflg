<?php
/*
Plugin Name: Gravity Forms Utilities by 1point21
Version: 1.6
Author: Rob Hill
Author URI: mailto:robh71@gmail.com
Description: Gravity Forms Utilities by 1point21
*/
add_action( 'init', 'onepoint21_gravityforms_set_cookies');
function onepoint21_gravityforms_set_cookies() {
    if ( !isset( $_SERVER['HTTP_REFERER'] ) || isset( $_SESSION['onepoint21_referred'] ) || isset( $_COOKIE['onepoint21_referred'] ) || is_user_logged_in() )
        return;

    if ( parse_url( $_SERVER['HTTP_REFERER'], PHP_URL_HOST ) == $_SERVER["SERVER_NAME"] )
        return;

    $referred = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    setcookie('onepoint21_referred', $referred, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_referred'] = $referred;

    $referer = $_SERVER['HTTP_REFERER'];
    setcookie('onepoint21_referer', $referer, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_referer'] = $referer;

    date_default_timezone_set('America/Los_Angeles');
    $referer_dt = date("Y-m-d h:i:s T");
    setcookie('onepoint21_referer_dt', $referer_dt, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_referer_dt'] = $referer_dt;
}

add_action( 'gform_admin_pre_render', 'onepoint21_gravityforms_add_merge_tags' );
function onepoint21_gravityforms_add_merge_tags( $form ) {
    ?>
    <script type="text/javascript">
        gform.addFilter('gform_merge_tags', 'onepoint21_gf_merge_tags');

        function onepoint21_gf_merge_tags(mergeTags, elementId, hideAllFields, excludeFieldTypes, isPrepop, option){
            mergeTags["custom"].tags.push({ tag: '{onepoint21_referred}', label: 'Entry Page' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_referer}', label: 'Referer' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_referer_dt}', label: 'Referer Date/Time' });
            
            // http://useragentapi.com
            mergeTags["custom"].tags.push({ tag: '{onepoint21_ua_type}', label: 'Device Type' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_os_name}', label: 'OS Name' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_os_version}', label: 'OS Version' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_browser_name}', label: 'Browser Name' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_browser_version}', label: 'Browser Version' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_engine_name}', label: 'Engine Name' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_engine_version}', label: 'Engine Version' });

            // https://ga-dev-tools.appspot.com/campaign-url-builder/
            mergeTags["custom"].tags.push({ tag: '{onepoint21_utm_source}', label: 'Campaign Source' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_utm_medium}', label: 'Campaign Medium' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_utm_campaign}', label: 'Campaign Name' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_utm_term}', label: 'Campaign Term' });
            mergeTags["custom"].tags.push({ tag: '{onepoint21_utm_content}', label: 'Campaign Content' });

            return mergeTags;
        }
    </script>
    <?php
    return $form;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_referred', 10, 7 );
function onepoint21_gravityforms_replace_referred( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_referred}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_gravityforms_get_referred();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_referer', 10, 7 );
function onepoint21_gravityforms_replace_referer( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_referer}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_gravityforms_get_referer();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_referer_dt', 10, 7 );
function onepoint21_gravityforms_replace_referer_dt( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_referer_dt}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_gravityforms_get_referer_dt();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

function onepoint21_gravityforms_get_referred() {
    if ( isset( $_SESSION['onepoint21_referred'] ) ) {
        return $_SESSION['onepoint21_referred'];
    }
    elseif ( isset( $_COOKIE['onepoint21_referred'] ) ) {
        return $_COOKIE['onepoint21_referred'];
    }
    else {
        return 'None';
    }
}

function onepoint21_gravityforms_get_referer() {
    if ( isset( $_SESSION['onepoint21_referer'] ) ) {
        return $_SESSION['onepoint21_referer'];
    }
    elseif ( isset( $_COOKIE['onepoint21_referer'] ) ) {
        return $_COOKIE['onepoint21_referer'];
    }
    else {
        return 'None';
    }
}

function onepoint21_gravityforms_get_referer_dt() {
    if ( isset( $_SESSION['onepoint21_referer_dt'] ) ) {
        return $_SESSION['onepoint21_referer_dt'];
    }
    elseif ( isset( $_COOKIE['onepoint21_referer_dt'] ) ) {
        return $_COOKIE['onepoint21_referer_dt'];
    }
    else {
        return 'None';
    }
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_ua_type', 10, 7 );
function onepoint21_gravityforms_replace_ua_type( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_ua_type}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_ua_type();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_os_name', 10, 7 );
function onepoint21_gravityforms_replace_os_name( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_os_name}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_os_name();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_os_version', 10, 7 );
function onepoint21_gravityforms_replace_os_version( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_os_version}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_os_version();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_browser_name', 10, 7 );
function onepoint21_gravityforms_replace_browser_name( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_browser_name}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_browser_name();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_browser_version', 10, 7 );
function onepoint21_gravityforms_replace_browser_version( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_browser_version}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_browser_version();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_engine_name', 10, 7 );
function onepoint21_gravityforms_replace_engine_name( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_engine_name}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_engine_name();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_engine_version', 10, 7 );
function onepoint21_gravityforms_replace_engine_version( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_engine_version}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_useragentapi_engine_version();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

function onepoint21_useragentapi_get() {
    if ( isset( $_SESSION['useragentapi_result'] ) && isset( $_SESSION['useragentapi_result']->ua) ) {
        $useragentapi_result = $_SESSION['useragentapi_result'];
        return $useragentapi_result;
    }

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $useragentapi_result = onepoint21_useragentapi( $user_agent );
    $_SESSION['useragentapi_result'] = $useragentapi_result;

    return $useragentapi_result;
}

function onepoint21_useragentapi( $user_agent ) {
    $useragentapi_key = '827c836011392c9425d9be65d132f489';
    $ua = urlencode( $user_agent );
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://api.userstack.com/detect?access_key=$useragentapi_key&ua=$ua" );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );

    $result = curl_exec( $ch );
    $http = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
    curl_close( $ch );

    $result_obj = json_decode( $result );   

    return $result_obj;
}

function onepoint21_useragentapi_ua_type() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->device->type;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

function onepoint21_useragentapi_os_name() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->os->name;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

function onepoint21_useragentapi_os_version() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->os->code;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

function onepoint21_useragentapi_browser_name() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->browser->name;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

function onepoint21_useragentapi_browser_version() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->browser->version;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

function onepoint21_useragentapi_engine_name() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->browser->engine;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

function onepoint21_useragentapi_engine_version() {
    $useragentapi_result = onepoint21_useragentapi_get();

    if ( isset( $useragentapi_result ) && isset( $useragentapi_result->ua ) )
        return $useragentapi_result->browser->version_major;
    elseif ( isset( $useragentapi_result ) && isset( $useragentapi_result->error ) )    
        return $useragentapi_result->error->code . ': ' . $useragentapi_result->error->info;
    else
        return "No data returned";
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_utm_source', 10, 7 );
function onepoint21_gravityforms_replace_utm_source( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_utm_source}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_get_utm_source();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

add_action( 'init', 'onepoint21_gravityforms_get_utm_vars');
function onepoint21_gravityforms_get_utm_vars() {
    if ( !isset( $_GET['utm_source'] ) || is_user_logged_in() )
        return;

    setcookie('onepoint21_utm_source', $_GET['utm_source'], time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_utm_source'] = $_GET['utm_source'];

    setcookie('onepoint21_utm_medium', $_GET['utm_medium'], time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_utm_medium'] = $_GET['utm_medium'];

    setcookie('onepoint21_utm_campaign', $_GET['utm_campaign'], time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_utm_campaign'] = $_GET['utm_campaign'];

    setcookie('onepoint21_utm_term', $_GET['utm_term'], time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_utm_term'] = $_GET['utm_term'];

    setcookie('onepoint21_utm_content', $_GET['utm_content'], time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, false);
    $_SESSION['onepoint21_utm_content'] = $_GET['utm_content'];
}

function onepoint21_get_utm_source() {
    if ( isset( $_SESSION['onepoint21_utm_source'] ) ) {
        return $_SESSION['onepoint21_utm_source'];
    }
    elseif ( isset( $_COOKIE['onepoint21_utm_source'] ) ) {
        return $_COOKIE['onepoint21_utm_source'];
    }
    else {
        return 'None';
    }
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_utm_medium', 10, 7 );
function onepoint21_gravityforms_replace_utm_medium( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_utm_medium}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_get_utm_medium();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

function onepoint21_get_utm_medium() {
    if ( isset( $_SESSION['onepoint21_utm_medium'] ) ) {
        return $_SESSION['onepoint21_utm_medium'];
    }
    elseif ( isset( $_COOKIE['onepoint21_utm_medium'] ) ) {
        return $_COOKIE['onepoint21_utm_medium'];
    }
    else {
        return 'Organic';
    }
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_utm_campaign', 10, 7 );
function onepoint21_gravityforms_replace_utm_campaign( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_utm_campaign}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_get_utm_campaign();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

function onepoint21_get_utm_campaign() {
    if ( isset( $_SESSION['onepoint21_utm_campaign'] ) ) {
        return $_SESSION['onepoint21_utm_campaign'];
    }
    elseif ( isset( $_COOKIE['onepoint21_utm_campaign'] ) ) {
        return $_COOKIE['onepoint21_utm_campaign'];
    }
    else {
        return 'None';
    }
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_utm_term', 10, 7 );
function onepoint21_gravityforms_replace_utm_term( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_utm_term}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_get_utm_term();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

function onepoint21_get_utm_term() {
    if ( isset( $_SESSION['onepoint21_utm_term'] ) ) {
        return $_SESSION['onepoint21_utm_term'];
    }
    elseif ( isset( $_COOKIE['onepoint21_utm_term'] ) ) {
        return $_COOKIE['onepoint21_utm_term'];
    }
    else {
        return 'None';
    }
}

add_filter( 'gform_replace_merge_tags', 'onepoint21_gravityforms_replace_utm_content', 10, 7 );
function onepoint21_gravityforms_replace_utm_content( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $custom_merge_tag = '{onepoint21_utm_content}';
    
    if ( strpos( $text, $custom_merge_tag ) === false ) {
        return $text;
    }
    
    $new_value = onepoint21_get_utm_content();
    $text = str_replace( $custom_merge_tag, $new_value, $text );
    
    return $text;
}

function onepoint21_get_utm_content() {
    if ( isset( $_SESSION['onepoint21_utm_content'] ) ) {
        return $_SESSION['onepoint21_utm_content'];
    }
    elseif ( isset( $_COOKIE['onepoint21_utm_content'] ) ) {
        return $_COOKIE['onepoint21_utm_content'];
    }
    else {
        return 'None';
    }
}
