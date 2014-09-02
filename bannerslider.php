<?php if( is_front_page() ){?>
    <div id="main-slider" class="billboard relative-holder">
        <section class="search-properties overlay">
            <div class="container">
                <div class="tab-nav">
                    <ul class="tabs">
                        <li><a href="#tab1">Quick Search</a></li>
                        <li><a href="#tab2">Open Houses</a></li>
                    </ul>
                </div>
                <div class="tab_content cf" id="tab1"><?php echo do_shortcode('[idx_form form=quicksearch]'); ?></div>
                <div class="tab_content cf" id="tab2"><?php // echo do_shortcode('[optima_express_basic_search]'); ?></div>
            </div>
        </section>
         
        <ul class="slides">
      <?php
                    $args = array (
                        'post_type' => 'home-slider',
                        'posts_per_page' =>-1,
                        'orderby' => 'id',
                        'order' => 'ASC'
      );
     $counter=1;
     $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                    $content = get_the_content();       
      ?>
            <li><img src="<?php bloginfo('template_url');?>/timthumb/timthumb.php?src=<?php echo get_post_meta(get_the_ID(),'wpcf-banner-image',true); ?>&w=1400&h=644" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>

                <div class="container clearfix">
                    <div class="billboard-pannel overlay">
                    <?php if($counter==1){?>
                    <div class="circle">
                            <h2><?php echo $content; ?></h2>
                        </div>
                        <?php }else{?>
                        <h2><?php echo $content; ?></h2>
                        
                    </div>
                    <?php }$counter++?>
                </div>
            </li>
   <?php  endwhile;  wp_reset_query(); ?>
        </ul>
    </div>
    <?php }else{?>
  <div class="billboard">
        <?php $bannerimg=get_post_meta(get_the_ID(),'wpcf-banner-image',true);
  if($bannerimg==""){
   $bannerimg="/wp-content/uploads/featured_img1_02.jpg";
  }
  
  ?>
        <img src="<?php echo $bannerimg;?>" alt="" title="featured image">
    </div>
<?php }?>