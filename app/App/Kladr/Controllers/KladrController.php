<?php

namespace App\Kladr\Controllers;

use App\Kladr\Actions\GetCitiesAction;
use App\Kladr\Actions\GetRegionsAction;
use App\Kladr\Actions\GetStreetsAction;
use App\Kladr\Actions\GetUsedCitiesAction;
use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\Kladr\Models\Kladr;
use Domain\Kladr\Models\Street;
use Illuminate\Http\Request;
use Support\Controller;

class KladrController extends Controller
{
    public function cities(Request $request, GetCitiesAction $action)
    {
        return $action->run($request->q, $request->input('region', '__'));
    }

    public function usedCities(Request $request, GetUsedCitiesAction $action)
    {
        return $action->run($request->q);
    }

    public function city(string $code)
    {
        return Kladr::where('name', $code)
            ->orWhere('code', $code)
            ->select(['code as id', 'name as title'])
            ->first();
    }


    public function regions(Request $request, GetRegionsAction $action)
    {
       return $action->run($request->input('q', ''));
    }

    public function region(string $code)
    {
        return Kladr::where('name', $code)
            ->orWhere('code', $code)
            ->select(['code as id', 'name as title'])
            ->first();
    }


    public function streets(Request $request, GetStreetsAction $action)
    {
        return $action->run($request->input('q', ''));
    }

    public function street(string $code)
    {
        return Street::where('name', $code)
            ->orWhere('code', $code)
            ->select(['code as id', 'name as title'])
            ->first();
    }

    public function schools(string $code)
    {
        return School::where('local', $code)
            ->select(['id', 'short_title as title'])->get();
    }

    public function classes(string $code)
    {
        return SchoolClass::where('school_id', $code)
            ->select(['id', 'number', 'letter', 'year'])->get();
    }

}
