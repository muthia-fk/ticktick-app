@extends('layouts.app')

@section('title','Edit Task')

@section('content')
<h2>Edit Task</h2>
<form method="POST" action="{{ route('tasks.update',$task->id) }}">
    @csrf @method('PUT')
    <label>Judul:</label><br>
    <input type="text" name="title" value="{{ $task->title }}" required><br><br>
    <label>Deskripsi:</label><br>
    <textarea name="description">{{ $task->description }}</textarea><br><br>
    <button type="submit">Update</button>
</form>
@endsection
