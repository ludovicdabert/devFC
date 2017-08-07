<?php
use Illuminate\Database\Seeder;

class RobotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // supprimer tout ce qui se trouve dans le dossier images 
        // on récupère le nom de chaque fichier avec la méthode allFiles de la classe File
        $allFiles = File::allFiles(public_path('images'));

        foreach ($allFiles as $f) {
            File::delete($f); // supprime le fichier si il existe

        }

        // ici on doit utiliser le faker pour générer effectivement les robots
        factory(App\Robot::class, 30)->create()->each(function ($robot) {

            $indices = [];

            $max = rand(1, 5); // nombre d'éléments dans le tableau d'indice

            // algo permettant de créer un tableau aléatoire d'indices
            // tant que l'on n'a pas le nombre voulu de tags on continue
            while ( count($indices) != $max ) {
                $i = rand(1, $max);

                // si il est dans le tableau j'en choisi un autre
                while (in_array($i, $indices)) {
                    $i = rand(1, $max);
                }
                // si il n'est pas encore dans le tableau je le met dans $indices
                $indices[] = $i;
            }

            $robot->tags()->attach($indices);

            // File est une classe de Laravel elle va nous permettre d'enregistrer l'image dans un fichier
            $uri = str_random(12) . '.jpg';
            $file = file_get_contents('http://lorempicsum.com/futurama/500/500/' . rand(1, 9));
            File::put(
                public_path('images') . '/' . $uri,
                $file
            );

            // création d'un enregistrement dans la table pictures par rapport au robot actuel
            $robot->picture()->create([
                'title' => 'futurama',
                'link' => $uri,
                'size' => filesize( public_path('images') . '/' . $uri )
            ]);
        });
    }
}
