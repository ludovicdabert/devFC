<?php
namespace App\Http\Controllers;

// alias pour Robot use App\Robot as Robot; pour le premier anti-slash dans le use vous pouvez l'omettre il est
// automatiquement ajouté dans le use
use App\Robot; 
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function index()
    {

        return view('front.home', [
            'robots' => Robot::published()->orderBy('published_at', 'DESC')->paginate(5)
            ]); 

    }

// le premier paramètre c'est id du robot et le deuxième c'est le slug facultatif
    public function showRobot($id, $slug=''){

        // ici on utilise findOrFail pour retourner un robot en fonction de son id 
        // findOrFail lancera une exception de type  Illuminate\Database\Eloquent\ModelNotFoundException
        // si le modèle Robot ne trouve pas de robot pour cet identifiant.
        return Robot::findOrFail($id);
    }

    public function showRobotByCat($id, $slug = ''){

            return Category::findOrFail($id)->robots;
    }

    public function showContact(){
        return "contact";
    }

    public function showMentions(){
        return "mentions";
    }
}