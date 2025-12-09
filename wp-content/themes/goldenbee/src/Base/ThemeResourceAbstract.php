<?php

namespace App\Base;

/**
 * Abstract class ThemeResourceAbstract
 * Provides common functionality for enqueueing styles and scripts in the theme.
 */
abstract class ThemeResourceAbstract
{
    protected static $template_directory_uri = '/wp-content/themes/goldenbee/src/assets';

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_style']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_script']);
    }

    /**
     * Enqueue theme styles
     * @return void
     */
    public function enqueue_style()
    {
        // Enqueue mmenu CSS only for mobile devices and if menu exists
        if (wp_is_mobile() && has_nav_menu('primary_menu')) {
            wp_enqueue_style('mmenu', self::$template_directory_uri . '/vendor/mmenu-js-master/dist/mmenu.css', [], '2.3');
        }
    }

    /**
     * Enqueue theme scripts
     * @return void
     */
    public function enqueue_script()
    {
        // Enqueue Tailwind CSS
        wp_enqueue_script('tailwindcss', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', [], '4.1.11', true);

        // Enqueue AOS (Animate On Scroll) library
        wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', [], '2.3.4');
        wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', [], '2.3.4', true);

        // Initialize AOS
        wp_add_inline_script('aos-js', 'AOS.init({ duration: 800, once: true, offset: 100 });');

        // Enqueue jQuery only if needed
        if (wp_is_mobile() && has_nav_menu('primary_menu')) {
            wp_enqueue_script('jquery-3', 'https://code.jquery.com/jquery-3.7.1.min.js', ['jquery'], '3.7.1', true);
            wp_enqueue_script('mmenu-js', self::$template_directory_uri . '/vendor/mmenu-js-master/dist/mmenu.js', ['jquery'], '2.3', true);
        }
        // Enqueue custom script
        wp_enqueue_script('theme-script', self::$template_directory_uri . '/js/script.js', [], '1.1', true);
    }
}
