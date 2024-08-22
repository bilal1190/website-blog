<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts / List') }}
            </h2>
            <a href="{{ route('posts.create') }}"
                class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-3 py-3">Create</a>
        </div>
    </x-slot>

    <div class="py-12 ">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <x-message>
              
          </x-message>
          <table class="w-full shadow-lg">
              <thead class="bg-gray-50">
                  <tr class="border-b">
                      {{-- {{ $name }} --}}
                      <th class="px-6 py-3 text-left" width="60">#</th>
                      <th class="px-6 py-3 text-left" width="60">Title</th>
                      <th class="px-6 py-3 text-left"width="120">content</th>
                      <th class="px-6 py-3 text-left"width="120">Create</th>
                      <th class="px-6 py-3 text-left" width="160">Action</th>
                  </tr>
              </thead>
              <tbody class="bg-white">
                  @if ($posts->isNotEmpty())
                      @foreach ( $posts as $post )
                      <tr class="border-b">
                          <td class="px-6 py-3 text-left">
                              {{ $post->id }}
                          </td>
                          <td class="px-6 py-3 text-left">
                              {{ $post->title }}
                          </td>
                          <td class="px-6 py-3 text-left">
                            {{ Str::limit($post->content, 50, ' ... ')}}
                        </td>
                          <td class="px-6 py-3 text-left">
                              {{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}
                          </td>
                          <td class="px-6 py-3 text-left  justify-center">
                             
                              <a  class="bg-green-700 text-sm rounded-md text-white px-3 py-2
                              hover:bg-green-600">Edit</a>
                              <a href="javascript:void(0);" onclick="deletepost({{ $post->id }})" class="bg-red-700 text-sm rounded-md text-white px-3 py-2
                              hover:bg-red-600">Delete</a>
                          </td>
                      </tr>
                      @endforeach
                  @endif
                 
              </tbody>
          </table>
          <div class="py-3 my-3">
              {{ $posts->links() }}    
          </div>
    </div>

</x-app-layout>
  {{-- <section class="text-gray-600 bg-white body-font">
      <x-message>
                
      </x-message>
      @if ($posts->isNotEmpty())     
      <div class="container px-5 py-24  mx-auto">
        <div class="flex flex-wrap -m-4">
          @foreach ($posts as $post)
          <div class="p-4 lg:w-1/3 ">
            <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative  cursor-pointer  hover:-translate-y-1 hover:scale-100 hover:bg-slate-300 duration-300 ">
              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ $post->category_id }}</h2>
              <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{ $post->title }}</h1>
              <p class="leading-relaxed mb-3">{{ Str::limit($post->content, 50, ' ... ')}}</p>
              <a class="text-indigo-500 inline-flex items-center">Read More
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </a>
              <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
                <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>1.2K </span>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                  </svg>{{ $post->user_id }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
       </div>
     @endif
       {{ $posts->links() }}
    </section>
       --}}