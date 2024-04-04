@extends('components.dashboardAdmin')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Companies table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Profile</th>
                            <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Full Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Addres</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Phone</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Role</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td style="width: 10%;">
                                <div class="align-middle text-center text-sm">
                                    <div>
                                        <img src="{{$user->getFirstMediaUrl('user')}}" class="avatar me-3 rounded-circle" alt="company" style="width: 50px; height: 50px full-rounded;">
                                    </div>
                                </div>
                            </td>
                            <td style="width: 10%;">
                                <h6 class=" text-xs font-weight-bold mb-0">{{ $user->fullname }}</h6>
                            </td>
                            <td style="width: 10%;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $user->email }}</span>
                            </td>
                            <td style="width: 10%;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $user->address }}</span>
                            </td>
                            <td style="width: 10%;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $user->phone }}</span>
                            </td>
                            <td style="width: 10%;">
                                @foreach ($user->roles as $role)
                                <span class=" text-xs font-weight-bold  mb-0">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td style="width: 10%;">
                                <form method="POST" action="{{ route('updateStatus', $user->id) }}" id="update-user-form-{{ $user->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link text-decoration-none  ">
                                        @if($user->status == 1)
                                            <span class="badge bg-success p-2 me-2">Accepted</span>
                                        @else
                                            <span class="badge bg-danger p-2 me-2">Banned</span>
                                        @endif
                                    </button>
                                </form>

                            </td>
                            <td style="width: 10%;"></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
