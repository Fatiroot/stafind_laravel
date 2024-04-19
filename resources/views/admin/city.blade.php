@extends('components.dashboardAdmin')
@section('content')
<div class="row">
    <div class="card mb-4">
            <div class="card-header pb-0" style="display: flex; justify-content: space-between;">
                <h6>Cities table</h6>
                <button type="button" class="btn btn-sm text-white" style="background: rgb(130, 210, 242);" data-bs-toggle="modal" data-bs-target="#createCityModal">Create City</button>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="width: 100%;"> <!-- Each table takes full width of its container -->
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">ID</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">Name</th>
                                <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span >{{ $city->id }}</span>
                                </td>
                                <td style="width: 40%;">
                                    <h6 class="text-center text-xs font-weight-bold mb-0">{{ $city->name }}</h6>
                                </td>
                                <td style="width: 30%;">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!-- Edit button and modal -->
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#updateCityModal{{ $city->id }}">Edit</button>
                                            <!-- Update City Modal -->
                                            <div class="modal fade" id="updateCityModal{{ $city->id }}" tabindex="-1" aria-labelledby="updateCityModal{{ $city->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateCityModal{{ $city->id }}Label">Update City Name</h5>
                                                            <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('adminCity.update', $city->id) }}" method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <div class="form-group">
                                                                    <label for="cityName">New City Name</label>
                                                                    <input type="text" class="form-control" id="cityName" name="name" value="{{ $city->name }} "  required="">
                                                                </div>
                                                                <button type="submit" class="btn btn-outline-success">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete button -->
                                        <div>
                                            <form action="{{ route('adminCity.destroy', $city->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>


    <!-- Modal city -->
<div class="modal fade" id="createCityModal" tabindex="-1" aria-labelledby="createCityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCityModalLabel">Create City</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('adminCity.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">City Name</label>
                        <input type="text" class="form-control" id="cityName" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ************************************ --}}
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
