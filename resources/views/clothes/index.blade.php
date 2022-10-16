<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Clothes Index') }}
    </h2>
    <div class="flex justify-end">
      <a href="/pants"><div>Pants Index</div></a>
    </div>
    <div class="flex justify-end">
      <a href="/jackets"><div>Jackets Index</div></a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-1/2 md:w-1/2 lg:w-4/5">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <table class="w-full border-collapse">
            <thead>
              <tr>
                <th class="w-1/2 border-b border-gray-200">Long Sleeve</th>
                <th class="w-1/2 border-b border-gray-200">Short Sleeve</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="w-1/2 justify-items-center">
                  <!-- long sleeve -->
                  @foreach ($long_sleeves as $cloth)
                    <a href="{{ route('clothes.show',$cloth->id) }}">
                      <img src=" {{asset('storage/'.$cloth->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg hover:shadow-xl">
                    </a> 
                  @endforeach
                </td>
                <td class="w-1/2 justify-items-center">
                  <!-- short sleeve -->
                  @foreach ($short_sleeves as $cloth)        
                    <a href="{{ route('clothes.show',$cloth->id) }}">
                      <img src=" {{asset('storage/'.$cloth->image)}}" class="mx-auto max-h-60 max-w-1/2 rounded-lg hover:shadow-xl">
                    </a> 
                  @endforeach
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

