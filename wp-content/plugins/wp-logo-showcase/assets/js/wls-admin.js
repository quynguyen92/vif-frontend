(function($){
    $( window ).resize(function() {
        HeightResizeWlsPreview();
    });

    $(function(){
        $(".rt-tab-nav li:first-child a").trigger('click');
        renderWlsPreview();
    });
    if($(".rt-color").length){
        $(".rt-color").wpColorPicker();
    }
    if($("#sc-wls-style .rt-color").length){
        var cOptions = {
            defaultColor: false,
            change: function(event, ui){
                renderWlsPreview();
            },
            clear: function() {
                renderWlsPreview();
            },
            hide: true,
            palettes: true
        };
        $("#sc-wls-style .rt-color").wpColorPicker(cOptions);
    }
    if($(".rt-select2").length){
        $(".rt-select2").select2({
            theme: "classic",
            minimumResultsForSearch: Infinity
        });
    }

    var fixHelper = function(e, ui) {
        ui.children().children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };

    if($('.post-type-wlshowcase table.posts #the-list').length) {
        $('.post-type-wlshowcase table.posts #the-list').sortable({
            'items': 'tr',
            'axis': 'y',
            'helper': fixHelper,
            'update': function (e, ui) {
                var order = $('#the-list').sortable('serialize');
                jQuery.ajax({
                    type: "post",
                    url: ajaxurl,
                    data: order + "&action=wls-logo-update-menu-order",
                    beforeSend: function () {
                        $('body').append($("<div id='wls-loading'><span class='wls-loading'>Updating ...</span></div>"));
                    },
                    success: function (data) {
                        jQuery("#wls-loading").remove();
                    }
                });
            }
        });
    }



    if($(".rt-sortable").length){
        $('.rt-sortable .sortable-list').sortable({
            connectWith: '.rt-sortable .sortable-list',
            'update' : function(e, ui) {
                var id, target, sortHolder, holder;
                sortHolder = $(this).parents(".rt-sortable");
                holder = sortHolder.find(".sortable-list.target");
                target = sortHolder.find(".sort-values");
                target.html('');
                holder.children('li').each(function(){
                   id = $(this).attr('data-item');
                    target.append("<input type='hidden' name='_wls_items[]' value='"+id+"' >");
                });
            },
            stop: function (event, ui) {
                renderWlsPreview();
            }
        });
    }

    $("#wlshowcasesc_sc_settings_meta").on('change', 'select,input', function(){
        renderWlsPreview();
    });
    $("#wlshowcasesc_sc_settings_meta").on("input propertychange",function(){
        renderWlsPreview();
    });

    function renderWlsPreview(){
        if($("#wlshowcasesc_sc_settings_meta").length) {
            var data = $("#wlshowcasesc_sc_settings_meta").find('input[name],select[name],textarea[name]').serialize();
            $(".rt-loading").remove();
            $(".rt-response").addClass('loading');
            $(".rt-response").html('<span>Loading...</span>');
            wlsAjaxCall(null, 'loadWlsPreview', data, function (data) {
                console.log(data);
                if (!data.error) {
                    $("#wls-sc-preview").html(data.data);
                }
                $(".rt-response").removeClass('loading');
                $(".rt-response").html('');
            });
        }
    }


    $("#wls_image_resize").on('change', function(){
            wlsImageResizeOption();
    });
    $("#wls_layout").on('change', function(){
        wlsCarouselOption();
    });

    wlsImageResizeOption();
    wlsCarouselOption();


    $(".rt-tab-nav li").on('click', 'a', function(e){
        e.preventDefault();
        var container = $(this).parents('.rt-tab-container');
        var nav = container.children('.rt-tab-nav');
        var content = container.children(".rt-tab-content");
        var $this, $id;
        $this = $(this);
        $id = $this.attr('href');
        content.hide();
        nav.find('li').removeClass('active');
        $this.parent().addClass('active');
        container.find($id).show();
    });

    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if(height  > 50) {
            $('.post-type-wlshowcasesc div#submitdiv').addClass('sticky');
        }else{
            $('.post-type-wlshowcasesc div#submitdiv').removeClass('sticky');
        }
    });

    function wlsImageResizeOption(){
        if($("#wls_image_resize").is(":checked")){
            $("#wls_image_width_holder, #wls_image_height_holder, #wls_image_crop_holder").show();
        }else{
            $("#wls_image_width_holder, #wls_image_height_holder, #wls_image_crop_holder").hide();
        }
    }
    function wlsCarouselOption(){
        var id = $("#wls_layout").val();
        if(id == 'carousel-layout'){
            $(".wls_carousel_options_holder").show();
        }else{
            $(".wls_carousel_options_holder").hide();
        }
    }
})(jQuery);

function wlsLoadLayout(){
    HeightResizeWlsPreview();
    var carousel = jQuery("#wpls-carousel");
    if(carousel.length){
        jQuery.when( carousel.slick() ).done(function() {
            HeightResizeWlsPreview();
        });
    }
    var $isotope = jQuery('#wls-isotope');
    if($isotope.length){
        var isotope = $isotope.imagesLoaded( function() {
            HeightResizeWlsPreview();
            isotope.isotope({
                itemSelector: '.isotope-item',
            });
        });
        jQuery('#wls-iso-button').on( 'click', 'button', function(e) {
            e.preventDefault();
            var filterValue = jQuery(this).attr('data-filter');
            isotope.isotope({ filter: filterValue });
            jQuery(this).parent().find('.selected').removeClass('selected');
            jQuery(this).addClass('selected');
        });
    }
}

function HeightResizeWlsPreview(){

    var rtMaxH = 0;
    jQuery("#wls-sc-preview").find(".rt-equal-height").height("auto");
    jQuery("#wls-sc-preview").find('.rt-equal-height').each(function(){
        var $thisH = jQuery(this).actual( 'outerHeight' );
        if($thisH > rtMaxH){
            rtMaxH = $thisH;
        }
    });
    jQuery("#wls-sc-preview").find(".rt-equal-height").css('height', rtMaxH + "px");

    jQuery(document).ready(function(){
        jQuery('.wls-tooltip').hover(
            function() {
                var $this = jQuery( this );
                var $title = $this.attr('data-title');
                $tooltip = '<div class="rt-tooltip">' +
                    '<div class="rt-tooltip-content">'+$title+'</div>'+
                    '<div class="rt-tooltip-bottom"></div>'+
                    '</div>';
                $this.append( $tooltip );
                var $tooltip = $this.find(".rt-tooltip");
                var tWidth = $tooltip.outerWidth();
                var tHolderWidth = $this.outerWidth();
                var left;
                if(tWidth <= tHolderWidth){
                    left = (tHolderWidth - tWidth)/2;
                    $tooltip.css('left',left+'px');
                }else{
                    $tooltip.css('max-width',tHolderWidth+'px');
                }
            }, function() {
                jQuery( this ).find( ".rt-tooltip" ).remove();
            }
        );
    });
}

( function( global, $ ) {
    var editor,
        syncCSS = function() {
            wlsSyncCss();
        },
        loadAce = function() {
            $('.rt-custom-css').each(function(){
                var id = $(this).find('.custom-css').attr('id');
                editor = ace.edit( id );
                global.safecss_editor = editor;
                editor.getSession().setUseWrapMode( true );
                editor.setShowPrintMargin( false );
                editor.getSession().setValue( $(this).find('.custom_css_textarea').val() );
                editor.getSession().setMode( "ace/mode/css" );
            });

            jQuery.fn.spin&&$( '.custom_css_container' ).spin( false );
            $( '#post' ).submit( syncCSS );
        };
    if ( $.browser.msie&&parseInt( $.browser.version, 10 ) <= 7 ) {
        $( '.custom_css_container' ).hide();
        $( '.custom_css_textarea' ).show();
        return false;
    } else {
        $( global ).load( loadAce );
    }
    global.aceSyncCSS = syncCSS;
} )( this, jQuery );

function wlsSyncCss(){
    jQuery('.rt-custom-css').each(function(){
        var e = ace.edit( jQuery(this).find('.custom-css').attr('id') );
        jQuery(this).find('.custom_css_textarea').val( e.getSession().getValue() );
    });
}
function rtWLSSettings(e){
    wlsSyncCss();
    jQuery('rt-response').hide();
    var arg = jQuery( e ).serialize();
    var bindElement = jQuery('.rtSaveButton');
    wlsAjaxCall( bindElement, 'rtWLSSettings', arg, function(data){
        if(data.error){
            jQuery('.rt-response').addClass('updated');
            jQuery('.rt-response').removeClass('error');
            jQuery('.rt-response').show('slow').text(data.msg);
        }else{
            jQuery('.rt-response').addClass('error');
            jQuery('.rt-response').show('slow').text(data.msg);
        }
    });

}


function wlsAjaxCall( element, action, arg, handle){
    var data;
    if(action) data = "action=" + action;
    if(arg)    data = arg + "&action=" + action;
    if(arg && !action) data = arg;

    var n = data.search(wls.nonceID);
    if(n<0){
        data = data + "&"+ wls.nonceID + "=" + wls.nonce;
    }
    jQuery.ajax({
        type: "post",
        url: wls.ajaxurl,
        data: data,
        beforeSend: function() { jQuery("<span class='rt-loading'></span>").insertAfter(element); },
        success: function( data ){
            jQuery(".rt-loading").remove();
            handle(data);
        }
    });
}
