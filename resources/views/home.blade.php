@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-2">
                <img src="{{ auth()->user()->img_url ?? 'https://ramcotubular.com/wp-content/uploads/default-avatar.jpg' }}" width="180px">
                <h3> {{ auth()->user()->username }}</h3>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <form method="post">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
