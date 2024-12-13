<x-admin>


    <x-flex-between>
        <div class="page-title-box">
            <x-flex class="align-items-center gap-2">
                <h1 class="align-middle h3 d-inline">
                    @if (isset($actions['title']))
                        {{ $actions['title'] }}
                    @endif
                </h1>

            </x-flex>
            <p>
                @if (isset($actions['subtitle']))
                    {{ $actions['subtitle'] }}
                @endif
            </p>
        </div>

        <div class="page-title-box">
            <x-breadcrumb-item>
                {{ $actions['route']['uri'] }}
            </x-breadcrumb-item>

            <div class="mt-2 d-flex justify-content-end gap-2">
                <button class="btn btn-sm btn-danger">Video</button>
                <button class="btn btn-sm btn-secondary">Manual</button>
            </div>
        </div>
    </x-flex-between>


    <div class="row">
        <div class="col-12 col-lg-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <a href="/admin/locale/language" class="text-decoration-none">
                        <h5 class="card-title mb-0">언어</h5>
                    </a>
                </div>
                <table class="table table-striped my-0">
                    <thead>
                        <tr>
                            <th>Language</th>
                            <th class="text-end">Users</th>
                            <th class="d-none d-xl-table-cell w-75">% Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (DB::table('language')->get() as $language)
                        <tr>
                            <td>{{ $language->name }}</td>
                            <td class="text-end">{{ $language->users }}</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary"
                                        role="progressbar"
                                        style="width: {{ $language->users / 1000 * 100 }}%"
                                        aria-valuenow="{{ $language->users / 1000 * 100 }}"
                                        aria-valuemin="0"
                                        aria-valuemax="100">
                                        {{ $language->users / 1000 * 100 }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td>en-us</td>
                            <td class="text-end">735</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 43%;"
                                        aria-valuenow="43" aria-valuemin="0" aria-valuemax="100">43%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>en-gb</td>
                            <td class="text-end">223</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 27%;"
                                        aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>fr-fr</td>
                            <td class="text-end">181</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 22%;"
                                        aria-valuenow="22" aria-valuemin="0" aria-valuemax="100">22%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>es-es</td>
                            <td class="text-end">132</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 16%;"
                                        aria-valuenow="16" aria-valuemin="0" aria-valuemax="100">16%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>de-de</td>
                            <td class="text-end">118</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 15%;"
                                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ru-ru</td>
                            <td class="text-end">98</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 13%;"
                                        aria-valuenow="13" aria-valuemin="0" aria-valuemax="100">13%</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-lg-8 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <a href="/admin/locale/country" class="text-decoration-none">
                        <h5 class="card-title mb-0">국가</h5>
                    </a>
                </div>
                <div class="card-body p-2">
                    <div id="world_map" style="height:350px;"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const map = new jsVectorMap({
                                selector: '#world_map',
                                map: 'world',
                                zoomButtons: true,

                                regionStyle: {
                                    initial: {
                                        fill: '#e4e4e4'
                                    }
                                },

                                zoomOnScroll: false,

                                markers: [
                                    // {
                                    //     name: "대한민국",
                                    //     coords: [37.5665, 126.9780] // 위도(latitude), 경도(longitude)
                                    // },
                                    // {
                                    //     name: "미국",
                                    //     coords: [38.8977, -77.0365]
                                    // },
                                    // {
                                    //     name: "영국",
                                    //     coords: [51.5074, -0.1278]
                                    // }
                                    @foreach (DB::table('country')->get() as $country)
                                        {
                                            name: "{{ $country->name }}",
                                            coords: [{{ $country->latitude }}, {{ $country->longitude }}]
                                        }
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                ],

                                markerStyle: {
                                    initial: {
                                        fill: '#4680ff'
                                    }
                                },

                                labels: {
                                    markers: {
                                        render: (marker) => marker.name
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>


    </div>



    <div class="row">
        <div class="col-12 col-lg-6 col-xl-4 d-flex">
            {{-- calendar --}}

                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body">
                        <div class="calendar">
                            <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                                <button class="btn btn-sm btn-light" onclick="prevMonth()">&lt;</button>
                                <h6 class="mb-0" id="currentMonth"></h6>
                                <button class="btn btn-sm btn-light" onclick="nextMonth()">&gt;</button>
                            </div>

                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>일</th>
                                        <th>월</th>
                                        <th>화</th>
                                        <th>수</th>
                                        <th>목</th>
                                        <th>금</th>
                                        <th>토</th>
                                    </tr>
                                </thead>
                                <tbody id="calendar-body">
                                </tbody>
                            </table>
                        </div>

                        <script>
                            let currentDate = new Date();

                            function renderCalendar() {
                                const year = currentDate.getFullYear();
                                const month = currentDate.getMonth();

                                // 달력 헤더 업데이트
                                document.getElementById('currentMonth').textContent =
                                    `${year}년 ${month + 1}월`;

                                const firstDay = new Date(year, month, 1);
                                const lastDay = new Date(year, month + 1, 0);

                                const tbody = document.getElementById('calendar-body');
                                tbody.innerHTML = '';

                                let date = 1;
                                let tr = document.createElement('tr');

                                // 첫째 주 빈칸 채우기
                                for (let i = 0; i < firstDay.getDay(); i++) {
                                    tr.appendChild(document.createElement('td'));
                                }

                                // 날짜 채우기
                                while (date <= lastDay.getDate()) {
                                    if (tr.children.length === 7) {
                                        tbody.appendChild(tr);
                                        tr = document.createElement('tr');
                                    }

                                    const td = document.createElement('td');
                                    td.textContent = date;

                                    // 오늘 날짜 표시
                                    if (date === new Date().getDate() &&
                                        month === new Date().getMonth() &&
                                        year === new Date().getFullYear()) {
                                        td.classList.add('bg-primary', 'text-white');
                                    }

                                    tr.appendChild(td);
                                    date++;
                                }

                                // 마지막 주 빈칸 채우기
                                while (tr.children.length < 7) {
                                    tr.appendChild(document.createElement('td'));
                                }
                                tbody.appendChild(tr);
                            }

                            function prevMonth() {
                                currentDate.setMonth(currentDate.getMonth() - 1);
                                renderCalendar();
                            }

                            function nextMonth() {
                                currentDate.setMonth(currentDate.getMonth() + 1);
                                renderCalendar();
                            }

                            // 초기 렌더링
                            renderCalendar();
                        </script>
                    </div>
                </div>

        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-flex">
            {{-- 환율 --}}
            <div class="card flex-fill">
                <div class="card-header">
                    <a href="/admin/locale/currency" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            환율
                        </h5>
                    </a>
                </div>
                <table class="table table-borderless my-0">
                    <thead>
                        <tr>
                            <th>통화</th>
                            <th>환율</th>
                            <th>기준일자</th>
                            <th class="d-none d-xl-table-cell text-end">History</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (DB::table('currency')->get() as $currency)
                            <tr>
                                <td>
                                    {{ $currency->name }}
                                </td>
                                <td>
                                    {{ $currency->rate }}
                                </td>
                                <td>
                                    {{ $currency->updated_at }}
                                </td>
                                <td class="d-none d-xl-table-cell text-end">
                                    <a href="/admin/locale/currency/log/{{ $currency->id }}"
                                        class="btn btn-light">View</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>






</x-admin>
