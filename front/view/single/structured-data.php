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

    $jobLocationsSchema  = [];
    
    foreach ( $jobs_location as $loc ) {

        $place = [
            '@type' => 'Place',
            'address' => [
                '@type'           => 'PostalAddress',
                'addressLocality' => esc_html( $loc->name ),
                //'addressRegion'   = $loc['region']
            ]
        ];

        if ( isset( $loc->description ) && ! empty( $loc->description ) ) {
            $place['address']['streetAddress'] = esc_html( $loc->description );
        }
        
        // Check if country exists and is not empty
        $countryCode = get_term_meta( $loc->term_id, 'jobwp_location_country', true );

        if ( isset( $countryCode ) && ! empty( $countryCode ) ) {
            $place['address']['addressCountry'] = esc_html( $countryCode );
        }

        // Check if Region exists and is not empty
        $addressRegion = get_term_meta( $loc->term_id, 'jobwp_location_region', true );

        if ( isset( $addressRegion ) && ! empty( $addressRegion ) ) {
            $place['address']['addressRegion'] = esc_html( $addressRegion );
        }

        // Check if postal code exists and is not empty
        $postalCode = get_term_meta( $loc->term_id, 'jobwp_location_post_code', true );

        if ( isset( $postalCode ) && ! empty( $postalCode ) ) {
            $place['address']['postalCode'] = esc_html( $postalCode );
        }

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