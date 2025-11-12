@extends('app')

@section('title', 'Fleet')

@section('content')
<div class="container py-5 text-light">
    <style>
        .fleet-hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .fleet-hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }
        .fleet-img-zoom {
            transition: transform 0.3s ease;
        }
        .fleet-img-zoom:hover {
            transform: scale(1.05);
        }
        .fleet-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            color: #bbb;
            font-size: 0.75rem;
            padding: 4px 8px;
            opacity: 0;
            transition: opacity 0.3s ease;
            text-align: center;
        }
        .fleet-image {
            position: relative;
            overflow: hidden;
        }
        .fleet-image:hover .fleet-caption {
            opacity: 1;
        }
    </style>

    <h1 class="text-center mb-5">Fleet</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 bg-dark text-light border-0 fleet-hover-card">
                <div class="fleet-image">
                    <img src="{{ asset('images/fleet/cj4.jpg') }}" class="card-img-top object-fit-cover fleet-img-zoom"
                        style="height: 220px;" alt="Cessna Citation CJ4">
                    <div class="fleet-caption">Image courtesy of Textron Aviation</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-warning">Cessna Citation CJ4</h5>
                    <ul class="list-unstyled">
                        <li>Max Range: 2,165 nm</li>
                        <li>Cruise Speed: 451 knots</li>
                        <li>Service Ceiling: 45,000 ft</li>
                        <li>Capacity: 7 passengers</li>
                        <li>Tail: PH-CNS</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-dark text-light border-0 fleet-hover-card d-flex flex-column">
                <div class="card-body order-1">
                    <h5 class="card-title text-warning">Cessna Citation Longitude</h5>
                    <ul class="list-unstyled">
                        <li>Max Range: 3,500 nm</li>
                        <li>Cruise Speed: 483 knots</li>
                        <li>Service Ceiling: 45,000 ft</li>
                        <li>Capacity: 8-9 passengers</li>
                        <li>Tail: PH-NSY</li>
                    </ul>
                </div>
                <div class="fleet-image order-2">
                    <img src="{{ asset('images/fleet/longitude.jpg') }}" class="card-img-bottom object-fit-cover fleet-img-zoom"
                        style="height: 220px;" alt="Cessna Citation Longitude">
                    <div class="fleet-caption">Image courtesy of Textron Aviation</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-dark text-light border-0 fleet-hover-card">
                <div class="fleet-image">
                    <img src="{{ asset('images/fleet/kingair350i.jpg') }}" class="card-img-top object-fit-cover fleet-img-zoom"
                        style="height: 220px;" alt="Beechcraft King Air 350i">
                    <div class="fleet-caption">Image courtesy of Textron Aviation</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-warning">Beechcraft King Air 350i</h5>
                    <ul class="list-unstyled">
                        <li>Max Range: 1,800 nm</li>
                        <li>Cruise Speed: 312 knots</li>
                        <li>Service Ceiling: 35,000 ft</li>
                        <li>Capacity: 9 passengers</li>
                        <li>Tail: PH-NSB</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <p class="lead text-light">
            <strong>North Sky VA</strong> operates a carefully selected fleet of light jets and turboprops designed for
            short- and medium-haul operations across Europe.
        </p>
        <p class="text-light small">
            These aircraft mirror the real-world business aviation sector, where flexibility, privacy, and access to regional
            airports are essential. Whether you are flying a CJ4 into London City, taking the King Air to a short runway in
            the Alps, or crossing half the continent in the Longitude, you are replicating the experience of real-world VIP
            charters.
        </p>
    </div>
</div>
@endsection
