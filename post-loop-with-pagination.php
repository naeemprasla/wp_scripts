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
     <?php
     $big = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $loop->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) );
?>
</div>
<?php wp_reset_postdata(); ?>
