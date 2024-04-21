
@extends('components.home')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');"
 data-stellar-background-ratio="0.5">
 <div class="overlay"></div>
 <div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
    data-scrollax-parent="true">
    <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
      <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span
          class="number" data-number="850000">0</span> great Internship offers you deserve!</p>
      <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Internship is
          Waiting</span></h1>
    </div>
  </div>
 </div>
</div>
  <section class="ftco-section services-section bg-light">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="media-body">
              <h3 class="heading mb-3">Search Millions of Internships</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="media-body">
              <h3 class="heading mb-3">Easy To Manage Internships</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="media-body">
              <h3 class="heading mb-3">Top Careers</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="media-body">
              <h3 class="heading mb-3">Search Expert Candidates</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-counter">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Categories work wating for you</span>
          <h2 class="mb-3"><span>Current</span> Internship Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach($domains as $domain)
            <div class="col-lg-3 col-md-4 col-sm-6 ftco-animate">
                <ul class="category">
                    <li style="list-style: none;">
                        <a href="#" style="text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 5px; ">
                            <span style="font-weight: bold;">{{ $domain->name }} :</span>
                            <span style="color: #41dc65; margin-left: 5px;">{{ $domain->offers_count }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>

    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Recently Added Internships</span>
          <h2 class="mb-2"><span>Recent</span> Internships</h2>
        </div>
    </div>
    <section id="gallery">
        <div class="container">
          <div class="row">
            @foreach ($offers as $offer)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                  <img src="{{ $offer->company->getFirstMediaUrl('company') }}" alt=""  style="height: 250px">
                  <div class="card-body">
                    <h5 class="card-title">{{ $offer->title }}</h5>
                    <p class="card-text">{{ strlen($offer->description) > 50 ? substr($offer->description, 0, 50) . '...' : $offer->description }}</p>
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
    <div class="row justify-content-center ">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <a class="nav-link text" href="{{ route('UserOffer.index') }}" style="font-weight: bold;">See more</a>
        </div>
    </div>
  </section>
  <div class="container">
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-3 mt-5 pt-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Our Companies</span>
            <h2><span>Recent</span> Companies</h2>
          </div>
        </div>
    <div class="row ">
        @foreach ($companies as $company)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="box">
                    <img src="{{ $company->getFirstMediaUrl('company') }}" style="height: 250px; width: 100%;" class="img-fluid">
                    <div class="box-content">
                        <h3 class="title">{{ $company->name }}</h3>
                        <span class="post">{{ $company->location }}</span>
                        <a href="{{ route('home.show', $company->id) }}">more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="row justify-content-center mb-5 pb-3 ">
    <div class="col-md-7 heading-section text-center ftco-animate">
        <a class="nav-link text" href="{{ route('allCompanies') }}" style="font-weight: bold;">See more</a>
    </div>
</div>
  </div>

  @endsection

