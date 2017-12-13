<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>{{ config('app.name') . ' - ' . $title }}</title>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta name="author" content="Vox Digital" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="{{ config('app.description') }}" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <!-- Stylesheets -->
        {{ Html::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
        {{ Html::style('//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') }}
        {{ Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css') }}
        {{ Html::style(assets('css/commom.css')) }}
        {{ Html::style(assets('css/style.css')) }}
        {{ Html::style(assets('css/sweetalert.css')) }}
        {{ Html::script('https://code.jquery.com/jquery-1.12.4.min.js') }}
        {{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}
        {{ Html::script('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') }}
        {{ Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js') }}
        {{ Html::script('https://use.fontawesome.com/c9fc4862bf.js') }}
        {{ Html::script(assets('js/site.js')) }}
        {{ Html::script(assets('js/sweetalert.min.js')) }}
        


        <!--[if lt IE 9]>
                {{ Html::script(assets('theme/js/html5.js')) }}
        <![endif]-->
    </head>

    <body>
        <section class="header">
            <nav class="navbar navbar-default">
                <div class="container-fluid limit">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Candidate's Manager</a>
                    </div>
                </div>
            </nav>
        </section>	
        <main id="content">
            @yield('content')
        </main>

    </body>
</html>
