<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

             <li class="nav-item">
                <a class="nav-link" href="{{Route('dashboard.index') }}"><i class="icon-speedometer"></i> {{(__('words.dashboard'))}} <span class="tag tag-info">AliabdO</span></a>
            </li>
            <hr style="background-color: aqua">
            <li class="nav-item">
                <a class="nav-link" href="{{Route('dashboard.users.index') }}"><i class="icon-docs"></i>{{(__('words.users'))}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('dashboard.users.create') }}"><i class="icon-docs"></i>{{(__('words.add user'))}}</a>
            </li>
            <hr style="background-color: aqua">
            <li class="nav-item">
                <a class="nav-link" href="{{Route('dashboard.categories.index') }}"><i class="icon-docs"></i>{{(__('words.categories'))}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('dashboard.categories.create') }}"><i class="icon-docs"></i>{{(__('words.add category'))}}</a>
            </li>
            <hr style="background-color: aqua">


            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.setting')}}"><i class="icon-people"></i> {{trans('words.setting')}}</a>
                {{-- <a class="nav-link" href="#"><i class="icon-docs"></i>  فایل ها</a> --}}
            </li>

        </ul>
    </nav>
</div>