<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts / Create
            </h2>
            <a href="{{ route('posts.index') }}"
                class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-3 py-3">Back</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        <div class="my-3">
                            <label for="title" class="text-lg font-medium">Title</label>
                            <div class="my-3">
                                <input name="title" value="{{ old('title') }}" type="text"
                                    class="rounded-lg border-gray-300 shadow-sm w-1/2 " id="title"
                                    placeholder="Post Title">
                                @error('title')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="content" class="text-lg font-medium">Content</label>
                            <div class="my-3">
                                <textarea name="content" type="text" class="rounded-lg border-gray-300 shadow-sm w-1/2 " id="content"
                                    placeholder="Enter Your Content"></textarea>
                                @error('content')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>


                            <label for="category_id" class="text-lg font-medium">Category</label>
                            <div class="flex justify-between ">
                                <div class="my-3">
                                    <select id="category_id" name="category_id"
                                    class="rounded-lg border-gray-300 shadow-sm">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                                </div>

                                <div class="my-3">
                                    <button class="bg-slate-700 text-sm rounded-md px-3 py-3  text-white hover:bg-slate-600">Submit</button>
                                </div>
                                
                            </div>
                            

                            <!-- Hidden input for user_id -->
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
