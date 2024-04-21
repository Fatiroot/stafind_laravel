<x-dashboard>

    <!-- component -->
    <div class=" w-full my-10 mx-auto max-w-6xl">
            <div class="p-4 col-span-6 md:col-span-4" >
                <form method="POST" action="">
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
                    </div>
                </form>
            </div>
            <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
                <div class="col-span-2 mx-auto">
                    <h2 class="text-align mb-4 "style="color: #333;font-weight: bold;">Experiences</h2>
                </div>
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
       <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
            <div class="col-span-2 mx-auto">
                <h2 class="text-align m -4 "style=" color: #333;font-weight: bold";>Formations</h2>
            </div>
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
            <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
                <div class="col-span-2 mx-auto">
                    <h2 class="text-align m -4 "style=" color: #333;font-weight: bold">Skills</h2>
                </div>
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
                        </div>
                    </div>
                </div>
            </div>
            {{-- end-card --}}
            @endforeach
        </div>
    </div>
  </div>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-dashboard>
