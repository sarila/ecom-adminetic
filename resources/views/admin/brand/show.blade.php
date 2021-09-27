@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-show-page name="brand" route="brand" :model="$brand">
        <x-slot name="content">
       
        </x-slot>
    </x-adminetic-show-page>

@endsection

@section('custom_js')
    @include('admin.layouts.modules.brand.scripts')
@endsection
