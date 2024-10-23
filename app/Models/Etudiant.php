<?php

namespace App\Models;
use App\Models\Classe;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable= ['nom','prenom','addresse','dateNaissance','idclasse'];
    public $timestamps= false; //pour desactiver timestamps  
    protected $primaryKey='codeE';//pour identifier primary key

    public function classe(){
        return $this-> belongsTo(Classe::class, 'idclasse');
    }

    public function formations(){
        return $this->belongsToMany(Formation::class ,'avis','idE','idF')->withPivot('points');
    }
}
