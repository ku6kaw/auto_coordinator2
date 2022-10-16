

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Clothes') }}
    </h2>
    <div class="flex justify-end">
      <a href="/pants/create"><div>Create New Pants</div></a>
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
             <form class="mb-6" action="{{ route('clothes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="length">length</label>
            <div class="flex items-center mb-4">
                <input id="long_sleeve" type="radio" value="0" name="sleeve" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="long_sleeve" class="ml-2 text-sm font-medium text-grey-darkest">Long sleeve</label>
            </div>
            <div class="flex items-center">
                <input checked id="short_sleeve" type="radio" value="1" name="sleeve" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="short_sleeve" class="ml-2 text-sm font-medium text-grey-darkest">Short sleeve</label>
            </div>
            </div>
             <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="color">color</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="color" id="color">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">image</label>
              <input class="border py-2 px-3 text-grey-darkest" type="file" name="image" id="image">
            </div>
            <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Create
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

