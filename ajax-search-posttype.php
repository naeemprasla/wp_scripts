<?php 

function latest_blogs(){
	
       //Write Html form Here
	$html .='<div><input type="text" id="search" /></div>';

      $html .=' <div class="load_posts"></div>';
	return $html;
}

add_shortcode('latest_blogs','latest_blogs'); //Preview Data With Ajax



//Blogs Filter Ajax Code php
add_action("wp_ajax_latest_blogs_ajax_php_code", "latest_blogs_ajax_php_code");
add_action("wp_ajax_nopriv_latest_blogs_ajax_php_code", "latest_blogs_ajax_php_code");
function latest_blogs_ajax_php_code(){


if(isset($_POST['search_query'])) {
		
       $keyword = $_POST['search_query'];
   
       $args = array(
           'post_type' => 'ndpc_people',  //posttype here
                    'meta_query' => array(
                           'relation' => 'OR',
                           array(
                                  'key'   => 'post_title',
                                  'value' => $keyword,
                                  'compare' => 'LIKE'
                           )
                    ),
           's' => $keyword 
       );
       $query = get_posts( $args );
  
       foreach($query as $post){
           
       //Post Content Here
           $html.= '<h2>'.$post->post_name.'</h2>';
 
       }
       echo $html;
   }
     
   die();

	

}



//Blogs Filter JS


function latest_blogs_ajax_js_code(){
?>
<script>
	(function($){
	
		
		$('#search').on('keyup', function(i,v){
                     var search_term = $(this).val();

                     var input_length = $(this).val().length;

                     if(input_length >= 3 ){ 
                            $('.blog_posts').html('');
				 $.ajax({
					 type : "post",
					 url : '<?php echo admin_url('admin-ajax.php'); ?>',
					 data : {action: "latest_blogs_ajax_php_code", search_query : search_term},
					 beforeSend: function() {
						$('.load_posts').html('<p>Loading...</p>');
					},
					 success: function(response) {
						$('.load_posts').html(response);
					 }
				 });

                     }
                    
			
		});
	})(jQuery);
	
</script>

<?php
}
add_action('wp_footer','latest_blogs_ajax_js_code');

