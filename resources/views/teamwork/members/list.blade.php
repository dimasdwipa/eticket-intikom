@extends('layouts.app',['page' => 'Tenant', 'pageSlug' => 'Tenant', 'section' => 'Tenant'])
@section('content')
    <div class="row">
        <div class="col-md-12 px-4">
            <div class="card">
                <div class="card-heder">
                    <div class="row">
                        <div class="col-sm">
                            <h4 class="card-title px-4 pt-4">Members of tenant "{{$team->name}}"</h4>
                        </div>
                        <div class="col-sm text-right px-4 pt-4">
                            @if (Auth::user()->role="administrator")
                                <a href="{{route('teams.index')}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach($team->users AS $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td class="text-right">
                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            @if(auth()->user()->getKey() !== $user->getKey())
                                                <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button class="btn btn-sm btn-warning m-0 px-3 Other" type="submit">Delete</button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Padding Invetesion</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                    <table class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                        <thead>
                        <tr>
                            <th>E-Mail</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($team->invites AS $invite)
                            <tr>
                                <td>{{$invite->email}}</td>
                                <td class="text-right">
                                    <a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-sm btn-warning m-0 p-1 Other">
                                        Re-Send Mail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Invite to tenant "{{$team->name}}"</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group input-group-static mb-4">
                                <label class="control-label">E-Mail Address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="User mail">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="" style="text-align: right">
                                <button type="submit"  class="btn btn-sm btn-warning m-0 p-1 Other" style="width: 10rem">
                                    <i class="tim-icons icon-send text-white"></i> Invite to tenant
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.tableku').DataTable();
        });
    </script>
@endpush
