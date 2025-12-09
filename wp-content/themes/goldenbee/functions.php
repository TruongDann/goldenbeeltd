<?php

/**
 * Golden Bee Theme Functions
 * Main functions file for the Golden Bee theme, built on Genesis Framework.
 */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once 'setup.php';

use App\Base\ThemeConfig;
use App\Components\AboutUs;
use App\Components\AboutAwards;
use App\Components\Header;
use App\Components\Slider;
use App\Components\Banner;
use App\Components\BlogStyleCarousel;
use App\Components\ContactOnline;
use App\Components\ProductTab;
use App\Components\ProductTerm;
use App\Components\Footer;
use App\Components\Archive;
use App\Components\ArchiveProduct;
use App\Components\Page;
use App\Components\Single;
use App\Components\SingleProduct;
use App\Components\PageNotFound;
use App\Components\Certificates;
use App\components\HomeComponent;
use App\Components\ProductFeatured;

// Initialize theme configurations
$theme_config = new ThemeConfig();
$theme_config->init();
// Remove default Genesis actions
add_action('init', 'goldenbee_remove_functions', 15);
function goldenbee_remove_functions()
{
    remove_action('genesis_header', 'genesis_do_header');
    remove_action('genesis_footer', 'genesis_do_footer');
    remove_action('genesis_sidebar', 'genesis_do_sidebar');
    remove_action('genesis_loop', 'genesis_do_loop');
}

// Add custom actions
add_action('init', 'goldenbee_add_functions', 15);
function goldenbee_add_functions()
{
    add_action('genesis_header', 'goldenbee_header_components');
    add_action('genesis_loop', 'goldenbee_home_components');
    add_action('genesis_loop', 'goldenbee_single_components');
    add_action('genesis_loop', 'goldenbee_page_components');
    add_action('genesis_loop', 'goldenbee_archive_components');
    add_action('genesis_loop', 'goldenbee_search_components');
    add_action('genesis_loop', 'goldenbee_page_not_found_components');
    add_action('genesis_footer', 'goldenbee_footer_components');
}

function goldenbee_header_components()
{
    Header::render();
}

function goldenbee_home_components()
{
    if (is_home()) {
        HomeComponent::render();
    }
}

function goldenbee_single_components()
{
    if (is_single()) {
        if (class_exists('WooCommerce') && is_woocommerce()) {
        } else {
        }
    }
}

function goldenbee_page_components()
{
    if (is_page() && !is_page_template()) {
    }
}

function goldenbee_archive_components()
{
    if (is_archive()) {
        if (class_exists('WooCommerce') && is_woocommerce()) {
        } else {
        }
    }
}

function goldenbee_search_components()
{
    if (is_search()) {
        if (class_exists('WooCommerce') && is_woocommerce()) {
        } else {
        }
    }
}

function goldenbee_page_not_found_components()
{
    if (is_404()) {
    }
}

function goldenbee_footer_components()
{
    Footer::render();
}



// Override Genesis Customizer function to fix deprecated ${var} syntax
remove_filter('genesis_customizer_theme_settings_config', 'genesis_add_singular_image_output_customizer_checkboxes');
add_filter('genesis_customizer_theme_settings_config', 'goldenbee_add_singular_image_output_customizer_checkboxes');
/**
 * Return the config that includes the genesis_single controls with fixed syntax.
 *
 * @since 3.1.0
 *
 * @param array $config Config array.
 * @return array New config including the genesis_single controls.
 */
function goldenbee_add_singular_image_output_customizer_checkboxes($config)
{
    if (!isset($config['genesis']['sections']['genesis_single'])) {
        return $config;
    }

    $types_with_singular_images_support = get_post_types_by_support('genesis-singular-images');

    $new_controls = [];

    if (isset($config['genesis']['sections']['genesis_single']['controls'])) {
        $orig_controls = $config['genesis']['sections']['genesis_single']['controls'];
    }

    foreach ($types_with_singular_images_support as $type) {
        if (!post_type_exists($type)) {
            continue;
        }
        $post_type = get_post_type_object($type);

        $new_controls["show_featured_image_{$type}"] = [
            // translators: the post type label.
            'label'    => sprintf(__('Show Featured Images on %s', 'genesis'), $post_type->label),
            'section'  => 'genesis_single',
            'type'     => 'checkbox',
            'settings' => [
                'default' => 0,
            ],
        ];
    }

    $config['genesis']['sections']['genesis_single']['controls'] = $new_controls + (isset($orig_controls) ? $orig_controls : []);

    return $config;
}

function custom_tailwind_theme_style_to_head()
{
?>
    <!-- Google Fonts - Outfit và Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style type="text/tailwindcss">
        /* Critical CSS để tránh FOUC */
        * {
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
            opacity: 1;
            visibility: visible;
        }
        
        /* Ngăn FOUC cho các element chính */
        .genesis-nav-menu,
        .site-header,
        .site-inner,
        .site-footer {
            opacity: 1;
            visibility: visible;
        }
        
        :root {
            /* Golden Bee Colors - Original */
            --color-foreground: #131313;
            --color-background: #FFFFFF;
            --color-background-body: #fafbfd;
            --color-primary: #824b19;
            --color-secondary: #caa668;
            --color-textGray: #999999;
            --color-neutral: #EBEBEB;
            --color-link: #6c9d31;
            
            /* Modern Theme Colors - Gold/Yellow Brand */
            --color-brand-50: #fefce8;
            --color-brand-100: #fef9c3;
            --color-brand-200: #fef08a;
            --color-brand-300: #fde047;
            --color-brand-400: #facc15;
            --color-brand-500: #eab308;
            --color-brand-600: #ca8a04;
            --color-brand-700: #a16207;
            --color-brand-800: #854d0e;
            --color-brand-900: #713f12;
            --color-dark-900: #0a0a0a;
            --color-dark-800: #121212;
            --color-dark-700: #1c1c1c;
        }
        
        @theme {
            /* Original Golden Bee Colors */
            --color-foreground: var(--color-foreground);
            --color-background: var(--color-background);
            --color-background-body: var(--color-background-body);
            --color-primary: var(--color-primary);
            --color-secondary: var(--color-secondary);
            --color-textGray: var(--color-textGray);
            --color-neutral: var(--color-neutral);
            --color-link: var(--color-link);
            
            /* Modern Brand Colors */
            --color-brand-50: var(--color-brand-50);
            --color-brand-100: var(--color-brand-100);
            --color-brand-200: var(--color-brand-200);
            --color-brand-300: var(--color-brand-300);
            --color-brand-400: var(--color-brand-400);
            --color-brand-500: var(--color-brand-500);
            --color-brand-600: var(--color-brand-600);
            --color-brand-700: var(--color-brand-700);
            --color-brand-800: var(--color-brand-800);
            --color-brand-900: var(--color-brand-900);
            --color-dark-900: var(--color-dark-900);
            --color-dark-800: var(--color-dark-800);
            --color-dark-700: var(--color-dark-700);
            
            /* Font Families - Tailwind v4 syntax */
            --font-family-sans: 'Outfit', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-family-mono: 'Space Grotesk', 'Courier New', monospace;
            --font-sans: 'Outfit', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-mono: 'Space Grotesk', 'Courier New', monospace;
        }
        
        @utility container {
            @apply w-full mx-auto px-4;
            max-width: 100%;
        }
        
        @layer base {
            body {
                font-family: 'Nunito', sans-serif;
                background-color: var(--color-background-body);
                color: var(--color-foreground);
                line-height: 1.6;
            }
        }
        
        @layer utilities {
            .bg-dark-900 {
                background-color: var(--color-dark-900);
            }
            .bg-dark-800 {
                background-color: var(--color-dark-800);
            }
            .bg-dark-700 {
                background-color: var(--color-dark-700);
            }
        }
        
        /* Custom Keyframe Animations */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        @keyframes shimmer {
            0% {
                left: 0%;
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                left: 100%;
                opacity: 0;
            }
        }
        
        .animate-scroll {
            animation: scroll 20s linear infinite;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-shimmer {
            animation: shimmer 3s infinite;
        }

        @media (min-width: 640px) {
            .container {
                max-width: 640px;
            }
        }
        
        @media (min-width: 768px) {
            .container {
                max-width: 768px;
            }
        }
        
        @media (min-width: 976px) {
            .container {
                max-width: 1000px;
            }
        }
        
        @media (min-width: 1280px) {
            .container {
                max-width: 1280px;
            }
        }
    </style>
<?php
}
add_action('wp_head', 'custom_tailwind_theme_style_to_head');

/**
 * Add custom body classes for Tailwind styling
 */
function goldenbee_custom_body_classes($classes)
{
    $classes[] = 'min-h-screen';
    $classes[] = 'bg-black';
    $classes[] = 'text-zinc-100';
    $classes[] = 'font-sans';
    $classes[] = 'selection:bg-brand-500';
    $classes[] = 'selection:text-black';
    return $classes;
}
add_filter('body_class', 'goldenbee_custom_body_classes');
