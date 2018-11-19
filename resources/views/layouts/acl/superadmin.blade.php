<li class="list-title">Dashboard</li>

<li @if(active('/')) class="active" @endif>
    <a href="{{url('/')}}" @if(active('/')) class="active" @endif>
        <i class="icon-display4"></i>
        <span class="list-label"> Dashboard</span>
    </a>
</li>

<li class="list-title">Modules</li>

<li @if(active('admin/*')) class="acc-parent-liactive" @endif>
    <a href="#" @if(active('admin/*')) class="acc-parent active" @endif>
        <i class="icon-puzzle2"></i>
        <span>Access Control</span>
    </a>
    <ul>
        <li @if(active('admin/user')) class="active" @endif><a href="{{route('admin.user')}}">Users</a></li>
        <li @if(active('admin/roles')) class="active" @endif><a href="{{route('admin.roles')}}">Roles</a></li>
        <!--  <li><a href="ecom_ordersa18a.html?t=">Permission</a></li> -->
    </ul>
</li>

<li @if(active('pricing')) class="active" @endif>
    <a href="{{ route('pricing.index') }}">
        <i class="icon-beach-house"></i>
        <span class="list-label">Crops / Economic Trees</span>
    </a>
</li>

<li class="list-title">Beneficiaries</li>

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
        @if (\Auth::user()->role_id == 1)
        <li @if(active('fcda') || active('fcda/*') || active('planning/beneficiaries') || active('planning/beneficiaries/*') || active('monitoring-and-control/beneficiaries') || active('monitoring-and-control/beneficiaries/*')) class="acc-parent-li" @endif>
            <a @if(active('fcda') || active('fcda/*') || active('planning/beneficiaries') || active('planning/beneficiaries/*') || active('monitoring-and-control/beneficiaries') || active('monitoring-and-control/beneficiaries/*')) class="acc-parent active" @endif href="#">Beneficiaries</a>
            <ul>
                <li @if(active('fcda/beneficiaries') || active('fcda/beneficiaries/*')) class="active" @endif>
                    <a href="{{route('fcda.beneficiaries')}}">All Beneficiaries</a>
                </li>
                <li @if(active('planning/beneficiaries') || active('planning/beneficiaries/*')) class="active" @endif>
                    <a href="{{route('planning.beneficiaries')}}">Planning Beneficiary</a>
                </li>
                <li @if(active('monitoring-and-control/beneficiaries') || active('monitoring-and-control/beneficiaries/*')) class="active" @endif>
                    <a href="{{route('monitoring-and-control.beneficiaries')}}">Monitoring &amp; Control</a>
                </li>
                <li><a href="#">Crops &amp; Economic Trees</a></li>
                <li><a href="#">Structures</a></li>
            </ul>
        </li>
        <li @if(active('beneficiaries/create') || active('beneficiaries/create/*')) class="acc-parent-li" @endif>
            <a @if(active('beneficiaries/create') || active('beneficiaries/create/*')) class="acc-parent active" @endif href="#">New Beneficiary</a>
            <ul>
                <li @if(active('beneficiaries/create')) class="active" @endif>
                    <a href="{{route('beneficiaries.create')}}">Old Form</a>
                </li>
                <li @if(active('beneficiaries/create/monitoring-and-control')) class="active" @endif>
                    <a href="{{route('beneficiaries.create.monitoring-and-control')}}">Monitoring &amp; Control Beneficiary Form</a>
                </li>
                <li @if(active('beneficiaries/create/planning')) class="active" @endif>
                    <a href="{{route('beneficiaries.create.planning')}}">Planning Beneficiary Form</a>
                </li>
                <li @if(active('beneficiaries/create/structure')) class="active" @endif>
                    <a href="{{route('beneficiaries.create.structure')}}">Structures Beneficiary Form</a>
                </li>
                <li @if(active('beneficiaries/create/crops-and-economic-trees')) class="active" @endif>
                    <a href="{{route('beneficiaries.create.crops-and-economic-trees')}}">C.E.T. Beneficiary Form</a>
                </li>
            </ul>
        </li>
        @else
        <li @if(active('beneficiaries/create')) class="active" @endif><a href="{{ route('beneficiaries.create') }}">New Beneficiary</a></li>
        @endif
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

<li @if(active('crops-trees-valuation') || active('crops-trees-valuation/*')) class="acc-parent-li active" @endif>
    <a href="{{ route('crops-trees-valuation.index') }}" @if(active('crops-trees-valuation') || active('crops-trees-valuation/*')) class="acc-parent active" @endif><i class="icon-puzzle"></i> <span>Crops Valuation</span></a>
    <ul>
        <li @if(active('crops-trees-valuation')) class="active" @endif>
            <a href="{{ route('crops-trees-valuation.index') }}">Summary</a>
        </li>
        <li  @if(active('crops-trees-valuation/valuations')) class="active" @endif>
            <a href="{{ route('crops-trees-valuation/valuations') }}">Valuation</a>
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
{{-- > --}}

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
