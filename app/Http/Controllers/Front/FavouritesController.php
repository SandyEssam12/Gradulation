<?php

namespace App\Http\Controllers\Api\Front;

use App\Models\Favourites;
use App\Http\Requests\StoreFavouritesRequest;
use App\Http\Requests\UpdateFavouritesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\QueryBuilders\Favourites\FavoriteIndexQuery;
use App\Http\Resources\FavouriteResource;

class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $queryBuilder = new FavoriteIndexQuery($request);

        // Get the filtered and paginated results
        $favorites = $queryBuilder->paginate();

        return response()->api([
            'favourite' =>  new FavouriteResource($favorites),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavouritesRequest $request)
    {
        $validatedData = $request->validated();

        $favourite = Favourites::create($validatedData);
        return response()->api([
            'favourite' =>  new FavouriteResource($favourite),
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Favourites $favourite)
    {
        
        return response()->api([
            'favourite' =>  new FavouriteResource($favourite),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavouritesRequest $request, Favourites $favourite)
    {
        $validatedData = $request->validated();
        $favourite->update($validatedData);

        return response()->api([
            'favourite' =>  new FavouriteResource($favourite),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favourites $favourite)
    {
        $favourite->delete();
        return response()->api();
    }
}
