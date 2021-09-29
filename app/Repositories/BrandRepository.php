<?php

namespace App\Repositories;

use App\Models\Admin\Brand;
use Illuminate\Support\Facades\Cache;
use App\Contracts\BrandRepositoryInterface;
use App\Http\Requests\BrandRequest;
use Intervention\Image\Facades\Image;


class BrandRepository implements BrandRepositoryInterface
{
    // Brand Index
    public function indexBrand()
    {
        $brands = config('coderz.caching', true)
            ? (Cache::has('brands') ? Cache::get('brands') : Cache::rememberForever('brands', function () {
                return Brand::latest()->get();
            }))
            : Brand::latest()->get();
        return compact('brands');
    }

    // Brand Create
    public function createBrand()
    {
        //
    }

    // Brand Store
    public function storeBrand(BrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        $request->image ? $this->uploadImage($brand) : '';
    }

    // Brand Show
    public function showBrand(Brand $brand)
    {
        return compact('brand');
    }

    // Brand Edit
    public function editBrand(Brand $brand)
    {
        return compact('brand');
    }

    // Brand Update
    public function updateBrand(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        $request->image ? $this->uploadImage($brand) : '';
    }

    // Brand Destroy
    public function destroyBrand(Brand $brand)
    {
        $brand->delete();
    }

    //For updating image
    protected function uploadImage(Brand $brand)
    {
        if (request()->image) {
            $brand->update([
                'image' => request()->image->store('admin/brand/image', 'public')
            ]);
            $image = Image::make(request()->file('image')->getRealPath());
            $image->save(public_path('storage/' . $brand->image));
        }
    }
}
