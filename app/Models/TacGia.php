<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    use HasFactory;
    protected $table='tac_gia';
    public $incrementing = false;

    // public function books()
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'id');
    }
    public function sachs()
    {
        return $this->hasMany(Sach::class, 'tac_gia_id', 'id');
    }

    public function hinhAnh()
    {
        // return $this->belongsTo('App\Image');
        return $this->belongsTo(HinhAnh::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    /*
     * Image Accessor
     */
    public function getImageUrlAttribute($value)
    {
        return asset('/').'assets/img/'.$this->hinhAnh->url;
    }
    public function getDefaultImgAttribute($value)
    {
        return asset('/').'assets/img/'.'user-placeholder.png';
    }
}
