<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
     'post_type' => 'post_type',
     'posts_per_page' => 10,
     'paged' => $paged
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
     // CPT content
endwhile;
?>
<div class="pagination">
     <div class="pagination">
         <?php 
         pagination_bar_se($loop); 
         ?>
     </div>
     <?php
     function pagination_bar_se( $loopquery ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '%1$s', __( 'Prev', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s', __( 'Next', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ));
    }
}
?>
</div>
<?php wp_reset_postdata(); ?>
