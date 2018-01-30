@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create address</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('users.create') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-8 control-label">* Fields are required</label>
                            </div>

                            @include('partials.address')


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
