<x-app-layout>
  <div x-data="{ showModal2: false }" class="{'overflow-y-hidden': showModal2}" class="py-10">
      <div class="py-11 max-w-10xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="h-55 w-full bg-white">
                  <div class="max-w-screen-lg mx-auto px-5 pt-5 mt-4">
                      <div class="bg-white md:h-52 rounded-lg shadow-md flex flex-wrap flex-col-reverse mx-32 mb-40 mt-40 relative">
                          <div class="mt-1 w-full md:w-1/2 p-4 ">
                              <img src="https://images-ext-2.discordapp.net/external/PtypKWo-UFrwyWcY8zLvuyk6gd7PAIjyzkJMqCRT5Sc/https/i.imgur.com/foAQv3B.png?width=1025&height=432" alt="" class="w-9">
                              <h3 class="text-4xl mt-2 font-bold my-1">Choose Your Theme</h3>
                              <p class="text-xl">Choose The theme your want to work on, and start customizing your Newsletter.</p>
                              <a data-toggle="modal" data-target="#Themechoice">
                                <button style="background-color:#45c0ef; !important" class="text-white font-bold mt-3 mb-1 py-2 px-4 border-b-4 border-blue-dark hover:border-blue rounded" onclick="return false" @click="showModal2 = true">
                                    Choose Now !
                                </button>
                              </a>
                          </div>
                          <div class="float-right w-full p-2 md:p-0">
                              <img src="https://zupimages.net/up/21/11/4rfi.png" style="width:380px !important;" class="absolute bottom-5 mx-auto">
                          </div>
                      </div>
                  </div>
              </div>

              <div
              class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
              x-show="showModal2"
              x-transition:enter="transition duration-300"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition duration-300"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              >
                  <div class="relative max-w-7xl sm:mx-auto my-10 opacity-100 mt-40">
                      <div
                      class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                      @click.away="showModal2 = false"
                      x-show="showModal2"
                      x-transition:enter="transition transform duration-300"
                      x-transition:enter-start="scale-0"
                      x-transition:enter-end="scale-100"
                      x-transition:leave="transition transform duration-300"
                      x-transition:leave-start="scale-100"
                      x-transition:leave-end="scale-0"
                      >
                          <div class="grid grid-cols-2 gap-3">
                              <div class=" object-right bg-white overflow-hidden shadow-lg sm:rounded-lg">
                                  <div  class="flex flex-col justify-center items-center max-w-sm mx-auto my-8">
                                      <div style="background-image: url(https://zupimages.net/up/21/09/952a.png)" class="bg-gray-300 h-64 w-full rounded-lg shadow-md bg-cover bg-center">
                                      </div>
                                      <div class="w-56 md:w-64 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden">
                                          <div class="flex items-center justify-between py-4 px-3 bg-white-400">
                                              <button onclick="window.location='{{ route('buzzevents') }}'" style="background-color:rgb(73,193,239);" class="w-80 text-xs text-white px-3 py-3 font-semibold rounded uppercase hover:bg-blue-400 text-lg focus:outline-none">Select</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class=" object-right bg-white overflow-hidden shadow-lg sm:rounded-lg">
                                  <div  class="flex flex-col justify-center items-center max-w-sm mx-auto my-8">
                                      <div style="background-image: url(https://zupimages.net/up/21/09/rbfo.png)" class="bg-gray-300 h-64 w-full rounded-lg shadow-md bg-cover bg-center">
                                      </div>
                                      <div class="w-56 md:w-64 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden">
                                          <div class="flex items-center justify-between py-4 px-3 bg-white-400">
                                              <button onclick="window.location='{{ route('itskills') }}'" style="background-color:rgb(73,193,239);" class="w-80 text-xs text-white px-3 py-3 font-semibold rounded uppercase hover:bg-blue-400 text-lg focus:outline-none">Select</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
