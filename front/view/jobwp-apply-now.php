<?php if ( ! defined('ABSPATH') ) exit; ?>
<form id="upload_form" action="<?php esc_attr_e( get_permalink() ); ?>" enctype="multipart/form-data" method="POST">
    <?php if( function_exists('wp_nonce_field') ) { wp_nonce_field('binate_job_submit_nonce_field'); } ?>
    <div class="dialog-content">
        <div class="field-row">
            <div class="col-md-6 responsive-margin-20">
                <input type="text" class="custom-field width-block ng-pristine ng-untouched ng-valid ng-empty" placeholder="Full Name" id="fullName" name="fullName">
                <!-- ngIf: fullNameError -->
            </div>
            <div class="col-md-6">
                <input type="text" class="custom-field width-block ng-pristine ng-untouched ng-valid ng-empty" value="<?php esc_attr_e( the_title() ); ?>" id="applyFor" name="applyFor" readonly>   
                <!-- ngIf: positionError -->
            </div>
            <div class="clear"></div>
        </div>
        <div class="field-row">
            <div class="col-md-6 responsive-margin-20">
                <input type="email" class="custom-field width-block ng-pristine ng-untouched ng-valid ng-empty ng-valid-email" placeholder="Email" id="email" name="email">
                <!-- ngIf: emailError -->
            </div>
            <div class="col-md-6">
                <input type="number" class="custom-field width-block ng-pristine ng-untouched ng-valid ng-empty" placeholder="Phone Number" id="phoneNumber" name="phoneNumber">
                <!-- ngIf: phoneNumberError -->
            </div>
            <div class="clear"></div>
        </div>
        <div class="field-row">
            <div class="col-md-12">
                <textarea class="custom-textarea ng-pristine ng-untouched ng-valid ng-empty" placeholder="Message" data-ng-model="message" name="message"></textarea>
                <!-- ngIf: messageError -->
            </div>
            <div class="clear"></div>
        </div>
        <div class="field-row">
            <div class="col-md-12">
                <p><?php _e('Attach your resume, only Pdf file is permitted.', 'binate-solutions'); ?></p>
                <div class="attached-files">
                    <!-- ngRepeat: item in files -->
                </div>
                <input type="file" name="upload" id="upload" class="custom-field custom-file-field ng-pristine ng-untouched ng-valid ng-empty" />
                <!-- ngIf: fileUploadError -->
            </div>
            <div class="clear"></div>
        </div>
        <div class="field-row">
            <div class="col-md-12 ">
                <!-- ngIf: isSubmitButtonDisabled -->
                <input type="submit" name="submitBtn" id="submitBtn" class="primary-button pull-right" value="Submit">
            </div>
            <div class="clear"></div>
        </div>

        <div class="clear"></div>
    </div>
</form>