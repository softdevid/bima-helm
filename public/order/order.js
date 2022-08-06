function getDataFromId() {
    const fullName = document.getElementById("fullName").value;
    const noTelp = document.getElementById("noTelp").value;
    const address = document.getElementById("address").value;

    const arrayProduct = [
        ...document.querySelectorAll("tbody#tableCart tr"),
    ].map((row) => {
        const [
            no,
            productId,
            productName,
            productQty,
            productSize,
            productSubtotal,
        ] = [...row.querySelectorAll("td")].map((td) => td.textContent.trim());
        return {
            productId,
            productName,
            productQty,
            productSize,
            productSubtotal,
        };
    });

    const selectPaymentMethod = document.getElementById("payment-method");
    const paymentMethod =
        selectPaymentMethod.options[selectPaymentMethod.selectedIndex].text;

    const shippingName = document.getElementById("ongkir-service").innerHTML;
    const shippingPrice = document.getElementById("ongkir-price").innerHTML;
    const qtyProduct = document.getElementById("total-product").innerHTML;
    const subTotal = document.getElementById("subtotal-price-order").innerHTML;
    const handlingFee = document.getElementById("handling-fee-price").innerHTML;
    const totalPrice = document.getElementById("total-price-order").innerHTML;

    const orderComment = document.getElementById("order-comment").value;

    const orderData = {
        userData: {
            fullName,
            noTelp,
            address,
        },
        orderDetail: {
            products: arrayProduct,
            shippingName,
            paymentMethod,
            paymentDetail: {
                qtyProduct,
                subTotal,
                shippingPrice,
                handlingFee,
                totalPrice,
            },
        },
        orderComment,
    };
    return orderData;
}
function make() {
    const orderData = getDataFromId();
    console.log(orderData);
    const token = document.getElementById("token").value;

    fetch("/order/make", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(orderData),
    })
    .then(response => response.json())
    .then(response => {
        console.log(response);
    }).catch(err => console.log(err));
}
