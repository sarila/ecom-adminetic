<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Contracts\BrandRepositoryInterface;

class BrandController extends Controller
{
    protected $brandRepositoryInterface;

    public function __construct(BrandRepositoryInterface $brandRepositoryInterface)
    {
        $this->brandRepositoryInterface = $brandRepositoryInterface;
        $this->authorizeResource(Brand::class, 'brand');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index', $this->brandRepositoryInterface->indexBrand());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $this->brandRepositoryInterface->storeBrand($request);
        return redirect(adminRedirectRoute('brand'))->withSuccess('Brand Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', $this->brandRepositoryInterface->showBrand($brand));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', $this->brandRepositoryInterface->editBrand($brand));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BrandRequest  $request
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $this->brandRepositoryInterface->updateBrand($request, $brand);
        return redirect(adminRedirectRoute('brand'))->withInfo('Brand Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $this->brandRepositoryInterface->destroyBrand($brand);
        return redirect(adminRedirectRoute('brand'))->withFail('Brand Deleted Successfully.');
    }
}
