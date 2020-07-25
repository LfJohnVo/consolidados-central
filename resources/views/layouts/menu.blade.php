<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{ route('home') }}"><i class="fa fa-edit"></i><span>Desglose</span></a>
</li>

<li class="{{ Request::is('gerentes*') ? 'active' : '' }}">
    <a href="{{ route('gerentes.index') }}"><i class="fa fa-edit"></i><span>Gerentes</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('operacionDets*') ? 'active' : '' }}">
    <a href="{{ route('operacionDets.index') }}"><i class="fa fa-edit"></i><span>Operaciones</span></a>
</li>

<li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
    <a href="{{ route('proyectos.index') }}"><i class="fa fa-edit"></i><span>Proyectos</span></a>
</li>

<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{{ route('regions.index') }}"><i class="fa fa-edit"></i><span>Regiones</span></a>
</li>


<!--<li class="{{ Request::is('conceptos*') ? 'active' : '' }}">
    <a href="{{ route('conceptos.index') }}"><i class="fa fa-edit"></i><span>Conceptos</span></a>
</li>-->

<!--<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{{ route('regions.index') }}"><i class="fa fa-edit"></i><span>Regions</span></a>
</li>-->

<!--<li class="{{ Request::is('operacionHistoricos*') ? 'active' : '' }}">
    <a href="{{ route('operacionHistoricos.index') }}"><i class="fa fa-edit"></i><span>Operacion Historicos</span></a>
</li>-->

<li class="{{ Request::is('grupos*') ? 'active' : '' }}">
    <a href="{{ route('grupos.index') }}"><i class="fa fa-edit"></i><span>Grupos</span></a>
</li>
<!--
<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{{ route('clientes.index') }}"><i class="fa fa-edit"></i><span>Clientes</span></a>
</li>
-->
<!--
<li class="{{ Request::is('promesas*') ? 'active' : '' }}">
    <a href="{{ route('promesas.index') }}"><i class="fa fa-edit"></i><span>Promesas</span></a>
</li>
-->
