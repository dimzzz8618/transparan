@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Penerbangan</h2>
    <form action="{{ route('flights.update', $flight) }}" method="POST">
        @csrf
        @method('PUT')
        @include('flights.form', ['flight' => $flight])
        <button class="btn btn-primary mt-3">Perbarui</button>
        <a href="/dashboard" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
