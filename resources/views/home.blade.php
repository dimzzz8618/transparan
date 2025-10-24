@extends('layouts.app')

@section(section: 'content')
<section class="hero">
    <h2>Selamat Datang di Pasundan Airlines</h2>
    <p>Temukan penerbangan terbaik dengan harga terjangkau ke seluruh Indonesia!</p>
    <a href="/search" class="btn">Cari Tiket Sekarang</a>

    @auth
    <a href="/admin" class="btn btn-admin" style="margin-left: 10px; background-color: #ff8800; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
        ✈️ Halaman Admin
    </a>
    @endauth

</section>

<section>
    <h3>Kenapa Memilih Kami?</h3>
    <div class="card-container">
        <div class="card">
            <h4>Pelayanan Cepat</h4>
            <p>Respon cepat dan pelayanan terbaik untuk setiap pelanggan.</p>
        </div>
        <div class="card">
            <h4>Harga Terjangkau</h4>
            <p>Tiket pesawat bersahabat tanpa mengorbankan kenyamanan.</p>
        </div>
        <div class="card">
            <h4>Jangkauan Luas</h4>
            <p>Terbang ke berbagai kota besar di seluruh Indonesia.</p>
        </div>
    </div>
</section>
@endsection
