<h1>Nova Dúvida</h1>

{{-- Aqui é onde ficam as mensagens de erro de validação --}}
@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token()}}" name="_token"> --}}
    @include('admin.supports.partials.form')
</form>