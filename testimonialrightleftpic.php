 <div class="content-sec">
      <div class="main-content">
        <h2 class="content-caption">Testimonials</h2>
       <?php $args=array(
       	'post_type'=>'testi',
       	'posts_per_page' => -1);
       	$attach=get_posts($args);

       	$count=0;
       	?> 
  <div class="testimonial-sec">
  	<?php foreach ($attach as $att) {
  	$img=wp_get_attachment_image_src(get_post_thumbnail_id( $att->ID),"full" ); ?>
    <ul class="posts">
	<?php
		if($count%2==0) { ?>
			
      <li>
        <div class="testimonial-wrap">
          <div class="client-img-wrap">
            <div class="img-holder"><img src="<?php echo $img[0]; ?>" alt="" /></div>
            <h4><?php  echo $att->post_title; ?></h4>
          </div>
          <div class="client-post">
          <div class="post-bg">
            <blockquote><img src="images/testimonial-quot-ico.png" alt="" /><?php echo  $att->post_content;?> </blockquote>
            <img src="images/testimonials-arrow-right.png" alt="" /> </div>
            </div>
        </div>
      </li>
		<?php  }  elseif ($count%2==1) {
			# code...
		 ?>
      <li class="odd-post">
        <div class="testimonial-wrap">
          <div class="client-img-wrap">
            <div class="img-holder"><img src="<?php echo $img[0]; ?>" alt="#" /></div>
            <h4><?php echo $att->post_title; ?></h4>
          </div>
          <div class="client-post">
          <div class="post-bg">
            <blockquote><img src="images/testimonial-quot-ico.png" alt="" /><?php echo  $att->post_content; ?> </blockquote>
            <img src="images/testimonials-pointer-1.png" alt="" /> </div>
            </div>
        </div>
      </li>
      
    <?php } $count++; ?>
    </ul>
    <?php } ?>
  </div>
      </div>
    </div>