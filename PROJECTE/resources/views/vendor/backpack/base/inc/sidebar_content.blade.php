{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><i class="nav-icon la la-sort-numeric-asc"></i></i>Creació de partida</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mapa') }}"><i class="nav-icon la la-globe"></i>1. Mapas</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('partida') }}"><i class="nav-icon la la-trophy"></i>2. Partidas</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('equip') }}"><i class="nav-icon la la-users"></i>3. Equips</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('fita') }}"><i class="nav-icon la la-safari"></i>4. Fitas</a></li>
<li class="nav-item"><i class="nav-icon la la-cog"></i></i>Altres accions</li>


<li class="nav-item"><a class="nav-link" href="{{ backpack_url('tipus-fita') }}"><i class="nav-icon la la-ban"></i> Tipus fitas</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-ban"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('fita-feta') }}"><i class="nav-icon la la-ban"></i> Fita fetas</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('jugador') }}"><i class="nav-icon la la-ban"></i> Jugadors</a></li>
