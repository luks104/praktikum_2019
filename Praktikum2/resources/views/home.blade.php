@extends('layouts.app')
<div id="app">
        @include('layouts/alert')


        @yield('content')
</div>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a type="button" class="btn btn-primary" href="{{ url('create') }}">Ustvari nov obrazec</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
