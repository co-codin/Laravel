@extends('layouts.team')

@section('teamcontent')
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('teams.partials._nav')
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    Users
                </div>

                <div class="card-body">
                    @include('teams.subscriptions.partials._usage')

                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if ($team->ownedBy($user))
                                            <span class="badge badge-primary badge-pill">Admin</span>
                                        @else
                                            <span class="badge badge-primary badge-pill">Member</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->pivot->created_at }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="dropdown mr-1">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions</a>

                                                <div class="dropdown-menu">
                                                    @permission('delete users')
                                                        <a href="{{ route('teams.users.delete', [$team, $user]) }}" class="dropdown-item">
                                                            Delete
                                                        </a>
                                                    @endpermission
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @permission('add users', $team->id)
                <div class="card">
                    <div class="card-header">Add a user</div>

                    <div class="card-body">
                        @if ($team->hasReachedMemberLimit())
                            <p class="mb-0">
                                <a href="{{ route('teams.subscriptions.index', $team) }}">Upgrade</a> to add more members.
                            </p>
                        @elseif (!$team->hasReachedMemberLimit())
                            <p class="mb-0">
                                Please <a href="{{ route('teams.subscriptions.index', $team) }}">subscribe</a> to add users
                            </p>
                        @else
                            <form action="{{ route('teams.users.store', $team) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email">

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Add user</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endpermission
        </div>
  </div>
@endsection
