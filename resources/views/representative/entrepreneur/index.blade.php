<x-dashboard>
    <div class="container px-6 mx-auto grid">

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs  mt-5">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Recuiter</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $user->getFirstMediaUrl('user') }}" alt=""
                                                loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $user->fullname }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        active
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <form action="{{route('representative.destroy' , $user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                          <button>
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100  dark:bg-red-700 dark:text-red-100">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-dashboard>
