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
<h1 class="text-4xl text-center font-extrabold text-gray-900 my-5">Details of offer:</h1>

<section id="intro" class=" d-flex align-items-center ">

    <div class="container text-dark">
      <div class="row gx-5 d-flex align-items-center mb-4">
        <div class="col-xl-7 col-lg-6 d-none d-lg-block ">
          <div class="card bg-light rounded-6 shadow-5-strong">
            <div class="bg-image hover-overlay ripple rounded" data-mdb-ripple-color="light" data-mdb-perfect-scrollbar="true"  >
                <img src="{{ $offer->user->company->getFirstMediaUrl('company') }}" class="w-100 " alt="Bootstrap 5 eCommerce Product Details"style="height: 500px">
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6">
          <h1 class="h2">
            <span class="">{{ $offer->title }}</span><br>
            <span class="text-primary fw-bold">{{ $offer->user->company->name }}</span>
          </h1>
          <p class="text-muted">{{ $offer->description }}</p>
          <a class="btn btn-tertiary btn-lg btn-block mb-2" href="#choices" role="button">
            InterShip Summary
          </a>
          <ul class="list-group list-group-light list-group-small small mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="fas fa-calendar-alt mx-2"></i> Published on: {{ $offer->created_at }}</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="fas fa-map-marker-alt mx-2"></i> City: {{ $offer->city->name }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="far fa-clock mx-2"></i> Duration: {{ $offer->duration }} month</div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="fas fa-map-pin mx-2"></i> Stage Location: {{ $offer->localisation }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="fas fa-money-bill-wave mx-2"></i> Salary: {{ $offer->salary }} DH for month</div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="text-muted"><i class="fas fa-briefcase mx-2"></i> Domain: {{ $offer->domain->name }}</div>
            </li>
          </ul>
          <!-- Button trigger modal -->
          <button type="button" class="btn bg-primary btn-lg text-white mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-info me-2"></i>  Apply Now
          </button>

        </div>
    </div>
  </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apply for {{ $offer->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('UserOffer.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                @auth
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endauth
                <input type="hidden" name="offer_id" value="{{ $offer->id }}">

                <div class="mb-3">
                  <label for="cv" class="form-label">Upload your CV:</label>
                  <input name="cv" class="form-control" type="file" id="cv">
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Cover Letter or Motivation:</label>
                  <textarea name="description" class="form-control" rows="6"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                @auth
                <button type="submit" class="btn btn-primary">Submit</button>
                @else
                <a href="{{ route('register') }}" class="btn btn-primary">Apply</a>
                @endauth
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>



@endsection
