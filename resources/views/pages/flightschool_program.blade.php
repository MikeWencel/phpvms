@extends('app')

@section('title', 'Flight School Program')

@section('content')
<section class="bg-dark text-white py-5 rounded-4">
    <style>
        .program-img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
        }
    </style>
    <div class="container">
        <h1 class="text-warning mb-4">Flight School — Training Overview</h1>
        <p class="lead mb-5">This is your roadmap from beginner pilot to confident online jet captain. Choose your path,
            follow the lessons, and fly with purpose.</p>

        <div class="row mb-5 align-items-center g-4">
            <div class="col-md-6">
                <h4 class="text-warning">VFR Training</h4>
                <ul>
                    <li><strong>Intro to Visual Flight Rules</strong> — weather minima, navigation, controlled vs
                        uncontrolled airspace.</li>
                    <li><strong>Traffic Patterns</strong> — standard circuits, reporting points, pattern entry techniques.</li>
                    <li><strong>Pilotage & Dead Reckoning</strong> — landmarks, headings, and timing techniques.</li>
                    <li><strong>Tower and AFIS Communication</strong> — phraseology for departures, circuits, and arrivals.</li>
                    <li><strong>Solo VFR Flight</strong> — complete a full pattern or cross-country with instructor support.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/flightschool/cessna_day.jpg') }}" alt="VFR training" class="program-img rounded shadow">
            </div>
        </div>

        <div class="row mb-5 align-items-center g-4 flex-md-row-reverse">
            <div class="col-md-6">
                <h4 class="text-warning">IFR Essentials</h4>
                <ul>
                    <li><strong>Understanding IFR</strong> — controlled airspace, minimum altitudes, IMC operations.</li>
                    <li><strong>SID/STAR & Approach Briefings</strong> — chart reading, transitions, descent planning.</li>
                    <li><strong>Holding Procedures</strong> — entry types, speed restrictions, timing.</li>
                    <li><strong>METAR, TAF & NOTAM</strong> — decode actual and forecast weather for IFR flights.</li>
                    <li><strong>IFR Line Flight</strong> — complete flight with SID, enroute, STAR, and precision approach.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/flightschool/ils_approach_chart.png') }}" alt="IFR training" class="program-img rounded shadow">
            </div>
        </div>

        <div class="row mb-5 align-items-center g-4">
            <div class="col-md-6">
                <h4 class="text-warning">Jet Operations</h4>
                <ul>
                    <li><strong>FMC / MCDU Programming</strong> — INIT, PERF, secondary plans for Airbus, Embraer, or CJ4.</li>
                    <li><strong>Flows & Checklists</strong> — gate-to-gate checklists, briefings, and callouts.</li>
                    <li><strong>VNAV / LNAV Management</strong> — climb and descent profiles, vertical modes, constraints.</li>
                    <li><strong>Abnormal Situations</strong> — rejected takeoff, missed approach, reroutes.</li>
                    <li><strong>Line Flight</strong> — full sector with professional SOPs and paperwork.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/flightschool/fmc_a20n.png') }}" alt="Jet operations" class="program-img rounded shadow">
            </div>
        </div>

        <div class="row mb-5 align-items-center g-4 flex-md-row-reverse">
            <div class="col-md-6">
                <h4 class="text-warning">VATSIM & Online Flying</h4>
                <ul>
                    <li><strong>Account Setup</strong> — register, install vPilot/xPilot, connect to the network.</li>
                    <li><strong>Flight Plans</strong> — use SimBrief and VATSIM tools for accurate filings.</li>
                    <li><strong>Voice Communication</strong> — AFV basics, PTT etiquette, handling unexpected calls.</li>
                    <li><strong>Phraseology</strong> — real-world calls for every phase of flight.</li>
                    <li><strong>First Network Flight</strong> — instructor-assisted VATSIM sortie from clearance to shutdown.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/flightschool/vatsim_ui.jpg') }}" alt="VATSIM training" class="program-img rounded shadow">
            </div>
        </div>

        <div class="bg-black border border-warning rounded-4 p-4 text-center">
            <p class="mb-3">
                All training is conducted live via <strong>Discord</strong> with shared cockpit sessions. Materials are
                provided to active students who are part of our airline.
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="https://discord.gg/YOUR-DISCORD" class="btn btn-outline-warning">
                    Join Flight School on Discord
                </a>
                <a href="{{ url('/register') }}" class="btn btn-outline-warning">
                    Join North Sky Virtual Airline
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
