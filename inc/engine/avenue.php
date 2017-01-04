<?php
/* 
 * Ares Child Theme setup
 */



function ares_child_close() { ?>
    <i class="scroll-top fa fa-chevron-up"></i>
   
    <?php if( of_get_option('ares_footer_cta', 'on' ) == 'on'  ) : ?>
    
        <div id="footer-callout">
            <div class="row">
                <div class="col-sm-8 center">
                    <h3 class="smartcat-animate fadeInUp"><?php echo of_get_option('ares_footer_cta_text', 'GET A NO RISK, FREE CONSULTATION TODAY'); ?></h3>
                </div>
                <div class="col-sm-4 center">
                    <a class="button button-cta smartcat-animate fadeInUp" href="<?php echo of_get_option('ares_footer_button_url', '#'); ?>">
                        <?php echo of_get_option('ares_footer_button_text', 'CONTACT OUR OFFICE'); ?>
                    </a>
                </div>
            </div>
        </div>
    
    <?php endif; ?>
    
    <footer id="colophon" class="site-footer " role="contentinfo">
        <div class="footer-boxes">
            <div class="row ">
                <div class="col-md-12">
                    <?php get_sidebar('footer'); ?>
                </div>            
            </div>        
        </div>
        <div class="site-info">
            <div class="row ">
                <div class="col-xs-6 text-left">
                    <?php echo of_get_option('ares_footer_text', '&#169; 2015 Your company name');?>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="http://merakii.co" rel="designer">
                        <?php _e('merakii', 'ares'); ?>
                    </a>                     
                    
                </div>              
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    </div><!-- #page -->    
    <?php 

}