<?php
/**
 * The Template for displaying all single posts.
 */
get_header(); ?>

<div class="clear"></div>
    
</header> <!-- / END HOME SECTION  -->
    
<div id="content" class="site-content">
    
    <div class="container">
        <div class="content-left-wrap col-md-9">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); 
                                    
						 get_template_part( 'content', 'single' );?>
                                                     
                                            <!--Facebook like & share options-->  
                                                <div class="fb-like" data-href="http://nilonxanh.com/<?php echo $post->post_name;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>    
                                            <!--##Facebook like & share options-->  

						 <?php zerif_post_nav(); 
                                                     
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template('');
						endif;
					endwhile; // end of the loop. ?>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
        <div class="sidebar-wrap col-md-3 content-left-wrap">
			<?php get_sidebar(); ?>
        </div><!-- .sidebar-wrap -->
    </div><!-- .container -->
    
    <!--verify reCAPTCHA-->
    <script type="text/javascript">
        jQuery("#submit").click(function(e){
        var v = grecaptcha.getResponse();
        if(v.length == 0)
        {
            jQuery('.comment-form').append('<div class="captcha-message">Vui lòng nhập CAPTCHA</div>');
            e.preventDefault();
            if (jQuery('.captcha-message').length > 1) {
                jQuery('.captcha-message').not(':last').remove();
             };
        }
        else
        {
            return true;
        }
        });
    </script>
    <!--##verify reCAPTCHA-->

<?php get_footer(); ?>