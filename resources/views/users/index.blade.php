@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste</div>
                    <div class="card-body">
                        @foreach($users as $user)
                            <a href="{{ route('users.show', ['userId' => $user->id]) }}">{{ $user->username }}</a><br>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
