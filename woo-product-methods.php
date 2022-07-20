<?php 
/*
Usage : https://github.com/naeemprasla/scripts/blob/master/woo-bestselling-and-recently-viewed-products-loop.php
*/


global $product;

// Get Product ID
 
$product->get_id(); //(fixes the error: "Notice: id was called incorrectly. Product properties should not be accessed directly")
 
// Get Product General Info
 
$product->get_type();
$product->get_name();
$product->get_slug();
$product->get_date_created();
$product->get_date_modified();
$product->get_status();
$product->get_featured();
$product->get_catalog_visibility();
$product->get_description();
$product->get_short_description();
$product->get_sku();
$product->get_menu_order();
$product->get_virtual();
get_permalink( $product->get_id() );
 
// Get Product Prices
 
$product->get_price();
$product->get_regular_price();
$product->get_sale_price();
$product->get_date_on_sale_from();
$product->get_date_on_sale_to();
$product->get_total_sales();
 
// Get Product Tax, Shipping & Stock
 
$product->get_tax_status();
$product->get_tax_class();
$product->get_manage_stock();
$product->get_stock_quantity();
$product->get_stock_status();
$product->get_backorders();
$product->get_sold_individually();
$product->get_purchase_note();
$product->get_shipping_class_id();
 
// Get Product Dimensions
 
$product->get_weight();
$product->get_length();
$product->get_width();
$product->get_height();
$product->get_dimensions();
 
// Get Linked Products
 
$product->get_upsell_ids();
$product->get_cross_sell_ids();
$product->get_parent_id();
 
// Get Product Variations
 
$product->get_attributes();
$product->get_default_attributes();
 
// Get Product Taxonomies
 
$product->get_categories();
$product->get_category_ids();
$product->get_tag_ids();
 
// Get Product Downloads
 
$product->get_downloads();
$product->get_download_expiry();
$product->get_downloadable();
$product->get_download_limit();
 
// Get Product Images
 
$product->get_image_id();
$product->get_image();
$product->get_gallery_image_ids();
 
// Get Product Reviews
 
$product->get_reviews_allowed();
$product->get_rating_counts();
$product->get_average_rating();
$product->get_review_count();






// Get Order ID
$order->get_id();
 
// Get Order Totals $0.00
$order->get_formatted_order_total();
$order->get_cart_tax();
$order->get_currency();
$order->get_discount_tax();
$order->get_discount_to_display();
$order->get_discount_total();
$order->get_fees();
$order->get_formatted_line_subtotal();
$order->get_shipping_tax();
$order->get_shipping_total();
$order->get_subtotal();
$order->get_subtotal_to_display();
$order->get_tax_location();
$order->get_tax_totals();
$order->get_taxes();
$order->get_total();
$order->get_total_discount();
$order->get_total_tax();
$order->get_total_refunded();
$order->get_total_tax_refunded();
$order->get_total_shipping_refunded();
$order->get_item_count_refunded();
$order->get_total_qty_refunded();
$order->get_qty_refunded_for_item();
$order->get_total_refunded_for_item();
$order->get_tax_refunded_for_item();
$order->get_total_tax_refunded_by_rate_id();
$order->get_remaining_refund_amount();
 
// Get Order Items
$order->get_items();
$order->get_items_key();
$order->get_items_tax_classes();
$order->get_item();
$order->get_item_count();
$order->get_item_subtotal();
$order->get_item_tax();
$order->get_item_total();
$order->get_downloadable_items();
 
// Get Order Lines
$order->get_line_subtotal();
$order->get_line_tax();
$order->get_line_total();
 
// Get Order Shipping
$order->get_shipping_method();
$order->get_shipping_methods();
$order->get_shipping_to_display();
 
// Get Order Dates
$order->get_date_created();
$order->get_date_modified();
$order->get_date_completed();
$order->get_date_paid();
 
// Get Order User, Billing & Shipping Addresses
$order->get_customer_id();
$order->get_user_id();
$order->get_user();
$order->get_customer_ip_address();
$order->get_customer_user_agent();
$order->get_created_via();
$order->get_customer_note();
$order->get_address_prop();
$order->get_billing_first_name();
$order->get_billing_last_name();
$order->get_billing_company();
$order->get_billing_address_1();
$order->get_billing_address_2();
$order->get_billing_city();
$order->get_billing_state();
$order->get_billing_postcode();
$order->get_billing_country();
$order->get_billing_email();
$order->get_billing_phone();
$order->get_shipping_first_name();
$order->get_shipping_last_name();
$order->get_shipping_company();
$order->get_shipping_address_1();
$order->get_shipping_address_2();
$order->get_shipping_city();
$order->get_shipping_state();
$order->get_shipping_postcode();
$order->get_shipping_country();
$order->get_address();
$order->get_shipping_address_map_url();
$order->get_formatted_billing_full_name();
$order->get_formatted_shipping_full_name();
$order->get_formatted_billing_address();
$order->get_formatted_shipping_address();
 
// Get Order Payment Details
$order->get_payment_method();
$order->get_payment_method_title();
$order->get_transaction_id();
 
// Get Order URLs
$order->get_checkout_payment_url();
$order->get_checkout_order_received_url();
$order->get_cancel_order_url();
$order->get_cancel_order_url_raw();
$order->get_cancel_endpoint();
$order->get_view_order_url();
$order->get_edit_order_url();
 
// Get Order Status
$order->get_status();
