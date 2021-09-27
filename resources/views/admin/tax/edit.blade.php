@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="tax" route="tax" :model="$tax">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.tax.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.tax.scripts')
@endsection