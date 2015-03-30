@unless(@$hideMenuWrapper)
<div id="top-menu-wrapper">
@endif

    <div class="content-wrapper">
        <div id="top-menu">

            <div class="logo"><a href="{{ URL::to('/') }}"></a></div>

            <ul class="navigation">
                <li class="active"><a href="#">Představení</a></li>
                <li><a href="#">Ceník</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Kontakt</a></li>
                <li class="btn btn-primary-border"><a href="{{ route('login') }}">Přihlásit se</a></li>
                <li class="btn btn-secondary-border"><a href="#"><i class="icon-budicon-settings"></i></a></li>
            </ul>

            <div class="clearfix"></div>

        </div>
    </div>

@unless(@$hideMenuWrapper)
</div>
@endif

<div class="clearfix"></div>