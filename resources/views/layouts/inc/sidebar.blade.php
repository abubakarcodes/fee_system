 <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                 <i class="fa fa-tachometer"></i> Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{request()->routeIs('students.*') ? "active" : ''}}" href="{{ route('students.index') }}">
                 <i class="fa fa-users"></i> Registered Students
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('courses.*') ? "active" : ''}}" href="{{ route('courses.index') }}">
                 <i class="fa fa-book"></i>
                    Courses
                </a>
              </li>
                  <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('fees.*') ? "active" : ''}}" href="{{ route('fees.index') }}">
                 <i class="fa fa-users"></i>
                    Enrolled Student
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('college-expenses.*') ? "active" : ''}}" href="{{ route('college-expenses.index') }}">
                 <i class="fa fa-money"></i>
                    College Expenses
                </a>
              </li>
            
            </ul>

         
          </div>
        </nav>