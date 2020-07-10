<span class="flex flex-column bg-white p-2 shadow my-2">
    <!--Title-->
    <a href="{{ route('front.posts.show', $post->slug) }}" class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
        {{ $post->title }}
    </a>
    <p class="pb-4 text-sm md:text-base font-normal text-gray-600">
        {{ $post->created_at->diffForHumans() }}
        -
        {{ $post->user->name }}
    </p>
</span>
