<x-dashboardEntr>

    <!-- component -->
    <div class=" w-full my-10 mx-auto max-w-6xl">
            <div class="p-4 col-span-6 md:col-span-4" >
                <form method="POST" action="{{ route('entrepreneur.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
                        <div class="col-span-2 mx-auto">
                            <h2 class="text-align mb-4" style=" color: #333;font-weight: bold;">Personal Information</h2>

                            <label for="image-input" class="cursor-pointer">
                                <img id="preview-image"
                                    class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                                    src="{{ $user->getFirstMediaUrl('user') }}" alt="user image">
                            </label>
                            <input type="file" id="image-input" name="image" class="hidden"
                                onchange="previewImage(event)">

                        </div>
                        <div class="col-span-2">
                            <label for="fullname"
                                class="block text-sm font-medium leading-6 ">Fullname</label>
                            <div class="mt-2">
                                <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="phone" class="block text-sm font-medium leading-6 ">Phone</label>
                            <div class="mt-2">
                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}"
                                    autocomplete="given-phone-number"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="address" class="block text-sm font-medium leading-6 ">address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address" value="{{ $user->address }}"
                                    autocomplete="address"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="block text-sm font-medium leading-6">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" value="{{ $user->email }}"
                                    autocomplete="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="email" class="block text-sm font-medium leading-6">Password</label>
                            <input type="password" name="password" id="password"
                            placeholder="Password"
                                class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="mt-2">
                            <label for="email" class="block text-sm font-medium leading-6">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="password"
                            placeholder="Confirm Password"
                                class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="block text-white bg-violet-700 mx-4 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">Save</button>
                    </div>
                </form>
            </div>
            <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
                <div class="col-span-2 mx-auto">
                    <h2 class="text-align mb-4 "style="color: #333;font-weight: bold;">Experiences</h2>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button data-modal-target="experience-modal" data-modal-toggle="experience-modal"
                        class="block text-white bg-violet-700 mx-4 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800"
                        type="button">
                        Add Experience
                </button>
            </div>
            @foreach ($experiences as $experience)
            {{-- card --}}
            <div
                class="relative py-5 flex w-full  flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
                <div
                    class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                    <div class="flex w-full flex-col gap-0.5">
                        <div class="flex items-center justify-between px-4">
                            <h5
                                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                {{ $experience->name }}
                            </h5>
                            <div class="flex items-center gap-5">
                                <!-- Edit Icon -->
                                <!-- Modal toggle -->
                                <a href="#"
                                    data-modal-target="edit-experience-modal{{ $experience->id }}"
                                    data-modal-toggle="edit-experience-modal{{ $experience->id }}">
                                    <lord-icon
                                    src="https://cdn.lordicon.com/ylvuooxd.json"
                                    trigger="hover"
                                    colors="primary:#ffffff,secondary:#8930e8,tertiary:#848484,quaternary:#8930e8"
                                    style="width:30px;height:30px">
                                    </lord-icon>
                                </a>
                                <!-- Main modal -->
                                <div id="edit-experience-modal{{ $experience->id }}" tabindex="-1"
                                    aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100% - 1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div
                                            class="relative bg-violet-300 rounded-lg shadow dark:bg-violet-800">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3
                                                    class="text-xl font-semibold text-gray-900 dark:text-black">
                                                    edit your experience </h3>
                                                <button type="button"
                                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="edit-experience-modal{{ $experience->id }}">
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
                                            <div class="p-4 md:p-5">
                                                <form class="space-y-4"
                                                    action="{{ route('entrepreneurExperience.update', $experience->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id"
                                                        value="{{ $experience->id }}"> <input type="hidden"
                                                        name="user_id" value="{{ $user->id }}">
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                            name</label>
                                                        <input type="text" name="name" id="name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                            placeholder="name"
                                                            value="{{ $experience->name }}" required />
                                                    </div>
                                                    <div>
                                                        <label for="company_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                            company name</label>
                                                        <input type="text" name="company_name"
                                                            id="company_name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                            placeholder="company name"
                                                            value="{{ $experience->company_name }}"
                                                            required />
                                                    </div>
                                                    <div>
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                            description</label>
                                                        <textarea name="description" id="description" rows="5"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">{{ $experience->description }}</textarea>
                                                    </div>
                                                    <div>
                                                        <label for="start_date"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                            start date</label>
                                                        <input type="date" name="start_date"
                                                            id="start_date"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                                            value="{{ $experience->start_date }}" required />
                                                    </div>
                                                    <div>
                                                        <label for="end_date"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                            end date</label>
                                                        <input type="date" name="end_date" id="end_date"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                                            value="{{ $experience->end_date }}" required />
                                                    </div>
                                                    <div>
                                                        <label for="task"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                            task</label>
                                                        <input type="text" name="task" id="task"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                            placeholder="task"
                                                            value="{{ $experience->task }}" required />
                                                    </div>

                                                    <button type="submit"
                                                        class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                                        save
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Icon -->
                                <form
                                    action="{{ route('entrepreneurExperience.destroy', $experience->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $experience->id }}">
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this experience?')">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/hjbrplwk.json"
                                            trigger="hover"
                                            colors="primary:#e4e4e4,secondary:#848484,tertiary:#b4b4b4,quaternary:#e4e4e4"
                                            style="width:30px;height:30px">
                                        </lord-icon>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <span class="px-4">{{ $experience->start_date }} | {{ $experience->end_date }}</span>
                        <p
                            class=" px-4 block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                            {{ $experience->company_name }}
                        </p>
                        <p
                            class=" px-4 block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                            {{ $experience->task }}
                        </p>
                    </div>
                </div>
                <div class="px-4 mb-4">
                    <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                        {{ $experience->description }}
                    </p>
                </div>
            </div>
            {{-- end-card --}}
        @endforeach
                <!-- Main modal -->
                <div id="experience-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-violet-300 rounded-lg shadow dark:bg-violet-800">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                    Add new experience </h3>
                                <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="experience-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form class="space-y-4" action="{{ route('entrepreneurExperience.store') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            name</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                            placeholder="name" required />
                                    </div>
                                    <div>
                                        <label for="company_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            company name</label>
                                        <input type="text" name="company_name" id="company_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                            placeholder="company name" required />
                                    </div>
                                    <div>
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            description</label>
                                        <textarea name="description" id="description" rows="5"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"></textarea>
                                    </div>
                                    <div>
                                        <label for="start_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            start date</label>
                                        <input type="date" name="start_date" id="start_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                            required />
                                    </div>
                                    <div>
                                        <label for="end_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            end date</label>
                                        <input type="date" name="end_date" id="end_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                            required />
                                    </div>
                                    <div>
                                        <label for="task"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            task</label>
                                        <input type="text" name="task" id="task"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                            placeholder="task" required />
                                    </div>

                                    <button type="submit"
                                        class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                        save
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- end modal --}}





        <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
            <div class="col-span-2 mx-auto">
                <h2 class="text-align m -4 "style=" color: #333;font-weight: bold";>Formations</h2>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button data-modal-target="formation-modal" data-modal-toggle="formation-modal"
                    class="block text-white bg-violet-700 mx-4 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800"
                    type="button">
                    Add Formation
            </button>
        </div>
        @foreach ($user->formations as $formation)
        {{-- card --}}
        <div
            class="relative py-5 flex w-full  flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
            <div
                class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                <div class="flex w-full flex-col gap-0.5">
                    <div class="flex items-center justify-between px-4">
                        <h5
                            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            {{ $formation->name }}
                        </h5>
                        <div class="flex items-center gap-5">
                            <!-- Edit Icon -->
                            <!-- Modal toggle -->
                            <a href="#"
                                data-modal-target="edit-formation-modal{{ $formation->id }}"
                                data-modal-toggle="edit-formation-modal{{ $formation->id }}">
                                <lord-icon
                                src="https://cdn.lordicon.com/ylvuooxd.json"
                                trigger="hover"
                                colors="primary:#ffffff,secondary:#8930e8,tertiary:#848484,quaternary:#8930e8"
                                style="width:30px;height:30px">
                                </lord-icon>
                            </a>
                            <!-- Main modal -->
                            <div id="edit-formation-modal{{ $formation->id }}" tabindex="-1"
                                aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100% - 1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div
                                        class="relative bg-violet-300 rounded-lg shadow dark:bg-violet-800">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3
                                                class="text-xl font-semibold text-gray-900 dark:text-black">
                                                edit your formation </h3>
                                            <button type="button"
                                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="edit-formation-modal{{ $formation->id }}">
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
                                        <div class="p-4 md:p-5">
                                            <form class="space-y-4"
                                                action="{{ route('entrepreneurFormation.update', $formation->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id"
                                                    value="{{ $formation->id }}"> <input type="hidden"
                                                    name="user_id" value="{{ $user->id }}">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                        name</label>
                                                    <input type="text" name="name" id="name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                        placeholder="name"
                                                        value="{{ $formation->name }}" required />
                                                </div>
                                                <div>
                                                    <label for="etablissement"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                        etablissement</label>
                                                    <input type="text" name="etablissement"
                                                        id="etablissement"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                        placeholder="company name"
                                                        value="{{ $formation->etablissement }}"
                                                        required />
                                                </div>
                                                <div>
                                                    <label for="start_date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                        start date</label>
                                                    <input type="date" name="start_date"
                                                        id="start_date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                                        value="{{ $formation->start_date }}" required />
                                                </div>
                                                <div>
                                                    <label for="end_date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                        end date</label>
                                                    <input type="date" name="end_date" id="end_date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                                        value="{{ $formation->end_date }}" required />
                                                </div>

                                                <button type="submit"
                                                    class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                                    save
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Icon -->
                            <form
                                action="{{ route('entrepreneurFormation.destroy', $formation->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $formation->id }}">
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this formation?')">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/hjbrplwk.json"
                                        trigger="hover"
                                        colors="primary:#e4e4e4,secondary:#848484,tertiary:#b4b4b4,quaternary:#e4e4e4"
                                        style="width:30px;height:30px">
                                    </lord-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                    <span class="px-4">{{ $formation->start_date }} | {{ $formation->end_date }}</span>
                    <p
                        class=" px-4 block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                        {{ $formation->etablissement }}
                    </p>

                </div>
            </div>

        </div>
        {{-- end-card --}}
        @endforeach
            <!-- Main modal -->
            <div id="formation-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-violet-300 rounded-lg shadow dark:bg-violet-800">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                Add new formation </h3>
                            <button type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="formation-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="{{ route('entrepreneurFormation.store') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                        name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                        placeholder="name" required />
                                </div>
                                <div>
                                    <label for="etablissement"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                        etablissement</label>
                                    <input type="text" name="etablissement" id="etablissement"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                        placeholder="etablissement" required />
                                </div>
                                <div>
                                    <label for="start_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                        start date</label>
                                    <input type="date" name="start_date" id="start_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                        required />
                                </div>
                                <div>
                                    <label for="end_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                        end date</label>
                                    <input type="date" name="end_date" id="end_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                        required />
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                    save
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}


            <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
                <div class="col-span-2 mx-auto">
                    <h2 class="text-align m -4 "style=" color: #333;font-weight: bold">Skills</h2>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button data-modal-target="skill-modal" data-modal-toggle="skill-modal"
                        class="block text-white bg-violet-700 mx-4 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800"
                        type="button">
                        Add Skills
                </button>
            </div>
            @foreach ($user->skills as $skill)
            {{-- card --}}
            <div
                class="relative py-0 flex w-full  flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
                <div
                    class="relative flex items-center gap-4 pt-0 pb-4 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                    <div class="flex w-full flex-col gap-0.5">
                        <div class="flex items-center justify-between px-4">
                            <h5
                                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                {{ $skill->name }}
                            </h5>
                            <div class="flex items-center gap-5">
                                <!-- Edit Icon -->
                                <!-- Modal toggle -->
                                <a href="#"
                                    data-modal-target="edit-skill-modal{{ $skill->id }}"
                                    data-modal-toggle="edit-skill-modal{{ $skill->id }}">
                                    <lord-icon
                                    src="https://cdn.lordicon.com/ylvuooxd.json"
                                    trigger="hover"
                                    colors="primary:#ffffff,secondary:#8930e8,tertiary:#848484,quaternary:#8930e8"
                                    style="width:30px;height:30px">
                                    </lord-icon>
                                </a>
                                <!-- Main modal -->
                                <div id="edit-skill-modal{{ $skill->id }}" tabindex="-1"
                                    aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100% - 1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div
                                            class="relative bg-violet-300 rounded-lg shadow dark:bg-violet-800">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3
                                                    class="text-xl font-semibold text-gray-900 dark:text-black">
                                                    edit your skill </h3>
                                                <button type="button"
                                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="edit-skill-modal{{ $skill->id }}">
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
                                            <div class="p-4 md:p-5">
                                                <form class="space-y-4"
                                                    action="{{ route('entrepreneurSkill.update', $skill->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id"
                                                        value="{{ $skill->id }}"> <input type="hidden"
                                                        name="user_id" value="{{ $user->id }}">
                                                        <div>
                                                            <select name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                                                <option value="{{ $skill->name }}">Select a skill</option>
                                                                @foreach ($allSkills as $sSkill)
                                                                    <option value="{{ $sSkill->name }}">{{ $sSkill->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    <button type="submit"
                                                        class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                                        save
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Icon -->
                                <form
                                    action="{{ route('entrepreneurSkill.destroy', $skill->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $skill->id }}">
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this skill?')">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/hjbrplwk.json"
                                            trigger="hover"
                                            colors="primary:#e4e4e4,secondary:#848484,tertiary:#b4b4b4,quaternary:#e4e4e4"
                                            style="width:30px;height:30px">
                                        </lord-icon>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end-card --}}
            @endforeach
                <!-- Main modal -->
                <div id="skill-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-violet-300 rounded-lg shadow dark:bg-violet-800">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                    Add new skill </h3>
                                <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="skill-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form class="space-y-4" action="{{ route('entrepreneurSkill.store') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div>
                                        <select name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" required>
                                            <option value="">Select a skill</option>
                                            @foreach ($allSkills as $skill)
                                                <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                        save
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}


        </div>
    </div>
  </div>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>

</x-dashboard>
