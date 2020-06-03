<!-- Modal -->
<div class="modal fade" id="enterTokenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transcript Management (HTU)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('apply', ['id' => $voucher->id ?? $voucher_id]) }}">
                    @csrf
                    <div class="form-group @error('voucher_code') is-invalid @enderror">
                        <label for="code">Enter Code</label>
                        <input type="text" class="form-control" name="voucher_code" id="code" placeholder="Enter your code here" value="{{ old('voucher_code') }}">
                        @error('voucher_code')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Apply</button>
                </form>
            </div>
        </div>
    </div>
</div>
