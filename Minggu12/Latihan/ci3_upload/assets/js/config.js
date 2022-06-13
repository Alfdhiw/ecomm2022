//Menangkap semua elemen 

var search = document.getElementById('search');
var cari = document.getElementById('cari');
var container = document.getElementById('container');

//Tambahkan event

search.addEventListener('keyup', function () {

    //buat objek ajax

    var xhr = new XMLHttpRequest();

    //cek kesiapan 

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    }

    //eksekusi ajax

    xhr.open('GET', 'ajax/coba.txt', true);
    xhr.send();

});