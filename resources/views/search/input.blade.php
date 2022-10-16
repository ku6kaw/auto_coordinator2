<!-- resources/views/search/input.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Search Coordinate') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @include('common.errors')
          <form class="mb-6" action="{{ route('search.result') }}" method="GET">
            @csrf

            <!-- sleeve -->
            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="keyword">sleeve</label>
            <!-- long -->
            <div class="flex items-center mb-4">
                <input id="long_sleeve" type="radio" value="0" name="sleeve" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="long_sleeve" class="ml-2 text-sm font-medium text-grey-darkest">Long sleeve</label>
            </div>
            <!-- short -->
            <div class="flex items-center">
                <input checked id="short_sleeve" type="radio" value="1" name="sleeve" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="short_sleeve" class="ml-2 text-sm font-medium text-grey-darkest">Short sleeve</label>
            </div>
            <!-- error message -->
            @if (session("cloth_exist_bool"))
            <div class="text-red-600">
                You haven't registered your clothes yet
            </div>
            @endif

            <!-- pants -->
            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="keyword">pants</label>
            <!-- long -->
            <div class="flex items-center mb-4">
                <input id="long_pants" type="radio" value="0" name="pants" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="long_pants" class="ml-2 text-sm font-medium text-grey-darkest">Long pants</label>
            </div>
            <!-- short -->
            <div class="flex items-center">
                <input checked id="short_pants" type="radio" value="1" name="pants" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="short_pants" class="ml-2 text-sm font-medium text-grey-darkest">Short pants</label>
            </div>
            <!-- error message -->
            @if (session("pants_exist_bool"))
            <div class="text-red-600">
                You haven't registered your pants yet
            </div>
            @endif

            <!-- jacket -->
            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="keyword">jacket</label>
            <!-- need -->
            <div class="flex items-center mb-4">
                <input id="need_jacket" type="radio" value="1" name="jacket" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="need_jacket" class="ml-2 text-sm font-medium text-grey-darkest">need</label>
            </div>
            <!-- don't need -->
            <div class="flex items-center">
                <input checked id="dont_need_jacket" type="radio" value="0" name="jacket" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="dont_need_jacket" class="ml-2 text-sm font-medium text-grey-darkest">don't need</label>
            </div>
            <!-- error message -->
            @if (session("jacket_exist_bool"))
            <div class="text-red-600">
                You haven't registered your jackets yet"
            </div>
            @endif

            <!-- button -->
            <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Search
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>