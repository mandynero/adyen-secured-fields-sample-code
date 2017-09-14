$(document).ready(function() {

    var apiResponse;
    var securedFields;

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

    // initiateSecureddFields(jsonResponseObject) renders the iframes onto your custom divs
    function initiateSecuredFields(jsonResponseObject) {
        var responseObject = JSON.parse(jsonResponseObject);

        var securedFieldsConfiguration = {
            configObject : responseObject,
            rootNode: '.form-div'
        };

        securedFields = csf(securedFieldsConfiguration);
    }

    securedFields.onLoad( function(pCallbackObj){
        // Triggers when securedFields are loaded
    });

    securedFields.onAllValid( function(pCallbackObj){
        // Triggers when all fields are valid
    });

    securedFields.onBrand( function(pCallbackObj){
        // When receiving a brand callBack
    });

    securedFields.onError( function(pCallbackObj){
        // Actions to take on error callback
    });

    // Call to the serverCall.php file, performing the server call to checkoutshopper.adyen.com
    $.ajax({
        url: 'api/serverCall.php',
        dataType:'json',
        method:'POST', // jQuery > 1.9
        type:'POST', //jQuery < 1.9
        success:function(data){
            apiResponse = data;
            initiateSecuredFields(data);
        },

        error : function(){
            if(window.console && console.log){
                console.log('### adyenCheckout::error:: args=', arguments);
            }
        }
    });

});