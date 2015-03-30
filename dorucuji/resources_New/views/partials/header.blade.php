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
                <li><a href="{{ route('user.get.login') }}" class="btn btn-primary-border">Přihlásit se</a></li>
                <li><a href="#" class="btn btn-secondary-border"><i class="icon-budicon-settings"></i></a></li>
            </ul>

            <div class="clearfix"></div>

        </div>
    </div>

@unless(@$hideMenuWrapper)
</div>
@endif

<div class="clearfix"></div>