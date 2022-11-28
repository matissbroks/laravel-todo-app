<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 *
 * @property int $id
 * @property string $title
 * @property boolean $is_done
 * @property string $created_at
 * @property string $updated_at
 */
class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';

    protected $fillable = [
        'title',
        'is_done',
    ];
}
