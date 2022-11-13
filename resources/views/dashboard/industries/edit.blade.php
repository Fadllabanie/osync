@extends('layouts.admin')

@section('title',__('Industries'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.industries.update :industry='$industry' />

    </div>
</div>

@endsection
