<x-app-layout>
    <div class="containerNavbar py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image){{ Storage::url($post->image->url) }}@else https://p4.wallpaperbetter.com/wallpaper/64/1005/89/minimalistic-circle-wallpaper-preview.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach($post->tags as $tag)
                                <a href="{{ route('posts.tag',$tag) }}" class="inline-block px-3 h-6 bg-gray-700 text-white rounded-full">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold mt-4">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4 mb-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
