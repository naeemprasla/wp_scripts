<?php

/* Blogs */


/* Categories  Shortcode */

function get_catgories_by_slug(){
// Array of slugs
$slugs = array('birth-certificate', 'marriage-certificate', 'death-certificate', 'blog-announcements', 'case-studies');

// Get categories by slugs
$categories = get_categories(array(
    'slug' => $slugs,
    'hide_empty' => false,
));

// Create an array to store the category names
$category_names = array();

// Loop through the categories and get the names
$html = '';
$html .='<div class="categories_buttons">';
foreach ($categories as $category) {
    $html .= '<div class="" id="'.$category->term_id.'">'. $category->name .'</div>';
}
$html .='</div>';

echo $html;

}
add_shortcode('categories_buttons','get_catgories_by_slug');


//Search form Ajax
function blog_search_form(){


	$categories = get_categories(array(
		'slug' => $slugs,
		'hide_empty' => false,
	));	

	$options = '';
	foreach ($categories as $category) {
		$options .=  '<option value="'.$category->term_id.'">'. $category->name .'</option>';
	}

$html .='<div class="searchBox">
<div class="categories_form">
				<div class="categories_dropdown">
					<select id="categories"> '.$options.' </select>
				</div>
				<div class="categories_querybox">
					<input type="text"  placeholder="Search blog..." id="search-query" />
				</div>
		</div>
		<div id="searchAppendResults"><div></div></div>
</div>';
echo $html;

}

add_shortcode('blog_search', 'blog_search_form');



function categories_ajax_code() {
    // Check if the AJAX request is valid
    if (isset($_POST['action']) && $_POST['action'] == 'categories_ajax_code') {
        // Get the search query and category from POST data
        $searchText = sanitize_text_field($_POST['search_query']);
        $searchCat = intval($_POST['query_cat']);

        // Set up the arguments for WP_Query
        $args = array(
            's' => $searchText, // Search query
            'cat' => $searchCat, // Category ID
            'posts_per_page' => -1, // Return all matching posts
            'post_status' => 'publish' // Only get published posts
        );

        // Execute the query
        $query = new WP_Query($args);

        // Prepare the response
        $response = array();
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $response[] = array(
                    'title' => get_the_title(),
                    'link' => get_permalink(),
                    'excerpt' => get_the_excerpt()
                );
            }
        } else {
            $response['error'] = 'No posts found.';
        }

        // Reset the post data
        wp_reset_postdata();

        // Send the response in JSON format
        echo json_encode($response);
        wp_die(); // Required to terminate immediately and return a proper response
    }
}
add_action('wp_ajax_categories_ajax_code', 'categories_ajax_code');
add_action('wp_ajax_nopriv_categories_ajax_code', 'categories_ajax_code');


function categories_ajax_jscode(){
	?>
	<script>
(function($){

$('#search-query').keyup(function(){
	var queryText = $(this).val(); //Get Search text
	var queryCat =  $('#categories').val(); // Get Category from dropdown

	var input_length = $(this).val().length; // Get Query text lenghth
if(input_length >= 3 ){  // Id Text length is greater than 3
	$.ajax({ //Run Ajax Search
		type: "post",
		dataType: "json",
		url: '<?php echo admin_url('admin-ajax.php'); ?>',
		data : {action: "categories_ajax_code", search_query : queryText, query_cat: queryCat },
		success: function(response){
			console.log(response);
			$('#searchAppendResults > div').html('');
			var output = ''; 
			if(response.error){ 
				output = '<p>' + response.error + '</p>';
			}else{
			output += '<ul>';			
				$.each(response, function(index, post){
					output += '<li>';
					output += '<h3><a href="' + post.link + '">' + post.title + '</a></h3>';
					//output += '<p>' + post.excerpt + '</p>';
					output += '</li>';
				});
			output += '</ul>';
			}		
			$('#searchAppendResults > div').html(output);
		}
	});
	}else{
		$('#searchAppendResults > div').html('');
	}

});




})(jQuery);


	</script>
	<?php
}

add_action('wp_footer', 'categories_ajax_jscode');
















// Usage SC : [blog_categories cat_slug="your-slug-here"]
function vital_blogs_shortcodes($atts) {

    $variable = shortcode_atts(array(
        'cat_slug' => '',
    ), $atts);

    // Initialize the HTML variable
    $html = '';

    // Create a new query for posts
    $new_loop = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $variable['cat_slug'],
            )
        )
    ));

    // Start the loop
    while ($new_loop->have_posts()) : $new_loop->the_post();

        switch ($variable['cat_slug']) {
            case 'blog-announcements':
                $html .= '<p>Blog Announcements</p>';
                break;
            case 'birth-certificate':
                $html .= '<p>Birth Certificate</p>';
                break;
            case 'case-studies':
                $html .= '<p>Case Studies</p>';
                break;
            case 'death-certificate':
                $html .= '<p>Death Certificate</p>';
                break;
            case 'marriage-certificate':
                $html .= '<p>Marriage Certificate</p>';
                break;
            default:
                $html .= '<p>Please Assign Post Category slug EG: [blog_categories cat_slug="your-slug-here"]</p>';
        }

    endwhile;
    
    // Reset post data
    wp_reset_query();

    // Output the HTML
    echo $html;
}

add_shortcode('blog_categories', 'vital_blogs_shortcodes');
