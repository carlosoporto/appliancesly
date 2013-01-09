<?php
/**
 * The WordPress template hierarchy first checks for any
 * MIME-types and then looks for the attachment.php file.
 *
 * @link codex.wordpress.org/Template_Hierarchy#Attachment_display 
 */ 

get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header> 
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h1></div>
							
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							
							<!-- To display current image in the photo gallery -->
							<div class="attachment-img">
							      <a href="<?php echo wp_get_attachment_url($post->ID); ?>">
							      							      
							      <?php 
							      	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
							       
								      if ($image) : ?>
								          <img src="<?php echo $image[0]; ?>" alt="" />
								      <?php endif; ?>
							      
							      </a>
							</div>
							
							<!-- AddThis Button BEGIN -->
							<div class="addthis_toolbox addthis_default_style ">
							<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
							<a class="addthis_button_tweet"></a> 
							<a class="addthis_button_linkedin_counter"></a>
							<a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:annotation="none"></a>
							<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
							<a class="addthis_counter addthis_pill_style"></a>
							</div>
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ecf3ba5af64e38"></script>
							<!-- AddThis Button END -->
							
							<!-- To display thumbnail of previous and next image in the photo gallery -->
							<ul id="gallery-nav" class="clearfix">
								<li class="next pull-left"><?php next_image_link() ?></li>
								<li class="previous pull-right"><?php previous_image_link() ?></li>
							</ul>
							
						</section> <!-- end article section -->
						
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="left:48px;top:180px;">
						<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
						<a class="addthis_button_tweet" tw:count="vertical"></a>
						<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
						<a class="addthis_counter"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ecf3ba5af64e38"></script>
						<!-- AddThis Button END -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
				
				</div> <!-- end #main -->

				<?php get_sidebar(); // sidebar 1 ?>

			</div> <!-- end #content -->

<?php get_footer(); ?>