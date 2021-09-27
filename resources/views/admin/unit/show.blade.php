@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-show-page name="unit" route="unit" :model="$unit">
        <x-slot name="content">
       
        </x-slot>
    </x-adminetic-show-page>

@endsection

@section('custom_js')
    @include('admin.layouts.modules.unit.scripts')
@endsection
