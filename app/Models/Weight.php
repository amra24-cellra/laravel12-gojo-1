<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    // บรรทัดนี้คือตัวที่บอกให้อนุญาตบันทึกข้อมูลลงฐานข้อมูลได้ครับ
    protected $fillable = ['weight', 'recorded_date'];
}