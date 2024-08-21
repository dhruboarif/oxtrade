<div class="page-title">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="title-content">
                    <h2 class="title">{{ __('Edit Hero Section') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-tab-bars">
    <ul class="nav nav-pills" id="pills-tab-render" role="tablist">
        @foreach($languages as $language)
            <li class="nav-item" role="presentation">
                <a
                    href=""
                    class="nav-link  {{ $loop->index == 0 ?'active' : '' }}"
                    id="pills-render-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#{{$language->locale}}-render"
                    type="button"
                    role="tab"
                    aria-controls="pills-render"
                    aria-selected="true"
                ><i icon-name="languages"></i>{{$language->name}}</a
                >
            </li>
        @endforeach


    </ul>
</div>

<div class="tab-content" id="pills-tabContent">


    @foreach($groupData as $key => $landingContent)



        <div
            class="tab-pane fade {{ $loop->index == 0 ?'show active' : '' }}"
            id="{{$key}}-render"
            role="tabpanel"
            aria-labelledby="pills-render-tab"
        >

            <div class="row">
                <div class="col-xl-12">
                    <form action="{{ route('admin.page.content-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"  name="id" value="{{ $landingContent['id'] }}">
                        <input type="hidden"  name="locale" value="{{ $key }}">
                        @if($key == 'en')
                            <div class="site-input-groups">

                                @if($landingContent['type'] == 'whychooseus')
                                    <label for="" class="box-input-label">{{ __('Icon Class') }} <a class="link"
                                                                                                    href="https://fontawesome.com/icons"
                                                                                                    target="_blank">{{ __('Fontawesome') }}</a>:</label>
                                    <input type="text" name="icon" class="box-input mb-0 icon" value="{{ $landingContent['icon'] }}" placeholder="Icon Class"
                                           required=""/>
                                @elseif($landingContent['type'] == 'howitworks' || $landingContent['type'] == 'counter')
                                    <label class="box-input-label" for="">{{ __('Icon') }}:</label>
                                    <div class="wrap-custom-file">
                                        <input type="file" name="icon" id="heroRightImg"
                                               accept=".gif, .jpg, .png"/>
                                        <label for="heroRightImg" class="file-ok"
                                               style="background-image: url({{ asset($landingContent['icon']) }})">
                                            <img class="upload-icon"
                                                 src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                            <span>{{ __('Update Image') }}</span>
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Title:') }}</label>
                            <input type="text" name="title" value="{{ $landingContent['title'] }}" class="box-input mb-0 title0" required=""/>
                        </div>
                        <div class="site-input-groups mb-0">
                            <label for="" class="box-input-label">{{ __('Description:') }}</label>
                            <textarea name="description"  class="form-textarea description"
                                      placeholder="Description">{{$landingContent['description']}}</textarea>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __(' Save Changes') }}
                            </button>
                            <a
                                href="#"
                                class="site-btn-sm red-btn"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
                                <i icon-name="x"></i>
                                {{ __(' Close') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach


</div>

<script>
    $('input[type="file"]').each(function () {
        // Refs
        var $file = $(this),
            $label = $file.next('label'),
            $labelText = $label.find('span'),
            labelDefault = $labelText.text();

        // When a new file is selected
        $file.on('change', function (event) {
            var fileName = $file.val().split('\\').pop(),
                tmppath = URL.createObjectURL(event.target.files[0]);
            //Check successfully selection
            if (fileName) {
                $label
                    .addClass('file-ok')
                    .css('background-image', 'url(' + tmppath + ')');
                $labelText.text(fileName);
            } else {
                $label.removeClass('file-ok');
                $labelText.text(labelDefault);
            }
        });
    });
</script>
