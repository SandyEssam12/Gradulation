<?php

namespace App\QueryBuilders;
namespace App\QueryBuilders\Favourites;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favourites;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class FavoriteIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Favourites::query()->with(['product']);
        $query = Favourites::query()->with(['user']);

        parent::__construct($query, $request);

        $this->allowedFilters([
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('product_id'),
            
        ]);
    }
}
