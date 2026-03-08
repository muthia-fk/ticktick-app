@extends('layouts.app')

@section('title','Tasks')

@section('content')
<h2>Daftar Task</h2>
<a href="{{ route('tasks.create') }}">+ Tambah Task</a>
<ul>
    @foreach($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong> - {{ $task->description }}
            <a href="{{ route('tasks.edit',$task->id) }}">Edit</a>
            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
