@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="category" route="category">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Priority</th>
                    <th>Parent Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->priority}}</td>
                    @if($category->parent_id == 0)
                        <td>Main Category</td>
                    @else
                        <td>{{$category->parentCategory->name}}</td>
                    @endif
                    <td>{{$category->status}}</td>
                    <td><img src="{{ asset('storage/'. $category->image)}}" width="40px"></td>
                    <td>
                        <x-adminetic-action :model="$category" route="category" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Priority</th>
                    <th>Parent Id</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.category.scripts')
@endsection