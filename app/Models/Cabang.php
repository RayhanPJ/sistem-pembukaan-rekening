<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function updateStatus()
    {
        $csExists = User::where('cabang_id', $this->id)->where('role', 'cs')->exists();
        $supervisiExists = User::where('cabang_id', $this->id)->where('role', 'supervisi')->exists();

        if ($csExists && $supervisiExists) {
            $this->status = 'closed'; 
        } else {
            $this->status = 'open'; 
        }

        $this->save();
    }

}
