<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RDV extends Model
{
    use HasFactory;
    protected $table = 'rendez-vous';
    protected $primaryKey = 'id';
    protected $fillable = ['num','date_RDV', 'type_RDV','patientID'];
    public function patient()
    {
        return $this->belongsTo(patient::class, 'patientID'); 
    }

}



