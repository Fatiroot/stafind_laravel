
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
          class="number" data-number="850000">0</span> great Stage offers you deserve!</p>
      <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Stage is
          Waiting</span></h1>

      <div class="ftco-search">
        <div class="row">
          <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab"
                aria-controls="v-pills-1" aria-selected="true">Find a Stage</a>
            </div>
          </div>
          <div class="col-md-12 tab-wrap">

            <div class="tab-content p-4" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                aria-labelledby="v-pills-nextgen-tab">
                <form action="#" class="search-Stage">
                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="icon"><span class="icon-briefcase"></span></div>
                          <input type="text" class="form-control" placeholder="eg. Garphic. Web Developer">
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                              <option value="">Category</option>
                              <option value="">Full Time</option>
                              <option value="">Part Time</option>
                              <option value="">Freelance</option>
                              <option value="">Internship</option>
                              <option value="">Temporary</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input type="text" class="form-control" placeholder="Location">
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <input type="submit" value="Search" class="form-control btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                <form action="#" class="search-Stage">
                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="icon"><span class="icon-user"></span></div>
                          <input type="text" class="form-control" placeholder="eg. Adam Scott">
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                              <option value="">Category</option>
                              <option value="">Full Time</option>
                              <option value="">Part Time</option>
                              <option value="">Freelance</option>
                              <option value="">Internship</option>
                              <option value="">Temporary</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input type="text" class="form-control" placeholder="Location">
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <input type="submit" value="Search" class="form-control btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
  <section class="ftco-section services-section bg-light">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-resume"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Search Millions of Stages</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-collaboration"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Easy To Manage Stages</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-promotions"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Top Careers</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-employee"></span></div>
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
          <h2 class="mb-4"><span>Current</span> Stage Posts</h2>
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
          <span class="subheading">Recently Added Stages</span>
          <h2 class="mb-4"><span>Recent</span> Stages</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($offers as $offer )
        <div class="col-md-12 ftco-animate">
          <div class="Stage-post-item bg-white p-4 d-block d-md-flex align-items-center">
            <img id="preview-image" class="block-20" src="{{ $offer->company->getFirstMediaUrl('company') }}" alt="Company Logo" style="width: 120px; height: 120px; margin-right: 20px ;">

            <div class="mb-4 mb-md-0 mr-5">
              <div class="Stage-post-item-header d-flex align-items-center">
                <h2 class="mr-3 text-black h3">{{ $offer->title }}</h2>
                <div class="badge-wrap">
                  <span class="bg-warning text-white badge py-2 px-3">{{ $offer->created_at->diffForHumans() }}</span>
                </div>
              </div>
              <div class="mr-3 text-"><span class="icon-layers"></span> <a href="#">{{ $offer->domain->name }}</div>
              <div class="Stage-post-item-body d-block d-md-flex">
                <div class="mr-3 text-black"><span class="icon-layers"></span> <a href="#">{{ $offer->company->name }}</div>
                <div><span class="icon-my_location"></span> <span>{{ $offer->city->name }}</span></div>
              </div>
            </div>
            <div class="ml-auto d-flex">
              <a href="{{ route('UserOffer.show', $offer->id) }}" class="btn btn-primary py-2 mr-1">Apply Stage</a>
              </a>
            </div>
          </div>
        </div><!-- end -->
        @endforeach
      </div>
    </div>
  </section>
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Our Companies</span>
          <h2><span>Recent</span> Companies</h2>
        </div>
      </div>
      <div class="row d-flex">
        @foreach ($companies as $company )
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <img id="preview-image"  class="block-20"
            src="{{ $company->getFirstMediaUrl('company') }}" alt="Company Logo" style="width: 200px; height:400px">
            <div class="text mt-3">
              <div class="meta mb-2">
                <div><a href="#">{{ $company->name }}</a></div>
              </div>
              <h3 class="heading "><a href="#">{{ $company->description }}</a>
              </h3>
              <p>{{ $company->location }}</p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  @endsection

