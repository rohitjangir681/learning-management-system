 <div class="collapse navbar-collapse" id="sidebar-menu">
     <!-- BEGIN NAVBAR MENU -->
     <ul class="navbar-nav pt-lg-3">
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.dashboard') }}">
                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="icon icon-1">
                         <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                         <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                         <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                     </svg></span>
                 <span class="nav-link-title"> Home </span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.instructor.index') }}">
                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="icon icon-1">
                         <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                         <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                         <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                     </svg></span>
                 <span class="nav-link-title"> Instructor </span>
             </a>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                 data-bs-auto-close="false" role="button" aria-expanded="false">
                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="icon icon-1">
                         <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                         <path d="M12 12l8 -4.5" />
                         <path d="M12 12l0 9" />
                         <path d="M12 12l-8 -4.5" />
                         <path d="M16 5.25l-8 4.5" />
                     </svg></span>
                 <span class="nav-link-title"> Course Management </span>
             </a>
             <div class="dropdown-menu">
                 <div class="dropdown-menu-columns">
                     <div class="dropdown-menu-column">
                         <a class="dropdown-item" href="{{ route('admin.course-language.index') }}">
                             Course Language
                         </a>
                         <a class="dropdown-item" href="{{ route('admin.course-levels.index') }}">
                             Course Levels
                         </a>
                         <a class="dropdown-item" href="{{ route('admin.course-categories.index') }}">
                             Course Categories
                         </a>
                     </div>
                 </div>
             </div>

         </li>
     </ul>
     <!-- END NAVBAR MENU -->
 </div>
