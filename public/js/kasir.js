function numThousand(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

let barcode = document.querySelector("#barcode");
let barcodeData = document.querySelector("#barcodeData");
let qty = document.querySelector("#qty");
let sizeName = document.querySelector("#sizeName");

let productName = document.querySelector("#name");
let price = document.querySelector("#price");

let btnTambah = document.querySelector("#btnTambah");
let tunai = document.querySelector("#tunai");
let save = document.querySelector("#save");

var purchase_price = "";
var id = "";

let tabelKasir = document
    .querySelector("#tabelKasir")
    .getElementsByTagName("tbody")[0];

barcode.addEventListener("input", function () {
    fetch(`/kasir-barcode-data?barcode=${barcode.value}`)
        .then((response) => response.json())
        .then((data) => {
            if (data.product !== null) {
                barcodeData.value = data.product.barcode;
                productName.value = data.product.name;
                price.value = data.product.price;
                purchase_price = data.product.purchase_price;
                id = data.product.id;
            } else {
                barcodeData.value = "";
                productName.value = "";
                price.value = "";
            }
        });
});

btnTambah.addEventListener("click", function () {
    if (barcode.value == "") {
        barcode.setCustomValidity("Isikan dahulu");
        barcode.reportValidity("Isikan dahulu");
    } else if (qty.value == "") {
        qty.setCustomValidity("Isikan dahulu");
        qty.reportValidity("Isikan dahulu");
    } else if (sizeName.value == "") {
        sizeName.setCustomValidity("Pilih dahulu");
        sizeName.reportValidity("Pilih dahulu");
    } else {
        let row = tabelKasir.insertRow();

        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        let cell5 = row.insertCell(4);
        let cell6 = row.insertCell(5);
        let cell7 = row.insertCell(6);

        cell1.innerHTML = barcodeData.value;
        cell2.innerHTML = productName.value;
        cell4.innerHTML = qty.value;
        if(sizeName.value == 1){
            cell3.innerHTML = "XS";
        } else if(sizeName.value == 2){
            cell3.innerHTML = "S";
        } else if(sizeName.value == 3){
            cell3.innerHTML = "M";
        } else if(sizeName.value == 4){
            cell3.innerHTML = "LG";
        } else if(sizeName.value == 5){
            cell3.innerHTML = "XL";
        } else if(sizeName.value == 6){
            cell3.innerHTML = "XXL";
        }
        cell5.innerHTML = price.value * qty.value;
        cell5.id = "price";
        cell6.innerHTML = purchase_price;
        cell6.className = "d-none";
        cell7.innerHTML = id;
        cell7.className = "d-none";
        barcode.value = "";
        qty.value = "";
        sizeName.value = "";
        productName.value = "";
        price.value = "";
    }
});

tunai.addEventListener('keyup', function() {
    document.querySelector("#tunai-res").innerHTML = numThousand(tunai.value)
});
