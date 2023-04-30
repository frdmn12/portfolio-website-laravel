<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $table = "education";
    protected $fillable = ['nama', 'jurusan', 'start_date', 'end_date', 'desc'];

    protected $appends = ['start_date_ind', 'end_date_ind'];
    public function getStartDateIndAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('j F Y');
    }
    public function getEndDateIndAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->translatedFormat('j F Y');
    }

}
