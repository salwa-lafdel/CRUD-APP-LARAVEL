<?php

namespace App\Models;
use App\Models\Formation;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable=['libelle','idformation','NombreMax'];
    public $timestamps= false; //pour desactiver timestamps  
    protected $primaryKey='idc';//pour identifier primary key
    //dans une classe il y a une seule formation
    public function formation(){
       return $this->belongsTo(Formation::class, 'idformation');
    }
    //une classe contient plusieurs etudiants
    public function etudiants(){
        return $this->hasMany(Etudiant::class , 'idclasse');

    }
}
