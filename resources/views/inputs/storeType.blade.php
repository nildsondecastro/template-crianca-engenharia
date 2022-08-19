<div class="form-group">
    <label>Tipo</label>
    <input type="number" class="form-control @error('type') is-invalid @enderror" name="type" value="{{old('type') ?? ($model->type ?? null)}}" required>
    @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>