<?php

namespace App\QueryBuilders\Websites;

use App\Models\Websites;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class WebsiteIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Websites::query()->with(['product']);

        parent::__construct($query, $request);

        $this->allowedFilters([
            AllowedFilter::partial('website_name'),
            AllowedFilter::partial('url'),
            AllowedFilter::partial('icon'),
           
        ]);
    }
}
