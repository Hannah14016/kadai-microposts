<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
                <div class="row"><div class="col-xs-6 col-sm-1">
                    @if (Auth::id() == $micropost->user_id)
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div class="col-xs-6 col-sm-1">
                    @if (Auth::user()->is_added_to_favorite($micropost->id))
                            {!! Form::open(['route' => ['user.delete_from_favorite', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Unfavorite', ['class' => 'btn btn-warning btn-xs']) !!}
                            {!! Form::close() !!}
                    @else    
                            {!! Form::open(['route' => ['user.add_to_favorite', $micropost->id]]) !!}
                                {!! Form::submit('Favorite', ['class' => 'btn btn-success btn-xs']) !!}
                            {!! Form::close() !!}
                    @endif
                </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}