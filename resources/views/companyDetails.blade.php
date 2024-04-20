@extends('components.home')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url({{ asset('images/image_7.jpg') }});"
 data-stellar-background-ratio="0.5">
 <div class="overlay"></div>
 <div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
    data-scrollax-parent="true">
    <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
      <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span
          class="number" data-number="850000">0</span> great Stage offers you deserve!</p>
      <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Stage is
          Waiting</span></h1>
    </div>
  </div>
 </div>
</div>
<h1 class="text-4xl text-center font-extrabold text-gray-900 my-5">Details of Comany:</h1>

<section id="intro" class=" d-flex align-items-center ">

    <div class="container text-dark">
      <div class="row gx-5 d-flex align-items-center">
        <div class="col-xl-7 col-lg-6 d-none d-lg-block ">
          <div class="card bg-light rounded-6 shadow-5-strong">
            <div class="bg-image hover-overlay ripple rounded" data-mdb-ripple-color="light" data-mdb-perfect-scrollbar="true"  >
                <img src="{{ $company->getFirstMediaUrl('company') }}" class="w-100 " alt="Bootstrap 5 eCommerce Product Details"style="height: 500px">
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6">
          <h1 class="h2">
            <span class="">{{ $company->name }}</span><br>
          </h1>
          <p class="text-muted">{{ $company->description }}</p>
          <a class="btn btn-tertiary btn-lg btn-block mb-2" href="#choices" role="button">
            Company Summary
          </a>
          <ul class="list-group list-group-light list-group-small small mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="fas fa-map-pin mx-2"></i> Company Location : {{ $company->location }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"> <i class="fas fa-users icon mx-2"></i> Employees : {{ $employees }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"> <i class="fas fa-shopping-cart icon mx-2"></i> Offers : {{ $Alloffers }}</div>
            </li>
          </ul>
        </div>
    </div>
  </div>

</section>

<section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2 class="mb-2"><span>Recent</span> Internships</h2>
        </div>
    </div>

    @if (count($offers) > 0)
    <section id="gallery">
        <div class="container">
          <div class="row">
            @foreach ($offers as $offer)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                  <img src="{{ $offer->company->getFirstMediaUrl('company') }}" alt=""  style="height: 250px">
                  <div class="card-body">
                    <h5 class="card-title">{{ $offer->title }}</h5>
                    <p class="card-text">{{ strlen($offer->description) > 100 ? substr($offer->description, 0, 100) . '...' : $offer->description }}</p>
                     </div>
                  <div class="mx-2">
                  <lord-icon
                        src="https://cdn.lordicon.com/ppyvfomi.json"
                        trigger="hover"
                        colors="primary:#545454"
                        style="width:20px;height:20px">
                    </lord-icon>
                  <a href="#" class="" style=" text-decoration:none">{{ $offer->company->name }}</a>
                </div>
                <div class="mx-2">
                    <lord-icon
                        src="https://cdn.lordicon.com/surcxhka.json"
                        trigger="hover"
                        colors="primary:#545454,secondary:#3080e8"
                        style="width:20px;height:20px">
                    </lord-icon>
                    <a href="#" class="" style=" text-decoration:none">{{ $offer->city->name }}</a>
                  </div>
                  <div class="card-body ">
                    <a href="{{ route('UserOffer.show', $offer->id) }}" class="btn btn-outline-success btn-sm">Read More</a>
                    <span class="bg-warning text-white badge py-2 px-3">{{ $offer->created_at->diffForHumans() }}</span>
                     </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
    </section>
  @else
    <div class="alert alert-info">
        No offers available at the moment.
    </div>
  @endif

    <div class="row justify-content-center ">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <a class="nav-link text" href="{{ route('UserOffer.index') }}" style="font-weight: bold;">See All</a>
        </div>
    </div>
</section>



@endsection
