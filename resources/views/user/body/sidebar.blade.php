

<div id="site__sidebar" class="fixed top-0 left-0 z-[99] pt-[--m-top] overflow-hidden transition-transform xl:duration-500 max-xl:w-full max-xl:-translate-x-full">

<!-- sidebar inner -->
<div class="p-2 max-xl:bg-white shadow-sm 2xl:w-72 sm:w-64 w-[80%] h-[calc(100vh-64px)] relative z-30 max-lg:border-r dark:max-xl:!bg-slate-700 dark:border-slate-700">

    <div class="pr-4" data-simplebar>

        <nav id="side">
        
            <ul>
                <li class="{{ Request::is('feeds') ? 'active' : '' }}">
                    <a href="{{ route('user.feeds') }}">
                        <img src="{{ $assetBase }}/images/icons/home.png" alt="feeds" class="w-6">
                        <span> Feed </span> 
                    </a>
                </li>

                <li class="{{ Request::is('friends/friends-list') ? 'active' : '' }}">
                    <a href="{{ route('friends.list') }}">
                        <img src="{{ $assetBase }}/images/icons/message.png" alt="messages" class="w-5">
                        <span> Friends </span> 
                    </a>
                </li> 
                <li>
                    <a href="{{ route('user.profile') }}">
                        <img src="{{ $assetBase }}/images/icons/event.png" alt="messages" class="w-6">
                        <span> My Profile </span> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/page.png" alt="pages" class="w-6">
                        <span> Pages </span> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/group.png" alt="groups" class="w-6">
                        <span> Groups </span> 
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/market.png" alt="market" class="w-7 -ml-1">
                        <span> market </span> 
                    </a>
                </li> 
                <li>
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/blog.png" alt="blog" class="w-6">
                        <span> blog </span> 
                    </a>
                </li> 
                <li class="!hidden" id="show__more">
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/game.png" alt="games" class="w-6">
                        <span> games </span> 
                    </a>
                </li>
                <li class="!hidden" id="show__more">
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/fund.png" alt="messages" class="w-6">
                        <span> Fundraiser  </span> 
                    </a>
                </li>
                <li class="!hidden" id="show__more">
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/blog-2.png" alt="blog" class="w-6">
                        <span> blog II </span> 
                    </a>
                </li>
                <li class="!hidden" id="show__more">
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/event-2.png" alt="event" class="w-6">
                        <span> Event II </span> 
                    </a>
                </li>
                <li class="!hidden" id="show__more">
                    <a href="#">
                        <img src="{{ $assetBase }}/images/icons/group-2.png" alt="groups" class="w-6">
                        <span> Groups II </span> 
                    </a>
                </li>

        </ul>
            
            <button type="button" class="flex items-center gap-4 py-2 px-4 w-full font-medium text-sm text-black dark:text-white" uk-toggle="target: #show__more; cls: !hidden uk-animation-fade"> 
                <svg class="bg-gray-200 rounded-full w-6 h-6 dark:bg-slate-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> 
                <span id="show__more"> See More </span> 
                <span class="!hidden" id="show__more"> See Less </span> 
            </button>

        </nav>

        <div class="font-medium text-sm text-black border-t pt-3 mt-2 dark:text-white dark:border-slate-800">
            <div class="px-3 pb-2 text-sm font-medium"> 
                <div class="text-black dark:text-white">Shortcut</div> 
            </div>
            <a href="#">
                <div class="flex items-center gap-2 p-3 px-4 rounded-xl hover:bg-secondery">
                    <img src="{{ $assetBase }}/images/avatars/avatar-2.jpg" alt="" class="w-6 rounded-full object-cover">
                    <div> Marin Gray</div>
                </div>
            </a>
            <a href="#">
                <div class="flex items-center gap-2 p-3 px-4 rounded-xl hover:bg-secondery">
                    <img src="{{ $assetBase }}/images/avatars/avatar-7.jpg" alt="" class="w-6 rounded-full object-cover">
                    <div>   Alexa Stella</div>
                </div>
            </a>
            <a href="#">
                <div class="flex items-center gap-2 p-3 px-4 rounded-xl hover:bg-secondery">
                    <img src="{{ $assetBase }}/images/avatars/avatar-3.jpg" alt="" class="w-6 rounded-full object-cover">
                    <div> Sarah Ali</div>
                </div>
            </a> 
        </div>

        <nav id="side" class="font-medium text-sm text-black border-t pt-3 mt-2 dark:text-white dark:border-slate-800">
            <div class="px-3 pb-2 text-sm font-medium"> 
                <div class="text-black dark:text-white">Pages</div> 
            </div>

            <ul class="mt-2 -space-y-2" 
                uk-nav="multiple: true">
    
                <li>
                    <a href="setting.html"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span> Setting </span>                  
                    </a>
                </li>
                <li>
                    <a href="upgrade.html"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <span> Upgrade </span>                  
                    </a>
                </li>
                <li>   
                    <a href="form-login.html"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span>   Authentication   </span>                  
                    </a>
                </li>
                <li class="uk-parent">
                    <a href="#" class="group"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <span>  Development   </span>   
                        <ion-icon name="chevron-down" class="text-base ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>              
                    </a>
                    <ul class="pl-10 my-1 space-y-0 text-sm">
                        <li><a href="components.html" class="!py-2 !rounded -md">Elements</a></li>
                        <li><a href="components.html" class="!py-2 !rounded -md">Components</a></li>
                        <li><a href="components.html" class="!py-2 !rounded -md">Icons</a></li>
                    </ul>
                </li>
            
            </ul>

        </nav>
    

        <div class="text-xs font-medium flex flex-wrap gap-2 gap-y-0.5 p-2 mt-2">
            <a href="#" class="hover:underline">About</a>
            <a href="#" class="hover:underline">Blog </a>
            <a href="#" class="hover:underline">Careers</a>
            <a href="#" class="hover:underline">Support</a>
            <a href="#" class="hover:underline">Contact Us </a>
            <a href="#" class="hover:underline">Developer</a>
        </div>

    </div>

</div>

<!-- sidebar overly -->
<div id="site__sidebar__overly" 
    class="absolute top-0 left-0 z-20 w-screen h-screen xl:hidden backdrop-blur-sm"
    uk-toggle="target: #site__sidebar ; cls :!-translate-x-0"> 
</div>
</div>