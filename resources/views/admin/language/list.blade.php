<x-wire-table>
    <x-wire-thead>
        <th width='50'>Id</th>
        <th width='200'>code</th>
        <th>
            언어
        </th>
        <th width='100'>사용자</th>
        <th width='200'>사용자 비율</th>
        <th width='200'>일자</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width='50'>{{$item->id}}</td>
                <td width='200'>
                    
                    {{$item->code}}

                </td>
                <td >
                    {{-- {!! $popupEdit($item, $item->name) !!} --}}
                    <x-link-void wire:click="edit({{$item->id}})">
                        {{$item->name}}
                    </x-link-void>
                    {{-- <p>{{$item->description}}</p> --}}
                </td>
                <td width='100'>{{$item->users}}</td>
                <td width='200'>
                    <div class="progress">
                        <div class="progress-bar bg-primary"
                            role="progressbar"
                            style="width: {{ $item->users / 1000 * 100 }}%"
                            aria-valuenow="{{ $item->users / 1000 * 100 }}"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            {{ $item->users / 1000 * 100 }}%
                        </div>
                    </div>
                </td>
                <td width='200'>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

