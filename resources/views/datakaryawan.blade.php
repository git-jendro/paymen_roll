@extends('layouts.app')

@section('content')



<div class="container">
<div class="ml-5 mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('woi') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<style>

</style>