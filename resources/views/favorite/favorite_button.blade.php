@if (Auth::id() != $user->id)
    @if (Auth::user()->is_added_to_favorite($user->id))
        {!! Form::open(['route' => ['user.delete_from_favorite', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete_from_favorite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.add_to_favorite', $user->id]]) !!}
            {!! Form::submit('Add_to_favorite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif