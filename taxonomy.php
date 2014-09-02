<?php
	$args = array(
		'taxonomy' => 'category'
	);
	$cat = get_categories( $args );
	foreach( $cat as $c ) { 
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'category_name' => 'content',
			'tax_query' => array(
				'taxomomy' => 'category',
				'field' => 'slug',
				'terms' => $c->slug
			)
		);
		$posts = get_posts( $args );
	?>
    <div class="main-content">
	<?php foreach($posts as $post) { setup_postdata($post);?>
      <article class="post-wrap group">
        <figure><a href="<?php get_the_permalink(); ?>"><img src="<?php the_post_thumbnail('full'); ?>" </a></figure>
        <h3 class="post-title"><a href="#"><?php  the_title(); ?></a></h3>
        <p><?php the_content(); ?></p>
      </article>
     <?php }?>