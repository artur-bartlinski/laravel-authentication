@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update address</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('addresses.destroy', $address) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                            <h5>Are you sure you want to remove address?</h5>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Remove
                                    </button>
                                    <a href="{{ route('home', $address->id) }}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
