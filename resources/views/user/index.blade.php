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
        


        <!-- post text-->
        <div class="container">
    @foreach($posts as $post)
        <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2 mb-4">
            <!-- Post content -->
            <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                <a href="#"> <img src="{{ $post->user->photo ? asset('upload/user_images/'.$post->user->photo) : asset('upload/no_image.jpg') }}" alt="" class="w-9 h-9 rounded-full"> </a>
                <div class="flex-1">
                    <a href="#"> <h4 class="text-black dark:text-white">{{ $post->user->name }}</h4> </a>
                    <div class="text-xs text-gray-500 dark:text-white/80">{{ $post->created_at->diffForHumans() }}</div>
                </div>
            </div>
            
            <div class="sm:px-4 p-2.5 pt-0">
                <p class="font-normal">{{ $post->content }}</p>
            </div>

            <!-- Comments -->
            <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                @foreach($post->comments as $comment)
                    <div class="flex items-start gap-3 relative">
                        <a href="#"> <img src="{{ asset('frontend/assets/images/avatars/avatar-2.jpg') }}" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white">{{ $comment->user->name }}</a>
                            <p class="mt-0.5">{{ $comment->content }}</p>
                            
                            <!-- Replies -->
                            @foreach($comment->replies as $reply)
                                <div class="flex items-start gap-3 relative ml-4">
                                    <a href="#"> <img src="{{ asset('frontend/assets/images/avatars/avatar-3.jpg') }}" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                    <div class="flex-1">
                                        <a href="#" class="text-black font-medium inline-block dark:text-white">{{ $reply->user->name }}</a>
                                        <p class="mt-0.5">{{ $reply->content }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Add reply -->
                            <form action="{{ route('replies.store', $comment->id) }}" method="POST">
                                @csrf
                                <div class="flex items-start gap-3 relative ml-4 mt-2">
                                    <img src="{{ asset('frontend/assets/images/avatars/avatar-7.jpg') }}" alt="" class="w-6 h-6 rounded-full">
                                    <div class="flex-1">
                                        <textarea name="content" rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent" placeholder="Add a reply..."></textarea>
                                    </div>
                                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondary">Reply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach

                <!-- Add comment -->
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="flex items-start gap-3 relative">
                        <img src="{{ $post->user->photo ? asset('upload/user_images/'.$post->user->photo) : asset('upload/no_image.jpg') }}" alt="" class="w-6 h-6 rounded-full">
                        <div class="flex-1">
                            <textarea name="content" rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent" placeholder="Add a comment..."></textarea>
                        </div>
                        <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondary">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
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
           <h2 class="text-sm font-medium text-black"> Create Status </h2>

           <!-- close button -->
           <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
               </svg>
           </button>
      </div>
      
      <form action="{{ route('posts.store') }}" method="get" enctype="multipart/form-data">
         @csrf
         <div class="space-y-5 mt-3 p-2">
            <textarea class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800" name="content" id="content" rows="6" placeholder="What do you have in mind?"></textarea>
         </div>



         <input type="hidden" name="status" id="status" value="Everyone">

         <div class="p-5 flex justify-between items-center">
            <div>
                <button id="statusButton" class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 group aria-expanded:bg-slate-100 aria-expanded: dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button">
                    Everyone
                    <ion-icon name="chevron-down-outline" class="text-base duration-500 group-aria-expanded:rotate-180"></ion-icon>
                </button>

                <div class="p-2 bg-white rounded-lg shadow-lg text-black font-medium border border-slate-100 w-60 dark:bg-slate-700"
                    uk-drop="offset:10;pos: bottom-left; reveal-left;animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left ; mode:click">
                    <label>
                        <input type="radio" name="radio-status" id="everyone" class="peer appearance-none hidden" checked onclick="updateStatus('Everyone')" />
                        <div class="relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondary peer-checked:bg-secondary dark:bg-dark3">
                            <div class="text-sm">Everyone</div>
                            <ion-icon name="checkmark-circle" class="hidden peer-checked:block absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                        </div>
                    </label>
                    <label>
                        <input type="radio" name="radio-status" id="friends" class="peer appearance-none hidden" onclick="updateStatus('Friends')" />
                        <div class="relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondary peer-checked:bg-secondary dark:bg-dark3">
                            <div class="text-sm">Friends</div>
                            <ion-icon name="checkmark-circle" class="hidden peer-checked:block absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                        </div>
                    </label>
                    <label>
                        <input type="radio" name="radio-status" id="only-me" class="peer appearance-none hidden" onclick="updateStatus('Only me')" />
                        <div class="relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondary peer-checked:bg-secondary dark:bg-dark3">
                            <div class="text-sm">Only me</div>
                            <ion-icon name="checkmark-circle" class="hidden peer-checked:block absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                        </div>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">Create</button>
            </div>
         </div>
      </form>
   </div>
</div>

<script>
    function updateStatus(status) {
        document.getElementById('statusButton').innerText = status;
        document.getElementById('status').value = status;
    }
</script>







    

</div>

<!-- <script>
    function updateStatus(status) {
        document.getElementById('statusButton').innerText = status;
    }
</script> -->

@endsection
