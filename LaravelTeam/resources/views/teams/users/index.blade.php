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
                                        Menu
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Add a user</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
  </div>
@endsection
