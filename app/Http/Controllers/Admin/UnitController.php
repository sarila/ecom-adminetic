<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\Http\Controllers\Controller;
use App\Contracts\UnitRepositoryInterface;

class UnitController extends Controller
{
    protected $unitRepositoryInterface;

    public function __construct(UnitRepositoryInterface $unitRepositoryInterface)
    {
        $this->unitRepositoryInterface = $unitRepositoryInterface;
        $this->authorizeResource(Unit::class, 'unit');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.unit.index', $this->unitRepositoryInterface->indexUnit());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $this->unitRepositoryInterface->storeUnit($request);
        return redirect(adminRedirectRoute('unit'))->withSuccess('Unit Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('admin.unit.show', $this->unitRepositoryInterface->showUnit($unit));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('admin.unit.edit', $this->unitRepositoryInterface->editUnit($unit));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UnitRequest  $request
     * @param  \App\Models\Admin\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        $this->unitRepositoryInterface->updateUnit($request, $unit);
        return redirect(adminRedirectRoute('unit'))->withInfo('Unit Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $this->unitRepositoryInterface->destroyUnit($unit);
        return redirect(adminRedirectRoute('unit'))->withFail('Unit Deleted Successfully.');
    }
}
