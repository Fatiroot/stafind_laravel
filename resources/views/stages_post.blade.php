
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
              <div class="mr-3 text-">
                <lord-icon
                src="https://cdn.lordicon.com/prjooket.json"
                trigger="hover"
                colors="primary:#545454"
                style="width:20px;height:20px">
            </lord-icon>
              <a href="#">{{ $offer->domain->name }}</div>
              <div class="Stage-post-item-body d-block d-md-flex">
                <div class="mr-3 text-black">
                    <lord-icon
                        src="https://cdn.lordicon.com/ppyvfomi.json"
                        trigger="hover"
                        colors="primary:#545454"
                        style="width:20px;height:20px">
                    </lord-icon>
                     <a href="#">{{ $offer->company->name }}</div>
                <div><span class="icon-my_location"></span>
                    <lord-icon
                        src="https://cdn.lordicon.com/surcxhka.json"
                        trigger="hover"
                        colors="primary:#848484,secondary:#3080e8"
                        style="width:20px;height:20px">
                    </lord-icon>
                    <span>{{ $offer->city->name }}</span></div>
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

  @endsection

