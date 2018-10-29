<div class="table-responsive">
    <table class="table table-hover table-stripped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Beneficiary</th>
                <th>Total Number of Crops</th>
                <th>Property Valuation (₦)</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @forelse ($beneficiaries as $b)
                <tr>
                    <td>{{$i+=1}}</td>
                    <td><a href="{{ route('beneficiaries.show', ['id' => $b->id]) }}">{{$b->fname . " " . $b->lname}}</a></td>
                    <td>{{$b->total_crops}}</td>
                    <td>{{number_format($b->total_amount, 2)}}</td>
                </tr>
            @empty
            <tr>
                <td colspan="4">No valuation records found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>