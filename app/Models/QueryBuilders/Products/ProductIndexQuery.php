<?php

namespace App\QueryBuilders;
namespace App\QueryBuilders\Products;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class ProductIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Product::query()->with(['favourites']); 
        $query = Product::query()->with(['Recent']); 
        $query = Product::query()->with(['websites']); 

        parent::__construct($query, $request);

        $this->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::partial('name'),
            AllowedFilter::exact('price'),
            AllowedFilter::partial('url'),
            AllowedFilter::partial('images'),
            AllowedFilter::partial('average_rating'),
            AllowedFilter::partial('total_reviews'),
            AllowedFilter::partial('short_description'),
            AllowedFilter::partial('seller_name'),
            AllowedFilter::exact('brand_id'),
            AllowedFilter::exact('category_id'),
            AllowedFilter::exact('website_id'),
            
        ]);
    }
}
