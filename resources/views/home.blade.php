@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
            <div class="d-grid gap-2">
                <a href='/produk' class="btn btn-outline-primary" type="button">View List Produk</a>
            </div>
          </div>
    </div>
</div>
@endsection
