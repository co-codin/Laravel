@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Teams</div>

                <div class="card-body">
                    @if ($teams->count())
                        <ul class="list-group">
                            @foreach($teams as $team)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('teams.show', $team) }}">
                                        {{ $team->name }}
                                    </a>

                                    @if ($team->ownedByCurrentUser())
                                        <span class="badge badge-primary badge-pill">admin</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">Create a team</div>

                <div class="card-body">
                    <form action="{{ route('teams.store') }}" method="post">
                            @csrf

                           <div class="form-group">
                               <label for="name">Team name</label>
                               <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name">

                               @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                               @endif
                           </div>

                           <button type="submit" class="btn btn-primary">Create team</button>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
