@extends('layouts.admin')

@section('title',__('Profiles'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        @livewire('dashboard.profiles.store')
    </div>
</div>

@endsection
