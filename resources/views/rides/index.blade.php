<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Rides
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('dashboard.rides.create') }}"
                   class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-brand hover:bg-brand-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">
                    Create
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Picture
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Hourly Rate
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Day Rate
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Doors
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Active
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($rides)
                            @foreach($rides as $ride)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ $ride->picture }}">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ride->hourly_rate }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ride->day_rate }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ride->no_of_doors }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($ride->is_active)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-second-light text-white">
                                            Active
                                        </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-third text-white">
                                            Disabled
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="relative z-0 inline-flex shadow-sm rounded-md">
                                            <a href="{{ route('dashboard.rides.edit', $ride->id) }}"
                                               class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-brand hover:text-white focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                Edit
                                            </a>
                                            <a href="{{ route('dashboard.rides.delete', $ride->id) }}"
                                               class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-third hover:text-white focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    {{ $rides->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
