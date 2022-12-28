define([
    'jquery',
    'intlTelInput'
], function ($, intlTelInput) {
    'use strict';

    return function () {

        const errorMap = ['Invalid telephone number', 'Invalid country code', 'Telephone number is too short', 'Telephone number is too long', 'Invalid telephone number'];

        let validatorObj = {
            /**
             * @param {String} value
             */
            validate: function (value) {
                let countryCodeClass = $('.iti__selected-flag .iti__flag').attr('class');
                countryCodeClass = countryCodeClass.split(' ')[1];

                if (countryCodeClass === undefined) {
                    $.validator.messages['validate-phone-number'] = errorMap[1];

                    return false;
                }

                let countryCode = countryCodeClass.split('__')[1];
                let isValid = intlTelInputUtils.isValidNumber(value, countryCode);

                if (!isValid) {
                    $.validator.messages['validate-phone-number'] = errorMap[
                        intlTelInputUtils.getValidationError(value, countryCode)
                        ];
                }

                return isValid;
            }
        }

        $.validator.addMethod(
            'validate-phone-number',
            validatorObj.validate,
            $.validator.messages['validate-phone-number']
        );
    };
});
