<!-- component -->
<!-- component -->
<div class=" flex  flex-col  md:flex-row justify-center  flex-wrap gap-3 mt-10  ">

    <div class="">
        <div
            class="bg-white max-w-xs shadow-lg   mx-auto border-b-4 border-indigo-500 rounded-2xl overflow-hidden  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="bg-indigo-500  flex h-20  items-center">
                <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">1</h1>
                <p class="ml-4 text-white uppercase">Title</p>
            </div>
            <p class="py-6 px-6 text-lg tracking-wide text-center">Description Goes here</p>
            <!-- <hr > -->
            <div class="flex justify-center px-5 mb-2 text-sm ">
                <button type="button"
                    class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                    Details
                </button>
            </div>
        </div>
    </div>

    <div class="">
        <div
            class="bg-white max-w-xs mx-auto rounded-2xl  border-b-4 border-green-500 overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="h-20 bg-green-500 flex items-center ">
                <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">2</h1>
                <p class=" text-white text-base ml-4 uppercase">
                    Title
                </p>
            </div>
            <p class="py-6 px-6 text-lg tracking-wide text-center">Description Goes Here</p>
            <!-- <hr > -->
            <div class="flex justify-center px-5 mb-2 text-sm ">
                <button type="button"
                    class="border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline">
                    Details
                </button>
            </div>
        </div>
    </div>

    <div class="">
        <div
            class="bg-white max-w-xs mx-auto rounded-2xl  border-b-4 border-red-500 overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="h-20 bg-red-500 flex items-center ">
                <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">3</h1>
                <p class=" text-white text-base ml-4 uppercase">
                    Title
                </p>
            </div>
            <p class="py-6  px-6 text-lg tracking-wide text-center">Description Goes Here</p>
            <!-- <hr > -->
            <div class="flex justify-center px-5 mb-2 text-sm ">
                <button type="button"
                    class="border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline">
                    Details
                </button>
            </div>
        </div>
    </div>

</div>
<div class="flex flex-col md:flex-row max-w-2xl">
    <div class="max-w-xs mx-auto bg-white rounded-xl p-5 shadow-2xl m-2">
        <p> Esther creates truly beautiful components,
            you should definitely work with her. The end
            results are always worth it. A great find!
        </p>
        <div class='mt-5 flex items-center'>
            <img src='https://picsum.photos/60/60' class='rounded-full'>
            <div class="ml-3">
                <h3 class="font-semibold"> Lana Del Rey </h2>
                    <p class="text-gray-500"> Singer/songwriter </p>
            </div>
        </div>
    </div>
    <div class="max-w-xs mx-auto bg-white rounded-xl p-5 shadow-2xl m-2">
        <p> Esther creates truly beautiful components,
            you should definitely work with her. The end
            results are always worth it. A great find!
        </p>
        <div class='mt-5 flex items-center'>
            <img src='https://picsum.photos/60/60' class='rounded-full'>
            <div class="ml-3">
                <h3 class="font-semibold"> Ariel </h2>
                    <p class="text-gray-500"> Mermaid @ Disney </p>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar footer -->
<div class="flex-shrink-0 p-2 border-t max-h-10 text-black">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button href="{{ route('logout') }}" onclick="event.preventDefault();
                   this.closest('form').submit();" type="button"
            class="flex items-center justify-center w-full space-x-1 font-medium tracking-wider bg-gray-100 border rounded-md focus:outline-none focus:ring">
            <span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> Cerrar Sesión </span>
        </button>
    </form>
</div>
