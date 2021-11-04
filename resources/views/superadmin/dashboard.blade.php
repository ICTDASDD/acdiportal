
<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <x-slot name="main">
      <!-- Content header -->
          <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-1xl font-semibold">Dashboard > Monitoring</h1>
              
          </div>
    
        <!-- Content -->
        <div class="mt-2">
          <!-- State cards -->
          <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
            <!-- Value card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
              <div>
                <h6
                  class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                >
                  Users
                </h6>
                <span class="text-xl font-semibold">100</span>
                <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                  Active
                </span>
              </div>
              <div>
                <span>
                  <svg
                    class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                    />
                  </svg>
                </span>
              </div>
            </div>
  
    
            <!-- Users card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
              <!-- Bar chart card -->
              
                <!-- Card header -->
                <div>
                        <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light" >
                        DMS
                        </h6>
                        <span class="text-xl font-semibold">Status</span>
                      <span class="inline-block px-2 py-px ml-2 text-xs text-red-500 bg-red-100 rounded-md">
                        Under Development
                      </span>
                </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500 dark:text-light">Switch</span>
                    <button
                      class="relative focus:outline-none"
                      x-cloak
                      @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                    >
                      <div
                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                      ></div>
                      <div
                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                        :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                      ></div>
                    </button>
                  </div>
                
                <!-- Chart -->
              
            </div>
    
            <!-- Orders card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
              <!-- Bar chart card -->
              
                <!-- Card header -->
                <div>
                        <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light" >
                        AHRIS
                        </h6>
                        <span class="text-xl font-semibold">Status</span>
                      <span class="inline-block px-2 py-px ml-2 text-xs text-red-500 bg-red-100 rounded-md">
                        Under Development
                      </span>
                </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500 dark:text-light">Switch</span>
                    <button
                      class="relative focus:outline-none"
                      x-cloak
                      @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                    >
                      <div
                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                      ></div>
                      <div
                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                        :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                      ></div>
                    </button>
                  </div>
                
                <!-- Chart -->
              
            </div>
    
            <!-- Tickets card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
              <!-- Bar chart card -->
              
                <!-- Card header -->
                <div>
                        <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light" >
                        DMS
                        </h6>
                        <span class="text-xl font-semibold">Status</span>
                      <span class="inline-block px-2 py-px ml-2 text-xs text-red-500 bg-red-100 rounded-md">
                        Under Development
                      </span>
                </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500 dark:text-light">Switch</span>
                    <button
                      class="relative focus:outline-none"
                      x-cloak
                      @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                    >
                      <div
                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                      ></div>
                      <div
                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                        :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                      ></div>
                    </button>
                  </div>
                
                <!-- Chart -->
              
            </div>
          </div>
    
          <!-- Charts -->
          <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
            <!-- Bar chart card -->
            <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
              <!-- Card header -->
              <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                <div class="flex items-center space-x-2">
                  <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                  <button
                    class="relative focus:outline-none"
                    x-cloak
                    @click="isOn = !isOn; $parent.updateBarChart(isOn)"
                  >
                    <div
                      class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                    ></div>
                    <div
                      class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                      :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                    ></div>
                  </button>
                </div>
              </div>
              <!-- Chart -->
              <div class="relative p-4 h-72">
                <canvas id="barChart"></canvas>
              </div>
            </div>
    
            <!-- Doughnut chart card -->
            <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
              <!-- Card header -->
              <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                <div class="flex items-center">
                  <button
                    class="relative focus:outline-none"
                    x-cloak
                    @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)"
                  >
                    <div
                      class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"
                    ></div>
                    <div
                      class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                      :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"
                    ></div>
                  </button>
                </div>
              </div>
              <!-- Chart -->
              <div class="relative p-4 h-72">
                <canvas id="doughnutChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </x-slot>
    
</x-app-layout>
