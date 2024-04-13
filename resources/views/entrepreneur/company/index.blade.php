<x-dashboardEntr>
    <div class="  p-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-purple-600">Company Profile</h1>

        <div class="flex flex-col md:flex-row items-center justify-center md:justify-start">
            <div class="md:mr-8">
                <img id="preview-image" class="rounded-full border-4 border-purple-100 w-48 h-48 mb-4 md:mb-0"
                    src="{{ $company->getFirstMediaUrl('company') }}" alt="Company Logo">
            </div>
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">Company Name:</label>
                    <p class="text-gray-900">{{ $company->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="location">Location:</label>
                    <p class="text-gray-900">{{ $company->location }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <label class="block text-gray-700 font-bold mb-2" for="description">Description:</label>
            <p class="text-gray-900">{{ $company->description }}</p>
        </div>
    </div>



</x-dashboardEntr>
