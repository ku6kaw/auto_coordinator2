<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Show Favorite Coordinate Detail') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">

            <!-- image -->
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
                      <img src="{{asset('storage/'.$detail_favorite['cloth_info']->image)}}" class="mx-auto max-h-60 max-w-1/3 rounded-lg hover:shadow-xl">
                </td>
                <td class="w-1/3 justify-items-center">      
                      <img src="{{asset('storage/'.$detail_favorite['pants_info']->image)}}" class="mx-auto max-h-60 max-w-1/3 rounded-lg hover:shadow-xl">
                </td>
                <td class="w-1/3 justify-items-center">
                  @if($detail_favorite['jacket_info']==null)
                    <img src="" class="mx-auto max-h-60 max-w-1/3">
                    <!--jacketがnullのときうまく反映されない-->
                  @else
                    <img src="{{asset('storage/'.$detail_favorite['jacket_info']->image)}}" class="mx-auto max-h-60 max-w-1/3 rounded-lg hover:shadow-xl">
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
            <!-- imageここまで -->

            
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Created_at</p>
              <p class="py-2 px-3 text-grey-darkest" id="created_at">
                {{$detail_favorite['cloth_info']->created_at}}
              </p>
            </div>
            <div class="flex">
                <!-- 削除ボタン -->

                <script>
                function confirm_test() {
                    var select = confirm("削除しますか？");
                    return select;
                }
                </script>

                <form action="{{ route('favorites.destroy',$detail_favorite['id']) }}" method="POST" onsubmit="return confirm_test()" class="text-left">
                    @method('delete')
                    @csrf
                    <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    </button>
                </form>
            </div>

            <a href="{{ route('favorites.index') }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Back
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
