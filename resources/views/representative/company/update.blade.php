<x-dashboard>
    <div class="bg-dark rounded-3xl pt-10 mb-5">
        <h1 class="text-dark text-3xl font-bold mb-10 pt-5 text-center">Edit Company</h1>

        <form method="POST" action="{{ route('representativeCompany.update', $company->id) }}"
            enctype="multipart/form-data"class="w-full max-w-xl mx-auto bg-white rounded shadow-xl relative py-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="company_id" value="{{ $company->id}}">
            <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                <label for="image-input" class="cursor-pointer">
                    <img id="preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                        src="{{ $company->getFirstMediaUrl('company') }}" alt="logo">
                </label>
                <input type="file" id="image-input" name="logo" class="hidden" onchange="previewImage(event)">
            </div>
            <div class="py-2 px-4 md:px-8">

                <div class="bg-gray-200 rounded py-2">

                    <div class="mb-1 p-2">
                        <label for="name">Company name</label>
                        <input id="name" name="name" type="text" placeholder="company name"
                            value="{{ $company->name }}"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <label for="localisation">Localisation</label>
                        <input id="localisation" name="location" type="text" placeholder="location"
                            value="{{ $company->location }}"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <label for="description">Description</label>
                        <input id="description" name="description" type="text" placeholder="company description"
                            value="{{ $company->description }}"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>


                </div>
                <div class="mt-4">
                    <div class="w-full">
                        <button
                            class="h-auto lg:h-12 text-xs py-1 lg:py-2 px-2 lg-px-4 text-white font-light tracking-wider bg-gray-900 rounded-lg uppercase w-full focus:outline-none focus:shadow-outline"
                            type="submit">Send</button>
                    </div>
                </div>
            </div>
        </form>



    </div>
</x-dashboard>
