<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // hasOne relation one-to-one
    public function picture()
    {
        return $this->hasOne(Picture::class);
    }

    // on ajoute de la logique sur les requêtes SQL 
    // ne pas oublier de mettre $query qui va permettre de chaîner les requêtes dans le modèle
    public function scopePublished($query)
    {
        return $query->where('status', '=', 'published');
    }

    // on peut créer un scope avec paramètre(s)
    public function scopeStatus($query, $status)
    {
        if (in_array($status, ['published', 'unpublished', 'draft']))
            return $query->where('status', '=', $status);
        else {
            // on peut par exemple ajouter une exception attention à bien namespacé celle-ci
            throw new \Exception(sprintf('statut inconnu %s', $status));
        }
    }

}
