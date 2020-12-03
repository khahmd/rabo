@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="/all-product/" class="nav-link">What's new </a>
            </div>
        </div>
    </div>
</div>
<div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/fr/city/2988507"><span style="color:gray;"></span><br />Paris, France</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=medium&timezone=Europe%2FParis" width="100%" height="115" frameborder="0" seamless></iframe> </div>
@endsection