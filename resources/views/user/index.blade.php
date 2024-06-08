@extends('user.user_master')
@section('title', 'Home')
@section('user')

@php
    $assetBase = asset('frontend/assets/');

@endphp


<div class="lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto"  id="js-oversized">

<div class="max-w-[680px] mx-auto">

    <!-- stories -->
    <div class="mb-8">

        <h3 class="font-extrabold text-2xl  text-black dark:text-white hidden"> Stories</h3>

        <div class="relative" tabindex="-1" uk-slider="auto play: true;finite: true" uk-lightbox="">

            <div class="py-5 uk-slider-container">
            
                <ul class="uk-slider-items w-[calc(100%+14px)]" uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 20;repeat:true">
                    <li class="md:pr-3" uk-scrollspy-class="uk-animation-fade">
                        <div class="md:w-16 md:h-16 w-12 h-12 rounded-full relative border-2 border-dashed grid place-items-center bg-slate-200 border-slate-300 dark:border-slate-700 dark:bg-dark2 shrink-0"
                             uk-toggle="target: #create-story">
                            <ion-icon name="camera" class="text-2xl"></ion-icon>
                        </div>
                    </li>

                    @foreach($latestUsers as $user)
                        <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                            <a href="{{ ($user->photo) ? url('upload/user_images/'.$user->photo) : asset('upload/no_image.jpg') }}" data-caption="{{ $user->name }}">
                                <div class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                    <img src="{{ ($user->photo) ? url('upload/user_images/'.$user->photo) : asset('upload/no_image.jpg') }}" alt="" class="absolute w-full h-full object-cover">
                                </div>
                            </a>
                        </li>
                    @endforeach


                </ul>
        
            </div>
        
            <div class="max-md:hidden">

                <button type="button" class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl"></ion-icon></button>
                <button type="button" class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="next"> <ion-icon name="chevron-forward" class="text-2xl"></ion-icon> </button>

            </div>


        </div>

    </div>

    <!-- feed story -->
    <div class="md:max-w-[580px] mx-auto flex-1 xl:space-y-6 space-y-3">

        <!-- add story -->
        <div class="bg-white rounded-xl shadow-sm md:p-4 p-2 space-y-4 text-sm font-medium border1 dark:bg-dark2">

            <div class="flex items-center md:gap-3 gap-1">
                <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" uk-toggle="target: #create-status"> 
                    <div class="py-2.5 text-center dark:text-white"> What do you have in mind? </div>
                </div>
                <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-xl transition-all bg-pink-100/60 hover:bg-pink-100 dark:bg-white/10 dark:hover:bg-white/20" uk-toggle="target: #create-status">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M15 8h.01" />
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                        <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5" />
                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5" />
                    </svg>
                </div>
                <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-xl transition-all bg-sky-100/60 hover:bg-sky-100 dark:bg-white/10 dark:hover:bg-white/20" uk-toggle="target: #create-status">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-sky-600 fill-sky-200/70 " viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" />
                        <path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                    </svg>
                </div> 
            </div>
            
        </div>
        
        <!--  post image-->
        <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

            <!-- post heading -->
            <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-9 h-9 rounded-full"> </a>  
                <div class="flex-1">
                    <a href="timeline.html"> <h4 class="text-black dark:text-white"> Monroe Parker </h4> </a>  
                    <div class="text-xs text-gray-500 dark:text-white/80"> 2 hours ago</div>
                </div>

                <div class="-mr-1">
                    <button type="button" class="button-icon w-8 h-8"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                    <div  class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click"> 
                        <nav> 
                            <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon>  Add to favorites </a>  
                            <a href="#"> <ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon> Mute Notification </a>  
                            <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report this post </a>  
                            <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share your profile </a>  
                            <hr>
                            <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>  Unfollow </a>  
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- post image -->
            <a href="#preview_modal" uk-toggle>
                <div class="relative w-full lg:h-96 h-full sm:px-4">
                    <img src="{{ $assetBase }}/images/post/img-2.jpg" alt="" class="sm:rounded-lg w-full h-full object-cover">
                </div>
            </a>
            
            <!-- post icons -->
            <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                <div>
                    <div class="flex items-center gap-2.5">
                        <button type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                        <a href="#">1,300</a>
                    </div>
                    <div    class="p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                            uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left"> 
                        
                        <div class="flex gap-2"  uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 👍 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> ❤️ </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 😂 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 😯 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 😢 </span></button>
                        </div>
                        
                        <div class="w-2.5 h-2.5 absolute -bottom-1 left-3 bg-white rotate-45 hidden"></div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                    <span>260</span>
                </div>
                <button type="button" class="button-icon ml-auto"> <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon> </button>
                <button type="button" class="button-icon"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
            </div>

            <!-- comments -->
            <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40"> 
        
                <div class="flex items-start gap-3 relative">
                    <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                    <div class="flex-1">
                        <a href="timeline.html" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                        <p class="mt-0.5">What a beautiful photo! I love it. 😍 </p>
                    </div>
                </div>
                <div class="flex items-start gap-3 relative">
                    <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                    <div class="flex-1">
                        <a href="timeline.html" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                        <p class="mt-0.5">   You captured the moment.😎 </p>
                    </div>
                </div>

                <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                    <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                    More Comment
                </button>

            </div>

            <!-- add comment -->
            <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                
                <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">
                
                <div class="flex-1 relative overflow-hidden h-10">
                    <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>

                    <div class="!top-2 pr-2" uk-drop="pos: bottom-right; mode: click">
                        <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                            </svg>
                        </div>
                    </div>
                    

                </div>
                

                <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Reply</button>
            </div> 

        </div>

        <!-- post text-->
        <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

            <!-- post heading -->
            <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-9 h-9 rounded-full"> </a> 
                <div class="flex-1">
                    <a href="timeline.html"> <h4 class="text-black dark:text-white"> John Michael </h4> </a> 
                    <div class="text-xs text-gray-500 dark:text-white/80"> 2 hours ago</div>
                </div>

                <div class="-mr-1">
                    <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl md hydrated" name="ellipsis-horizontal" role="img" aria-label="ellipsis horizontal"></ion-icon> </button>
                    <div class="w-[245px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click"> 
                        <nav> 
                            <a href="#"> <ion-icon class="text-xl shrink-0 md hydrated" name="bookmark-outline" role="img" aria-label="bookmark outline"></ion-icon>  Add to favorites </a>  
                            <a href="#"> <ion-icon class="text-xl shrink-0 md hydrated" name="notifications-off-outline" role="img" aria-label="notifications off outline"></ion-icon> Mute Notification </a>  
                            <a href="#"> <ion-icon class="text-xl shrink-0 md hydrated" name="flag-outline" role="img" aria-label="flag outline"></ion-icon>  Report this post </a>  
                            <a href="#"> <ion-icon class="text-xl shrink-0 md hydrated" name="share-outline" role="img" aria-label="share outline"></ion-icon>  Share your profile </a>  
                            <hr>
                            <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0 md hydrated" name="stop-circle-outline" role="img" aria-label="stop circle outline"></ion-icon>  Unfollow </a>  
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="sm:px-4 p-2.5 pt-0">
                <p class="font-normal"> Photography is the art of capturing light with a camera. It can be used to create images that tell stories, express emotions, or document reality. it can be fun, challenging, or rewarding. It can also be a hobby, a profession, or a passion. 📷 </p>
            </div> 

            <!-- post icons -->
            <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                <div>
                    <div class="flex items-center gap-2.5">
                        <button type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                        <a href="#">1,300</a>
                    </div>
                    <div    class="p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                            uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left"> 
                        
                        <div class="flex gap-2"  uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 👍 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> ❤️ </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 😂 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 😯 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300"> <span> 😢 </span></button>
                        </div>
                        
                        <div class="w-2.5 h-2.5 absolute -bottom-1 left-3 bg-white rotate-45 hidden"></div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                    <span>260</span>
                </div>
                <button type="button" class="button-icon ml-auto"> <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon> </button>
                <button type="button" class="button-icon"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
            </div>

            <!-- comments -->
            <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40"> 
        
                <div class="flex items-start gap-3 relative">
                    <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                    <div class="flex-1">
                        <a href="timeline.html" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                        <p class="mt-0.5"> I love taking photos of nature and animals. 🌳🐶</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 relative">
                    <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                    <div class="flex-1">
                        <a href="timeline.html" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                        <p class="mt-0.5">  I enjoy people and emotions. 😊😢 </p>
                    </div>
                </div> 
                <div class="flex items-start gap-3 relative">
                    <a href="timeline.html"> <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                    <div class="flex-1">
                        <a href="timeline.html" class="text-black font-medium inline-block dark:text-white"> Jesse </a>
                        <p class="mt-0.5">  Photography is my passion. 🎨📸   </p>
                    </div>
                </div>
            </div>

            <!-- add comment -->
            <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                
                <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">
                
                <div class="flex-1 relative overflow-hidden h-10">
                    <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent" aria-haspopup="true" aria-expanded="false"></textarea>

                    <div class="!top-2 pr-2 uk-drop" uk-drop="pos: bottom-right; mode: click">
                        <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600" style="opacity: 0;">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600" style="opacity: 0;">
                                <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z"></path>
                            </svg>
                        </div>
                    </div>
                    

                </div>
                

                <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Reply</button>
            </div> 

        </div>

        <!-- placeholder -->
        <div class="rounded-xl shadow-sm p-4 space-y-4 bg-slate-200/40 animate-pulse border1 dark:bg-dark2">

            <div class="flex gap-3">
                <div class="w-9 h-9 rounded-full bg-slate-300/20"></div>
                <div class="flex-1 space-y-3">
                    <div class="w-40 h-5 rounded-md bg-slate-300/20"></div>
                    <div class="w-24 h-4 rounded-md bg-slate-300/20"></div>
                </div>
                <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
            </div>

            <div class="w-full h-52 rounded-lg bg-slate-300/10 my-3"> </div>

            <div class="flex gap-3">

                <div class="w-16 h-5 rounded-md bg-slate-300/20"></div>

                <div class="w-14 h-5 rounded-md bg-slate-300/20"></div>

                <div class="w-6 h-6 rounded-full bg-slate-300/20 ml-auto"></div>
                <div class="w-6 h-6 rounded-full bg-slate-300/20  "></div>
            </div>

        </div>

    </div>

</div>

<!-- Right sidebar starts here-->

 @include('user.body.right_sidebar')

<!-- Right sidebar ends here-->



    <!-- create status -->
    <div class="hidden lg:p-20 uk- open" id="create-status" uk-modal="">
   
        <div class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

            <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                <h2 class="text-sm font-medium text-black"> Create Status</h2>

                <!-- close button -->
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
     
            </div>
                    
            <div class="space-y-5 mt-3 p-2">
                <textarea class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800" name="" id=""  rows="6" placeholder="What do you have in mind?"></textarea>
            </div>

            <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                <button type="button" class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">  
                    <ion-icon name="image" class="text-base"></ion-icon>  
                    Image 
                </button>
                <button type="button" class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900">  
                    <ion-icon name="videocam" class="text-base"></ion-icon>  
                    Video 
                </button>
                <button type="button" class="flex items-center gap-1.5 bg-orange-50 text-orange-600 rounded-full py-1 px-2 border-2 border-orange-100 dark:bg-yellow-950 dark:border-yellow-900">  
                    <ion-icon name="happy" class="text-base"></ion-icon>  
                    Feeling
                </button>
                <button type="button" class="flex items-center gap-1.5 bg-red-50 text-red-600 rounded-full py-1 px-2 border-2 border-rose-100 dark:bg-rose-950 dark:border-rose-900">  
                    <ion-icon name="location" class="text-base"></ion-icon>  
                    Check in 
                </button>
                <button type="button" class="grid place-items-center w-8 h-8 text-xl rounded-full bg-secondery">  
                    <ion-icon name="ellipsis-horizontal"></ion-icon>
                </button>
            </div>
 
            <div class="p-5 flex justify-between items-center">
                <div>
                    <button class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 group aria-expanded:bg-slate-100 aria-expanded: dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button"> 
                        Everyone
                        <ion-icon name="chevron-down-outline" class="text-base duration-500 group-aria-expanded:rotate-180"></ion-icon> 
                    </button>

                    <div  class="p-2 bg-white rounded-lg shadow-lg text-black font-medium border border-slate-100 w-60 dark:bg-slate-700"
                          uk-drop="offset:10;pos: bottom-left; reveal-left;animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left ; mode:click">
                               
                        <form>
                            <label>
                                <input type="radio" name="radio-status" id="monthly1" class="peer appearance-none hidden" checked />
                                <div class=" relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&_.active]:block dark:bg-dark3">
                                    <div class="text-sm">  Everyone </div> 
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio-status" id="monthly1" class="peer appearance-none hidden" />
                                <div class=" relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&_.active]:block dark:bg-dark3">
                                    <div class="text-sm"> Friends </div> 
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio-status" id="monthly" class="peer appearance-none hidden" />
                                <div class=" relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&_.active]:block dark:bg-dark3">
                                    <div class="text-sm"> Only me </div> 
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                                </div>
                            </label>
                        </form>

                    </div>
                </div>
                <div class="flex items-center gap-2"> 
                    <button type="button" class="button bg-blue-500 text-white py-2 px-12 text-[14px]"> Create</button>
                </div>
            </div>
        
        </div>

    </div>




    

</div>

@endsection
