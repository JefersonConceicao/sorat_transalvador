
@section('link_only_page')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
@endsection 

<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">
                @include('layout.admin.sidebar_item', ['menus' => $menus])
            </ul>
        </div>
    </section>
</aside>
