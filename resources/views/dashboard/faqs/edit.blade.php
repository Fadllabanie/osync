@extends('layouts.admin')

@section('title',__('FAQs'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.faqs.update :faq='$faq' />

    </div>
</div>

@endsection
