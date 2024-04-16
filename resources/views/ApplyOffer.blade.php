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

<section class="ftco-section ftco-counter">
    <div class="container">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <img class="mx-3" src="{{ $offer->user->company->getFirstMediaUrl('company') }}" alt="Company logo" style="width: 150px; height:150px">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $offer->title }}</h2>
                        <p class="text-gray-600">{{ $offer->user->company->name }} -- {{ $offer->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <div class="mt-4 px-20">
                    <h4>Stage Description</h4>
                    <p class="text-gray-600"> {{ $offer->description }}</p>
                    <ul class="list-disc list-inside text-gray-600 mt-2">
                        <li class="text-black font-semibold">Domain: {{ $offer->domain->name }}</li>
                    </ul>
                </div>
                <div class="mt-4 px-20">
                    <h4>Stage Summary</h4>
                    <ul class="list-disc list-inside text-gray-600 mt-2">
                        <li class="text-black font-semibold">Published on : {{ $offer->created_at }}</li>
                        <li class="text-black font-semibold">City : {{ $offer->city->name }}</li>
                        <li class="text-black font-semibold">Duration : {{ $offer->duration}}</li>
                        <li class="text-black font-semibold">Stage Location : {{ $offer->localisation}}</li>
                        <li class="text-black font-semibold">Slary : {{ $offer->salary }} DH</li>
                    </ul>
                </div>

            </div>

        <h1 class="mb-10 border-bottom py-4 text-4xl text-center font-extrabold text-gray-900">Apply to this offer:</h1>

        <form class="px-56" method="POST" action="{{ route('UserOffer.store') }}" enctype="multipart/form-data">
            @csrf
            @auth
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            @endauth
            <input type="hidden" name="offer_id" value="{{ $offer->id }}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

            <div class="mb-6">
                <label for="title" class="form-label mb-2 text-sm font-medium text-gray-900">Put your CV here:</label>
                <input name="cv" class="form-control form-control-lg" id="file_input" type="file">
            </div>

            <label for="title" class="form-label mb-2 text-sm font-medium text-gray-900">Write a Cover Letter or Your Motivations for the Post:</label>
            <textarea name="description" class="form-control" rows="6"></textarea>
            @auth
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            @endauth
            @guest
            <a href="{{ route('register') }}" class="btn btn-primary mt-4">Apply</a>
            @endguest
        </form>

    </div>
</section>

@endsection
