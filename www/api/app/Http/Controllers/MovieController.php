<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Movie;
use App\OMDB;

class MovieController extends BaseController
{
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

    public function getOne(Request $request, $movie_id)
	{
		$movie = Movie::find($movie_id);

		return response()->json($movie);
    }

    public function search(Request $request, $name, OMDB $omdb)
    {

        // remove % from the search string
        $name = str_replace("%", "", $name);

        // get the movies from the local database
        $movies = Movie::where('name', 'LIKE', "%$name%")->get();

        if($movies->isEmpty()){

            // query the api, if it finds a movie, insert into database and return the movie
            // else return the error and handle it on the frontend

            $movie = $omdb->queryAPI($name);
            
            if(isset($movie['Error'])){

                return response()->json(['error' => true]);

            }else{

                // insert the new movie into the database
                $new_movie = new Movie;
                $new_movie->name = $movie['Title'];
                $new_movie->description = $movie['Plot'];
                $new_movie->save();

                return response()->json([$new_movie]);

            }

        }else{

            return response()->json($movies);
        }

    }
    
}
