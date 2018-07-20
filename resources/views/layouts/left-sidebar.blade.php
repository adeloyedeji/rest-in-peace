Sidebar -->
<aside class="menu">
    <div class="left-aside-container">
        <!-- User profile -->
        <div class="user-profile"></div>
        <!-- /User profile -->

		<!-- Main menu -->
		<div class="menu-container handheld">
			<ul class="sidebar-accordion">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="icon-display4"></i>
                        <span class="list-label"> Dashboard</span>
                    </a>
                </li>


                <li class="list-title">Apps</li>

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
                <li>
                    <a href="#"><i class="icon-cash3"></i> <span>Invoice</span></a>
                    <ul>
                        <li><a href="invoice_lista18a.html?t=">Invoice list</a></li>
                        <li><a href="invoice_templatea18a.html?t=">Invoice template</a></li>
                    </ul>
                </li>

                <li class="list-title">Forms</li>

                <li>
                    <a href="#"><i class="icon-tree7"></i> <span>Menu levels</span></a>
                    <ul>
                        <li><a href="#">Second level</a></li>
                        <li>
                            <a href="#">Second level with child</a>
                            <ul>
                                <li><a href="#">Third level</a></li>
                                <li>
                                    <a href="#">Third level with child</a>
                                    <ul>
                                        <li><a href="#">Fourth level</a></li>
                                        <li><a href="#">Fourth level</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Third level</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Second level</a></li>
                    </ul>
                </li>


                <li><a href="#"><i class="icon-cart2"></i> <span>ACL</span></a>
                    <ul>
                        <li><a href="/admin/user">User</a></li>
                        <li><a href="/admin/role">Role</a></li>
                    </ul>
                </li>

                <!-- @if(Auth::User()->hasRole('administrator'))

                @endif -->


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
			<ul class="sidebar-accordion">

                <li><a href="/"><i class="icon-display4"></i><span class="list-label"> Dashboard</span></a></li>

                <li class="list-title">Apps</li>

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
                <li>
                    <a href="#"><i class="icon-cash3"></i> <span>Invoice</span></a>
                    <ul>
                        <li><a href="invoice_lista18a.html?t=">Invoice list</a></li>
                        <li><a href="invoice_templatea18a.html?t=">Invoice template</a></li>
                    </ul>
                </li>

                <li class="list-title">Extras</li>

                <li>
                    <a href="#"><i class="icon-tree7"></i> <span>Menu levels</span></a>
                    <ul>
                        <li><a href="#">Second level</a></li>
                        <li>
                            <a href="#">Second level with child</a>
                            <ul>
                                <li><a href="#">Third level</a></li>
                                <li>
                                    <a href="#">Third level with child</a>
                                    <ul>
                                        <li><a href="#">Fourth level</a></li>
                                        <li><a href="#">Fourth level</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Third level</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Second level</a></li>
                    </ul>
                </li>



                <li><a href="#"><i class="icon-puzzle2"></i> <span>Access Control</span></a>
                    <ul>
                        <li><a href="/admin/user">User</a></li>
                        <li><a href="/admin/role">Role</a></li>
                       <!--  <li><a href="ecom_ordersa18a.html?t=">Permission</a></li> -->
                    </ul>
                </li>

<!--                 @if(Auth::User()->hasRole('administrator'))
                
                @endif
 -->
                

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