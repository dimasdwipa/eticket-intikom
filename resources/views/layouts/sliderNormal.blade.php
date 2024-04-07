
  @if(Auth::user()->role=="user")
  
  <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ url('/user') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'New Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('ticket.create') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">confirmation_number</i>
        </div>
        <span class="nav-link-text ms-1">New Ticket</span>
      </a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'My Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('summary-report') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">My Ticket</span>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Select Tenant' ? 'active bg-gradient-primary' : '' }}" href="{{ route('select.tenant') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">domain_add</i>
        </div>
        <span class="nav-link-text ms-1">Select Tenant</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">badge</i>
        </div>
        <span class="nav-link-text ms-1">My Profile</span>
      </a>
    </li>
  @endif

  @if(Auth::user()->role=="agent-user")
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Task' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.myticket') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">My Task</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.complain') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
          </div>
          <span class="nav-link-text ms-1">Complain</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">work_history</i>
          </div>
          <span class="nav-link-text ms-1">My Request</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'New Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('ticket.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <span class="nav-link-text ms-1">New Ticket</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Sales Admin Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('sa.sales-ticket.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <span class="nav-link-text ms-1">Sales Admin Ticket</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('summary-report') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">My Ticket</span>
          </a>
        </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
      </li>
  @endif

  @if(Auth::user()->role=="agent")
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Task' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.myticket') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">My Task</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.complain') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
          </div>
          <span class="nav-link-text ms-1">Complain</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">work_history</i>
          </div>
          <span class="nav-link-text ms-1">My Request</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
      </li>
  @endif

  @if(Auth::user()->role=="supervisor-agent-user")
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
      </li>

      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Assignment' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.assignment') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">Assignment</span>
      </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Task' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.myticket') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">My Task</span>
          </a>
      </li>


      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Pending Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.request-extend') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">event_available</i>
          </div>
          <span class="nav-link-text ms-1">Pending Request</span>
      </a>
      </li>

      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Tasking' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_task</i>
          </div>
          <span class="nav-link-text ms-1">Tasking</span>
          </a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Update Tickets' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Update Tickets</span>
      </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.complain') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
          </div>
          <span class="nav-link-text ms-1">Complain</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report Sales Admin' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla_sa') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report Sales Admin</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'New Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('ticket.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <span class="nav-link-text ms-1">New Ticket</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Sales Admin Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('sa.sales-ticket.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <span class="nav-link-text ms-1">Sales Admin Ticket</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('summary-report') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">My Ticket</span>
          </a>
        </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Category and Base Unit' ? 'active bg-gradient-primary' : '' }}" href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
          </div>
          <span class="nav-link-text ms-1">Category And Base Unit</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Manage Agent' ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">support_agent</i>
          </div>
          <span class="nav-link-text ms-1">Manage Agent</span>
          </a>
      </li>
      <!-- <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'List of tenants' ? 'active bg-gradient-primary' : '' }} "  href="{{ url('teams') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">domain_add</i>
        </div>
        <span class="nav-link-text ms-1">Tenants</span>
      </a> -->
  </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
        </li>
  @endif

  @if(Auth::user()->role=="supervisor-agent")
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
      </li>

      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Assignment' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.assignment') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">Assignment</span>
      </a>
      </li>

      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'My Task' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.myticket') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">My Task</span>
          </a>
      </li>


      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Pending Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.request-extend') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">event_available</i>
          </div>
          <span class="nav-link-text ms-1">Pending Request</span>
      </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Tasking' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_task</i>
          </div>
          <span class="nav-link-text ms-1">Tasking</span>
          </a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Update Tickets' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Update Tickets</span>
      </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.complain') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
          </div>
          <span class="nav-link-text ms-1">Complain</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report Sales Admin' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla_sa') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report Sales Admin</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Category and Base Unit' ? 'active bg-gradient-primary' : '' }}" href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
          </div>
          <span class="nav-link-text ms-1">Category And Base Unit</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Manage Agent' ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">support_agent</i>
          </div>
          <span class="nav-link-text ms-1">Manage Agent</span>
          </a>
      </li>
      <!-- <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'List of tenants' ? 'active bg-gradient-primary' : '' }} "  href="{{ url('teams') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">domain_add</i>
        </div>
        <span class="nav-link-text ms-1">Tenants</span>
      </a> -->
  </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
        </li>
  @endif

  @if(Auth::user()->role=="supervisor")
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
      </li>

      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Assignment' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.assignment') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">local_activity</i>
          </div>
          <span class="nav-link-text ms-1">Assignment</span>
      </a>

      </li>

      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Pending Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.request-extend') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">event_available</i>
          </div>
          <span class="nav-link-text ms-1">Pending Request</span>
      </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Tasking' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_task</i>
          </div>
          <span class="nav-link-text ms-1">Tasking</span>
          </a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Update Tickets' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Update Tickets</span>
      </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.complain') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
          </div>
          <span class="nav-link-text ms-1">Complain</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report Sales Admin' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla_sa') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report Sales Admin</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Category and Base Unit' ? 'active bg-gradient-primary' : '' }}" href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
          </div>
          <span class="nav-link-text ms-1">Category And Base Unit</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Manage Agent' ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">support_agent</i>
          </div>
          <span class="nav-link-text ms-1">Manage Agent</span>
          </a>
      </li>
      <!-- <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'List of tenants' ? 'active bg-gradient-primary' : '' }} "  href="{{ url('teams') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">domain_add</i>
        </div>
        <span class="nav-link-text ms-1">Tenants</span>
      </a> -->
  </li>
      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
        </li>
  @endif

  @if(Auth::user()->role=="manager")
  <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.index') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
      </a>
  </li>
  <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'SLA Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report</span>
        </a>
  </li>
  <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report Sales Admin' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla_sa') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report Sales Admin</span>
          </a>
      </li>
  <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.complain') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assured_workload</i>
          </div>
          <span class="nav-link-text ms-1">Complain</span>
          </a>
      </li>
  <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Manage Supervisor' ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">supervised_user_circle</i>
          </div>
          <span class="nav-link-text ms-1">Supervisor And Agent</span>
          </a>
  </li>
  <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Category and Base Unit' ? 'active bg-gradient-primary' : '' }}" href="{{ route('category.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
            </div>
            <span class="nav-link-text ms-1">Category And Base Unit</span>
          </a>
  </li>
  <!-- <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'List of tenants' ? 'active bg-gradient-primary' : '' }} "  href="{{ url('teams') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">domain_add</i>
        </div>
        <span class="nav-link-text ms-1">Tenants</span>
      </a> -->
  </li>

      <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <span class="nav-link-text ms-1">My Profile</span>
          </a>
        </li>
  @endif

  @if(Auth::user()->role=="administrator")
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ url('/user') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'New Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('ticket.create') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">confirmation_number</i>
        </div>
        <span class="nav-link-text ms-1">New Ticket</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Sales Admin Ticket' ? 'active bg-gradient-primary' : '' }}" href="{{ route('sa.sales-ticket.create') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">confirmation_number</i>
        </div>
        <span class="nav-link-text ms-1">Sales Admin Ticket</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Summary Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('summary-report') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
        </div>
        <span class="nav-link-text ms-1">Summary Report</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Complain' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.complain') }}">
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">assured_workload</i>
      </div>
      <span class="nav-link-text ms-1">Complain</span>
      </a>
  </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Profile' ? 'active bg-gradient-primary' : '' }}" href="{{ route('profile.create') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">badge</i>
        </div>
        <span class="nav-link-text ms-1">My Profile</span>
      </a>
    </li>
    <hr class="horizontal light mt-0 mb-2">
    <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Assignment' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.assignment') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">local_activity</i>
        </div>
        <span class="nav-link-text ms-1">Assignment</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'Tasking' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add_task</i>
          </div>
          <span class="nav-link-text ms-1">Tasking</span>
        </a>
    </li>
  <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'SLA Extension Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.request-extend') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">event_available</i>
        </div>
        <span class="nav-link-text ms-1">SLA Extension Request</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Summary Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
        </div>
        <span class="nav-link-text ms-1">Summary Report</span>
      </a>
  </li>
  <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'SLA Report' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report</span>
        </a>
  </li>
  <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'SLA Report Sales Admin' ? 'active bg-gradient-primary' : '' }}" href="{{ route('supervisor.summary-report-sumpervisor-sla_sa') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">summarize</i>
          </div>
          <span class="nav-link-text ms-1">SLA Report Sales Admin</span>
          </a>
      </li>
  <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'Category and Base Unit' ? 'active bg-gradient-primary' : '' }}" href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">category</i>
          </div>
          <span class="nav-link-text ms-1">Category And Base Unit</span>
        </a>
  </li>
  <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'Manage Agent' ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">support_agent</i>
          </div>
          <span class="nav-link-text ms-1">Manage Agent</span>
        </a>
  </li>
  <hr class="horizontal light mt-0 mb-2">
  <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.index') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'My Task' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.myticket') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">local_activity</i>
        </div>
        <span class="nav-link-text ms-1">My Task</span>
      </a>
    </li>
  <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'Pending Request' ? 'active bg-gradient-primary' : '' }}" href="{{ route('agent.create') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">work_history</i>
        </div>
        <span class="nav-link-text ms-1">Pending Request</span>
      </a>
    </li>
  <hr class="horizontal light mt-0 mb-2">
  <li class="nav-item">
        <a class="nav-link text-white {{ $page == 'Manage Supervisor' ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.create') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">supervised_user_circle</i>
          </div>
          <span class="nav-link-text ms-1">Supervisor And Agent</span>
        </a>
  </li>
  <!-- <li class="nav-item">
      <a class="nav-link text-white {{ $page == 'List of tenants' ? 'active bg-gradient-primary' : '' }} "  href="{{ url('teams') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">domain_add</i>
        </div>
        <span class="nav-link-text ms-1">Tenants</span>
      </a> -->
  </li>
  <li class="nav-item">
      <a class="nav-link text-white" href="{{ url('admin/user-activity') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">manage_history</i>
        </div>
        <span class="nav-link-text ms-1">Activity Log</span>
      </a>
  </li>
  @endif
