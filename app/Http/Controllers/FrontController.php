<?php
namespace App\Http\Controllers;

// alias pour Robot use App\Robot as Robot; pour le premier anti-slash dans le use vous pouvez l'omettre il est
// automatiquement ajouté dans le use
use App\Tag;
use App\Robot; 
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function index()
    {

        return view('front.home', [
            'robots' => Robot::published()->orderBy('published_at', 'DESC')->paginate(env('PAGINATE_FRONT', 5)),
            ]); 

    }

// le premier paramètre c'est id du robot et le deuxième c'est le slug facultatif
    public function showRobot($id, $slug=''){

        $robot =  Robot::findOrFail($id);

        return view('front.single', [
            'robot' =>$robot
            ]);
    }

    public function showRobotByCat($id, $slug = ''){

        $robots =  Category::findOrFail($id)
                            ->robots()
                            ->published()
                            ->orderBy('published_at', 'DESC')
                            ->paginate(env('PAGINATE_FRONT', 5));

        return view('front.category', ['robots' => $robots]);
}

    public function showRobotByTag($id){

        $tag = Tag::findOrFail($id);

        $robots =  $tag
                        ->robots()
                        ->published()
                        ->orderBy('published_at', 'DESC')
                        ->paginate(env('PAGINATE_FRONT', 5));

        return view('front.tag', [
            'name' => $tag->name,
            'robots' => $robots
            ]);
    }

    public function showContact(){
        return "contact";
    }

    public function showMentions(){
        return "mentions";
    }
}