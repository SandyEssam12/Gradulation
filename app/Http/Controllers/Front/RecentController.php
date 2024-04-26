<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recent; 
use App\QueryBuilders\RecentIndexQuery;
use App\Http\Requests\StoreRecentRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\RecentResource;


class RecentController extends Controller
{
    public function index(Request $request)
    {
        $queryBuilder = new RecentIndexQuery($request);

        $recents = $queryBuilder->paginate();

        return response()->api([
            'recent' => new RecentResource($recents),
        ]);
    }

    public function store(StoreRecentRequest $request)
    {
        $validatedData = $request->validated();
        $recent = Recent::create($validatedData);
        
        return response()->api([
            'recent' => new RecentResource($recent),
        ]);
    }
   
    public function show(Recent $recentProduct) 
    {
        return response()->api([
            'Rrecent' =>  new RecentResource($recentProduct),
        ]);
    }

    public function update(StoreRecentRequest $request, Recent $recentProduct) 
    {
        $validatedData = $request->validated();
        $recentProduct->update($validatedData);
        return response()->api([
            'recent' => new RecentResource($recentProduct),
        ]);
    }


    public function destroy(Recent $recentProduct) 
    {
        // Logic to delete recent product
        $recentProduct->delete();
        return response()->api(null,204);
    }
}
