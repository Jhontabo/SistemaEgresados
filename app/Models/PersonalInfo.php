<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $table = 'personal_infos';

    protected $fillable = [
        'user_id',    // Agrega user_id al fillable
        'phone',
        'address',
        'birthdate',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
