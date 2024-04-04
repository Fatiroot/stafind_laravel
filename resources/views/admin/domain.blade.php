@extends('components.dashboardAdmin')
@section('content')
<div class="row">
        <div class="card mb-4">
            <div class="card-header pb-0" style="display: flex; justify-content: space-between;">
                <h6>Domains table</h6>
                <button type="button" class="btn btn-primary text-white btn-sm" style="background: rgb(130, 210, 242);" data-bs-toggle="modal" data-bs-target="#createDomainModal">Create Domain</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">ID</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">Action</th>
                            </tr>
                        </thead>
                        @foreach ($domains as $domain)
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span>{{ $domain->id }}</span>
                                </td>
                                <td style="width: 40%;">
                                    <h6 class="text-center text-xs font-weight-bold mb-0">{{ $domain->name }}</h6>
                                </td>
                                <td style="width: 30%;">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!-- Edit button and modal -->
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#updateDomainModal{{ $domain->id }}">Edit</button>
                                            <!-- Update Domain Modal -->
                                            <div class="modal fade" id="updateDomainModal{{ $domain->id }}" tabindex="-1" aria-labelledby="updateDomainModal{{ $domain->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateDomainModal{{ $domain->id }}Label">Update Domain Name</h5>
                                                            <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('adminDomain.update', $domain->id) }}" method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <div class="form-group">
                                                                    <label for="domainName">New Domain Name</label>
                                                                    <input type="text" class="form-control" id="domainName" name="name" value="{{ $domain->name }} "  required="">
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
                                            <form action="{{ route('adminDomain.destroy', $domain->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
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
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ************************************ --}}

@endsection
