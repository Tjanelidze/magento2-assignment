/**
 * This file is part of the Klarna KP module
 *
 * (c) Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
define(
  [
    'ko'
  ],
  function (ko) {
    'use strict';
    var client_token = window.checkoutConfig.payment.klarna_kp.client_token,
      message = window.checkoutConfig.payment.klarna_kp.message,
      authorization_token = ko.observable(window.checkoutConfig.payment.klarna_kp.authorization_token),
      debug = window.checkoutConfig.payment.klarna_kp.debug,
      enabled = window.checkoutConfig.payment.klarna_kp.enabled,
      b2b_enabled = window.checkoutConfig.payment.klarna_kp.b2b_enabled,
      data_sharing_onload = window.checkoutConfig.payment.klarna_kp.data_sharing_onload,
      success = window.checkoutConfig.payment.klarna_kp.success,
      hasErrors = ko.observable(false),
      available_methods = window.checkoutConfig.payment.klarna_kp.available_methods,
      redirect_url = window.checkoutConfig.payment.klarna_kp.redirect_url;

    return {
      hasErrors: hasErrors,
      debug: debug,
      enabled: enabled,
      b2b_enabled: b2b_enabled,
      data_sharing_onload: data_sharing_onload,
      client_token: client_token,
      message: message,
      success: success,
      authorization_token: authorization_token,
      available_methods: available_methods,
      redirect_url: redirect_url,
      getTitle: function (code) {
        if (window.checkoutConfig.payment.klarna_kp[code]) {
          return window.checkoutConfig.payment.klarna_kp[code].title;
        }
        return 'Klarna Payments';
      },
      getLogo: function (code) {
        if (window.checkoutConfig.payment.klarna_kp[code]) {
          return window.checkoutConfig.payment.klarna_kp[code].logo;
        }
        return '';
      }
    };
  }
);
