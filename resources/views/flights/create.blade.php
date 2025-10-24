@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Penerbangan</h2>
    <form action="{{ route('flights.store') }}" method="POST">
        @csrf
        @include('flights.form')
        <button class="btn btn-success mt-3">Simpan</button>
        <a href="/dashboard" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
