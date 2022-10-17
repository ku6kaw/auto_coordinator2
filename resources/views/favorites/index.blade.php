<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Favorite Coordinate') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-1/2 md:w-1/2 lg:w-4/5">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <table class="w-full border-collapse">
            <thead>
              <tr>
                <th class="w-1/3 border-b border-gray-200">favorite Sleeve</th>
                <th class="w-1/3 border-b border-gray-200">favorite Pants</th>
                <th class="w-1/3 border-b border-gray-200">favorite jacket</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="w-1/3 justify-items-center">
                  @foreach ($favorite_clothes as $cloth)
                      <a href="{{ route('favorites.show',$cloth['id']) }}">
                        <!--cloth["id"]にはfavoriteテーブルのidのこと-->
                      <img src="{{asset('storage/'.$cloth['favorite_info']->image)}}" class="mx-auto max-h-60 max-w-1/3 rounded-lg hover:shadow-xl">
                      </a>
                  @endforeach
                </td>
                <td class="w-1/3 justify-items-center">
                  @foreach ($favorite_pants as $pants)  
                  <a href="{{ route('favorites.show',$pants['id']) }}">  
                    <!--pants["id"]にはfavoriteテーブルのidのこと-->    
                      <img src="{{asset('storage/'.$pants['favorite_info']->image)}}" class="mx-auto max-h-60 max-w-1/3 rounded-lg hover:shadow-xl">
                  </a>
                  @endforeach
                </td>
                <td class="w-1/3 justify-items-center">
                  @foreach ($favorite_jackets as $jacket)
                  @if($jacket["favorite_info"]==null)
                    <img src="https://photo-studio9.com/wp-content/uploads/2012/06/white-630x454.png" class="mx-auto max-h-60 max-w-1/3">
                    <!--jacketがnullのときうまく反映されない-->
                  @else
                  <a href="{{ route('favorites.show',$jacket['id']) }}"> 
                    <!--pants["id"]にはfavoriteテーブルのidのこと-->
                    <img src="{{asset('storage/'.$jacket['favorite_info']->image)}}" class="mx-auto max-h-60 max-w-1/3 rounded-lg hover:shadow-xl">
                  </a>
                  @endif
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