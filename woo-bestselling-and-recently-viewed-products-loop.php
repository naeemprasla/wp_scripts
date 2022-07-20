<?php 


// Best Seller Products
function wpb_best_seller()
{

    $loop = new WP_Query(
        array(
            'post_type' => 'product',
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'posts_per_page' => 12
        )
    );
    $html = '';
    $html .= '<div class="smoke_product product best-seller" id="best-products-slider">';
    while ($loop->have_posts()) : $loop->the_post();
        global $product, $post, $woocommerce;

        if ($product->is_on_sale()) :
            $sale =  '<div class="sale">' .apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale!', 'woocommerce') . '</span>', $post, $product) . '</div> ';
        endif;


        $rating = round($product->get_average_rating());



        $html .= '<div class="smoke_single-product post-' . $product->get_id() . '">
        <div class="product-wrapper">
            <div class="product-image">
                <div class="image-wrapper">
                    ' . $sale . '' . $product->get_image('full') . '
                   
                </div>
            </div>
            <div class="product-meta">
                <div class="p-title">
                    <h4><a href="' . get_the_permalink() . '">' . $product->get_name() . '</a></h4>
                </div>
                <div class="p-price">
                    <p>' . $product->get_price_html() . '</p>
                </div>
                <div class="p-reviews">
                    <p>' . get_product_reviews($rating) . '</p>
                </div>
                <div class="cart-button">
                ' . sprintf('<a href="%s" data-quantity="1" class="%s" %s>%s</a>', esc_url($product->add_to_cart_url()), esc_attr(implode(' ', array_filter(array(
            'button',
            'product_type_' . $product->get_type(),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : ''
        )))), wc_implode_html_attributes(array(
            'data-product_id' => $product->get_id(),
            'data-product_sku' => $product->get_sku(),
            'aria-label' => $product->add_to_cart_description(),
            'rel' => 'nofollow'
        )), esc_html($product->add_to_cart_text())) . '
                </div>
            </div>
        </div>
    </div>';

    endwhile;
    $html .= '</div>';

    return $html;
    wp_reset_query();
}

add_shortcode('smoke_best_products', 'wpb_best_seller');

// Recently Viewed Products

function wpb_recently_viewed()
{

    $viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', $_COOKIE['woocommerce_recently_viewed']) : array();

    $viewed_products = array_filter(array_map('absint', $viewed_products));

    // If no data, quit

    if (empty($viewed_products))

        return __('You have not viewed any product yet!', 'rc_wc_rvp');

    ob_start();

    // Get products per page

    if (!isset($per_page) ? $number = 4 : $number = $per_page)

        $loop = new WP_Query(
            array(
                'posts_per_page' => $number,
                'no_found_rows'  => 1,
                'post_status'    => 'publish',
                'post_type'      => 'product',
                'post__in'       => $viewed_products,
                'orderby'        => 'rand'
            )
        );



$html = '';
$html .= '<div class="smoke_product product product-viewed" id="viewed-products-slider">';

    while ($loop->have_posts()) : $loop->the_post();
    global $product, $post, $woocommerce;

    if ($product->is_on_sale()) :
            $sale =  '<div class="sale">' .apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale!', 'woocommerce') . '</span>', $post, $product) . '</div> ';
        endif;


    $rating = round($product->get_average_rating());



    $html .= '<div class="smoke_single-product post-' . $product->get_id() . '">
    <div class="product-wrapper">
        <div class="product-image">
            <div class="image-wrapper">
                ' . $sale . ' ' . $product->get_image('full') . '
               
            </div>
        </div>
        <div class="product-meta">
            <div class="p-title">
                <h4><a href="' . get_the_permalink() . '">' . $product->get_name() . '</a></h4>
            </div>
            <div class="p-price">
                <p>' . $product->get_price_html() . '</p>
            </div>
            <div class="p-reviews">
            <p>' . get_product_reviews($rating) . '</p>
            </div>
            <div class="cart-button">
            ' . sprintf('<a href="%s" data-quantity="1" class="%s" %s>%s</a>', esc_url($product->add_to_cart_url()), esc_attr(implode(' ', array_filter(array(
        'button',
        'product_type_' . $product->get_type(),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
        $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : ''
    )))), wc_implode_html_attributes(array(
        'data-product_id' => $product->get_id(),
        'data-product_sku' => $product->get_sku(),
        'aria-label' => $product->add_to_cart_description(),
        'rel' => 'nofollow'
    )), esc_html($product->add_to_cart_text())) . '
            </div>
        </div>
    </div>
</div>';

endwhile;

$html .= '</div>';

return $html;
wp_reset_query();
}

add_shortcode('smoke_recently_viewed_products', 'wpb_recently_viewed');
