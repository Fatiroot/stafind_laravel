@extends('components.dashboardAdmin')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Users table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Profile</th>
                            <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Full Name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Addres</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Phone</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Role</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td style="width: 10%; text-align: center;">
                                <div class="align-middle text-center text-sm">
                                    <div>
                                        <img src="{{$user->getFirstMediaUrl('user')}}" class="avatar me-3 rounded-circle" alt="company" style="width: 50px; height: 50px full-rounded;">
                                    </div>
                                </div>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <h6 class=" text-xs font-weight-bold mb-0">{{ $user->fullname }}</h6>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $user->email }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $user->address }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <span class=" text-xs font-weight-bold mb-0">{{ $user->phone }}</span>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                @foreach ($user->roles as $role)
                                <span class=" text-xs font-weight-bold  mb-0">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <form method="POST" action="{{ route('admin.changeStatus', $user->id) }}" id="update-user-form-{{ $user->id }}">
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
                            <td style="width: 10%; text-align: center;">
                                <form action="{{ route('representative.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" style="background-color: white; border:none;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/drxwpfop.json"
                                            trigger="hover"
                                            colors="primary:#66a1ee,secondary:#3080e8"
                                            style="width:30px;height:30px">
                                        </lord-icon>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $users->links() }}

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
