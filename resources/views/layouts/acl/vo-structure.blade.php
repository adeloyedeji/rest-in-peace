<li class="list-title">Dashboard</li>

<li @if(active('/')) class="active" @endif>
    <a href="{{url('/')}}" @if(active('/')) class="active" @endif>
        <i class="icon-display4"></i>
        <span class="list-label"> Dashboard</span>
    </a>
</li>

<li class="list-title">Modules</li>

<li @if(active('projects')) class="acc-parent-li active" @endif>
    <a href="{{ route('projects.index') }}" @if(active('projects')) class="acc-parent active" @endif>
        <i class="icon-briefcase"></i>
        <span>Projects</span>
    </a>
    <ul>
        <li @if(active('projects')) class="active" @endif>
            <a href="{{ route('projects.index') }}">Projects list</a>
        </li>
    </ul>
</li>

<li @if(active('beneficiaries') || active('beneficiaries/*')) class="acc-parent-li active" @endif>
    <a href="{{ route('beneficiaries.index') }}" @if(active('beneficiaries') || active('beneficiaries/*')) class="acc-parent active" @endif>
        <i class="icon-users2"></i>
        <span>Beneficiaries</span>
    </a>
    <ul>
        <li @if(active('beneficiaries')) class="active" @endif><a href="{{ route('beneficiaries.index') }}">All Beneficiaries</a></li>
        <li @if(active('beneficiaries/create')) class="active" @endif><a href="{{ route('beneficiaries.create') }}">New Beneficiary</a></li>
        <li @if(active('beneficiaries/search')) class="active" @endif><a href="{{ route('beneficiaries.search') }}">Search Database</a></li>
    </ul>
</li>

<li class="list-title">Valuations</li>

<li @if(active('structure-valuations') || active('structure-valuations/*')) class="acc-parent-li active" @endif>
    <a href="{{ url('structure-valuations/index') }}" @if(active('structure-valuations') || active('structure-valuations/*')) class="acc-parent active" @endif><i class="icon-chart"></i> <span>Structure Valuation</span></a>
    <ul>
        <li @if(active('structure-valuations')) class="active" @endif>
            <a href="{{ route('structure-valuations.index') }}">Summary</a>
        </li>
        <li  @if(active('structure-valuations/valuations')) class="active" @endif>
            <a href="{{ route('structures-valuation.valuations') }}">Valuation</a>
        </li>
    </ul>
</li>

<li class="list-title">Report</li>

<li @if(active('reports')) class="active" @endif>
    <a href="{{ route('reports.index') }}">
        <i class="icon-stats-bars"></i>
        <span class="list-label"> Reports</span>
    </a>
</li>

<li class="list-title">Account</li>

<li @if(active('profiles/me')) class="acc-parent-li active" @endif>
    <a href="{{ route('profiles.me') }}" @if(active('profiles/me')) class="acc-parent active" @endif><i class="icon-profile"></i> <span>Manage Account</span></a>
    <ul>
        <li @if(active('profiles/me')) class="active" @endif><a href="{{ route('profiles.me') }}">My Account</a></li>
    </ul>
</li>

<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-alignment-unalign"></i><span class="list-label"> logout</span></a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>