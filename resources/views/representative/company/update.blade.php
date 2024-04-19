<x-dashboard>
    <div class="bg-dark rounded-3xl pt-10 mb-5">
        <h1 class=" text-3xl font-bold mb-10 pt-5 text-center" style="color: rgb(130, 58, 208)">Edit Company</h1>

        <form method="POST" action="{{ route('representativeCompany.update', $company->id) }}"
            enctype="multipart/form-data"class="w-full max-w-xl  mx-auto bg-white rounded shadow-xl relative pb-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="company_id" value="{{ $company->id}}">
            <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                <label for="image-input" class="cursor-pointer">
                    <img id="preview-image" class="rounded-full border-4 border-purple-100 w-48 h-48 mb-4 md:mb-0"
                        src="{{ $company->getFirstMediaUrl('company') }}" alt="logo">
                </label>
                <input type="file" id="image-input" name="logo" class="hidden" onchange="previewImage(event)">
            </div>
            <div class="py-5 px-5 md:px-8">
                <div class="rounded py-5">
                    <div class="mb-1 p-2">
                        <label for="name">Company name</label>
                        <input id="name" name="name" type="text" placeholder="company name"
                            value="{{ $company->name }}"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-violet-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <label for="localisation">Localisation</label>
                        <input id="localisation" name="location" type="text" placeholder="location"
                            value="{{ $company->location }}"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-violet-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <label for="description">Description</label>
                        <input id="description" name="description" type="text" placeholder="company description"
                            value="{{ $company->description }}"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-violet-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>


                </div>
                    <div class="w-full">
                        <button
                            class="h-auto lg:h-12  py-2 lg:py-2 px-1 lg-px-1 text-white font-bold tracking-wider bg-violet-800 rounded-lg uppercase w-full focus:outline-none focus:shadow-outline"
                            type="submit">Send</button>
                    </div>
            </div>
        </form>



    </div>
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
</x-dashboard>
