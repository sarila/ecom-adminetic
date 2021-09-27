<?php

namespace App\Repositories;

use App\Models\Admin\Tax;
use Illuminate\Support\Facades\Cache;
use App\Contracts\TaxRepositoryInterface;
use App\Http\Requests\TaxRequest;

class TaxRepository implements TaxRepositoryInterface
{
    // Tax Index
    public function indexTax()
    {
        $taxes = config('coderz.caching', true)
            ? (Cache::has('taxes') ? Cache::get('taxes') : Cache::rememberForever('taxes', function () {
                return Tax::latest()->get();
            }))
            : Tax::latest()->get();
        return compact('taxes');
    }

    // Tax Create
    public function createTax()
    {
        //
    }

    // Tax Store
    public function storeTax(TaxRequest $request)
    {
        Tax::create($request->validated());
    }

    // Tax Show
    public function showTax(Tax $tax)
    {
        return compact('tax');
    }

    // Tax Edit
    public function editTax(Tax $tax)
    {
        return compact('tax');
    }

    // Tax Update
    public function updateTax(TaxRequest $request, Tax $tax)
    {
        $tax->update($request->validated());
    }

    // Tax Destroy
    public function destroyTax(Tax $tax)
    {
        $tax->delete();
    }
}
