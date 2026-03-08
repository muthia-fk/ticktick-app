@extends('layouts.app')

@section('title','Tambah Task')

@section('content')
<h2>Tambah Task</h2>
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <label>Judul:</label><br>
    <input type="text" name="title" required><br><br>
    <label>Deskripsi:</label><br>
    <textarea name="description"></textarea><br><br>
    <button type="submit">Simpan</button>
</form>
@endsection
