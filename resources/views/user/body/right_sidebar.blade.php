@php    
$users = App\Models\User::where('role', 'user')->where('id', '!=', Auth::id())->inRandomOrder()->get();
@endphp

<div class="flex-1"> 
    
    <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6" 
    uk-sticky="media: 1024; end: #js-oversized; offset: 80">

    <div class="box p-5 px-6">

        <div class="flex items-baseline justify-between text-black dark:text-white">
            <h3 class="font-bold text-base"> People you may know </h3>
        </div>

        <div class="side-list">

        @foreach($users as $user)
                    <div class="side-list-item">
                        <a href="timeline.html">
                            <img src="{{ $user->photo ? asset('upload/user_images/'.$user->photo) : asset('upload/no_image.jpg') }}" alt="{{ $user->name }}" class="side-list-image rounded-full">
                        </a>
                        <div class="flex-1">
                            <a href="timeline.html">
                                <h4 class="side-list-title">{{ $user->name }}</h4>
                            </a>
                            <div class="side-list-info">{{ $user->following->count() }} Following</div>
                        </div>
                        @if(auth()->user()->following->contains($user->id))
                            <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button bg-primary-soft text-primary dark:text-white">Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="button bg-primary-soft text-primary dark:text-white">Follow</button>
                            </form>
                        @endif
                    </div>
                @endforeach   

            
            <button class="bg-secondery button w-full mt-2 hidden">See all</button>

        </div>

    </div>

    <!-- peaple you might know -->
    <div class="box p-5 px-6 border1 dark:bg-dark2 hidden">
                    
        <div class="flex justify-between text-black dark:text-white">
            <h3 class="font-bold text-base"> Peaple You might know </h3>
            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon> </button>
        </div>

        <div class="space-y-4 capitalize text-xs font-normal mt-5 mb-2 text-gray-500 dark:text-white/80">

            <div class="flex items-center gap-3">
                <a href="timeline.html">
                    <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                </a>
                <div class="flex-1">
                    <a href="timeline.html"><h4 class="font-semibold text-sm text-black dark:text-white">  Johnson smith</h4></a>
                    <div class="mt-0.5"> Suggested For You </div>
                </div>
                <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
            </div>
            <div class="flex items-center gap-3">
                <a href="timeline.html">
                    <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                </a>
                <div class="flex-1">
                    <a href="timeline.html"><h4 class="font-semibold text-sm text-black dark:text-white"> James Lewis</h4></a>
                    <div class="mt-0.5"> Followed by Johnson </div>
                </div>
                <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
            </div>
            <div class="flex items-center gap-3">
                <a href="timeline.html">
                    <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                </a>
                <div class="flex-1">
                    <a href="timeline.html"><h4 class="font-semibold text-sm text-black dark:text-white"> John Michael</h4></a>
                    <div class="mt-0.5"> Followed by Monroe  </div>
                </div>
                <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
            </div>
            <div class="flex items-center gap-3">
                <a href="timeline.html">
                    <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                </a>
                <div class="flex-1">
                    <a href="timeline.html"><h4 class="font-semibold text-sm text-black dark:text-white">  Monroe Parker</h4></a>
                    <div class="mt-0.5"> Suggested For You </div>
                </div>
                <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
            </div> 
            <div class="flex items-center gap-3">
                <a href="timeline.html">
                    <img src="{{ $assetBase }}/images/avatars/avatar-4.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                </a>
                <div class="flex-1">
                    <a href="timeline.html"><h4 class="font-semibold text-sm text-black dark:text-white">  Martin Gray</h4></a>
                    <div class="mt-0.5"> Suggested For You </div>
                </div>
                <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
            </div>
        </div>

    </div>


    <!-- latest marketplace items -->
    <div class="box p-5 px-6 border1 dark:bg-dark2">
        
        <div class="flex justify-between text-black dark:text-white">
            <h3 class="font-bold text-base"> Premium Photos </h3>
            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon> </button>
        </div>

        <div class="relative capitalize font-medium text-sm text-center mt-4 mb-2" tabindex="-1" uk-slider="autoplay: true;finite: true">

            <div class="overflow-hidden uk-slider-container">
            
                <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]">
                    
                    <li class="w-1/2 pr-2">

                         <a href="#">
                            <div class="relative overflow-hidden rounded-lg">
                                <div class="relative w-full h-40">
                                    <img src="{{ $assetBase }}/images/product/product-1.jpg" alt="" class="object-cover w-full h-full inset-0">
                                </div> 
                                <div class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60"> $12 </div>
                            </div>
                            <div class="mt-3 w-full"> Chill Lotion </div>
                        </a>
                    </li>
                    <li class="w-1/2 pr-2">

                         <a href="#">
                            <div class="relative overflow-hidden rounded-lg">
                                <div class="relative w-full h-40">
                                    <img src="{{ $assetBase }}/images/product/product-3.jpg" alt="" class="object-cover w-full h-full inset-0">
                                </div> 
                                <div class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60"> $18 </div>
                            </div>
                            <div class="mt-3 w-full">  Gaming mouse </div>
                        </a>

                    </li>
                    <li class="w-1/2 pr-2">

                        <a href="#">
                            <div class="relative overflow-hidden rounded-lg">
                                <div class="relative w-full h-40">
                                    <img src="{{ $assetBase }}/images/product/product-5.jpg" alt="" class="object-cover w-full h-full inset-0">
                                </div> 
                                <div class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60"> $12 </div>
                            </div>
                            <div class="mt-3 w-full">  Herbal Shampoo </div>
                        </a>

                    </li>

                </ul>

                <button type="button" class="absolute bg-white rounded-full top-16 -left-4 grid w-9 h-9 place-items-center shadow dark:bg-dark3"  uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl"></ion-icon></button>
                <button type="button" class="absolute -right-4 bg-white rounded-full top-16 grid w-9 h-9 place-items-center shadow dark:bg-dark3" uk-slider-item="next"> <ion-icon name="chevron-forward" class="text-2xl"></ion-icon></button>

            </div>
        
        </div>


    </div>
    
    <!-- online friends -->
    <div class="box p-5 px-6 border1 dark:bg-dark2">
        
        <div class="flex justify-between text-black dark:text-white">
            <h3 class="font-bold text-base"> Online Friends </h3>
            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon> </button>
        </div>

        <div class="grid grid-cols-6 gap-3 mt-4">

            <a href="timeline.html"> 
                <div class="w-10 h-10 relative">
                    <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                </div> 
            </a>
            <a href="timeline.html"> 
                <div class="w-10 h-10 relative">
                    <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                </div>
            </a>
            <a href="timeline.html">  
                <div class="w-10 h-10 relative">
                    <img src="{{ $assetBase }}/images/avatars/avatar-4.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                </div> 
            </a>
            <a href="timeline.html"> 
                <div class="w-10 h-10 relative">
                    <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                </div> 
            </a>
            <a href="timeline.html"> 
                <div class="w-10 h-10 relative">
                    <img src="{{ $assetBase }}/images/avatars/avatar-6.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                </div> 
            </a>
            <a href="timeline.html"> 
                <div class="w-10 h-10 relative">
                    <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                </div> 
            </a>

        </div>

        
    </div>

    <!-- Pro Members -->
    <div class="box p-5 px-6 border1 dark:bg-dark2">
        
        <div class="flex justify-between text-black dark:text-white">
            <h3 class="font-bold text-base"> Pro Members </h3>
        </div>

        <div class="relative capitalize font-normal text-sm mt-4 mb-2" tabindex="-1" uk-slider="autoplay: true;finite: true">

            <div class="overflow-hidden uk-slider-container">
            
                <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]">
                    
                    <li class="w-1/2 pr-2">
                    <a href="timeline.html"> 
                        <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                            <a href="timeline.html"> 
                                <div class="relative w-16 h-16 mx-auto mt-2">
                                    <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="h-full object-cover rounded-full shadow w-full">
                                </div>
                            </a>
                            <div class="mt-5 text-center w-full">
                                <a href="timeline.html"> <h5 class="font-semibold"> Martin Gray</h5> </a>
                                <div class="text-xs text-gray-400 mt-0.5 font-medium"> 12K Followers</div>
                                <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1"> Follow </button>
                            </div>
                        </div>
                    
                    </li>
                    <li class="w-1/2 pr-2">
                        <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                            <a href="timeline.html"> 
                                <div class="relative w-16 h-16 mx-auto mt-2">
                                    <img src="{{ $assetBase }}/images/avatars/avatar-4.jpg" alt="" class="h-full object-cover rounded-full shadow w-full">
                                </div>
                            </a> 
                            <div class="mt-5 text-center w-full">
                                <a href="timeline.html"> <h5 class="font-semibold"> Alexa Park</h5> </a>
                                <div class="text-xs text-gray-400 mt-0.5 font-medium"> 12K Followers</div>
                                <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1"> Follow </button>
                            </div>
                        </div>
                    </li>
                    <li class="w-1/2 pr-2">
                        <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                            <a href="timeline.html"> 
                                <div class="relative w-16 h-16 mx-auto mt-2">
                                    <img src="{{ $assetBase }}/images/avatars/avatar-4.jpg" alt="" class="h-full object-cover rounded-full shadow w-full">
                                </div>
                            </a> 
                            <div class="mt-5 text-center w-full">
                                <a href="timeline.html"> <h5 class="font-semibold"> James Lewis</h5> </a>
                                <div class="text-xs text-gray-400 mt-0.5 font-medium"> 15K Followers</div>
                                <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1"> Follow </button>
                            </div>
                        </div>
                    </li>
                

                </ul>

                <button type="button" class="absolute -translate-y-1/2 bg-slate-100 rounded-full top-1/2 -left-4 grid w-9 h-9 place-items-center dark:bg-dark3"  uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl"></ion-icon></button>
                <button type="button" class="absolute -right-4 -translate-y-1/2 bg-slate-100 rounded-full top-1/2 grid w-9 h-9 place-items-center dark:bg-dark3" uk-slider-item="next"> <ion-icon name="chevron-forward" class="text-2xl"></ion-icon></button>

            </div>
        
        </div>


    </div>



</div>
</div>