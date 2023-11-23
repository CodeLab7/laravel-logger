<?php

namespace Codelab7\LaravelLogger\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cl7Logger extends Model
{
    use HasFactory;
    protected $fillable = ['token', 'data', 'reff_id', 'entity', 'user_id', 'note'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
