@section('scripts')
    <script type="text/javascript">

        $(document).on("click", ".btn-delete-convenio", function (e) {
            event.preventDefault();
            let text = $(this).data('original-title');
            let id = $(this).data('id-company');
            let url = "{{route('delete-convenios')}}";
            Swal.fire({
                title: '¿Está seguro para ' + text + '? ',
                text: "Tu podrás revertir está acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.put(url, {
                        'id': id
                    }).then(function (response) {
                        Swal.fire(
                            'Desactivado!',
                            'El tarea se ha cumplido exitosamente.',
                            'success'
                        );
                      //  location.href = "{{route('index-convenios')}}"
                    }).catch(function (error) {
                        console.log(error);
                    });


                }
            });
        });


    </script>
@endsection
