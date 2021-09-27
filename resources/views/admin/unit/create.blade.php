@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="unit" route="unit">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.unit.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.unit.scripts')
@endsection