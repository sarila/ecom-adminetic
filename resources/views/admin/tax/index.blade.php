@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="tax" route="tax">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taxes as $tax)
                <tr>
                    <td>{{ $tax->id }}</td>
                    <td>{{ $tax->name }}</td>
                    <td>{{ $tax->type }}</td>
                    <td>{{ $tax->value }}</td>
                    <td>
                        <x-adminetic-action :model="$tax" route="tax" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.tax.scripts')
@endsection