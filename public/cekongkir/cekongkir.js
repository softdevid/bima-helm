function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie =
        name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}

function getDistrict(name) {
    var data = kecamatan.filter((kec) =>
        kec.label.toLowerCase().includes(name.toLowerCase())
    );
    return data[0].value;
}

async function getData(from, to, weight) {
    try {
        const response = await fetch(
            `/cekongkir/getData.php?action=hitung_auto&kec=${to}&kurir=anteraja:jne:jnt:ninja:sicepat&asal=${from}&berat=${weight}`
        );
        const data = await response.json();
        return data.rajaongkir;
    } catch (err) {
        return console.log(err);
    }
}

function numThousand(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

document.addEventListener("DOMContentLoaded", async function (event) {
    // Your code to run since DOM is loaded and ready

    // eraseCookie('dataCekOngkir');
    const asal = document.getElementById("from").innerHTML;
    const tujuan = document.getElementById("to").innerHTML;

    // change weight
    // below
    const weight = document.getElementById("weight").innerHTML;
    const from = getDistrict(asal);
    const to = getDistrict(tujuan);
    if (getCookie("dataCekOngkir") == null) {
        console.log("kuki null");
        setCookie("beratProduk", weight, 30);
        const data = await getData(from, to, weight);
        setCookie("dataCekOngkir", JSON.stringify(data), 30);
    }
    if (weight != getCookie("beratProduk")) {
        setCookie("beratProduk", weight, 30);
        const data = await getData(from, to, weight);
        setCookie("dataCekOngkir", JSON.stringify(data), 30);
    }
    // eraseCookie("beratProduk");

    var data = JSON.parse(getCookie("dataCekOngkir"));
    //terpaksa
    $(".check-shipp").change(function () {
        $(".check-shipp").not(this).prop("checked", false);
        let id = $(this).attr("id");
        if (id == "jnt") {
            id = "J&T";
        }
        let dataResult = {};
        for (let i = 0; i < data.results.length; i++) {
            if (id == data.results[i].code) {
                dataResult = data.results[i];
            }
        }
        let dataOngkir = "";
        dataResult.costs.forEach((ongkir) => {
            dataOngkir +=
            `<li class="list-group-item">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kurir-${dataResult.code}" id="kurir-${dataResult.code}-${ongkir.service.toLowerCase()}">
                    <label class="form-check-label" for="kurir-${dataResult.code}-${ongkir.service.toLowerCase()}">
                        <span id="${dataResult.code.toLowerCase()}-${ongkir.service.toLowerCase()}-kurir">${dataResult.name} - ${ongkir.service}</span> -> Rp <span id="${dataResult.code.toLowerCase()}-${ongkir.service.toLowerCase()}-harga">${numThousand(ongkir.cost[0].value)}</span>
                    </label>
                </div>
            </li>`;
        });
        document.getElementById("data-ongkir").innerHTML = "";
        document.getElementById("data-ongkir").innerHTML = dataOngkir;

        document.querySelectorAll('#data-ongkir li > div > input[type="radio"]').forEach(radiOngkir => {
            radiOngkir.addEventListener('click', function(event) {
                const idOngkir = document.getElementById(event.target.nextSibling.nextSibling.children[0].id).innerHTML;
                document.getElementById('ongkir-service').innerHTML = '';
                document.getElementById('ongkir-service').innerHTML = idOngkir;
                const idOngkirHarga = document.getElementById(event.target.nextSibling.nextSibling.children[1].id).innerHTML;
                document.getElementById('ongkir-price').innerHTML = '';
                document.getElementById('ongkir-price').innerHTML = 'Rp ' + idOngkirHarga;

                const subtotal = document.getElementById('subtotal-price-order').innerHTML;
                const total = parseInt(subtotal.replace(/.(?=\d{3})/g, '')) + parseInt(idOngkirHarga.replace(/.(?=\d{3})/g, ''));

                document.getElementById('total-price-order').innerHTML = '';
                document.getElementById('total-price-order').innerHTML = 'Rp ' + numThousand(total);
            });
        })

    });
});
