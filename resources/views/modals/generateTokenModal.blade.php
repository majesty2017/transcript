<!-- Add Student Modal -->
<div class="modal fade" id="generateTokenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transcript Management (HTU)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate') }}" method="post">
                    @csrf
                <p>Pay with Mobile Money Wallet</p>
                <div class="text-center">
                    <img class="img-fluid" src="{{ URL::to('assets/img/mtn.png') }}" alt="MTN Logo">
                </div>
                <div class="form-group @error('phone_number') is-invalid @enderror">
                    <label for="code">Enter phone number</label>
                    <input type="text" class="form-control" name="phone_number" id="code" placeholder="Enter phone number" value="{{ old('phone_number') }}">
                    <input type="hidden" name="code_status" value="unused">
{{--                    <input type="hidden" name="amount" value="50.00">--}}
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
