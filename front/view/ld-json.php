<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jobwp_deadline = get_post_meta( $post->ID, 'jobwp_deadline', true );
$validThrough   = date("c", strtotime( $jobwp_deadline ));
$publish_date   = date("Y-m-d", strtotime( get_the_date() ));
$jobs_location  = wp_get_post_terms( $post->ID, 'jobs_location', array('fields' => 'all') );

if ( ! empty( $jobs_location ) ) {
    $jobs_location_arr = array();
    foreach( $jobs_location as $location ) {
        $jobs_location_arr[] = $location->name . '';
    }
    $location = implode( ', ', $jobs_location_arr );   
}

$jobs_nature    = wp_get_post_terms( $post->ID, 'jobs_nature', array('fields' => 'all') );

if ( ! empty( $jobs_nature ) ) {
    $jobs_nature_arr = array();
    foreach( $jobs_nature as $type ) {
        $jobs_nature_arr[] = $type->name . '';
    }
    $employmentType = implode( ', ', $jobs_nature_arr );   
}
?>
<script type="application/ld+json">
{
    "@context" : "https://schema.org/",
    "@type" : "JobPosting",
    "title" : "<?php echo get_the_title(); ?>",
    "description" : "<?php echo get_the_content(); ?>",
    "datePosted" : "<?php esc_html_e( $publish_date ); ?>",
    "validThrough" : "<?php esc_html_e( $validThrough ); ?>",
    "employmentType" : "<?php esc_html_e( strtoupper( $employmentType ) ); ?>",
    "hiringOrganization" : {
    "@type" : "Organization",
    "name" : "<?php echo get_bloginfo( 'name' ); ?>",
    "sameAs" : "<?php echo get_site_url(); ?>"
    },
    "jobLocation": {
    "@type": "Place",
    "address": "<?php esc_html_e( $location ); ?>"
    }
}
</script>
