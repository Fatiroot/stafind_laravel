<x-dashboard>
    <div class="relative overflow-x-auto mt-5 ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-white  dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Application date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Candidate
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        View profile
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $request->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $request->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $request->user->fullname }}
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="{{ route('RequestchangeStatus', $request->id) }}" id="update-offer-form-{{ $request->id }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-link text-decoration-none">
                                    @if($request->status == 1)
                                        <span class="inline-block bg-green-500 text-white px-2 py-1 rounded-md mr-2">Accepted</span>
                                    @else
                                        <span class="inline-block bg-red-500 text-white px-2 py-1 rounded-md mr-2">Pending</span>
                                    @endif
                                </button>
                            </form>

                           </td>
                           <td class="px-6 py-4">
                            <a href="{{ route('showProfile', $request->user->id) }}" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/vfczflna.json"
                                    colors="primary:#848484,secondary:#3080e8"
                                    style="width:20px;height:20px; cursor: pointer;"
                                >
                                </lord-icon>
                            </a>
                        </td>
                           <td class="px-6 py-4">
                            <!-- Modal toggle -->
                            <button data-modal-target="default-modal-{{ $request->id }}" data-modal-toggle="default-modal-{{ $request->id }}"
                                class="text-blue-800 hover:bg-blue-200 rounded-lg font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                See Application
                            </button>

                            <!-- Main modal -->
                            <div id="default-modal-{{ $request->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            Please review the candidate's CV using the following link -->
                                            <a href="{{ $request->getFirstMediaUrl('CVs')}}"
                                                class="font-semibold text-blue-600 text-lg pl-2 dark:text-blue-500 hover:underline"> CV</a>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="default-modal-{{ $request->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                {!! $request->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard>

