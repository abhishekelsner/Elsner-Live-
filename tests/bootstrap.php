<?php

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// WordPress Sanitization & Escaping stubs
if (!function_exists('wp_unslash')) {
    function wp_unslash($value) {
        return is_string($value) ? stripslashes($value) : $value;
    }
}

if (!function_exists('sanitize_text_field')) {
    function sanitize_text_field($str) {
        return is_string($str) ? trim(strip_tags($str)) : '';
    }
}

if (!function_exists('sanitize_email')) {
    function sanitize_email($email) {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}

if (!function_exists('esc_url')) {
    function esc_url($url) {
        return htmlspecialchars((string)$url, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('esc_url_raw')) {
    function esc_url_raw($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
    }
}

if (!function_exists('esc_html')) {
    function esc_html($text) {
        return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
    }
}

// WordPress Query & Options stubs
if (!function_exists('add_query_arg')) {
    function add_query_arg($key, $value, $url) {
        $sep = (strpos($url, '?') === false) ? '?' : '&';
        return $url . $sep . urlencode($key) . '=' . urlencode($value);
    }
}

if (!function_exists('get_option')) {
    function get_option($option, $default = false) {
        return $default;
    }
}

if (!function_exists('add_action')) {
    function add_action($tag, $callback, $priority = 10, $accepted_args = 1) {
        return true;
    }
}

if (!function_exists('add_filter')) {
    function add_filter($tag, $callback, $priority = 10, $accepted_args = 1) {
        return true;
    }
}

// WordPress Template & Post stubs
if (!function_exists('get_header')) {
    function get_header($name = null, $args = array()) {}
}

if (!function_exists('get_footer')) {
    function get_footer($name = null, $args = array()) {}
}

if (!function_exists('get_sidebar')) {
    function get_sidebar($name = null, $args = array()) {}
}

if (!function_exists('get_the_ID')) {
    function get_the_ID() {
        return 123;
    }
}

if (!function_exists('get_permalink')) {
    function get_permalink($post = 0, $leavename = false) {
        return 'https://example.com/test-post';
    }
}

if (!function_exists('get_post_meta')) {
    function get_post_meta($post_id, $key = '', $single = false) {
        // Return false so that fallback random_int triggers in single templates
        return false;
    }
}

if (!function_exists('have_posts')) {
    function have_posts() {
        return false;
    }
}

if (!function_exists('the_post')) {
    function the_post() {}
}

if (!function_exists('wp_head')) {
    function wp_head() {}
}

if (!function_exists('wp_footer')) {
    function wp_footer() {}
}

if (!function_exists('home_url')) {
    function home_url($path = '') {
        return 'https://example.com' . $path;
    }
}

if (!function_exists('is_page')) {
    function is_page($page = '') {
        return false;
    }
}

if (!function_exists('custom_breadcrumbs')) {
    function custom_breadcrumbs() {
        echo '<div class="breadcrumbs">Home</div>';
    }
}

if (!function_exists('get_the_content')) {
    function get_the_content() {
        return 'sample content';
    }
}

if (!function_exists('get_parent_theme_file_path')) {
    function get_parent_theme_file_path($file = '') {
        return dirname(__DIR__) . '/themes/Elsner-Revemp/' . ltrim($file, '/');
    }
}

if (!function_exists('get_theme_file_path')) {
    function get_theme_file_path($file = '') {
        return dirname(__DIR__) . '/themes/Elsner-Revemp/' . ltrim($file, '/');
    }
}

if (!function_exists('get_theme_file_uri')) {
    function get_theme_file_uri($file = '') {
        return 'https://example.com/themes/Elsner-Revemp/' . ltrim($file, '/');
    }
}

if (!function_exists('wp_mail')) {
    function wp_mail($to, $subject, $message, $headers = '', $attachments = array()) {
        return true;
    }
}

if (!function_exists('get_post_field')) {
    function get_post_field($field, $post = null) {
        return 'sample-post-field';
    }
}

if (!function_exists('do_shortcode')) {
    function do_shortcode($content) {
        return $content;
    }
}

if (!function_exists('get_author_posts_url')) {
    function get_author_posts_url($author_id, $author_nicename = '') {
        return 'https://example.com/author';
    }
}

if (!function_exists('wp_get_theme')) {
    function wp_get_theme($stylesheet = null, $theme_root = null) {
        return new class {
            public function get($key) { return '1.0'; }
        };
    }
}

if (!function_exists('get_post')) {
    function get_post($post = null, $output = 'OBJECT', $filter = 'raw') {
        return (object) array('ID' => 123, 'post_title' => 'Title', 'post_content' => 'Content');
    }
}

if (!function_exists('get_the_author_meta')) {
    function get_the_author_meta($field = '', $user_id = false) {
        return 'Author';
    }
}

if (!class_exists('Walker_Nav_Menu')) {
    class Walker_Nav_Menu {}
}

if (!function_exists('get_the_category')) {
    function get_the_category($id = false) {
        return array((object) array('term_id' => 1, 'name' => 'Technology', 'slug' => 'tech'));
    }
}

if (!function_exists('add_shortcode')) {
    function add_shortcode($tag, $callback) {
        return true;
    }
}

if (!function_exists('get_category_link')) {
    function get_category_link($category_id) {
        return 'https://example.com/category/tech';
    }
}

if (!function_exists('get_the_date')) {
    function get_the_date($format = '', $post = null) {
        return 'October 7, 2026';
    }
}

if (!function_exists('get_the_title')) {
    function get_the_title($post = 0) {
        return 'Sample Post Title';
    }
}

if (!function_exists('the_title')) {
    function the_title($before = '', $after = '', $echo = true) {
        if ($echo) echo $before . 'Sample Post Title' . $after;
        return 'Sample Post Title';
    }
}

if (!function_exists('the_time')) {
    function the_time($format = '') {
        echo 'Oct 07, 2026';
    }
}

if (!function_exists('the_modified_time')) {
    function the_modified_time($format = '') {
        echo 'Oct 07, 2026';
    }
}

if (!function_exists('get_the_content_reading_time')) {
    function get_the_content_reading_time() {
        return '3';
    }
}

if (!function_exists('get_the_author')) {
    function get_the_author() {
        return 'Admin';
    }
}

if (!function_exists('get_the_post_thumbnail')) {
    function get_the_post_thumbnail($post = null, $size = 'post-thumbnail') {
        return '';
    }
}

if (!function_exists('the_post_thumbnail')) {
    function the_post_thumbnail($size = 'post-thumbnail') {}
}

if (!function_exists('apply_filters')) {
    function apply_filters($tag, $value) {
        return $value;
    }
}

if (!function_exists('get_the_tag_list')) {
    function get_the_tag_list($before = '', $sep = '', $after = '', $id = 0) {
        return '';
    }
}

if (!function_exists('esc_html__')) {
    function esc_html__($text, $domain = 'default') {
        return $text;
    }
}

if (!function_exists('__')) {
    function __($text, $domain = 'default') {
        return $text;
    }
}

if (!function_exists('add_ids_to_headings')) {
    function add_ids_to_headings($content) {
        return $content;
    }
}

if (!function_exists('get_headings')) {
    function get_headings($content) {
        return array(array('id' => 'heading-1', 'title' => 'Heading 1'));
    }
}

if (!function_exists('site_url')) {
    function site_url($path = '', $scheme = null) {
        return 'https://example.com' . $path;
    }
}

if (!function_exists('esc_attr')) {
    function esc_attr($text) {
        return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('the_post_navigation')) {
    function the_post_navigation($args = array()) {}
}

if (!function_exists('get_template_part')) {


    function get_template_part($slug, $name = null, $args = array()) {}
}





// ACF (Advanced Custom Fields) stubs
if (!function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true) {
        return 'sample field value for ' . $selector;
    }
}

if (!function_exists('get_sub_field')) {
    function get_sub_field($selector, $format_value = true) {
        return 'sample sub field value for ' . $selector;
    }
}

if (!function_exists('the_sub_field')) {
    function the_sub_field($selector, $format_value = true) {
        echo 'sample sub field value for ' . $selector;
    }
}

$GLOBALS['__mock_have_rows_counter'] = 0;
if (!function_exists('have_rows')) {
    function have_rows($selector, $post_id = false) {
        global $__mock_have_rows_counter;
        if ($__mock_have_rows_counter < 1) {
            $__mock_have_rows_counter++;
            return true;
        }
        $__mock_have_rows_counter = 0;
        return false;
    }
}

if (!function_exists('the_row')) {
    function the_row() {
        return true;
    }
}

// Contact Form 7 / WP stubs
if (!function_exists('is_wp_error')) {
    function is_wp_error($thing) {
        return false;
    }
}

if (!function_exists('wp_remote_post')) {
    function wp_remote_post($url, $args = array()) {
        return array('response' => array('code' => 200), 'body' => '{"success":true,"status":"success"}');
    }
}

if (!function_exists('wp_remote_retrieve_response_code')) {
    function wp_remote_retrieve_response_code($response) {
        return 200;
    }
}

if (!function_exists('wp_remote_retrieve_body')) {
    function wp_remote_retrieve_body($response) {
        return '{"success":true,"status":1}';
    }
}


if (!class_exists('WPCF7_Submission')) {
    class WPCF7_Submission {
        public static function get_instance() {
            return new self();
        }
        public function get_posted_data() {
            return array('page_url' => 'https://example.com/contact');
        }
    }
}

if (!class_exists('MockContactForm')) {
    class MockContactForm {
        private $props = array();
        public function __construct($props = array()) {
            $this->props = $props;
        }
        public function id() {
            return 12345;
        }
        public function prop($name) {
            return isset($this->props[$name]) ? $this->props[$name] : array();
        }
        public function set_properties($props) {
            $this->props = array_merge($this->props, $props);
        }
    }
}

if (!class_exists('WPCF7_ContactForm')) {
    class WPCF7_ContactForm {
        public static function get_current() {
            return new MockContactForm();
        }
    }
}


