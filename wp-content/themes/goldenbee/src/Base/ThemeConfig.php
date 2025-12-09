<?php
namespace App\Base;

/**
 * Class ThemeConfig
 * Handles core theme configurations for the Genesis Framework.
 */
class ThemeConfig extends ThemeResourceAbstract {
    /**
     * Initialize theme configurations
     * @return void
     */
    public function init() {
        // Add WooCommerce support if available
        if (class_exists('WooCommerce')) {
            add_theme_support('woocommerce');
        }
        // Register navigation menus
        $this->register_nav_menu();
        // Add ACF options page
        $this->acf_add_options_page();
    }

    /**
     * Register navigation menus
     * @return void
     */
    protected function register_nav_menu() {
        register_nav_menus([
            'topbar_menu'   => __('Topbar Menu', 'goldenbee'),
            'primary_menu'  => __('Menu chính', 'goldenbee'),
            'footer_menu_1' => __('Menu chân trang 1', 'goldenbee'),
            'footer_menu_2' => __('Menu chân trang 2', 'goldenbee'),
            'language_menu' => __('Menu ngôn ngữ', 'goldenbee'),
            'sidebar_menu'  => __('Sidebar Menu', 'goldenbee'),
        ]);
    }

    /**
     * Add ACF options page
     * @return void
     */
    protected function acf_add_options_page() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'page_title' => __('Cài đặt chung', 'goldenbee'),
                'menu_title' => __('Cài đặt chung', 'goldenbee'),
                'menu_slug'  => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect'   => false,
            ]);
        }
    }

    /**
     * Calculate product discount percentage
     * @param WC_Product|null $product
     * @return float|int
     */
    public static function get_product_percentage($product) {
        if (!class_exists('WooCommerce') || !$product || !$product->is_on_sale()) {
            return 0;
        }

        $max_percentage = 0;
        if ($product->is_type('simple')) {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            if ($regular_price && $sale_price) {
                $max_percentage = (($regular_price - $sale_price) / $regular_price) * 100;
            }
        } elseif ($product->is_type('variable')) {
            foreach ($product->get_children() as $child_id) {
                $variation = wc_get_product($child_id);
                if ($variation) {
                    $price = $variation->get_regular_price();
                    $sale = $variation->get_sale_price();
                    if ($price && $sale) {
                        $percentage = (($price - $sale) / $price) * 100;
                        $max_percentage = max($max_percentage, $percentage);
                    }
                }
            }
        }
        return round($max_percentage, 2);
    }
}
?>