<!-- resources/views/search/input.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Search Coordinate') }}
    </h2>
  </x-slot>
 <div class="max-w-lg py-12 items-center">
    <div class="max-w-xl mx-auto sm:w-1/5 md:w-1/5 lg:w-1/5">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">Search Coordinate</h3>
          <img src=" {{asset('storage/'.$suitable_cloth->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg">
          <img src=" {{asset('storage/'.$suitable_pant->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg">
          @if($suitable_jacket!=null)
          <img src=" {{asset('storage/'.$suitable_jacket->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg">
          @endif  
        </div>
      </div>
    </div>
  </div>
</x-app-layout>