@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste</div>
                    <div class="card-body">
                        @if($users->count())
                            @foreach($users as $user)
                                <div class="col-2 profile-box border p-1 rounded text-center bg-light mr-4 mt-3">
                                    <img
                                        src="{{ $user->img_url ?? 'https://ramcotubular.com/wp-content/uploads/default-avatar.jpg' }}"
                                        class="w-100 mb-1">
                                    <h5 class="m-0"><a
                                            href="{{ route('users.show', $user->id) }}"><strong>{{ $user->name }}</strong></a>
                                    </h5>
                                    <p class="mb-2">
                                        <small>Following: <span class="badge badge-primary">0</span></small>
                                        <small>Followers: <span class="badge badge-primary tl-follower">0</span></small>
                                    </p>
                                    <form method="post">
                                        <button type="button" class="btn btn-info btn-sm action-follow" data-id = {{ $user->id }} >
                                            <strong>
                                                Follow
                                            </strong>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script>
                            $(document).on('click', '.action-follow', function () {
                                const userId = $(this).data('id');
                                const authId = "{{ auth()->user()->id }}";
                                if(authId === userId)
                                {
                                    alert('Kendinizi takip edemezsiniz');

                                }else {
                                    $.post('users/' + userId + '/follow', {
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    }).done(function () {
                                        alert('İşlem Başarılı');
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



