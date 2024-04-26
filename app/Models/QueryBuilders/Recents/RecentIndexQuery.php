<?php

namespace App\QueryBuilders;

use App\Models\Recent;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RecentIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Recent::query()->with(['product']);
        $query = Recent::query()->with(['user']);

        parent::__construct($query, $request);

        $this->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('product_id'),
            AllowedFilter::partial('view_date'),
            AllowedFilter::partial('last_viewed_at'),
            
        ]);
    }
}
