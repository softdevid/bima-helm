//ambil elemen2 yang dibutuhkan
var barcode = document.getElementById('barcode');
var container = document.getElementById('container');

barcode.addEventListener('keyup', function() {

    //buat objek ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '/kasir/index.blade.php', true);
    xhr.send();
});
