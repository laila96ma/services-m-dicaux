<?php

namespace App\Models;

use App\Models\patient;
use App\Models\incidents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dossiersMedicaux extends Model
{
    use HasFactory;
    protected $table = 'dossier_médicaux';
    protected $primaryKey = 'id';
    protected $fillable = ['antécédents_médicaux', 'allergies','médicament','maladie','analyse','repos','nbr_repos','patientID'];
   
    public function patient()
    {
        return $this->belongsTo(patient::class, 'patientID'); 
    }

}

