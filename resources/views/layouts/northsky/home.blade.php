@extends('app')
@section('title', __('home.welcome.title'))

@section('content')
    <header class="hero-image text-center text-white d-flex align-items-center justify-content-center"
        style="background-image: url('{{ asset('images/cessna.avif') }}'); background-size: cover; background-position: center; height: 100vh; position: relative;">
        <div style="background-color: rgba(0, 0, 0, 0.7); position: absolute; inset: 0;"></div>
        <div class="container position-relative">
            <h1 class="display-4 text-warning fw-bold">Smaller Aircraft. Bigger Experience.</h1>
            <p class="lead text-light">Welcome to North Sky Virtual Airline — focused on jet operations, precision, and realism.</p>
            <a href="{{ url('/register') }}" class="btn btn-warning btn-lg mt-3">Join Us</a>
        </div>
    </header>

    <section class="py-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('images/fleet/longitude_3.jpg') }}" class="img-fluid rounded shadow"
                        alt="Cessna Jet on Ramp">
                </div>
                <div class="col-md-6">
                    <h2 class="text-warning">Why North Sky?</h2>
                    <p class="lead">
                        North Sky VA is built around modern business jets and smaller airliner operations. Whether you're flying the
                        Citation CJ4 or the Embraer E190, we focus on immersive flying, dispatch realism, and stunning visuals.
                    </p>
                    <ul class="list-unstyled">
                        <li>• Realistic SimBrief integration</li>
                        <li>• Custom fleet and ranks</li>
                        <li>• Multiplayer VATSIM & IVAO support</li>
                        <li>• Fly whenever you want — we trust our pilots</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
