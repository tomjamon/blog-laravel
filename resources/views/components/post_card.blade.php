
<article class="flex flex-col shadow my-4">
    <div class="bg-white flex flex-col justify-start p-6">
        <span class="flex">
        @foreach ($post->tags as $tag)
            <a class="pr-4 text-blue-700 text-sm font-bold uppercase pb-4" href="{{ route('front.tags.show', ['slug' => $tag->slug]) }}">
                {{ $tag->title }}
            </a>
        @endforeach
        </span>
        <a href="{{ route('front.posts.show', $post->slug) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p href="#" class="text-sm pb-3">
            By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published {{ $post->created_at->diffForHumans() }}
        </p>
        <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
        <a href="{{ route('front.posts.show', $post->slug) }}" class="uppercase text-gray-800 hover:text-black">Continuer à lire</a>
    </div>
</article>
