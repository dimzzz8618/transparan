@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white shadow p-6 rounded-xl">
    <h2 class="text-2xl font-bold text-center mb-4 text-pasundan">Hubungi Kami</h2>
    <p class="text-center mb-4">Ada pertanyaan? Kirim pesan kepada kami.</p>

    <form>
        <input type="text" placeholder="Nama" class="w-full border rounded p-2 mb-3">
        <input type="email" placeholder="Email" class="w-full border rounded p-2 mb-3">
        <textarea placeholder="Pesan" class="w-full border rounded p-2 mb-3"></textarea>
        <button class="bg-pasundan text-white w-full py-2 rounded-lg hover:bg-orange-600">
            Kirim Pesan
        </button>
    </form>
</div>
@endsection
