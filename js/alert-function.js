const notifikasi = $('.info-status').data('infostatus');

if(notifikasi == "Password Salah"){
    Swal.fire({
        icon: "error",
        title: notifikasi,
    })

}else if(notifikasi == "Username Tidak Ditemukan"){
    Swal.fire({
        icon: "error",
        title: notifikasi,
    })
}

