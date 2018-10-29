<!--Sidebar -->
<aside class="menu">
    <div class="left-aside-container">
        <!-- User profile -->
        <div class="user-profile"></div>
        <!-- /User profile -->

		<!-- Main menu -->
		<div class="menu-container handheld">
			<ul class="sidebar-accordion">
                @if(strtolower(Auth::User()->role->slug) == "superadmin")
                    @include('layouts.acl.superadmin')
                @elseif(strtolower(Auth::User()->role->slug) == "po")
                    @include('layouts.acl.po')
                @elseif(strtolower(Auth::User()->role->slug) == "vocet")
                    @include('layouts.acl.vco')
                @elseif(strtolower(Auth::User()->role->slug) == "vos")
                    @include('layouts.acl.vo-structure')
                @elseif(strtolower(Auth::User()->role->slug) == "mco")
                    @include('layouts.acl.mco')
                @endif
            </ul>
		</div>

		<div class="menu-container screen">
            <ul class="sidebar-accordion">
                @if(strtolower(Auth::User()->role->slug) == "superadmin")
                    @include('layouts.acl.superadmin')
                @elseif(strtolower(Auth::User()->role->slug) == "po")
                    @include('layouts.acl.po')
                @elseif(strtolower(Auth::User()->role->slug) == "vocet")
                    @include('layouts.acl.vco')
                @elseif(strtolower(Auth::User()->role->slug) == "vos")
                    @include('layouts.acl.vo-structure')
                @elseif(strtolower(Auth::User()->role->slug) == "mco")
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