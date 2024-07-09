@session('success')
<div class="alert alert-success">
   <h4> {{ $value }}</h4>
</div>
@endsession

@session('failed')
<div class="alert alert-danger">
    <h4>{{ $value }}</h4>
</div>
@endsession
