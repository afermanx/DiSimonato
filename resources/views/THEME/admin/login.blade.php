<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="{{asset('assetAdmin/css/vendors.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assetAdmin/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assetAdmin/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/sweetalert2/sweetalert2.css')}}">

    <title>DiSimonato - Login</title>

    <link rel="icon" type="image/png" href="{{asset('assetAdmin/img/favicon.png')}}">
</head>

<body>

<!-- Start Login Area -->
<div class="login-area bg-image">
    <div class="d-table">
        <div class="d-table-cell" >

            <div class="login-form" >
                <div class="logo">
                    <a href="{{route('Admin.login')}}"><h1><b>DiSimonato</b></h1></a>
{{--                    <img src="{{asset('assetAdmin/img/logo.png')}}" alt="image"> voltar para o link quando tiver a logo pronta--}}
                </div>

                <h2 >Bem vindo<b id="nameLogin"></b></h2>

                <form name="formLogin">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Usuário">
                        <span class="label-title"><i class='bx bx-user'></i></span>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="user" name="password" placeholder="Senha">
                        <span class="label-title"><i class='bx bx-lock'></i></span>


                    </div>


                    <div class="form-group">
                        <div class="remember-forgot">
                            <label class="checkbox-box">Manter conectado
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>

                            <a href="#" class="forgot-password">Esqueceu a senha?</a>
                        </div>
                    </div>

                    <button type="submit" class="login-btn"> <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Acessar</button>

                    <p class="mb-0">Voltar para site: <a href="{{route('Site.home')}}"><u>DiSimonato</u></a></p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Login Area -->


<!-- Scripts Min JS -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- End Scripts Min JS -->

<!-- Functions  JS -->

<script>
    $('#user').on('change', function() {
        let $this = $(this);

        $('#nameLogin').html('<b>: '+$this.val()+'</b>')

    });


    $('form[name="formLogin"]').submit(function (event){
        event.preventDefault();



        let user= $("#username").val();


        $("#loading").removeClass('d-none');

        if(user===""){
            $("#loading").addClass('d-none');


            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Certifique-se que todos os campos estão preenchidos!',

            })

        }


        $.ajax({
            url:"{{route('Admin.login.do')}}",
            type:"post",
            data:$(this).serialize(),
            dataType:"json",
            success:function (response){

                if(response.success===true){


                    window.location.href="{{route('Admin.dash')}}"

                }else{
                    $("#loading").addClass('d-none');
                    let timerInterval
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        footer: '<a href>Ainda não tem cadastro? Clique Aqui!</a>',
                        timer: 4000,
                        didOpen: () => {
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Oops...',
                    //     text: response.message,
                    //     footer: '<a href>Tente novamente!</a>'
                    // })
                }

            }


        })
    })

    {{--action="{{route('logar')}}" method="POST"--}}

</script>

</body>
</html>
