<table class="table table-hover mb-0">
    <thead>
        <th width='200'>등록일자</th>
        <th >통화</th>
        <th width='200'>환율</th>
    </thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <tr>
                {{-- 테이블 리스트 --}}
                <td width='200'>
                    {{$item->created_at}}
                </td>
                <td >
                    {{$item->currency}}
                </td>
                <td width='200'>
                    {{$item->rate}}
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
