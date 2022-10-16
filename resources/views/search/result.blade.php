<!-- resources/views/search/input.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Search Coordinate') }}
    </h2>
  </x-slot>
 <div class="py-12 items-center">
    <div class="max-w-xl mx-auto sm:w-1/5 md:w-1/5 lg:w-1/5">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">Search Coordinate</h3>
          <!-- shirts image -->
          <img src=" {{asset('storage/'.$suitable_cloth->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg">
          <!-- pnats image -->
          <img src=" {{asset('storage/'.$suitable_pant->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg">
          @if($suitable_jacket!=null)
          <!-- jacket image -->
            <img src=" {{asset('storage/'.$suitable_jacket->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg">
          @endif  
        </div>

        <!-- favorite button -->
        <form action="{{route('favorites')}}" method="POST" class="text-left">
        @csrf
          <!-- send data -->
          <input type="hidden" name="user_id" value="{{Auth::id()}}">
          <input type="hidden" name="cloth_id" value="{{$suitable_cloth->id}}">
          <input type="hidden" name="pants_id" value="{{$suitable_pant->id}}">
          @if($suitable_jacket!=null)
            <input type="hidden" name="jacket_id" value="{{$suitable_jacket->id}}">
          @endif
          <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </button>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>