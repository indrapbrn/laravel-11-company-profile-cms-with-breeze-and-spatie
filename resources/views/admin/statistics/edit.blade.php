<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Statistics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                
                <form method="POST"
                      action="{{ route('admin.statistics.update', $statistic) }}"
                      enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')

                    {{-- NAME --}}
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input
                            id="name"
                            class="block mt-1 w-full"
                            type="text"
                            name="name"
                            :value="old('name', $statistic->name)"
                            required
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- ICON --}}
                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('Icon')" />

                        <img src="{{ Storage::url($statistic->icon) }}"
                             alt="icon"
                             class="rounded-2xl object-cover w-[90px] h-[90px] mb-3">

                        <x-text-input
                            id="icon"
                            class="block mt-1 w-full"
                            type="file"
                            name="icon"
                        />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    </div>

                    {{-- GOAL --}}
                    <div class="mt-4">
                        <x-input-label for="goal" :value="__('Goal')" />
                        <x-text-input
                            id="goal"
                            class="block mt-1 w-full"
                            type="text"
                            name="goal"
                            :value="old('goal', $statistic->goal)"
                            required
                        />
                        <x-input-error :messages="$errors->get('goal')" class="mt-2" />
                    </div>

                    {{-- SUBMIT --}}
                    <div class="flex items-center justify-end mt-6">
                        <button type="submit"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Statistic
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
