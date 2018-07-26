
<li><a href="/"><i class="icon-display4"></i><span class="list-label"> Dashboard</span></a></li>

<li @if(active('structure-valuations/*')) class="active" @endif>
    <a href="{{ url('structure-valuations/index') }}"><i class="icon-chart"></i> <span>Structure Valuation</span></a>
    <ul>
        <li @if(active('structure-valuations/index')) class="active" @endif>
            <a href="{{ url('structure-valuations/index') }}">Summary</a>
        </li>
        <li  @if(active('structure-valuations/projects/index')) class="active" @endif>
            <a href="{{ url('structure-valuations/projects/index') }}">Projects</a>
        </li>
        <li  @if(active('structure-valuations/beneficiaries/index')) class="active" @endif>
            <a href="{{ url('structure-valuations/beneficiaries/index') }}">Beneficiaries</a>
        </li>
        <li  @if(active('structure-valuations/valuations/index')) class="active" @endif>
            <a href="{{ url('structure-valuations/valuations/index') }}">Valuation</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('crops-trees-valuation.index') }}"><i class="icon-puzzle"></i> <span>Manage Account</span></a>
    <ul>
        <li><a href="{{ route('crops-trees-valuation.index') }}">User Account</a></li>
    </ul>
</li>

<li @if(active('reports')) class="active" @endif>
    <a href="#">
        <i class="icon-stats-bars"></i>
        <span class="list-label"> Reports</span>
    </a>
</li>

<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-alignment-unalign"></i><span class="list-label"> logout</span></a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>