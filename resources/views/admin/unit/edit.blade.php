@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="unit" route="unit" :model="$unit">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.unit.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.unit.scripts')
@endsection