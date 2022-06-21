<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['name', 'address', 'image', 'phone', 'birthday'];
    public $timestamps = true;
    public function age()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }
}
