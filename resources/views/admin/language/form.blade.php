<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    <x-navtab class="mb-3 nav-bordered">

        <!-- form start -->
        <x-navtab-item class="show active" >

            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">기본정보</span>
            </x-navtab-link>



            <x-form-hor>
                <x-form-label>코드</x-form-label>
                <x-form-item>
                    {{-- {!! xInputText()
                        ->setWire('model.defer',"forms.code")
                        ->setWidth("standard")
                    !!} --}}
                    @php
                        $language = config('jiny.language');
                        $lang = 'ko';
                    @endphp
                    <select class="form-select"
                        wire:model.defer="forms.code">
                        <option value="">활성화 언어를 선택하세요.</option>
                        @foreach ($language as $item)
                            <option value="{{ $item['code'] }}">
                                {{ $item[$lang] }}
                            </option>
                        @endforeach
                    </select>
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>이름</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.name")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

        </x-navtab-item>
    </x-navtab>




</div>
