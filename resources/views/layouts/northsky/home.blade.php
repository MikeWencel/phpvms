@extends('app')
@section('title', __('home.welcome.title'))

@section('css')
    <style>
        .northsky-hero {
            position: relative;
            min-height: 85vh;
            overflow: hidden;
            background: #050505;
        }

        .northsky-hero::before {
            content: "";
            position: absolute;
            inset: -5%;
            background-image: url('https://i.ytimg.com/vi/On7wiG6EyC0/maxresdefault.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(65px) saturate(1.4);
            opacity: 0.65;
            z-index: 0;
        }

        .northsky-hero__video {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 1;
        }

        .northsky-hero__video iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200%;
            height: 100%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            filter: brightness(.65);
        }

        .northsky-hero__video--desktop {
            display: none;
        }

        .northsky-hero__video--mobile {
            display: block;
        }

        @media (min-width: 768px) {
            .northsky-hero__video--desktop {
                display: block;
            }

            .northsky-hero__video--mobile {
                display: none;
            }
        }

        .northsky-hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, rgba(5, 5, 5, 0.75), rgba(5, 5, 5, 0.35) 60%, rgba(5, 5, 5, 0.75));
            z-index: 2;
        }

        .northsky-glow {
            backdrop-filter: blur(6px);
            background: rgba(10, 10, 10, 0.6);
            border: 1px solid rgba(255, 215, 90, 0.3);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.8);
        }

        .fleet-card {
            background: #050505;
            border: 1px solid rgba(255, 217, 111, 0.25);
            transition: transform .3s ease, border-color .3s ease;
        }

        .fleet-card:hover {
            transform: translateY(-6px);
            border-color: #f8d276;
        }
    </style>
@endsection

@section('content')

    <section class="northsky-hero d-flex align-items-center text-center text-white">
        <div class="northsky-hero__video northsky-hero__video--desktop">
            <iframe
                src="https://www.youtube.com/embed/xMpSKztYoMw?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&loop=1&start=18&playlist=xMpSKztYoMw&modestbranding=1&playsinline=1"
                title="North Sky Citation" frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
        <div class="northsky-hero__video northsky-hero__video--mobile">
            <iframe
                src="https://www.youtube.com/embed/On7wiG6EyC0?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&loop=1&start=15&playlist=On7wiG6EyC0&modestbranding=1&playsinline=1"
                title="Cessna Citation X" frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
        <div class="northsky-hero__overlay"></div>
        <div class="container position-relative" style="z-index: 3;">
            <div class="mx-auto northsky-glow rounded-4 p-5 text-light" style="max-width: 720px;">
                <p class="text-uppercase text-warning mb-2">North Sky Virtual Airline</p>
                <h1 class="display-4 fw-bold mb-3">Business Aviation. Elevated.</h1>
                <p class="lead text-light mb-4">
                    From short-field approaches in the CJ4 to trans-European hops in the Longitude and high-speed runs in the Citation X,
                    we craft every mission for realism, dispatch precision, and stunning immersion.
                </p>
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                    <a href="{{ url('/register') }}" class="btn btn-warning btn-lg fw-semibold px-5">Join the Flight Deck</a>
                    <a href="{{ route('frontend.fleet.index') }}" class="btn btn-outline-light btn-lg px-5">Explore the Fleet</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark text-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="fleet-card rounded-4 p-4 h-100">
                        <p class="text-warning text-uppercase small mb-1">Light Jet</p>
                        <h3 class="h4 text-white">Cessna Citation CJ4</h3>
                        <p class="small text-muted mb-3">Short-runway specialist with glass avionics and our go-to corporate shuttle.</p>
                        <ul class="list-unstyled mb-0 text-white-50 small">
                            <li>• 2,165 nm range</li>
                            <li>• STOL-friendly with steep approach capability</li>
                            <li>• SimBrief + Navigraph layouts tuned for MSFS</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fleet-card rounded-4 p-4 h-100">
                        <p class="text-warning text-uppercase small mb-1">Super-Midsize</p>
                        <h3 class="h4 text-white">Cessna Citation Longitude</h3>
                        <p class="small text-muted mb-3">Cross-continent luxury with eight seats and a bespoke North Sky interior set.</p>
                        <ul class="list-unstyled mb-0 text-white-50 small">
                            <li>• 3,500 nm range</li>
                            <li>• Dispatch profiles for extended ops</li>
                            <li>• Compatible with Working Title avionics</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fleet-card rounded-4 p-4 h-100">
                        <p class="text-warning text-uppercase small mb-1">Flagship</p>
                        <h3 class="h4 text-white">Cessna Citation X (C750)</h3>
                        <p class="small text-muted mb-3">Mach .92 cruise, bespoke liveries, and full performance tables for the speed record chasers.</p>
                        <ul class="list-unstyled mb-0 text-white-50 small">
                            <li>• 3,460 nm range</li>
                            <li>• Custom SimBrief + ACARS templates</li>
                            <li>• PH-NSY tail flying daily rotations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-black text-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="text-warning mb-3">North Sky Flight School</h2>
                    <p class="lead text-white-75">
                        Our academy moves you from type-rated intros to advanced jet handling and scenario-based SOP refreshers.
                        Live workshops, shared cockpit mentoring, and curated MSFS/VATSIM briefs keep every sortie sharp.
                    </p>
                    <ul class="list-unstyled text-white-50 small mb-4">
                        <li>• Guided onboarding flights in the CJ4 and Longitude</li>
                        <li>• Systems deep dives, FMS workflows, and abnormal drills</li>
                        <li>• Instructor-led group legs with real ATC recordings</li>
                    </ul>
                    <a href="{{ route('frontend.flightschool.index') }}" class="btn btn-warning text-dark fw-semibold px-4">
                        Visit the Flight School
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="northsky-glow rounded-4 p-4 text-light h-100">
                        <h3 class="text-warning mb-3">Connected to the Networks</h3>
                        <p class="mb-3">
                            We live on VATSIM. Every briefing includes up-to-date ATIS, controller notes, and custom phraseology cards so you sound like you belong on the frequency.
                        </p>
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <span class="badge text-bg-warning text-dark me-2">Dispatch Realism</span>
                                Flight plans validated against Eurocontrol, NAT tracks, and RVSM profiles.
                            </div>
                            <div>
                                <span class="badge text-bg-warning text-dark me-2">Community</span>
                                Shared flights, cross-coverage events, and joint ops with partner VAs.
                            </div>
                            <div>
                                <span class="badge text-bg-warning text-dark me-2">Freedom</span>
                                No activity policing—fly when inspiration strikes, log when the mission feels right.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
