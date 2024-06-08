@php
    $assetBase = asset('frontend/assets/');
@endphp

<!DOCTYPE html>
<html lang="en">

<!-- Fri, 07 Jun 2024 21:06:01 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ $assetBase }}/images/favicon.png" rel="icon" type="image/png">

    <!-- title and description-->
    <title>Socialite</title>
    <meta name="description" content="Socialite - Social sharing network HTML Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
    <!-- css files -->
    <link rel="stylesheet" href="{{ $assetBase }}/css/tailwind.css">
    <link rel="stylesheet" href="{{ $assetBase }}/css/style.css">  
    
    <link href=" {{ $assetBase }}/toaster/toastr.css') }}" rel="stylesheet" />
    
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
 
</head>
<body>
 
    <div id="wrapper">

        <!-- header -->

        @include('user.body.header')
    
        <!-- sidebar -->
        @include('user.body.sidebar')


        <!-- main contents -->
        <main id="site__main" class="2xl:ml-[--w-side]  xl:ml-[--w-side-sm] p-2.5 h-[calc(100vh-var(--m-top))] mt-[--m-top]">

             @yield('user')
            <!-- timeline -->
        </main>

    </div>




    
    <!-- post preview modal --> 
    <div class="hidden lg:p-20 max-lg:!items-start" id="preview_modal" uk-modal="">
        
        <div class="uk-modal-dialog tt relative mx-auto overflow-hidden shadow-xl rounded-lg lg:flex items-center ax-w-[86rem] w-full lg:h-[80vh]">
          
            <!-- image previewer -->
            <div class="lg:h-full lg:w-[calc(100vw-400px)] w-full h-96 flex justify-center items-center relative">
                
                <div class="relative z-10 w-full h-full">
                    <img src="{{ $assetBase }}/images/post/post-1.jpg" alt="" class="w-full h-full object-cover absolute">
                </div>
  
                <!-- close button -->
                <button type="button"  class="bg-white rounded-full p-2 absolute right-0 top-0 m-3 uk-animation-slide-right-medium z-10 dark:bg-slate-600 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>

            <!-- right sidebar -->
            <div class="lg:w-[400px] w-full bg-white h-full relative  overflow-y-auto shadow-xl dark:bg-dark2 flex flex-col justify-between">
                
                <div class="p-5 pb-0">

                    <!-- story heading -->
                    <div class="flex gap-3 text-sm font-medium">
                        <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-9 h-9 rounded-full">
                        <div class="flex-1">
                            <h4 class="text-black font-medium dark:text-white"> Steeve </h4>
                            <div class="text-gray-500 text-xs dark:text-white/80"> 2 hours ago</div>
                        </div>
 
                        <!-- dropdown -->
                        <div class="-m-1">
                            <button type="button" class="button__ico w-8 h-8"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                            <div  class="w-[253px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true"> 
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

                    <p class="font-normal text-sm leading-6 mt-4"> Photography is the art of capturing light with a camera.  it can be fun, challenging. It can also be a hobby, a passion. 📷 </p>

                    <div class="shadow relative -mx-5 px-5 py-3 mt-3">
                        <div class="flex items-center gap-4 text-xs font-semibold">
                            <div class="flex items-center gap-2.5">
                                <button type="button" class="button__ico text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                <a href="#">1,300</a>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="button" class="button__ico bg-slate-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                                <span>260</span>
                            </div>
                            <button type="button" class="button__ico ml-auto"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
                            <button type="button" class="button__ico"> <ion-icon class="text-xl" name="bookmark-outline"></ion-icon> </button>
                        </div>
                    </div>

                </div>

                <div class="p-5 h-full overflow-y-auto flex-1">

                    <!-- comment list -->
                    <div class="relative text-sm font-medium space-y-5"> 
                
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                                <p class="mt-0.5">What a beautiful, I love it. 😍 </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                <p class="mt-0.5">   You captured the moment.😎 </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Alexa </a>
                                <p class="mt-0.5"> This photo is amazing!   </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> John  </a>
                                <p class="mt-0.5"> Wow, You are so talented 😍 </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Michael </a>
                                <p class="mt-0.5"> I love taking photos   🌳🐶</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                <p class="mt-0.5">  Awesome. 😊😢 </p>
                            </div>
                        </div> 
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Jesse </a>
                                <p class="mt-0.5"> Well done 🎨📸   </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                                <p class="mt-0.5">What a beautiful, I love it. 😍 </p>
                            </div>
                        </div> 
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Alexa </a>
                                <p class="mt-0.5"> This photo is amazing!   </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> John  </a>
                                <p class="mt-0.5"> Wow, You are so talented 😍 </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Michael </a>
                                <p class="mt-0.5"> I love taking photos   🌳🐶</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 relative">
                            <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                <p class="mt-0.5">  Awesome. 😊😢 </p>
                            </div>
                        </div>  
                         
                    </div>

                </div>

               

            </div>
   
        </div>
        
    </div>



    <!-- create story -->
    <div class="hidden lg:p-20" id="create-story" uk-modal="">
   
        <div class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white p-7 shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

            <div class="text-center py-3 border-b -m-7 mb-0 dark:border-slate-700">
                <h2 class="text-sm font-medium"> Create Status </h2>

                <!-- close button -->
                <button type="button" class="button__ico absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
     
            </div>
                    
            <div class="space-y-5 mt-7">

                <div> 
                    <label for="" class="text-base">What do you have in mind? </label>
                    <input type="text"  class="w-full mt-3">
                </div>

                <div>  
                    <div class="w-full h-72 relative border1 rounded-lg overflow-hidden bg-[url('../images/ad_pattern.html')] bg-repeat">
                    
                        <label for="createStatusUrl" class="flex flex-col justify-center items-center absolute -translate-x-1/2 left-1/2 bottom-0 z-10 w-full pb-6 pt-10 cursor-pointer bg-gradient-to-t from-gray-700/60">
                            <input id="createStatusUrl" type="file" class="hidden" />
                            <ion-icon name="image" class="text-3xl text-teal-600"></ion-icon>
                            <span class="text-white mt-2">Browse to Upload image </span>
                        </label>

                        <img id="createStatusImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;" class="w-full h-full absolute object-cover">

                    </div>

                </div>
                
                <div class="flex justify-between items-center">

                    <div class="flex items-start gap-2">
                        <ion-icon name="time-outline" class="text-3xl text-sky-600  rounded-full bg-blue-50 dark:bg-transparent"></ion-icon>
                        <p class="text-sm text-gray-500 font-medium"> Your Status will be available <br> for <span class="text-gray-800"> 24 Hours</span> </p>
                    </div>

                    <button type="button" class="button bg-blue-500 text-white px-8"> Create</button>

                </div>

            </div>
        
        </div>

    </div>

 

    <!-- Javascript  -->
    <script src="{{ $assetBase }}/js/uikit.min.js"></script>
    <script src="{{ $assetBase }}/js/simplebar.js"></script>
    <script src="{{ $assetBase }}/js/script.js"></script>
 
 
    <!-- Ion icon -->
    <script type="module" src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js"></script>
    
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ $assetBase }}/sweetalert-code/code.js"></script>

        <!-- toaster -->
      
 

</body>

<!-- Fri, 07 Jun 2024 21:07:27 GMT -->
</html>