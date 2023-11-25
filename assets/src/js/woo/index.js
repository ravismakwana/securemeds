(function ($) {
    class AsgardWoocommerce {
        constructor() {
            this.slideEffectAjax();
            this.addToCartAjax();
            this.dropZoneCheckout();
            this.updateQuantity();
        }

        slideEffectAjax() {
            jQuery('.top-cart-contain').on('mouseenter', function () {
                jQuery(this).find('.top-cart-content').stop(true, true).show();
            });
            jQuery('.top-cart-contain').on('mouseleave', function () {
                jQuery(this).find('.top-cart-content').stop(true, true).hide();
            });
        }

        addToCartAjax() {
            if (jQuery('.btn-add-to-cart-ajax').length) {
                $(document).on('click', '.btn-add-to-cart-ajax', function () {
                    var data_variation,
                        product_id,
                        variation_id,
                        qty,
                        variation_key,
                        variation_val,
                        var_data = '';
                    var var_data = {};
                    product_id = jQuery(this).attr('data-product_id');
                    variation_id = jQuery(this).attr('data-variation_id');
                    qty = jQuery(this).attr('data-quantity');
                    //console.log("Product ID = "+product_id+ "Variation ID = "+ variation_id + "Quantity = "+ qty);
                    data_variation = jQuery(this).attr('data-variation');
                    var_data = data_variation.split('=');
                    variation_key = var_data['0'];
                    variation_val = var_data['1'];
                    var_data[variation_key] = variation_val;
                    //jQuery(this).prop("disabled", true);
                    const btn = jQuery(this);
                    jQuery(this).html(
                        '<div class="spinner-border spinner-border-sm text-danger" role="status"> <span class="visually-hidden">Loading...</span> </div>'
                    );
                    btn.parent('.footable-last-visible')
                        .find('.checkout_button')
                        .remove();
                    console.log(
                        'Product ID = ' +
                        product_id +
                        ' Variation ID = ' +
                        variation_id +
                        ' Quantity = ' +
                        qty +
                        ' variation_key=' +
                        variation_key +
                        ' variation_val=' +
                        variation_val
                    );
                    jQuery.ajax({
                        url: ajax_object.ajax_url,
                        data: {
                            action: 'woocommerce_add_variation_to_cart',
                            product_id: product_id,
                            variation_id: variation_id,
                            quantity: qty,
                            variation: var_data,
                        },
                        type: 'POST',
                        success: function (data) {
                            btn.html(
                                '<svg width="25" height="25" fill="var(--bs-danger)"><use href="#icon-cart"></use></svg>'
                            );
                            setTimeout(function () {
                                btn.html(
                                    '<svg class="d-block mx-auto m-0" width="25" height="25" fill="var(--bs-danger)"> <use href="#icon-cart"></use> </svg>'
                                );
                            }, 1000);
                            console.log(ajax_object.checkout_url);
                            btn.parent('.footable-last-visible').append(
                                '<a href="' +
                                ajax_object.checkout_url +
                                '" title="Checkout" alt="Checkout" class="btn checkout_button p-0 ms-2" ><svg width="25" height="25" fill="var(--bs-primary)"><use href="#icon-circle-check"></use></svg></a>'
                            );

                            jQuery('.mini-cart').replaceWith(
                                data.fragments['.mini-cart']
                            );
                            jQuery(
                                'div.button-group-single-product'
                            ).replaceWith(
                                data.fragments[
                                    'div.button-group-single-product'
                                    ]
                            );
                            jQuery(
                                'div.widget_shopping_cart_content'
                            ).replaceWith(
                                data.fragments[
                                    'div.widget_shopping_cart_content'
                                    ]
                            );
                            jQuery('.top-cart-content').css('display', 'block');
                        },
                    });
                });
            }
        }

        dropZoneCheckout() {
            const prescription_upload_url =
                ajax_object.ajax_url + '?action=upload_prescription';
            const prescription_delete_url =
                ajax_object.ajax_url + '?action=delete_prescription';
            /* file upload at checkout page*/
            if (jQuery('#uploader').length) {
                $('#uploader').uploadFile({
                    url: prescription_upload_url,
                    fileName: 'prescription',
                    showDelete: true,
                    returnType: 'json',
                    multiple: false,
                    dragDrop: true,
                    uploadButtonClass: 'ajax-file-upload lh-1 bg-primary',
                    dragDropContainerClass: 'ajax-upload-dragdrop w-100',
                    allowedTypes: 'pdf,jpg,jpeg,png',
                    onSuccess: function (files, data, xhr, pd) {
                        $('#prescription_name').val(data);
                    },
                    deleteCallback: function (data, pd) {
                        $.post(
                            prescription_delete_url,
                            {op: 'delete', name: data},
                            function (resp, textStatus, jqXHR) {
                            }
                        );
                        pd.statusbar.hide(); //You choice.
                    },
                });
            }
        }

        updateQuantity(){
            jQuery("select.select-qty").change(function () {
                var selectedQty = jQuery(this).children("option:selected").val();
                jQuery(this).parent().next().find('.btn-add-to-cart-ajax').attr('data-quantity', selectedQty);
            });
        }
    }

    new AsgardWoocommerce();
})(jQuery);
