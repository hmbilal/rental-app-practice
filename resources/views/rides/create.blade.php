<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Create Ride
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('dashboard.rides') }}"
                   class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-second hover:bg-second-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-second">
                    Back to Rides
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <form class="space-y-8 divide-y divide-gray-200 p-6" action="{{route('dashboard.rides.store')}}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-8 divide-y divide-gray-200">

                            <div class="pt-8">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">
                                            Hourly Rate
                                        </label>
                                        <div class="mt-1">
                                            <input type="number" name="hourly_rate" id="hourly_rate"
                                                   autocomplete="hourly_rate"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $errors->first('hourly_rate') }}
                                        </p>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">
                                            Day Rate
                                        </label>
                                        <div class="mt-1">
                                            <input type="number" name="day_rate" id="day_rate"
                                                   autocomplete="day_rate"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $errors->first('day_rate') }}
                                        </p>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">
                                            Number of Doors
                                        </label>
                                        <div class="mt-1">
                                            <input type="number" name="no_of_doors" id="no_of_doors"
                                                   autocomplete="no_of_doors"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $errors->first('no_of_doors') }}
                                        </p>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">
                                            Picture
                                        </label>
                                        <div class="mt-1">
                                            <input type="file" name="picture" id="picture"
                                                   autocomplete="picture"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $errors->first('picture') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-8">
                                <div class="mt-6">
                                    <fieldset>
                                        <legend class="text-base font-medium text-gray-900">
                                            Status
                                        </legend>
                                        <div class="mt-4 space-y-4">
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="is_active" name="is_active" type="radio" value="1"
                                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="is_active"
                                                           class="font-medium text-gray-700">Active</label>
                                                    <p class="text-gray-500">The ride is available for rental.</p>
                                                </div>
                                            </div>
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="is_disabled" name="is_active" type="radio" value="0"
                                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="is_disabled"
                                                           class="font-medium text-gray-700">Disabled</label>
                                                    <p class="text-gray-500">The ride is available for rental.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $errors->first('is_active') }}
                                        </p>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end">
                                <a href="{{ route('dashboard.rides') }}"
                                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-brand hover:bg-brand-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
