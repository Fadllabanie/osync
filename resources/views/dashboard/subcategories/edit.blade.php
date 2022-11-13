@extends('layouts.admin')

@section('title',__('Subategories'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.subcategories.update :subcategory='$subcategory' />

    </div>
</div>

@endsection
