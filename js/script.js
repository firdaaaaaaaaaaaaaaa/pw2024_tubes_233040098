// ambil elemen2 yang dibuat
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var conteiner = document.getElementById('container');

// tambahkan event ketika tombol ditulis
keyword.addEventListener('keyup', function() {
   
    //buat objek ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapa ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200) {
            conteiner.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/search.php?keyword=' + keyword.value, true);
    xhr.send();

});
