@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="brand" route="brand">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.brand.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.brand.scripts')
@endsection