@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="unit" route="unit">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Symbol</th>
                    <th>Base Unit</th>
                    <th>Operator Name</th>
                    <th>Operator Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $unit)
                <tr>
                    <td>{{$unit->id}}</td>
                    <td>{{$unit->code}}</td>
                    <td>{{$unit->name}}</td>
                    <td>{{$unit->symbol}}</td>
                    <td>{{$unit->baseunit}}</td>
                    <td>{{$unit->opname}}</td>
                    <td>{{$unit->opvalue}}</td>
                    <td>
                        <x-adminetic-action :model="$unit" route="unit" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.unit.scripts')
@endsection