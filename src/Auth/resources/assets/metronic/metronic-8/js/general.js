"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleValidation = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					
					'username': {
                        validators: {
                            regexp: {
                                regexp: /^[0-9]{10}$/,
                                message: 'کدملی نادرست می باشد',
                            },
							notEmpty: {
								message: 'کدملی را وارد نمایید'
							}
						}
					},
                    'mobile': {
                        validators: {
                            regexp: {
                                regexp: /^09\d{9}$/,
                                message: 'موبایل نادرست می باشد',
                            },
                            notEmpty: {
                                message: 'موبایل را وارد نمایید'
                            }
                        }
                    },
                    'captcha': {
                        validators: {
                            notEmpty: {
                                message: 'کد امنیتی را وارد نمایید'
                            }
                        }
                    } 
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
				}
			}
		);	
    }

    var handleSubmitAjax = function(e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');

                    // Enable button
                    submitButton.disabled = false;
                                        
                    // Check axios library docs: https://axios-http.com/docs/intro 
                    axios.post('/emergency-login', {
                        username: form.querySelector('[name="username"]').value, 
                        mobile: form.querySelector('[name="mobile"]').value,
                        captcha: form.querySelector('[name="captcha"]').value,
                    }).then(function (response) {
                        if (response.status == 200) {
                            form.querySelector('[name="username"]').value= "";
                            form.querySelector('[name="mobile"]').value= "";  
                            form.querySelector('[name="captcha"]').value= "";  

                            location.href = '/auth/verify';
                        }
                    }).catch(function (error) {
                        document.getElementById('refresh-captcha').click();
                        
                        var message = error.response.data;
                        if(error.response.status == 422) {
                            message = message.message;
                        }

                        Swal.fire({
                            text: message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "باشه، فهمیدم!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "ورودی ها را بررسی نمایید.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "باشه، فهمیدم!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
		});
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');
            
            handleValidation();
            handleSubmitAjax();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
