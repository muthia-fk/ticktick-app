<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Override nama tabel agar sesuai dengan migration
    protected $table = 'my_tasks';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'title',
        'description',
    ];
}