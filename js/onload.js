function updateCartItems() {

    var cartItemsXhr = new XMLHttpRequest();
    cartItemsXhr.open("GET", "../php/getCartItems.php?userID=" + userID, true);
    cartItemsXhr.onreadystatechange = function() {
        if (cartItemsXhr.readyState == 4 && cartItemsXhr.status == 200) {
            var cartItemsResponse = cartItemsXhr.responseText;
            console.log(cartItemsResponse);
            
        }
    };
    cartItemsXhr.send();
}