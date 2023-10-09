// Fungsi untuk membuka modal
document.getElementById("openModalBtn").addEventListener("click", function() {
    document.getElementById("myModal").style.display = "block";
});

// Fungsi untuk menutup modal
document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("myModal").style.display = "none";
});

// Tindakan saat form dikirim
document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah pengiriman form standar
    // Lakukan tindakan yang sesuai dengan pengiriman form di sini
    // Misalnya, validasi input atau pengiriman data ke server
    // Setelah selesai, bisa menyembunyikan modal dengan mengubah style.display menjadi "none"
    document.getElementById("myModal").style.display = "none";
});


