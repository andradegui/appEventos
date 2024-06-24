@extends('layouts.app')

@section ('title') Perfil Usuário @endsection

@section('content')

<div class="row">

    <div class="col-12">

        <form action="{{route('admin.profile.update')}}" method="post">
            @csrf
            @method('PUT')

            <div class="row mt-3">
                <div class="col-12">
                    <h3>Dados do acesso</h3>
                </div>
            </div>

            <div class="form-group">

                <label>Nome:</label>
                <input name="user[name]" type="text" class="form-control" value="{{$user->name}}">

            </div>

            <div class="form-group">

                <label>Email:</label>
                <input name="user[email]" type="text" class="form-control" value="{{$user->email}}">

            </div>

            <div class="form-group">

                <label>Senha:</label>
                <input name="user[password]" type="text" class="form-control" value="">

            </div>

            <div class="form-group">

                <label>Confirmar Senha</label>
                <input name="user[confirm_password]" type="text" class="form-control">

            </div>

            @if( $user->profile )

                <div class="row">
                    <div class="col-12">
                        <h3>Dados do perfil</h3>
                    </div>
                </div>

                <div class="form-group">

                    <label>Sobre você:</label>
                    <textarea name="profile[about]" type="text" class="form-control">{{$user->profile->about}}</textarea>

                </div>

                <div class="form-group">

                    <label>Telefone:</label>
                    <input name="profile[phone]" type="text" class="form-control" value="{{$user->profile->phone}}">

                </div>

                <div class="form-group">

                    <label>Redes sociais:</label>
                    <input name="profile[social_networks]" type="text" class="form-control" value="{{$user->profile->social_networks}}">

                </div>

            @endif

            <button class="btn btn-success btn-md mt-3 mb-3">Atualizar Perfil</button>


        </form>

    </div>

</div>

@endsection