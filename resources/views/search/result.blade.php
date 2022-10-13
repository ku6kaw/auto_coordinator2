<!-- resources/views/search/input.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Search Coordinate') }}
    </h2>
  </x-slot>
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
<table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">Search Coordinate</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <div class="text-center font-bold text-lg text-grey-dark">
                    Suitable sleeve
                  </div>
                  <h3 class="text-left font-bold text-lg text-grey-dark">{{$suitable_cloth->image}}</h3>
                                                                         <!--ここに写真が来るようにする今は写真のパスが来るようにしてる-->
                </td>
              </tr>
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <div class="text-center font-bold text-lg text-grey-dark">
                    Suitable pants
                  </div>
                  <h3 class="text-left font-bold text-lg text-grey-dark">{{$suitable_pant->image}}</h3>
                                                                         <!--ここに写真が来るようにする今は写真のパスが来るようにしてる-->
                </td>
              </tr>
              @if($suitable_jacket!=null)
               <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <div class="text-center font-bold text-lg text-grey-dark">
                    Suitable jacket
                  </div>
                  <h3 class="text-left font-bold text-lg text-grey-dark">{{$suitable_jacket->image}}</h3>
                                                                            <!--ここに写真が来るようにする今は写真のパスが来るようにしてる-->
                </td>
              </tr>
               @endif  
            </tbody>
            </table>
            </div>
      </div>
    </div>
  </div>
</x-app-layout>