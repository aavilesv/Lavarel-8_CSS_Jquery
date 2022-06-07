  @if($message= Session::get("success"))
  <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>
  <script>
    swal("Info!", "{{$message}}!", {
                    icon: "info",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    },
                });
  </script>
  @endif
  @if($message= Session::get("error"))
  <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>
  <script>
    swal("Error!", "{{$message}}!", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                });
  </script>
  @endif