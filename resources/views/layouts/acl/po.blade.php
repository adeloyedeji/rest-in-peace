<li><a href="/"><i class="icon-display4"></i><span class="list-label"> Dashboard</span></a></li>

<li>
    <a href="{{ route('beneficiaries.index') }}"><i class="icon-users2"></i> <span>Beneficiaries</span></a>
    <ul>
        <li><a href="{{ route('beneficiaries.index') }}">All Beneficiaries</a></li>
        <li><a href="{{ route('beneficiaries.create') }}">New Beneficiary</a></li>
    </ul>
</li>

<li @if(active('reports')) class="active" @endif>
    <a href="#">
        <i class="icon-stats-bars"></i>
        <span class="list-label"> Reports</span>
    </a>
</li>

<li>
    <a href="{{ route('crops-trees-valuation.index') }}"><i class="icon-puzzle"></i> <span>Manage Account</span></a>
    <ul>
        <li><a href="{{ route('crops-trees-valuation.index') }}">User Account</a></li>
    </ul>
</li>

<li><a href="#"><i class="icon-alignment-unalign"></i><span class="list-label"> Logout</span></a></li>