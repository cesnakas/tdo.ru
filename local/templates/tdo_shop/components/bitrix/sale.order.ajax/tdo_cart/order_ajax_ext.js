(function () {
    'use strict';

    var initParent = BX.Sale.OrderAjaxComponent.init,
        editTotalBlockParent = BX.Sale.OrderAjaxComponent.editTotalBlock,
        editActiveBasketBlockParent = BX.Sale.OrderAjaxComponent.editActiveBasketBlock,
        // getDeliveryLocationInputParent = BX.Sale.OrderAjaxComponent.getDeliveryLocationInput,
        editOrderParent = BX.Sale.OrderAjaxComponent.editOrder
    ;

    BX.namespace('BX.Sale.OrderAjaxComponentExt');

    BX.Sale.OrderAjaxComponentExt = BX.Sale.OrderAjaxComponent;

    BX.Sale.OrderAjaxComponentExt.init = function (parameters) {
        initParent.apply(this, arguments);

        //удаление кнопок 'изменить' для блоков
        var editSteps = this.orderBlockNode.querySelectorAll('.bx-soa-editstep'), i;
        for (i in editSteps) {
            if (editSteps.hasOwnProperty(i)) {
                BX.remove(editSteps[i]);
            }
        }
        /* var editSteps = this.orderBlockNode.querySelectorAll('.bx-soa-section-title-container'), i;
         for (i in editSteps) {
             if (editSteps.hasOwnProperty(i)) {
                 // BX.remove(editSteps[i]);
             }
         }*/


    };

    //отключение кнопок "назад/вперёд"
    BX.Sale.OrderAjaxComponentExt.getBlockFooter = function (node) {
        var parentNodeSection = BX.findParent(node, {className: 'bx-soa-section'});

        // getBlockFooterParent.apply(this, arguments);
        var sections = this.orderBlockNode.querySelectorAll('.bx-soa-section.bx-active'),
            firstSection = sections[0],
            lastSection = sections[sections.length - 1],
            currentSection = BX.findParent(node, {className: "bx-soa-section"}),
            isLastNode = false,
            buttons = [];

        if (currentSection && currentSection.id.indexOf(firstSection.id) == '-1') {
            buttons.push(
                BX.create('button', {
                    props: {
                        href: 'javascript:void(0)',
                        className: 'btn btn-outline-secondary pl-3 pr-3'
                    },
                    html: this.params.MESS_BACK,
                    events: {
                        click: BX.proxy(this.clickPrevAction, this)
                    }
                })
            );
        }

        if (currentSection && currentSection.id.indexOf(lastSection.id) != '-1')
            isLastNode = true;

        if (!isLastNode) {
            buttons.push(
                BX.create('button', {
                    props: {href: 'javascript:void(0)', className: 'pull-right btn btn-primary pl-3 pr-3'},
                    html: this.params.MESS_FURTHER,
                    events: {click: BX.proxy(this.clickNextAction, this)}
                })
            );
        }

        //отключение доп. полей ввода купона
        /* if (!(/bx-soa-basket/.test(parentNodeSection.id))) {
             BX.remove(parentNodeSection.querySelector('.bx-soa-coupon'));
             BX.remove(parentNodeSection.querySelector('.bx-soa-more'));
         }*/

    };

    BX.Sale.OrderAjaxComponentExt.editOrder = function (section) {
        editOrderParent.apply(this, arguments);

        /*        var sections = this.orderBlockNode.querySelectorAll('.bx-soa-section'), i;
                for (i in sections) {
                    if (sections.hasOwnProperty(i)) {
                        if (!(/bx-soa-auth|bx-soa-properties|bx-soa-basket/.test(sections[i].id))) {
                            // sections[i].classList.add('bx-soa-section-hide');
                        }
                    }
                }*/

        /*       var sections = this.orderBlockNode.querySelectorAll('.bx-soa-pp-desc-container'), i;
               for (i in sections) {
                   if (sections.hasOwnProperty(i)) {
                       // if (!(/bx-soa-auth|bx-soa-properties|bx-soa-basket/.test(sections[i].id))) {
                       //     sections[i].classList.add('d-none');
                       // }
                   }
               }*/

    };

    //location
    BX.Sale.OrderAjaxComponentExt.locationsCompletion = function () {
        var i, locationNode, clearButton, inputStep, inputSearch,
            arProperty, data, section;

        this.locationsInitialized = true;
        this.fixLocationsStyle(this.regionBlockNode, this.regionHiddenBlockNode);
        this.fixLocationsStyle(this.propsBlockNode, this.propsHiddenBlockNode);

        for (i in this.locations) {
            if (!this.locations.hasOwnProperty(i))
                continue;

            locationNode = this.orderBlockNode.querySelector('div[data-property-id-row="' + i + '"]');
            if (!locationNode)
                continue;

            clearButton = locationNode.querySelector('div.bx-ui-sls-clear');
            inputStep = locationNode.querySelector('div.bx-ui-slst-pool');
            inputSearch = locationNode.querySelector('input.bx-ui-sls-fake[type=text]');

            locationNode.removeAttribute('style');
            this.bindValidation(i, locationNode);
            if (clearButton) {
                BX.bind(clearButton, 'click', function (e) {
                    var target = e.target || e.srcElement,
                        parent = BX.findParent(target, {tagName: 'DIV', className: 'form-group'}),
                        locationInput;

                    if (parent)
                        locationInput = parent.querySelector('input.bx-ui-sls-fake[type=text]');

                    if (locationInput)
                        BX.fireEvent(locationInput, 'keyup');
                });
            }

            if (!this.firstLoad && this.options.propertyValidation) {
                if (inputStep) {
                    arProperty = this.validation.properties[i];
                    data = this.getValidationData(arProperty, locationNode);
                    section = BX.findParent(locationNode, {className: 'bx-soa-section'});

                    if (section && section.getAttribute('data-visited') == 'true')
                        this.isValidProperty(data);
                }

                if (inputSearch)
                    BX.fireEvent(inputSearch, 'keyup');
            }
        }

        if (this.firstLoad && this.result.IS_AUTHORIZED && typeof this.result.LAST_ORDER_DATA.FAIL === 'undefined') {
            this.showActualBlock();
        } else if (!this.result.SHOW_AUTH) {
            this.changeVisibleContent();
        }

        this.checkNotifications();

        //скрытие типа плательщика
        BX.hide(this.orderBlockNode.querySelector('.form-check-group'));
        BX.hide(BX('bx-soa-basket'));

        //избранные локации
        BX.hide(this.orderBlockNode.querySelector('.quick-locations'));

    }


    BX.Sale.OrderAjaxComponentExt.getDeliveryLocationInput_ = function (node) {
        // getDeliveryLocationInputParent.apply(this, arguments);

        var currentProperty, locationId, altId, location, k, altProperty,
            labelHtml, currentLocation, insertedLoc,
            labelTextHtml, label, input, altNode;

        for (k in this.result.ORDER_PROP.properties) {
            if (this.result.ORDER_PROP.properties.hasOwnProperty(k)) {
                currentProperty = this.result.ORDER_PROP.properties[k];
                if (currentProperty.IS_LOCATION == 'Y') {
                    locationId = currentProperty.ID;
                    altId = parseInt(currentProperty.INPUT_FIELD_LOCATION);
                    break;
                }
            }
        }

        location = this.locations[locationId];

        if (location && location[0] && location[0].output) {
            this.regionBlockNotEmpty = true;

            labelHtml = '<label class="bx-soa-custom-label" for="soa-property-' + parseInt(locationId) + '">'
                + (currentProperty.REQUIRED == 'Y' ? '<span class="bx-authform-starrequired">*</span> ' : '')
                + BX.util.htmlspecialchars(currentProperty.NAME)
                + (currentProperty.DESCRIPTION.length ? ' <small>(' + BX.util.htmlspecialchars(currentProperty.DESCRIPTION) + ')</small>' : '')
                + '</label>';

            currentLocation = location[0].output;
            insertedLoc = BX.create('DIV', {
                attrs: {'data-property-id-row': locationId},
                props: {className: 'form-group bx-soa-location-input-container'},
                style: {visibility: 'hidden'},
                // html: labelHtml + currentLocation.HTML
                html: labelHtml
            });

            node.appendChild(insertedLoc);

            node.appendChild(this.orderBlockNode.querySelector('.js-region-select'));

            node.appendChild(BX.create('INPUT', {
                props: {
                    type: 'hidden',
                    name: 'RECENT_DELIVERY_VALUE',
                    value: location[0].lastValue
                }
            }));
            for (k in currentLocation.SCRIPT)
                if (currentLocation.SCRIPT.hasOwnProperty(k))
                    BX.evalGlobal(currentLocation.SCRIPT[k].JS);
        }

        if (location && location[0] && location[0].showAlt && altId > 0) {
            for (k in this.result.ORDER_PROP.properties) {
                if (parseInt(this.result.ORDER_PROP.properties[k].ID) == altId) {
                    altProperty = this.result.ORDER_PROP.properties[k];
                    break;
                }
            }
        }

        if (altProperty) {
            altNode = BX.create('DIV', {
                attrs: {'data-property-id-row': altProperty.ID},
                props: {className: "form-group bx-soa-location-input-container"}
            });

            labelTextHtml = altProperty.REQUIRED == 'Y' ? '<span class="bx-authform-starrequired">*</span> ' : '';
            labelTextHtml += BX.util.htmlspecialchars(altProperty.NAME);

            label = BX.create('LABEL', {
                attrs: {for: 'altProperty'},
                props: {className: 'bx-soa-custom-label'},
                html: labelTextHtml
            });

            input = BX.create('INPUT', {
                props: {
                    id: 'altProperty',
                    type: 'text',
                    placeholder: altProperty.DESCRIPTION,
                    autocomplete: 'city',
                    className: 'form-control bx-soa-customer-input bx-ios-fix',
                    name: 'ORDER_PROP_' + altProperty.ID,
                    value: altProperty.VALUE
                }
            });

            altNode.appendChild(label);
            altNode.appendChild(input);
            node.appendChild(altNode);

            this.bindValidation(altProperty.ID, altNode);
        }

        this.getZipLocationInput(node);


        BX.bind(node.querySelector('.js-region-select'), 'change', function (e) {

            // node.querySelector('input[name="ORDER_PROP_44"]').value = this.value;
            node.querySelector('input[name="RECENT_DELIVERY_VALUE"]').value = this.value;
            BX.Sale.OrderAjaxComponentExt.sendRequest('refreshOrderAjax');

        });


    };

    BX.Sale.OrderAjaxComponentExt.initFirstSection = function (parameters) {

    };

    BX.Sale.OrderAjaxComponentExt.editSection = function (section) {
        if (!section || !section.id)
            return;

        if (this.result.SHOW_AUTH && section.id != this.authBlockNode.id && section.id != this.basketBlockNode.id)
            section.style.display = 'none';
        else if (section.id != this.pickUpBlockNode.id)
            section.style.display = '';

        var active = true,
            titleNode = section.querySelector('.bx-soa-section-title-container'),
            editButton, errorContainer;

        errorContainer = section.querySelector('.alert.alert-danger');
        this.hasErrorSection[section.id] = errorContainer && errorContainer.style.display != 'none';

        switch (section.id) {
            case this.authBlockNode.id:
                this.editAuthBlock();
                break;
            case this.basketBlockNode.id:
                this.editBasketBlock(active);
                break;
            case this.regionBlockNode.id:
                this.editRegionBlock(active);
                break;
            case this.paySystemBlockNode.id:
                this.editPaySystemBlock(active);
                break;
            case this.deliveryBlockNode.id:
                this.editDeliveryBlock(active);
                break;
            case this.pickUpBlockNode.id:
                this.editPickUpBlock(active);
                break;
            case this.propsBlockNode.id:
                this.editPropsBlock(active);
                break;
        }

        section.setAttribute('data-visited', 'true');
    };

    BX.Sale.OrderAjaxComponentExt.editActiveBasketBlock = function (activeNodeMode) {
        this.params.SHOW_COUPONS_BASKET = false;
        editActiveBasketBlockParent.apply(this, arguments);

        // this.editCoupons(this.totalBlockNode);

    };

    //block total
    BX.Sale.OrderAjaxComponentExt.editTotalBlock = function () {
        this.totalWrapBlockNode = BX('bx-soa-coupon');
        this.totalWrapBlockNodeInput = this.totalWrapBlockNode.querySelector('input');

        //поле ввода ккупона
        BX.bind(
            this.totalWrapBlockNodeInput,
            'change',
            BX.delegate(function (event) {
                var newCoupon = BX.getEventTarget(event);
                if (newCoupon && newCoupon.value) {
                    this.sendRequest('enterCoupon', newCoupon.value);
                    newCoupon.value = '';
                }
            }, this)
        );

        this.editCoupons(this.totalBlockNode);

        // editTotalBlockParent.apply(this, arguments);
        if (!this.totalInfoBlockNode || !this.result.TOTAL)
            return;

        var total = this.result.TOTAL,
            priceHtml, params = {},
            discText, valFormatted, i,
            curDelivery, deliveryError, deliveryValue,
            showOrderButton = this.params.SHOW_TOTAL_ORDER_BUTTON === 'Y';

        BX.cleanNode(this.totalInfoBlockNode);

        // if (parseFloat(total.ORDER_PRICE) === 0)
        // {
        //     priceHtml = this.params.MESS_PRICE_FREE;
        //     params.free = true;
        // }
        // else
        // {
        //     priceHtml = total.ORDER_PRICE_FORMATED;
        // }
        //
        // this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_SUMMARY'), priceHtml, params));

        // if (this.options.showPriceWithoutDiscount)
        // {
        //     priceHtml = '<span class="text-red">' + total.PRICE_WITHOUT_DISCOUNT + '</span>';
        // }


        if (this.options.showOrderWeight) {
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_WEIGHT_SUM'), total.ORDER_WEIGHT_FORMATED));
        }

        if (this.options.showTaxList) {
            for (i = 0; i < total.TAX_LIST.length; i++) {
                valFormatted = total.TAX_LIST[i].VALUE_MONEY_FORMATED || '';
                this.totalInfoBlockNode.appendChild(
                    this.createTotalUnit(
                        total.TAX_LIST[i].NAME + (!!total.TAX_LIST[i].VALUE_FORMATED ? ' ' + total.TAX_LIST[i].VALUE_FORMATED : '') + ':',
                        valFormatted
                    )
                );
            }
        }

        params = {};
        curDelivery = this.getSelectedDelivery();
        deliveryError = curDelivery && curDelivery.CALCULATE_ERRORS && curDelivery.CALCULATE_ERRORS.length;

        if (deliveryError) {
            deliveryValue = BX.message('SOA_NOT_CALCULATED');
            params.error = deliveryError;
        } else {
            if (parseFloat(total.DELIVERY_PRICE) === 0) {
                deliveryValue = this.params.MESS_PRICE_FREE;
                params.free = true;
            } else {
                deliveryValue = total.DELIVERY_PRICE_FORMATED;
            }

            if (
                curDelivery && typeof curDelivery.DELIVERY_DISCOUNT_PRICE !== 'undefined'
                && parseFloat(curDelivery.PRICE) > parseFloat(curDelivery.DELIVERY_DISCOUNT_PRICE)
            ) {
                deliveryValue += '<br><span class="bx-price-old">' + curDelivery.PRICE_FORMATED + '</span>';
            }
        }

        if (this.result.DELIVERY.length) {
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_DELIVERY'), deliveryValue, params));
        }

        if (this.options.showDiscountPrice) {
            discText = this.params.MESS_ECONOMY;
            if (total.DISCOUNT_PERCENT_FORMATED && parseFloat(total.DISCOUNT_PERCENT_FORMATED) > 0)
                discText += total.DISCOUNT_PERCENT_FORMATED;

            this.totalInfoBlockNode.appendChild(this.createTotalUnit(discText + ':', '<span class="text-red">' + total.DISCOUNT_PRICE_FORMATED + '</span>', {highlighted: true}));
        }

        if (this.options.showPayedFromInnerBudget) {
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_IT'), total.ORDER_TOTAL_PRICE_FORMATED));
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_PAYED'), total.PAYED_FROM_ACCOUNT_FORMATED));
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_LEFT_TO_PAY'), total.ORDER_TOTAL_LEFT_TO_PAY_FORMATED, {total: true}));
        } else {
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_SUM_IT'), total.ORDER_TOTAL_PRICE_FORMATED, {total: true}));
        }

        if (parseFloat(total.PAY_SYSTEM_PRICE) >= 0 && this.result.DELIVERY.length) {
            this.totalInfoBlockNode.appendChild(this.createTotalUnit(BX.message('SOA_PAYSYSTEM_PRICE'), '~' + total.PAY_SYSTEM_PRICE_FORMATTED));
        }

        if (!this.result.SHOW_AUTH) {
            this.totalInfoBlockNode.appendChild(
                BX.create('DIV', {
                    props: {className: 'bx-soa-cart-total-button-container' + (!showOrderButton ? ' d-block d-sm-none' : '')},
                    children: [
                        BX.create('A', {
                            props: {
                                href: 'javascript:void(0)',
                                className: 'btn btn-primary btn-lg btn-order-save'
                            },
                            html: this.params.MESS_ORDER,
                            events: {
                                click: BX.proxy(this.clickOrderSaveAction, this)
                            }
                        })

                    ]
                })
            );
        }

        this.editMobileTotalBlock();
    };

    //block coupon
    BX.Sale.OrderAjaxComponentExt.editCoupons = function (basketItemsNode) {
        this.totalWrapBlockNodeCouponListWrap = this.totalBlockNode.querySelector('.bx-soa-coupon-item-wrap');

        BX.cleanNode(this.totalWrapBlockNodeCouponListWrap);
        var couponsList = this.getCouponsList(true);
        this.totalWrapBlockNodeCouponListWrap.appendChild(
            BX.create('DIV', {
                props: {className: 'bx-soa-coupon-item'},
                children: couponsList
            })
        );
    };


})();

