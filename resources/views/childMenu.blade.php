<ul class="treeview-menu">
  @foreach ($childs as $child)
    <li>
      @if (count($child->childs))
        <li class="treeview">
      @endif
      <a href="{{ $child->url }}">
        <i class="fa {{ $child->icon }}"></i> {{ $child->name }}
        @if (count($child->childs))
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        @endif
      </a>
      @if (count($child->childs))
        @include('childMenu', ['childs' => $child->childs])
        </li>
      @endif
    </li>
  @endforeach
</ul>
