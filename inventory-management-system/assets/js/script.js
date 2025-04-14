// script.js

// Fungsi untuk menampilkan pesan konfirmasi saat menghapus item
function confirmDelete() {
    return confirm("Apakah Anda yakin ingin menghapus item ini?");
}

// Fungsi untuk memvalidasi input pada formulir tambah/edit item
document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");

    forms.forEach((form) => {
        form.addEventListener("submit", function (event) {
            // Validasi nama tidak boleh kosong
            const nameInput = form.querySelector('input[name="name"]');
            if (!nameInput.value.trim()) {
                alert("Nama item tidak boleh kosong!");
                event.preventDefault(); // Mencegah pengiriman formulir
                return;
            }

            // Validasi jumlah stok harus lebih besar dari 0
            const quantityInput = form.querySelector('input[name="quantity"]');
            if (parseInt(quantityInput.value) <= 0) {
                alert("Jumlah stok harus lebih besar dari 0!");
                event.preventDefault();
                return;
            }

            // Validasi harga harus lebih besar dari 0
            const priceInput = form.querySelector('input[name="price"]');
            if (parseFloat(priceInput.value) <= 0) {
                alert("Harga harus lebih besar dari 0!");
                event.preventDefault();
                return;
            }
        });
    });
});

// Animasi sederhana untuk tombol
const buttons = document.querySelectorAll(".btn");
buttons.forEach((button) => {
    button.addEventListener("mouseenter", function () {
        button.style.transform = "scale(1.1)";
    });

    button.addEventListener("mouseleave", function () {
        button.style.transform = "scale(1)";
    });
});