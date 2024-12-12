<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="jobwp-admin-sidebar" style="width: 20%; float: left;">
    <div class="postbox pro-features">
        <h3 class="hndle"><span>Pro Features</span></h3>
        <div class="inside centered">
            <ul>
                <li>&#10003; Application List Export to CSV</li>
                <li>&#10003; Notification Email to the Job Applicants</li>
                <li>&#10003; External Application URL</li>
                <li>&#10003; More Style Options for Job Details Page</li>
                <li>&#10003; Application Form Styling</li>
                <li>&#10003; More Style Options for Job Listing Page</li>
                <li>&#10003; Third Party Application Form Supported</li>
                <li>&#10003; User Consent Checkbox to Handle Personal Data</li>
                <li>&#10003; Role Based Notification Email</li>
                <li>&#10003; Docx File Allowed for Job Application</li>
                <li>&#10003; Admin Company Profile Panel</li>
                <li>&#10003; Assign Job to a Company</li>
                <li>&#10003; Display Company Name in Job Listing</li>
                <li>&#10003; Display Company Logo in Job Listing</li>
                <li>&#10003; Shortcode Option to Display Jobs of a Company</li>
                <li>&#10003; Option to Allow Login Users to Apply</li>
                <li>&#10003; Display Job Search Panel at Home</li>
                <li>&#10003; Display Featured Jobs With Slider</li>
                <li>&#10003; Job posting google structured data for better SEO</li>
                <li>&#10003; Drag and Drop to Manage Job info Order in the Job Details Page</li>
                <li>&#10003; Customize email notification content for Candidate</li>
                <li>&#10003; Job Level Option in the Search Panel</li>
                <li>&#10003; Display Job by Job Level With The Shortcode Option</li>
                <li>&#10003; Display Mobile number in the application form</li>
                <li>&#10003; Application list export to excel</li>
            </ul>
            <?php
            if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <p style="margin-bottom: 1px! important;"><a href="https://wpjoblisting.com/" target="_blank" class="button button-primary jobwp-button" style="background: #F5653E;">Upgrade Now!</a></p>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="postbox">
        <h3 class="hndle"><span>Support / Bug / Customization</span></h3>
        <div class="inside centered">
            <p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
            <p style="margin-bottom: 1px! important;"><a href="https://wpjoblisting.com/" target="_blank" class="button button-primary jobwp-button">Get Support</a></p>
        </div>
    </div>
    <div class="postbox">
        <h3 class="hndle"><span>Join us on facebook</span></h3>
        <div class="inside centered">
        <p style="margin-bottom: 1px! important;"><a href='https://www.facebook.com/hmplugin' class="button button-info" target="_blank">Join HM Plugin<span class="dashicons dashicons-facebook" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a></p>
        </div>
    </div>

    <div class="postbox">
        <h3 class="hndle"><span>Follow us on twitter</span></h3>
        <div class="inside centered">
            <a href="https://twitter.com/hmplugin" target="_blank" class="button button-secondary">Follow @hmplugin<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
        </div>
    </div>
</div>