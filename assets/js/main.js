$(document).ready(function() {

    var apiResponse,
        securedFields,
        stayHidden = false,
        payButton = $(".button--pay"),
        logoBaseUrl,
        brandImage = $('.brand-container__image');



    // Send styling to securedFields, for more information: https://docs.adyen.com/developers/checkout-javascript-sdk/styling-secured-fields
    var hostedFieldStyle = {
        base: {
            fontSize: '16px'
        }
    };

    // all callBack functionality responding to the postMessages coming from the iframes
    function securedFieldsCallBack(data) {

        // To view all data coming in from the callback, console.log(data)
        if (data.brandText !== undefined) {
            $('.label-security-code').text(data.brandText);
        }

        if (data.allValid !== undefined && data.allValid === true) {
            $('.button--pay').removeClass('disabled');
        } else {
            $('.button--pay').addClass('disabled');
        }

    }

    var explanationDiv = $('.explanation');
    explanationDiv.hide();

    function showExplanation() {
        if (stayHidden === true) {
            explanationDiv.removeClass('hidden');
        }
    }

    window.setTimeout(showExplanation(), 4000);

    // initiateSecureddFields(jsonResponseObject) renders the iframes onto your custom divs
    function initiateSecuredFields(jsonResponseObject) {

        var securedFieldsConfiguration = {
            configObject : jsonResponseObject,
            rootNode: '.form-div'
        };

        securedFields = csf(securedFieldsConfiguration);

        securedFields.onLoad( function(){

            // Triggers when securedFields are loaded

        });

        securedFields.onAllValid( function(allValidObject){

            // Triggers when all fields are valid
            if (allValidObject.allValid === true) {
                payButton.removeClass('disabled');
            } else {
                payButton.addClass('disabled');
            }
        });

        // Triggered when receiving a brand callBack
        securedFields.onBrand( function(brandObject){
            if (brandObject.brand) {
                brandImage.attr("src",logoBaseUrl + brandObject.brand + "@2x.png");
            }
        });

        securedFields.onError( function(pCallbackObj){
            // Actions to take on error callback

        });
    }


    // Call to the serverCall.php file, performing the server call to checkoutshopper.adyen.com
    $.ajax({
        url: 'api/serverCall.php',
        dataType:'json',
        method:'POST', // jQuery > 1.9
        type:'POST', //jQuery < 1.9

        success:function(data) {
            logoBaseUrl = data.logoBaseUrl;
            brandImage.attr("src", logoBaseUrl + "card@2x.png");
            initiateSecuredFields(data);
            stayHidden = true;
        },

        error : function(){
            if(window.console && console.log){
                console.log('### adyenCheckout::error:: args=', arguments);
            }
        }
    });
});