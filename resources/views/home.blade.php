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
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="nav-home" aria-selected="true">Followers <span class="badge badge-primary">{{ auth()->user()->followers()->get()->count() }}</span></a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#following" role="tab" aria-controls="nav-profile" aria-selected="false">Following <span class="badge badge-primary">{{ auth()->user()->followings()->get()->count() }}</span></a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row pl-5">
                                    @include('users.index', ['users'=>auth()->user()->followers()->get()])
                                </div>
                            </div>
                            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row pl-5">
                                    @include('users.index', ['users'=>auth()->user()->followings()->get()])

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
