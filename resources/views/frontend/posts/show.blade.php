@extends('layouts.app')

@section('content')
    <article class="w-full flex flex-col shadow my-4">
        <div class="bg-white flex flex-col justify-start p-6">
            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Sports</a>
            <a href="{{ route('front.posts.show', $post->slug) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
            <p href="#" class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published {{ $post->created_at->diffForHumans() }}
            </p>
            {{ $post->content }}
            <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consequatur debitis, doloremque excepturi facere facilis id iste iusto natus necessitatibus praesentium, quae quas quasi quia quis repellendus reprehenderit similique sit.</p>
            <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati odit officiis quas repudiandae. Accusamus, beatae cupiditate deserunt dolore eos et explicabo facere, impedit in iure libero nemo nostrum tempore. Magni!</p>
            <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet deleniti dolorum exercitationem expedita, explicabo facilis hic molestias mollitia nesciunt nisi praesentium quae suscipit veritatis voluptatem! Fugiat molestiae natus quae.</p>
            <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, delectus ducimus fuga ipsa natus neque nihil pariatur rem sapiente sunt. Accusamus aspernatur autem dignissimos illum mollitia neque non odio totam!</p>
            <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis doloremque enim fugit nostrum porro, sunt. Alias, animi consectetur, dolores fugit nesciunt nobis perferendis possimus qui quis repudiandae soluta tenetur voluptatum?</p>
            <!--Tags -->
            <div class="text-base md:text-sm text-gray-500 px-4 py-6">
                Tags:
                @foreach($post->tags as $tag)
                    <a href="{{ route('front.tags.show', ['slug' => $tag->slug]) }}">
                        {{ $tag->title }}
                    </a>
            @endforeach
            <!-- <a href="#" class="text-base md:text-sm text-teal-500 no-underline hover:underline">Link</a> -->
            </div>

            <!--Subscribe-->
            <!--
            <hr class="border-b-2 border-gray-400 mb-8 mx-4">
            <div class="container px-4">
                <div class="font-sans bg-white rounded-lg shadow-md p-4 text-center">
                    <h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to my Newsletter</h2>
                    <h3 class="font-bold break-normal font-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered right to your inbox</h3>
                    <div class="w-full text-center pt-4">
                        <form action="#">
                            <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
                                <input type="email" placeholder="youremail@example.com" class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
                                <button type="submit" class="flex-1 mt-4 block md:inline-block appearance-none bg-teal-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-teal-400">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            -->

            <!--Next & Prev Links-->
            <div class="font-sans flex justify-between content-center px-4 pb-12">
                <div class="text-left">
                    <span class="text-xs md:text-sm font-normal text-gray-600">&lt; Article précédent</span><br>
                    <p><a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4 no-underline hover:underline">Blog title</a></p>
                </div>
                <div class="text-right">
                    <span class="text-xs md:text-sm font-normal text-gray-600">Article suivant &gt;</span><br>
                    <p><a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4 no-underline hover:underline">Blog title</a></p>
                </div>
            </div>
        </div>
    </article>

    <!-- Comment -->
    <comments post_id="{{ $post->id }}"></comments>

@endsection
