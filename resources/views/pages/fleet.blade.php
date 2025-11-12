@extends('layouts.northsky.app')

@section('title', 'Fleet')

@section('content')
<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1);
    }
    .img-hover-zoom {
        transition: transform 0.3s ease-in-out;
    }
    .img-hover-zoom:hover {
        transform: scale(1.05);
    }
    .image-container {
        position: relative;
        overflow: hidden;
    }
    .image-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        color: #ccc;
        font-size: 0.75rem;
        padding: 4px 8px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        text-align: center;
    }
    .image-container:hover .image-caption {
        opacity: 1;
    }
    .icon-fix {
        display: inline-block;
        width: 1.5em;
        text-align: center;
    }
</style>

<div class="container py-5 text-light">
    <h1 class="text-center mb-5">Fleet</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        {{-- CJ4 --}}
        <div class="col">
            <div class="card h-100 bg-dark text-light shadow-lg border-0 hover-card">
                <div class="image-container">
                    <img src="{{ asset('images/fleet/cj4.jpg') }}" class="card-img-top object-fit-cover img-hover-zoom" style="height: 220px;" alt="Cessna Citation CJ4">
                    <div class="image-caption">Image courtesy of Textron Aviation - media.txtav.com</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-warning">Cessna Citation CJ4</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-route text-warning me-2 icon-fix"></i> Max Range: 2,165 nm</li>
                        <li><i class="fas fa-tachometer-alt text-warning me-2 icon-fix"></i> Cruise Speed: 451 knots</li>
                        <li><i class="fas fa-arrow-up text-warning me-2 icon-fix"></i> Service Ceiling: 45,000 ft</li>
                        <li><i class="fas fa-user-friends text-warning me-2 icon-fix"></i> Capacity: 7 pax</li>
                        <li><i class="fas fa-plane text-warning me-2 icon-fix"></i> Tail: PH-CNS</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Longitude --}}
        <div class="col">
            <div class="card h-100 d-flex flex-column bg-dark text-light shadow-lg border-0 hover-card">
                <div class="card-body order-1">
                    <h5 class="card-title text-warning">Cessna Citation Longitude</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-route text-warning me-2 icon-fix"></i> Max Range: 3,500 nm</li>
                        <li><i class="fas fa-tachometer-alt text-warning me-2 icon-fix"></i> Cruise Speed: 483 knots</li>
                        <li><i class="fas fa-arrow-up text-warning me-2 icon-fix"></i> Service Ceiling: 45,000 ft</li>
                        <li><i class="fas fa-user-friends text-warning me-2 icon-fix"></i> Capacity: 8-9 pax</li>
                        <li><i class="fas fa-plane text-warning me-2 icon-fix"></i> Tail: PH-NSY</li>
                    </ul>
                </div>
                <div class="image-container order-2">
                    <img src="{{ asset('images/fleet/longitude.jpg') }}" class="card-img-top object-fit-cover img-hover-zoom" style="height: 220px;" alt="Cessna Citation Longitude">
                    <div class="image-caption">Image courtesy of Textron Aviation - media.txtav.com</div>
                </div>
            </div>
        </div>

        {{-- Citation X --}}
        <div class="col">
            <div class="card h-100 bg-dark text-light shadow-lg border-0 hover-card">
                <div class="image-container">
                    <img src="{{ asset('images/fleet/citationx.jpg') }}" class="card-img-top object-fit-cover img-hover-zoom" style="height: 220px;" alt="Cessna Citation X">
                    <div class="image-caption">Image courtesy of Textron Aviation - media.txtav.com</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-warning">Cessna Citation X (C750)</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-route text-warning me-2 icon-fix"></i> Max Range: 3,460 nm</li>
                        <li><i class="fas fa-tachometer-alt text-warning me-2 icon-fix"></i> Cruise Speed: 525 knots</li>
                        <li><i class="fas fa-arrow-up text-warning me-2 icon-fix"></i> Service Ceiling: 51,000 ft</li>
                        <li><i class="fas fa-user-friends text-warning me-2 icon-fix"></i> Capacity: 8 pax</li>
                        <li><i class="fas fa-plane text-warning me-2 icon-fix"></i> Tail: PH-NSY</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    {{-- Description block --}}
    <div class="text-center mt-5 px-3 px-md-5">
        <p class="lead text-light">
            <strong>North Sky VA</strong> operates a carefully selected fleet of light jets and midsize aircraft designed for short and medium-haul missions across Europe.
            These aircraft are not just machines - they represent the premium world of executive charter aviation.
        </p>
        <p class="text-light small">
            Our fleet mirrors the real-world business aviation sector, where flexibility, privacy, and access to regional airports are essential.
            Whether you are flying a CJ4 into a corporate hub like London City, taking the Longitude on a trans-European hop, or pushing the limits of speed in the Citation X, you are replicating the experience of real-world VIP charters.
        </p>
        <p class="text-light small">
            In this world, time is everything. That is why charter jets operate from private terminals, avoid queues, and deliver direct-to-destination convenience. This is not commercial aviation - this is flying on your terms.
        </p>
    </div>
</div>
@endsection
