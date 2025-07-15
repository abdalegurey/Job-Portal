 <aside class="fixed z-50 md:relative">
    <!-- Sidebar -->
    <input type="checkbox" class="peer hidden" id="sidebar-open" />
    <label class="peer-checked:rounded-full peer-checked:p-2 peer-checked:right-6 peer-checked:bg-gray-600 peer-checked:text-white absolute top-8 z-20 mx-4 cursor-pointer md:hidden" for="sidebar-open">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>
    <nav aria-label="Sidebar Navigation" class="peer-checked:w-64 left-0 z-10 flex h-screen w-0 flex-col overflow-hidden bg-gray-700 text-white transition-all md:h-screen md:w-64 lg:w-72">
     
   <ul class="mt-2 space-y-3 md:mt-5 text-gray-300">
  <!-- Dashboard (Home) -->
  <li>
    <a href="/dashboard" class="flex items-center space-x-2 px-10 py-4 rounded-md hover:bg-slate-600 focus:bg-slate-600">
    <ii class="fas fa-chart-line"></ii>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Jobs -->
  <li>
    <a href="{{ route("adminjobs.index") }}" class="flex items-center space-x-2 px-10 py-4 rounded-md hover:bg-slate-600 focus:bg-slate-600">
      <ii class="fas fa-briefcase"></ii>
      <span>Manage Jobs</span>
    </a>
  </li>

  <!-- Applicants -->
  <li>
    <a href="{{ route("adminadmin.applicants.index")}}" class="flex items-center space-x-2 px-10 py-4 rounded-md hover:bg-slate-600 focus:bg-slate-600">
     <i class="fas fa-user-check"></i>

      <span>View Applicants</span>
    </a>
  </li>

  <!-- Settings -->
  <li>
    <a href="{{ route("adminusers.index") }}" class="flex items-center space-x-2 px-10 py-4 rounded-md hover:bg-slate-600 focus:bg-slate-600">
      <ii class="fas fa-users"></ii>
      <span>users</span>
    </a>
  </li>

  <!-- Logout -->
  <li>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="flex w-full items-center space-x-2 px-10 py-4 rounded-md hover:bg-red-600 focus:bg-red-600">
       <i class="fas fa-sign-out-alt"></i>

        <span>Logout</span>
      </button>
    </form>
  </li>
</ul>


      
    </nav>
  </aside>