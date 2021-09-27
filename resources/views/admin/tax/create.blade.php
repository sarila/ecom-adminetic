@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="tax" route="tax">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.tax.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.tax.scripts')
@endsection