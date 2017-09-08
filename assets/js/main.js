$(document).ready(function() {

    // Send styling to securedFields, for more information: https://docs.adyen.com/developers/checkout-javascript-sdk/styling-secured-fields
    var hostedFieldStyle = {
        base: {
            fontSize: '16px'
        }
    };

    function securedFieldsCallBack(data) {
        console.log('Secured Fields called back with data:', data);
    }


    function initiateSecuredFields(jsonResponse) {

        var securedFieldsConfiguration = {
            csfCallback : securedFieldsCallBack,
            configObject : jsonResponse,
            rootNode: '.form-div'
        };

        var securedFields = csf(securedFieldsConfiguration);
    }


    // Call to the php file, performing the server call to checkoutshopper.adyen.com
    $.ajax({
        url: 'api/serverCall.php',
        dataType:'json',
        method:'POST',// jQuery > 1.9
        type:'POST', //jQuery < 1.9
        success:function(data){
            console.log('successful call to adyen');
            initiateSecuredFields(data);
        },

        error : function(){
            if(window.console && console.log){
                console.log('### adyenCheckout::error:: args=', arguments);
            }
        }
    });

});