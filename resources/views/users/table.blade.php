<div class="table-responsive">
    <table class="table table-hover text-center" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <!--<th>Email Verified At</th>
            <th>Password</th>
            <th>Remember Token</th>-->
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!--<td>{{ $user->email_verified_at }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->remember_token }}</td>-->
                    <td>
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <!--<a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>Ver</a>-->
                            <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>Editar</a>
                            {!! Form::button('Eliminar', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
