@extends('user.user_master')
@section('title', 'People you may know')
@section('user')

@php
    $assetBase = asset('frontend/assets/');

@endphp

<div class="flex max-lg:flex-col 2xl:gap-12 gap-10 2xl:max-w-[1220px] max-w-[1065px] mx-auto" id="js-oversized">

<div class="flex-1">

    <div class="max-w-[680px] w-full mx-auto">

        <div class="page-heading">            
            <h1 class="page-title"> @yield('title') </h1>
        </div>
        
        <!-- page feautred -->
         <div tabindex="-1" uk-slider="finite:true">
            
            <div class="uk-slider-container pb-1">
            
                <ul class="uk-slider-items grid-small">
                @foreach($followingUsers as $user)
                    <li class="lg:w-1/4 sm:w-1/3 w-1/2">
                        <div class="card uk-transition-toggle">
                            <a href="#">
                                <div class="card-media sm:aspect-[2/1.9] h-40">
                                <img src="{{ $user->photo ? asset('upload/user_images/'.$user->photo) : asset('upload/no_image.jpg') }}" alt="{{ $user->name }}">
                                    <div class="card-overly"></div>
                                </div>
                            </a>
                            <div class="card-body p-3 w-full z-10 absolute bg-gradient-to-t bottom-0 from-black/60">
                                
                                <a href="#">
                                <p class="card-text text-xs text-white/80"> {{ '@' . $user->username }}</p>
                                </a>
                            </div>
                            <!-- close -->
                            <button type="button" class="uk-transition-fade absolute top-0 right-0 m-2 z-10 bg-black/20 rounded-full flex p-1">
                                <ion-icon name="close" class="text-white"></ion-icon>
                            </button>
                        </div>
                    </li> 
                @endforeach
                    
                </ul>
        
            </div>
        
            <!-- slide nav icons -->
            <a class="nav-prev" href="#" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl"></ion-icon> </a>
            <a class="nav-next" href="#" uk-slider-item="next"> <ion-icon name="chevron-forward" class="text-2xl"></ion-icon></a>
            
        </div>




    <!-- Unfollowed Users -->
   <h2 class="mt-5 mb-5"> People that you might follow </h2>
   <hr>
   <div class="grid sm:grid-cols-3 grid-cols-2 gap-3 mt-10" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100; repeat: true">
        @foreach($unfollowingUsers as $user)
        <div class="card">
            <a href="#">
                <div class="card-media sm:aspect-[2/1.7] h-40">
                    <img src="{{ $user->photo ? asset('upload/user_images/'.$user->photo) : asset('upload/no_image.jpg') }}" alt="{{ $user->name }}">
                    <div class="card-overly"></div>
                </div>
            </a>
            <div class="card-body" style="height: 150px;">
                <a href="#"> <h4 class="card-title"> {{ $user->name }} </h4> </a>
                <p class="card-text">{{ $user->following->count() }} Following</p>
                <form action="{{ route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="button bg-primary text-white">Follow</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>


        <h2 class="mt-4 mb-4"> People that you're following </h2>
        <hr>

        <div class="grid sm:grid-cols-3 grid-cols-2 gap-3" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100; repeat: true">
        @foreach($followingUsers as $user)
        <div class="card">
            <a href="#">
                <div class="card-media sm:aspect-[2/1.7] h-40">
                    <img src="{{ $user->photo ? asset('upload/user_images/'.$user->photo) : asset('upload/no_image.jpg') }}" alt="{{ $user->name }}">
                    <div class="card-overly"></div>
                </div>
            </a>
            <div class="card-body" style="height: 150px;">
                <a href="#"> <h4 class="card-title"> {{ $user->name }} </h4> </a>
                <p class="card-text">{{ $user->following->count() }} Following</p>
                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button bg-primary text-white">Unfollow</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

<div id="page-tabs" class="uk-switcher mt-10">
    <!-- Followed Users -->
     


 
    
    <!-- Load more -->
    <div class="flex justify-center my-6 lg:col-span-3 col-span-2">
        <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
    </div>
</div>




    </div>


</div>

<!-- Right sidebar starts here-->
 
@include('user.body.right_sidebar')

<!-- Right sidebar ends here-->

</div>




@endsection