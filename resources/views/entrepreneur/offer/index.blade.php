<x-dashboardEntr>
    <div class="m-4" style="text-align: right ;">
        <button type="submit" class="text-white p-2 border-0 rounded-md bg-violet-800">
            <a href="{{ route('entrepreneurOffer.create') }}" class="block">Create Offer</a>
        </button>
    </div>

 <div class="grid p-4  md:grid-cols-1  xl:grid-cols-3 sm:grid-cols-3 gap-4">

        @foreach ($offers as $offer)
            <div class="bg-white shadow rounded-lg py-4 px-5 my-4" style="background-color: rgb(241, 241, 244)">
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <img src="{{ $offer->user->company->getFirstMediaUrl('company') }}" alt="Company logo"
                            class="h-14 w-14 mr-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">{{ $offer->title }} </h2>
                            <p class="text-gray-600">{{ $offer->user->company->name }} - {{ $offer->city->name }}
                            </p>
                        </div>
                    </div>
                    <div>

                        <button id="dropdownMenuIconHorizontalButton-{{ $offer->id }}"
                            data-dropdown-toggle="dropdownDotsHorizontal-{{ $offer->id }}"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal-{{ $offer->id }}"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton-{{ $offer->id }}">
                                <li>
                                    <a href="{{ route('entrepreneurOffer.edit', ['entrepreneurOffer'=> $offer->id]) }}"
                                        class="block px-4 py-2 text-md font-semibold text-yellow-700  dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit
                                        offer</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <form action="{{ route('entrepreneurOffer.destroy',['entrepreneurOffer'=> $offer->id]) }}" method="post" class="hover:bg-gray-100">
                                    @method('delete')
                                    @csrf
                                    <button
                                        class="block px-4 py-2 text-md font-semibold text-red-700  dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Delete offer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 px-20">
                    <p class="text-gray-600">
                        duration : {{ $offer->duration }}
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mt-2">
                        <li class="text-gray font-semibold">localisation : {{ $offer->localisation }}</li>
                        <li class="text-gray font-semibold">domain : {{ $offer->domain->name }}</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <a href="#" class="text-blue-600 font-semibold text-lg hover:underline">Salary :
                        {{ $offer->salary }} DH for months</a>
                </div>
                <div class="flex justify-between mt-2">
                    <p class="text-gray-600">
                        • {!! $offer->description !!}
                    </p>
                    <div class="flex flex-col gap-4">
                        <button class="hover:text-blue-500">
                            <span class="text-gray-900 whitespace-no-wrap">
                                @if($offer->status == 0)
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-4 py-1 rounded dark:bg-green-900 dark:text-indigo-300">Accepted</span>
                                @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-4 py-1 rounded dark:bg-red-900 dark:text-indigo-300">Refused</span>
                                @endif
                            </span>
                        </button>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-green-400">
                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                            </svg>
                            {{ $offer->created_at->diffForHumans() }}
                        </span>
                    </div>

                </div>
            </div>
        @endforeach


</div>
</x-dashboardEntr>
