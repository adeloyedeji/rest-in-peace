Sidebar -->
<aside class="menu">
    <div class="left-aside-container">
        <!-- User profile -->
        <div class="user-profile"></div>
        <!-- /User profile -->

		<!-- Main menu -->
		<div class="menu-container handheld">
			<ul class="sidebar-accordion">
                <li class="list-title">Apps</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="icon-display4"></i>
                        <span class="list-label"> Dashboard</span>
                    </a>
                </li>

                <li><a href="#"><i class="icon-cart2"></i> <span>ACL</span></a>
                    <ul>
                        <li><a href="/admin/user">User</a></li>
                        <li><a href="/admin/role">Role</a></li>
                    </ul>
                </li>




                <li><a href="{{ route('projects.index') }}"><i class="icon-briefcase"></i> <span>Projects</span></a>
                    <ul>
                        <li><a href="{{ route('projects.index') }}">Projects list</a></li>
                        <!-- <li><a href="{{ route('projects.create') }}">New Project</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{ route('beneficiaries.index') }}"><i class="icon-users2"></i> <span>Beneficiaries</span></a>
                    <ul>
                        <li><a href="{{ route('beneficiaries.index') }}">All Beneficiaries</a></li>
                        <li><a href="{{ route('beneficiaries.create') }}">New Beneficiary</a></li>
                    </ul>
                </li>





                <!-- @if(Auth::User()->hasRole('administrator'))

                @endif -->


            </ul>
		</div>

		<div class="menu-container screen">
			<ul class="sidebar-accordion">
                <li class="list-title">Apps</li>

                <li><a href="/"><i class="icon-display4"></i><span class="list-label"> Dashboard</span></a></li>

                <li><a href="#"><i class="icon-puzzle2"></i> <span>Access Control</span></a>
                    <ul>
                        <li><a href="/admin/user">User</a></li>
                        <li><a href="/admin/role">Role</a></li>
                       <!--  <li><a href="ecom_ordersa18a.html?t=">Permission</a></li> -->
                    </ul>
                </li>



                <li><a href="{{ route('projects.index') }}"><i class="icon-briefcase"></i> <span>Projects</span></a>
                    <ul>
                        <li><a href="{{ route('projects.index') }}">Projects list</a></li>
                        <!-- <li><a href="{{ route('projects.create') }}">New Project</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{ route('beneficiaries.index') }}"><i class="icon-users2"></i> <span>Beneficiaries</span></a>
                    <ul>
                        <li><a href="{{ route('beneficiaries.index') }}">All Beneficiaries</a></li>
                        <li><a href="{{ route('beneficiaries.create') }}">New Beneficiary</a></li>
                    </ul>
                </li>
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
                    <a href="{{ route('crops-trees-valuation.index') }}"><i class="icon-puzzle"></i> <span>Crops Valuation</span></a>
                    <ul>
                        <li><a href="{{ route('crops-trees-valuation.index') }}">View all</a></li>
                        <li><a href="{{ route('crops-trees-valuation.create') }}">New Valuation</a></li>
                    </ul>
                </li>

                <li @if(active('reports')) class="active" @endif>
                    <a href="{{ route('reports.index') }}">
                        <i class="icon-stats-bars"></i>
                        <span class="list-label"> Reports</span>
                    </a>
                </li>
                <li><a href="{{ route('audit-trails.index') }}"><i class="icon-alignment-unalign"></i><span class="list-label"> Audit Trail</span></a></li>
{{-- > --}}





<!--                 @if(Auth::User()->hasRole('administrator'))

                @endif
 -->
            </ul>
	    </div>
        <!-- /Main menu -->
        <style>
            @media screen and (min-width: 1024px){
                .menu-container.screen{
                    display: inherit;
                }
                .menu-container.handheld{
                    display: none;
                }
            }
            @media screen and (max-width: 1023px){
                .menu-container.screen{
                    display: none;
                }
                .menu-container.handheld{
                    display: inherit;
                }
            }
        </style>
	</div>
</aside>
<!-- /Sidebar