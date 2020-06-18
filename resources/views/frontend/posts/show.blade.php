@extends('layouts.app')

@section('content')
    <!--Title-->
    <div class="font-sans">
        <span class="text-base md:text-sm text-teal-500 font-bold">&lt;<span>
        <a href="{{ url('/') }}" class="text-base md:text-sm text-teal-500 font-bold no-underline hover:underline">BACK TO BLOG</a>
        <br>
        <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $post->title }}</h1>
        <p class="text-sm md:text-base font-normal text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
    </div>

    <!--Lead Para-->
    <p>
        {{ $post->content }}
    </p>
    <!--Tags -->
    <div class="text-base md:text-sm text-gray-500 px-4 py-6">
        Tags:
        @foreach($post->tags as $tag)
            {{ $tag->title }} -
        @endforeach
        <!-- <a href="#" class="text-base md:text-sm text-teal-500 no-underline hover:underline">Link</a> -->
    </div>

    <!--Divider-->

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

    <!-- Divider -->
    <hr class="border-b-2 border-gray-400 mb-8 mx-4">

    <!--Next & Prev Links-->
    <div class="font-sans flex justify-between content-center px-4 pb-12">
        <div class="text-left">
            <span class="text-xs md:text-sm font-normal text-gray-600">&lt; Article précédent</span><br>
            <p><a href="#" class="break-normal text-base md:text-sm text-teal-500 font-bold no-underline hover:underline">Blog title</a></p>
        </div>
        <div class="text-right">
            <span class="text-xs md:text-sm font-normal text-gray-600">Article suivant &gt;</span><br>
            <p><a href="#" class="break-normal text-base md:text-sm text-teal-500 font-bold no-underline hover:underline">Blog title</a></p>
        </div>
    </div>


    <!-- Comment -->
    <comments post_id="{{ $post->id }}"></comments>
    <hr>

    <footer class="bg-white border-t border-gray-400 shadow">
    <div class="container max-w-4xl mx-auto flex py-8">

        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full md:w-1/2 ">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">About</h3>
                    <p class="py-4 text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                    </p>
                </div>
            </div>

            <div class="flex w-full md:w-1/2">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">Social</h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection
