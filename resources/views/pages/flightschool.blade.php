@extends('app')

@section('title', 'North Sky Flight School')

@section('content')
<section class="bg-dark text-light rounded-4 overflow-hidden">
    <header class="text-center text-white" style="background-image: url('{{ asset('images/flightschool/airbus_night.jpg') }}'); background-size: cover; background-position: center;">
        <div class="py-5" style="background-color: rgba(0,0,0,0.65);">
            <h1 class="display-4 text-warning">North Sky Flight School</h1>
            <p class="lead">Your journey from first circuit to airline-level realism starts here.</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-warning btn-lg mt-3">Join and Start Training</a>
            @else
                <a href="{{ route('frontend.dashboard.index') }}" class="btn btn-success btn-lg mt-3">Continue Your Training</a>
            @endguest
        </div>
    </header>

    <section class="container py-5">
        <div class="row gy-4 text-light">
            <div class="col-md-4">
                <div class="card bg-black border-warning h-100">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('images/flightschool/cessna_day.jpg') }}" class="card-img-top object-fit-cover" alt="VFR training">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">VFR Basics</h5>
                        <p class="card-text">
                            Learn circuits, traffic patterns, and visual communication with ATC. Perfect for new simmers and
                            essential for hand-flying skills.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-black border-warning h-100">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('images/flightschool/ils_approach_chart.png') }}" class="card-img-top object-fit-cover" alt="IFR training">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">IFR Essentials</h5>
                        <p class="card-text">
                            Fly SIDs, STARs, and approaches with precision. Practice IFR navigation, chart reading, and
                            online ATC procedures.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-black border-warning h-100">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('images/flightschool/fmc_a20n.png') }}" class="card-img-top object-fit-cover" alt="Jet procedures">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">Airline Procedures</h5>
                        <p class="card-text">
                            Program your FMS, run proper checklists, and fly gate-to-gate using professional SOPs on jets
                            like the A320 or Embraer.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('frontend.flightschool.program') }}" class="btn btn-outline-warning btn-lg">
                See Full Training Program
            </a>
        </div>
    </section>

    <section class="container my-5">
        <h4 class="text-warning">Shared Cockpit Training</h4>
        <p>
            Instructors provide shared cockpit sessions so you can fly together, ask questions live, and learn by doing.
            It is the perfect way to ease into online flying, especially on VATSIM.
        </p>
    </section>

    <section class="container my-5">
        <h4 class="text-warning">Join the Network — VATSIM</h4>
        <ul>
            <li>Setting up your account</li>
            <li>Connecting via vPilot or xPilot</li>
            <li>Filing flight plans and reading METARs</li>
            <li>Understanding ATC phraseology</li>
        </ul>
        <p>With our guidance, flying online will feel natural, exciting, and immersive.</p>
    </section>
</section>
@endsection
