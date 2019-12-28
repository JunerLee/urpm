@if (isset($menu['nodes']))
    <li class="dd-item" data-id="{{$menu['id']}}">
        <div class="dd-handle">
            <strong><i class="{{$menu['icon']}}"></i>&nbsp;&nbsp;{{$menu['title']}}</strong>
            <span class="float-right dd-nodrag">
                <a href="#"><i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash" style="color:darkred"></i></a>
            </span>
        </div>
        <ol class="dd-list">
            @foreach($menu['nodes'] as $menu)
                @include('menu.menu', $menu)
            @endforeach
        </ol>
    </li>
@else
    <li class="dd-item" data-id="{{$menu['id']}}">
        <div class="dd-handle">
            <strong><i class="{{$menu['icon']}}"></i>&nbsp;&nbsp;{{$menu['title']}}</strong>
            <span class="float-right dd-nodrag">
                <a href="#"><i class="fa fa-edit"></i></a>
                <a href="#"><i class="fa fa-trash" style="color:darkred"></i></a>
            </span>
        </div>
    </li>
@endif
