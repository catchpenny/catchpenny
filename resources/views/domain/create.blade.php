<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<md-dialog aria-label="Domain">
    <md-toolbar>
        <div class="md-toolbar-tools">
            <h2>Create New Domain</h2>
            <span flex></span>
            <md-button class="md-icon-button" ng-click="cancel()">
                <i class="material-icons">close</i>
            </md-button>
        </div>
    </md-toolbar>
    <md-content ng-hide="mustHide">
        <div layout="row" layout-align="center center">
            <div>
                <md-progress-circular class="md-accent" md-mode="indeterminate"></md-progress-circular>
            </div>
        </div>
    </md-content>
    <form name="domainCreateSubmitForm" method="post" ng-show="mustHide">
        <md-dialog-content>
            <div>
                <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
                <md-input-container>
                    <label>Name</label>
                    <input type="text" name="name"
                           ng-model="domain.name"/>
                </md-input-container>
                    <div ng-bind="nameError"></div>
                <md-input-container>
                    <label>Description</label>
                    <input type="text" name="description"
                           ng-model="domain.description"/>
                    <div ng-model="domainCreateSubmitError.description"></div>
                </md-input-container>
                    <div ng-bind="descriptionError"></div>
            </div>
        </md-dialog-content>
        <div class="md-actions" layout="row">
            <md-button type="submit" ng-click="domainCreateSubmit(domain)" class="md-primary">Create</md-button>
        </div>
    </form>
</md-dialog>