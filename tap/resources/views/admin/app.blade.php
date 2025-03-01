<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    {{-- <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/full-calendar/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    <script src="{{ asset('backend/full-calendar/js/fullcalendar.js') }}"></script>

    {{-- <script src="{{ asset('frontend/js/jquery.dd.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> --}}

    @yield('styles')
    @stack('styles')

</head>

<body class="app sidebar-mini rtl">
    @include('admin.partials.header')

    @include('admin.partials.sidebar')

    <main class="app-content" id="app">

        @yield('content')

    </main>
    
    <script>
        tinymce.init({
            // selector: "textarea:not(.detail_ad)",
            selector: ".tinymce",
            paste_data_images: true,
            height: "250",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype == 'image') {
                    $('#upload').trigger('click');
                    $('#upload').on('change', function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            callback(e.target.result, {
                                alt: ''
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                }
            },
        });

        // summernote
        $('.summernote').summernote({
            height: 300
        });

        jQuery("#page_type").on('change', function() {
            if (this.value == 'Categories') {
                $('#category_type select').removeAttr('disabled');
                $('#category_type').show();
                $('#country select').attr('disabled', 'disabled');
                $('#country').hide();
            } else if (this.value == 'Location') {
                $('#country select').removeAttr('disabled');
                $('#country').show();
                $('#category_type select').attr('disabled', 'disabled');
                $('#category_type').hide();
            } else {
                $('#category_type select').attr('disabled', 'disabled');
                $('#category_type').hide();
                $('#country select').attr('disabled', 'disabled');
                $('#country').hide();
            }
        });
    </script>

    <script>
        function setSubscriptionStatus(content_id,subscription_id,thy,url){
            $(thy).parent().children("label").removeClass("active");
            $(thy).addClass('active');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: CSRF_TOKEN,
                    id : content_id,
                    subscription_id : subscription_id,
                },
                success: function(response) {
                    swal("Success!", response.message, "success");
                },
                error: function(response) {
                    swal("Error!", response.message, "error");
                }
            });
        };
    </script>

    <script>
        $('.filter_select').select2({
            width: "100%",
        });


        $('.filter_select').select2().on('select2:select', function(e) {
            var data = e.params.data;

        });


        $('.filter_select').select2().on('select2:open', (elm) => {
            const targetLabel = $(elm.target).prev('label');
            targetLabel.addClass('filled active');
        }).on('select2:close', (elm) => {
            const target = $(elm.target);
            const targetLabel = target.prev('label');
            const targetOptions = $(elm.target.selectedOptions);
            if (targetOptions.length === 0) {
                targetLabel.removeClass('filled active');
            }
        });


        $(document).on('.filter_selectWrap select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
    @stack('scripts')

</body>

</html>
