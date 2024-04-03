@extends('components.dashboardAdmin')
@section('content')
<div class="row">
    <div class="col-md-6"> <!-- First column takes 50% width on medium screens and above -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Cities table</h6>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createCityModal">Create City</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="width: 100%;"> <!-- Each table takes full width of its container -->
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 40%;">Name</th>
                                <th class="text-secondary opacity-7" style="width: 30%;"></th>
                            </tr>
                        </thead>
                        @foreach ($cities as $city)
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">{{ $city->id }}</span>
                                </td>
                                <td style="width: 70%;">
                                    <h6 class="text-xs font-weight-bold mb-0">{{ $city->name }}</h6>
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
                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ************************************ --}}

    <div class="col-md-6"> <!-- Second column takes 50% width on medium screens and above -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Cities table</h6>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createDomainModal">Create Domain</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="width: 100%;"> <!-- Each table takes full width of its container -->
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 40%;">Name</th>
                                <th class="text-secondary opacity-7" style="width: 30%;"></th>
                            </tr>
                        </thead>
                        @foreach ($domains as $domain)
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">{{ $domain->id }}</span>
                                </td>
                                <td style="width: 70%;">
                                    <h6 class="text-xs font-weight-bold mb-0">{{ $domain->name }}</h6>
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
    <!-- Modal domain -->
    <div class="modal fade" id="createDomainModal" tabindex="-1" aria-labelledby="createDomainModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDomainModalLabel">Create Domain</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('adminDomain.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Domain Name</label>
                            <input type="text" class="form-control" id="cityName" name="name" required>
                        </div>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ************************************ --}}

@endsection
