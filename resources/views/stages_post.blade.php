
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
      <div class="ftco-search">
        <div class="row">
          <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab"
                aria-controls="v-pills-1" aria-selected="true">Find a Internship</a>
            </div>
          </div>
          <div class="col-md-12 tab-wrap">

            <div class="tab-content p-4" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                aria-labelledby="v-pills-nextgen-tab">
                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="icon"><span class="icon-briefcase"></span></div>
                          <input type="text" id="search-input"  name="searchItem" class="form-control" placeholder="title">
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="name" id="" class="form-control">
                                <option value="">Select a Domain</option>
                                @foreach ($domains as $domain )
                              <option value="{{ $domain->name }}">{{ $domain->name }}</option>
                              @endforeach
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
                          <button type="submit" id="search-btn" value="Search" class="form-control btn btn-primary">Search</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                <form action="#" class="search-Internship">
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
<section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2 class="mb-2"><span>All</span> Internships</h2>
        </div>
    </div>
    <section id="gallery">
        <div class="container">
          <div class="row offer-wrapper ">
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
    <div class="d-flex justify-content-center">
        {{ $offers->links() }}
    </div>
    </div>
  </section>
  <script src="{{asset('js/searchOffer.js')}}"></script>
  @endsection

