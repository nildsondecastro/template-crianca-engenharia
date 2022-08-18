<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? ($model->name ?? null)}}" required>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>