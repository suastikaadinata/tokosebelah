@extends('layout')

@section('title', 'Cara Melakukan Pembelian')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Cara Melakukan Pembelian</h1>
        <div class="tentang-container">
            <li>1. Login sebagai member, jika belum memiliki akun harus daftar terlebih dahulu dengan memilih tombol "Register".</li>
            <li>2. Membuka halaman barang yang akan dibeli.</li>
            <li>3. Memilih tombol "TAMBAHKAN KE TROLI" untuk menyimpan daftar belanja dalam troli belanja atau member juga bisa langsung ke halaman daftar belanja dengan memilih tombol "BELI SEKARANG".</li>
            <li>4. Member masuk ke halaman daftar belanja dengan memilih "troli belanja" dan memilih tombol "Lihat/Ubah Daftar Belanja" jika sebelumnya member telah menambahkan daftar belanja ke dalam troli belanja.</li>
            <li>5. Jika member memiliki voucher belanja, maka member dapat menggunakannya pada halaman daftar belanja dengan memilih tombol dropdown "Voucher Anda" untuk memilih voucher yang akan digunakan kemudian memilih tombol "Lanjutkan Pembayaran".</li>
            <li>6. Pada halaman data pengiriman, member diminta untuk mengisikan data alamat pengiriman barang kemudian memilih tombol "Selesai" jika telah selesai.</li>
            <li>7. Pada halaman detail pengiriman, member dapat mengedit data pengiriman yang sebelumnya telah dibuat dengan memilih tombol "Edit" dan jika tidak ada perubahan maka member dapat memilih tombol "Lanjutkan Pembayaran". Jika ternyata 
                total harga barang adalah Rp. 0 maka tombol "Lanjutkan Pembayaran" akan diganti dengan tombol "Pembayaran Selesai" dan jika tombol ini dipilih maka pembayaran barang telah selesai dan member tinggal menunggu 
                pembayaran di verifikasi oleh admin untuk mendapat invoice.
            </li>
            <li>8. Pada halaman pembayaran member dapat mengupload foto transaksi pembayaran dan setelah selesai member dapat menunggu sampai pembayaran di verifikasi oleh admin untuk mendapatkan invoice.</li>
        </div>
    </div>
@endsection