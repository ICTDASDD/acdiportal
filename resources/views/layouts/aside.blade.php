<!-- Loading screen -->
<div
x-ref="loading"
class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
>
Loading.....
</div>


<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
    <div class="flex flex-col h-full">


      <div class="flex items-center justify-center p-2  dark:border-primary-darker ">
        <img class="w-20 h-20 rounded-full" src="{{ asset('build/images/avatar.jpg') }}" alt="{{Auth::user()->name}}" />
      </div>

      <div class="flex items-center justify-center p-2  dark:border-primary-darker ">
        {{Auth::user()->name}}
      </div>

      <!-- Sidebar links -->
      <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
        <!-- Dashboards links -->

        @if(Auth::user()->hasRole('superadministrator'))

        @if(request()->routeIs('dashboard')  OR request()->routeIs('superadmin.reports'))
        <div x-data="{ isActive: true, open: true}">
          @else
          <div x-data="{ isActive: false, open: false }">
        @endif
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
              </svg>
            </span>
            <span class="ml-2 text-sm"> Dashboards </span>
            <span class="ml-auto" aria-hidden="true">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
            href="{{route('dashboard')}}"
              role="menuitem"
              @if(request()->routeIs('dashboard'))
              class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
              @else
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
              @endif
              
            >
              Monitoring
            </a>
            <a
              href="#"
              role="menuitem"
              @if(request()->routeIs('spadmin/reports'))
              class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
              @else
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
              @endif
            >
              Reports
            </a>
            <a
              href="#"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Freedom Wall
            </a>
          </div>
        </div>
        @endif

        <!-- Components links -->
        @if(request()->routeIs('superadmin.users'))
        <div x-data="{ isActive: true, open: true}">
          @else
          <div x-data="{ isActive: false, open: false }">
        @endif
          <!-- active classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
              </svg>
            </span>
            <span class="ml-2 text-sm"> Users </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="User Control">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
            href="{{route('superadmin.users')}}"
            role="menuitem"
            @if(request()->routeIs('superadmin.users'))
            class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            @else
            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            @endif
            >
              Active User
            </a>
            <a
              href="#"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              Add User
            </a>
            <a
              href="#"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Access Request
            </a>
            <a
              href="#"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Migration
            </a>
          </div>
        </div>

        <!-- Pages links -->
        <div x-data="{ isActive: false, open: false }">
          <!-- active classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <svg
                class="w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                />
              </svg>
            </span>
            <span class="ml-2 text-sm"> Web Apps </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="pages/blank.html"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              AHRIS
            </a>
            <a
              href="pages/404.html"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              DMS
            </a>
            <a
              href="pages/500.html"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              DRS
            </a>
          </div>
        </div>

      </nav>

      <!-- Sidebar footer -->
      <div class="flex-shrink-0 px-2 py-4 space-y-2">
        <button
          @click="openSettingsPanel"
          type="button"
          class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
        >
          <span aria-hidden="true">
            <svg
              class="w-4 h-4 mr-2"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
              />
            </svg>
          </span>
          <span>Customize</span>
        </button>
      </div>
    </div>
  </aside>