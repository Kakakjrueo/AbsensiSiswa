<nav class="navbar navbar-header navbar-expand navbar-light shadow-lg">
    <a class="sidebar-toggler d-md-none" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

            <li>
                <span><b> {{ Auth::user()->name }} // {{ Auth::user()->role }} // {{ Auth::user()->mapel }} </b></span>
            </li>
        </ul>
    </div>
</nav>