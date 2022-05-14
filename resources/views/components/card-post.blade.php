@props(['post'])
<article class="mb-4 bg-white shadow-lg rounded-lg overflow-hidden">
    @if($post->image)
    <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
    @else
    <img class="w-full h-72 object-cover object-center" src="https://p4.wallpaperbetter.com/wallpaper/64/1005/89/minimalistic-circle-wallpaper-preview.jpg" alt="">
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>

    <div class="px-6 pt-4 pb-4">
        @foreach($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="inline-block bg-gray-700 px-3 py-2 rounded-md text-sm font-medium text-white mr-2">{{ $tag->name }}</a>
        @endforeach
    </div>
</article>
