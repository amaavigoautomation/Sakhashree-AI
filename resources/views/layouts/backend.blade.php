<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel : {{ ucfirst($PageTitle . ' : ' . $currentPage) }}</title>
    <!-- ========== All CSS files linkup ========= -->


    <link rel="stylesheet" href="{{ asset('dist/css/back-end/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/lineicons.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/main.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/fullcalendar.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/backenddeveloper.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/fonts/font-awesome.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/select2/select2.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/select2/select2-bootstrap.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/toastr/build/toastr.min.css') }}">

    <script src="{{ asset('dist/js/jq/jquery-1.12.0.min.js') }} "></script>
    <script src="{{ asset('dist/js/bootstrap.min.js') }} "></script>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dist/img/favicon.ico') }}" type="image/x-icon">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/datepicker.css') }} ">
    <script src="{{ asset('dist/js/datepicker.js') }} "></script>


</head>

<body>
    <script src="{{ asset('dist/toastr/build/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            toastr.options = {
                closeButton: true,
                progressBar: true,
                newestOnTop: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                timeOut: 5000,
                extendedTimeOut: 1000,
                showDuration: 300,
                hideDuration: 1000,
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error(@json($error));
                @endforeach
            @endif

            @if (session('success'))
                toastr.success(@json(session('success')));
            @endif

            @if (session('error'))
                toastr.error(@json(session('error')));
            @endif

        });
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#sortableBody").sortable({
                update: function() {
                    let data = [];
                    $("#sortableBody tr").each(function(index, element) {
                        data.push({
                            id: $(this).data("id"),
                            model: $(this).data("model"),
                            order: index + 1
                        });
                    });

                    $.ajax({
                        url: "{{ route('universal.reorder') }}",
                        type: 'POST',
                        data: {
                            data: data,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log('Reordered successfully');
                        },
                    });
                }
            });
        });
    </script>
    <!-- ======== sidebar-nav start =========== -->
    @include('partials.sidemenu')
    <!-- ======== sidebar-nav End =========== -->
    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header Start  ========== -->
        @include('partials.navigationMenu')
        <!-- ========== header end ========== -->
        <!-- ========== Section Start ========== -->
        @yield('content')
        <!-- ========== Section end ========== -->
        <!-- ========== Footer Start ========== -->
        @include('partials.footer')
        <!-- ========== Footer End ========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->
    <!-- ======== Model Starts =========== -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-info" data-dismiss="modal" id="closedModel">No</button>
                    <button type="button" class="btn btn-xs btn-danger" id="confirmDeleteButton">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form for Delete Action -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('GET')
        <!-- The action URL will be set dynamically using JavaScript -->
    </form>
    <!-- ======== Model Starts end =========== -->
    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('dist/js/moment.min.js') }} "></script>
    <script src="{{ asset('dist/js/polyfill.js') }} "></script>
    <script src="{{ asset('dist/js/main.js') }} "></script>
    <script src="{{ asset('dist/js/jq/jquery.select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('dist/js/core.js') }}"></script>



    <!-- Toggle start here-->
    <script type="text/javascript">
        function toggleSlides() {
            $('.toggler').click(function(e) {
                var id = $(this).attr('id');
                var widgetId = id.substring(id.indexOf('-') + 1, id.length);
                $('#' + widgetId).slideToggle();
                $(this).toggleClass('sliderExpanded');
                $('.closeSlider').click(function() {
                    $(this).parent().hide('slow');
                    var relatedToggler = 'toggler-' + $(this).parent().attr('id');
                    $('#' + relatedToggler).removeClass('sliderExpanded');
                });
            });
        };
        $(function() {
            toggleSlides();
        });

        $(document).ready(function() {


            /*Get Method name*/
            $('#controllerDropdown').change(function() {
                var selectedController = $(this).val();
                $.ajax({
                    url: "{{ route('get.methods.for.controller') }}",
                    type: 'GET',
                    data: {
                        controller: selectedController
                    },
                    success: function(data) {
                        $('#methods').html('<option value="">Select Method</option>');
                        var methods = data.methods
                            .original; // Accessing the array of method names
                        methods.forEach(function(method) {
                            $('#methods').append('<option value="' + method + '">' +
                                method + '</option>');
                        });
                    }
                });
            });


            /*get route name For Selected Action and Controller*/
            $('#methods').change(function() {
                var selectedMethod = $(this).val();
                var selectedController = $('#controllerDropdown').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // alert(csrfToken);
                $.ajax({
                    url: "{{ route('get.route.name') }}",
                    type: 'GET',
                    data: {
                        controller: selectedController,
                        method: selectedMethod,
                        _token: csrfToken
                    },
                    success: function(data) {
                        var dynamicName = data.routeName;
                        var constructedValue = dynamicName;
                        $('#menuLinkUrl').val(constructedValue);
                        $('#controller').val(data.controller);
                        $('#actionName').val(data.action);

                        $("#myModal").modal('hide');

                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                    }
                });
            });

            $('.addAppendBtn').click(function() {
                $("#myModal").modal('show');
            });


            /*Listing Page Search Filter*/
            $('[id*="filterForm"] :input').change(function(e) {
                var formUrl = $('#filterForm').attr('action');
                var currentInput = $(this).attr('name');
                var controller = $('#filterForm').attr('controller');

                var queryParams = {};

                // Iterate over all form inputs
                $('[id*="filterForm"] :input').each(function() {
                    var inputName = $(this).attr('name');
                    var inputValue = $(this).val();

                    // Add input values to the queryParams object
                    queryParams[inputName] = inputValue;
                });

                // Convert the object to a query string
                var queryString = $.param(queryParams);

                // Build the final URL
                var url = formUrl + '?' + queryString;
                window.location.href = url;
            });


            $(document).on('click', '.destroeRow', function() {
                var id = $(this).attr('data-id');
                var Module = $(this).attr('data-module');
                var routeName = $(this).attr('data-url');
                confirmDelete(id, Module, routeName);
            });

            function confirmDelete(id, module, routeName) {
                const url = routeName.replace(':id', id);
                // alert(url);
                $('#deleteForm').attr('action', url);
                $('#deleteModal').modal('show');
            }

            $('#confirmDeleteButton').on('click', function() {
                // Submit the form to delete the item
                $('#deleteForm').submit();
            });


            $('#closedModel').click(function() {
                $('#deleteModal').modal('hide');
            });


            $("#searchInput").on("keyup", function() {
                let value = $(this).val().toLowerCase().trim();
                let hasMatch = false;

                $(".search-results li").each(function() {
                    let text = $(this).text().toLowerCase();
                    if (text.includes(value)) {
                        $(this).show();
                        hasMatch = true;
                    } else {
                        $(this).hide();
                    }
                });

                // Show search results only if matches are found
                if (hasMatch && value !== "") {
                    $(".search-results").show();
                } else {
                    $(".search-results").hide();
                }
            });

            // Redirect on click
            $(".search-results").on("click", "li", function() {
                let url = $(this).data("url");
                if (url && url !== "#") {
                    window.location.href = url;
                }
            });


            // Setup Page Slig and page URL
            $('#model_name').on('input', function() {
                let title = $(this).val();
                let controller = $(this).attr('data-model');

                let slug = title
                    .toLowerCase()
                    .replace(/[^a-z0-9\s]/g, '')
                    .replace(/\s+/g, '-')
                    .trim();


                let baseUrl = '{{ url('') }}';
                // let baseUrl = 'https://soil2soul.epuratech.com';
                let url = controller ? `${baseUrl}/${controller}/${slug}` : `${baseUrl}/${slug}`;

                $('#page_slug').val(slug);
                $('#page_url').val(url);
            });


            $('#page_slug').on('input', function() {
                let value = $(this).val();
                let controller = $(this).attr('data-model');

                var result = value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s]/g, '-')
                    .replace(/\s+/g, '-')
                    .trim();

                $(this).val(result);
                // let baseUrl = 'https://soil2soul.epuratech.com';
                let baseUrl = '{{ url('') }}';
                let url = controller ? `${baseUrl}/${controller}/${result}` : `${baseUrl}/${result}`;

                $('#page_url').val(url);



            });


            // Status Update
            $('.status-checkbox').change(function() {
                var isChecked = $(this).prop('checked');
                var id = $(this).data('id');
                var model = $(this).data('model'); // Pass table


                var data = {
                    model: model, // Send the table name dynamically
                    id: id,
                    active: isChecked ? 1 : 0, // Send 1 if checked, 0 if unchecked
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                };

                // alert(isChecked);

                $.ajax({
                    url: 'update-status',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        // toastr.success(data.message);
                        if (response.success) {
                            toastr.success('Status updated successfully');
                        } else {
                            toastr.success('Failed to update status');
                            $(this).prop('checked', !isChecked); // Revert if failed
                        }
                    },
                    error: function() {
                        toastr.error('Error occurred while updating the status');
                        $(this).prop('checked', !isChecked); // Revert if error
                    }
                });
            });


            // update Order Inputs
            $('.order').on('input', function() {
                let value = $(this).val();
                var id = $(this).data('id');
                var model = $(this).data('model'); // Pass table

                var data = {
                    model: model, // Send the table name dynamically
                    id: id,
                    order: value, // Send 1 if checked, 0 if unchecked
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                };

                $.ajax({
                    url: 'update-order',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        // toastr.success(data.message);
                        if (response.success) {
                            toastr.success('Order updated successfully');
                        } else {
                            toastr.success('Failed to Order status');
                            $(this).prop('checked', !isChecked); // Revert if failed
                        }
                    },
                    error: function() {
                        toastr.error('Error occurred while updating the Order');
                        $(this).prop('checked', !isChecked); // Revert if error
                    }
                });


            });

            $(document).ready(function() {
                function setupCountryStateCity(countrySelector, stateSelector, citySelector, options = {}) {
                    const {
                        callingCodeSelector = null, timezoneSelector = null, prefill = {}
                    } = options;

                    function loadStates(countryId, selectedStateId = null, callback = null) {
                        if (!countryId) return;
                        $.get("{{ url('get-states') }}/" + countryId, function(states) {
                            let options = '<option value="">Select State</option>';
                            $.each(states, function(_, state) {
                                const selected = state.id == selectedStateId ? 'selected' :
                                    '';
                                options +=
                                    `<option value="${state.id}" ${selected}>${state.name}</option>`;
                            });
                            $(stateSelector).html(options);
                            if (callback) callback();
                        });
                    }

                    function loadCities(stateId, selectedCityId = null) {
                        if (!stateId) return;
                        $.get("{{ url('get-cities') }}/" + stateId, function(cities) {
                            let options = '<option value="">Select City</option>';
                            $.each(cities, function(_, city) {
                                const selected = city.id == selectedCityId ? 'selected' :
                                    '';
                                options +=
                                    `<option value="${city.id}" ${selected}>${city.name}</option>`;
                            });
                            $(citySelector).html(options);
                        });
                    }

                    // Country change
                    $(countrySelector).on('change', function() {
                        const selected = $(this).find(':selected');
                        const countryId = selected.val();

                        if (callingCodeSelector) $(callingCodeSelector).val(selected.data('code'));
                        if (timezoneSelector) $(timezoneSelector).val(selected.data('timezone') ||
                            '');

                        $(stateSelector).html('<option value="">Loading...</option>');
                        $(citySelector).html('<option value="">Select City</option>');
                        loadStates(countryId);
                    });

                    // State change
                    $(stateSelector).on('change', function() {
                        const stateId = $(this).val();
                        $(citySelector).html('<option value="">Loading...</option>');
                        loadCities(stateId);
                    });

                    // Prefill for edit forms
                    if (prefill.country) {
                        $(countrySelector).val(prefill.country).trigger('change');
                        setTimeout(function() {
                            loadStates(prefill.country, prefill.state, function() {
                                loadCities(prefill.state, prefill.city);
                            });
                        }, 300);
                    }
                }

                // Blog / Supplier
                setupCountryStateCity('#country_id', '#state', '#cityDropdown', {
                    callingCodeSelector: '#calling_code', // with calling code
                    timezoneSelector: '#timezone_id', // with timezone
                    prefill: {
                        country: "{{ $blog->country_id ?? ($supplier->country_id ?? '') }}",
                        state: "{{ $blog->state_id ?? ($supplier->state_id ?? '') }}",
                        city: "{{ $blog->city_id ?? ($supplier->city_id ?? '') }}"
                    }
                });
            });

        });
    </script>
    <!-- Toggle end here-->
</body>

</html>
