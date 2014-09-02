<?php
/*
 
 WH TREKS- Default location Page Template

Template Name:location
 */
get_header();
?>


<section id="content" class="group">
  <div class="wrapper">
   <?php get_sidebar(); ?>

    <div class="content-sec">
      <div class="main-content">
      	<?php
      	$wp_post_types=array('post','client-taxonomy');
      	 $args=array(
      		'post_type' => $wp_post_types,
      		'posts_per_page'=> -1,
      		'tax_query' =>array(
      			'relation' =>'AND',
      			array(
      				'taxonomy' =>'location',
      				'field'=>'slug',
      				'terms'=>array('test 2'),
      				
      				)
      			)
      		);

      	$query =new WP_Query($args);
		//      	print_r($query);
      while($query ->have_posts()) : $query->the_post(); ?>	
    
		
        <h2 class="content-caption"> <?php the_title(); ?></h2> 
               <div class="package-list">
     
           		<?php 
           			
           		the_content();
           		?> 

          
           
        </div>
		<?php  endwhile ; ?>
      </div>
    </div>


  </div>
</section>