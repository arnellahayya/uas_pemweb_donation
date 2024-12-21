@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Donasi</h2>
    <form action="{{ route('donasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul Donasi</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="target_amount">Target Donasi</label>
            <input type="number" name="target_amount" id="target_amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <select name="category" id="category" class="form-control">
                <option value="Banjir">Banjir</option>
                <option value="Gempa">Gempa</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection