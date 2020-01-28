@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-2">
                <img src="{{ $user->img_url ?? 'https://ramcotubular.com/wp-content/uploads/default-avatar.jpg' }}" width="180px">
                <h3> {{ $user->username }}</h3>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
