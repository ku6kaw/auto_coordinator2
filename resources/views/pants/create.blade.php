<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Pants') }}
    </h2>
    <div class="flex justify-end">
      <a href="/clothes/create"><div>Create New Clothes</div></a>
    </div>
    <div class="flex justify-end">
      <a href="/jackets/create"><div>Create New Jackets</div></a>
    </div>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @include('common.errors')
          <form class="mb-6" action="{{ route('pants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- length -->
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="length">length</label>
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
            </div>

            <!-- color -->
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="color">color</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="color" id="color" placeholder="例）黒、白、青">
            </div>

            <!-- image -->
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">image</label>
              <input class="border py-2 px-3 text-grey-darkest" type="file" name="image" id="image">
            </div>

            <!-- button -->
            <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Create
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

