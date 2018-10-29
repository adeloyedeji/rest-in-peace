<beneficiary-dependent-component :p="'{{ csrf_token() }}'" :bid="{{$id}}"></beneficiary-dependent-component>
<form action="{{route('beneficiaries.store')}}" method="post">
    @csrf
    <input type="hidden" name="opcode" id="opcode" value="3">
    <input type="hidden" name="bid" id="bid" value="{{$id}}">
    <div class="row">
        <div class="col-md-12">
            <br>
            <input class="btn btn-info pull-right" id="basic-next" value="Next" type="submit">
        </div>
    </div>
</form>