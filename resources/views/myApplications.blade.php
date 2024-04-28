
@extends('components.home')
@section('content')
<div class="container my-5">
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-2"><span>my</span> Applications</h2>
                </div>
            </div>
            <section id="gallery">
                <div class="container">
                    <div class="row offer-wrapper " id="offre-list">
                    </div>
                    <div class="row offer-wrapper " id="offre-listt">
                        @foreach ($offers as $offer)
                            <div class="col-lg-4 col-md-6 mb-4  gallery-item" data-category="{{ $offer->domain->id }}">
                                <div class="card" >
                                    <img src="{{ $offer->company->getFirstMediaUrl('company') }}" alt=""
                                        style="height: 250px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $offer->title }}</h5>
                                        <p class="card-text">
                                            {{ strlen($offer->description) > 50 ? substr($offer->description, 0, 50) . '...' : $offer->description }}
                                        </p>
                                    </div>
                                    <div class="mx-2">
                                        <lord-icon src="https://cdn.lordicon.com/ppyvfomi.json" trigger="hover"
                                            colors="primary:#545454" style="width:20px;height:20px">
                                        </lord-icon>
                                        <a href="#" class=""
                                            style=" text-decoration:none">{{ $offer->company->name }}</a>
                                    </div>
                                    <div class="mx-2">
                                        <lord-icon src="https://cdn.lordicon.com/surcxhka.json" trigger="hover"
                                            colors="primary:#545454,secondary:#3080e8" style="width:20px;height:20px">
                                        </lord-icon>
                                        <a href="#" class=""
                                            style=" text-decoration:none">{{ $offer->city->name }}</a>
                                    </div>
                                    <div class="card-body ">
                                        <a href="{{ route('UserOffer.show', $offer->id) }}"
                                            class="btn btn-outline-success btn-sm">Read More</a>
                                        <span
                                            class="bg-warning text-white badge py-2 px-3">{{ $offer->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>

</div>

  @endsection

