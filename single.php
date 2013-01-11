<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							
							<p class="meta"><?php _e("Posted on", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author(); ?> <span class="amp"></span> <?php _e("in", "bonestheme"); ?> <?php the_category(', '); ?></p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
						
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
					
					</article> <!-- end article -->
						
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="left:48px;top:180px;">
						<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
						<a class="addthis_button_tweet" tw:count="vertical"></a>
						<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
						<a class="addthis_button_pinterest_pinit" pi:pinit:layout="vertical"></a>
						<a class="addthis_counter"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ecf3ba5af64e38"></script>
						<!-- AddThis Button END -->
					
					<?php comments_template('',true); ?>
					
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