<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Formulaire JSON</title>

        <!-- Styles -->
        {{ Html::style('css/app.css') }}
    </head>

    <body>
        <div id="app">
            <div class="container">
                <!-- Message de génération réussie + lien de téléchargement du fichier -->
                @if ( session('success') )
                    <div class="alert alert-success" role="alert">
                        Le fichier de configuration a été généré avec succès.

                        <br/>

                        {{ Html::link($file, 'Télécharger le fichier', 'download') }}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">Générateur de configuration</h6>
                    </div>

                    <div class="panel-body">
                        {{ Form::open(['name' => 'json-form', 'route' => 'generateJSON', 'class' => 'form-horizontal']) }}
                            @include('includes.text', ['field' => 'url', 'fieldName' => 'URL', 'placeholder' => 'http ou https uniquement'])

                            @include('includes.number', ['field' => 'reloadTimeout', 'fieldName' => 'Reload timeout', 'placeholder' => 'entre 0 et 600', 'min' => 0, 'max' => 600])

                            <div id="group-screenOrientation" class="form-group {{ $errors->has('screenOrientation') ? ' has-error' : '' }} {{ old('screenOrientation') && !$errors->has('screenOrientation') ? ' has-success' : '' }}">
                                {{ Form::label('screenOrientation', 'Orientation', ['class' => 'control-label col-sm-2']) }}

                                <div class="col-sm-2">
                                    {{ Form::select(
                                        'screenOrientation',
                                        [null => 'Veuillez sélectionner', 'portrait' => 'Portrait', 'landscape' => 'Paysage'],
                                        ['class' => 'form-control']
                                    ) }}

                                    @if ($errors->has('screenOrientation'))
                                        <span id="screenOrientationErrorMsg" class="help-block">
                                            <strong>{{ $errors->first('screenOrientation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @include(
                                'includes.number',
                                ['field' => 'screenSaverTimeout', 'fieldName' => 'Screen saver timeout', 'placeholder' => 'entre 0 et 600', 'min' => 0, 'max' => 600]
                            )

                            @include(
                                'includes.number',
                                ['field' => 'screenSaverDelay', 'fieldName' => 'Screen saver delay', 'placeholder' => 'entre 0 et 60', 'min' => 0, 'max' => 60]
                            )

                            @include(
                                'includes.text',
                                ['field' => 'screenSaverImage1', 'fieldName' => 'Screen saver image 1', 'placeholder' => 'Lien de l\'image (http ou https uniquement)']
                            )

                            @include(
                                'includes.text',
                                ['field' => 'screenSaverImage2', 'fieldName' => 'Screen saver image 2', 'placeholder' => 'Lien de l\'image (http ou https uniquement)']
                            )

                            @include(
                                'includes.text',
                                ['field' => 'screenSaverImage3', 'fieldName' => 'Screen saver image 3', 'placeholder' => 'Lien de l\'image (http ou https uniquement)']
                            )

                            {{ Form::button('Réinitialiser', ['id' => 'reset', 'class' => 'btn btn-primary']) }}

                            {{ Form::submit('Générer', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ url('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
