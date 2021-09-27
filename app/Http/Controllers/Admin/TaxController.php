<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tax;
use Illuminate\Http\Request;
use App\Http\Requests\TaxRequest;
use App\Http\Controllers\Controller;
use App\Contracts\TaxRepositoryInterface;

class TaxController extends Controller
{
    protected $taxRepositoryInterface;

    public function __construct(TaxRepositoryInterface $taxRepositoryInterface)
    {
        $this->taxRepositoryInterface = $taxRepositoryInterface;
        $this->authorizeResource(Tax::class, 'tax');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tax.index', $this->taxRepositoryInterface->indexTax());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tax.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRequest $request)
    {
        $this->taxRepositoryInterface->storeTax($request);
        return redirect(adminRedirectRoute('tax'))->withSuccess('Tax Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        return view('admin.tax.show', $this->taxRepositoryInterface->showTax($tax));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        return view('admin.tax.edit', $this->taxRepositoryInterface->editTax($tax));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaxRequest  $request
     * @param  \App\Models\Admin\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(TaxRequest $request, Tax $tax)
    {
        $this->taxRepositoryInterface->updateTax($request, $tax);
        return redirect(adminRedirectRoute('tax'))->withInfo('Tax Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        $this->taxRepositoryInterface->destroyTax($tax);
        return redirect(adminRedirectRoute('tax'))->withFail('Tax Deleted Successfully.');
    }
}
