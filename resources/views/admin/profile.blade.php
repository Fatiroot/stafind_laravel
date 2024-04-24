@extends('components.dashboardAdmin')
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">Personal Information</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminUser.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <label for="image-input" class="form-label cursor-pointer text-center">
                        <img id="preview-image" class="img-thumbnail rounded-circle border border-secondary" src="{{ $user->getFirstMediaUrl('user') }}" alt="user image" style="width: 150px; height: 150px;">
                        <input type="file" id="image-input" name="image" class="form-control-file d-none" onchange="previewImage(event)">
                    </label>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" value="{{ $user->address }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input id="email" name="email" type="email" value="{{ $user->email }}" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
                    </div>
                </div>


                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="text-center mb-4" style="color: #333; font-weight: bold;">Experiences</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#experience-modal">
                    Add Experience
                </button>
            </div>
        </div>


        @foreach ($experiences as $experience)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title">{{ $experience->name }}</h5>
                        <span class="text-muted ">{{ $experience->start_date }} | {{ $experience->end_date }}</span>
                        <p class="card-text mt-3">{{ $experience->company_name }}</p>
                        <p class="card-text">{{ $experience->task }}</p>
                        <p class="card-text">{{ $experience->description }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <!-- Edit Experience Icon -->
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editExperienceModal{{ $experience->id }}">
                            Edit
                        </a>
                        <!-- Delete Experience Icon -->
                        <form action="{{ route('representativeExperience.destroy', $experience->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this formation?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Experience Modal -->
        <div class="modal fade" id="editExperienceModal{{ $experience->id }}" tabindex="-1" aria-labelledby="editExperienceModalLabel{{ $experience->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editExperienceModalLabel{{ $experience->id }}">Edit Your Experience</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('representativeExperience.update', $experience->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id"
                            value="{{ $experience->id }}"> <input type="hidden"
                            name="user_id" value="{{ $user->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $experience->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Your Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $experience->company_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Your Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $experience->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Your Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $experience->start_date }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Your End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $experience->end_date }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="task" class="form-label">Your Task</label>
                                <input type="text" class="form-control" id="task" name="task" value="{{ $experience->task }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Add Experience Modal -->
        <div class="modal fade" id="experience-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Experience</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('representativeExperience.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Your Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Your Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Your Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Your End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="task" class="form-label">Your Task</label>
                                <input type="text" class="form-control" id="task" name="task" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Experience</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- Add Formation Button -->
<div class="row mt-5">
    <div class="col-12">
        <h4 class="text-center mb-4" style="color: #333; font-weight: bold;">Formation</h4>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formationModal">
        Add Formation
    </button>
</div>

<!-- Formations List -->
@foreach ($user->formations as $formation)
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">{{ $formation->name }}</h5>
        <p class="card-text">{{ $formation->etablissement }}</p>
        <p class="card-text">{{ $formation->start_date }} | {{ $formation->end_date }}</p>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <!-- Edit Formation Icon -->
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editFormationModal{{ $formation->id }}">
                Edit
            </a>
            <!-- Delete Formation Icon -->
            <form action="{{ route('representativeFormation.destroy', $formation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this formation?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Edit Formation Modal -->
<div class="modal fade" id="editFormationModal{{ $formation->id }}" tabindex="-1" aria-labelledby="editFormationModalLabel{{ $formation->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormationModalLabel{{ $formation->id }}">Edit Your Formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('representativeFormation.update', $formation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" value="{{ $formation->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEtablissement" class="form-label">Etablissement</label>
                        <input type="text" class="form-control" id="editEtablissement" name="etablissement" value="{{ $formation->etablissement }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="editStartDate" name="start_date" value="{{ $formation->start_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="editEndDate" name="end_date" value="{{ $formation->end_date }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Add Formation Modal -->
<div class="modal fade" id="formationModal" tabindex="-1" aria-labelledby="formationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formationModalLabel">Add New Formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('representativeFormation.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="newName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="newName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="newEtablissement" class="form-label">Etablissement</label>
                        <input type="text" class="form-control" id="newEtablissement" name="etablissement" required>
                    </div>
                    <div class="mb-3">
                        <label for="newStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="newStartDate" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="newEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="newEndDate" name="end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="text-center mb-4" style="color: #333; font-weight: bold;">Skills</h4>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#skillModal">
                Add Skills
            </button>
        </div>
    </div>

    @foreach ($user->skills as $skill)
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $skill->name }}</h5>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <!-- Edit Icon -->
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSkillModal{{ $skill->id }}">
                    Edit
                </a>
                <!-- Delete Icon -->
                <form action="{{ route('representativeSkill.destroy', $skill->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this skill?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Skill Modal -->
    <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1" aria-labelledby="editSkillModalLabel{{ $skill->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSkillModalLabel{{ $skill->id }}">Edit Your Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('representativeSkill.update', $skill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editSkill" class="form-label">Skill</label>
                            <select name="name" id="editSkill" class="form-select" required>
                                @foreach ($allSkills as $sSkill)
                                <option value="{{ $sSkill->name }}" {{ $skill->name == $sSkill->name ? 'selected' : '' }}>{{ $sSkill->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Add Skill Modal -->
    <div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="skillModalLabel">Add New Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('representativeSkill.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="newSkill" class="form-label">Skill</label>
                            <select name="name" id="newSkill" class="form-select" required>
                                <option value="" disabled selected>Select a skill</option>
                                @foreach ($allSkills as $skill)
                                <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
