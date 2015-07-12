<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<md-dialog aria-label="Domain">
    <md-toolbar>
        <div class="md-toolbar-tools">
            <h2>Create New Domain</h2>
            <span flex></span>
            <md-button class="md-icon-button" ng-click="answer('not applicable')">
                <i class="material-icons">close</i>
            </md-button>
        </div>
    </md-toolbar>
    <form action="domain/create" method="post" enctype="multipart/form-data">
        <md-dialog-content>
            <div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! csrf_field() !!}
                <md-input-container>
                    <label>Name</label>
                    <input type="text" name="name"
                           ng-model="data.domain.name"/>
                </md-input-container>
                <md-input-container>
                    <label>Description</label>
                    <input type="text" name="description"
                           ng-model="data.domain.description"/>
                </md-input-container>
            </div>
        </md-dialog-content>
        <div class="md-actions" layout="row">
            <md-button type="submit" ng-click="answer('useful')" class="md-primary">Create</md-button>
        </div>
    </form>
</md-dialog>