
@extends('components.home')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg-home.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-3 mt-5 pt-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2><span>All</span> Companies</h2>
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
<div class="d-flex justify-content-center">
    {{ $companies->links() }}
</div>
  </div>
  @endsection

