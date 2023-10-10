<h1>Edição de Dúvida {{ $support->id }}</h1>

{{-- Aqui é onde ficam as mensagens de erro de validação --}}
@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token()}}" name="_token"> --}}

    @method('put')
    @include('admin.supports.partials.form', ['support' => $support])
</form>