@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Testing dash</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <ul>
                        <li>
                            <p>Name: {{auth::user()->name}}</p>
                        </li>
                        <li>
                            <p>Email: {{auth::user()->email}}</p>
                        </li>
                        @if (count($userraces) > 0)
                        <li>
                            <p>Chosen race: {{$userraces[0]->name}}</p>
                        </li>
                        @endif            
                    </ul>

                    <form method="POST" action="{{ action('ProfilesController@reset_account') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">RESET ACCOUNT</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
