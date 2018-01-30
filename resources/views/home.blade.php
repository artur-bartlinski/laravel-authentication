@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('addresses.create')  }}"><button type="button" class="btn btn-primary btn-lg btn-block">Add previous address</button></a>

                    @include('partials.user_details')

                    @include('partials.address_details')

                        @if($addresses)
                            @include('partials.previous_addresses')
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
