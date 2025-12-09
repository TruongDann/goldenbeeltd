<?php


// Setup mobile menu with mmenu-js
function goldenbee_mmenu_setup()
{
    if (!wp_is_mobile() || !has_nav_menu('primary_menu')) {
        return;
    }
    $header = function_exists('get_field') ? get_field('header', 'option') : [];
?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Mmenu('#menu-header-mobile', {
                theme: 'white',
                offCanvas: {
                    position: 'bottom'
                },
                navbars: [{
                        height: 2,
                        content: [
                            '<a target="_blank" href="tel:<?php echo esc_attr($header['phone'] ?? ''); ?>" class="fa fa-phone"></a>',
                            '<a class="mmenu-logo" href="<?php echo esc_url(home_url('/')); ?>"><img class="h-12" src="<?php echo esc_url($header['logo'] ?? ''); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>',
                            '<a target="_blank" href="mailto:<?php echo esc_attr($header['email'] ?? ''); ?>" class="fa fa-envelope"></a>'
                        ]
                    },
                    {
                        content: [
                            '<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="p-3 flex gap-2">' +
                            '<input class="form-control flex-1 border rounded px-2 py-1" type="text" name="s" id="search" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr_x('Search...', 'goldenbee'); ?>" />' +
                            '<button class="btn bg-blue-600 text-white rounded px-4 py-1"><?php echo esc_attr_x('Search', 'goldenbee'); ?></button>' +
                            '</form>'
                        ]
                    },
                    {
                        content: ['prev', 'title']
                    }
                ]
            }, {});
        });
    </script>
<?php
}
add_action('wp_footer', 'goldenbee_mmenu_setup');

// Customize archive titles
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) {
        $title = sprintf(__('%1$s', 'goldenbee'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

// Remove auto-paragraphs from excerpts
remove_filter('the_excerpt', 'wpautop');

// Customize REST API post response
add_filter('rest_prepare_post', 'goldenbee_filter_post', 10, 3);
function goldenbee_filter_post($data, $post, $context)
{
    if (!empty($data->data['categories'])) {
        $category_name = [];
        foreach ($data->data['categories'] as $key => $category_id) {
            $category = get_category($category_id);
            if ($category) {
                $category_name[$key]['id'] = $category_id;
                $category_name[$key]['name'] = $category->name;
            }
        }
        $data->data['categories'] = $category_name;
    }

    $data->data['featured_media'] = !empty($data->data['featured_media']) ? wp_get_attachment_url($data->data['featured_media']) : '';
    return $data;
}

// Customize REST API category response
add_filter('rest_prepare_category', 'goldenbee_filter_category', 10, 3);
function goldenbee_filter_category($data, $post, $context)
{
    $data->data['featured_media'] = function_exists('get_field') ? get_field('category_featured_media', get_term($data->data['id'])) ?? '' : '';
    return $data;
}

// Add WooCommerce gallery support
add_action('after_setup_theme', 'goldenbee_gallery_lightbox');
function goldenbee_gallery_lightbox()
{
    if (class_exists('WooCommerce')) {
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
}
?>