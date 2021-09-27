<?php

namespace App\Repositories;

use App\Models\Admin\Unit;
use Illuminate\Support\Facades\Cache;
use App\Contracts\UnitRepositoryInterface;
use App\Http\Requests\UnitRequest;

class UnitRepository implements UnitRepositoryInterface
{
    // Unit Index
    public function indexUnit()
    {
        $units = config('coderz.caching', true)
            ? (Cache::has('units') ? Cache::get('units') : Cache::rememberForever('units', function () {
                return Unit::latest()->get();
            }))
            : Unit::latest()->get();
        return compact('units');
    }

    // Unit Create
    public function createUnit()
    {
        //
    }

    // Unit Store
    public function storeUnit(UnitRequest $request)
    {
        Unit::create($request->validated());
    }

    // Unit Show
    public function showUnit(Unit $unit)
    {
        return compact('unit');
    }

    // Unit Edit
    public function editUnit(Unit $unit)
    {
        return compact('unit');
    }

    // Unit Update
    public function updateUnit(UnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());
    }

    // Unit Destroy
    public function destroyUnit(Unit $unit)
    {
        $unit->delete();
    }
}
