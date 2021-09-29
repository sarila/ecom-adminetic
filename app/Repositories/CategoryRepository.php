<?php

namespace App\Repositories;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Cache;
use App\Contracts\CategoryRepositoryInterface;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryRequest;

class CategoryRepository implements CategoryRepositoryInterface
{
    // Category Index
    public function indexCategory()
    {
        $categories = config('coderz.caching', true)
            ? (Cache::has('categories') ? Cache::get('categories') : Cache::rememberForever('categories', function () {
                return Category::latest()->get();
            }))
            : Category::latest()->get();
        return compact('categories');
    }

    // Category Create
    public function createCategory()
    {
        $main_categories = Category::where('parent_id', 0)->get(['name', 'id']);
        return compact('main_categories');
    }

    // Category Store
    public function storeCategory(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $request->image ? $this->uploadImage($category) : '';
    }

    // Category Show
    public function showCategory(Category $category)
    {
        return compact('category');
    }

    // Category Edit
    public function editCategory(Category $category)
    {
        $main_categories = Category::where('parent_id', 0)->get(['name', 'id']);
        return compact('category', 'main_categories');
    }

    // Category Update
    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        $request->image ? $this->uploadImage($category) : '';
    }

    // Category Destroy
    public function destroyCategory(Category $category)
    {
        $category->delete();
    }

    //For updating image
    protected function uploadImage(Category $category)
    {
        if (request()->image) {
            $category->update([
                'image' => request()->image->store('admin/category/image', 'public')
            ]);
            $image = Image::make(request()->file('image')->getRealPath());
            $image->save(public_path('storage/' . $category->image));
        }
    }
}
