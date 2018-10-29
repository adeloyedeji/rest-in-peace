<li class="list-title">Apps</li>

<li>
    <a href="{{url('/')}}" @if(active('/')) class="active" @endif>
        <i class="icon-display4"></i>
        <span class="list-label"> Dashboard</span>
    </a>
</li>

<li>
    <a href="#">
        <i class="icon-puzzle2"></i>
        <span>Access Control</span>
    </a>
    <ul>
        <li><a href="{{route('admin.user')}}">Users</a></li>
        <li><a href="{{route('admin.roles')}}">Roles</a></li>
        <!--  <li><a href="ecom_ordersa18a.html?t=">Permission</a></li> -->
    </ul>
</li>

<li>
    <a href="{{ route('projects.index') }}">
        <i class="icon-briefcase"></i>
        <span>Projects</span>
    </a>
    <ul>
        <li><a href="{{ route('projects.index') }}">Projects list</a></li>
    </ul>
</li>

<li @if(active('beneficiaries/*')) class="active" @endif>
    <a href="{{ route('beneficiaries.index') }}">
        <i class="icon-users2"></i>
        <span>Beneficiaries</span>
    </a>
    <ul>
        <li><a href="{{ route('beneficiaries.index') }}">All Beneficiaries</a></li>
        <li><a href="{{ route('beneficiaries.create') }}">New Beneficiary</a></li>
        <li><a href="{{ route('beneficiaries.search') }}">Search Database</a></li>
    </ul>
</li>
<li @if(active('structure-valuations/*')) class="active" @endif>
    <a href="{{ url('structure-valuations/index') }}"><i class="icon-chart"></i> <span>Structure Valuation</span></a>
    <ul>
        <li @if(active('structure-valuations/index')) class="active" @endif>
            <a href="{{ route('structure-valuations.index') }}">Summary</a>
        </li>
        <li  @if(active('structure-valuations/valuations/index')) class="active" @endif>
            <a href="{{ route('structures-valuation.valuations') }}">Valuation</a>
        </li>
    </ul>
</li>

<li @if(active('crops-trees-valuation') || active('crops-trees-valuation/*')) class="active" @endif>
    <a href="{{ route('crops-trees-valuation.index') }}"><i class="icon-puzzle"></i> <span>Crops Valuation</span></a>
    <ul>
        <li @if(active('crops-trees-valuation/index')) class="active" @endif>
            <a href="{{ route('crops-trees-valuation.index') }}">Summary</a>
        </li>
        <li  @if(active('crops-trees-valuation/valuations')) class="active" @endif>
            <a href="{{ route('crops-trees-valuation/valuations') }}">Valuation</a>
        </li>
    </ul>
</li>

<li @if(active('reports')) class="active" @endif>
    <a href="{{ route('reports.index') }}">
        <i class="icon-stats-bars"></i>
        <span class="list-label"> Reports</span>
    </a>
</li>
{{-- > --}}

<li @if(active('profiles/me')) class="active" @endif>
    <a href="{{ route('profiles.me') }}"><i class="icon-profile"></i> <span>Manage Account</span></a>
    <ul>
        <li><a href="{{ route('profiles.me') }}">My Account</a></li>
    </ul>
</li>

                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-alignment-unalign"></i><span class="list-label"> logout</span></a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
