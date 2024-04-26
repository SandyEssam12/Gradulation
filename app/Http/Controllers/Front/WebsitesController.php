<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Websites;
use App\Http\Requests\StoreWebsitesRequest;
use App\Http\Requests\UpdateWebsitesRequest;
use App\QueryBuilders\Websites\WebsiteIndexQuery;
use App\Http\Resources\WebsiteResource;

class WebsitesController extends Controller
{
    // Display a listing of the resource.
   
   
        public function index(Request $request)
        {
            $queryBuilder = new WebsiteIndexQuery($request);
    
            $websites = $queryBuilder->paginate();
    
            return response()->api([
                'website' =>  new WebsiteResource($websites),
            ]);
        }
    
    
    // Show the form for creating a new resource.
    public function create()
    {
        // Assuming you have a form for creating websites
    }

    // Store a newly created resource in storage.
    public function store(StoreWebsitesRequest $request)
    {
        // Assuming you have validation rules for website_name, URL, and product_id
        $validatedData = $request->validated();
        $website = Websites::create($validatedData);
        return response()->api([
            'website' =>  new WebsiteResource($website),
        ]);
    }

    // Display the specified resource.
    public function show(Websites $website)
    {
        return response()->api([
            'website' =>  new WebsiteResource($website),
        ]);
    }

    // Show the form for editing the specified resource.
    public function edit(Websites $website)
    {
        // Assuming you have a form for editing websites
    }

    // Update the specified resource in storage.
    public function update(UpdateWebsitesRequest $request, Websites $website)
    {
        $validatedData = $request->validated();
        $website->update($validatedData);
        return response()->api([
            'website' =>  new WebsiteResource($website),
        ]);
    }

    // Remove the specified resource from storage.
    public function destroy(Websites $website)
    {
        
        $website->delete();
        return response()->api();
    }
}
