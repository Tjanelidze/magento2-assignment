(function(require){
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    config: {
        mixins: {
            'Magento_ReleaseNotification/js/modal/component': {
                'Magento_AdminAnalytics/js/release-notification/modal/component-mixin': true
            }
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    'shim': {
        'extjs/ext-tree': [
            'prototype'
        ],
        'extjs/ext-tree-checkbox': [
            'extjs/ext-tree',
            'extjs/defaults'
        ],
        'jquery/editableMultiselect/js/jquery.editable': [
            'jquery'
        ]
    },
    'bundles': {
        'js/theme': [
            'globalNavigation',
            'globalSearch',
            'modalPopup',
            'useDefault',
            'loadingPopup',
            'collapsable'
        ]
    },
    'map': {
        '*': {
            'translateInline':                    'mage/translate-inline',
            'form':                               'mage/backend/form',
            'button':                             'mage/backend/button',
            'accordion':                          'mage/accordion',
            'actionLink':                         'mage/backend/action-link',
            'validation':                         'mage/backend/validation',
            'notification':                       'mage/backend/notification',
            'loader':                             'mage/loader_old',
            'loaderAjax':                         'mage/loader_old',
            'floatingHeader':                     'mage/backend/floating-header',
            'suggest':                            'mage/backend/suggest',
            'mediabrowser':                       'jquery/jstree/jquery.jstree',
            'tabs':                               'mage/backend/tabs',
            'treeSuggest':                        'mage/backend/tree-suggest',
            'calendar':                           'mage/calendar',
            'dropdown':                           'mage/dropdown_old',
            'collapsible':                        'mage/collapsible',
            'menu':                               'mage/backend/menu',
            'jstree':                             'jquery/jstree/jquery.jstree',
            'details':                            'jquery/jquery.details',
            'jquery-ui-modules/widget':           'jquery/ui',
            'jquery-ui-modules/core':             'jquery/ui',
            'jquery-ui-modules/accordion':        'jquery/ui',
            'jquery-ui-modules/autocomplete':     'jquery/ui',
            'jquery-ui-modules/button':           'jquery/ui',
            'jquery-ui-modules/datepicker':       'jquery/ui',
            'jquery-ui-modules/dialog':           'jquery/ui',
            'jquery-ui-modules/draggable':        'jquery/ui',
            'jquery-ui-modules/droppable':        'jquery/ui',
            'jquery-ui-modules/effect-blind':     'jquery/ui',
            'jquery-ui-modules/effect-bounce':    'jquery/ui',
            'jquery-ui-modules/effect-clip':      'jquery/ui',
            'jquery-ui-modules/effect-drop':      'jquery/ui',
            'jquery-ui-modules/effect-explode':   'jquery/ui',
            'jquery-ui-modules/effect-fade':      'jquery/ui',
            'jquery-ui-modules/effect-fold':      'jquery/ui',
            'jquery-ui-modules/effect-highlight': 'jquery/ui',
            'jquery-ui-modules/effect-scale':     'jquery/ui',
            'jquery-ui-modules/effect-pulsate':   'jquery/ui',
            'jquery-ui-modules/effect-shake':     'jquery/ui',
            'jquery-ui-modules/effect-slide':     'jquery/ui',
            'jquery-ui-modules/effect-transfer':  'jquery/ui',
            'jquery-ui-modules/effect':           'jquery/ui',
            'jquery-ui-modules/menu':             'jquery/ui',
            'jquery-ui-modules/mouse':            'jquery/ui',
            'jquery-ui-modules/position':         'jquery/ui',
            'jquery-ui-modules/progressbar':      'jquery/ui',
            'jquery-ui-modules/resizable':        'jquery/ui',
            'jquery-ui-modules/selectable':       'jquery/ui',
            'jquery-ui-modules/slider':           'jquery/ui',
            'jquery-ui-modules/sortable':         'jquery/ui',
            'jquery-ui-modules/spinner':          'jquery/ui',
            'jquery-ui-modules/tabs':             'jquery/ui',
            'jquery-ui-modules/tooltip':          'jquery/ui'
        }
    },
    'deps': [
        'js/theme',
        'mage/backend/bootstrap',
        'mage/adminhtml/globals'
    ],
    'paths': {
        'jquery/ui': 'jquery/jquery-ui-1.9.2'
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    waitSeconds: 0,
    map: {
        '*': {
            'ko': 'knockoutjs/knockout',
            'knockout': 'knockoutjs/knockout',
            'mageUtils': 'mage/utils/main',
            'rjsResolver': 'mage/requirejs/resolver'
        }
    },
    shim: {
        'jquery/jquery-migrate': ['jquery'],
        'jquery/jstree/jquery.hotkeys': ['jquery'],
        'jquery/hover-intent': ['jquery'],
        'mage/adminhtml/backup': ['prototype'],
        'mage/captcha': ['prototype'],
        'mage/new-gallery': ['jquery'],
        'mage/webapi': ['jquery'],
        'jquery/ui': ['jquery'],
        'MutationObserver': ['es6-collections'],
        'matchMedia': {
            'exports': 'mediaCheck'
        },
        'magnifier/magnifier': ['jquery']
    },
    paths: {
        'jquery/validate': 'jquery/jquery.validate',
        'jquery/hover-intent': 'jquery/jquery.hoverIntent',
        'jquery/file-uploader': 'jquery/fileUploader/jquery.fileuploader',
        'prototype': 'legacy-build.min',
        'jquery/jquery-storageapi': 'jquery/jquery.storageapi.min',
        'text': 'mage/requirejs/text',
        'domReady': 'requirejs/domReady',
        'spectrum': 'jquery/spectrum/spectrum',
        'tinycolor': 'jquery/spectrum/tinycolor',
        'jquery-ui-modules': 'jquery/ui-modules'
    },
    deps: [
        'jquery/jquery-migrate'
    ],
    config: {
        mixins: {
            'jquery/jstree/jquery.jstree': {
                'mage/backend/jstree-mixin': true
            },
            'jquery': {
                'jquery/patches/jquery': true
            }
        },
        text: {
            'headers': {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }
    }
};

require(['jquery'], function ($) {
    'use strict';

    $.noConflict();
});

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            'mediaUploader':  'Magento_Backend/js/media-uploader'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            eavInputTypes: 'Magento_Eav/js/input-types'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    paths: {
        'customer/template': 'Magento_Customer/templates'
    },
    map: {
        '*': {
            addressTabs:            'Magento_Customer/edit/tab/js/addresses',
            dataItemDeleteButton:   'Magento_Customer/edit/tab/js/addresses',
            observableInputs:       'Magento_Customer/edit/tab/js/addresses'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            systemMessageDialog: 'Magento_AdminNotification/system/notification',
            toolbarEntry:   'Magento_AdminNotification/toolbar_entry'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            folderTree: 'Magento_Cms/js/folder-tree'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            priceBox:             'Magento_Catalog/js/price-box',
            priceOptionDate:      'Magento_Catalog/js/price-option-date',
            priceOptionFile:      'Magento_Catalog/js/price-option-file',
            priceOptions:         'Magento_Catalog/js/price-options',
            priceUtils:           'Magento_Catalog/js/price-utils'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            categoryForm:         'Magento_Catalog/catalog/category/form',
            newCategoryDialog:    'Magento_Catalog/js/new-category-dialog',
            categoryTree:         'Magento_Catalog/js/category-tree',
            productGallery:       'Magento_Catalog/js/product-gallery',
            baseImage:            'Magento_Catalog/catalog/base-image-uploader',
            productAttributes:    'Magento_Catalog/catalog/product-attributes',
            categoryCheckboxTree: 'Magento_Catalog/js/category-checkbox-tree'
        }
    },
    deps: [
        'Magento_Catalog/catalog/product'
    ],
    config: {
        mixins: {
            'Magento_Catalog/js/components/use-parent-settings/select': {
                'Magento_Catalog/js/components/use-parent-settings/toggle-disabled-mixin': true
            },
            'Magento_Catalog/js/components/use-parent-settings/textarea': {
                'Magento_Catalog/js/components/use-parent-settings/toggle-disabled-mixin': true
            },
            'Magento_Catalog/js/components/use-parent-settings/single-checkbox': {
                'Magento_Catalog/js/components/use-parent-settings/toggle-disabled-mixin': true
            }
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            popupWindow:            'mage/popup-window',
            confirmRedirect:        'Magento_Security/js/confirm-redirect'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            escaper: 'Magento_Security/js/escaper'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            orderEditDialog: 'Magento_Sales/order/edit/message'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            rolesTree: 'Magento_User/js/roles-tree',
            deleteUserAccount: 'Magento_User/js/delete-user-account'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    paths: {
        'jquery/jquery-storageapi': 'Magento_Cookie/js/jquery.storageapi.extended'
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            groupedProduct: 'Magento_GroupedProduct/js/grouped-product'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            integration: 'Magento_Integration/js/integration'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            fptAttribute: 'Magento_Weee/js/fpt-attribute'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            testConnection: 'Magento_AdvancedSearch/js/testconnection'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    deps: [],
    shim: {
        'chartjs/Chart.min': ['moment'],
        'tiny_mce_4/tinymce.min': {
            exports: 'tinyMCE'
        }
    },
    paths: {
        'ui/template': 'Magento_Ui/templates'
    },
    map: {
        '*': {
            uiElement:      'Magento_Ui/js/lib/core/element/element',
            uiCollection:   'Magento_Ui/js/lib/core/collection',
            uiComponent:    'Magento_Ui/js/lib/core/collection',
            uiClass:        'Magento_Ui/js/lib/core/class',
            uiEvents:       'Magento_Ui/js/lib/core/events',
            uiRegistry:     'Magento_Ui/js/lib/registry/registry',
            consoleLogger:  'Magento_Ui/js/lib/logger/console-logger',
            uiLayout:       'Magento_Ui/js/core/renderer/layout',
            buttonAdapter:  'Magento_Ui/js/form/button-adapter',
            chartJs:        'chartjs/Chart.min',
            tinymce4:       'tiny_mce_4/tinymce.min',
            wysiwygAdapter: 'mage/adminhtml/wysiwyg/tiny_mce/tinymce4Adapter'
        }
    }
};

/**
 * Adds polyfills only for browser contexts which prevents bundlers from including them.
 */
if (typeof window !== 'undefined' && window.document) {
    /**
     * Polyfill Map and WeakMap for older browsers that do not support them.
     */
    if (typeof Map === 'undefined' || typeof WeakMap === 'undefined') {
        config.deps.push('es6-collections');
    }

    /**
     * Polyfill MutationObserver only for the browsers that do not support it.
     */
    if (typeof MutationObserver === 'undefined') {
        config.deps.push('MutationObserver');
    }

    /**
     * Polyfill FormData object for old browsers that don't have full support for it.
     */
    if (typeof FormData === 'undefined' || typeof FormData.prototype.get === 'undefined') {
        config.deps.push('FormData');
    }
}

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    config: {
        mixins: {
            'Magento_ConfigurableProduct/js/components/dynamic-rows-configurable': {
                'Magento_InventoryConfigurableProductAdminUi/js/dynamic-rows-configurable-mixin': true
            }
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            transparent: 'Magento_Payment/js/transparent',
            'Magento_Payment/transparent': 'Magento_Payment/js/transparent'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            newVideoDialog:  'Magento_ProductVideo/js/new-video-dialog',
            openVideoModal:  'Magento_ProductVideo/js/video-modal'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    config: {
        map: {
            '*': {
                triggerShippingMethodUpdate: 'Magento_InventoryInStorePickupSalesAdminUi/order/create/trigger-shipping-method-update' //eslint-disable-line max-len
            }
        },
        mixins: {
            'Magento_Sales/order/create/scripts': {
                'Magento_InventoryInStorePickupSalesAdminUi/order/create/scripts-mixin': true
            }
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            swatchesProductAttributes: 'Magento_Swatches/js/product-attributes'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    shim: {
        'Magento_Tinymce3/tiny_mce/tiny_mce_src': {
            'exports': 'tinymce'
        }
    },
    map: {
        '*': {
            'tinymceDeprecated': 'Magento_Tinymce3/tiny_mce/tiny_mce_src'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            mageTranslationDictionary: 'Magento_Translation/js/mage-translation-dictionary'
        }
    },
    deps: [
        'mageTranslationDictionary'
    ]
};

require.config(config);
})();
(function() {
var config = {
    'paths': {
        'fancybox': 'Dotdigitalgroup_Email/js/node_modules/fancybox/jquery.fancybox.pack'
    },
    'shim': {
        'fancybox': {
            exports: 'fancybox',
            'deps': ['jquery']
        }
    }
};

require.config(config);
})();
(function() {
var config = {
    map: {
        '*': {
            smsCounter: 'Dotdigitalgroup_Sms/js/counter/sms_counter'
        }
    }
};

require.config(config);
})();
(function() {
/**
 * Config to pull in all the relevant Braintree JS SDKs
 * @type {{paths: {braintreePayPalInContextCheckout: string, braintreePayPalCheckout: string, braintreeVenmo: string, braintreeHostedFields: string, braintreeDataCollector: string, braintreeThreeDSecure: string, braintreeGooglePay: string, braintreeApplePay: string, braintreeAch: string, braintreeLpm: string, googlePayLibrary: string}, map: {"*": {braintree: string}}}}
 */
var config = {
    map: {
        '*': {
            braintree: 'https://js.braintreegateway.com/web/3.67.0/js/client.min.js',
        }
    },

    paths: {
        "braintreePayPalCheckout": "https://js.braintreegateway.com/web/3.67.0/js/paypal-checkout.min",
        "braintreeHostedFields": "https://js.braintreegateway.com/web/3.67.0/js/hosted-fields.min",
        "braintreeDataCollector": "https://js.braintreegateway.com/web/3.67.0/js/data-collector.min",
        "braintreeThreeDSecure": "https://js.braintreegateway.com/web/3.67.0/js/three-d-secure.min",
        "braintreeApplePay": 'https://js.braintreegateway.com/web/3.67.0/js/apple-pay.min',
        "braintreeGooglePay": 'https://js.braintreegateway.com/web/3.67.0/js/google-payment.min',
        "braintreeVenmo": 'https://js.braintreegateway.com/web/3.67.0/js/venmo.min',
        "braintreeAch": "https://js.braintreegateway.com/web/3.67.0/js/us-bank-account.min",
        "braintreeLpm": "https://js.braintreegateway.com/web/3.67.0/js/local-payment.min",
        "googlePayLibrary": "https://pay.google.com/gp/p/js/pay",
        "braintreePayPalInContextCheckout": "https://www.paypalobjects.com/api/checkout"
    }
};

require.config(config);
})();



})(require);