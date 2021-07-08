<?php
if ( ! defined('ABSPATH') ) exit;

global $post;
?>
<div class="body-container">

    <section id="pageTitle">
        <article class="transperent-bg">
            <div class="container page-title-inner">
                <div class="col-md-12 center-align">
                    <h3 class="heading-03 margin-bottom-40"><?php _e('Choose your Position from below', JOBWP_TXT_DOMAIN); ?></h3>
                </div>
            </div>
        </article>
    </section>

    <section id="hierUs" class="padding-50-0">
        <article>
            <div class="container">
                <div class="col-md-12">

                    <?php
                    // Main Query Arguments
                    $jobwpQueryArrParams = array(
                        'post_type'   => 'jobs',
                        'post_status' => 'publish',
                        'orderby'     => 'menu_order',
                        'order'       => 'ASC',
                        'meta_query'  => array(
                            array(
                                'key'     => 'jobwp_status',
                                'value'   => 'active',
                                'compare' => '='
                            ),
                        ),
                    );
                    
                    $jobwpQueryArr = apply_filters( 'jobwp_front_main_query_array', $jobwpQueryArrParams );

                    $jobwpJobs = new WP_Query( $jobwpQueryArr );

                    if ( $jobwpJobs->have_posts() ) {

                        while ( $jobwpJobs->have_posts() ) {

                            $jobwpJobs->the_post();

                            $jobwp_experience       = get_post_meta( $post->ID, 'jobwp_experience', true );
                            $jobwp_deadline         = get_post_meta( $post->ID, 'jobwp_deadline', true );
                            $jobwpCurrDate          = date('Y-m-d');
                            $jobwpDateDiff          = date_diff( date_create( $jobwpCurrDate ), date_create( $jobwp_deadline ) );
                            $jobwpDateDiffNumber    = $jobwpDateDiff->format("%R%a");

                            if ( $jobwpDateDiffNumber > -1 ) {
                                $jobwpDeadline = date( 'd M, Y', strtotime( $jobwp_deadline ) );
                            } else {
                                $jobwpDeadline = __( 'Closed', JOBWP_TXT_DOMAIN );
                            }
                            ?>
                            <div class="job-item margin-bottom-30">
                                <h1 class="heading-06 primary-color"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <p class="margin-bottom-0">
                                    <?php echo wp_trim_words( get_the_content(), 45, '...' ); ?>
                                </p>
                                <div class="job-item-bottom">
                                    <p class="pull-left margin-bottom-0"><strong class="primary-color"><?php _e('Experience', JOBWP_TXT_DOMAIN); ?> :</strong> <span class="ng-binding"><?php esc_html_e( $jobwp_experience ); ?></span></p>
                                    <p class="pull-right margin-bottom-0"><strong class="primary-color"><?php _e('Deadline', JOBWP_TXT_DOMAIN); ?> :</strong> <span class="ng-binding"><?php esc_html_e( $jobwpDeadline ); ?></span></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                    
                </div>
            </div>
        </article>
    </section>

</div>