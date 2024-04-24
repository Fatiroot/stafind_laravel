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
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Company</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Duration</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Localisation</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Salary</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">user</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">view</th>
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
                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/vfczflna.json"
                                    trigger="click"
                                    colors="primary:#848484,secondary:#3080e8"
                                    style="width:20px;height:20px; cursor: pointer;"
                                    id="eyeIcon{{ $offer->id }}"
                                >
                                </lord-icon>
                                <div class="mx-2">
                                    <!-- Update Offer Modal -->
                                    <div class="modal fade" id="updateOfferModal{{ $offer->id }}" tabindex="-1" aria-labelledby="updateOfferModal{{ $offer->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateOfferModal{{ $offer->id }}Label">Offer Description</h5>
                                                    <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Display Offer Description in Modal -->
                                                    <div class="form-group">
                                                        <p>{{ $offer->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <script>
                                // Add event listener to the eye icon to show the modal
                                document.getElementById('eyeIcon{{ $offer->id }}').addEventListener('click', function() {
                                    // Show the modal corresponding to this offer
                                    var modal = new bootstrap.Modal(document.getElementById('updateOfferModal{{ $offer->id }}'));
                                    modal.show();
                                });
                            </script>

                            <td style="width: 10%; text-align: center;">
                                <form method="POST" action="{{ route('adminOffer.changeStatus', $offer->id) }}" id="update-offer-form-{{ $offer->id }}">
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
                {{ $offers->links() }}

              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.lordicon.com/lordicon.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      @if(session('success'))
      <script>
          // Display SweetAlert message when the document is ready
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: '{{ session('success') }}'
              });
          });
      </script>
      @endif
@endsection
