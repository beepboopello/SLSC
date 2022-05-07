@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notice') }}</div>

                <div class="card-body">
                    {{ __($msg) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection