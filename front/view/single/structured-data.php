<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$structureData = [
    "@context"      => "https://schema.org/",
    "@type"         => "JobPosting",
    "title"         => get_the_title(),
    "description"   => get_the_content(),
    "datePosted"    => date("Y-m-d", strtotime( get_the_date() )),
];

if ( ! empty( $jobwp_deadline ) ) {
    $structureData['validThrough'] = date("c", strtotime( esc_html( $jobwp_deadline ) ));
}

$structureData['hiringOrganization'] = [ 
    "@type" => "Organization",
    "name" => get_bloginfo( 'name' ),
    "sameAs" => get_site_url()
];

// employmentType
if ( ! empty( $jobs_nature_arr ) ) {

    $jobTypesArr = [];
    
    foreach( $jobs_nature_arr as $jobType ) {

        $jobTypesArr[] = str_replace(' ', '_', strtoupper( esc_html( $jobType ) ));
    }

    $structureData['employmentType'] = $jobTypesArr;
}

// Location
if ( ! empty( $jobs_location ) ) {

    /*$structureData['jobLocation'] = [ 
        "@type" => "Place",
    ];*/

    $jobLocationsSchema  = [];
    
    foreach ( $jobs_location as $loc ) {

        $place = [
            '@type' => 'Place',
            'address' => [
                '@type'           => 'PostalAddress',
                //'streetAddress'   = $loc['street'],
                'addressLocality' => esc_html( $loc->name ),
                //'addressRegion'   = $loc['region'],
                //'addressCountry'  = $loc['country']
            ]
        ];

        // Check if postal code exists and is not empty
        $postalCode = get_term_meta( $loc->term_id, 'jobwp_location_post_code', true );

        if ( isset( $postalCode ) && ! empty( $postalCode ) ) {
            $place['address']['postalCode'] = esc_html( $postalCode );
        }
        //$jobLocsArr[]['address']['@type'] = "PostalAddress";
        //$jobLocsArr[]['address']['addressLocality'] = esc_html( $location->name );
        //$jobLocsArr[]['address']['postalCode'] = esc_html( get_term_meta( $location->term_id, 'jobwp_location_post_code', true ) );
        //$jobLocsArr[] = esc_html( $location->name );

        $jobLocationsSchema[] = $place;
    }

    $structureData['jobLocation'] = $jobLocationsSchema;
}

// Salary
if ( ! empty( $jobwp_base_salary_max ) ) {

    $structureData['baseSalary'] = [ 
        "@type" => "MonetaryAmount",
    ];

    if ( ! empty( $jobwp_base_salary_currency ) ) {

        $structureData['baseSalary']['currency'] = esc_html( $jobwp_base_salary_currency );
    }

    $structureData['baseSalary']['value'] = [
        "@type" => "QuantitativeValue",
    ];

    if ( ! empty( $jobwp_base_salary_min ) ) {

        $structureData['baseSalary']['value']['minValue'] = esc_html( $jobwp_base_salary_min );
        $structureData['baseSalary']['value']['maxValue'] = esc_html( $jobwp_base_salary_max );
    }

    if ( empty( $jobwp_base_salary_min ) ) {

        $structureData['baseSalary']['value']['value'] = esc_html( $jobwp_base_salary_max );
    }

    if ( ! empty( $jobwp_base_salary_time ) ) {
        $structureData['baseSalary']['value']['unitText'] = esc_html( $jobwp_base_salary_time );
    }
}
?>
<script type="application/ld+json">
<?php echo json_encode( $structureData, JSON_PRETTY_PRINT ); ?>
</script>