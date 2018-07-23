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








            </ul>

            <script>
                if ($.fn.navAccordion) {
                    $('.sidebar-accordion').each(function() {
                        $(this).navAccordion({
                            eventType: 'click',
                            hoverDelay: 100,
                            autoClose: true,
                            saveState: false,
                            disableLink: true,
                            speed: 'fast',
                            showCount: false,
                            autoExpand: true,
                            classExpand: 'acc-current-parent'
                        });
                    });
                }

                var pgurl = window.location.href.substr(window.location.href.lastIndexOf("http://followtechnique.com/")+1);
                $(".sidebar ul.sidebar-accordion li a").each(function(){
                    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                    {
                        $(this).addClass(" active");
                        $(this).parent().parent().css("display","block");
                        $(this).parent().parent().parent().addClass(" active");
                        $(this).parent().parent().parent().parent().css("display","block");
                        $(this).parent().parent().parent().parent().parent().addClass(" active");
                    }
                })
                $(".leftmenu ul.sidebar-accordion li a").each(function(){
                    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                    {
                        $(this).addClass(" active");
                        $(this).parent().parent().css("display","block");
                        $(this).parent().parent().parent().addClass(" active");
                        $(this).parent().parent().parent().parent().css("display","block");
                        $(this).parent().parent().parent().parent().parent().addClass(" active");
                    }
                })
            </script>
		</div>

		<div class="menu-container screen">
            @if(Auth::User()->hasRole('superadmin'))

			             @include('layouts.acl.superadmin')

            @elseif(Auth::User()->hasRole('PO'))

                        @include('layouts.acl.po')

            @elseif(Auth::User()->hasRole('VCO'))

                         @include('layouts.acl.vco')

            @elseif(Auth::User()->hasRole('VO-Structure'))
            
                        @include('layouts.acl.vo-structure')

            @elseif(Auth::User()->hasRole('MCO'))

                        @include('layouts.acl.mco')
            @endif

            <script>
                if ($.fn.navAccordion) {
                    $('.sidebar-accordion').each(function() {
                        $(this).navAccordion({
                            eventType: 'click',
                            hoverDelay: 100,
                            autoClose: true,
                            saveState: false,
                            disableLink: true,
                            speed: 'fast',
                            showCount: false,
                            autoExpand: true,
                            classExpand: 'acc-current-parent'
                        });
                    });
                }

                var pgurl = window.location.href.substr(window.location.href.lastIndexOf("http://followtechnique.com/")+1);
                $(".sidebar ul.sidebar-accordion li a").each(function(){
                    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                    {
                        $(this).addClass(" active");
                        $(this).parent().parent().css("display","block");
                        $(this).parent().parent().parent().addClass(" active");
                        $(this).parent().parent().parent().parent().css("display","block");
                        $(this).parent().parent().parent().parent().parent().addClass(" active");
                    }
                })
                $(".leftmenu ul.sidebar-accordion li a").each(function(){
                    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                    {
                        $(this).addClass(" active");
                        $(this).parent().parent().css("display","block");
                        $(this).parent().parent().parent().addClass(" active");
                        $(this).parent().parent().parent().parent().css("display","block");
                        $(this).parent().parent().parent().parent().parent().addClass(" active");
                    }
                })
            </script>
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