<small style="color: white;">Operaciones</small>
<li>
    <a href="{{ url('/gerente') }}"><i class="fa fa-edit"></i><span>Operaciones</span></a>
</li>

<small style="color: white;">Flujo de efectivo</small>
<li class="{{ Request::is('depositos*') ? 'active' : '' }}">
    <a href="{{ route('depositos.index') }}"><i class="fa fa-edit"></i><span>Depositos</span></a>
</li>
