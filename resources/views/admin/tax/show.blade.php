@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-show-page name="tax" route="tax" :model="$tax">
        <x-slot name="content">
       
        </x-slot>
    </x-adminetic-show-page>

@endsection

@section('custom_js')
    @include('admin.layouts.modules.tax.scripts')
@endsection
