@extends('layouts.admin')

@section('title',__('Cards'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.cards.update :card='$card' />

    </div>
</div>

@endsection
