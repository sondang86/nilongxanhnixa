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
                                    
						 get_template_part( 'content', 'single' );
                                                     
						 zerif_post_nav(); 
                                                     
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
    <script type="text/javascript">
        jQuery("#submit").click(function(e){
            var data_2;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/wp-content/themes/zerif-child/google_captcha.php",
                data: jQuery('#commentform').serialize(),
                async:false,
                success: function(data) {
                    if(data.nocaptcha==="true"){
                        data_2=1;
                    }else if(data.spam==="true")
                    {
                        data_2=1;
                    }
                    else
                    {
                        data_2=0;
                    }
                }
            });
            if(data_2!=0){
                e.preventDefault();
                if(data_2==1){
                    alert("Please check the captcha");
                }else{
                    alert("Please Don't spam");
                }
            }else
            {
                jQuery("#commentform").submit
            }
        });
    </script>
<?php get_footer(); ?>