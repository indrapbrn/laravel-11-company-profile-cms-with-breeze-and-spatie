<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS for carousel/flickity-->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flickity-fade@2/flickity-fade.css">
  
</head>
<body class="font-poppins text-cp-black">

  <div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar/>
        <div class="flex flex-col gap-[50px] items-center py-20">
          <div class="breadcrumb flex items-center justify-center gap-[30px]">
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
            <span class="text-cp-light-grey">/</span>
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">About Us</p>
          </div>
          <h2 class="font-bold text-4xl leading-[45px] text-center">Since Beginning We Only <br> Want to Make World Better</h2>
        </div>
    </div>
  </div>
  
    @forelse($abouts as $about)
    <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">

        <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden">
            <img src="{{ Storage::url($about->thumbnail) }}"
                class="w-full h-full object-contain"
                alt="thumbnail">
        </div>

        <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
            <p class="badge w-fit bg-cp-pale-red text-cp-dark-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                OUR {{ strtoupper($about->type) }}
            </p>

            <div class="flex flex-col gap-[10px]">
                <h2 class="font-bold text-4xl leading-[45px]">
                    {{ $about->name }}
                </h2>

                <div class="flex flex-col gap-5">
                    @forelse($about->keypoints as $keypoint)
                        <div class="flex items-center gap-[10px]">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                            <p class="leading-[26px] font-semibold">
                                {{ $keypoint->keypoint }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-400">No keypoints available</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
    @empty
    <p class="text-center text-gray-400">Data not exists</p>
    @endforelse


  <!--Call with component/client.blade.php -->
  <x-client />

  <div id="Stats" class="bg-cp-black w-full mt-20">
    <div class="container max-w-[1000px] mx-auto py-10">
      <div class="flex flex-wrap items-center justify-between p-[10px]"> 
        @forelse($statistics as $statistic)
        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{ Storage::url($statistic->icon) }}" class="object-contain w-full h-full" alt="icon">
          </div>
          <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{$statistic->goal}}</p>
          <p class="text-cp-light-grey">{{$statistic->name}}</p>
        </div>
        @empty
        <p>New Data not exist</p>
        @endforelse
      </div>
    </div>
  </div>

  <!--Call with component/faq.blade.php -->
  <x-faq />

  <!--Call with component/footer.blade.php -->
  <x-footer />

  <div id="video-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full lg:w-1/2 max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-[20px] overflow-hidden shadow">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                  <h3 class="text-xl font-semibold text-cp-black">
                      Arisma Company Profile 
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" onclick="{modal.hide()}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="">
                <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src="" title="Demo Project Laravel Portfolio" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
          </div>
      </div>
  </div>

  <!--Call with component/script.blade.php -->
  <x-script />

</body>
</html>