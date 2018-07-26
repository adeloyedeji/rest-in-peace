Sidebar -->
<aside class="menu">
    <div class="left-aside-container">
        <!-- User profile -->
        <div class="user-profile"></div>
        <!-- /User profile -->

		<!-- Main menu -->
		<div class="menu-container handheld">
			<ul class="sidebar-accordion">
            @if(Auth::User()->hasRole('superadmin'))

                         @include('layouts.acl.superadmin')

            @elseif(Auth::User()->hasRole('po'))

                        @include('layouts.acl.po')

            @elseif(Auth::User()->hasRole('vocet'))


                         @include('layouts.acl.vco')

            @elseif(Auth::User()->hasRole('vos'))
            
                        @include('layouts.acl.vo-structure')

            @elseif(Auth::User()->hasRole('mco'))

                        @include('layouts.acl.mco')
            @endif


            </ul>
		</div>

		<div class="menu-container screen">
            <ul class="sidebar-accordion">
            @if(Auth::User()->hasRole('superadmin'))

			             @include('layouts.acl.superadmin')

            @elseif(Auth::User()->hasRole('po'))

                        @include('layouts.acl.po')

            @elseif(Auth::User()->hasRole('vocet'))


                         @include('layouts.acl.vco')

            @elseif(Auth::User()->hasRole('vos'))
            
                        @include('layouts.acl.vo-structure')

            @elseif(Auth::User()->hasRole('mco'))

                        @include('layouts.acl.mco')
            @endif
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