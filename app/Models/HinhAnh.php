<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
    protected $table='hinh_anh';
    protected $guarded = [];
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'id');
    }
}
