@extends('layouts.app',['page' => 'List of tenants', 'pageSlug' => 'werehouse', 'section' => 'setting'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h4 class="card-title">My Tenants</h4>
                    </div>
                    <div class="col-sm text-right" >
                        @if (Auth::user()->role=="administrator")
                            <a class="btn btn-sm btn-primary" href="{{route('teams.create')}}">
                                New Tenant
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
                                <th>Code</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->code}}</td>
                                    <td>{{$team->name}}</td>
                                    <td>
                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            <span class="label label-success">Owner</span>
                                        @else
                                            <span class="label label-primary">Member</span>
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">
                                        <div class="btn-group btn-group-sm" role="group">

                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            <a href="{{route('teams.members.show', $team)}}" type="button" class="btn btn-sm btn-primary m-0 p-1 Other"  style="width: 5rem">
                                                View
                                            </a>
                                        @endif

                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            <a href="{{route('teams.edit', $team)}}" type="button" class="btn btn-sm btn-warning m-0 p-1 Other" style="width: 5rem">
                                                Edit
                                            </a>
                                            <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post" class="btn btn-sm btn-danger  m-0 p-0 Other" style="width: 5rem">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button  type="submit" class="btn btn-sm btn-danger m-0 py-1 px-3 Other" >
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">Request Tenant</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('teams.request')}}" autocomplete="off">
                            @csrf

                            <div class="row">
                                <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Tenant Name</label>
                                        <select class="form-control form-control-sm select2" name="teams" required>
                                            <option></option>
                                            @foreach ($allteams as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <div class="col-md-12">
        <div class="card  mt-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h4 class="card-title">Pending Request From Agent</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                        <thead>
                            <tr>
                                <th>Name Requestor</th>
                                <th>Code</th>
                                <th>Name Tenant</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Admin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requestteams as $valueteam)
                              @if(auth()->user()->isOwnerOfTeam($valueteam->team)||$valueteam->user_id==Auth::id())
                                <tr>
                                    <td>{{$valueteam->user->name}}</td>
                                    <td>{{$valueteam->team->code??$valueteam->id}}</td>
                                    <td>{{$valueteam->team->name??''}}</td>
                                    <td>{{$valueteam->status}}</td>
                                    <td>{{$valueteam->user->role}}</td>
                                    <td>{{$valueteam->team->ownernya->name??''}}</td>
                                    

                                    {{-- <td>
                                        @if(auth()->user()->isOwnerOfTeam($valueteam))
                                            <span class="label label-success">Owner</span>
                                        @else
                                            <span class="label label-primary">Member</span>
                                        @endif
                                    </td> --}}
                                    <td class="td-actions text-right">
                                        <div class="btn-group btn-group-sm" role="group">
                                        
                                        @if(auth()->user()->isOwnerOfTeam($valueteam->team)&&$valueteam->status=="pending")
                                             <form style="display: inline-block;" action="{{route('teams.request.aprove')}}" method="post" class="btn btn-sm btn-success  m-0 p-0 Other" style="width: 5rem">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="user_id" value="{{$valueteam->user_id}}" />
                                                <input type="hidden" name="team_id" value="{{$valueteam->team_id}}" />
                                                <input type="hidden" name="id" value="{{$valueteam->id}}" />
                                                <button  type="submit" class="btn btn-sm btn-success m-0 py-1 px-3 Other" >
                                                    Aprove
                                                </button>
                                            </form>
                                            <form style="display: inline-block;" action="{{route('teams.request.reject')}}" method="post" class="btn btn-sm btn-danger  m-0 p-0 Other" style="width: 5rem">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="user_id" value="{{$valueteam->user_id}}" />
                                                <input type="hidden" name="team_id" value="{{$valueteam->team_id}}" />
                                                <input type="hidden" name="id" value="{{$valueteam->id}}" />
                                                <button  type="submit" class="btn btn-sm btn-danger m-0 py-1 px-3 Other" >
                                                    Reject
                                                </button>
                                            </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                              @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.tableku').DataTable();
            $('.select2').select2();
        });
    </script>
@endpush
