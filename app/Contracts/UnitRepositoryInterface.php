<?php

namespace App\Contracts;

use App\Models\Admin\Unit;
use App\Http\Requests\UnitRequest;

interface UnitRepositoryInterface
{
    public function indexUnit();

    public function createUnit();

    public function storeUnit(UnitRequest $request);

    public function showUnit(Unit $Unit);

    public function editUnit(Unit $Unit);

    public function updateUnit(UnitRequest $request, Unit $Unit);

    public function destroyUnit(Unit $Unit);
}
