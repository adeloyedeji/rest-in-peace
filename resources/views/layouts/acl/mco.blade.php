<li><a href="/"><i class="icon-display4"></i><span class="list-label"> Dashboard</span></a></li>
<li><a href="#"><i class="icon-chart"></i><span class="list-label"> List Beneficiary</span></a></li>
<li><a href="#"><i class="icon-display4"></i><span class="list-label"> List Propject</span></a></li>
<li><a href="#"><i class="icon-users2"></i><span class="list-label"> Report</span></a></li>
<li>
    <a href="#"><i class="icon-puzzle"></i> <span>Manage Account</span></a>
    <ul>
        <li><a href="#">User Account</a></li>
    </ul>
</li>
<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-alignment-unalign"></i><span class="list-label"> logout</span></a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>