<div class="form-group">
    <label>Texto</label>
    <textarea 
        class="form-control @error('name') is-invalid @enderror" 
        rows="4"
        name="text"
        readonly
    >
    {{old('text') ?? ($model->text ?? null)}}
    </textarea>
    @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>