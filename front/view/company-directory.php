<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'company/header.php';

$jobwp_companies  = get_terms( array( 
    'taxonomy' => 'job_company', 
    'hide_empty' => true, 
    'orderby' => 'name', 
    'order' => 'ASC' 
) );

if ( ! empty( $jobwp_companies ) ) {
    ?>
    <div class="jobwp-company-grid">

        <?php
        foreach ( $jobwp_companies as $company ) {
            
            $jobwp_company_logo_id = get_term_meta( $company->term_id, 'jobwp_company_logo_id', true );
            ?>
            <article class="jobwp-company-card">
                
                <div class="jobwp-company-badge">
                    <span><?php echo esc_html( $company->count ); ?></span> <?php esc_html_e('Open Jobs', 'jobwp'); ?>
                </div>

                <div class="jobwp-company-logo">
                    <img src="<?php echo esc_url( $jobwp_company_logo_id ); ?>" alt="<?php echo esc_attr( $company->name ); ?>">
                </div>

                <h3 class="jobwp-company-name">
                    <a href="<?php echo esc_url( home_url( $job_url . '/?company=' . $company->slug ) ); ?>" class="jobwp-company-job-link"><?php echo esc_html( $company->name ); ?></a>
                </h3>

                <?php
                // 2. Query posts (e.g., 'job') associated with this specific company term
                $jobs_query = new WP_Query( array(
                    'post_type'      => 'jobs', // <-- Replace with your actual Custom Post Type slug
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'posts_per_page' => 3,    // -1 fetches all posts for this company
                    'meta_query'     => array(
                        array(
                            'key'     => 'jobwp_status',
                            'value'   => 'active',
                            'compare' => '=',
                        ),
                        array(
                            'key'     => 'jobwp_deadline',
                            'value'   => gmdate('Y-m-d'),
                            'compare' => '>=',
                            'type'    => 'DATE'
                        ),
                    ),
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'job_company',
                            'field'    => 'term_id',
                            'terms'    => $company->term_id,
                        ),
                    ),
                ));

                // 3. Display the list of job titles
                if ( $jobs_query->have_posts() ) {
                    ?>
                    <ul class="jobwp-company-jobs">
                        <?php while ( $jobs_query->have_posts() ) : $jobs_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><i class="fa-solid fa-briefcase"></i>
                                    <?php 
                                    $title = get_the_title(); 
                                    if ( mb_strlen( $title ) > 45 ) {
                                        echo esc_html( wp_html_excerpt( $title, 45 ) ) . '&hellip;';
                                    } else {
                                        echo esc_html( $title );
                                    }
                                    ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php 
                } else {
                    ?>
                    <p class="no-jobs"><i class="fa-solid fa-briefcase"></i>&nbsp;<?php esc_html_e('No active jobs', 'jobwp'); ?></p>
                    <?php 
                } 
                
                // 4. Reset post data so the next loop iteration works perfectly
                wp_reset_postdata(); 
                ?>

                <a href="<?php echo esc_url( home_url( $job_url . '/?company=' . $company->slug ) ); ?>" class="jobwp-company-button">
                    <?php esc_html_e('View All Jobs', 'jobwp'); ?> →
                </a>

            </article>
            <?php
        }
        ?>
    </div>
    <?php 
}
?>