<?php

namespace App\Models;
use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable= ['titre','nbrHeure'];
    public $timestamps= false; //pour desactiver timestamps  
    protected $primaryKey='idf';//pour identifier primary key

    //une formation peut etre faite dans plusieurs classes
    public function classes(){
        return $this->hasMany(Classe::class, 'idformation');
    }

    public function etudiants(){
        return $this->belongsToMany(Etudiant::class ,'avis','idF','idE')->withPivot('points');
    }

}
