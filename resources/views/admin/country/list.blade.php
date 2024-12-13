<x-wire-table>
    <x-wire-thead>
        <th width="50">Id</th>
        <th width="100">code</th>

        <th>이름</th>
        <th width='100'>사용자</th>
        <th width='200'>사용자 비율</th>
        <th width="200">위도/경도</th>
        <th width="200">담당자</th>
        <th width="200">등록 일자</th>
    </x-wire-thead>
    <tbody>
        @if (!empty($rows))
            @foreach ($rows as $item)
                <x-wire-tbody-item :selected="$selected" :item="$item">
                    <td width="50">{{ $item->id }}</td>
                    <td width="100">
                        <img src="/images/flags/{{ $item->code }}.png" width="20">
                        <span class="ms-2">{{ $item->code }}</span>
                    </td>

                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <x-link-void wire:click="edit({{ $item->id }})">
                                {{ $item->name }}
                            </x-link-void>


                        </div>


                        @if ($item->description)
                            <div>{{ $item->description }}</div>
                        @endif
                    </td>

                    <td width='100'>{{ $item->users }}</td>
                    <td width='200'>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ ($item->users / 1000) * 100 }}%"
                                aria-valuenow="{{ ($item->users / 1000) * 100 }}" aria-valuemin="0"
                                aria-valuemax="100">
                                {{ ($item->users / 1000) * 100 }}%
                            </div>
                        </div>
                    </td>
                    <td width="200">
                        @if ($item->latitude && $item->longitude)
                                <div class="mt-1">
                                    <span class="badge bg-secondary">위도: {{ $item->latitude }}</span>
                                    <span class="badge bg-secondary">경도: {{ $item->longitude }}</span>
                                </div>
                        @endif
                    </td>
                    <td width="200">{{ $item->manager }}</td>
                    <td width="200">
                        <div class="text-gray-600">{{ $item->created_at }}</div>
                    </td>

                </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
