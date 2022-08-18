<div class="form-group">
    <label>Ordem</label>
    <input readonly type="number" class="form-control @error('order') is-invalid @enderror" name="order" value="{{old('order') ?? ($model->order ?? null)}}" required>
    @error('order')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>