@extends('layouts.app',['page' => 'Tenant', 'pageSlug' => 'Tenant', 'section' => 'Tenant'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">Edit Tenant</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('teams.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('teams.update', $team) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm input-group input-group-static mb-4 form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-code">Code</label>
                                    <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="Code" value="{{ old('code', $team->code) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'code'])
                                </div>
                                <div class="col-sm input-group input-group-static mb-4 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name', $team->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
