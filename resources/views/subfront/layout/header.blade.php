<div class="nav-header">
    <a href="" class="brand-logo">

        <img class="logo-compact" src="{{url('subfront/images/logo-text.png')}}" alt="">
        <div class="brand-title">

        </div>



    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->		<!--**********************************
	Chat box start
***********************************-->
<div class="chatbox">
	<div class="chatbox-close"></div>
	<div class="custom-tab-1">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
			</li>
		</ul>

	</div>
</div>
<!--**********************************
	Chat box End
***********************************-->        <!--**********************************
	Header start
***********************************-->
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
						Dashboard					</div>
				</div>
				<ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <div class="input-group search-area d-lg-inline-flex d-none">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href="#" id="searchIcon"><i class="flaticon-381-search-2"></i></a></span>
                            </div>
                            <input type="text" class="form-control" id="searchInput" placeholder="Search here...">
                        </div>
                    </li>

					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                            @if (Auth::user()->image)
                            <img src="{{url(Auth::user()->image)}}" width="20" alt=""/>
                            @else
                            <img src="{{url('front/images/user.png')}}" width="20" alt=""/>
                            @endif

							<div class="header-info">
								<span class="text-black">{{Auth::user()->name}}</span>
								<p class="fs-12 mb-0"></p>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="{{url('subfront/user/account')}}" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Profile </span>
							</a>

							<a href="{{url('subfront/user/logout')}}" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<script>
    document.getElementById('searchIcon').addEventListener('click', function() {
        var searchTerm = document.getElementById('searchInput').value.trim();
        if (searchTerm !== '') {
            window.location.href = "{{ route('search') }}?q=" + encodeURIComponent(searchTerm);
        }
    });
</script>


<script>
    document.getElementById('searchIcon').addEventListener('click', function() {
        var searchTerm = document.getElementById('searchInput').value.trim();
        if (searchTerm !== '') {
            window.location.href = "{{ route('recherhe_examen') }}?K=" + encodeURIComponent(searchTerm);
        }
    });
</script>
<script>
    document.getElementById('searchIcon').addEventListener('click', function() {
        var searchTerm = document.getElementById('searchInput').value.trim();
        if (searchTerm !== '') {
            window.location.href = "{{ route('recherche') }}?R=" + encodeURIComponent(searchTerm);
        }
    });
</script>
