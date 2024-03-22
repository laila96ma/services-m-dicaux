<?php

namespace App\Models;

use App\Models\dossiersMedicaux;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    protected $primaryKey = 'id';
    protected $fillable = ['matricule', 'nom', 'date_naissance','cin','poste','service','motif'];
    public function dossierMedicaux()
{
    return $this->hasMany(dossiersMedicaux::class, 'patientID');
}

    public function RDV()
    {
        return $this->hasMany(RDV::class, 'patientID');
    }
}
