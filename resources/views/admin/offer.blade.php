@extends('components.dashboardAdmin')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6> Offers table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">ID</th>
                            <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Title</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Description</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Company</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Duration</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Localisation</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Salary</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">user</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Status</th>
                        </tr>
                    </thead>
                    @foreach ($offers as $offer)
                    <tbody>
                        <tr>
                            <td style="width: 10%; text-align: center;">
                                <span>{{ $offer->id }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <h6 class=" text-xs font-weight-bold mb-0">{{ $offer->title }}</h6>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $offer->description }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $offer->user->company->name }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $offer->duration }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold  mb-0">{{ $offer->localisation}}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold  mb-0">{{ $offer->salary}}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold  mb-0">{{ $offer->user->fullname}}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <form method="POST" action="{{ route('admin.changeStatus', $offer->id) }}" id="update-offer-form-{{ $offer->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link text-decoration-none  ">
                                        @if($offer->status == 0)
                                            <span class="badge bg-success p-2 me-2">Accepted</span>
                                        @else
                                            <span class="badge bg-danger p-2 me-2">Pendeing</span>
                                        @endif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.lordicon.com/lordicon.js"></script>

@endsection
