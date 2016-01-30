$(function() {
    $.validateCheckoutForm = function() {
        if ($("#normal-address").val().trim() == '') {
            $("#normal-address").css("border", "1px dashed #ff0000");
            $("#normal-address").focus();
        } else {
            $("#normal-address").css("border", "0 none");
        }

        if ($("#normal-phone").val().trim() == '') {
            $("#normal-phone").css("border", "1px dashed #ff0000");
            $("#normal-phone").focus();
        } else {
            $("#normal-phone").css("border", "0 none");
        }

        if ($("#normal-email").val().trim() == '') {
            $("#normal-email").css("border", "1px dashed #ff0000");
            $("#normal-email").focus();
        } else {
            $("#normal-email").css("border", "0 none");
        }

        if ($("#normal-name").val().trim() == '') {
            $("#normal-name").css("border", "1px dashed #ff0000");
            $("#normal-name").focus();
        } else {
            $("#normal-name").css("border", "0 none");
        }

        if ($("#normal-name").val().trim() != '' && $("#normal-address").val().trim() != '' && $("#normal-phone").val().trim() != '' && $("#normal-email").val().trim() != '') {
            return true;
        } else {
            return false;
        }
    };
});

