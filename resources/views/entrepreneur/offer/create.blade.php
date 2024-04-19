<x-dashboardEntr>

    <h1 class="mb-10 border-b py-4 text-4xl text-center font-extrabold text-gray-900 dark:text-white "><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Start Attracting Talent :</span> Create a New Offer Listing.</h1>
<form class="px-10" method="POST" action="{{route('entrepreneurOffer.store')}}" >
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
    <input type="hidden" name="company_id" value="{{Auth::user()->company->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Offer's title</label>
        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
            <select id="city_id" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">select a city</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{$city->name}}</option>
            @endforeach
            </select>
        </div>
        <div>
            <label for="domain_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domain</label>
            <select id="domain_id" name="domain_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">select a domain</option>
                @foreach ($domains as $domain)
                <option value="{{ $domain->id }}">{{$domain->name}}</option>
            @endforeach
            </select>
        </div>
        <div>
            <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
            <input type="number" id="duration" name="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
        </div>
        <div>
            <label for="localisation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">localisation</label>
            <input type="text" id="localisation" name="localisation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </input>
        </div>
        <div>
            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Salary</label>
            <input type="number" name="salary" id="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="DH" required />
        </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description">
            </textarea>
        </div>
   </div>
    <button type="submit" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="background-color: rgb(103, 40, 203)">Submit</button>
</form>



</x-dashboard>
