define([
    'uiComponent',
    'ko',
    'Amazon_Payment/js/model/storage'
], function (Component, ko, amazonStorage) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Amazon_Payment/shipping-address/inline-form',
            formSelector: 'co-shipping-form',
            accountFormSelector: 'customer-email-fieldset'
        },

        /**
         * Init inline form
         */
        initObservable: function () {
            this._super();
            amazonStorage.isAmazonAccountLoggedIn.subscribe(this.hideInlineForm, this);
            return this;
        },

        /**
         * Show/hide inline form depending on Amazon login status
         */
        manipulateInlineForm: function () {
            this.hideInlineForm(amazonStorage.isAmazonAccountLoggedIn());
        },

        /**
         * Show/hide inline form
         */
        hideInlineForm: function(hide) {
            var shippingForm = document.getElementById(this.formSelector);
            var accountForm = document.getElementById(this.accountFormSelector);

            if (shippingForm) {
                shippingForm.style.display = hide ? 'none' : 'block';
            }
            if (accountForm) {
                accountForm.parentElement.style.display = hide ? 'none' : 'block';
            }
        }
    });
});
