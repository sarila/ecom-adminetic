<?php

namespace App\Contracts;

use App\Models\Admin\Tax;
use App\Http\Requests\TaxRequest;

interface TaxRepositoryInterface
{
    public function indexTax();

    public function createTax();

    public function storeTax(TaxRequest $request);

    public function showTax(Tax $Tax);

    public function editTax(Tax $Tax);

    public function updateTax(TaxRequest $request, Tax $Tax);

    public function destroyTax(Tax $Tax);
}
