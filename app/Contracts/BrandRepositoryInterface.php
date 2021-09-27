<?php

namespace App\Contracts;

use App\Models\Admin\Brand;
use App\Http\Requests\BrandRequest;

interface BrandRepositoryInterface
{
    public function indexBrand();

    public function createBrand();

    public function storeBrand(BrandRequest $request);

    public function showBrand(Brand $Brand);

    public function editBrand(Brand $Brand);

    public function updateBrand(BrandRequest $request, Brand $Brand);

    public function destroyBrand(Brand $Brand);
}
