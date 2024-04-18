<ul class="flex space-x-4">
    <li>
       @include('layouts.partials.menu.menuHome')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
        @include('layouts.partials.menu.menuPorfile')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
      @include('layouts.partials.menu.menuKomisariat')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
      @include('layouts.partials.menu.menuKorkom')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
        @include('layouts.partials.menu.menuCreativeMinority')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
        @include('layouts.partials.menu.menuTulisan')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
        @include('layouts.partials.menu.menuBerita')
    </li>

    <li class="relative space-y-2" x-data = "{dropdownOpen:false}">
        @include('layouts.partials.menu.menuTerms')
    </li>

</ul>
